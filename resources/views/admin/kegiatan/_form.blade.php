@php $k = $kegiatan ?? null; @endphp
<div class="row g-3 mb-3">
    <div class="col-md-8">
        <label class="form-label">Nama Kegiatan</label>
        <input type="text" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', $k->nama_kegiatan ?? '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', optional($k->tanggal ?? null)->format('Y-m-d')) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $k->lokasi ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="draft" {{ old('status', $k->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $k->status ?? 'published') === 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="6" required>{{ old('deskripsi', $k->deskripsi ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Foto {{ $k ? '(kosongkan jika tidak diubah)' : '' }}</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($k && $k->foto)<img src="{{ $k->foto_url }}" class="img-thumb mt-2">@endif
    </div>
</div>
