<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class StockTransaction extends Model
{
    use HasFactory;

    /**
     * Field yang bisa diisi secara mass assignment
     */
    protected $fillable = [
        'product_id',    // ID barang terkait
        'type',          // tipe transaksi: 'in' atau 'out'
        'quantity',      // jumlah barang
        'status',        // status: pending, confirmed, partial, ready, menunggu
        'confirmed_by',  // ID user/staff yang mengonfirmasi
    ];

    /**
     * Casting tanggal agar otomatis menjadi Carbon
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relasi ke produk
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relasi ke user/staff/manager yang mengonfirmasi
     */
    public function confirmedBy()
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }

    /**
     * Scope untuk transaksi masuk
     */
    public function scopeIncoming($query)
    {
        return $query->where('type', 'in');
    }

    /**
     * Scope untuk transaksi keluar
     */
    public function scopeOutgoing($query)
    {
        return $query->where('type', 'out');
    }

    /**
     * Scope untuk status tertentu
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}
