@extends('layouts.landing.dashboard')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">📦 Manajemen Stok</h2>

    <!-- Tabs -->
    <ul class="flex flex-wrap text-sm font-medium text-center border-b border-gray-200 mb-5"
        id="stockTabs"
        role="tablist">
        <li class="me-2">
            <button id="transactions-tab" type="button" role="tab"
                aria-controls="transactions" aria-selected="true"
                class="inline-block p-4 border-b-2 rounded-t-lg border-blue-600 text-blue-600">
                Riwayat Transaksi
            </button>
        </li>
        <li class="me-2">
            <button id="opname-tab" type="button" role="tab"
                aria-controls="opname" aria-selected="false"
                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                Stock Opname
            </button>
        </li>
        <li class="me-2">
            <button id="minimum-tab" type="button" role="tab"
                aria-controls="minimum" aria-selected="false"
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
                <table id="transactionsTable" class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Produk</th>
                            <th class="px-6 py-3">Jenis</th>
                            <th class="px-6 py-3">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $trx)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{ $trx->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4">{{ $trx->product->name ?? '-' }}</td>
                                <td class="px-6 py-4 {{ $trx->type == 'in' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $trx->type == 'in' ? 'Masuk' : 'Keluar' }}
                                </td>
                                <td class="px-6 py-4">{{ $trx->quantity }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4">Belum ada transaksi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Stock Opname -->
        <div id="opname" role="tabpanel" aria-labelledby="opname-tab" class="hidden p-4 rounded-lg bg-gray-50">
            <h3 class="text-lg font-semibold mb-4">📊 Hasil Stock Opname</h3>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table id="opnameTable" class="w-full text-sm text-left text-gray-500">
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
                        @forelse($opnames as $op)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{ $op->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4">{{ $op->product->name ?? '-' }}</td>
                                <td class="px-6 py-4">{{ $op->system_stock }}</td>
                                <td class="px-6 py-4">{{ $op->actual_stock }}</td>
                                <td class="px-6 py-4 {{ $op->actual_stock < $op->system_stock ? 'text-red-600' : 'text-green-600' }}">
                                    {{ $op->actual_stock - $op->system_stock }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-4">Belum ada data opname</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pengaturan Minimum -->
        <div id="minimum" role="tabpanel" aria-labelledby="minimum-tab" class="hidden p-4 rounded-lg bg-gray-50">
            <h3 class="text-lg font-semibold mb-4">⚠️ Pengaturan Stok Minimum</h3>
            <form method="POST" action="{{ route('stocks.minimum.store') }}" class="max-w-sm">
                @csrf
                <div class="mb-4">
                    <label for="product" class="block mb-2 text-sm font-medium text-gray-900">Pilih Produk</label>
                    <select id="product" name="product_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">Pilih produk</option>
                        @foreach($products as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="minimum_stock" class="block mb-2 text-sm font-medium text-gray-900">Stok Minimum</label>
                    <input type="number" id="minimum_stock" name="minimum_stock"
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

<script>
    function loadTransactions() {
        fetch("{{ url('/stocks/transactions/realtime') }}")
            .then(res => res.json())
            .then(data => {
                let rows = "";
                if (data.length === 0) {
                    rows = `<tr><td colspan="4" class="text-center p-4">Belum ada transaksi</td></tr>`;
                } else {
                    data.forEach(trx => {
                        rows += `
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">${new Date(trx.created_at).toLocaleDateString()}</td>
                                <td class="px-6 py-4">${trx.product?.name ?? '-'}</td>
                                <td class="px-6 py-4 ${trx.type == 'in' ? 'text-green-600' : 'text-red-600'}">
                                    ${trx.type == 'in' ? 'Masuk' : 'Keluar'}
                                </td>
                                <td class="px-6 py-4">${trx.quantity}</td>
                            </tr>
                        `;
                    });
                }
                document.querySelector("#transactionsTable tbody").innerHTML = rows;
            });
    }

    function loadOpname() {
        fetch("{{ url('/stocks/opname/realtime') }}")
            .then(res => res.json())
            .then(data => {
                let rows = "";
                if (data.length === 0) {
                    rows = `<tr><td colspan="5" class="text-center p-4">Belum ada data opname</td></tr>`;
                } else {
                    data.forEach(op => {
                        rows += `
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">${new Date(op.created_at).toLocaleDateString()}</td>
                                <td class="px-6 py-4">${op.product?.name ?? '-'}</td>
                                <td class="px-6 py-4">${op.system_stock}</td>
                                <td class="px-6 py-4">${op.actual_stock}</td>
                                <td class="px-6 py-4 ${op.actual_stock < op.system_stock ? 'text-red-600' : 'text-green-600'}">
                                    ${op.actual_stock - op.system_stock}
                                </td>
                            </tr>
                        `;
                    });
                }
                document.querySelector("#opnameTable tbody").innerHTML = rows;
            });
    }

    loadTransactions();
    loadOpname();
    setInterval(() => {
        loadTransactions();
        loadOpname();
    }, 5000);

    document.querySelectorAll('#stockTabs button').forEach(btn => {
        btn.addEventListener('click', function () {
            let target = this.getAttribute('aria-controls');

            document.querySelectorAll('#stockTabs button').forEach(b => {
                b.classList.remove('border-blue-600', 'text-blue-600');
                b.classList.add('border-transparent');
            });
            document.querySelectorAll('#stockTabsContent > div').forEach(div => {
                div.classList.add('hidden');
            });

            this.classList.add('border-blue-600', 'text-blue-600');
            document.getElementById(target).classList.remove('hidden');
        });
    });
</script>
@endsection
