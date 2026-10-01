<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EkstrakurikulerRequest;
use App\Models\Ekstrakurikuler;
use App\Support\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EkstrakurikulerController extends Controller
{
    use HandlesImageUpload;

    public function index(): View
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('urutan')->orderBy('nama')->paginate(10);

        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function create(): View
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(EkstrakurikulerRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status_aktif'] = $request->boolean('status_aktif', true);

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->storeImage($request->file('foto'), 'ekstrakurikuler');
        }

        Ekstrakurikuler::create($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler): View
    {
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(EkstrakurikulerRequest $request, Ekstrakurikuler $ekstrakurikuler): RedirectResponse
    {
        $data = $request->validated();
        $data['status_aktif'] = $request->boolean('status_aktif', true);

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->replaceImage($ekstrakurikuler->foto, $request->file('foto'), 'ekstrakurikuler');
        }

        $ekstrakurikuler->update($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler): RedirectResponse
    {
        $this->deleteImage($ekstrakurikuler->foto);
        $ekstrakurikuler->delete();

        return back()->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }
}
