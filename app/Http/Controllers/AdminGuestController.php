<?php

namespace App\Http\Controllers;

use App\Models\AdminSetting;
use App\Models\Guest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminGuestController extends Controller
{
    public function index(Request $request): View
    {
        $guests = Guest::latest()->get();
        $editingGuest = null;

        if ($request->filled('edit')) {
            $editingGuest = Guest::find($request->integer('edit'));
        }

        $template = $this->getSetting('message_template', 'Halo, {nama}. Mohon datang di ulang tahun ku bla bla bla. Ini Link nya {url}');
        $defaultUrl = $this->getSetting('default_url', 'birthdaytina.com');

        return view('admin.guests', compact('guests', 'template', 'defaultUrl', 'editingGuest'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
        ]);

        Guest::create([
            'name' => $validated['name'],
            'phone' => $this->normalizePhone($validated['phone']),
        ]);

        return back()->with('status', 'Tamu berhasil disimpan.');
    }

    public function update(Request $request, Guest $guest): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:30'],
        ]);

        $guest->update([
            'name' => $validated['name'],
            'phone' => $this->normalizePhone($validated['phone']),
        ]);

        return back()->with('status', 'Tamu berhasil diperbarui.');
    }

    public function destroy(Guest $guest): RedirectResponse
    {
        $guest->delete();

        return back()->with('status', 'Tamu berhasil dihapus.');
    }

    public function send(Guest $guest): RedirectResponse
    {
        $template = $this->getSetting('message_template', 'Halo, {nama}. Mohon datang di ulang tahun ku bla bla bla. Ini Link nya {url}');
        $defaultUrl = $this->getSetting('default_url', 'birthdaytina.com');
        $message = $this->buildMessage($template, $guest->name, $defaultUrl);

        $waUrl = 'https://wa.me/' . $guest->phone . '?text=' . rawurlencode($message);

        return redirect()->away($waUrl);
    }

    public function settings(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message_template' => ['required', 'string', 'max:2000'],
            'default_url' => ['required', 'string', 'max:500'],
        ]);

        $this->setSetting('message_template', $validated['message_template']);
        $this->setSetting('default_url', $validated['default_url']);

        return back()->with('status', 'Setting berhasil disimpan.');
    }

    private function normalizePhone(string $value): string
    {
        $clean = preg_replace('/\D+/', '', $value) ?? '';

        if (str_starts_with($clean, '62')) {
            $clean = '0' . substr($clean, 2);
        }

        if (str_starts_with($clean, '8')) {
            $clean = '0' . $clean;
        }

        return $clean;
    }

    private function buildMessage(string $template, string $name, string $url): string
    {
        $finalUrl = $this->buildUrlWithRecipient($url, $name);

        return str_replace(
            ['{nama}', '{url}'],
            [$name, $finalUrl],
            $template
        );
    }

    private function buildUrlWithRecipient(string $url, string $name): string
    {
        $url = trim($url);

        if ($url === '') {
            return '';
        }

        $separator = str_contains($url, '?') ? '&' : '?';

        return $url . $separator . 'to=' . rawurlencode($name);
    }

    private function getSetting(string $key, string $default = ''): string
    {
        return AdminSetting::query()
            ->where('setting_key', $key)
            ->value('setting_value') ?? $default;
    }

    private function setSetting(string $key, string $value): void
    {
        AdminSetting::query()->updateOrCreate(
            ['setting_key' => $key],
            ['setting_value' => $value]
        );
    }
}
