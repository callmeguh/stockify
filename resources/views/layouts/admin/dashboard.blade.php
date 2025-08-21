@extends('layouts.landing.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">📊 Dashboard Admin</h1>

    {{-- Ringkasan --}}
    <div class="grid grid-cols-4 gap-6 mb-8">

    {{-- Total Produk --}}
    <div class="flex items-center p-5 bg-white rounded-2xl shadow border border-blue-200">
        <div class="p-3 bg-blue-100 text-blue-600 rounded-full mr-4">
            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Produk</p>
            <p class="text-2xl font-bold">{{ $totalProduk }}</p>
        </div>
    </div>

    {{-- Transaksi Masuk --}}
    <div class="flex items-center p-5 bg-white rounded-2xl shadow border border-green-200">
        <div class="p-3 bg-green-100 text-green-600 rounded-full mr-4">
            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Transaksi Masuk</p>
            <p class="text-2xl font-bold">{{ $totalMasuk }}</p>
        </div>
    </div>

    {{-- Transaksi Keluar --}}
    <div class="flex items-center p-5 bg-white rounded-2xl shadow border border-red-200">
        <div class="p-3 bg-red-100 text-red-600 rounded-full mr-4">
            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Transaksi Keluar</p>
            <p class="text-2xl font-bold">{{ $totalKeluar }}</p>
        </div>
    </div>

    {{-- Total User --}}
    <div class="flex items-center p-5 bg-white rounded-2xl shadow border border-purple-200">
        <div class="p-3 bg-purple-100 text-purple-600 rounded-full mr-4">
            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V4H2v16h5m10 0V10m0 10H7"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total User</p>
            <p class="text-2xl font-bold">{{ $totalUser }}</p>
        </div>
    </div>
</div>


    {{-- Grafik stok produk --}}
    <div class="bg-white shadow p-6 rounded-2xl mb-8">
        <h2 class="text-lg font-semibold mb-4">📦 Grafik Stok Produk</h2>
        <canvas id="stokChart" height="100"></canvas>
    </div>

    {{-- Aktivitas terbaru --}}
    <div class="bg-white shadow p-6 rounded-2xl">
        <h2 class="text-lg font-semibold mb-4">🕒 Aktivitas Terbaru</h2>
        <ul class="space-y-2 text-gray-700">
            @foreach ($aktivitas as $item)
                <li class="border-b pb-2">- {{ $item->type }} <span class="text-sm text-gray-500">({{ $item->created_at }})</span></li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('stokChart').getContext('2d');

    const labels = {!! json_encode($stokProduk->pluck('name')) !!};
    const dataStok = {!! json_encode($stokProduk->pluck('stock')) !!};

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Stok',
                data: dataStok,
                borderWidth: 1,
                backgroundColor: [
                    'rgba(59,130,246,0.6)',
                    'rgba(16,185,129,0.6)',
                    'rgba(239,68,68,0.6)',
                    'rgba(139,92,246,0.6)',
                ],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
@endsection
