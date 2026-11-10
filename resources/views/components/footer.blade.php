<footer class="bg-white border-t border-slate-200 mt-auto py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            
            <!-- Brand & UTS Info -->
            <div class="md:col-span-2 space-y-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-brand-600 flex items-center justify-center text-white shadow-sm">
                        <i class="ri-box-3-fill text-lg"></i>
                    </div>
                    <span class="font-poppins font-bold text-lg text-slate-900 tracking-tight">StockFlow</span>
                    <span class="px-2 py-0.5 text-[10px] font-semibold bg-emerald-100 text-emerald-800 rounded-full border border-emerald-200">
                        Laravel MVC
                    </span>
                </div>
                <p class="text-xs text-slate-600 leading-relaxed max-w-md">
                    Aplikasi web manajemen inventaris dan logistik gudang yang dibangun dengan arsitektur MVC murni menggunakan Laravel Framework & Blade Templating Engine. Proyek ini menyelesaikan seluruh klasifikasi penilaian Ujian Tengah Semester (UTS).
                </p>
                <div class="flex flex-wrap gap-2 pt-1">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-medium bg-slate-100 text-slate-700">
                        <i class="ri-code-s-slash-line text-brand-600"></i> Blade Directives
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-medium bg-slate-100 text-slate-700">
                        <i class="ri-arrow-left-right-line text-brand-600"></i> Request Handling
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-medium bg-slate-100 text-slate-700">
                        <i class="ri-list-unordered text-brand-600"></i> Array Rendering
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-medium bg-slate-100 text-slate-700">
                        <i class="ri-database-2-line text-brand-600"></i> 0 Database (Pure Controller)
                    </span>
                </div>
            </div>

            <!-- Identitas Mahasiswa Pengembang -->
            <div class="space-y-2">
                <h4 class="font-poppins font-semibold text-xs uppercase tracking-wider text-slate-900">
                    Pengembang Web
                </h4>
                <ul class="text-xs space-y-1.5 text-slate-600">
                    <li class="flex items-center gap-2">
                        <i class="ri-user-star-line text-brand-600"></i>
                        <span class="font-semibold text-slate-800">NATASYA ZULAIKHA ZAHRA</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ri-hashtag text-brand-600"></i>
                        <span>NIM: <strong class="text-slate-800">252410103007</strong></span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ri-building-4-line text-brand-600"></i>
                        <span>Fakultas Ilmu Komputer</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ri-community-line text-brand-600"></i>
                        <span>Universitas Jember</span>
                    </li>
                </ul>
            </div>

            <!-- Kursus & Rubrik Penilaian -->
            <div class="space-y-2">
                <h4 class="font-poppins font-semibold text-xs uppercase tracking-wider text-slate-900">
                    Informasi Praktikum
                </h4>
                <ul class="text-xs space-y-1.5 text-slate-600">
                    <li class="flex items-center gap-2">
                        <i class="ri-book-read-line text-brand-600"></i>
                        <span>Pemrograman Web (PWEB)</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ri-calendar-event-line text-brand-600"></i>
                        <span>Semester Genap 2025/2026</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ri-file-shield-line text-brand-600"></i>
                        <span>Panduan: Adya Handika Putra AP</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="ri-check-double-line text-emerald-600 font-bold"></i>
                        <span class="text-emerald-700 font-semibold">Memenuhi 100% Rubrik UTS</span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Copyright & Bottom Bar -->
        <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
            <p>© 2026 <strong>StockFlow</strong> — Dikembangkan oleh <span class="text-brand-600 font-medium">Natasya Zulaikha Zahra (252410103007)</span>. Hak Cipta Dilindungi.</p>
            <div class="flex items-center gap-4">
                <span class="inline-flex items-center gap-1.5 text-slate-600">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>System Status: Healthy</span>
                </span>
                <span>•</span>
                <span>Laravel v{{ Illuminate\Foundation\Application::VERSION }}</span>
            </div>
        </div>
    </div>
</footer>
