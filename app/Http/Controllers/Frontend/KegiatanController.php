<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\View\View;

class KegiatanController extends Controller
{
    public function index(): View
    {
        $kegiatan = Kegiatan::published()->latest('tanggal')->paginate(9);

        return view('kegiatan.index', compact('kegiatan'));
    }

    public function show(string $slug): View
    {
        $kegiatan = Kegiatan::published()->where('slug', $slug)->firstOrFail();

        $lainnya = Kegiatan::published()
            ->where('id', '!=', $kegiatan->id)
            ->latest('tanggal')
            ->take(3)
            ->get();

        return view('kegiatan.show', compact('kegiatan', 'lainnya'));
    }
}
