@extends('admin.layouts.admin')
@section('title', 'Tambah Fasilitas')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Tambah Fasilitas</h5>
    <form method="POST" action="{{ route('admin.fasilitas.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.fasilitas._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
