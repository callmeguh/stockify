<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ActivityLog;

class ProductObserver
{
    public function created(Product $product)
    {
        ActivityLog::create([
            'user_id'   => auth()->id(),
            'deskripsi' => 'Menambahkan produk ' . $product->name,
        ]);
    }

    public function updated(Product $product)
    {
        ActivityLog::create([
            'user_id'   => auth()->id(),
            'deskripsi' => 'Mengupdate produk ' . $product->name,
        ]);
    }

    public function deleted(Product $product)
    {
        ActivityLog::create([
            'user_id'   => auth()->id(),
            'deskripsi' => 'Menghapus produk ' . $product->name,
        ]);
    }
}
