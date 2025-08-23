@extends('layouts.manager.app')

@section('content')
<h2 class="text-xl font-semibold mb-4">Detail Produk</h2>

<div class="bg-white p-6 rounded-lg shadow">
    <p><strong>Nama Produk:</strong> {{ $product->name }}</p>
    <p><strong>Kategori:</strong> {{ $product->category->name ?? '-' }}</p>
    <p><strong>Stok:</strong> {{ $product->stock }}</p>
    <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    <p><strong>Deskripsi:</strong> {{ $product->description ?? '-' }}</p>
</div>

<a href="{{ route('manager.products.index') }}" class="inline-block mt-4 text-blue-600 hover:underline">Kembali ke Daftar Produk</a>
@endsection
