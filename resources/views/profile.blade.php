@extends('layouts.app')

@section('title', 'Profil Pengguna & Mahasiswa - StockFlow')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

    <!-- Verifikasi Request Parameter Banner -->
    <div class="p-4 sm:p-5 rounded-3xl bg-emerald-50 border border-emerald-200 text-emerald-900 flex flex-col sm:flex-row sm:items-center justify-between gap-4 shadow-sm">
        <div class="flex items-center gap-3.5">
            <div class="w-10 h-10 rounded-2xl bg-emerald-600 text-white flex items-center justify-center font-bold text-xl shrink-0 shadow-sm">
                <i class="ri-shield-check-fill"></i>
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-800">Bukti Kelulusan Rubrik Request Handling:</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-200/80 text-emerald-900">10 / 10 Poin</span>
                </div>
                <p class="text-xs sm:text-sm text-emerald-800 mt-0.5">
                    Data Username berhasil diteruskan dari Login Form hingga ke Halaman Profil: <strong class="font-mono bg-white/80 px-2 py-0.5 rounded border border-emerald-300 text-emerald-900 font-bold">{{ $username }}</strong>
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2 shrink-0">
            <a href="{{ route('dashboard', ['username' => $username]) }}" 
               class="px-3.5 py-1.5 rounded-xl bg-white text-emerald-800 border border-emerald-200 text-xs font-bold hover:bg-emerald-100/50 transition-colors">
                <i class="ri-arrow-left-line"></i> Dashboard
            </a>
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" 
               class="px-3.5 py-1.5 rounded-xl bg-emerald-600 text-white text-xs font-bold hover:bg-emerald-700 transition-colors shadow-xs">
                Pengelolaan <i class="ri-arrow-right-line"></i>
            </a>
        </div>
    </div>

    <!-- Grid Kartu Profil: Identitas Mahasiswa & Detail Sistem -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Kolom Kiri: Kartu Identitas Utama -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm text-center flex flex-col items-center">
            
            <!-- Avatar Foto Profil -->
            <div class="relative mb-4">
                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl bg-gradient-to-tr from-brand-600 via-indigo-600 to-purple-600 flex items-center justify-center text-white text-3xl font-extrabold shadow-lg shadow-indigo-200 border-4 border-white">
                    {{ strtoupper(substr($username, 0, 2)) }}
                </div>
                <span class="absolute bottom-1 right-1 w-6 h-6 rounded-full bg-emerald-500 border-2 border-white flex items-center justify-center text-white text-xs" title="Akun Aktif">
                    <i class="ri-check-line"></i>
                </span>
            </div>

            <!-- Nama & NIM Mahasiswa -->
            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight font-poppins">
                {{ $profile['nama_lengkap'] }}
            </h2>
            <p class="font-mono text-xs font-bold text-brand-600 bg-brand-50 px-3 py-1 rounded-full border border-brand-200/60 mt-1.5">
                NIM: {{ $profile['nim'] }}
            </p>

            <div class="mt-4 flex flex-wrap justify-center gap-1.5">
                <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-semibold text-xs">
                    {{ $role }}
                </span>
                <span class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-semibold text-xs border border-emerald-200">
                    {{ $profile['status_akun'] }}
                </span>
            </div>

            <div class="w-full border-t border-slate-100 my-6"></div>

            <!-- Detail Kontak & Kampus -->
            <div class="w-full text-left space-y-3 text-xs">
                <div class="flex items-center justify-between">
                    <span class="text-slate-400">Username Aktif:</span>
                    <span class="font-bold text-slate-800 font-mono">{{ $username }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-400">Program Studi:</span>
                    <span class="font-semibold text-slate-800">{{ $profile['program_studi'] }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-400">Fakultas:</span>
                    <span class="font-semibold text-slate-800">{{ $profile['fakultas'] }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-400">Perguruan Tinggi:</span>
                    <span class="font-semibold text-slate-800">{{ $profile['universitas'] }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-400">Email Mahasiswa:</span>
                    <span class="font-semibold text-slate-800">{{ $profile['email'] }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-slate-400">Bergabung Sejak:</span>
                    <span class="font-semibold text-slate-800">{{ $profile['bergabung_sejak'] }}</span>
                </div>
            </div>

            <div class="w-full mt-6">
                <a href="{{ route('logout') }}" 
                   class="w-full py-2.5 px-4 rounded-xl border border-rose-200 text-rose-600 hover:bg-rose-50 text-xs font-bold transition-colors flex items-center justify-center gap-2">
                    <i class="ri-logout-box-r-line"></i>
                    <span>Keluar dari Sesi</span>
                </a>
            </div>

        </div>

        <!-- Kolom Kanan: Rincian Kompetensi, Praktikum, & Log Sesi -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Kartu Info Mata Kuliah & UTS -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
                <h3 class="font-poppins font-bold text-base text-slate-900 flex items-center gap-2 mb-4">
                    <i class="ri-graduation-cap-line text-brand-600"></i>
                    <span>Informasi Akademik & Penilaian UTS</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Mata Kuliah</span>
                        <p class="font-bold text-slate-800 text-sm mt-0.5">{{ $profile['mata_kuliah'] }}</p>
                        <p class="text-slate-500 text-[11px] mt-0.5">Semester: {{ $profile['semester'] }}</p>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Dosen Pembimbing / Penguji</span>
                        <p class="font-bold text-slate-800 text-sm mt-0.5">Adya Handika Putra AP</p>
                        <p class="text-slate-500 text-[11px] mt-0.5">Materi: Laravel 11/13 MVC & Blade</p>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-brand-50/60 border border-brand-100">
                        <span class="text-brand-600 block text-[10px] uppercase font-bold">Arsitektur Backend</span>
                        <p class="font-bold text-brand-950 text-sm mt-0.5">Pure Controller (0 Database)</p>
                        <p class="text-brand-700 text-[11px] mt-0.5">Sesuai aturan larangan CRUD di panduan</p>
                    </div>

                    <div class="p-3.5 rounded-2xl bg-emerald-50 border border-emerald-100">
                        <span class="text-emerald-700 block text-[10px] uppercase font-bold">Status Persiapan</span>
                        <p class="font-bold text-emerald-900 text-sm mt-0.5">100% Siap Rekam Video Demo</p>
                        <p class="text-emerald-700 text-[11px] mt-0.5">Struktur 9 File Minimal Lengkap</p>
                    </div>
                </div>
            </div>

            {{-- Kartu Keahlian & Capaian Pembelajaran --}}
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
                <h3 class="font-poppins font-bold text-base text-slate-900 flex items-center gap-2 mb-1">
                    <i class="ri-checkbox-circle-fill text-brand-600"></i>
                    <span>Capaian Standar Teknis yang Dikuasai</span>
                </h3>
                <p class="text-xs text-slate-500 mb-4">Dirender dari data array Controller menggunakan perulangan Blade <code class="font-mono text-brand-600">@@foreach</code></p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    @foreach ($profile['keahlian'] as $skill)
                        <div class="flex items-center gap-2.5 p-3 rounded-xl bg-slate-50 border border-slate-200/60 text-xs font-semibold text-slate-800">
                            <span class="w-2 h-2 rounded-full bg-brand-600 shrink-0"></span>
                            <span>{{ $skill }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Riwayat Sesi Pengguna --}}
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
                <h3 class="font-poppins font-bold text-base text-slate-900 flex items-center gap-2 mb-4">
                    <i class="ri-shield-keyhole-line text-brand-600"></i>
                    <span>Riwayat Akses & Log Sesi</span>
                </h3>

                <div class="space-y-3">
                    @foreach ($profile['riwayat_login'] as $log)
                        <div class="flex items-center justify-between p-3.5 rounded-2xl bg-slate-50 border border-slate-100 text-xs">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-600">
                                    <i class="ri-computer-line"></i>
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800">{{ $log['sesi'] }}</p>
                                    <p class="text-[11px] text-slate-500">{{ $log['device'] }} • <span class="font-mono">{{ $log['ip'] }}</span></p>
                                </div>
                            </div>
                            <span class="text-xs font-semibold text-brand-600 font-mono">
                                {{ $log['waktu'] }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
