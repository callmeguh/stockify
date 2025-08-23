{{-- resources/views/pages/reports/index.blade.php --}}
@extends('layouts.landing.dashboard')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Laporan Sistem</h1>

    {{-- Laporan Stok Barang --}}
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Laporan Stok Barang</h2>
        <table class="w-full table-auto border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Kategori</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stokBarang as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->category?->name ?? 'Tidak ada kategori' }}</td>
                    <td class="border px-4 py-2">{{ $item->name }}</td>
                    <td class="border px-4 py-2">{{ $item->stock }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-2">Tidak ada data stok barang</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Laporan Transaksi Barang --}}
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Laporan Transaksi Barang</h2>
        <table class="w-full table-auto border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Jenis Transaksi</th>
                    <th class="border px-4 py-2">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksiBarang as $transaksi)
                <tr>
                    <td class="border px-4 py-2">{{ $transaksi->created_at->format('d-m-Y') }}</td>
                    <td class="border px-4 py-2">{{ $transaksi->product?->name ?? 'Produk tidak ada' }}</td>
                    <td class="border px-4 py-2">{{ ucfirst($transaksi->type) }}</td>
                    <td class="border px-4 py-2">{{ $transaksi->quantity }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-2">Tidak ada data transaksi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Laporan Aktivitas Pengguna --}}
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Laporan Aktivitas Pengguna</h2>
        <table class="w-full table-auto border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Nama Pengguna</th>
                    <th class="border px-4 py-2">Aktivitas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aktivitasPengguna as $aktivitas)
                <tr>
                    <td class="border px-4 py-2">{{ $aktivitas->created_at->format('d-m-Y H:i') }}</td>
                    <td class="border px-4 py-2">{{ $aktivitas->user?->name ?? 'User tidak ada' }}</td>
                    <td class="border px-4 py-2">{{ $aktivitas->deskripsi }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-2">Tidak ada data aktivitas pengguna</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
