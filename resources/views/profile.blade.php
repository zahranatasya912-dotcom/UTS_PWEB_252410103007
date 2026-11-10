@extends('layouts.app')

@section('title', 'Profile - UTS Pemrograman Web')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">

    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
        <h1 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b border-gray-200">Profil Mahasiswa</h1>

        <div class="space-y-3 text-sm">
            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Username Login (Request):</span>
                <span class="font-bold text-indigo-600 font-mono">{{ $username }}</span>
            </div>

            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Nama Mahasiswa:</span>
                <span class="font-bold text-gray-800">{{ $mahasiswa['nama'] }}</span>
            </div>

            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-500 font-medium">NIM:</span>
                <span class="font-bold text-gray-800 font-mono">{{ $mahasiswa['nim'] }}</span>
            </div>

            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Program Studi:</span>
                <span class="text-gray-800">{{ $mahasiswa['prodi'] }}</span>
            </div>

            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Fakultas:</span>
                <span class="text-gray-800">{{ $mahasiswa['fakultas'] }}</span>
            </div>

            <div class="flex justify-between py-2 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Perguruan Tinggi:</span>
                <span class="text-gray-800">{{ $mahasiswa['universitas'] }}</span>
            </div>

            <div class="flex justify-between py-2">
                <span class="text-gray-500 font-medium">Email:</span>
                <span class="text-gray-800">{{ $mahasiswa['email'] }}</span>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-gray-100">
            <a href="{{ route('dashboard', ['username' => $username]) }}" 
               class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </div>

</div>
@endsection
