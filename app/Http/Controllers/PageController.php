<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Data master inventaris barang (disimpan di Controller sesuai ketentuan UTS tanpa database)
     */
    private function getInventoryItems(): array
    {
        return [
            [
                'id' => 1,
                'kode' => 'BRG-001',
                'nama' => 'Laptop ASUS ROG Zephyrus G14',
                'kategori' => 'Komputer & Laptop',
                'stok' => 14,
                'satuan' => 'Unit',
                'harga' => 24500000,
                'lokasi' => 'Rak A-01',
                'status' => 'Tersedia',
                'terakhir_update' => '10 Nov 2026',
                'deskripsi' => 'Laptop gaming ultra-ringan dengan AMD Ryzen 9 dan RTX 4060 untuk workstation desainer.',
            ],
            [
                'id' => 2,
                'kode' => 'BRG-002',
                'nama' => 'Monitor Dell UltraSharp 27" 4K',
                'kategori' => 'Monitor & Display',
                'stok' => 8,
                'satuan' => 'Unit',
                'harga' => 8750000,
                'lokasi' => 'Rak A-03',
                'status' => 'Tersedia',
                'terakhir_update' => '09 Nov 2026',
                'deskripsi' => 'Monitor profesional color-accurate 99% DCI-P3 dengan koneksi USB-C 90W power delivery.',
            ],
            [
                'id' => 3,
                'kode' => 'BRG-003',
                'nama' => 'Keyboard Mekanikal Keychron K2 Pro',
                'kategori' => 'Aksesoris Komputer',
                'stok' => 4,
                'satuan' => 'Pcs',
                'harga' => 1650000,
                'lokasi' => 'Rak B-02',
                'status' => 'Menipis',
                'terakhir_update' => '08 Nov 2026',
                'deskripsi' => 'Wireless mechanical keyboard 75% layout, hot-swappable switch, QMK/VIA support.',
            ],
            [
                'id' => 4,
                'kode' => 'BRG-004',
                'nama' => 'Mouse Wireless Logitech MX Master 3S',
                'kategori' => 'Aksesoris Komputer',
                'stok' => 19,
                'satuan' => 'Pcs',
                'harga' => 1499000,
                'lokasi' => 'Rak B-04',
                'status' => 'Tersedia',
                'terakhir_update' => '10 Nov 2026',
                'deskripsi' => 'Mouse ergonomis presisi tinggi 8000 DPI sensor dengan quiet click dan magspeed scroll.',
            ],
            [
                'id' => 5,
                'kode' => 'BRG-005',
                'nama' => 'Router Mikrotik RB4011iGS+RM',
                'kategori' => 'Jaringan & Server',
                'stok' => 3,
                'satuan' => 'Unit',
                'harga' => 3850000,
                'lokasi' => 'Rak C-01',
                'status' => 'Menipis',
                'terakhir_update' => '07 Nov 2026',
                'deskripsi' => 'Routerboard 10x Gigabit ports, 1x SFP+ 10Gbps cage dengan CPU Quad Core 1.4GHz.',
            ],
            [
                'id' => 6,
                'kode' => 'BRG-006',
                'nama' => 'Switch Cisco Catalyst 24-Port Gigabit',
                'kategori' => 'Jaringan & Server',
                'stok' => 6,
                'satuan' => 'Unit',
                'harga' => 6200000,
                'lokasi' => 'Rak C-02',
                'status' => 'Tersedia',
                'terakhir_update' => '06 Nov 2026',
                'deskripsi' => 'Managed switch 24-port Gigabit Ethernet dengan 4x 1G SFP uplink untuk backbone kantor.',
            ],
            [
                'id' => 7,
                'kode' => 'BRG-007',
                'nama' => 'Kabel UTP Cat6 Belden Original 305m',
                'kategori' => 'Jaringan & Server',
                'stok' => 12,
                'satuan' => 'Roll',
                'harga' => 2100000,
                'lokasi' => 'Rak C-05',
                'status' => 'Tersedia',
                'terakhir_update' => '05 Nov 2026',
                'deskripsi' => 'Kabel LAN Cat6 solid copper 23 AWG, bandwidth 550MHz untuk transmisi data kecepatan gigabit.',
            ],
            [
                'id' => 8,
                'kode' => 'BRG-008',
                'nama' => 'SSD NVMe Samsung 980 PRO 2TB',
                'kategori' => 'Penyimpanan Data',
                'stok' => 2,
                'satuan' => 'Pcs',
                'harga' => 2950000,
                'lokasi' => 'Rak D-01',
                'status' => 'Menipis',
                'terakhir_update' => '04 Nov 2026',
                'deskripsi' => 'Internal SSD PCIe 4.0 NVMe M.2 kecepatan baca hingga 7000 MB/s untuk data server/workstation.',
            ],
            [
                'id' => 9,
                'kode' => 'BRG-009',
                'nama' => 'External HDD Seagate Expansion 4TB',
                'kategori' => 'Penyimpanan Data',
                'stok' => 15,
                'satuan' => 'Unit',
                'harga' => 1750000,
                'lokasi' => 'Rak D-03',
                'status' => 'Tersedia',
                'terakhir_update' => '03 Nov 2026',
                'deskripsi' => 'Hard drive eksternal USB 3.0 kapasitas 4TB untuk backup arsip laboratorium mingguan.',
            ],
            [
                'id' => 10,
                'kode' => 'BRG-010',
                'nama' => 'Printer Epson EcoTank L3210 All-in-One',
                'kategori' => 'Peralatan Kantor',
                'stok' => 5,
                'satuan' => 'Unit',
                'harga' => 2450000,
                'lokasi' => 'Rak E-01',
                'status' => 'Tersedia',
                'terakhir_update' => '02 Nov 2026',
                'deskripsi' => 'Printer multifungsi cetak, pindai, salin hemat tinta berkapasitas tinggi untuk administrasi.',
            ],
        ];
    }

    /**
     * Menampilkan Halaman Login
     */
    public function showLogin(Request $request)
    {
        // Ambil default username dari request jika ada atau gunakan nama mahasiswa
        $defaultUsername = $request->query('username', 'Natasya Zulaikha');
        
        return view('login', [
            'defaultUsername' => $defaultUsername,
            'appName' => 'StockFlow',
            'appSubtitle' => 'Sistem Manajemen Inventaris & Logistik Gudang',
        ]);
    }

    /**
     * Memproses formulir login dan meneruskan data username ke Dashboard melalui Request
     */
    public function processLogin(Request $request)
    {
        // Validasi input sederhana
        $request->validate([
            'username' => 'required|min:3|max:50',
            'password' => 'required',
        ], [
            'username.required' => 'Kolom Username wajib diisi!',
            'username.min' => 'Username minimal terdiri dari 3 karakter.',
            'password.required' => 'Kolom Password wajib diisi!',
        ]);

        $username = $request->input('username');
        $role = $request->input('role', 'Administrator Logistik');

        // Meneruskan username ke route dashboard menggunakan parameter request
        return redirect()->route('dashboard', [
            'username' => $username,
            'role' => $role,
        ])->with('success', "Autentikasi berhasil! Selamat datang di StockFlow, {$username}.");
    }

    /**
     * Menampilkan Halaman Dashboard dengan menerima data username dari Request Parameter
     */
    public function dashboard(Request $request)
    {
        // Mengambil data username dari Request Parameter (default: Natasya Zulaikha)
        $username = $request->query('username', $request->input('username', 'Natasya Zulaikha'));
        $role = $request->query('role', 'Administrator Logistik');

        $items = $this->getInventoryItems();

        // Hitung statistik secara dinamis dari array controller
        $totalBarang = count($items);
        $totalUnit = array_sum(array_column($items, 'stok'));
        $stokMenipis = count(array_filter($items, fn($i) => $i['stok'] <= 5));
        $nilaiAset = array_reduce($items, fn($carry, $i) => $carry + ($i['stok'] * $i['harga']), 0);

        // Data kategori untuk grafik/ringkasan visual
        $kategoriRingkasan = [
            ['nama' => 'Komputer & Laptop', 'jumlah' => 1, 'unit' => 14, 'color' => 'bg-indigo-500'],
            ['nama' => 'Monitor & Display', 'jumlah' => 1, 'unit' => 8, 'color' => 'bg-blue-500'],
            ['nama' => 'Aksesoris Komputer', 'jumlah' => 2, 'unit' => 23, 'color' => 'bg-emerald-500'],
            ['nama' => 'Jaringan & Server', 'jumlah' => 3, 'unit' => 21, 'color' => 'bg-amber-500'],
            ['nama' => 'Penyimpanan Data', 'jumlah' => 2, 'unit' => 17, 'color' => 'bg-purple-500'],
            ['nama' => 'Peralatan Kantor', 'jumlah' => 1, 'unit' => 5, 'color' => 'bg-rose-500'],
        ];

        // Aktivitas terbaru di sistem
        $recentActivities = [
            ['waktu' => '10 menit lalu', 'aksi' => 'Update Stok Barang', 'detail' => 'Laptop ASUS ROG Zephyrus G14 (+4 unit diterima dari supplier)', 'user' => $username, 'status' => 'Selesai'],
            ['waktu' => '1 jam lalu', 'aksi' => 'Verifikasi Lokasi Rak', 'detail' => 'Pengecekan fisik Router Mikrotik di Rak C-01', 'user' => $username, 'status' => 'Tervalidasi'],
            ['waktu' => '3 jam lalu', 'aksi' => 'Peringatan Stok Menipis', 'detail' => 'SSD NVMe Samsung 980 PRO tersisa 2 pcs (perlu restock)', 'user' => 'Sistem Otomatis', 'status' => 'Perhatian'],
            ['waktu' => 'Kemarin, 16:30', 'aksi' => 'Audit Bulanan', 'detail' => 'Laporan inventaris triwulan IV disetujui pimpinan logistik', 'user' => $username, 'status' => 'Disetujui'],
        ];

        return view('dashboard', [
            'username' => $username,
            'role' => $role,
            'active' => 'dashboard',
            'stats' => [
                'total_barang' => $totalBarang,
                'total_unit' => $totalUnit,
                'stok_menipis' => $stokMenipis,
                'nilai_aset' => $nilaiAset,
            ],
            'kategoriRingkasan' => $kategoriRingkasan,
            'recentActivities' => $recentActivities,
            'highlightItems' => array_slice($items, 0, 4),
        ]);
    }

    /**
     * Menampilkan Halaman Pengelolaan Data Array
     */
    public function pengelolaan(Request $request)
    {
        // Tetap meneruskan username dari Request Parameter
        $username = $request->query('username', $request->input('username', 'Natasya Zulaikha'));
        $role = $request->query('role', 'Administrator Logistik');

        $items = $this->getInventoryItems();

        // Hitung rekapitulasi data array
        $summary = [
            'total_item' => count($items),
            'total_stok' => array_sum(array_column($items, 'stok')),
            'stok_kritis' => count(array_filter($items, fn($i) => $i['stok'] <= 5)),
            'total_nilai' => array_reduce($items, fn($c, $i) => $c + ($i['stok'] * $i['harga']), 0),
        ];

        return view('pengelolaan', [
            'username' => $username,
            'role' => $role,
            'active' => 'pengelolaan',
            'items' => $items,
            'summary' => $summary,
        ]);
    }

    /**
     * Menampilkan Halaman Profile dengan data username yang diteruskan dari Request Parameter
     */
    public function profile(Request $request)
    {
        // Mengambil data username dari Request Parameter untuk membuktikan data flow berhasil
        $username = $request->query('username', $request->input('username', 'Natasya Zulaikha'));
        $role = $request->query('role', 'Administrator Logistik');

        // Data identitas mahasiswa & profil sistem
        $profileData = [
            'username' => $username,
            'nama_lengkap' => 'NATASYA ZULAIKHA ZAHRA',
            'nim' => '252410103007',
            'mata_kuliah' => 'Pemrograman Web (PWEB)',
            'semester' => 'Genap 2025/2026',
            'program_studi' => 'Sistem Informasi',
            'fakultas' => 'Ilmu Komputer',
            'universitas' => 'Universitas Jember',
            'email' => '252410103007@mail.unej.ac.id',
            'telepon' => '+62 821-4321-9876',
            'role' => $role,
            'status_akun' => 'Aktif (Terverifikasi)',
            'bergabung_sejak' => 'Agustus 2025',
            'keahlian' => [
                'Laravel Framework & Blade Templating',
                'Arsitektur Model-View-Controller (MVC)',
                'Request Handling & Parameter Passing',
                'Tailwind CSS & Responsive Web Design',
                'Clean Code & Semantic HTML5',
            ],
            'riwayat_login' => [
                ['sesi' => 'Sesi Saat Ini (UTS PWEB)', 'ip' => '127.0.0.1 (Localhost)', 'device' => 'Chrome di Windows 11', 'waktu' => 'Aktif Sekarang'],
                ['sesi' => 'Sesi Praktikum 11 - Controller', 'ip' => '192.168.1.105', 'device' => 'Chrome di Windows 11', 'waktu' => 'Kemarin, 14:15 WIB'],
                ['sesi' => 'Sesi Praktikum 10 - Blade Engine', 'ip' => '192.168.1.105', 'device' => 'Chrome di Windows 11', 'waktu' => '04 Nov 2026, 09:30 WIB'],
            ],
        ];

        return view('profile', [
            'username' => $username,
            'role' => $role,
            'active' => 'profile',
            'profile' => $profileData,
        ]);
    }

    /**
     * Logout dan mengembalikan user ke halaman login
     */
    public function logout()
    {
        return redirect()->route('login')->with('info', 'Anda telah berhasil logout dari sistem StockFlow.');
    }
}
