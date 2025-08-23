@extends('layouts.manager.app') {{-- sesuaikan dengan layout utama manager --}}

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">📦 Stok Opname</h1>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-4">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">No</th>
                    <th class="border px-4 py-2 text-left">Nama Produk</th>
                    <th class="border px-4 py-2 text-center">Stok Tersedia</th>
                    <th class="border px-4 py-2 text-left">Harga (Rp)</th>
                    <th class="border px-4 py-2 text-left">Terakhir Update</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $product)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2 font-medium">{{ $product->name }}</td>
                        <td class="border px-4 py-2 text-center">{{ $product->stock }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2">
                            {{ $product->updated_at ? $product->updated_at->format('d M Y H:i') : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center text-gray-500">
                            Tidak ada data produk
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
