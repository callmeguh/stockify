@extends('layouts.staff.app') {{-- pastikan layout staff sudah ada --}}

@section('title', 'Dashboard Staff Gudang')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Dashboard Staff Gudang</h1>

    {{-- Daftar Barang Masuk --}}
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Barang Masuk (Pending)</h2>

        @if($incoming->isEmpty())
            <p class="text-gray-500">Tidak ada barang masuk yang perlu diperiksa.</p>
        @else
            <table class="w-full table-auto border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Nama Produk</th>
                        <th class="border px-4 py-2">Jumlah</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incoming as $index => $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $item->product->name }}</td>
                        <td class="border px-4 py-2">{{ $item->quantity }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($item->status) }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <form action="{{ route('staff.stocks.confirmIncoming', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="confirmed">
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Konfirmasi
                                </button>
                            </form>
                            <form action="{{ route('staff.stocks.confirmIncoming', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="kurang">
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Barang Kurang
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{-- Daftar Barang Keluar --}}
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <h2 class="text-xl font-semibold mb-3">Barang Keluar (Pending)</h2>

        @if($outgoing->isEmpty())
            <p class="text-gray-500">Tidak ada barang keluar yang perlu disiapkan.</p>
        @else
            <table class="w-full table-auto border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Nama Produk</th>
                        <th class="border px-4 py-2">Jumlah</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outgoing as $index => $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $item->product->name }}</td>
                        <td class="border px-4 py-2">{{ $item->quantity }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($item->status) }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <form action="{{ route('staff.stocks.confirmOutgoing', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="siap">
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Siap Kirim
                                </button>
                            </form>
                            <form action="{{ route('staff.stocks.confirmOutgoing', $item->id) }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="status" value="menunggu">
                                <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Menunggu
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
