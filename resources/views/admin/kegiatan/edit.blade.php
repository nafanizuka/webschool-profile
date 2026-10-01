@extends('admin.layouts.admin')
@section('title', 'Edit Kegiatan')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Edit Kegiatan</h5>
    <form method="POST" action="{{ route('admin.kegiatan.update', $kegiatan) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.kegiatan._form')
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
