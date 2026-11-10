@extends('layouts.app')

@section('title', 'Dashboard - UTS Pemrograman Web')

@section('content')
<div class="space-y-6">

    <!-- Card Sambutan & Request Parameter Username -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <h1 class="text-2xl font-bold text-gray-800">
            Selamat Datang, {{ $username }}!
        </h1>
        <p class="text-sm text-gray-600 mt-1">
            Data username di atas berhasil diterima melalui Request Parameter dari halaman Login.
        </p>
    </div>

    <!-- Ringkasan Statistik Sederhana -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-xs font-semibold text-gray-500 uppercase">Total Jenis Barang</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $totalBarang }} Item</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
            <h3 class="text-xs font-semibold text-gray-500 uppercase">Total Stok Fisik</h3>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $totalStok }} Unit</p>
        </div>
    </div>

    <!-- Navigasi Cepat -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex flex-wrap gap-3">
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded transition">
            Lihat Pengelolaan Data
        </a>
        <a href="{{ route('profile', ['username' => $username]) }}" 
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium px-4 py-2 rounded transition">
            Lihat Halaman Profile
        </a>
    </div>

</div>
@endsection
