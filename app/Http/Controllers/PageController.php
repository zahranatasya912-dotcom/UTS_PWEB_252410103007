<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Halaman Login
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Memproses login dan meneruskan data username ke Dashboard
     */
    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');

        // Meneruskan username ke route dashboard melalui parameter request
        return redirect()->route('dashboard', ['username' => $username]);
    }

    /**
     * Halaman Dashboard
     */
    public function dashboard(Request $request)
    {
        // Menangkap data username dari request parameter
        $username = $request->query('username', 'Natasya Zulaikha');

        // Data statistik sederhana dari controller
        $totalBarang = 6;
        $totalStok = 78;

        return view('dashboard', compact('username', 'totalBarang', 'totalStok'));
    }

    /**
     * Halaman Pengelolaan Data (Data Array)
     */
    public function pengelolaan(Request $request)
    {
        // Menangkap data username dari request parameter agar navigasi tetap konsisten
        $username = $request->query('username', 'Natasya Zulaikha');

        // Data array inventaris barang (sesuai ketentuan UTS: disimpan di Controller tanpa database)
        $items = [
            [
                'kode' => 'BRG-01',
                'nama' => 'Laptop ASUS ROG',
                'kategori' => 'Elektronik',
                'stok' => 12,
                'harga' => 15000000,
                'status' => 'Tersedia',
            ],
            [
                'kode' => 'BRG-02',
                'nama' => 'Monitor Dell 24 Inch',
                'kategori' => 'Elektronik',
                'stok' => 8,
                'harga' => 2500000,
                'status' => 'Tersedia',
            ],
            [
                'kode' => 'BRG-03',
                'nama' => 'Keyboard Mekanikal',
                'kategori' => 'Aksesoris',
                'stok' => 4,
                'harga' => 850000,
                'status' => 'Menipis',
            ],
            [
                'kode' => 'BRG-04',
                'nama' => 'Mouse Wireless Logitech',
                'kategori' => 'Aksesoris',
                'stok' => 20,
                'harga' => 350000,
                'status' => 'Tersedia',
            ],
            [
                'kode' => 'BRG-05',
                'nama' => 'Router Mikrotik',
                'kategori' => 'Jaringan',
                'stok' => 5,
                'harga' => 1200000,
                'status' => 'Menipis',
            ],
            [
                'kode' => 'BRG-06',
                'nama' => 'Kabel LAN UTP 50m',
                'kategori' => 'Jaringan',
                'stok' => 29,
                'harga' => 150000,
                'status' => 'Tersedia',
            ],
        ];

        return view('pengelolaan', compact('username', 'items'));
    }

    /**
     * Halaman Profile
     */
    public function profile(Request $request)
    {
        // Menangkap data username dari request parameter untuk membuktikan data flow berhasil
        $username = $request->query('username', 'Natasya Zulaikha');

        // Identitas mahasiswa yang sudah disesuaikan
        $mahasiswa = [
            'nama' => 'NATASYA ZULAIKHA ZAHRA',
            'nim' => '252410103007',
            'prodi' => 'Informatika',
            'fakultas' => 'Fakultas Ilmu Komputer',
            'universitas' => 'Universitas Jember',
            'email' => '252410103007@mail.unej.ac.id',
        ];

        return view('profile', compact('username', 'mahasiswa'));
    }

    /**
     * Logout
     */
    public function logout()
    {
        return redirect()->route('login');
    }
}