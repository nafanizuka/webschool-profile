@extends('admin.layouts.admin')

@section('title', 'Tambah Guru')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Tambah Guru</h5>
        <form method="POST" action="{{ route('admin.guru.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.guru._form')
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.guru.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
