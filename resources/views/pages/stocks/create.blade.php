@extends('layouts.landing.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Stock Opname</h1>

    <form action="{{ route('stocks.store') }}" method="POST" class="space-y-4 bg-white p-4 rounded border max-w-xl">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Produk</label>
            <select name="product_id" class="w-full border rounded p-2" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->name }} (stok saat ini: {{ $prod->stock }})</option>
                @endforeach
            </select>
            @error('product_id') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Stok Aktual</label>
            <input type="number" name="real_stock" class="w-full border rounded p-2" min="0" required>
            @error('real_stock') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Catatan (opsional)</label>
            <textarea name="note" class="w-full border rounded p-2" rows="3" placeholder="Mis. hasil perhitungan fisik"></textarea>
            @error('note') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex gap-2">
            <a href="{{ route('stocks.index') }}" class="px-4 py-2 rounded border">Batal</a>
            <button class="bg-green-600 text-white px-4 py-2 rounded" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
