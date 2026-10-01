<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BeritaRequest;
use App\Models\Berita;
use App\Support\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BeritaController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $berita = Berita::when($request->filled('q'), fn ($q) => $q->where('judul', 'like', '%'.$request->q.'%'))
            ->latest('tanggal_publikasi')
            ->paginate(10)
            ->withQueryString();

        return view('admin.berita.index', compact('berita'));
    }

    public function create(): View
    {
        return view('admin.berita.create');
    }

    public function store(BeritaRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = Berita::generateUniqueSlug($data['judul']);
        $data['thumbnail'] = $this->storeImage($request->file('thumbnail'), 'berita');

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita): View
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(BeritaRequest $request, Berita $berita): RedirectResponse
    {
        $data = $request->validated();

        if ($data['judul'] !== $berita->judul) {
            $data['slug'] = Berita::generateUniqueSlug($data['judul'], $berita->id);
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $this->replaceImage($berita->thumbnail, $request->file('thumbnail'), 'berita');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita): RedirectResponse
    {
        $this->deleteImage($berita->thumbnail);
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }
}
