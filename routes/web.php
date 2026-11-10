<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes - UTS Pemrograman Web 2026
|--------------------------------------------------------------------------
| Seluruh alur navigasi aplikasi web diatur melalui PageController
| sesuai standar arsitektur Model-View-Controller (MVC) murni.
|
| Mahasiswa : NATASYA ZULAIKHA ZAHRA
| NIM       : 252410103007
|--------------------------------------------------------------------------
*/

// Redirect halaman root langsung ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// 1. Rute Halaman Login (Tampilan & Pemrosesan Request POST)
Route::get('/login', [PageController::class, 'showLogin'])->name('login');
Route::post('/login', [PageController::class, 'processLogin'])->name('login.process');

// 2. Rute Halaman Dashboard (Menerima username dari Request Parameter)
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

// 3. Rute Halaman Pengelolaan Data Array (Render data dinamis dengan @foreach)
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');

// 4. Rute Halaman Profile (Membuktikan data flow username ke Dashboard dan Profile)
Route::get('/profile', [PageController::class, 'profile'])->name('profile');

// 5. Rute Logout
Route::get('/logout', [PageController::class, 'logout'])->name('logout');
