<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumniController extends Controller
{
    public function create(): View
    {
        $alumni = Alumni::published()->latest()->take(12)->get();

        return view('alumni', compact('alumni'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tahun_lulus' => ['nullable', 'string', 'max:10'],
            'pekerjaan_sekarang' => ['nullable', 'string', 'max:255'],
            'pesan_kesan' => ['required', 'string'],
        ]);

        $validated['status'] = 'pending';

        Alumni::create($validated);

        return back()->with('success', 'Terima kasih! Pesan dan kesan Anda akan tampil setelah disetujui oleh admin.');
    }
}
