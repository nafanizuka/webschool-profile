@extends('admin.layouts.admin')
@section('title', 'Fasilitas')
@section('content')
<div class="card"><div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Data Fasilitas</h5>
        <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> Tambah Fasilitas</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Foto</th><th>Nama</th><th>Kondisi</th><th>Lokasi</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($fasilitas as $f)
                    <tr>
                        <td><img src="{{ $f->foto_url }}" class="img-thumb"></td>
                        <td>{{ $f->nama }}</td>
                        <td>{{ $f->kondisi ?? '-' }}</td>
                        <td>{{ $f->lokasi ?? '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.fasilitas.edit', $f) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.fasilitas.destroy', $f) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus fasilitas ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data fasilitas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $fasilitas->links() }}
</div></div>
@endsection
