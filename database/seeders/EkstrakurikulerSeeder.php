<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Pramuka', 'icon' => 'fa-solid fa-campground', 'deskripsi' => 'Kegiatan yang melatih kedisiplinan, kemandirian, kerja sama, dan kepemimpinan siswa.'],
            ['nama' => 'Olahraga', 'icon' => 'fa-solid fa-futbol', 'deskripsi' => 'Kegiatan olahraga untuk mendukung kesehatan, kebugaran, dan sportivitas siswa.'],
            ['nama' => 'Seni', 'icon' => 'fa-solid fa-palette', 'deskripsi' => 'Wadah bagi siswa untuk mengembangkan kreativitas dan kemampuan di bidang seni.'],
            ['nama' => 'Keagamaan', 'icon' => 'fa-solid fa-book-open', 'deskripsi' => 'Kegiatan yang mendukung pembentukan karakter dan pengembangan nilai keagamaan siswa.'],
            ['nama' => 'Public Speaking', 'icon' => 'fa-solid fa-microphone', 'deskripsi' => 'Melatih kemampuan berbicara, percaya diri, dan komunikasi siswa.'],
            ['nama' => 'Teknologi', 'icon' => 'fa-solid fa-computer', 'deskripsi' => 'Mengenalkan dan mengembangkan minat siswa di bidang teknologi.'],
        ];

        foreach ($data as $i => $row) {
            Ekstrakurikuler::updateOrCreate(['nama' => $row['nama']], $row + ['urutan' => $i, 'status_aktif' => true]);
        }
    }
}
