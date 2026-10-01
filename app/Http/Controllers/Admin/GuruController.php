<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GuruRequest;
use App\Models\Guru;
use App\Support\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GuruController extends Controller
{
    use HandlesImageUpload;

    public function index(): View
    {
        $guru = Guru::orderBy('urutan')->orderBy('nama')->paginate(10);

        return view('admin.guru.index', compact('guru'));
    }

    public function create(): View
    {
        return view('admin.guru.create');
    }

    public function store(GuruRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status_aktif'] = $request->boolean('status_aktif', true);
        $data['foto'] = $this->storeImage($request->file('foto'), 'guru');

        Guru::create($data);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru): View
    {
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(GuruRequest $request, Guru $guru): RedirectResponse
    {
        $data = $request->validated();
        $data['status_aktif'] = $request->boolean('status_aktif', true);

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->replaceImage($guru->foto, $request->file('foto'), 'guru');
        }

        $guru->update($data);

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru): RedirectResponse
    {
        $this->deleteImage($guru->foto);
        $guru->delete();

        return back()->with('success', 'Data guru berhasil dihapus.');
    }
}
