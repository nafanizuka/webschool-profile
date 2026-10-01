<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FasilitasRequest;
use App\Models\Fasilitas;
use App\Support\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FasilitasController extends Controller
{
    use HandlesImageUpload;

    public function index(): View
    {
        $fasilitas = Fasilitas::orderBy('urutan')->orderBy('nama')->paginate(10);

        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function create(): View
    {
        return view('admin.fasilitas.create');
    }

    public function store(FasilitasRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['foto'] = $this->storeImage($request->file('foto'), 'fasilitas');

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Fasilitas $fasilitas): View
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    public function update(FasilitasRequest $request, Fasilitas $fasilitas): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->replaceImage($fasilitas->foto, $request->file('foto'), 'fasilitas');
        }

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy(Fasilitas $fasilitas): RedirectResponse
    {
        $this->deleteImage($fasilitas->foto);
        $fasilitas->delete();

        return back()->with('success', 'Fasilitas berhasil dihapus.');
    }
}
