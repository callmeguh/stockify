<?php

namespace App\Observers;

use App\Models\Supplier;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class SupplierObserver
{
    public function created(Supplier $supplier)
    {
        ActivityLog::create([
            'user_id' => Auth::id() ?? 1,
            'deskripsi' => 'Menambahkan supplier ' . $supplier->name,
        ]);
    }

    public function updated(Supplier $supplier)
    {
        ActivityLog::create([
            'user_id' => Auth::id() ?? 1,
            'deskripsi' => 'Memperbarui supplier ' . $supplier->name,
        ]);
    }

    public function deleted(Supplier $supplier)
    {
        ActivityLog::create([
            'user_id' => Auth::id() ?? 1,
            'deskripsi' => 'Menghapus supplier ' . $supplier->name,
        ]);
    }
}
