@extends('admin.layouts.admin')
@section('title', 'Alumni')
@section('content')
<div class="card"><div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h5 class="fw-bold mb-0">Kesan &amp; Pesan Alumni</h5>
        <form class="d-flex gap-2" method="GET">
            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                @foreach(['pending','published','rejected'] as $s)
                    <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nama</th><th>Tahun Lulus</th><th>Pesan</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($alumni as $a)
                    <tr>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->tahun_lulus ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($a->pesan_kesan, 60) }}</td>
                        <td>
                            <span class="badge bg-{{ ['pending'=>'warning text-dark','published'=>'success','rejected'=>'secondary'][$a->status] ?? 'secondary' }}">{{ ucfirst($a->status) }}</span>
                        </td>
                        <td class="text-end">
                            @if($a->status !== 'published')
                            <form action="{{ route('admin.alumni.approve', $a) }}" method="POST" class="d-inline">
                                @csrf @method('PUT')
                                <button class="btn btn-sm btn-outline-success" title="Setujui"><i class="fa-solid fa-check"></i></button>
                            </form>
                            @endif
                            @if($a->status !== 'rejected')
                            <form action="{{ route('admin.alumni.reject', $a) }}" method="POST" class="d-inline">
                                @csrf @method('PUT')
                                <button class="btn btn-sm btn-outline-warning" title="Sembunyikan"><i class="fa-solid fa-eye-slash"></i></button>
                            </form>
                            @endif
                            <form action="{{ route('admin.alumni.destroy', $a) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data alumni ini?')">
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
    {{ $alumni->links() }}
</div></div>
@endsection
