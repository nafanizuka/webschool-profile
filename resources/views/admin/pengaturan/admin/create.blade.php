@extends('admin.layouts.admin')
@section('title', 'Tambah Admin')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Tambah Akun Admin</h5>
    <form method="POST" action="{{ route('admin.pengaturan.admin.store') }}">
        @csrf
        @include('admin.pengaturan.admin._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.pengaturan.admin.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
