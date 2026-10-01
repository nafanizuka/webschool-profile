@extends('layouts.app')

@section('title', 'Profil Sekolah - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main class="page-content">

    <section class="page-hero">

        <div class="page-hero-content">

            <span class="section-label">
                PROFIL SEKOLAH
            </span>

            <h2>
                SMP Al Ahmad
            </h2>

            <p>
                Mengenal profil, sejarah, visi, misi,
                identitas, dan struktur organisasi sekolah.
            </p>

        </div>

    </section>


    <section id="tentang" class="content-section">

    <div class="section-heading">

        <span class="section-label">
            TENTANG SEKOLAH
        </span>

        <h2>
            Tentang SMP Al Ahmad
        </h2>

    </div>

    <div class="profile-intro">

        <div class="content-image">

            <img src="{{ asset('assets/img/sekolah.jpg') }}" alt="SMP Al Ahmad Krian">

        </div>

        <div class="content-text">

            <p class="paragraph-indent">
                SMP Al Ahmad merupakan satuan pendidikan tingkat
                Sekolah Menengah Pertama swasta yang berlokasi di
                Jalan Mojosantren, Desa Kemasan, Kecamatan Krian,
                Kabupaten Sidoarjo, Provinsi Jawa Timur. Sekolah ini
                memiliki NPSN 20501673 dan berada di bawah naungan
                Yayasan Badan Pelaksana Pendidikan Ma'arif NU
                Al Ahmad. Sebagai lembaga pendidikan, SMP Al Ahmad
                menjadi bagian dari lingkungan pendidikan Al Ahmad
                yang berada di wilayah Mojosantren, Krian.
            </p>

            <p class="paragraph-indent">
                SMP Al Ahmad merupakan satuan pendidikan tingkat
                Sekolah Menengah Pertama swasta yang berlokasi di
                Jalan Mojosantren, Desa Kemasan, Kecamatan Krian,
                Kabupaten Sidoarjo, Provinsi Jawa Timur. Sekolah ini
                memiliki NPSN 20501673 dan berada di bawah naungan
                Yayasan Badan Pelaksana Pendidikan Ma'arif NU
                Al Ahmad. Sebagai lembaga pendidikan, SMP Al Ahmad
                menjadi bagian dari lingkungan pendidikan Al Ahmad
                yang berada di wilayah Mojosantren, Krian.
            </p>

        </div>

    </div>

</section>


<section id="sejarah" class="content-section alternate-section">
    
    <div class="section-heading">
        
        <span class="section-label">
            SEJARAH
        </span>
        
        <h2>
            Sejarah SMP Al Ahmad
        </h2>
        
    </div>
    
    <div class="history-content">
        
        <div class="history-text">
            
            <p>
                SMP Al Ahmad memiliki sejarah yang cukup panjang
                dalam penyelenggaraan pendidikan di Kecamatan
                Krian, Kabupaten Sidoarjo. Berdasarkan data
                pendidikan Kemendikdasmen, sekolah ini tercatat
                memiliki tanggal pendirian pada 17 Juli 1977.
                Sejak awal berdirinya, SMP Al Ahmad hadir sebagai
                lembaga pendidikan swasta yang melayani pendidikan
                pada jenjang Sekolah Menengah Pertama di wilayah
                Mojosantren dan sekitarnya.
            </p>
            
            <p>
                Dalam perkembangannya, SMP Al Ahmad berada di bawah
                naungan Yayasan Badan Pelaksana Pendidikan Ma'arif
                NU Al Ahmad. Sekolah ini kemudian menjalankan
                kegiatan operasional berdasarkan izin operasional
                dengan nomor 421.3/2700/404.3.1/2010.
            </p>
            
            <p>
                Hingga saat ini, SMP Al Ahmad tetap menjadi salah
                satu satuan pendidikan swasta di Kecamatan Krian,
                Kabupaten Sidoarjo. Perjalanan sekolah sejak tahun
                1977 menunjukkan keberadaan SMP Al Ahmad dalam
                mendukung pendidikan generasi muda melalui
                pembelajaran, pengembangan karakter, kegiatan siswa,
                serta berbagai program pendidikan yang dijalankan
                sekolah.
            </p>
            
        </div>
        
        <div class="history-box">
            
            <i class="fa-solid fa-landmark"></i>
            
            <strong>
                17 Juli 1977
            </strong>
            
            <span>
                Tanggal Pendirian
            </span>
            
        </div>
        
    </div>
    
</section>


    <section id="visi-misi" class="content-section">
    
    <div class="section-heading">
        
        <span class="section-label">
            ARAH PENDIDIKAN
        </span>
        
        <h2>
            Visi &amp; Misi
        </h2>
        
    </div>
    
    <div class="vision-grid">
        
        <article class="vision-card">
            
            <div class="card-icon">
                <i class="fa-solid fa-lightbulb"></i>
            </div>
            
            <span class="card-label">
                VISI SEKOLAH
            </span>
            
            <h3>
                Membangun insan yang berakhlakul karimah,
                berprestasi, mandiri, kreatif, dan peduli
                lingkungan.
            </h3>
            
        </article>
        
        <article class="vision-card">
            
            <div class="card-icon">
                <i class="fa-solid fa-bullseye"></i>
            </div>
            
            <span class="card-label">
                MISI SEKOLAH
            </span>
            
            <ul>
                
                <li>
                    Menyelenggarakan pendidikan berbasis pesantren
                    untuk memperkuat karakter keagamaan dan akhlak
                    mulia.
                </li>
                
                <li>
                    Mengembangkan potensi akademik dan non-akademik
                    peserta didik agar meraih prestasi optimal.
                </li>
                
                <li>
                    Membentuk jiwa kemandirian dan kreativitas melalui
                    pembelajaran kewirausahaan (entrepreneurship).
                </li>
                
                <li>
                    Menanamkan kepedulian terhadap lingkungan sekitar
                    secara aktif dan berkelanjutan.
                </li>
                
            </ul>
            
        </article>
        
    </div>
    
</section>


    <section id="identitas" class="content-section alternate-section">
    
    <div class="section-heading">
        
        <span class="section-label">
            DATA SEKOLAH
        </span>
        
        <h2>
            Identitas Sekolah
        </h2>
        
    </div>
    
    <div class="identity-table-wrapper">
        
        <table class="identity-table">
            
            <tr>
                <th>Nama Sekolah</th>
                <td>SMP Al Ahmad</td>
            </tr>
            
            <tr>
                <th>NPSN</th>
                <td>20501673</td>
            </tr>
            
            <tr>
                <th>Status Sekolah</th>
                <td>Swasta</td>
            </tr>
            
            <tr>
                <th>Bentuk Pendidikan</th>
                <td>Sekolah Menengah Pertama (SMP)</td>
            </tr>
            
            <tr>
                <th>Akreditasi</th>
                <td>B</td>
            </tr>
            
            <tr>
                <th>Kurikulum</th>
                <td>Kurikulum Merdeka</td>
            </tr>
            
            <tr>
                <th>Naungan</th>
                <td>
                    Badan Pelaksana Pendidikan Ma'arif NU Al-Ahmad
                </td>
            </tr>
            
        </table>
        
    </div>
    
</section>


<section id="struktur" class="content-section">

    <div class="section-heading">

        <h2>
            Struktur Organisasi
        </h2>

        <p>
            Struktur organisasi SMP Al Ahmad Krian.
        </p>

    </div>


    <div class="organization">

        <div class="org-level">

            <div class="organization-card principal-card">

                <span class="organization-role">
                    KEPALA SEKOLAH
                </span>

                <h3>
                    KH. Drs. M. Sudi Khotib, MM.
                </h3>

                <p>
                    Abah Sudi
                </p>

            </div>

        </div>


        <div class="org-grid">

            <div class="organization-card">

                <span class="organization-role">
                    WAKA KURIKULUM 1
                </span>

                <h3>
                    Aat Choiruddin, S.Pd.I.
                </h3>

            </div>


            <div class="organization-card">

                <span class="organization-role">
                    WAKA KURIKULUM 2
                </span>

                <h3>
                    -----------, S.Pd.I.
                </h3>

            </div>

        </div>

    </div>

</section>

</main>
@endsection
