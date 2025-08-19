<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'supplier_id',
        'price',
        'stock',
        'description',
    ];

    /**
     * Relasi ke kategori produk.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke supplier produk.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Relasi ke atribut produk (warna, ukuran, dll).
     */
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    /**
     * Relasi ke transaksi stok (barang masuk/keluar).
     */
    public function transactions()
    {
        return $this->hasMany(StockTransaction::class);
    }

    /**
     * Relasi ke stock opname (pengecekan stok).
     */
    public function opnames()
    {
        return $this->hasMany(StockOpname::class);
    }
}
