@extends('layouts.manager.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Daftar Produk</h2>

    <!-- Tambah wrapper agar bisa scroll horizontal -->
    <div class="w-full overflow-x-auto">
        <div class="inline-block min-w-full align-middle bg-white p-6 rounded-lg shadow">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-700 whitespace-nowrap">#</th>
                        <th class="px-6 py-3 text-left text-gray-700 whitespace-nowrap">Nama Produk</th>
                        <th class="px-6 py-3 text-left text-gray-700 whitespace-nowrap">Kategori</th>
                        <th class="px-6 py-3 text-left text-gray-700 whitespace-nowrap">Stok</th>
                        <th class="px-6 py-3 text-left text-gray-700 whitespace-nowrap">Harga</th>
                        <th class="px-6 py-3 text-center text-gray-700 whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b even:bg-gray-50 hover:bg-gray-100">
                            <td class="px-6 py-3">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 font-medium text-gray-800">{{ $product->name }}</td>
                            <td class="px-6 py-3">{{ $product->category->name ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $product->stock }}</td>
                            <td class="px-6 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="px-6 py-3 text-center">
                                <a href="{{ route('manager.products.show', $product->id) }}"
                                   class="inline-block px-3 py-1 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500 italic">
                                Belum ada produk yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
