@extends('layouts.app')

@section('title', 'Login Pengguna - StockFlow')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-8">
    <div class="max-w-md mx-auto">
        
        <!-- Header Kartu Login -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-brand-600 to-indigo-500 text-white shadow-lg shadow-indigo-200 mb-4">
                <i class="ri-shield-user-fill text-3xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-poppins">
                Masuk ke StockFlow
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">
                Simulasi autentikasi untuk pengiriman data <span class="font-semibold text-brand-600">Username</span> ke Dashboard & Profil.
            </p>
        </div>

        <!-- Box Formulir Login -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xl shadow-slate-200/50">
            
            {{-- Error Validasi --}}
            @if ($errors->any())
                <div class="mb-5 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
                    <div class="flex items-center gap-2 font-bold mb-1">
                        <i class="ri-error-warning-fill text-base text-rose-600"></i>
                        <span>Terjadi Kesalahan Pengisian:</span>
                    </div>
                    <ul class="list-disc list-inside space-y-0.5 text-rose-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="space-y-5" id="loginForm">
                @csrf

                <!-- Input Username -->
                <div>
                    <label for="username" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Username Mahasiswa / Pengguna <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="ri-user-line text-lg"></i>
                        </div>
                        <input type="text" 
                               name="username" 
                               id="username" 
                               value="{{ old('username', $defaultUsername ?? 'Natasya Zulaikha') }}" 
                               required
                               placeholder="Masukkan Username Anda"
                               class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-brand-500 focus:ring-2 focus:ring-brand-200 transition-colors placeholder:text-slate-400 font-medium text-slate-800" />
                    </div>
                    <p class="text-[11px] text-slate-400 mt-1">Nilai username ini akan diteruskan ke halaman Dashboard & Profil via Controller.</p>
                </div>

                <!-- Input Password -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                            Kata Sandi (Password) <span class="text-rose-500">*</span>
                        </label>
                        <span class="text-[11px] text-slate-400">Simulasi (Bebas)</span>
                    </div>
                    <div class="relative" x-data="{ showPass: false }">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="ri-lock-2-line text-lg"></i>
                        </div>
                        <input :type="showPass ? 'text' : 'password'" 
                               name="password" 
                               id="password" 
                               value="uts_pweb_2026"
                               required
                               placeholder="Masukkan Password"
                               class="w-full pl-10 pr-10 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-brand-500 focus:ring-2 focus:ring-brand-200 transition-colors placeholder:text-slate-400 font-medium text-slate-800" />
                        <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600">
                            <i :class="showPass ? 'ri-eye-off-line' : 'ri-eye-line'"></i>
                        </button>
                    </div>
                </div>

                <!-- Pilihan Peran (Role) -->
                <div>
                    <label for="role" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                        Peran Akses (Role)
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="ri-user-star-line text-lg"></i>
                        </div>
                        <select name="role" id="role" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-brand-500 focus:ring-2 focus:ring-brand-200 transition-colors bg-white font-medium text-slate-800">
                            <option value="Administrator Logistik">Administrator Logistik (Full Access)</option>
                            <option value="Manajer Gudang">Manajer Gudang</option>
                            <option value="Staf Inventaris">Staf Inventaris</option>
                        </select>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" 
                        class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-brand-600 to-indigo-600 hover:from-brand-700 hover:to-indigo-700 text-white font-semibold text-sm shadow-md shadow-indigo-200 hover:shadow-lg transition-all flex items-center justify-center gap-2 group cursor-pointer">
                    <span>Masuk ke Dashboard</span>
                    <i class="ri-arrow-right-line text-base group-hover:translate-x-1 transition-transform"></i>
                </button>
            </form>

            <!-- Tombol Preset Akun Cepat untuk Demo -->
            <div class="mt-6 pt-5 border-t border-slate-100">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400 text-center mb-2.5">
                    Pilihan Preset Cepat (Untuk Video Demo UTS)
                </p>
                <div class="grid grid-cols-2 gap-2">
                    <button type="button" 
                            onclick="setDemoAccount('Natasya Zulaikha', 'Administrator Logistik')"
                            class="px-2.5 py-1.5 text-xs font-medium rounded-lg bg-slate-50 border border-slate-200 hover:bg-brand-50 hover:border-brand-200 hover:text-brand-700 transition-colors text-slate-600 text-left">
                        <span class="font-bold block text-[11px]">Natasya (Admin)</span>
                        <span class="text-[10px] text-slate-400">NIM: 252410103007</span>
                    </button>
                    <button type="button" 
                            onclick="setDemoAccount('Adya Handika', 'Dosen Pembimbing')"
                            class="px-2.5 py-1.5 text-xs font-medium rounded-lg bg-slate-50 border border-slate-200 hover:bg-brand-50 hover:border-brand-200 hover:text-brand-700 transition-colors text-slate-600 text-left">
                        <span class="font-bold block text-[11px]">Adya Handika</span>
                        <span class="text-[10px] text-slate-400">Tester / Dosen</span>
                    </button>
                </div>
            </div>

        </div>

        <!-- Info Card Alur UTS -->
        <div class="mt-6 p-4 rounded-2xl bg-indigo-50/70 border border-indigo-100 text-xs text-indigo-900 flex items-start gap-3">
            <div class="w-6 h-6 rounded-lg bg-indigo-600 text-white flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">
                <i class="ri-lightbulb-line"></i>
            </div>
            <div>
                <p class="font-bold text-indigo-950">Alur Request Handling UTS 2026:</p>
                <p class="mt-0.5 text-indigo-800 leading-relaxed">
                    Saat form dikirimkan, Controller <code class="bg-white/80 px-1 py-0.5 rounded text-indigo-700 font-mono">PageController@processLogin</code> menangkap parameter <code class="font-mono">$request->username</code> lalu mengarahkannya ke Dashboard dan Profile sebagai Request Parameter.
                </p>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    function setDemoAccount(username, role) {
        document.getElementById('username').value = username;
        document.getElementById('role').value = role;
    }
</script>
@endsection
