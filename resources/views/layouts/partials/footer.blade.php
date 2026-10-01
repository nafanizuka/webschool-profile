<footer class="site-footer">
    <div class="footer-main">
        <div class="footer-container">
            <div class="footer-column">
                <h3>Link / Peta Situs</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}"> Beranda </a></li>
                    <li><a href="{{ route('profil') }}#tentang"> Tentang Sekolah </a></li>
                    <li><a href="{{ route('profil') }}#visi-misi"> Visi &amp; Misi </a></li>
                    <li><a href="{{ route('profil') }}#struktur"> Struktur Organisasi </a></li>
                    <li><a href="{{ route('akademik') }}#guru"> Guru &amp; Tenaga Kependidikan </a></li>
                    <li><a href="{{ route('kesiswaan') }}#prestasi"> Prestasi </a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Informasi</h3>
                <div class="footer-contact-list">
                    <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian') }}" target="_blank" rel="noopener noreferrer" class="footer-contact">
                        <span class="footer-contact-icon"><i class="fa-solid fa-location-dot"></i></span>
                        <span>{{ $pengaturan['alamat'] ?? 'Jl. Mojosantren Krian, Kec. Krian, Kab. Sidoarjo, Jawa Timur' }}</span>
                    </a>
                    <a href="tel:{{ $pengaturan['telepon'] ?? '03199892622' }}" class="footer-contact">
                        <span class="footer-contact-icon"><i class="fa-solid fa-phone"></i></span>
                        <span>{{ $pengaturan['telepon'] ?? '03199892622' }}</span>
                    </a>
                    <a href="mailto:{{ $pengaturan['email'] ?? 'smpalahmad1977@gmail.com' }}" class="footer-contact">
                        <span class="footer-contact-icon"><i class="fa-solid fa-envelope"></i></span>
                        <span>{{ $pengaturan['email'] ?? 'smpalahmad1977@gmail.com' }}</span>
                    </a>
                    @if(!empty($pengaturan['whatsapp']))
                    <a href="{{ $pengaturan['whatsapp'] }}" target="_blank" rel="noopener noreferrer" class="footer-contact">
                        <span class="footer-contact-icon"><i class="fa-brands fa-whatsapp"></i></span>
                        <span> WhatsApp </span>
                    </a>
                    @endif
                </div>
            </div>

            <div class="footer-column footer-brand-column">
                <a href="{{ route('home') }}" class="footer-brand">
                    <img src="{{ $pengaturan['logo'] ?? false ? asset('storage/'.$pengaturan['logo']) : asset('assets/img/logo.png') }}" alt="Logo {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}">
                    <div>
                        <strong>{{ $pengaturan['nama_sekolah'] ?? 'SMP AL AHMAD KRIAN' }}</strong>
                        <span> School Profile </span>
                    </div>
                </a>
                <p class="footer-description">{{ $pengaturan['deskripsi'] ?? 'Mengenal lebih dekat profil, kegiatan, prestasi, akademik, dan informasi sekolah.' }}</p>

                <div class="footer-social">
                    @if(!empty($pengaturan['whatsapp']))
                        <a href="{{ $pengaturan['whatsapp'] }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                    @endif
                    @if(!empty($pengaturan['instagram']))
                        <a href="{{ $pengaturan['instagram'] }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if(!empty($pengaturan['facebook']))
                        <a href="{{ $pengaturan['facebook'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
                    @endif
                    @if(!empty($pengaturan['youtube']))
                        <a href="{{ $pengaturan['youtube'] }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    @endif
                    @if(!empty($pengaturan['tiktok']))
                        <a href="{{ $pengaturan['tiktok'] }}" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-container">
            <div class="footer-bottom-text" style="display: flex; flex-direction: column; gap: 4px;">
                <p>&copy; {{ date('Y') }} {{ $pengaturan['nama_sekolah'] ?? 'SMP Al Ahmad Krian' }}. Semua hak dilindungi.</p>
		<p>Supported by RPL SMK Krian 1 Sidoarjo.</p>
            </div>
            <a href="{{ route('home') }}" class="footer-back-top" aria-label="Kembali ke atas">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
    </div>
</footer>

<div class="search-overlay" id="searchOverlay">
    <div class="search-modal">
        <button class="modal-close" type="button"><i class="fa-solid fa-xmark"></i></button>
        <span class="section-label"> PENCARIAN </span>
        <h2>Cari informasi sekolah</h2>
        <div class="search-field">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="searchInput" placeholder="Cari sejarah, guru, prestasi...">
        </div>
        <div id="searchResults" class="search-results">
            <p class="search-empty">Ketik kata yang ingin dicari.</p>
        </div>
    </div>
</div>

<div class="toast" id="toast"></div>
