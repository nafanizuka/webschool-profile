<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\View\View;

class PrestasiController extends Controller
{
    public function index(): View
    {
        $prestasi = Prestasi::published()->latest('tahun')->paginate(9);

        return view('prestasi.index', compact('prestasi'));
    }

    public function show(string $slug): View
    {
        $prestasi = Prestasi::published()->where('slug', $slug)->firstOrFail();

        $lainnya = Prestasi::published()
            ->where('id', '!=', $prestasi->id)
            ->latest('tahun')
            ->take(3)
            ->get();

        return view('prestasi.show', compact('prestasi', 'lainnya'));
    }
}
