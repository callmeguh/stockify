{{-- resources/views/staff/dashboard/index.blade.php --}}
@extends('layouts.staff.app')

@section('title', 'Dashboard Staff Gudang')

@section('content')
<div class="space-y-6">

    {{-- Barang Masuk --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 flex items-center">
            📦 Barang Masuk (Pending)
        </h2>

        @if($incoming->isEmpty())
            <p class="text-gray-500">Tidak ada barang masuk yang perlu diperiksa.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full table-auto border border-gray-200 text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Produk</th>
                            <th class="border px-4 py-2">Jumlah</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($incoming as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $item->product->name }}</td>
                            <td class="border px-4 py-2">{{ $item->quantity }}</td>
                            <td class="border px-4 py-2 capitalize">{{ $item->status }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                {{-- Konfirmasi --}}
                                <form action="{{ route('staff.stocks.confirmIncoming', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin konfirmasi barang masuk?')">
                                    @csrf
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                        ✔ Konfirmasi
                                    </button>
                                </form>
                                {{-- Partial (Barang Kurang) --}}
                                <form action="{{ route('staff.stocks.confirmIncoming', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin tandai sebagai barang kurang?')">
                                    @csrf
                                    <input type="hidden" name="status" value="partial">
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        ❌ Barang Kurang
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Barang Keluar --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4 flex items-center">
            📤 Barang Keluar (Pending)
        </h2>

        @if($outgoing->isEmpty())
            <p class="text-gray-500">Tidak ada barang keluar yang perlu disiapkan.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full table-auto border border-gray-200 text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Produk</th>
                            <th class="border px-4 py-2">Jumlah</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($outgoing as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $item->product->name }}</td>
                            <td class="border px-4 py-2">{{ $item->quantity }}</td>
                            <td class="border px-4 py-2 capitalize">{{ $item->status }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                {{-- Ready / Siap Kirim --}}
                                <form action="{{ route('staff.stocks.confirmOutgoing', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin tandai siap kirim?')">
                                    @csrf
                                    <input type="hidden" name="status" value="ready">
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                        🚚 Siap Kirim
                                    </button>
                                </form>
                                {{-- Menunggu --}}
                                <form action="{{ route('staff.stocks.confirmOutgoing', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin tandai menunggu?')">
                                    @csrf
                                    <input type="hidden" name="status" value="menunggu">
                                    <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                        ⏳ Menunggu
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

</div>
@endsection
