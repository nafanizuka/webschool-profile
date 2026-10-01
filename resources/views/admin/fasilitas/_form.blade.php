@php $f = $fasilitas ?? null; @endphp
<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label">Nama Fasilitas</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $f->nama ?? '') }}" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Kondisi</label>
        <input type="text" name="kondisi" class="form-control" value="{{ old('kondisi', $f->kondisi ?? '') }}" placeholder="Baik/Rusak Ringan">
    </div>
    <div class="col-md-3">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $f->urutan ?? 0) }}" min="0">
    </div>
    <div class="col-md-6">
        <label class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $f->lokasi ?? '') }}">
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $f->deskripsi ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Foto {{ $f ? '(kosongkan jika tidak diubah)' : '' }}</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($f && $f->foto)<img src="{{ $f->foto_url }}" class="img-thumb mt-2">@endif
    </div>
</div>
