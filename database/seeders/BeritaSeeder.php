<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Informasi Terbaru SMP Al Ahmad Krian',
                'isi' => "Informasi terbaru mengenai sekolah dan perkembangan SMP Al Ahmad.\n\nSekolah terus berupaya meningkatkan kualitas pendidikan dan fasilitas belajar bagi seluruh siswa.",
                'tanggal_publikasi' => now()->subDays(14),
            ],
            [
                'judul' => 'Kegiatan Belajar Mengajar Berjalan Lancar',
                'isi' => 'Proses kegiatan belajar mengajar semester ini berjalan dengan lancar dan kondusif di seluruh jenjang kelas.',
                'tanggal_publikasi' => now()->subDays(7),
            ],
            [
                'judul' => 'Persiapan Penerimaan Peserta Didik Baru',
                'isi' => 'Sekolah mulai mempersiapkan proses penerimaan peserta didik baru untuk tahun ajaran mendatang.',
                'tanggal_publikasi' => now()->subDays(2),
            ],
        ];

        foreach ($data as $row) {
            Berita::updateOrCreate(
                ['slug' => Berita::generateUniqueSlug($row['judul'])],
                [
                    'judul' => $row['judul'],
                    'slug' => Berita::generateUniqueSlug($row['judul']),
                    'isi' => $row['isi'],
                    'penulis' => 'Admin Sekolah',
                    'tanggal_publikasi' => $row['tanggal_publikasi'],
                    'status' => 'published',
                ]
            );
        }
    }
}
