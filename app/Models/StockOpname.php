<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'system_stock',
        'actual_stock',
        'checked_by'
    ];

    /**
     * Relasi ke produk
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relasi ke user yang melakukan pengecekan
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }
}
