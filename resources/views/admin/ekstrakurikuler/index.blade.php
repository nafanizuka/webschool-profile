@extends('admin.layouts.admin')
@section('title', 'Ekstrakurikuler')
@section('content')
<div class="card"><div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Data Ekstrakurikuler</h5>
        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> Tambah Ekstrakurikuler</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nama</th><th>Pembina</th><th>Jadwal</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($ekstrakurikuler as $e)
                    <tr>
                        <td><i class="{{ $e->icon ?? 'fa-solid fa-star' }} me-2 text-primary"></i>{{ $e->nama }}</td>
                        <td>{{ $e->pembina ?? '-' }}</td>
                        <td>{{ $e->jadwal ?? '-' }}</td>
                        <td>
                            @if($e->status_aktif)<span class="badge bg-success">Aktif</span>@else<span class="badge bg-secondary">Nonaktif</span>@endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.ekstrakurikuler.edit', $e) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('admin.ekstrakurikuler.destroy', $e) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus ekstrakurikuler ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $ekstrakurikuler->links() }}
</div></div>
@endsection
