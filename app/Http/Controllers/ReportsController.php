<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\ActivityLog;

class ReportsController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->filled('start_date') ? $request->start_date . ' 00:00:00' : null;
        $endDate   = $request->filled('end_date')   ? $request->end_date . ' 23:59:59'   : null;

        // ---------------- Laporan Stok Barang ----------------
        $stokQuery = Product::with('category');
        if ($request->filled('category')) {
            $stokQuery->where('category_id', $request->category);
        }
        if ($startDate && $endDate) {
            $stokQuery->whereBetween('updated_at', [$startDate, $endDate]);
        }
        $stokBarang = $stokQuery->get();

        // ---------------- Laporan Transaksi ----------------
        $transaksiQuery = StockTransaction::with('product');
        if ($startDate && $endDate) {
            $transaksiQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        $transaksiBarang = $transaksiQuery->latest()->get();

        // ---------------- Laporan Aktivitas Pengguna ----------------
        $aktivitasQuery = ActivityLog::with('user');
        if ($startDate && $endDate) {
            $aktivitasQuery->whereBetween('created_at', [$startDate, $endDate]);
        }
        $aktivitasPengguna = $aktivitasQuery->latest()->get();

        // ---------------- Kirim ke view ----------------
        return view('pages.reports.index', compact(
            'stokBarang',
            'transaksiBarang',
            'aktivitasPengguna'
        ));
    }
}
