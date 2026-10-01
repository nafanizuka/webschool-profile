<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Fasilitas;
use App\Models\Guru;
use App\Models\Kegiatan;
use App\Models\PendaftaranPpdb;
use App\Models\Prestasi;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'guru' => Guru::count(),
            'berita' => Berita::count(),
            'kegiatan' => Kegiatan::count(),
            'prestasi' => Prestasi::count(),
            'ekstrakurikuler' => Ekstrakurikuler::count(),
            'fasilitas' => Fasilitas::count(),
            'ppdb' => PendaftaranPpdb::count(),
            'ppdb_menunggu' => PendaftaranPpdb::where('status', 'menunggu')->count(),
            'alumni' => Alumni::count(),
            'alumni_pending' => Alumni::where('status', 'pending')->count(),
        ];

        $ppdbTerbaru = PendaftaranPpdb::latest()->take(5)->get();
        $beritaTerbaru = Berita::latest()->take(5)->get();

        return view('admin.dashboard.index', compact('stats', 'ppdbTerbaru', 'beritaTerbaru'));
    }
}
