@extends('layouts.app')

@section('title', ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian') . ' - Beranda')

@section('content')
<main>
    <section class="hero">
        <div class="hero-content">
            <span class="hero-label">SCHOOL PROFILE</span>
            <h2>Selamat datang di <span>{{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad' }}</span></h2>
            <p>{{ $pengaturan['deskripsi'] ?? 'Mengenal lebih dekat profil, kegiatan, prestasi, akademik, dan informasi sekolah.' }}</p>

            <div class="hero-actions">
                <a href="{{ route('profil') }}#tentang" class="primary-button">
                    Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="{{ route('informasi') }}#kontak" class="secondary-button">Hubungi Kami</a>
            </div>
        </div>
    </section>

    <section class="statistics-card">
        <div class="section-heading compact">
            <span class="section-label">DATA SEKOLAH</span>
            <h2>Statistik Data Sekolah</h2>
        </div>

        <div class="statistics-grid">
            <div class="stat-box"><strong>SMP</strong><span>Bentuk Pendidikan</span></div>
            <div class="stat-box"><strong>20501673</strong><span>NPSN</span></div>
            <div class="stat-box"><strong>SWASTA</strong><span>Status Sekolah</span></div>
            <div class="stat-box"><strong class="small-stat">Badan Pelaksana Pendidikan Ma'arif NU Al Ahmad</strong><span>Yayasan</span></div>
        </div>
    </section>

    @if($kepalaSekolah)
    <section class="principal-message content-section">
        <div class="section-container">
            <div class="principal-message-grid">
                <div class="principal-photo">
                    <div class="principal-photo-frame">
                        <img src="{{ $kepalaSekolah->foto_url }}" alt="Kepala Sekolah {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad' }}">
                    </div>
                </div>

                <div class="principal-message-content">
                    <span class="principal-message-label">KEPALA SEKOLAH</span>
                    <h2>Sambutan Kepala Sekolah</h2>

                    <div class="principal-quote">
                        <i class="fa-solid fa-quote-left"></i>
                        <p>"Pendidikan bukan hanya tentang mencapai prestasi akademik, tetapi juga tentang membentuk karakter, mengembangkan potensi, dan mempersiapkan peserta didik menjadi pribadi yang berakhlak dan bertanggung jawab."</p>
                        <i class="fa-solid fa-quote-right quote-right"></i>
                    </div>

                    <div class="principal-name">
                        <strong>{{ $kepalaSekolah->nama }}</strong>
                        <span>Kepala Sekolah {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="home-intro section-container">
        <div class="intro-image reveal">
            <img src="{{ asset('assets/img/sekolah.jpg') }}" alt="{{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}">
        </div>

        <div class="intro-content reveal">
            <span class="section-label">TENTANG SEKOLAH</span>
            <h2>Mengenal {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}</h2>
            <p>SMP Al Ahmad merupakan satuan pendidikan tingkat Sekolah Menengah Pertama swasta yang berlokasi di Jalan Mojosantren, Desa Kemasan, Kecamatan Krian, Kabupaten Sidoarjo, Provinsi Jawa Timur.</p>
            <p>Sekolah ini memiliki NPSN 20501673 dan berada di bawah naungan Yayasan Badan Pelaksana Pendidikan Ma'arif NU Al Ahmad.</p>
            <a href="{{ route('profil') }}#tentang" class="text-button">Baca profil sekolah <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </section>

    <section class="quick-menu section-container">
        <div class="section-heading center">
            <span class="section-label">INFORMASI SEKOLAH</span>
            <h2>Jelajahi {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad' }}</h2>
            <p>Pilih informasi yang ingin kamu lihat.</p>
        </div>

        <div class="quick-grid">
            <a href="{{ route('profil') }}#tentang" class="quick-card">
                <span class="quick-icon"><i class="fa-solid fa-school"></i></span>
                <h3>Profil Sekolah</h3>
                <p>Tentang, sejarah, visi dan misi, identitas, dan struktur organisasi.</p>
                <span class="quick-arrow"><i class="fa-solid fa-arrow-right"></i></span>
            </a>

            <a href="{{ route('akademik') }}#guru" class="quick-card">
                <span class="quick-icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                <h3>Akademik</h3>
                <p>Guru, tenaga kependidikan, dan fasilitas sekolah.</p>
                <span class="quick-arrow"><i class="fa-solid fa-arrow-right"></i></span>
            </a>

            <a href="{{ route('kesiswaan') }}#kegiatan" class="quick-card">
                <span class="quick-icon"><i class="fa-solid fa-people-group"></i></span>
                <h3>Kesiswaan</h3>
                <p>Kegiatan, prestasi, dan ekstrakurikuler.</p>
                <span class="quick-arrow"><i class="fa-solid fa-arrow-right"></i></span>
            </a>

            <a href="{{ route('informasi') }}#berita" class="quick-card">
                <span class="quick-icon"><i class="fa-solid fa-newspaper"></i></span>
                <h3>Informasi</h3>
                <p>Berita, alumni, PPDB, dan kontak.</p>
                <span class="quick-arrow"><i class="fa-solid fa-arrow-right"></i></span>
            </a>
        </div>
    </section>
</main>
@endsection
