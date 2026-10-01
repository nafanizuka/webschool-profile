@extends('layouts.app')

@section('title', 'Ekstrakurikuler - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main class="page-content">
    <section class="page-hero">
        <div class="page-hero-content">
            <span class="section-label">KESISWAAN</span>
            <h2>Ekstrakurikuler</h2>
            <p>Berbagai kegiatan ekstrakurikuler yang dapat diikuti oleh siswa {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}.</p>
        </div>
    </section>

    <section class="content-section">
        <div class="extra-grid">
            @forelse($ekstrakurikuler as $item)
                <article class="extra-card">
                    <div class="extra-icon">
                        <i class="{{ $item->icon ?? 'fa-solid fa-star' }}"></i>
                    </div>
                    <h3>{{ $item->nama }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                    @if($item->pembina || $item->jadwal)
                        <p><small>@if($item->pembina) Pembina: {{ $item->pembina }} @endif @if($item->jadwal) &middot; {{ $item->jadwal }} @endif</small></p>
                    @endif
                </article>
            @empty
                <p class="empty-state">Data ekstrakurikuler belum tersedia.</p>
            @endforelse
        </div>
    </section>
</main>
@endsection
