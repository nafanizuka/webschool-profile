@extends('admin.layouts.admin')
@section('title', 'Tambah Ekstrakurikuler')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Tambah Ekstrakurikuler</h5>
    <form method="POST" action="{{ route('admin.ekstrakurikuler.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.ekstrakurikuler._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
