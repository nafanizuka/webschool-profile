@extends('admin.layouts.admin')

@section('title', 'Edit Guru')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Edit Guru</h5>
        <form method="POST" action="{{ route('admin.guru.update', $guru) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.guru._form')
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.guru.index') }}" class="btn btn-light">Batal</a>
        </form>
    </div>
</div>
@endsection
