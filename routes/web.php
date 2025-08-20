<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController; // nanti untuk pengaturan
use Illuminate\Support\Facades\Route;

// ======================= HALAMAN UTAMA =========================
Route::get('/', function () {
    return redirect()->route('login');
});

// ==================== REDIRECT SESUAI ROLE ===================
Route::get('/redirect', function () {
    $role = auth()->user()->role;

    return match ($role) {
        'admin'   => redirect()->route('admin.dashboard'),
        'manajer' => redirect()->route('manajer.index'),
        'staff'   => redirect()->route('staff.index'),
        default   => redirect()->route('dashboard'),
    };
})->middleware(['auth'])->name('redirect');

// ======================= ADMIN =========================
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', function () {
        return view('layouts.admin.dashboard');
    })->name('admin.dashboard');

    // CRUD Kategori
    Route::resource('categories', CategoryController::class);

    // CRUD Supplier
    Route::resource('suppliers', SupplierController::class);

    // CRUD Produk
    Route::resource('products', ProductController::class);

    // CRUD Stok (khusus index, create, store)
    Route::resource('stocks', StockController::class)->only(['index','create','store']);

    // CRUD Pengguna
    Route::resource('users', UserController::class);

    // ✅ Menu Pengaturan
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // ====================== PRACTICE ======================
    Route::prefix('practice')
        ->name('practice.')
        ->group(function () {
            Route::get('/', fn() => view('pages.practice.index'))->name('index');
            Route::get('/product', [ProductController::class, 'index'])->name('produk');
            Route::get('/categories', [CategoryController::class, 'index'])->name('kategori');
            Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');

            // Redirect ke stok index dari resource
            Route::get('/stok', fn() => redirect()->route('stocks.index'))->name('stok');
        });
});

// ======================= MANAJER ========================
Route::middleware(['auth', 'role:manajer'])->group(function () {
    Route::get('/manajer', function () {
        return view('layouts.manager.dashboard.index');
    })->name('manajer.index');
});

// ======================= STAFF =========================
Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff', function () {
        return view('layouts.staff.dashboard.index');
    })->name('staff.index');
});

// ==================== DASHBOARD UMUM ===================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==================== PROFILE (breeze) =================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
