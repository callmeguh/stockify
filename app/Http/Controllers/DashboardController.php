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
        $totalMasuk = StockTransaction::where('type', 'in')->count();   // pakai 'in'
        $totalKeluar = StockTransaction::where('type', 'out')->count(); // pakai 'out'
        $totalUser = User::count();

        // Data stok produk untuk chart
        $stokProduk = Product::select('name', 'stock')->get();

        // Aktivitas terbaru
        $aktivitas = StockTransaction::latest()->take(5)->get();

        // Arahkan ke view admin dashboard
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
