@extends('admin.layouts.admin')
@section('title', 'Edit Ekstrakurikuler')
@section('content')
<div class="card"><div class="card-body">
    <h5 class="fw-bold mb-3">Edit Ekstrakurikuler</h5>
    <form method="POST" action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.ekstrakurikuler._form')
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-light">Batal</a>
    </form>
</div></div>
@endsection
