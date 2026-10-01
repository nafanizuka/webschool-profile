@php $p = $prestasi ?? null; @endphp
<div class="row g-3 mb-3">
    <div class="col-md-8">
        <label class="form-label">Nama Prestasi</label>
        <input type="text" name="nama_prestasi" class="form-control" value="{{ old('nama_prestasi', $p->nama_prestasi ?? '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Tahun</label>
        <input type="number" name="tahun" class="form-control" value="{{ old('tahun', $p->tahun ?? date('Y')) }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Nama Siswa / Tim</label>
        <input type="text" name="nama_siswa" class="form-control" value="{{ old('nama_siswa', $p->nama_siswa ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label">Tingkat</label>
        <input type="text" name="tingkat" class="form-control" value="{{ old('tingkat', $p->tingkat ?? '') }}" placeholder="Kecamatan/Kabupaten/Provinsi/Nasional">
    </div>
    <div class="col-md-4">
        <label class="form-label">Juara / Pencapaian</label>
        <input type="text" name="pencapaian" class="form-control" value="{{ old('pencapaian', $p->pencapaian ?? '') }}" placeholder="Contoh: Juara 1">
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="draft" {{ old('status', $p->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $p->status ?? 'published') === 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $p->deskripsi ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Foto {{ $p ? '(kosongkan jika tidak diubah)' : '' }}</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
        @if($p && $p->foto)<img src="{{ $p->foto_url }}" class="img-thumb mt-2">@endif
    </div>
</div>
