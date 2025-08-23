<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\StockTransaction;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Menampilkan daftar & form input barang masuk
     */
    public function incoming()
    {
        $incoming = StockTransaction::where('type', 'in')->latest()->get();
        $products = Product::all();

        return view('layouts.manager.stocks.incoming', compact('incoming', 'products'));
    }

    /**
     * Simpan data barang masuk + update stok produk
     */
    public function storeIncoming(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        // Simpan transaksi masuk
        StockTransaction::create([
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
            'type'       => 'in',
        ]);

        // Tambahkan stok produk
        $product = Product::find($request->product_id);
        $product->stock += $request->quantity;
        $product->save();

        return redirect()->route('manager.stocks.incoming')
                         ->with('success', 'Barang masuk berhasil dicatat dan stok diperbarui!');
    }

    /**
     * Menampilkan daftar & form input barang keluar
     */
    public function outgoing()
    {
        $outgoing = StockTransaction::where('type', 'out')->latest()->get();
        $products = Product::all();

        return view('layouts.manager.stocks.outgoing', compact('outgoing', 'products'));
    }

    /**
     * Simpan data barang keluar + update stok produk
     */
    public function storeOutgoing(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        // Cek stok cukup atau tidak
        if ($product->stock < $request->quantity) {
            return redirect()->route('manager.stocks.outgoing')
                             ->with('error', 'Stok produk tidak mencukupi!');
        }

        // Simpan transaksi keluar
        StockTransaction::create([
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
            'type'       => 'out',
        ]);

        // Kurangi stok produk
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->route('manager.stocks.outgoing')
                         ->with('success', 'Barang keluar berhasil dicatat dan stok diperbarui!');
    }

    /**
     * Menampilkan stok opname (stok terkini tiap produk)
     */
    public function stockOpname()
    {
        $products = Product::all();
        return view('layouts.manager.stocks.opname', compact('products'));
    }
}
