{{-- resources/views/pages/reports/index.blade.php --}}
@extends('layouts.landing.dashboard')

@section('content')
<div class="container mx-auto p-6 space-y-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 flex items-center gap-2">
        <span>📊</span> Laporan Sistem
    </h1>

    {{-- Laporan Stok Barang --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
            <span>📦</span> Laporan Stok Barang
        </h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-gray-600 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Nama Barang</th>
                        <th class="px-6 py-3">Stok</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($stokBarang as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $item->category?->name ?? 'Tidak ada kategori' }}</td>
                            <td class="px-6 py-3">{{ $item->name }}</td>
                            <td class="px-6 py-3 font-semibold text-gray-800">{{ $item->stock }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-6 text-gray-500">Tidak ada data stok barang</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Laporan Transaksi Barang --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
            <span>🔄</span> Laporan Transaksi Barang
        </h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-gray-600 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Nama Barang</th>
                        <th class="px-6 py-3">Jenis Transaksi</th>
                        <th class="px-6 py-3">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($transaksiBarang as $transaksi)
                        @php
                            $type = strtolower($transaksi->type);
                            if ($type === 'in') {
                                $typeLabel = 'Masuk';
                                $typeColor = 'green';
                            } elseif ($type === 'out') {
                                $typeLabel = 'Keluar';
                                $typeColor = 'red';
                            } else {
                                $typeLabel = ucfirst($transaksi->type);
                                $typeColor = 'gray';
                            }
                        @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $transaksi->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-3">{{ $transaksi->product?->name ?? 'Produk tidak ada' }}</td>
                            <td class="px-6 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-medium text-{{ $typeColor }}-800 bg-{{ $typeColor }}-100 rounded-full">
                                    {{ $typeLabel }}
                                </span>
                            </td>
                            <td class="px-6 py-3 font-semibold">{{ $transaksi->quantity }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-gray-500">Tidak ada data transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Laporan Aktivitas Pengguna --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
            <span>👤</span> Laporan Aktivitas Pengguna
        </h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-gray-600 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Nama Pengguna</th>
                        <th class="px-6 py-3">Aktivitas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($aktivitasPengguna as $aktivitas)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $aktivitas->created_at->format('d-m-Y H:i') }}</td>
                            <td class="px-6 py-3">{{ $aktivitas->user?->name ?? 'User tidak ada' }}</td>
                            <td class="px-6 py-3">{{ $aktivitas->deskripsi }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-6 text-gray-500">Tidak ada data aktivitas pengguna</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
