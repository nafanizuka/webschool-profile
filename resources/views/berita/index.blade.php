@extends('layouts.app')

@section('title', 'Berita - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main>
    <section class="content-section">
        <div class="section-container">
            <div class="section-heading">
                <h2>Berita {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad' }}</h2>
                <p>Kumpulan informasi terbaru dari {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}.</p>
            </div>

            <div class="news-page-grid">
                @forelse($berita as $item)
                    <article class="news-page-card">
                        <div class="news-page-image">
                            <img src="{{ $item->thumbnail_url }}" alt="{{ $item->judul }}">
                        </div>
                        <div class="news-page-info">
                            <span>{{ $item->tanggal_publikasi->translatedFormat('d F Y') }}</span>
                            <h3>{{ $item->judul }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 110) }}</p>
                            <a href="{{ route('berita.show', $item->slug) }}" class="text-button">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="empty-state">Belum ada berita yang dipublikasikan.</p>
                @endforelse
            </div>

            <div class="pagination-wrapper">
                {{ $berita->links() }}
            </div>
        </div>
    </section>
</main>
@endsection
