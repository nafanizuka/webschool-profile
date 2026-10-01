<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}</title>
    <link rel="icon" type="image/png" href="{{ $pengaturan['logo'] ?? false ? asset('storage/'.$pengaturan['logo']) : asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f4f6f9; }
        .admin-sidebar {
            min-height: 100vh; width: 250px; background: #1a2233; color: #cfd6e4; position: fixed; top: 0; left: 0; overflow-y: auto; z-index: 1030;
        }
        .admin-sidebar .brand { padding: 20px 18px; border-bottom: 1px solid rgba(255,255,255,.08); display:flex; align-items:center; gap:10px; }
        .admin-sidebar .brand img { width: 36px; height: 36px; object-fit: contain; border-radius: 6px; background:#fff; }
        .admin-sidebar .brand span { font-weight: 600; font-size: .95rem; color: #fff; line-height:1.2; }
        .admin-sidebar a.nav-link { color: #cfd6e4; padding: 10px 18px; font-size: .92rem; border-left: 3px solid transparent; }
        .admin-sidebar a.nav-link i { width: 20px; margin-right: 8px; }
        .admin-sidebar a.nav-link:hover, .admin-sidebar a.nav-link.active { background: rgba(255,255,255,.06); color: #fff; border-left-color: #4f8cff; }
        .admin-sidebar .nav-heading { text-transform: uppercase; font-size: .7rem; color: #6b7690; padding: 16px 18px 6px; letter-spacing: .04em; }
        .admin-content { margin-left: 250px; min-height: 100vh; }
        .admin-topbar { background: #fff; border-bottom: 1px solid #e7eaf0; padding: 14px 24px; position: sticky; top: 0; z-index: 1020; }
        .admin-main { padding: 24px; }
        .stat-card { border: none; border-radius: 14px; box-shadow: 0 4px 16px rgba(20,30,60,.06); }
        .stat-card .icon-box { width: 48px; height: 48px; border-radius: 12px; display:flex; align-items:center; justify-content:center; font-size: 1.2rem; }
        .card { border: none; border-radius: 14px; box-shadow: 0 4px 16px rgba(20,30,60,.06); }
        .table thead th { font-size: .78rem; text-transform: uppercase; color: #6b7690; letter-spacing: .03em; border-bottom-width: 1px; }
        .img-thumb { width: 52px; height: 52px; object-fit: cover; border-radius: 8px; }
        @media (max-width: 991px) {
            .admin-sidebar { transform: translateX(-100%); transition: transform .2s ease; }
            .admin-sidebar.show { transform: translateX(0); }
            .admin-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="admin-sidebar" id="adminSidebar">
        <div class="brand">
            <img src="{{ $pengaturan['logo'] ?? false ? asset('storage/'.$pengaturan['logo']) : asset('assets/img/logo.png') }}" alt="Logo">
            <span>{{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}<br><small class="text-white-50">Admin Panel</small></span>
        </div>

        <nav class="nav flex-column py-2">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a>

            <div class="nav-heading">Konten</div>
            <a class="nav-link {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}" href="{{ route('admin.guru.index') }}"><i class="fa-solid fa-chalkboard-user"></i> Guru &amp; Staf</a>
            <a class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}" href="{{ route('admin.berita.index') }}"><i class="fa-solid fa-newspaper"></i> Berita</a>
            <a class="nav-link {{ request()->routeIs('admin.kegiatan.*') ? 'active' : '' }}" href="{{ route('admin.kegiatan.index') }}"><i class="fa-solid fa-calendar-days"></i> Kegiatan</a>
            <a class="nav-link {{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}" href="{{ route('admin.prestasi.index') }}"><i class="fa-solid fa-trophy"></i> Prestasi</a>
            <a class="nav-link {{ request()->routeIs('admin.ekstrakurikuler.*') ? 'active' : '' }}" href="{{ route('admin.ekstrakurikuler.index') }}"><i class="fa-solid fa-campground"></i> Ekstrakurikuler</a>
            <a class="nav-link {{ request()->routeIs('admin.fasilitas.*') ? 'active' : '' }}" href="{{ route('admin.fasilitas.index') }}"><i class="fa-solid fa-building"></i> Fasilitas</a>

            <div class="nav-heading">Formulir</div>
            <a class="nav-link {{ request()->routeIs('admin.ppdb.*') ? 'active' : '' }}" href="{{ route('admin.ppdb.index') }}"><i class="fa-solid fa-file-pen"></i> PPDB</a>
            <a class="nav-link {{ request()->routeIs('admin.alumni.*') ? 'active' : '' }}" href="{{ route('admin.alumni.index') }}"><i class="fa-solid fa-user-graduate"></i> Alumni</a>

            <div class="nav-heading">Pengaturan</div>
            <a class="nav-link {{ request()->routeIs('admin.pengaturan.edit') ? 'active' : '' }}" href="{{ route('admin.pengaturan.edit') }}"><i class="fa-solid fa-gear"></i> Pengaturan Website</a>
            @if(auth()->user()?->isSuperAdmin())
            <a class="nav-link {{ request()->routeIs('admin.pengaturan.admin.*') ? 'active' : '' }}" href="{{ route('admin.pengaturan.admin.index') }}"><i class="fa-solid fa-users-gear"></i> Kelola Admin</a>
            @endif
            <a class="nav-link {{ request()->routeIs('admin.profile.edit') ? 'active' : '' }}" href="{{ route('admin.profile.edit') }}"><i class="fa-solid fa-user"></i> Profil Saya</a>
        </nav>
    </div>

    <div class="admin-content">
        <div class="admin-topbar d-flex align-items-center justify-content-between">
            <button class="btn btn-sm btn-outline-secondary d-lg-none" onclick="document.getElementById('adminSidebar').classList.toggle('show')">
                <i class="fa-solid fa-bars"></i>
            </button>
            <h5 class="mb-0 d-none d-lg-block">@yield('title', 'Dashboard')</h5>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-circle-user fs-5"></i>
                    <span>{{ auth()->user()?->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="fa-solid fa-user me-2"></i> Profil Saya</a></li>
                    <li><a class="dropdown-item" href="{{ route('home') }}" target="_blank"><i class="fa-solid fa-arrow-up-right-from-square me-2"></i> Lihat Website</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger"><i class="fa-solid fa-right-from-bracket me-2"></i> Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="admin-main">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
