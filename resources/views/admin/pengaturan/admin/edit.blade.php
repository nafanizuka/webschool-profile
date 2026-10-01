@extends('admin.layouts.admin')
@section('title', 'Edit Admin')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Edit Akun Admin</h5>
    <form method="POST" action="{{ route('admin.pengaturan.admin.update', $admin) }}">
        @csrf @method('PUT')
        @include('admin.pengaturan.admin._form')
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.pengaturan.admin.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
