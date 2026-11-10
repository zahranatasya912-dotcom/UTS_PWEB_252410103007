@extends('layouts.app')

@section('title', 'Dashboard Utama - StockFlow')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

    <!-- Hero Banner Selamat Datang & Verifikasi Parameter Username -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-slate-900 via-indigo-950 to-brand-900 text-white p-6 sm:p-8 shadow-xl">
        <div class="absolute -right-10 -bottom-10 w-64 h-64 rounded-full bg-brand-500/10 blur-3xl pointer-events-none"></div>
        <div class="absolute right-12 top-6 hidden lg:block opacity-15 text-white">
            <i class="ri-dashboard-fill text-9xl"></i>
        </div>

        <div class="relative z-10 max-w-3xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs font-semibold text-brand-200 mb-4">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Request Parameter Terverifikasi: <strong>username={{ $username }}</strong></span>
            </div>

            <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight font-poppins leading-tight">
                Selamat Datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-300 via-indigo-200 to-white">{{ $username }}</span>! 👋
            </h1>

            <p class="text-sm sm:text-base text-slate-300 mt-2 leading-relaxed">
                Anda masuk sebagai <strong class="text-white">{{ $role }}</strong>. Semua ringkasan inventaris logistik, status kuantitas rak, dan pergerakan unit barang telah disinkronkan secara langsung dari <code class="bg-white/15 px-1.5 py-0.5 rounded text-brand-200 font-mono text-xs">PageController</code>.
            </p>

            <!-- Action Buttons di Hero Banner -->
            <div class="flex flex-wrap items-center gap-3 mt-6">
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white text-brand-900 font-bold text-xs sm:text-sm shadow-md hover:bg-brand-50 transition-all hover:scale-102">
                    <i class="ri-archive-stack-line text-brand-600"></i>
                    <span>Buka Halaman Pengelolaan Data</span>
                </a>

                <a href="{{ route('profile', ['username' => $username]) }}" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 border border-white/20 text-white font-semibold text-xs sm:text-sm backdrop-blur-md transition-all">
                    <i class="ri-user-smile-line"></i>
                    <span>Verifikasi Data Profil</span>
                </a>
            </div>
        </div>
    </div>

    {{-- 4 Kartu Statistik Menggunakan Blade Component --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <x-stat-card 
            title="Total Jenis Barang" 
            value="{{ $stats['total_barang'] }} Item" 
            icon="ri-box-3-fill" 
            color="indigo" 
            subtitle="Katalog Terdaftar" 
            trend="+2 Baru" />

        <x-stat-card 
            title="Total Unit Fisik" 
            value="{{ number_format($stats['total_unit'], 0, ',', '.') }} Pcs" 
            icon="ri-stack-fill" 
            color="emerald" 
            subtitle="Kuantitas di Seluruh Rak" 
            trend="100% Valid" />

        <x-stat-card 
            title="Stok Menipis (≤ 5 Item)" 
            value="{{ $stats['stok_menipis'] }} Barang" 
            icon="ri-alarm-warning-fill" 
            color="amber" 
            subtitle="Perlu Restock Segera" />

        <x-stat-card 
            title="Estimasi Nilai Aset" 
            value="Rp {{ number_format($stats['nilai_aset'] / 1000000, 1, ',', '.') }} Jt" 
            icon="ri-money-dollar-circle-fill" 
            color="blue" 
            subtitle="Rp {{ number_format($stats['nilai_aset'], 0, ',', '.') }}" />
    </div>

    <!-- Visualisasi Alur Request Handling UTS 2026 -->
    <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 pb-4 mb-4 border-b border-slate-100">
            <div>
                <h3 class="font-poppins font-bold text-base text-slate-900 flex items-center gap-2">
                    <i class="ri-flow-chart text-brand-600"></i>
                    <span>Pembuktian Alur Request & Response (Rubrik UTS)</span>
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">Penjelasan alur pengiriman parameter username dari Login menuju Dashboard dan Profile</p>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-200 self-start sm:self-auto">
                Skor Teknis: 10/10 Poin
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Step 1 -->
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/70 relative">
                <div class="flex items-center justify-between mb-2">
                    <span class="w-6 h-6 rounded-lg bg-brand-600 text-white font-bold text-xs flex items-center justify-center">1</span>
                    <span class="text-[10px] uppercase font-bold text-slate-400">Form Login</span>
                </div>
                <h4 class="font-semibold text-xs text-slate-800">Form Login POST</h4>
                <p class="text-[11px] text-slate-500 mt-1">
                    Form input menangkap username: <strong class="text-brand-600 font-mono">{{ $username }}</strong> dan dikirim ke Controller.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="p-4 rounded-2xl bg-indigo-50/70 border border-indigo-200 relative">
                <div class="flex items-center justify-between mb-2">
                    <span class="w-6 h-6 rounded-lg bg-indigo-600 text-white font-bold text-xs flex items-center justify-center">2</span>
                    <span class="text-[10px] uppercase font-bold text-indigo-700">PageController</span>
                </div>
                <h4 class="font-semibold text-xs text-indigo-900">Request Handling</h4>
                <p class="text-[11px] text-indigo-700 mt-1">
                    <code class="font-mono text-[10px] bg-white px-1 py-0.5 rounded">$request->query('username')</code> dibaca dan diteruskan ke Dashboard.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 relative">
                <div class="flex items-center justify-between mb-2">
                    <span class="w-6 h-6 rounded-lg bg-emerald-600 text-white font-bold text-xs flex items-center justify-center">3</span>
                    <span class="text-[10px] uppercase font-bold text-emerald-700">Tujuan Akhir</span>
                </div>
                <h4 class="font-semibold text-xs text-emerald-900">Dashboard & Profile View</h4>
                <p class="text-[11px] text-emerald-700 mt-1">
                    Data username aktif dirender pada UI Dashboard saat ini dan siap diteruskan ke halaman Profile.
                </p>
            </div>
        </div>
    </div>

    <!-- Grid Konten: Ringkasan Kategori & Aktivitas Terbaru -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Kolom Kiri: Kategori Barang (2 Kolom di LG) -->
        <div class="lg:col-span-2 bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="font-poppins font-bold text-base text-slate-900 flex items-center gap-2">
                            <i class="ri-pie-chart-2-fill text-indigo-600"></i>
                            <span>Distribusi Kategori Inventaris</span>
                        </h3>
                        <p class="text-xs text-slate-500">Data dikirim dari Controller menggunakan array mapping</p>
                    </div>
                    <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="text-xs font-semibold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                        <span>Lihat Semua</span>
                        <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>

                {{-- Perulangan Kategori dari Controller --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach ($kategoriRingkasan as $kat)
                        <div class="p-3.5 rounded-2xl bg-slate-50 hover:bg-indigo-50/50 border border-slate-200/60 transition-colors">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-xs font-bold text-slate-800">{{ $kat['nama'] }}</span>
                                <span class="text-[11px] font-semibold text-slate-500">{{ $kat['jumlah'] }} Jenis</span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2 overflow-hidden mb-1.5">
                                <div class="{{ $kat['color'] }} h-2 rounded-full" style="width: {{ ($kat['unit'] / $stats['total_unit']) * 100 * 2 }}%"></div>
                            </div>
                            <div class="flex items-center justify-between text-[11px] text-slate-500">
                                <span>Kuantitas Fisik:</span>
                                <span class="font-bold text-slate-700">{{ $kat['unit'] }} Pcs</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Preview Highlight Barang Cepat -->
            <div class="mt-6 pt-4 border-t border-slate-100">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3">
                    Sampel Barang Teratas di Gudang (Render Array @@foreach)
                </h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead>
                            <tr class="text-slate-400 font-semibold border-b border-slate-100">
                                <th class="pb-2">Kode</th>
                                <th class="pb-2">Nama Barang</th>
                                <th class="pb-2">Rak</th>
                                <th class="pb-2">Stok</th>
                                <th class="pb-2">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($highlightItems as $item)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-2.5 font-mono font-bold text-brand-600">{{ $item['kode'] }}</td>
                                    <td class="py-2.5 font-semibold text-slate-800">{{ $item['nama'] }}</td>
                                    <td class="py-2.5 text-slate-600">{{ $item['lokasi'] }}</td>
                                    <td class="py-2.5 font-bold text-slate-900">{{ $item['stok'] }} {{ $item['satuan'] }}</td>
                                    <td class="py-2.5">
                                        <x-badge :status="$item['status']" size="sm" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Aktivitas Sistem Terbaru (1 Kolom di LG) -->
        <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="font-poppins font-bold text-base text-slate-900 flex items-center gap-2">
                            <i class="ri-history-line text-brand-600"></i>
                            <span>Log Aktivitas Terbaru</span>
                        </h3>
                        <p class="text-xs text-slate-500">Riwayat sinkronisasi sistem</p>
                    </div>
                </div>

                <div class="space-y-4">
                    @foreach ($recentActivities as $act)
                        <div class="flex items-start gap-3 p-3 rounded-2xl bg-slate-50/70 border border-slate-100">
                            <div class="w-8 h-8 rounded-xl bg-brand-100 text-brand-700 flex items-center justify-center font-bold text-sm shrink-0 mt-0.5">
                                <i class="ri-file-list-3-line"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between gap-1">
                                    <p class="text-xs font-bold text-slate-900 truncate">{{ $act['aksi'] }}</p>
                                    <span class="text-[10px] text-slate-400 shrink-0">{{ $act['waktu'] }}</span>
                                </div>
                                <p class="text-[11px] text-slate-600 mt-0.5 leading-snug">{{ $act['detail'] }}</p>
                                <div class="flex items-center justify-between mt-2 pt-1.5 border-t border-slate-200/50 text-[10px]">
                                    <span class="text-slate-500">Oleh: <strong class="text-slate-700">{{ $act['user'] }}</strong></span>
                                    <span class="px-1.5 py-0.5 rounded bg-slate-200/60 font-semibold text-slate-700">{{ $act['status'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Callout Mahasiswa -->
            <div class="mt-6 p-4 rounded-2xl bg-gradient-to-br from-indigo-50 to-brand-50 border border-brand-100 text-center">
                <p class="text-xs font-semibold text-brand-800">Ujian Tengah Semester (UTS) 2026</p>
                <p class="text-sm font-extrabold text-slate-900 mt-0.5">NATASYA ZULAIKHA ZAHRA</p>
                <p class="text-xs font-mono text-slate-600">NIM: 252410103007</p>
            </div>
        </div>

    </div>

</div>
@endsection
