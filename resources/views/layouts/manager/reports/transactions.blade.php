@extends('layouts.manager.app')

@section('title', 'Laporan Barang Masuk & Keluar')

@section('content')
<div class="container mx-auto p-6"> 
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Laporan Barang Masuk & Keluar</h1> 

    <!-- Filter Periode --> 
    <form method="GET" action="{{ route('manager.reports.transactions') }}" class="flex gap-4 mb-6 items-end"> 
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

    <!-- Tabel Transaksi -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Nama Barang</th>
                    <th class="px-6 py-3">Jenis Transaksi</th>
                    <th class="px-6 py-3">Jumlah</th>
                    <th class="px-6 py-3">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $index => $trx)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-6 py-4">{{ $index + $transactions->firstItem() }}</td>
                    <td class="px-6 py-4">
                        {{ $trx->created_at ? $trx->created_at->format('d-m-Y') : '-' }}
                    </td>
                    <td class="px-6 py-4 font-medium">{{ $trx->product->name ?? '-' }}</td>
                    <td class="px-6 py-4">{{ ucfirst($trx->type) }}</td>
                    <td class="px-6 py-4">{{ $trx->quantity }}</td>
                    <td class="px-6 py-2">
                        @if($trx->type === 'in')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">Masuk</span>
                        @else
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-medium">Keluar</span>
                        @endif
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada transaksi dalam periode ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $transactions->withQueryString()->links() }}
    </div> 
</div> 
@endsection
