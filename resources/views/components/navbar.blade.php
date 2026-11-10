@php
    $user = $username ?? request('username', 'Natasya Zulaikha');
@endphp

<nav class="bg-indigo-600 text-white shadow-md">
    <div class="max-w-5xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">

            <!-- Navigasi Halaman -->
            <div class="flex items-center space-x-6 text-sm font-medium">
                <a href="{{ route('dashboard', ['username' => $user]) }}" class="hover:text-indigo-200 transition">
                    Dashboard
                </a>
                <a href="{{ route('pengelolaan', ['username' => $user]) }}" class="hover:text-indigo-200 transition">
                    Pengelolaan
                </a>
                <a href="{{ route('profile', ['username' => $user]) }}" class="hover:text-indigo-200 transition">
                    Profile
                </a>
            </div>

            <!-- User Info & Logout -->
            <div class="flex items-center space-x-4 text-sm">
                <span class="bg-indigo-700 px-3 py-1 rounded-full text-xs">
                    {{ $user }}
                </span>
                <a href="{{ route('logout') }}" class="text-xs bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded transition">
                    Logout
                </a>
            </div>

        </div>
    </div>
</nav>