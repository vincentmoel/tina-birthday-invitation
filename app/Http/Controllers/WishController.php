<?php

namespace App\Http\Controllers;

use App\Jobs\SendWhatsAppMessageJob;
use App\Models\Wish;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishController extends Controller
{
    public function index(): View
    {
        $wishes = Wish::latest()->get();

        return view('invitation', compact('wishes'));
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'wish' => ['nullable', 'string', 'max:1000'],
            'attend' => ['required', 'in:0,1'],
        ]);

        $wish = Wish::create([
            'name' => $validated['name'],
            'wish' => $validated['wish'] ?? '',
            'attend' => (int) $validated['attend'],
        ]);

        SendWhatsAppMessageJob::dispatch($wish->name, $wish->wish, $wish->attend);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'saved',
                'wish' => [
                    'id' => $wish->id,
                    'name' => $wish->name,
                    'wish' => $wish->wish,
                    'attend' => $wish->attend,
                ],
            ]);
        }

        return back()->with('saved_wish_id', $wish->id);
    }
}
