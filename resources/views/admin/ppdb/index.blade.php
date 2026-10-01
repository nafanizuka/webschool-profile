@extends('admin.layouts.admin')
@section('title', 'Pendaftar PPDB')
@section('content')
<div class="card"><div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h5 class="fw-bold mb-0">Data Pendaftar PPDB</h5>
        <a href="{{ route('admin.ppdb.export') }}" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-file-csv me-1"></i> Export CSV</a>
    </div>

    <form class="row g-2 mb-3" method="GET">
        <div class="col-md-4">
            <input type="text" name="q" class="form-control form-control-sm" placeholder="Cari nama / NIK / asal sekolah" value="{{ request('q') }}">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select form-select-sm">
                <option value="">Semua Status</option>
                @foreach(['menunggu','diverifikasi','diterima','ditolak'] as $s)
                    <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-sm btn-primary w-100">Filter</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nama</th><th>Asal Sekolah</th><th>No HP</th><th>Status</th><th>Tanggal</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($pendaftar as $p)
                    <tr>
                        <td>{{ $p->nama_lengkap }}</td>
                        <td>{{ $p->asal_sekolah }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>
                            <span class="badge bg-{{ ['menunggu'=>'warning text-dark','diverifikasi'=>'info text-dark','diterima'=>'success','ditolak'=>'danger'][$p->status] ?? 'secondary' }}">{{ ucfirst($p->status) }}</span>
                        </td>
                        <td>{{ $p->created_at->format('d/m/Y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.ppdb.show', $p) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye"></i></a>
                            <form action="{{ route('admin.ppdb.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data pendaftar ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted py-4">Belum ada pendaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $pendaftar->links() }}
</div></div>
@endsection
