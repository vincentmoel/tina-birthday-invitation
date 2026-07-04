<?php

namespace App\Jobs;

use App\Models\Wish;
use App\Services\FonnteService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWhatsAppMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public readonly string $name,
        public readonly string $wish,
        public readonly int $attend,
    ) {
    }

    public function handle(FonnteService $fonnteService): void
    {
        $counts = Wish::query()
            ->selectRaw('SUM(CASE WHEN attend = 1 THEN 1 ELSE 0 END) as attend_count')
            ->selectRaw('SUM(CASE WHEN attend = 0 THEN 1 ELSE 0 END) as not_attend_count')
            ->first();

        $attendCount = (int) ($counts->attend_count ?? 0);
        $notAttendCount = (int) ($counts->not_attend_count ?? 0);
        $target = config('services.fonnte.target');

        if (! $target) {
            return;
        }

        $message = $this->buildMessage($attendCount, $notAttendCount);

        $fonnteService->sendMessage($target, $message);
    }

    private function buildMessage(int $attendCount, int $notAttendCount): string
    {
        $attendanceLabel = $this->attend === 1 ? 'Bisa Hadir' : 'Tidak Bisa Hadir';

        return implode("\n", [
            '> '.$this->wish,
            '> -'.$this->name,
            '> Kehadiran: '.$attendanceLabel,
            '',
            '*UPDATE:*',
            'Hadir: '.$attendCount,
            'Tidak Hadir: '.$notAttendCount,
        ]);
    }
}
