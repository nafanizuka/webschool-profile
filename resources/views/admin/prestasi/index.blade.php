@extends('admin.layouts.admin')
@section('title', 'Prestasi')
@section('content')
<div class="card"><div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h5 class="fw-bold mb-0">Data Prestasi</h5>
        <div class="d-flex gap-2">
            <form class="d-flex" method="GET"><input type="text" name="q" class="form-control form-control-sm" placeholder="Cari prestasi..." value="{{ request('q') }}"></form>
            <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary btn-sm text-nowrap"><i class="fa-solid fa-plus me-1"></i> Tambah Prestasi</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Foto</th><th>Nama Prestasi</th><th>Siswa</th><th>Tingkat</th><th>Tahun</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($prestasi as $p)
                    <tr>
                        <td><img src="{{ $p->foto_url }}" class="img-thumb"></td>
                        <td>{{ $p->nama_prestasi }}</td>
                        <td>{{ $p->nama_siswa ?? '-' }}</td>
                        <td>{{ $p->tingkat ?? '-' }}</td>
                        <td>{{ $p->tahun ?? '-' }}</td>
                        <td><span class="badge bg-{{ $p->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($p->status) }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('prestasi.show', $p->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.prestasi.edit', $p) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.prestasi.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus prestasi ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-muted py-4">Belum ada prestasi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $prestasi->links() }}
</div></div>
@endsection
