@extends('layouts.admin.dashboard')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">📦 Manajemen Stok</h2>

    <!-- Tabs -->
    <ul class="flex flex-wrap text-sm font-medium text-center border-b border-gray-200 mb-5"
        id="stockTabs"
        data-tabs-toggle="#stockTabsContent"
        role="tablist">

        <li class="me-2">
            <button id="transactions-tab"
                type="button" role="tab"
                aria-controls="transactions"
                aria-selected="true"
                class="inline-block p-4 border-b-2 rounded-t-lg border-blue-600 text-blue-600">
                Riwayat Transaksi
            </button>
        </li>
        <li class="me-2">
            <button id="opname-tab"
                type="button" role="tab"
                aria-controls="opname"
                aria-selected="false"
                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                Stock Opname
            </button>
        </li>
        <li class="me-2">
            <button id="minimum-tab"
                type="button" role="tab"
                aria-controls="minimum"
                aria-selected="false"
                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                Pengaturan Minimum
            </button>
        </li>
    </ul>

    <div id="stockTabsContent">
        <!-- Riwayat Transaksi -->
        <div id="transactions" role="tabpanel" aria-labelledby="transactions-tab" class="p-4 rounded-lg bg-gray-50">
            <h3 class="text-lg font-semibold mb-4">📜 Riwayat Transaksi Barang</h3>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Produk</th>
                            <th class="px-6 py-3">Jenis</th>
                            <th class="px-6 py-3">Jumlah</th>
                            <th class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">2025-08-10</td>
                            <td class="px-6 py-4">Laptop Dell</td>
                            <td class="px-6 py-4 text-green-600">Masuk</td>
                            <td class="px-6 py-4">10</td>
                            <td class="px-6 py-4">
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Disetujui
                                </span>
                            </td>
                        </tr>
                        <tr class="bg-gray-50 border-b">
                            <td class="px-6 py-4">2025-08-12</td>
                            <td class="px-6 py-4">Mouse Logitech</td>
                            <td class="px-6 py-4 text-red-600">Keluar</td>
                            <td class="px-6 py-4">5</td>
                            <td class="px-6 py-4">
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                    Menunggu
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Stock Opname -->
        <div id="opname" role="tabpanel" aria-labelledby="opname-tab" class="hidden p-4 rounded-lg bg-gray-50">
            <h3 class="text-lg font-semibold mb-4">📊 Hasil Stock Opname</h3>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Produk</th>
                            <th class="px-6 py-3">Stok Sistem</th>
                            <th class="px-6 py-3">Stok Fisik</th>
                            <th class="px-6 py-3">Selisih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">2025-08-15</td>
                            <td class="px-6 py-4">Keyboard Mechanical</td>
                            <td class="px-6 py-4">20</td>
                            <td class="px-6 py-4">19</td>
                            <td class="px-6 py-4 text-red-600">-1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pengaturan Minimum -->
        <div id="minimum" role="tabpanel" aria-labelledby="minimum-tab" class="hidden p-4 rounded-lg bg-gray-50">
            <h3 class="text-lg font-semibold mb-4">⚠️ Pengaturan Stok Minimum</h3>
            <form class="max-w-sm">
                <div class="mb-4">
                    <label for="product" class="block mb-2 text-sm font-medium text-gray-900">Pilih Produk</label>
                    <select id="product"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Pilih produk</option>
                        <option value="1">Laptop Dell</option>
                        <option value="2">Mouse Logitech</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="minimum_stock" class="block mb-2 text-sm font-medium text-gray-900">Stok Minimum</label>
                    <input type="number" id="minimum_stock"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="contoh: 5">
                </div>
                <button type="submit"
                    class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
