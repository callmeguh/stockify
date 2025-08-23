@extends('layouts.manager.app')

@section('content')
    <h1 class="text-2xl font-bold text-gray-700">Dashboard Manajer 👨‍💼</h1>
    <p class="mt-2 text-gray-600">Ringkasan informasi stok barang hari ini</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <!-- Stok Menipis -->
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-full">🔻</div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Stok Menipis</h2>
                    <p class="text-2xl font-bold text-red-600">{{ $stokMenipis }}</p>
                </div>
            </div>
        </div>

        <!-- Barang Masuk -->
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">📥</div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Barang Masuk</h2>
                    <p class="text-2xl font-bold text-green-600">{{ $barangMasuk }}</p>
                </div>
            </div>
        </div>

        <!-- Barang Keluar -->
        <div class="p-6 bg-white rounded-xl shadow hover:shadow-lg transition">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">📤</div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Barang Keluar</h2>
                    <p class="text-2xl font-bold text-blue-600">{{ $barangKeluar }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
