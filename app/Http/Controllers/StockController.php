<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class StockController extends Controller
{
    /**
     * Menampilkan daftar stok (semua produk).
     */
    public function index()
    {
        $products = Product::orderBy('name')->get();
        return view('pages.stocks.index', compact('products'));
    }

    /**
     * Menampilkan form stock opname / tambah transaksi stok.
     */
    public function create()
    {
        $products = Product::select('id','name','stock')->orderBy('name')->get();
        return view('pages.stocks.create', compact('products'));
    }

    /**
     * Menyimpan transaksi stok baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'real_stock' => 'required|integer|min:0',
            'note'       => 'nullable|string|max:500',
        ]);

        // Untuk sementara langsung update stok produk
        $product = Product::findOrFail($data['product_id']);
        $product->update(['stock' => $data['real_stock']]);

        return redirect()->route('stocks.index')->with('success', 'Transaksi stok berhasil ditambahkan.');
    }
}
