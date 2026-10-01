<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KegiatanRequest;
use App\Models\Kegiatan;
use App\Support\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KegiatanController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $kegiatan = Kegiatan::when($request->filled('q'), fn ($q) => $q->where('nama_kegiatan', 'like', '%'.$request->q.'%'))
            ->latest('tanggal')
            ->paginate(10)
            ->withQueryString();

        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create(): View
    {
        return view('admin.kegiatan.create');
    }

    public function store(KegiatanRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Kegiatan::generateUniqueSlug($data['nama_kegiatan']);
        $data['foto'] = $this->storeImage($request->file('foto'), 'kegiatan');

        Kegiatan::create($data);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan): View
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(KegiatanRequest $request, Kegiatan $kegiatan): RedirectResponse
    {
        $data = $request->validated();

        if ($data['nama_kegiatan'] !== $kegiatan->nama_kegiatan) {
            $data['slug'] = Kegiatan::generateUniqueSlug($data['nama_kegiatan'], $kegiatan->id);
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->replaceImage($kegiatan->foto, $request->file('foto'), 'kegiatan');
        }

        $kegiatan->update($data);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan): RedirectResponse
    {
        $this->deleteImage($kegiatan->foto);
        $kegiatan->delete();

        return back()->with('success', 'Kegiatan berhasil dihapus.');
    }
}
