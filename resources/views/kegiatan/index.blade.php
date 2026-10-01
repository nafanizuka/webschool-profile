@extends('layouts.app')

@section('title', 'Kegiatan - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main>
    <section class="content-section">
        <div class="section-container">
            <div class="section-heading">
                <h2>Kegiatan {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad' }}</h2>
                <p>Dokumentasi kegiatan siswa {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}.</p>
            </div>

            <div class="activity-page-grid">
                @forelse($kegiatan as $item)
                    <article class="activity-card">
                        <div class="activity-image">
                            <img src="{{ $item->foto_url }}" alt="{{ $item->nama_kegiatan }}">
                        </div>
                        <div class="activity-info">
                            <span>{{ $item->tanggal->translatedFormat('d F Y') }}</span>
                            <h3>{{ $item->nama_kegiatan }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 110) }}</p>
                            <a href="{{ route('kegiatan.show', $item->slug) }}" class="text-button">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="empty-state">Belum ada kegiatan yang dipublikasikan.</p>
                @endforelse
            </div>

            <div class="pagination-wrapper">
                {{ $kegiatan->links() }}
            </div>
        </div>
    </section>
</main>
@endsection
