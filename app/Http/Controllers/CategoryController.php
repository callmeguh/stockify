<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // ambil semua kategori + atribut
        $categories = Category::with('attributes')->get();
        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(Request $request)
    {
        // validasi hanya untuk nama kategori
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // simpan kategori baru
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        $category->load('attributes');
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'attributes' => 'array|nullable',
            'attributes.*' => 'nullable|string|max:255',
        ]);

        // update kategori
        $category->update([
            'name' => $request->name,
        ]);

        // hapus atribut lama lalu simpan ulang (kalau ada input)
        $category->attributes()->delete();
        if ($request->has('attributes')) {
            foreach ($request->attributes as $attr) {
                if (!empty($attr)) {
                    $category->attributes()->create([
                        'name' => $attr,
                    ]);
                }
            }
        }

        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(Category $category)
    {
        // hapus atribut dulu
        $category->attributes()->delete();

        // hapus kategori
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil dihapus!');
    }
}
