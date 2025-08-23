@extends('layouts.manager.app')

@section('title', 'Laporan Stok Barang')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Laporan Stok Barang</h1>

    <!-- Filter -->
    <form method="GET" action="{{ route('manager.reports.stock') }}" class="flex flex-wrap gap-4 mb-6 items-end">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="category" class="bg-gray-50 border border-gray-300 text-gray-700 rounded-lg p-2 w-full">
                <option value="">Semua Kategori</option>
                @foreach($categories ?? [] as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Dari Tanggal</label>
            <input type="date" name="start_date" value="{{ request('start_date') }}" class="bg-gray-50 border border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Sampai Tanggal</label>
            <input type="date" name="end_date" value="{{ request('end_date') }}" class="bg-gray-50 border border-gray-300 rounded-lg p-2">
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow-md">
                Filter
            </button>
        </div>
    </form>

    <!-- Tabel Stok -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Barang</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Stok Tersedia</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $index => $item)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $index + $items->firstItem() }}</td>
                    <td class="px-6 py-4 font-medium">{{ $item->name }}</td>
                    <td class="px-6 py-4">{{ $item->category->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $item->stock }}</td>
                    <td class="px-6 py-4">{{ $item->unit }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data stok barang.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $items->withQueryString()->links() }}
    </div>
</div>
@endsection
