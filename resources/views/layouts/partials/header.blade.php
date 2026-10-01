<header class="site-header">
    <div class="top-header">
        <div class="school-brand">
            <a href="{{ route('home') }}" class="logo-link">
                <img src="{{ $pengaturan['logo'] ?? false ? asset('storage/'.$pengaturan['logo']) : asset('assets/img/logo.png') }}" alt="Logo {{ $pengaturan['nama_sekolah'] ?? 'SMP AL AHMAD KRIAN' }}" class="school-logo">
            </a>

            <div class="school-brand-text">
                <h1>{{ $pengaturan['nama_sekolah'] ?? 'SMP AL AHMAD KRIAN' }}</h1>
                <p>{{ $pengaturan['alamat'] ?? 'Jl Mojosantren Krian, Kec. Krian, Kab. Sidoarjo, Prov. Jawa Timur' }}</p>
            </div>
        </div>

        <div class="header-contact">
            <a href="tel:{{ $pengaturan['telepon'] ?? '03199892622' }}" class="header-contact-item">
                <span class="header-icon"><i class="fa-solid fa-phone"></i></span>
                <span class="header-contact-text">
                    <small>Telepon</small>
                    <strong>{{ $pengaturan['telepon'] ?? '03199892622' }}</strong>
                </span>
            </a>

            <a href="mailto:{{ $pengaturan['email'] ?? 'smpalahmad1977@gmail.com' }}" class="header-contact-item">
                <span class="header-icon"><i class="fa-solid fa-envelope"></i></span>
                <span class="header-contact-text">
                    <small>Email</small>
                    <strong>{{ $pengaturan['email'] ?? 'smpalahmad1977@gmail.com' }}</strong>
                </span>
            </a>
        </div>
    </div>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"> Beranda </a>

        <div class="nav-dropdown menu-profil">
            <button class="dropdown-toggle" type="button">
                Profil Sekolah <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="dropdown-menu">
                <a href="{{ route('profil') }}#tentang"> Tentang Sekolah </a>
                <a href="{{ route('profil') }}#sejarah"> Sejarah </a>
                <a href="{{ route('profil') }}#visi-misi"> Visi &amp; Misi </a>
                <a href="{{ route('profil') }}#identitas"> Identitas Sekolah </a>
                <a href="{{ route('profil') }}#struktur"> Struktur Organisasi </a>
            </div>
        </div>

        <div class="nav-dropdown menu-akademik">
            <button class="dropdown-toggle" type="button">
                Akademik <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="dropdown-menu">
                <a href="{{ route('akademik') }}#guru"> Guru &amp; Tenaga Kependidikan </a>
                <a href="{{ route('akademik') }}#fasilitas"> Fasilitas </a>
            </div>
        </div>

        <div class="nav-dropdown menu-kesiswaan">
            <button class="dropdown-toggle" type="button">
                Kesiswaan <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="dropdown-menu">
                <a href="{{ route('kesiswaan') }}#kegiatan"> Kegiatan </a>
                <a href="{{ route('kesiswaan') }}#prestasi"> Prestasi </a>
                <a href="{{ route('kesiswaan') }}#ekstrakurikuler"> Ekstrakurikuler </a>
            </div>
        </div>

        <div class="nav-dropdown menu-informasi">
            <button class="dropdown-toggle" type="button">
                Informasi <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="dropdown-menu">
                <a href="{{ route('berita.index') }}"> Berita </a>
                <a href="{{ route('alumni.create') }}"> Alumni </a>
                <a href="{{ route('ppdb.create') }}"> PPDB </a>
                <a href="{{ route('informasi') }}#kontak"> Kontak </a>
            </div>
        </div>

        <button class="search-trigger" type="button">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>

        <a href="{{ route('ppdb.create') }}" class="nav-cta"> SPMB </a>

        <button class="mobile-menu-trigger" type="button" aria-label="Buka menu" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </button>
    </nav>
</header>
