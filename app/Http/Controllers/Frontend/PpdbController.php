<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PpdbController extends Controller
{
    public function create(): View
    {
        return view('ppdb');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'digits:16'],
            'nisn' => ['nullable', 'string', 'max:20'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', 'string', 'max:20'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'nama_wali' => ['required', 'string', 'max:255'],
            'no_hp_wali' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'keterangan_tambahan' => ['nullable', 'string'],
        ]);

        \App\Models\PendaftaranPpdb::create($validated);

        return back()->with('success', 'Pendaftaran PPDB Anda berhasil dikirim. Silakan tunggu proses verifikasi dari pihak sekolah.');
    }
}
