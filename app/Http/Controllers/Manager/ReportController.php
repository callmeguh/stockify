<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;              // Ganti Item -> Product
use App\Models\StockTransaction;     // Model transaksi stok
use App\Models\Category;             // Model kategori barang

class ReportController extends Controller
{
    /**
     * Laporan Stok Barang
     * Manager hanya bisa melihat, read-only
     */
    public function stock(Request $request)
    {
        $query = Product::query(); // <- ganti Item::query() menjadi Product::query()

        // Filter kategori jika ada
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter periode jika ada (berdasarkan updated_at)
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('updated_at', [$request->start_date, $request->end_date]);
        }

        $items = $query->with('category')->paginate(10);

        // Ambil semua kategori untuk dropdown filter
        $categories = Category::all();

        return view('layouts.manager.reports.stock', compact('items', 'categories'));
    }

    /**
     * Laporan Barang Masuk & Keluar
     */
    public function transactions(Request $request)
    {
        $query = StockTransaction::with('product', 'manager');

        // Filter periode berdasarkan created_at
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $transactions = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('layouts.manager.reports.transactions', compact('transactions'));
    }
}
