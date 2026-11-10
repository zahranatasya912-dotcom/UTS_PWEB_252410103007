<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Web')</title>

    <!-- Tailwind CSS CDN (Wajib ada agar styling jalan) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    {{-- Memanggil Component Navbar --}}
    @include('components.navbar')

    {{-- Konten Utama Halaman --}}
    <main class="flex-1 max-w-5xl mx-auto w-full px-4 py-8">
        @yield('content')
    </main>

    {{-- Memanggil Component Footer --}}
    @include('components.footer')

</body>
</html>