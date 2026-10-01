@extends('admin.layouts.admin')
@section('title', 'Tambah Berita')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Tambah Berita</h5>
    <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.berita._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
