@extends('admin.layouts.admin')
@section('title', 'Tambah Kegiatan')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Tambah Kegiatan</h5>
    <form method="POST" action="{{ route('admin.kegiatan.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.kegiatan._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
