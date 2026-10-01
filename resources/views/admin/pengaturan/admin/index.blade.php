@extends('admin.layouts.admin')
@section('title', 'Kelola Admin')
@section('content')
<div class="card"><div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Kelola Akun Admin</h5>
        <a href="{{ route('admin.pengaturan.admin.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus me-1"></i> Tambah Admin</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Nama</th><th>Email</th><th>Peran</th><th class="text-end">Aksi</th></tr></thead>
            <tbody>
                @forelse($admins as $u)
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td><span class="badge bg-{{ $u->role === 'super_admin' ? 'dark' : 'secondary' }}">{{ $u->role === 'super_admin' ? 'Super Admin' : 'Admin' }}</span></td>
                        <td class="text-end">
                            <a href="{{ route('admin.pengaturan.admin.edit', $u) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                            @if($u->id !== auth()->id())
                            <form action="{{ route('admin.pengaturan.admin.destroy', $u) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus akun admin ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-muted py-4">Belum ada akun admin lain.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $admins->links() }}
</div></div>
@endsection
