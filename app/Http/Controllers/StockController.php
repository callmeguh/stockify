<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\StockOpname;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Menampilkan halaman stok utama
     */
    public function index()
    {
        $products     = Product::orderBy('name')->get();

        $transactions = StockTransaction::with('product')
            ->latest()
            ->take(20)
            ->get();

        $opnames = StockOpname::with(['product', 'admin'])
            ->latest()
            ->take(20)
            ->get();

        return view('pages.stocks.index', compact('products', 'transactions', 'opnames'));
    }

    /**
     * API untuk transaksi realtime
     */
    public function transactionsRealtime()
    {
        $transactions = StockTransaction::with('product')
            ->latest()
            ->take(20)
            ->get();

        return response()->json($transactions);
    }

    /**
     * API untuk opname realtime
     */
    public function opnameRealtime()
    {
        $opnames = StockOpname::with(['product', 'admin'])
            ->latest()
            ->take(20)
            ->get();

        return response()->json($opnames);
    }

    /**
     * Form tambah opname / transaksi stok
     */
    public function create()
    {
        $products = Product::select('id', 'name', 'stock')
            ->orderBy('name')
            ->get();

        return view('pages.stocks.create', compact('products'));
    }

    /**
     * Simpan transaksi stok baru (stock opname)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'real_stock' => 'required|integer|min:0',
            'note'       => 'nullable|string|max:500',
        ]);

        $product = Product::findOrFail($data['product_id']);

        // Hitung selisih stok
        $difference = $data['real_stock'] - $product->stock;

        // Catat transaksi stok bila ada perubahan
        if ($difference != 0) {
            StockTransaction::create([
                'product_id'   => $product->id,
                'type'         => $difference > 0 ? 'in' : 'out',
                'quantity'     => abs($difference),
                'confirmed_by' => Auth::id(),
                'note'         => $data['note'] ?? null,
            ]);
        }

        // Catat hasil opname
        StockOpname::create([
            'product_id'   => $product->id,
            'system_stock' => $product->stock,
            'actual_stock' => $data['real_stock'],
            'checked_by'   => Auth::id(),
            'note'         => $data['note'] ?? null,
        ]);

        // Update stok produk sesuai hasil opname
        $product->update(['stock' => $data['real_stock']]);

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stock opname berhasil disimpan.');
    }

    /**
     * Update stok minimum produk
     */
    public function updateMinimum(Request $request)
    {
        $data = $request->validate([
            'product_id'    => 'required|exists:products,id',
            'minimum_stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($data['product_id']);

        $product->update([
            'minimum_stock' => $data['minimum_stock'],
        ]);

        return redirect()
            ->route('stocks.index')
            ->with('success', 'Stok minimum berhasil diperbarui.');
    }
}
