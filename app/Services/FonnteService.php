<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class FonnteService
{
    public function sendMessage(string $target, string $message): array
    {
        $token = config('services.fonnte.token');

        if (! $token) {
            throw new RuntimeException('Fonnte token is not configured.');
        }

        $response = Http::withHeaders([
                'Authorization' => $token,
            ])
            ->asForm()
            ->post('https://api.fonnte.com/send', [
                'target' => $target,
                'message' => $message,
            ]);

        if (! $response->successful()) {
            throw new RuntimeException('Failed to send WhatsApp message: '.$response->body());
        }

        return $response->json();
    }
}
