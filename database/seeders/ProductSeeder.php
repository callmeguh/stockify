<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductAttribute;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat produk contoh
        $product = Product::create([
            'name' => 'Redmi 10 2022',
            'category_id' => 1, // pastikan kategori dengan id=1 ada
            'supplier_id' => 1, // pastikan supplier dengan id=1 ada
            'price' => 1800000,
            'stock' => 10,
            'description' => 'HP murah tapi mantap'
        ]);

        // Tambahkan atribut produk
        ProductAttribute::create([
            'product_id' => $product->id,
            'name' => 'Warna',
            'value' => 'Hitam'
        ]);

        ProductAttribute::create([
            'product_id' => $product->id,
            'name' => 'RAM',
            'value' => '4GB'
        ]);
    }
}
