<?php

namespace Database\Seeders;

use App\Models\PengaturanWebsite;
use Illuminate\Database\Seeder;

class PengaturanWebsiteSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'nama_sekolah' => 'SMP AL AHMAD KRIAN',
            'logo' => 'logo.png',
            'alamat' => 'Jl Mojosantren Krian, Kec. Krian, Kab. Sidoarjo, Prov. Jawa Timur',
            'telepon' => '03199892622',
            'email' => 'smpalahmad1977@gmail.com',
            'website' => 'https://smpalahmad.sch.id',
            'deskripsi' => 'SMP Al Ahmad Krian adalah sekolah menengah pertama yang berkomitmen mencetak generasi berakhlak, berprestasi, dan berwawasan luas.',
            'instagram' => 'https://www.instagram.com/smpalahmad.id',
            'facebook' => '',
            'youtube' => 'https://www.youtube.com/@smpal-ahmadkrian7045',
            'tiktok' => 'https://www.tiktok.com/@smpalahmad.id',
            'whatsapp' => 'https://wa.me/6289531923481',
        ];

        foreach ($defaults as $key => $value) {
            PengaturanWebsite::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
