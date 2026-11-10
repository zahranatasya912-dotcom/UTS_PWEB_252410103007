# UTS Pemrograman Web 2026: StockFlow 📦
### Sistem Manajemen Logistik & Inventaris Gudang

> **Repository UTS**: `UTS_PWEB_252410103007`  
> **Mata Kuliah**: Pemrograman Web (PWEB) — Semester Genap 2026  

## Identitas Mahasiswa
| **Nama Lengkap** | **NATASYA ZULAIKHA ZAHRA** |
| **NIM** | **252410103007** |
| **Tema Pengelolaan** | Manajemen Stok & Logistik Inventaris Gudang |

---

## 📌 Ringkasan Proyek & Deskripsi Aplikasi
**StockFlow** adalah aplikasi web manajemen inventaris gudang logistik modern yang dibangun dengan arsitektur **MVC (Model-View-Controller) murni** menggunakan framework **Laravel** dan **Blade Templating Engine**. 


1. **Pemahaman Alur Request-Response**: Meneruskan data `username` dari form login menuju halaman `Dashboard` dan `Profile` melalui Request Parameter.
2. **Dynamic Array Rendering**: Me-render data array inventaris barang terstruktur dari Controller ke View `pengelolaan.blade.php` menggunakan perulangan Blade (`@foreach`).
3. **Murni Tanpa Database / CRUD**: Sesuai instruksi tertulis pada FAQ UTS ("Tidak ada koneksi database. Jika ada yang menggunakan database/CRUD, maka dianggap tidak memenuhi ketentuan yang diminta"), seluruh data disimpan dan diolah murni di dalam `PageController.php`.
4. **0% Lorem Ipsum & Visual Responsif**: Tampilan profesional, clean, dan responsif dengan Tailwind CSS, font Poppins/Inter, dan ikon RemixIcon.

---

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