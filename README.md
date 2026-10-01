# Website Sekolah SMP Al Ahmad Krian — Laravel CMS

Konversi website sekolah statis (HTML/CSS/JS) menjadi aplikasi **fullstack Laravel + MySQL**
dengan Admin Panel/CMS. Desain, layout, dan navigasi dari website asli dipertahankan;
konten yang sebelumnya statis (guru, berita, kegiatan, prestasi, ekstrakurikuler, fasilitas,
PPDB, alumni, pengaturan website) sekarang dikelola melalui database dan Admin Panel.

## 1. Requirement

- PHP >= 8.2 beserta ekstensi umum Laravel (mbstring, openssl, pdo_mysql, fileinfo, gd, dll)
- Composer 2
- MySQL 5.7+/8.0+ (atau MariaDB)
- Node tidak wajib — proyek ini **tidak memakai Vite/npm**. Semua CSS/JS asli disajikan
  langsung dari `public/assets/`, tidak perlu proses build.

## 2. Instalasi

```bash
# 1. Masuk ke folder project
cd nama-folder-project

# 2. Install dependency PHP
composer install

# 3. Duplikasi file environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate
```

### 3. Konfigurasi Database (MySQL)

Buat database kosong terlebih dahulu, misalnya `sekolah_laravel`, lalu edit `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sekolah_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migration & Seeder

```bash
php artisan migrate --seed
```

Perintah ini akan membuat seluruh tabel dan mengisi data contoh (guru, berita, kegiatan,
prestasi, ekstrakurikuler, fasilitas, alumni, pengaturan website, dan 2 akun admin).

### 5. Storage Link (untuk upload gambar)

```bash
php artisan storage:link
```

Wajib dijalankan agar gambar yang diunggah lewat Admin Panel (foto guru, thumbnail berita,
dll — disimpan di `storage/app/public`) dapat diakses publik melalui `public/storage`.

### 6. Jalankan Server

```bash
php artisan serve
```

Buka `http://localhost:8000` untuk website, dan `http://localhost:8000/admin/login` untuk
Admin Panel.

## 7. Login Admin (akun contoh dari seeder)

> ⚠️ Ini adalah kredensial **contoh untuk development**. Wajib diganti (email & password)
> sebelum aplikasi digunakan secara nyata/production — bisa lewat menu **Profil Saya** dan
> **Pengaturan → Kelola Admin** di Admin Panel.

| Peran        | Email                 | Password   |
|--------------|------------------------|------------|
| Super Admin  | admin@sekolah.test     | password   |
| Admin        | staff@sekolah.test     | password   |

Super Admin memiliki akses tambahan ke menu **Kelola Admin** (membuat/mengedit/menghapus
akun admin lain). Admin biasa tidak bisa mengakses menu tersebut.

## 8. Struktur Folder Penting

```
app/
  Http/
    Controllers/
      Admin/        -> Controller untuk seluruh Admin Panel
      Frontend/      -> Controller untuk halaman publik
    Requests/Admin/  -> Form Request validasi tiap modul CRUD
    Middleware/      -> EnsureUserIsAdmin, EnsureUserIsSuperAdmin
  Models/            -> Guru, Berita, Kegiatan, Prestasi, Ekstrakurikuler,
                         Fasilitas, PendaftaranPpdb, Alumni, PengaturanWebsite, User
  Support/           -> Helper upload gambar (HandlesImageUpload trait)

database/
  migrations/        -> Struktur seluruh tabel
  seeders/           -> Data contoh + akun admin

resources/views/
  layouts/           -> Layout & partial (header/footer) frontend
  admin/layouts/      -> Layout Admin Panel (Bootstrap 5)
  admin/...           -> View CRUD tiap modul admin
  (root)/             -> View halaman publik: home, profil, akademik, kesiswaan,
                          informasi, guru, fasilitas, ekstrakurikuler, ppdb, alumni,
                          berita/, kegiatan/, prestasi/

routes/web.php        -> Seluruh routing frontend & admin

public/assets/         -> style.css & script.js ASLI dari website lama (tidak diubah,
                          kecuali path 1 background-image), plus app-extra.css (tambahan
                          kecil untuk alert box, pagination, dsb)
```

## 9. Fitur Admin Panel

- **Dashboard**: statistik jumlah guru, berita, kegiatan, prestasi, ekstrakurikuler,
  fasilitas, pendaftar PPDB, dan data alumni.
- **CRUD Guru**: nama, NIP/NIK, jabatan, mapel, foto (upload), deskripsi, status aktif.
- **CRUD Berita**: judul (slug otomatis), thumbnail, isi, penulis, tanggal publikasi,
  status draft/published. Halaman publik: `/berita` dan `/berita/{slug}`.
- **CRUD Kegiatan**: sama pola dengan berita. Halaman publik: `/kegiatan`, `/kegiatan/{slug}`.
- **CRUD Prestasi**: nama siswa/tim, tingkat, pencapaian, tahun, foto. Halaman publik:
  `/prestasi`, `/prestasi/{slug}`.
- **CRUD Ekstrakurikuler**: pembina, jadwal, lokasi, ikon, status aktif.
- **CRUD Fasilitas**: kondisi, lokasi, foto.
- **PPDB**: daftar pendaftar, detail, ubah status (menunggu/diverifikasi/diterima/ditolak),
  pencarian, filter status, hapus, **export CSV**.
- **Alumni**: moderasi kesan & pesan alumni (setujui/sembunyikan/hapus). Hanya status
  `published` yang tampil di halaman publik `/alumni` & `/informasi#alumni`.
- **Pengaturan Website**: nama sekolah, logo, alamat, telepon, email, deskripsi, dan
  link media sosial (Instagram/Facebook/YouTube/TikTok/WhatsApp) — dipakai otomatis di
  header, footer, dan seluruh halaman publik.
- **Kelola Admin** (khusus Super Admin): tambah/edit/hapus akun admin, atur peran.
- Middleware `admin` melindungi seluruh `/admin/*` (kecuali halaman login), middleware
  `superadmin` khusus melindungi `/admin/pengaturan/admin/*`.

## 10. Upload Gambar

Semua gambar (foto guru, thumbnail berita, foto kegiatan/prestasi/fasilitas/ekstrakurikuler,
logo sekolah, foto profil admin) disimpan lewat Laravel Storage di `storage/app/public/...`
dan diakses lewat symlink `public/storage` (langkah 5 di atas). Validasi upload: hanya
JPG/JPEG/PNG/WebP, maksimal 1–2MB tergantung modul, nama file dibuat unik otomatis.

## 11. Catatan Konversi dari Website Asli

- Desain, class CSS, dan struktur navigasi dipertahankan seluruhnya dari file asli
  (`style.css` & `script.js` disalin apa adanya ke `public/assets/`).
- Bagian yang sebelumnya statis (kartu guru, berita, kegiatan, prestasi, ekstrakurikuler,
  fasilitas, kesan alumni) sekarang diambil dari database lewat Eloquent, bukan hard-code.
- Halaman detail berita/kegiatan/prestasi pada website asli mengambil data lewat JavaScript
  dari data dummy di `script.js`. Pada versi Laravel ini, konten detail dirender langsung
  oleh Blade dari database (server-side), sehingga bagian JavaScript pengambil-data lama
  tersebut sudah tidak relevan lagi untuk 3 halaman itu — namun tidak mengganggu karena
  ID elemen yang dicarinya sudah tidak dipakai di markup baru.
- Halaman admin memakai Bootstrap 5 (CDN) sesuai permintaan, terpisah dari desain frontend
  yang tetap 100% memakai `style.css` asli.

## 12. Deployment (ringkas)

1. Set `APP_ENV=production` dan `APP_DEBUG=false` di `.env` server.
2. `composer install --no-dev --optimize-autoloader`
3. `php artisan migrate --force` (jalankan seeder hanya sekali di awal jika perlu data contoh)
4. `php artisan storage:link`
5. `php artisan config:cache && php artisan route:cache && php artisan view:cache`
6. Arahkan document root web server ke folder `public/`.
7. Segera ganti password akun admin contoh dari seeder.
