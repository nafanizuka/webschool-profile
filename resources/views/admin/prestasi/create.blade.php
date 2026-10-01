@extends('admin.layouts.admin')
@section('title', 'Tambah Prestasi')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Tambah Prestasi</h5>
    <form method="POST" action="{{ route('admin.prestasi.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.prestasi._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
