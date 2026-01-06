<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\User\PeminjamanController;
use App\Http\Controllers\User\BarangController as BarangUserController;

Route::get('/', function () {
    return view('landing.home');
})->name('home');

Route::get('/kontak', function () {
    return view('landing.kontak');
})->name('kontak');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/peminjaman/alat/barang', [BarangUserController::class, 'index'])
        ->name('user.barang.index');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/dashboard', fn () => view('user.dashboard'))
        ->name('user.dashboard');

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])
        ->name('user.peminjaman.index');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::get('/user/peminjaman', [PeminjamanController::class, 'index'])
        ->name('user.peminjaman');
});

Route::prefix('admin')->name('admin.')->group(function () {

    // login admin (tanpa auth)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // semua halaman admin (wajib auth)
    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/barang', BarangController::class)->except(['show']);

        // loans
        Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
        Route::patch('/loans/{id}/status', [LoanController::class, 'updateStatus'])->name('loans.updateStatus');
        Route::put('/loans/{id}/verify', [LoanController::class, 'verify'])->name('loans.verify');
        Route::put('/loans/{loan}', [LoanController::class, 'update'])->name('admin.loans.update');
        Route::get('/loans/{loan}', [LoanController::class, 'show'])->name('loans.show');


        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});

// Route::prefix('admin')->middleware(['auth'])->group(function () {

//     Route::get('/loans/{loan}', 
//         [App\Http\Controllers\Admin\LoanController::class, 'show']
//     )->name('admin.loans.show');

//     Route::put('/loans/{loan}/verify',
//         [App\Http\Controllers\Admin\LoanController::class, 'verify']
//     )->name('admin.loans.verify');

// });


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/peminjaman/alat/barang/{barang}', 
    [BarangUserController::class, 'show']
)->name('user.barang.show');

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {

    Route::get('/barang', [\App\Http\Controllers\User\BarangController::class, 'index'])
        ->name('barang.index');

    Route::get('/peminjaman/{barang}/create',
        [\App\Http\Controllers\User\PeminjamanController::class, 'create'])
        ->name('peminjaman.create');
});


Route::middleware('auth')->prefix('user')->name('user.')->group(function () {

    Route::get('/barang', [BarangController::class, 'index'])
        ->name('barang.index');

    Route::get('/peminjaman/{barang}/create',
        [PeminjamanController::class, 'create'])
        ->name('peminjaman.create');

    Route::post('/peminjaman',
        [PeminjamanController::class, 'store'])
        ->name('peminjaman.store');
});

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('peminjaman/{barang}/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index'); // opsional: daftar peminjaman user
});

require __DIR__.'/auth.php';
