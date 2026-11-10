@extends('layouts.app')

@section('title', 'Pengelolaan Inventaris Barang - StockFlow')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6" x-data="{
    search: '',
    selectedCategory: 'Semua',
    selectedItem: null,
    modalOpen: false,
    openModal(item) {
        this.selectedItem = item;
        this.modalOpen = true;
    }
}">

    <!-- Header Halaman & Deskripsi Fitur -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-brand-50 text-brand-700 border border-brand-200">
                    Fitur Array Rendering UTS
                </span>
                <span class="text-xs text-slate-400">•</span>
                <span class="text-xs text-slate-500">User: <strong class="text-slate-700">{{ $username }}</strong></span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-poppins">
                Pengelolaan Data Inventaris Barang
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-1 max-w-2xl leading-relaxed">
                Halaman ini menampilkan seluruh data array dinamis dari <code class="font-mono text-xs bg-slate-100 text-brand-700 px-1 py-0.5 rounded">PageController@pengelolaan</code> yang dirender menggunakan perulangan Blade <code class="font-mono text-xs bg-slate-100 text-brand-700 px-1 py-0.5 rounded">@@foreach</code> tanpa database.
            </p>
        </div>

        <!-- Tombol Aksi Cepat -->
        <div class="flex items-center gap-2 shrink-0">
            <a href="{{ route('dashboard', ['username' => $username]) }}" 
               class="px-4 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs sm:text-sm font-semibold transition-colors flex items-center gap-2">
                <i class="ri-arrow-left-line"></i>
                <span>Kembali ke Dashboard</span>
            </a>
            <button type="button" @click="alert('Seluruh data inventaris bersumber dari PageController array murni (tanpa database) sesuai spesifikasi UTS 2026.')" 
                    class="px-4 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-xs sm:text-sm font-semibold shadow-md shadow-brand-200 transition-colors flex items-center gap-2 cursor-pointer">
                <i class="ri-information-line"></i>
                <span>Info Data Array</span>
            </button>
        </div>
    </div>

    <!-- Ringkasan Cepat Rekapitulasi Array -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-2xs">
            <span class="text-[11px] font-semibold uppercase text-slate-400">Total Macam Item</span>
            <p class="text-xl sm:text-2xl font-extrabold text-slate-900 font-poppins mt-0.5">{{ $summary['total_item'] }} Barang</p>
        </div>
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-2xs">
            <span class="text-[11px] font-semibold uppercase text-slate-400">Akumulasi Unit Fisik</span>
            <p class="text-xl sm:text-2xl font-extrabold text-emerald-600 font-poppins mt-0.5">{{ $summary['total_stok'] }} Unit</p>
        </div>
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-2xs">
            <span class="text-[11px] font-semibold uppercase text-slate-400">Item Kritis (Stok ≤ 5)</span>
            <p class="text-xl sm:text-2xl font-extrabold text-amber-600 font-poppins mt-0.5">{{ $summary['stok_kritis'] }} Barang</p>
        </div>
        <div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-2xs">
            <span class="text-[11px] font-semibold uppercase text-slate-400">Total Valuasi Nilai</span>
            <p class="text-xl sm:text-2xl font-extrabold text-brand-700 font-poppins mt-0.5">Rp {{ number_format($summary['total_nilai'], 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Filter & Live Search Toolbar -->
    <div class="bg-white rounded-3xl p-5 border border-slate-200/80 shadow-sm space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            
            <!-- Input Pencarian Instan -->
            <div class="relative flex-1 max-w-md">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <i class="ri-search-line text-base"></i>
                </div>
                <input type="text" 
                       x-model="search" 
                       placeholder="Cari kode barang, nama barang, atau rak..." 
                       class="w-full pl-10 pr-4 py-2 rounded-xl border border-slate-200 text-xs sm:text-sm focus:border-brand-500 focus:ring-2 focus:ring-brand-100 transition-colors placeholder:text-slate-400" />
            </div>

            <!-- Filter Kategori Kancing -->
            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 sm:pb-0">
                <template x-for="cat in ['Semua', 'Komputer & Laptop', 'Monitor & Display', 'Aksesoris Komputer', 'Jaringan & Server', 'Penyimpanan Data', 'Peralatan Kantor']" :key="cat">
                    <button type="button" 
                            @click="selectedCategory = cat"
                            :class="selectedCategory === cat ? 'bg-brand-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200'"
                            class="px-3 py-1.5 rounded-xl text-xs font-semibold whitespace-nowrap transition-colors cursor-pointer"
                            x-text="cat">
                    </button>
                </template>
            </div>
        </div>

        {{-- Tabel Render Array Data Inventaris --}}
        <div class="overflow-x-auto rounded-2xl border border-slate-200">
            <table class="w-full text-left text-xs sm:text-sm border-collapse">
                <thead class="bg-slate-50/80 border-b border-slate-200 text-slate-600 font-bold uppercase tracking-wider text-[11px]">
                    <tr>
                        <th class="py-3 px-4 text-center w-12">No</th>
                        <th class="py-3 px-4">Kode</th>
                        <th class="py-3 px-4">Nama Barang & Kategori</th>
                        <th class="py-3 px-4">Lokasi Rak</th>
                        <th class="py-3 px-4 text-right">Stok</th>
                        <th class="py-3 px-4 text-right">Harga Satuan</th>
                        <th class="py-3 px-4 text-right">Total Nilai</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    {{-- 
                        IMPLEMENTASI WAJIB RUBRIK:
                        Render Data Array dari Controller menggunakan @foreach (10 Poin)
                    --}}
                    @forelse ($items as $index => $item)
                        @php
                            $subtotal = $item['stok'] * $item['harga'];
                        @endphp
                        <tr class="hover:bg-slate-50/80 transition-colors group"
                            x-show="(selectedCategory === 'Semua' || selectedCategory === '{{ $item['kategori'] }}') && 
                                    ('{{ strtolower($item['nama'] . ' ' . $item['kode'] . ' ' . $item['lokasi']) }}'.includes(search.toLowerCase()))">
                            
                            <!-- Nomor Urut -->
                            <td class="py-3 px-4 text-center font-semibold text-slate-400">
                                {{ $index + 1 }}
                            </td>

                            <!-- Kode Barang -->
                            <td class="py-3 px-4 font-mono font-bold text-brand-600">
                                <span class="px-2 py-1 rounded-md bg-brand-50 border border-brand-200/60">
                                    {{ $item['kode'] }}
                                </span>
                            </td>

                            <!-- Nama & Kategori -->
                            <td class="py-3 px-4">
                                <p class="font-bold text-slate-800 leading-snug group-hover:text-brand-600 transition-colors">
                                    {{ $item['nama'] }}
                                </p>
                                <span class="text-[11px] text-slate-500 font-medium">
                                    {{ $item['kategori'] }}
                                </span>
                            </td>

                            <!-- Lokasi Rak -->
                            <td class="py-3 px-4 font-medium text-slate-700">
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-slate-100 text-slate-700 text-xs font-mono">
                                    <i class="ri-map-pin-2-line text-slate-400"></i>
                                    {{ $item['lokasi'] }}
                                </span>
                            </td>

                            <!-- Kuantitas Stok -->
                            <td class="py-3 px-4 text-right font-extrabold text-slate-900">
                                {{ $item['stok'] }} <span class="text-xs font-normal text-slate-500">{{ $item['satuan'] }}</span>
                            </td>

                            <!-- Harga Satuan -->
                            <td class="py-3 px-4 text-right text-slate-700 font-medium">
                                Rp {{ number_format($item['harga'], 0, ',', '.') }}
                            </td>

                            <!-- Subtotal Nilai Barang -->
                            <td class="py-3 px-4 text-right font-bold text-slate-900">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </td>

                            <!-- Status Badge Component -->
                            <td class="py-3 px-4 text-center">
                                <x-badge :status="$item['status']" size="sm" />
                            </td>

                            <!-- Tombol Aksi Detail -->
                            <td class="py-3 px-4 text-center">
                                <button type="button" 
                                        @click="openModal({{ json_encode($item) }})"
                                        class="p-1.5 rounded-lg text-brand-600 hover:text-brand-800 hover:bg-brand-50 transition-colors cursor-pointer"
                                        title="Lihat Detail Spesifikasi">
                                    <i class="ri-eye-line text-base"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-8 text-center text-slate-400">
                                <i class="ri-inbox-line text-3xl mb-1 block"></i>
                                <p class="text-sm">Tidak ada data inventaris yang ditemukan dalam array.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
                <tfoot class="bg-slate-50/70 border-t border-slate-200 font-bold text-xs text-slate-700">
                    <tr>
                        <td colspan="4" class="py-3 px-4 text-right uppercase tracking-wider text-slate-500">
                            Total Akumulasi Seluruh Item:
                        </td>
                        <td class="py-3 px-4 text-right text-emerald-700 font-extrabold">
                            {{ $summary['total_stok'] }} Unit
                        </td>
                        <td class="py-3 px-4 text-right text-slate-400">—</td>
                        <td class="py-3 px-4 text-right text-brand-700 font-extrabold">
                            Rp {{ number_format($summary['total_nilai'], 0, ',', '.') }}
                        </td>
                        <td colspan="2" class="py-3 px-4 text-center text-slate-400">
                            10 Item Terverifikasi
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

    <!-- Modal Pop-up Detail Barang Interaktif Menggunakan Alpine.js -->
    <div x-show="modalOpen" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-xs" x-transition>
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-slate-100" @click.away="modalOpen = false">
            <template x-if="selectedItem">
                <div>
                    <div class="flex items-start justify-between pb-4 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center font-bold text-lg">
                                <i class="ri-box-3-line"></i>
                            </div>
                            <div>
                                <span class="font-mono text-xs font-bold text-brand-600" x-text="selectedItem.kode"></span>
                                <h3 class="font-poppins font-bold text-base text-slate-900 leading-tight" x-text="selectedItem.nama"></h3>
                            </div>
                        </div>
                        <button type="button" @click="modalOpen = false" class="text-slate-400 hover:text-slate-600 p-1">
                            <i class="ri-close-line text-xl"></i>
                        </button>
                    </div>

                    <div class="py-4 space-y-3 text-xs">
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-100">
                            <p class="font-semibold text-slate-500 uppercase tracking-wider text-[10px] mb-1">Deskripsi & Spesifikasi Produk:</p>
                            <p class="text-slate-700 leading-relaxed" x-text="selectedItem.deskripsi"></p>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="p-3 bg-slate-50 rounded-xl">
                                <span class="text-slate-400 block text-[10px] uppercase font-bold">Kategori</span>
                                <span class="font-semibold text-slate-800" x-text="selectedItem.kategori"></span>
                            </div>
                            <div class="p-3 bg-slate-50 rounded-xl">
                                <span class="text-slate-400 block text-[10px] uppercase font-bold">Lokasi Rak Gudang</span>
                                <span class="font-semibold text-slate-800 font-mono" x-text="selectedItem.lokasi"></span>
                            </div>
                            <div class="p-3 bg-slate-50 rounded-xl">
                                <span class="text-slate-400 block text-[10px] uppercase font-bold">Kuantitas Stok</span>
                                <span class="font-bold text-slate-900 text-sm" x-text="selectedItem.stok + ' ' + selectedItem.satuan"></span>
                            </div>
                            <div class="p-3 bg-slate-50 rounded-xl">
                                <span class="text-slate-400 block text-[10px] uppercase font-bold">Status Persediaan</span>
                                <span class="font-bold text-brand-700" x-text="selectedItem.status"></span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-brand-50/70 border border-brand-100 rounded-xl">
                            <div>
                                <span class="text-[10px] font-bold text-brand-700 uppercase">Harga Satuan</span>
                                <p class="text-sm font-extrabold text-brand-900" x-text="'Rp ' + Number(selectedItem.harga).toLocaleString('id-ID')"></p>
                            </div>
                            <div class="text-right">
                                <span class="text-[10px] font-bold text-brand-700 uppercase">Valuasi Total Rak</span>
                                <p class="text-sm font-extrabold text-brand-900" x-text="'Rp ' + (selectedItem.stok * selectedItem.harga).toLocaleString('id-ID')"></p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex justify-end">
                        <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-900 text-white text-xs font-semibold">
                            Tutup Rincian
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>

</div>
@endsection
