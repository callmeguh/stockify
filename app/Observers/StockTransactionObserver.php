<?php

namespace App\Observers;

use App\Models\StockTransaction;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class StockTransactionObserver
{
    public function updated(StockTransaction $transaction)
    {
        // Log hanya untuk perubahan status / confirmed_by
        if ($transaction->wasChanged('status') || $transaction->wasChanged('confirmed_by')) {
            $type = $transaction->type === 'incoming' ? 'barang masuk' : 'barang keluar';
            $status = $transaction->status;
            $name = $transaction->product?->name ?? 'Produk tidak diketahui';

            ActivityLog::create([
                'user_id'   => Auth::id() ?? 1,
                'deskripsi' => "Staff mengonfirmasi {$type} produk {$name} (status: {$status})"
            ]);
        }
    }
}
