<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Support\HandlesImageUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumniController extends Controller
{
    use HandlesImageUpload;

    public function index(Request $request): View
    {
        $alumni = Alumni::when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.alumni.index', compact('alumni'));
    }

    public function approve(Alumni $alumni): RedirectResponse
    {
        $alumni->update(['status' => 'published']);

        return back()->with('success', 'Komentar alumni disetujui dan tampil di halaman publik.');
    }

    public function reject(Alumni $alumni): RedirectResponse
    {
        $alumni->update(['status' => 'rejected']);

        return back()->with('success', 'Komentar alumni disembunyikan.');
    }

    public function destroy(Alumni $alumni): RedirectResponse
    {
        $this->deleteImage($alumni->foto);
        $alumni->delete();

        return back()->with('success', 'Data alumni berhasil dihapus.');
    }
}
