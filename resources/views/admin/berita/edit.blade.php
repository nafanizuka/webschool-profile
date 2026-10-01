@extends('admin.layouts.admin')
@section('title', 'Edit Berita')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Edit Berita</h5>
    <form method="POST" action="{{ route('admin.berita.update', $berita) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.berita._form')
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
