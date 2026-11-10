<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'StockFlow | Sistem Manajemen Inventaris Gudang')</title>

    <!-- Google Fonts: Poppins & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- RemixIcon CDN -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js CDN for UI Interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-poppins { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-slate-50 text-slate-800 antialiased selection:bg-indigo-500 selection:text-white">

    {{-- Implementasi Blade Directive @include untuk Navbar Komponen --}}
    @include('components.navbar')

    {{-- Container Notifikasi Pesan Flash (Success / Error / Info) --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-4" x-data="{ show: true }" x-show="show" x-transition>
            <div class="flex items-center justify-between p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold shrink-0">
                        <i class="ri-checkbox-circle-fill text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-sm">Operasi Berhasil</p>
                        <p class="text-xs text-emerald-700">{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" @click="show = false" class="text-emerald-500 hover:text-emerald-800 p-1">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
        </div>
    @endif

    @if(session('info'))
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 mt-4" x-data="{ show: true }" x-show="show" x-transition>
            <div class="flex items-center justify-between p-4 bg-blue-50 border border-blue-200 text-blue-800 rounded-xl shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 font-bold shrink-0">
                        <i class="ri-information-fill text-lg"></i>
                    </div>
                    <p class="text-sm font-medium">{{ session('info') }}</p>
                </div>
                <button type="button" @click="show = false" class="text-blue-500 hover:text-blue-800 p-1">
                    <i class="ri-close-line text-lg"></i>
                </button>
            </div>
        </div>
    @endif

    {{-- Implementasi Blade Directive @yield untuk Konten Utama Halaman --}}
    <main class="flex-1 py-6 sm:py-8">
        @yield('content')
    </main>

    {{-- Implementasi Blade Directive @include untuk Footer Komponen --}}
    @include('components.footer')

    @yield('scripts')
</body>
</html>
