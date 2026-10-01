@extends('layouts.app')

@section('title', $prestasi->nama_prestasi . ' - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main>
    <section class="content-section">
        <div class="section-container">
            <a href="{{ route('prestasi.index') }}" class="back-to-page">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke semua prestasi
            </a>

            <article class="news-detail">
                <div class="news-detail-heading">
                    <span>
                        @if($prestasi->tingkat) {{ $prestasi->tingkat }} @endif
                        @if($prestasi->tahun) &middot; {{ $prestasi->tahun }} @endif
                    </span>
                    <h1>{{ $prestasi->nama_prestasi }}</h1>
                    @if($prestasi->nama_siswa)<p><small>Diraih oleh {{ $prestasi->nama_siswa }}@if($prestasi->pencapaian) &middot; {{ $prestasi->pencapaian }} @endif</small></p>@endif
                </div>

                <div class="news-detail-gallery">
                    <div class="news-detail-image">
                        <img src="{{ $prestasi->foto_url }}" alt="{{ $prestasi->nama_prestasi }}">
                    </div>
                </div>

                <div class="news-detail-content">
                    {!! nl2br(e($prestasi->deskripsi)) !!}
                </div>
            </article>

            @if($lainnya->isNotEmpty())
                <div class="section-heading" style="margin-top:48px;">
                    <h2>Prestasi Lainnya</h2>
                </div>
                <div class="achievement-page-grid">
                    @foreach($lainnya as $item)
                        <article class="achievement-card">
                            <div class="achievement-image">
                                <img src="{{ $item->foto_url }}" alt="{{ $item->nama_prestasi }}">
                                <span>PRESTASI</span>
                            </div>
                            <div class="achievement-info">
                                <h3>{{ $item->nama_prestasi }}</h3>
                                <a href="{{ route('prestasi.show', $item->slug) }}" class="text-button">
                                    Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</main>
@endsection
