@extends('layouts.manager.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📦 Barang Masuk</h1>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-50 text-green-700 border border-green-200">
            ✅ {{ session('success') }}
        </div>
    @endif

    <!-- Card Form -->
    <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100">
        <form action="{{ route('manager.stocks.incoming.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @csrf

            <!-- Produk -->
            <div>
                <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1">Pilih Produk</label>
                <select name="product_id" id="product_id" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <option value="">-- Pilih Produk --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Jumlah -->
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                <input type="number" name="quantity" id="quantity" min="1" required
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
            </div>

            <!-- Tombol Simpan -->
            <div class="flex items-end">
                <button type="submit" 
                    class="inline-flex items-center justify-center w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg shadow-sm text-sm transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" 
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <!-- Data Barang Masuk -->
    <div class="bg-white shadow-lg rounded-xl p-6 border border-gray-100 mt-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Riwayat Barang Masuk</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs uppercase bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">Produk</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($incoming as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $item->product->name }}</td>
                            <td class="px-4 py-3">{{ $item->quantity }}</td>
                            <td class="px-4 py-3">{{ $item->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500">Belum ada data barang masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
