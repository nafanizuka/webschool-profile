@extends('layouts.app')

@section('title', 'Alumni - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main class="page-content">
    <section class="page-hero">
        <div class="page-hero-content">
            <span class="section-label">ALUMNI</span>
            <h2>Kesan &amp; Pesan Alumni</h2>
            <p>Bagikan pengalamanmu selama bersekolah di {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}.</p>
        </div>
    </section>

    <section class="content-section">
        <div class="form-card">
            <div class="section-heading left">
                <span class="section-label">FORMULIR ALUMNI</span>
                <h2>Tulis Kesan &amp; Pesan</h2>
                <p>Pesan Anda akan tampil setelah disetujui oleh admin sekolah.</p>
            </div>

            @if(session('success'))
                <div class="alert-box success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert-box error">
                    <ul style="margin:0; padding-left:18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('alumni.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" required value="{{ old('nama') }}" placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="form-group">
                        <label>Tahun Lulus</label>
                        <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus') }}" placeholder="Contoh: 2022">
                    </div>

                    <div class="form-group">
                        <label>Kegiatan / Pekerjaan Sekarang</label>
                        <input type="text" name="pekerjaan_sekarang" value="{{ old('pekerjaan_sekarang') }}" placeholder="Contoh: Mahasiswa, Wirausaha">
                    </div>
                </div>

                <div class="form-group">
                    <label>Kesan &amp; Pesan</label>
                    <textarea name="pesan_kesan" rows="5" required placeholder="Tuliskan kesan dan pesan Anda">{{ old('pesan_kesan') }}</textarea>
                </div>

                <div class="form-actions">
                    <button type="reset" class="secondary-button dark">Reset</button>
                    <button type="submit" class="primary-button">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </section>

    <section class="content-section alternate-section">
        <div class="section-heading">
            <h2>Kesan &amp; Pesan Alumni Lainnya</h2>
        </div>

        @if($alumni->isNotEmpty())
            <div class="facility-grid">
                @foreach($alumni as $al)
                    <article class="facility-card">
                        <div class="facility-info">
                            <p style="font-style:italic;">&ldquo;{{ $al->pesan_kesan }}&rdquo;</p>
                            <h3>{{ $al->nama }}</h3>
                            <p><small>Alumni {{ $al->tahun_lulus }}@if($al->pekerjaan_sekarang) &middot; {{ $al->pekerjaan_sekarang }} @endif</small></p>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <p class="empty-state">Belum ada kesan &amp; pesan yang dipublikasikan.</p>
        @endif
    </section>
</main>
@endsection
