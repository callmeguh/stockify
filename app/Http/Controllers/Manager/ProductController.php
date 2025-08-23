<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        // path view diperbarui sesuai struktur folder
        return view('layouts.manager.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('layouts.manager.products.show', compact('product'));
    }
}
