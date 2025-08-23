<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;              // Model produk
use App\Models\StockTransaction;     // Model transaksi stok
use App\Models\UserActivity;         // Model aktivitas pengguna

class ReportsController extends Controller
{
    /**
     * Menampilkan halaman laporan admin
     */
    public function index(Request $request)
    {
        // ---------------------------
        // Laporan Stok Barang
        // ---------------------------
        $stokQuery = Product::with('category');

        // Filter kategori jika ada
        if ($request->filled('category')) {
            $stokQuery->where('category_id', $request->category);
        }

        // Filter periode jika ada (updated_at)
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $stokQuery->whereBetween('updated_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $stokBarang = $stokQuery->get();

        // ---------------------------
        // Laporan Transaksi Barang
        // ---------------------------
        $transaksiQuery = StockTransaction::with('product');

        // Filter periode transaksi
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $transaksiQuery->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $transaksiBarang = $transaksiQuery->orderBy('created_at', 'desc')->get();

        // ---------------------------
        // Laporan Aktivitas Pengguna
        // ---------------------------
        $aktivitasQuery = UserActivity::with('user');

        // Filter periode aktivitas
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $aktivitasQuery->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $aktivitasPengguna = $aktivitasQuery->orderBy('created_at', 'desc')->get();

        // ---------------------------
        // Kirim data ke view
        // ---------------------------
        return view('pages.reports.index', compact(
            'stokBarang',
            'transaksiBarang',
            'aktivitasPengguna'
        ));
    }
}
