@extends('layouts.admin.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Tambah Produk</h1>

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Nama Produk --}}
        <div>
            <label class="block font-medium">Nama Produk</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" required>
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block font-medium">Kategori</label>
            <select name="category_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Supplier --}}
        <div>
            <label class="block font-medium">Supplier</label>
            <select name="supplier_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Supplier --</option>
                @foreach($suppliers as $sup)
                    <option value="{{ $sup->id }}" {{ old('supplier_id') == $sup->id ? 'selected' : '' }}>
                        {{ $sup->name }}
                    </option>
                @endforeach
            </select>
            @error('supplier_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Harga --}}
        <div>
            <label class="block font-medium">Harga</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full border p-2 rounded" required>
            @error('price') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Stok --}}
        <div>
            <label class="block font-medium">Stok</label>
            <input type="number" name="stock" value="{{ old('stock') }}" class="w-full border p-2 rounded" required>
            @error('stock') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block font-medium">Deskripsi</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
            @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Atribut Produk --}}
        <div>
            <label class="block font-medium">Atribut Produk</label>
            <div id="attributes-wrapper">
                {{-- kalau validasi gagal, isi ulang atribut sebelumnya --}}
                @if(old('attributes'))
                    @foreach(old('attributes') as $i => $attr)
                        <div class="flex gap-2 mb-2">
                            <input type="text" name="attributes[{{ $i }}][name]" value="{{ $attr['name'] ?? '' }}" placeholder="Nama atribut" class="border p-2 rounded w-1/2">
                            <input type="text" name="attributes[{{ $i }}][value]" value="{{ $attr['value'] ?? '' }}" placeholder="Nilai" class="border p-2 rounded w-1/2">
                            <button type="button" onclick="removeAttribute(this)" class="bg-red-500 text-white px-2 rounded">X</button>
                        </div>
                    @endforeach
                @else
                    {{-- default minimal 1 field --}}
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="attributes[0][name]" placeholder="Nama atribut (contoh: Warna)" class="border p-2 rounded w-1/2">
                        <input type="text" name="attributes[0][value]" placeholder="Nilai (contoh: Merah)" class="border p-2 rounded w-1/2">
                        <button type="button" onclick="removeAttribute(this)" class="bg-red-500 text-white px-2 rounded">X</button>
                    </div>
                @endif
            </div>
            <button type="button" onclick="addAttribute()" class="bg-blue-500 text-white px-3 py-1 rounded">
                + Tambah Atribut
            </button>
        </div>

        {{-- Tombol Submit --}}
        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                Simpan Produk
            </button>
        </div>
    </form>
</div>

<script>
    let attrIndex = {{ old('attributes') ? count(old('attributes')) : 1 }};

    function addAttribute() {
        const wrapper = document.getElementById('attributes-wrapper');
        const div = document.createElement('div');
        div.classList.add('flex', 'gap-2', 'mb-2');
        div.innerHTML = `
            <input type="text" name="attributes[${attrIndex}][name]" placeholder="Nama atribut" class="border p-2 rounded w-1/2">
            <input type="text" name="attributes[${attrIndex}][value]" placeholder="Nilai" class="border p-2 rounded w-1/2">
            <button type="button" onclick="removeAttribute(this)" class="bg-red-500 text-white px-2 rounded">X</button>
        `;
        wrapper.appendChild(div);
        attrIndex++;
    }

    function removeAttribute(button) {
        button.parentElement.remove();
    }
</script>
@endsection
