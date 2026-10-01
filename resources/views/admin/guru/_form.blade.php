@php $g = $guru ?? null; @endphp
<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $g->nama ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">NIP / NIK (opsional)</label>
        <input type="text" name="nip_nik" class="form-control" value="{{ old('nip_nik', $g->nip_nik ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Jabatan</label>
        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $g->jabatan ?? '') }}" required placeholder="Contoh: Kepala Sekolah, Guru">
    </div>
    <div class="col-md-6">
        <label class="form-label">Mata Pelajaran</label>
        <input type="text" name="mata_pelajaran" class="form-control" value="{{ old('mata_pelajaran', $g->mata_pelajaran ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $g->urutan ?? 0) }}" min="0">
    </div>
    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check">
            <input type="checkbox" name="status_aktif" value="1" class="form-check-input" id="status_aktif" {{ old('status_aktif', $g->status_aktif ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="status_aktif">Tampilkan di website</label>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi / Biodata</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $g->deskripsi ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Foto {{ $g ? '(kosongkan jika tidak diubah)' : '' }}</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($g && $g->foto)
            <img src="{{ $g->foto_url }}" class="img-thumb mt-2">
        @endif
    </div>
</div>
