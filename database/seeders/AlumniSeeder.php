<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Rina Marlina', 'tahun_lulus' => '2020', 'pekerjaan_sekarang' => 'Mahasiswa', 'pesan_kesan' => 'Terima kasih SMP Al Ahmad atas semua bimbingan dan kenangannya.', 'status' => 'published'],
            ['nama' => 'Doni Saputra', 'tahun_lulus' => '2019', 'pekerjaan_sekarang' => 'Wirausaha', 'pesan_kesan' => 'Banyak pelajaran hidup yang saya dapat selama di SMP Al Ahmad.', 'status' => 'published'],
        ];

        foreach ($data as $row) {
            Alumni::updateOrCreate(['nama' => $row['nama'], 'tahun_lulus' => $row['tahun_lulus']], $row);
        }
    }
}
