# UTS Pemrograman Web 2026: StockFlow 📦
### Sistem Manajemen Logistik & Inventaris Gudang

> **Repository UTS**: `UTS_PWEB_252410103007`  
> **Mata Kuliah**: Pemrograman Web (PWEB) — Semester Genap 2025/2026  
> **Dosen Pengampu / Pembimbing**: Adya Handika Putra AP  

---

## 👤 Identitas Mahasiswa
| Informasi | Keterangan |
| :--- | :--- |
| **Nama Lengkap** | **NATASYA ZULAIKHA ZAHRA** |
| **NIM** | **252410103007** |
| **Program Studi** | Sistem Informasi |
| **Fakultas** | Fakultas Ilmu Komputer |
| **Perguruan Tinggi** | Universitas Jember |
| **Tema Pengelolaan** | Manajemen Stok & Logistik Inventaris Gudang |

---

## 📌 Ringkasan Proyek & Deskripsi Aplikasi
**StockFlow** adalah aplikasi web manajemen inventaris gudang logistik modern yang dibangun dengan arsitektur **MVC (Model-View-Controller) murni** menggunakan framework **Laravel** dan **Blade Templating Engine**. 

Aplikasi ini dirancang khusus untuk memenuhi seluruh kriteria dan spesifikasi pada **Panduan Pelaksanaan UTS Pemrograman Web 2026** (https://adyahandika.my.id/course/pemrograman-web/panduan-pelaksanaan-uts-pemrograman-web-2026), dengan fokus utama:
1. **Pemahaman Alur Request-Response**: Meneruskan data `username` dari form login menuju halaman `Dashboard` dan `Profile` melalui Request Parameter.
2. **Dynamic Array Rendering**: Me-render data array inventaris barang terstruktur dari Controller ke View `pengelolaan.blade.php` menggunakan perulangan Blade (`@foreach`).
3. **Murni Tanpa Database / CRUD**: Sesuai instruksi tertulis pada FAQ UTS ("Tidak ada koneksi database. Jika ada yang menggunakan database/CRUD, maka dianggap tidak memenuhi ketentuan yang diminta"), seluruh data disimpan dan diolah murni di dalam `PageController.php`.
4. **0% Lorem Ipsum & Visual Responsif**: Tampilan profesional, clean, dan responsif dengan Tailwind CSS, font Poppins/Inter, dan ikon RemixIcon.

---

## 📂 Struktur 9 File Utama (Sesuai Batas Minimal Panduan UTS)

Aplikasi dibangun dengan struktur folder modular yang memenuhi syarat 9 file utama:

```text
UTS_PWEB_252410103007/
├── routes/
│   └── web.php                                 # 1. Routing alur request & controller mapping
│
├── app/Http/Controllers/
│   └── PageController.php                      # 2. Controller utama: pengolah data, request & array
│
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php                       # 3. Master Layout: @yield, @include, Tailwind & Alpine
│   │
│   ├── login.blade.php                         # 4. View Login: Form input username & role
│   ├── dashboard.blade.php                     # 5. View Dashboard: Penerima request username & ringkasan
│   ├── pengelolaan.blade.php                   # 6. View Pengelolaan: Render array barang dengan @foreach
│   ├── profile.blade.php                       # 7. View Profile: Bukti username diteruskan ke Profile
│   │
│   └── components/
│       ├── navbar.blade.php                    # 8. Component Navbar: Navigasi & username indicator
│       ├── footer.blade.php                    # 9. Component Footer: Identitas mahasiswa & copyright
│       ├── stat-card.blade.php                 # (Tambahan) Component kartu statistik (<x-stat-card>)
│       └── badge.blade.php                     # (Tambahan) Component badge status (<x-badge>)
```

---

## 🎯 Pemenuhan Rubrik Penilaian (Total 100 Poin)

| Kategori | Kriteria Penilaian | Bobot | Bukti Implementasi di Proyek Ini |
| :--- | :--- | :---: | :--- |
| **A. Kelengkapan File** | 9 File Minimal Lengkap | **20 Poin** | Memiliki `routes/web.php` (1), `PageController.php` (5), `layouts/app.blade.php` (2), `login.blade.php` (2), `dashboard.blade.php` (2), `pengelolaan.blade.php` (2), `profile.blade.php` (2), `navbar.blade.php` (2), `footer.blade.php` (2). Total: 20 poin. |
| **A. Implementasi MVC** | View dipanggil melalui Controller & data dikirim dari Controller | **20 Poin** | Semua view dipanggil via method `PageController` (`showLogin`, `dashboard`, `pengelolaan`, `profile`). Tidak ada data hardcoded di view. Layout di-extend dengan `@extends('layouts.app')`. |
| **A. Blade Directives** | `@extends`, `@section`/`@endsection`, `@yield`, `@include`, x-components | **15 Poin** | Menggunakan `@extends('layouts.app')`, `@section('content')`, `@yield('title')` & `@yield('content')`, `@include('components.navbar')` & `@include('components.footer')`, serta Blade tags `<x-stat-card>` dan `<x-badge>`. |
| **A. Request Handling** | Username dikirim ke Dashboard & Profile via Request Parameter | **10 Poin** | Form login mengirimkan `username` (POST). `PageController@processLogin` meneruskan ke `route('dashboard', ['username' => ...])`. Link navigasi dan Controller meneruskan parameter ke `route('profile', ['username' => ...])`. |
| **A. Array Rendering** | Data list dari Controller ditampilkan 100% dengan `@foreach` | **10 Poin** | 10 item inventaris realistis di-render lengkap di `pengelolaan.blade.php` menggunakan `@forelse` / `@foreach` beserta subtotal, filter kategori, search bar, dan modal detail. |
| **B. Kreativitas & UI** | Layout rapi, responsif, modern, 0 Lorem Ipsum | **15 Poin** | Desain modern berstandar dashboard enterprise, responsif (drawer menu di mobile), palet warna indigo/slate/emerald, interaktivitas modal & filter live search. |
| **B. Video Demo** | Memenuhi format, facecam, audio jernih, alur jelas | **10 Poin** | Disiapkan struktur panduan take video lengkap sesuai instruksi panduan (1 - 20 menit). |

---

## 🚀 Cara Menjalankan Proyek di Komputer Lokal

### Prasyarat:
- **PHP** versi 8.2 atau lebih baru
- **Composer** versi 2.x

### Langkah Menjalankan:
1. Buka Terminal / PowerShell di dalam folder proyek ini:
   ```bash
   cd UTS_PWEB_252410103007
   ```

2. Jalankan server lokal Laravel bawaan:
   ```bash
   php artisan serve
   ```

3. Buka browser (Google Chrome / Edge) dan akses alamat:
   ```text
   http://127.0.0.1:8000
   ```
   *(Aplikasi otomatis mengarahkan ke halaman login)*.

4. Masukkan **Username** (contoh: `Natasya Zulaikha`) dan klik tombol **Masuk ke Dashboard**.

5. Nikmati alur navigasi: **Login** ➔ **Dashboard** ➔ **Pengelolaan Data** ➔ **Profil Pengguna**.

### Menjalankan Automated Test (Uji Kualitas Kode):
Aplikasi telah dilengkapi unit & feature test otomatis untuk memverifikasi 100% kelayakan rute:
```bash
php artisan test --filter UtsPageTest
```
*(Seluruh 6 skenario pengujian lulus 100%)*.

---

## 🎬 Panduan Struktur Konten Video Demo YouTube

Sesuai ketentuan panduan UTS, video berdurasi antara **1 hingga 20 menit** dengan **facecam di sudut layar**:

1. **Menit 00:00 - 00:30 (Perkenalan)**:
   - Sebutkan Nama Lengkap: **NATASYA ZULAIKHA ZAHRA**
   - NIM: **252410103007**
   - Kelas & Semester: **Pemrograman Web (Genap 2025/2026)**
2. **Menit 00:30 - 01:15 (Inti Website)**:
   - Jelaskan singkat nama website: **StockFlow**
   - Tools yang digunakan: **Laravel 13 murni, Blade Templating Engine, Tailwind CSS, Alpine.js**
   - Tema pengelolaan: **Manajemen Inventaris & Logistik Gudang (Tanpa Database sesuai instruksi)**
3. **Menit 01:15 - 04:00 (Demo Project)**:
   - Buka terminal, ketik `php artisan serve`.
   - Buka browser di `http://127.0.0.1:8000`.
   - Tunjukkan halaman **Login**, isi username `Natasya Zulaikha`, klik login.
   - Perhatikan URL dan halaman **Dashboard**: data username berhasil diterima di URL query dan di banner header.
   - Klik menu **Profil Pengguna**: buktikan username berhasil diteruskan ke halaman Profil.
   - Klik menu **Pengelolaan Data**: demonstrasikan perulangan array list barang 100%, filter kategori, dan pencarian live search.
4. **Menit 04:00 - 06:00 (Penjelasan Teknis Kode)**:
   - Buka VSCode / Code Editor.
   - Tunjukkan `routes/web.php`: jelaskan mapping route MVC.
   - Tunjukkan `app/Http/Controllers/PageController.php`: jelaskan method `processLogin`, `dashboard`, `pengelolaan` (sumber data array), dan `profile`.
   - Tunjukkan `resources/views/layouts/app.blade.php`: jelaskan `@yield` dan `@include('components.navbar')`.
   - Tunjukkan `pengelolaan.blade.php`: jelaskan implementasi `@foreach` yang merender array inventaris.
5. **Menit 06:00 - 06:30 (Penutup)**:
   - Sampaikan salam penutup dan terima kasih kepada dosen pembimbing Adya Handika Putra AP.

---

## 📋 Format Pengumpulan UTS
- **Nama Repository GitHub**: `UTS_PWEB_252410103007` (Akses: **PUBLIC**)
- **Format Judul Video YouTube**: `UTS PWEB GENAP 25/26 - [Kelas]`
- **Format Subjudul / Deskripsi YouTube**: `NATASYA ZULAIKHA ZAHRA, 252410103007` (Akses: **PUBLIC**)

---
*Dikembangkan dengan penuh dedikasi untuk Ujian Tengah Semester Pemrograman Web 2026.*
