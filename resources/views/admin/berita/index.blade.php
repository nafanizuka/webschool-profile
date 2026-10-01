@extends('admin.layouts.admin')

@section('title', 'Berita')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h5 class="fw-bold mb-0">Data Berita</h5>
            <div class="d-flex gap-2">
                <form class="d-flex" method="GET">
                    <input type="text" name="q" class="form-control form-control-sm" placeholder="Cari judul..." value="{{ request('q') }}">
                </form>
                <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm text-nowrap"><i class="fa-solid fa-plus me-1"></i> Tambah Berita</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead><tr><th>Thumbnail</th><th>Judul</th><th>Tanggal</th><th>Status</th><th class="text-end">Aksi</th></tr></thead>
                <tbody>
                    @forelse($berita as $b)
                        <tr>
                            <td><img src="{{ $b->thumbnail_url }}" class="img-thumb"></td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ optional($b->tanggal_publikasi)->format('d/m/Y') }}</td>
                            <td><span class="badge bg-{{ $b->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($b->status) }}</span></td>
                            <td class="text-end">
                                <a href="{{ route('berita.show', $b->slug) }}" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.berita.edit', $b) }}" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-pen"></i></a>
                                <form action="{{ route('admin.berita.destroy', $b) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus berita ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Belum ada berita.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $berita->links() }}
    </div>
</div>
@endsection
