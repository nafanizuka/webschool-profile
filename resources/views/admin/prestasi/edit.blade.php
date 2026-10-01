@extends('admin.layouts.admin')
@section('title', 'Edit Prestasi')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Edit Prestasi</h5>
    <form method="POST" action="{{ route('admin.prestasi.update', $prestasi) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.prestasi._form')
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
