@extends('layouts.app')

@section('title', 'Prestasi - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main>
    <section class="content-section">
        <div class="section-container">
            <div class="section-heading">
                <h2>Prestasi {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad' }}</h2>
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
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 110) }}</p>
                            <a href="{{ route('prestasi.show', $item->slug) }}" class="text-button">
                                Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="empty-state">Belum ada prestasi yang dipublikasikan.</p>
                @endforelse
            </div>

            <div class="pagination-wrapper">
                {{ $prestasi->links() }}
            </div>
        </div>
    </section>
</main>
@endsection
