@extends('admin.layouts.admin')
@section('title', 'Edit Fasilitas')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Edit Fasilitas</h5>
    <form method="POST" action="{{ route('admin.fasilitas.update', $fasilitas) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.fasilitas._form')
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.fasilitas.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
