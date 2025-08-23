<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockTransaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung stok menipis (threshold ≤ 5)
        $stokMenipis = Product::where('stock', '<=', 5)->count();

        // Hitung barang masuk hari ini
        $barangMasuk = StockTransaction::where('type', 'in')
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Hitung barang keluar hari ini
        $barangKeluar = StockTransaction::where('type', 'out')
            ->whereDate('created_at', Carbon::today())
            ->count();

        // Tampilkan view dashboard manager
        return view('layouts.manager.dashboard.index', compact(
            'stokMenipis',
            'barangMasuk',
            'barangKeluar'
        ));
    }
}
