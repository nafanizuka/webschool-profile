<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\View\View;

class BeritaController extends Controller
{
    public function index(): View
    {
        $berita = Berita::published()->latest('tanggal_publikasi')->paginate(9);

        return view('berita.index', compact('berita'));
    }

    public function show(string $slug): View
    {
        $berita = Berita::published()->where('slug', $slug)->firstOrFail();

        $lainnya = Berita::published()
            ->where('id', '!=', $berita->id)
            ->latest('tanggal_publikasi')
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'lainnya'));
    }
}
