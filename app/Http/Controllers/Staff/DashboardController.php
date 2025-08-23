<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockTransaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard staff gudang
     */
    public function index()
    {
        // Barang masuk yang perlu diperiksa (status pending dari manager)
        $incoming = StockTransaction::with('product', 'confirmedBy')
            ->incoming()
            ->status('pending')
            ->latest()
            ->get();

        // Barang keluar yang perlu disiapkan (status pending dari manager)
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
            'status' => $request->has('partial') ? 'partial' : 'confirmed',
            'confirmed_by' => Auth::id(),
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
            'status' => $request->has('ready') ? 'ready' : 'pending',
            'confirmed_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Barang keluar berhasil diperbarui.');
    }
}
