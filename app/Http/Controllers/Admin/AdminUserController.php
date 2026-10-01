<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

/**
 * Manage admin/super-admin accounts. Restricted to super admins
 * (see the "superadmin" middleware on these routes).
 */
class AdminUserController extends Controller
{
    public function index(): View
    {
        $admins = User::latest()->paginate(10);

        return view('admin.pengaturan.admin.index', compact('admins'));
    }

    public function create(): View
    {
        return view('admin.pengaturan.admin.create');
    }

    public function store(AdminUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.pengaturan.admin.index')->with('success', 'Akun admin berhasil dibuat.');
    }

    public function edit(User $admin): View
    {
        return view('admin.pengaturan.admin.edit', compact('admin'));
    }

    public function update(AdminUserRequest $request, User $admin): RedirectResponse
    {
        $data = $request->validated();

        if (! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $admin->update($data);

        return redirect()->route('admin.pengaturan.admin.index')->with('success', 'Akun admin berhasil diperbarui.');
    }

    public function destroy(User $admin): RedirectResponse
    {
        if ($admin->id === auth()->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $admin->delete();

        return back()->with('success', 'Akun admin berhasil dihapus.');
    }
}
