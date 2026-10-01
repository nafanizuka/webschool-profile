@extends('layouts.app')

@section('title', 'PPDB / SPMB - ' . ($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian'))

@section('content')
<main class="page-content">
    <section class="page-hero">
        <div class="page-hero-content">
            <span class="section-label">PENERIMAAN PESERTA DIDIK</span>
            <h2>SPMB {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}</h2>
            <p>Formulir pendaftaran peserta didik baru.</p>
        </div>
    </section>

    <section class="ppdb-poster-section">
        <div class="ppdb-poster-container">
            <div class="ppdb-poster-placeholder">
                <i class="fa-regular fa-image"></i>
                <h1>POSTER SPMB</h1>
                <p>Tempat Poster PPDB / SPMB {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}</p>
                <span>Poster belum tersedia</span>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="form-card">
            <div class="section-heading left">
                <span class="section-label">FORMULIR PENDAFTARAN</span>
                <h2>Formulir SPMB</h2>
                <p>Silakan isi data calon peserta didik dengan lengkap dan benar.</p>
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

            <form method="POST" action="{{ route('ppdb.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" required value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" required maxlength="16" value="{{ old('nik') }}" placeholder="16 digit sesuai KK/KTP">
                    </div>

                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}" placeholder="Masukkan NISN (jika ada)">
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" required value="{{ old('tempat_lahir') }}" placeholder="Masukkan tempat lahir">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki" @selected(old('jenis_kelamin')=='Laki-laki')>Laki-laki</option>
                            <option value="Perempuan" @selected(old('jenis_kelamin')=='Perempuan')>Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor HP / WhatsApp</label>
                        <input type="tel" name="no_hp" required value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx">
                    </div>

                    <div class="form-group">
                        <label>Email (opsional)</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com">
                    </div>

                    <div class="form-group">
                        <label>Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" required value="{{ old('asal_sekolah') }}" placeholder="Nama SD/MI asal">
                    </div>

                    <div class="form-group">
                        <label>Nama Orang Tua / Wali</label>
                        <input type="text" name="nama_wali" required value="{{ old('nama_wali') }}" placeholder="Nama orang tua/wali">
                    </div>

                    <div class="form-group">
                        <label>Nomor HP Orang Tua / Wali</label>
                        <input type="tel" name="no_hp_wali" required value="{{ old('no_hp_wali') }}" placeholder="08xxxxxxxxxx">
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="4" required placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Keterangan Tambahan (opsional)</label>
                    <textarea name="keterangan_tambahan" rows="3" placeholder="Informasi tambahan jika diperlukan">{{ old('keterangan_tambahan') }}</textarea>
                </div>

                <div class="form-actions">
                    <button type="reset" class="secondary-button dark">Reset</button>
                    <button type="submit" class="primary-button">Kirim Pendaftaran</button>
                </div>
            </form>
        </div>
    </section>

    <section class="content-section alternate-section">
        <div class="contact-callout">
            <div>
                <span class="section-label">INFORMASI LANJUTAN</span>
                <h2>Butuh informasi lebih lanjut?</h2>
                <p>Hubungi pihak sekolah melalui WhatsApp untuk memperoleh informasi SPMB.</p>
            </div>

            @if(!empty($pengaturan['whatsapp']))
            <a href="{{ $pengaturan['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="primary-button">Hubungi Sekolah</a>
            @endif
        </div>
    </section>
</main>
@endsection
