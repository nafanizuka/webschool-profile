@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
@php
$cards = [
    ['label' => 'Guru & Staf', 'value' => $stats['guru'], 'icon' => 'fa-chalkboard-user', 'color' => '#4f8cff', 'route' => 'admin.guru.index'],
    ['label' => 'Berita', 'value' => $stats['berita'], 'icon' => 'fa-newspaper', 'color' => '#22a06b', 'route' => 'admin.berita.index'],
    ['label' => 'Kegiatan', 'value' => $stats['kegiatan'], 'icon' => 'fa-calendar-days', 'color' => '#f5a623', 'route' => 'admin.kegiatan.index'],
    ['label' => 'Prestasi', 'value' => $stats['prestasi'], 'icon' => 'fa-trophy', 'color' => '#e0526a', 'route' => 'admin.prestasi.index'],
    ['label' => 'Ekstrakurikuler', 'value' => $stats['ekstrakurikuler'], 'icon' => 'fa-campground', 'color' => '#7c5cff', 'route' => 'admin.ekstrakurikuler.index'],
    ['label' => 'Fasilitas', 'value' => $stats['fasilitas'], 'icon' => 'fa-building', 'color' => '#00a3b4', 'route' => 'admin.fasilitas.index'],
    ['label' => 'Pendaftar PPDB', 'value' => $stats['ppdb'], 'icon' => 'fa-file-pen', 'color' => '#ff6b6b', 'route' => 'admin.ppdb.index'],
    ['label' => 'Data Alumni', 'value' => $stats['alumni'], 'icon' => 'fa-user-graduate', 'color' => '#3b5bdb', 'route' => 'admin.alumni.index'],
];
@endphp

<div class="row g-3 mb-4">
    @foreach($cards as $c)
        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route($c['route']) }}" class="text-decoration-none">
                <div class="card stat-card h-100">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="icon-box" style="background:{{ $c['color'] }}22; color:{{ $c['color'] }};">
                            <i class="fa-solid {{ $c['icon'] }}"></i>
                        </div>
                        <div>
                            <div class="fs-4 fw-bold text-dark">{{ $c['value'] }}</div>
                            <div class="text-muted small">{{ $c['label'] }}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="row g-3 mb-4">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="fw-bold mb-0">Pendaftar PPDB Menunggu Verifikasi</h6>
                    <span class="badge bg-warning text-dark">{{ $stats['ppdb_menunggu'] }}</span>
                </div>
                <p class="text-muted small mb-0">Segera tinjau data pendaftar baru pada menu PPDB.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="fw-bold mb-0">Komentar Alumni Menunggu Moderasi</h6>
                    <span class="badge bg-warning text-dark">{{ $stats['alumni_pending'] }}</span>
                </div>
                <p class="text-muted small mb-0">Setujui atau sembunyikan pesan alumni pada menu Alumni.</p>
            </div>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Pendaftar PPDB Terbaru</h6>
                <div class="table-responsive">
                    <table class="table table-sm align-middle">
                        <thead><tr><th>Nama</th><th>Status</th><th>Tanggal</th></tr></thead>
                        <tbody>
                            @forelse($ppdbTerbaru as $p)
                                <tr>
                                    <td>{{ $p->nama_lengkap }}</td>
                                    <td><span class="badge bg-secondary">{{ ucfirst($p->status) }}</span></td>
                                    <td>{{ $p->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-muted text-center">Belum ada pendaftar.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Berita Terbaru</h6>
                <div class="table-responsive">
                    <table class="table table-sm align-middle">
                        <thead><tr><th>Judul</th><th>Status</th><th>Tanggal</th></tr></thead>
                        <tbody>
                            @forelse($beritaTerbaru as $b)
                                <tr>
                                    <td>{{ \Illuminate\Support\Str::limit($b->judul, 30) }}</td>
                                    <td><span class="badge bg-{{ $b->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($b->status) }}</span></td>
                                    <td>{{ optional($b->tanggal_publikasi)->format('d/m/Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-muted text-center">Belum ada berita.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
