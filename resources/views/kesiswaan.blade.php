@extends('layouts.app')

@section('title', 'Kesiswaan - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main class="page-content">

    <section class="page-hero">
        <div class="page-hero-content">
            <span class="section-label">KESISWAAN</span>
            <h2>Kegiatan, Prestasi &amp; Ekstrakurikuler</h2>
            <p>Informasi kegiatan dan pencapaian peserta didik.</p>
        </div>
    </section>

    <section id="kegiatan" class="content-section">
        <div class="section-heading">
            <h2>Kegiatan Siswa</h2>
            <p>Dokumentasi kegiatan yang diikuti oleh siswa {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}.</p>
        </div>

        <div class="news-grid">
            @forelse($kegiatan as $item)
                <article class="activity-card">
                    <div class="activity-image">
                        <img src="{{ $item->foto_url }}" alt="{{ $item->nama_kegiatan }}">
                    </div>
                    <div class="activity-info">
                        <span>{{ $item->tanggal->translatedFormat('d F Y') }}</span>
                        <h3>{{ $item->nama_kegiatan }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                        <a href="{{ route('kegiatan.show', $item->slug) }}" class="text-button">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @empty
                <p class="empty-state">Belum ada kegiatan yang dipublikasikan.</p>
            @endforelse
        </div>

        <div class="section-action">
            <a href="{{ route('kegiatan.index') }}" class="secondary-button">Lihat Semua Kegiatan</a>
        </div>
    </section>

    <section id="prestasi" class="content-section alternate-section">
        <div class="section-heading">
            <h2>Prestasi Siswa</h2>
            <p>Pencapaian dan prestasi yang diraih oleh siswa {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}.</p>
        </div>

        <div class="achievement-page-grid">
            @forelse($prestasi as $item)
                <article class="achievement-card">
                    <div class="achievement-image">
                        <img src="{{ $item->foto_url }}" alt="{{ $item->nama_prestasi }}">
                        <span>PRESTASI</span>
                    </div>
                    <div class="achievement-info">
                        <h3>{{ $item->nama_prestasi }}</h3>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                        <a href="{{ route('prestasi.show', $item->slug) }}" class="text-button">
                            Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @empty
                <p class="empty-state">Belum ada prestasi yang dipublikasikan.</p>
            @endforelse
        </div>

        <div class="section-action">
            <a href="{{ route('prestasi.index') }}" class="secondary-button">Lihat Semua Prestasi</a>
        </div>
    </section>

    <section id="ekstrakurikuler" class="content-section">
        <div class="section-container">
            <div class="section-heading">
                <h2>Ekstrakurikuler</h2>
                <p>Berbagai kegiatan ekstrakurikuler yang dapat diikuti oleh siswa {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}.</p>
            </div>

            <div class="extra-grid">
                @forelse($ekstrakurikuler as $item)
                    <article class="extra-card">
                        <div class="extra-icon">
                            <i class="{{ $item->icon ?? 'fa-solid fa-star' }}"></i>
                        </div>
                        <h3>{{ $item->nama }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                    </article>
                @empty
                    <p class="empty-state">Data ekstrakurikuler belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>

</main>
@endsection
