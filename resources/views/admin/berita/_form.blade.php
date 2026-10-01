@php $b = $berita ?? null; @endphp
<div class="row g-3 mb-3">
    <div class="col-md-8">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $b->judul ?? '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Tanggal Publikasi</label>
        <input type="date" name="tanggal_publikasi" class="form-control" value="{{ old('tanggal_publikasi', optional($b->tanggal_publikasi ?? null)->format('Y-m-d')) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $b->penulis ?? 'Admin Sekolah') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="draft" {{ old('status', $b->status ?? '') === 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status', $b->status ?? 'published') === 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Isi Berita</label>
        <textarea name="isi" class="form-control" rows="8" required>{{ old('isi', $b->isi ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label">Thumbnail {{ $b ? '(kosongkan jika tidak diubah)' : '' }}</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/*">
        @if($b && $b->thumbnail)
            <img src="{{ $b->thumbnail_url }}" class="img-thumb mt-2">
        @endif
    </div>
</div>
