@extends('admin.layouts.admin')
@section('title', 'Pengaturan Website')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Pengaturan Website</h5>
    <form method="POST" action="{{ route('admin.pengaturan.update') }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" class="form-control" value="{{ old('nama_sekolah', $pengaturan['nama_sekolah'] ?? '') }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Logo {{ !empty($pengaturan['logo']) ? '(kosongkan jika tidak diubah)' : '' }}</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
                @if(!empty($pengaturan['logo']))
                    <img src="{{ asset('storage/'.$pengaturan['logo']) }}" class="img-thumb mt-2">
                @endif
            </div>
            <div class="col-12">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="2" required>{{ old('alamat', $pengaturan['alamat'] ?? '') }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $pengaturan['telepon'] ?? '') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $pengaturan['email'] ?? '') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Website</label>
                <input type="text" name="website" class="form-control" value="{{ old('website', $pengaturan['website'] ?? '') }}">
            </div>
            <div class="col-12">
                <label class="form-label">Deskripsi Sekolah</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $pengaturan['deskripsi'] ?? '') }}</textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Link Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $pengaturan['instagram'] ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Link Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $pengaturan['facebook'] ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Link YouTube</label>
                <input type="text" name="youtube" class="form-control" value="{{ old('youtube', $pengaturan['youtube'] ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Link TikTok</label>
                <input type="text" name="tiktok" class="form-control" value="{{ old('tiktok', $pengaturan['tiktok'] ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Link WhatsApp (format https://wa.me/62xxxx)</label>
                <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $pengaturan['whatsapp'] ?? '') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan Pengaturan</button>
    </form>
</div></div>
@endsection
