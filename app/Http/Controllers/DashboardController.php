<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Data ringkasan
        $totalProduk = Product::count();
        $totalMasuk = StockTransaction::where('type', 'masuk')->count();
        $totalKeluar = StockTransaction::where('type', 'keluar')->count();
        $totalUser = User::count();

        // Data stok produk untuk chart
        $stokProduk = Product::select('name', 'stock')->get();

        // Aktivitas pengguna terbaru
        $aktivitas = StockTransaction::latest()->take(5)->get();

        return view('layouts.admin.dashboard', compact(
            'totalProduk',
            'totalMasuk',
            'totalKeluar',
            'totalUser',
            'stokProduk',
            'aktivitas'
        ));
    }
}
