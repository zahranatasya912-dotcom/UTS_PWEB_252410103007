@php
    $currentUsername = $username ?? request()->query('username', 'Natasya Zulaikha');
    $currentRole = $role ?? request()->query('role', 'Administrator Logistik');
    $activePage = $active ?? '';
@endphp

<header x-data="{ mobileMenuOpen: false, userDropdownOpen: false }" class="bg-white border-b border-slate-200/80 sticky top-0 z-50 shadow-sm backdrop-blur-md bg-white/95">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-20">
            
            <!-- Logo & Brand Name -->
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard', ['username' => $currentUsername]) }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-xl bg-gradient-to-tr from-brand-600 to-indigo-500 flex items-center justify-center text-white shadow-md shadow-indigo-200 group-hover:scale-105 transition-transform duration-200">
                        <i class="ri-box-3-fill text-xl sm:text-2xl"></i>
                    </div>
                    <div>
                        <span class="font-poppins font-extrabold text-lg sm:text-xl text-slate-900 tracking-tight flex items-center gap-1.5">
                            StockFlow
                            <span class="text-[10px] font-semibold uppercase tracking-wider px-2 py-0.5 rounded-full bg-brand-50 text-brand-700 border border-brand-200">
                                UTS 2026
                            </span>
                        </span>
                        <p class="text-[11px] text-slate-500 font-medium hidden sm:block">Sistem Manajemen Logistik & Inventaris</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <nav class="hidden md:flex items-center gap-1.5">
                <a href="{{ route('dashboard', ['username' => $currentUsername]) }}" 
                   class="px-3.5 py-2 rounded-xl text-sm font-semibold transition-all duration-150 flex items-center gap-2 {{ $activePage === 'dashboard' ? 'bg-brand-50 text-brand-700 shadow-inner' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">
                    <i class="ri-dashboard-2-line text-base"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('pengelolaan', ['username' => $currentUsername]) }}" 
                   class="px-3.5 py-2 rounded-xl text-sm font-semibold transition-all duration-150 flex items-center gap-2 {{ $activePage === 'pengelolaan' ? 'bg-brand-50 text-brand-700 shadow-inner' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">
                    <i class="ri-archive-stack-line text-base"></i>
                    <span>Pengelolaan Data</span>
                </a>

                <a href="{{ route('profile', ['username' => $currentUsername]) }}" 
                   class="px-3.5 py-2 rounded-xl text-sm font-semibold transition-all duration-150 flex items-center gap-2 {{ $activePage === 'profile' ? 'bg-brand-50 text-brand-700 shadow-inner' : 'text-slate-600 hover:text-brand-600 hover:bg-slate-50' }}">
                    <i class="ri-user-settings-line text-base"></i>
                    <span>Profil Pengguna</span>
                </a>
            </nav>

            <!-- User Status & Dropdown Profile -->
            <div class="hidden md:flex items-center gap-3">
                <div class="relative" @click.away="userDropdownOpen = false">
                    <button type="button" @click="userDropdownOpen = !userDropdownOpen" 
                            class="flex items-center gap-3 p-1.5 pr-3 rounded-2xl hover:bg-slate-100 transition-colors border border-transparent hover:border-slate-200">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                            {{ strtoupper(substr($currentUsername, 0, 2)) }}
                        </div>
                        <div class="text-left">
                            <div class="flex items-center gap-1.5">
                                <span class="text-sm font-bold text-slate-800 leading-tight">{{ $currentUsername }}</span>
                                <i class="ri-arrow-down-s-line text-slate-400 text-xs transition-transform" :class="userDropdownOpen ? 'rotate-180' : ''"></i>
                            </div>
                            <span class="text-[11px] text-slate-500 font-medium block leading-tight">{{ $currentRole }}</span>
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="userDropdownOpen" x-cloak x-transition
                         class="absolute right-0 mt-2 w-64 rounded-2xl bg-white shadow-xl border border-slate-100 py-2 z-50">
                        <div class="px-4 py-3 border-b border-slate-100 bg-slate-50/70">
                            <p class="text-xs text-slate-500 font-medium">Masuk Sebagai:</p>
                            <p class="text-sm font-bold text-slate-900 truncate">{{ $currentUsername }}</p>
                            <p class="text-xs text-brand-600 font-semibold mt-0.5">{{ $currentRole }}</p>
                        </div>
                        <div class="p-1.5 space-y-0.5">
                            <a href="{{ route('profile', ['username' => $currentUsername]) }}" 
                               class="flex items-center gap-2.5 px-3 py-2 text-xs font-medium text-slate-700 rounded-xl hover:bg-slate-100 hover:text-brand-600 transition-colors">
                                <i class="ri-user-3-line text-sm text-slate-400"></i>
                                <span>Lihat Profil Lengkap</span>
                            </a>
                            <a href="{{ route('pengelolaan', ['username' => $currentUsername]) }}" 
                               class="flex items-center gap-2.5 px-3 py-2 text-xs font-medium text-slate-700 rounded-xl hover:bg-slate-100 hover:text-brand-600 transition-colors">
                                <i class="ri-table-line text-sm text-slate-400"></i>
                                <span>Kelola Data Inventaris</span>
                            </a>
                        </div>
                        <div class="border-t border-slate-100 p-1.5">
                            <a href="{{ route('logout') }}" 
                               class="flex items-center gap-2.5 px-3 py-2 text-xs font-semibold text-rose-600 rounded-xl hover:bg-rose-50 transition-colors">
                                <i class="ri-logout-box-r-line text-sm"></i>
                                <span>Logout dari Sistem</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center md:hidden">
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="p-2 rounded-xl text-slate-600 hover:text-brand-600 hover:bg-slate-100 focus:outline-none">
                    <i class="ri-menu-4-line text-2xl" x-show="!mobileMenuOpen"></i>
                    <i class="ri-close-line text-2xl" x-show="mobileMenuOpen" x-cloak></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Drawer -->
        <div x-show="mobileMenuOpen" x-cloak x-collapse class="md:hidden border-t border-slate-100 py-3 space-y-1">
            <div class="px-3 py-2.5 bg-slate-50 rounded-xl mb-2 flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-brand-600 flex items-center justify-center text-white font-bold text-sm">
                    {{ strtoupper(substr($currentUsername, 0, 2)) }}
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">{{ $currentUsername }}</p>
                    <p class="text-xs text-slate-500">{{ $currentRole }}</p>
                </div>
            </div>

            <a href="{{ route('dashboard', ['username' => $currentUsername]) }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ $activePage === 'dashboard' ? 'bg-brand-50 text-brand-700' : 'text-slate-700 hover:bg-slate-50' }}">
                <i class="ri-dashboard-2-line text-lg"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('pengelolaan', ['username' => $currentUsername]) }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ $activePage === 'pengelolaan' ? 'bg-brand-50 text-brand-700' : 'text-slate-700 hover:bg-slate-50' }}">
                <i class="ri-archive-stack-line text-lg"></i>
                <span>Pengelolaan Data</span>
            </a>

            <a href="{{ route('profile', ['username' => $currentUsername]) }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ $activePage === 'profile' ? 'bg-brand-50 text-brand-700' : 'text-slate-700 hover:bg-slate-50' }}">
                <i class="ri-user-settings-line text-lg"></i>
                <span>Profil Pengguna</span>
            </a>

            <div class="pt-2 border-t border-slate-100">
                <a href="{{ route('logout') }}" 
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-rose-600 hover:bg-rose-50">
                    <i class="ri-logout-box-r-line text-lg"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
</header>
