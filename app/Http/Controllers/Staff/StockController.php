<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockTransaction;

class StockController extends Controller
{
    /**
     * Tampilkan daftar barang masuk yang harus dikonfirmasi
     */
    public function incoming()
    {
        $incoming = StockTransaction::with('product')
            ->where('type', 'in')
            ->where('status', 'pending') // status awal dari manager
            ->latest()
            ->get();

        return view('staff.stocks.incoming', compact('incoming'));
    }

    /**
     * Tampilkan daftar barang keluar yang harus dipersiapkan
     */
    public function outgoing()
    {
        $outgoing = StockTransaction::with('product')
            ->where('type', 'out')
            ->where('status', 'pending') // status awal dari manager
            ->latest()
            ->get();

        return view('staff.stocks.outgoing', compact('outgoing'));
    }

    /**
     * Konfirmasi penerimaan barang masuk
     */
    public function confirmIncoming($id, Request $request)
    {
        $transaction = StockTransaction::where('type', 'in')->findOrFail($id);

        // Update status: 'confirmed' atau 'kurang'
        $transaction->update([
            'status' => $request->input('status'),
            'confirmed_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Status stok masuk berhasil diperbarui.');
    }

    /**
     * Konfirmasi persiapan barang keluar
     */
    public function confirmOutgoing($id, Request $request)
    {
        $transaction = StockTransaction::where('type', 'out')->findOrFail($id);

        // Update status: 'siap' atau 'menunggu'
        $transaction->update([
            'status' => $request->input('status'),
            'confirmed_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Status stok keluar berhasil diperbarui.');
    }
}
