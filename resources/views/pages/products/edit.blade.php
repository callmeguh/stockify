@extends('layouts.landing.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Edit Produk</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama Produk --}}
        <div>
            <label class="block font-medium">Nama Produk</label>
            <input type="text" name="name" class="w-full border p-2 rounded" 
                   value="{{ old('name', $product->name) }}" required>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block font-medium">Kategori</label>
            <select name="category_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Supplier --}}
        <div>
            <label class="block font-medium">Supplier</label>
            <select name="supplier_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $sup)
                    <option value="{{ $sup->id }}" 
                        {{ $product->supplier_id == $sup->id ? 'selected' : '' }}>
                        {{ $sup->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Harga --}}
        <div>
            <label class="block font-medium">Harga</label>
            <input type="number" step="0.01" name="price" class="w-full border p-2 rounded"
                   value="{{ old('price', $product->price) }}" required>
        </div>

        {{-- Stok --}}
        <div>
            <label class="block font-medium">Stok</label>
            <input type="number" name="stock" class="w-full border p-2 rounded"
                   value="{{ old('stock', $product->stock) }}" required>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block font-medium">Deskripsi</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Atribut Produk --}}
        <div>
            <label class="block font-medium">Atribut Produk</label>
            <div id="attributes-wrapper">
                @foreach($product->attributes as $i => $attr)
                <div class="flex gap-2 mb-2">
                    <input type="text" name="attributes[{{ $i }}][name]" 
                           value="{{ $attr->name }}" placeholder="Nama atribut" 
                           class="border p-2 rounded w-1/2">
                    <input type="text" name="attributes[{{ $i }}][value]" 
                           value="{{ $attr->value }}" placeholder="Nilai" 
                           class="border p-2 rounded w-1/2">
                </div>
                @endforeach
            </div>
            <button type="button" onclick="addAttribute()" class="bg-blue-500 text-white px-3 py-1 rounded">
                + Tambah Atribut
            </button>
        </div>

        {{-- Tombol Submit --}}
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                Update Produk
            </button>
        </div>
    </form>
</div>

<script>
    let attrIndex = {{ $product->attributes->count() }};
    function addAttribute() {
        const wrapper = document.getElementById('attributes-wrapper');
        const div = document.createElement('div');
        div.classList.add('flex', 'gap-2', 'mb-2');
        div.innerHTML = `
            <input type="text" name="attributes[${attrIndex}][name]" placeholder="Nama atribut" class="border p-2 rounded w-1/2">
            <input type="text" name="attributes[${attrIndex}][value]" placeholder="Nilai" class="border p-2 rounded w-1/2">
        `;
        wrapper.appendChild(div);
        attrIndex++;
    }
</script>
@endsection
