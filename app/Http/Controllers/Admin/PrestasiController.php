<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PrestasiRequest;
use App\Models\Prestasi;
use App\Support\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PrestasiController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $prestasi = Prestasi::when($request->filled('q'), fn ($q) => $q->where('nama_prestasi', 'like', '%'.$request->q.'%'))
            ->latest('tahun')
            ->paginate(10)
            ->withQueryString();

        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create(): View
    {
        return view('admin.prestasi.create');
    }

    public function store(PrestasiRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Prestasi::generateUniqueSlug($data['nama_prestasi']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->storeImage($request->file('foto'), 'prestasi');
        }

        Prestasi::create($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi): View
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(PrestasiRequest $request, Prestasi $prestasi): RedirectResponse
    {
        $data = $request->validated();

        if ($data['nama_prestasi'] !== $prestasi->nama_prestasi) {
            $data['slug'] = Prestasi::generateUniqueSlug($data['nama_prestasi'], $prestasi->id);
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->replaceImage($prestasi->foto, $request->file('foto'), 'prestasi');
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi): RedirectResponse
    {
        $this->deleteImage($prestasi->foto);
        $prestasi->delete();

        return back()->with('success', 'Prestasi berhasil dihapus.');
    }
}
