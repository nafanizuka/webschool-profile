@extends('admin.layouts.admin')
@section('title', 'Kegiatan')
@section('content')
<div class="card"><div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h5 class="fw-bold mb-0">Data Kegiatan</h5>
        <div class="d-flex gap-2">
            <form class="d-flex" method="GET"><input type="text" name="q" class="form-control form-control-sm" placeholder="Cari kegiatan..." value="{{ request('q') }}"></form>
            <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-primary btn-sm text-nowrap"><i class="fa-solid fa-plus me-1"></i> Tambah Kegiatan</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Foto</th><th>Nama Kegiatan</th><th>Tanggal</th><th>Lokasi</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($kegiatan as $k)
                    <tr>
                        <td><img src="{{ $k->foto_url }}" class="img-thumb"></td>
                        <td>{{ $k->nama_kegiatan }}</td>
                        <td>{{ $k->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $k->lokasi ?? '-' }}</td>
                        <td><span class="badge bg-{{ $k->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($k->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('kegiatan.show', $k->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.kegiatan.edit', $k) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.kegiatan.destroy', $k) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kegiatan ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">Belum ada kegiatan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $kegiatan->links() }}
</div></div>
@endsection
