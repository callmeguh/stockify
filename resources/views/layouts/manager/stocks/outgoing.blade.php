@extends('layouts.manager.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">📦 Barang Keluar</h2>

    <!-- Form Tambah Barang Keluar -->
    <form action="{{ route('manager.stocks.outgoing.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end mb-6">
        @csrf
        <div>
            <label class="block mb-1 font-medium">Pilih Produk</label>
            <select name="product_id" class="w-full border rounded-lg p-2" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">Jumlah</label>
            <input type="number" name="quantity" min="1" class="w-full border rounded-lg p-2" placeholder="Masukkan jumlah" required>
        </div>

        <div>
            <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition">
                Simpan Barang Keluar
            </button>
        </div>
    </form>

    <!-- Tabel Data Barang Keluar -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Produk</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($outgoing as $item)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $item->product->name ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                    <td class="px-4 py-2">{{ $item->created_at->format('d M Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-3 text-gray-500">Belum ada data barang keluar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
