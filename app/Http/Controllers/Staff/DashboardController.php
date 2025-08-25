<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockTransaction;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard staff gudang
     */
    public function index()
    {
        $incoming = StockTransaction::with('product', 'confirmedBy')
            ->incoming()
            ->status('pending')
            ->latest()
            ->get();

        $outgoing = StockTransaction::with('product', 'confirmedBy')
            ->outgoing()
            ->status('pending')
            ->latest()
            ->get();

        return view('layouts.staff.dashboard.index', compact('incoming', 'outgoing'));
    }

    /**
     * Konfirmasi penerimaan barang masuk
     */
    public function confirmIncoming(Request $request, $id)
    {
        $transaction = StockTransaction::incoming()->findOrFail($id);

        $transaction->update([
            'status'       => $request->has('partial') ? 'partial' : 'confirmed',
            'confirmed_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Barang masuk berhasil dikonfirmasi.');
    }

    /**
     * Konfirmasi persiapan pengeluaran barang
     */
    public function confirmOutgoing(Request $request, $id)
    {
        $transaction = StockTransaction::outgoing()->findOrFail($id);

        $transaction->update([
            'status'       => $request->has('ready') ? 'ready' : 'pending',
            'confirmed_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Barang keluar berhasil diperbarui.');
    }
}
