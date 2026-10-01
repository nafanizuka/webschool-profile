@php $u = $admin ?? null; @endphp
<div class="row g-3 mb-3">
    <div class="col-md-6">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $u->name ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $u->email ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Peran</label>
        <select name="role" class="form-select">
            <option value="admin" {{ old('role', $u->role ?? 'admin') === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="super_admin" {{ old('role', $u->role ?? '') === 'super_admin' ? 'selected' : '' }}>Super Admin</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Kata Sandi {{ $u ? '(kosongkan jika tidak diubah)' : '' }}</label>
        <input type="password" name="password" class="form-control" {{ $u ? '' : 'required' }}>
    </div>
</div>
