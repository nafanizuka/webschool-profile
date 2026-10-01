<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $kepalaSekolah = Guru::aktif()->where('jabatan', 'like', '%Kepala Sekolah%')->first();

        return view('home', compact('kepalaSekolah'));
    }
}
