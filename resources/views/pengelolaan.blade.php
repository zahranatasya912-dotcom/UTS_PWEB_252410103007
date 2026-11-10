@extends('layouts.app')

@section('title', 'Pengelolaan Data - UTS Pemrograman Web')

@section('content')
<div class="space-y-6">

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Pengelolaan Data Barang</h1>
            <p class="text-xs text-gray-500 mt-1">Data ditampilkan dari array di Controller menggunakan perulangan Blade.</p>
        </div>
        <span class="text-xs bg-gray-100 text-gray-600 px-3 py-1 rounded">
            User: <strong>{{ $username }}</strong>
        </span>
    </div>

    <!-- Tabel Data Array Menggunakan @foreach -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-700 text-xs uppercase border-b border-gray-200">
                <tr>
                    <th class="py-3 px-4 text-center">No</th>
                    <th class="py-3 px-4">Kode</th>
                    <th class="py-3 px-4">Nama Barang</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4 text-center">Stok</th>
                    <th class="py-3 px-4 text-right">Harga</th>
                    <th class="py-3 px-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($items as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 text-center">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 font-mono font-semibold text-indigo-600">{{ $item['kode'] }}</td>
                        <td class="py-3 px-4 font-medium">{{ $item['nama'] }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $item['kategori'] }}</td>
                        <td class="py-3 px-4 text-center font-bold">{{ $item['stok'] }}</td>
                        <td class="py-3 px-4 text-right">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td class="py-3 px-4 text-center">
                            @if($item['status'] == 'Tersedia')
                                <span class="bg-green-100 text-green-700 text-xs px-2.5 py-0.5 rounded-full font-semibold">
                                    {{ $item['status'] }}
                                </span>
                            @else
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-0.5 rounded-full font-semibold">
                                    {{ $item['status'] }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection