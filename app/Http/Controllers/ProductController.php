<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'supplier', 'attributes'])->get();
        return view('pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();
        return view('pages.products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'attributes.*.name'  => 'nullable|string|max:255',
            'attributes.*.value' => 'nullable|string|max:255',
        ]);

        $product = Product::create($request->only([
            'name','category_id','supplier_id','price','stock','description'
        ]));

        $this->syncAttributes($product, $request->input('attributes', []));

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();
        $product->load('attributes');

        return view('pages.products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'attributes.*.name'  => 'nullable|string|max:255',
            'attributes.*.value' => 'nullable|string|max:255',
        ]);

        $product->update($request->only([
            'name','category_id','supplier_id','price','stock','description'
        ]));

        $this->syncAttributes($product, $request->input('attributes', []));

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }

    private function syncAttributes(Product $product, $attributes = [])
    {
        $product->attributes()->delete();

        if (!empty($attributes)) {
            foreach ($attributes as $attr) {
                if (!empty($attr['name']) && !empty($attr['value'])) {
                    $product->attributes()->create([
                        'name'  => $attr['name'],
                        'value' => $attr['value'],
                    ]);
                }
            }
        }
    }
}
