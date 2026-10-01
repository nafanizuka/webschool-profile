@php $e = $ekstrakurikuler ?? null; @endphp
<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label">Nama Ekstrakurikuler</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $e->nama ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Ikon (Font Awesome class, opsional)</label>
        <input type="text" name="icon" class="form-control" value="{{ old('icon', $e->icon ?? '') }}" placeholder="Contoh: fa-solid fa-campground">
    </div>
    <div class="col-md-6">
        <label class="form-label">Pembina</label>
        <input type="text" name="pembina" class="form-control" value="{{ old('pembina', $e->pembina ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Jadwal</label>
        <input type="text" name="jadwal" class="form-control" value="{{ old('jadwal', $e->jadwal ?? '') }}" placeholder="Contoh: Setiap Sabtu, 08.00">
    </div>
    <div class="col-md-6">
        <label class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $e->lokasi ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $e->urutan ?? 0) }}" min="0">
    </div>
    <div class="col-md-6 d-flex align-items-end">
        <div class="form-check">
            <input type="checkbox" name="status_aktif" value="1" class="form-check-input" id="status_aktif" {{ old('status_aktif', $e->status_aktif ?? true) ? 'checked' : '' }}>
            <label class="form-check-label" for="status_aktif">Tampilkan di website</label>
        </div>
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $e->deskripsi ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Foto / Logo (opsional)</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($e && $e->foto)<img src="{{ $e->foto_url }}" class="img-thumb mt-2">@endif
    </div>
</div>
