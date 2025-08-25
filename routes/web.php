<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportsController;

use App\Http\Controllers\Manager\DashboardController as ManagerDashboardController;
use App\Http\Controllers\Manager\ProductController as ManagerProductController;
use App\Http\Controllers\Manager\StockController as ManagerStockController;
use App\Http\Controllers\Manager\SupplierController as ManagerSupplierController;
use App\Http\Controllers\Manager\ReportController as ManagerReportController;

use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Staff\StockController as StaffStockController;

use App\Http\Controllers\Practice\ImportExportController;

use Illuminate\Support\Facades\Route;

// ======================= HALAMAN UTAMA =========================
Route::get('/', fn() => redirect()->route('login'));

// ==================== REDIRECT SESUAI ROLE ===================
Route::get('/redirect', function () {
    $role = auth()->user()->role;
    return match ($role) {
        'admin' => redirect()->route('admin.dashboard'),
        'manajer' => redirect()->route('manager.dashboard'),
        'staff' => redirect()->route('staff.dashboard'),
        default => redirect()->route('dashboard'),
    };
})->middleware(['auth'])->name('redirect');

// ======================= ADMIN =========================
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Master Data
    Route::resource('categories', CategoryController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('products', ProductController::class);

    // Stok & Opname
    Route::resource('stocks', StockController::class)->only(['index','create','store']);
    Route::get('/stocks/transactions/realtime', [StockController::class, 'transactionsRealtime'])->name('stocks.transactions.realtime');
    Route::get('/stocks/opname/realtime', [StockController::class, 'opnameRealtime'])->name('stocks.opname.realtime');
    Route::post('/stocks/minimum', [StockController::class, 'updateMinimum'])->name('stocks.minimum.store');

    // Users
    Route::resource('users', UserController::class);

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Reports
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/reports/activities', [ReportsController::class, 'activities'])->name('reports.activities');

    // Practice (latihan menu + import/export)
    Route::prefix('practice')->name('practice.')->group(function () {
        Route::get('/', fn() => view('pages.practice.index'))->name('index');
        Route::get('/product', [ProductController::class, 'index'])->name('produk');
        Route::get('/categories', [CategoryController::class, 'index'])->name('kategori');
        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
        Route::get('/stok', fn() => redirect()->route('stocks.index'))->name('stok');

        // Import/Export CSV
    Route::get('/import-export', [\App\Http\Controllers\Practice\ImportExportController::class, 'index'])
        ->name('import-export');

    Route::post('/import', [\App\Http\Controllers\Practice\ImportExportController::class, 'import'])
        ->name('import');

    Route::get('/export', [\App\Http\Controllers\Practice\ImportExportController::class, 'export'])
        ->name('export');
});
});

// ======================= MANAJER ========================
Route::middleware(['auth', 'role:manajer'])->prefix('manajer')->name('manager.')->group(function () {
    Route::get('/dashboard', [ManagerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [ManagerProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ManagerProductController::class, 'show'])->name('products.show');
    Route::get('/stocks/incoming', [ManagerStockController::class, 'incoming'])->name('stocks.incoming');
    Route::post('/stocks/incoming/store', [ManagerStockController::class, 'storeIncoming'])->name('stocks.incoming.store');
    Route::get('/stocks/outgoing', [ManagerStockController::class, 'outgoing'])->name('stocks.outgoing');
    Route::post('/stocks/outgoing/store', [ManagerStockController::class, 'storeOutgoing'])->name('stocks.outgoing.store');
    Route::get('/stocks/stock-opname', [ManagerStockController::class, 'stockOpname'])->name('stocks.opname');
    Route::get('/suppliers', [ManagerSupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/reports/stock', [ManagerReportController::class, 'stock'])->name('reports.stock');
    Route::get('/reports/transactions', [ManagerReportController::class, 'transactions'])->name('reports.transactions');
});

// ======================= STAFF =========================
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    Route::get('/stocks/incoming', [StaffStockController::class, 'incoming'])->name('stocks.incoming');
    Route::get('/stocks/outgoing', [StaffStockController::class, 'outgoing'])->name('stocks.outgoing');
    Route::post('/stocks/incoming/confirm/{id}', [StaffStockController::class, 'confirmIncoming'])->name('stocks.confirmIncoming');
    Route::post('/stocks/outgoing/confirm/{id}', [StaffStockController::class, 'confirmOutgoing'])->name('stocks.confirmOutgoing');
});

// ==================== DASHBOARD UMUM ===================
Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// ==================== PROFILE (Breeze) =================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
