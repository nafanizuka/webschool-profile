@extends('admin.layouts.admin')

@section('title', 'Guru & Staf')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Data Guru &amp; Staf</h5>
            <a href="{{ route('admin.guru.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> Tambah Guru</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Foto</th><th>Nama</th><th>Jabatan</th><th>Mapel</th><th>Status</th><th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($guru as $g)
                        <tr>
                            <td><img src="{{ $g->foto_url }}" class="img-thumb"></td>
                            <td>{{ $g->nama }}</td>
                            <td>{{ $g->jabatan }}</td>
                            <td>{{ $g->mata_pelajaran ?? '-' }}</td>
                            <td>
                                @if($g->status_aktif)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.guru.edit', $g) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('admin.guru.destroy', $g) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data guru ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data guru.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $guru->links() }}
    </div>
</div>
@endsection
