@extends('layouts.landing.dashboard')

@section('content')
<div class="p-6 bg-white rounded-2xl shadow-lg border border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4m6 6a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Pengaturan Halaman Login
    </h2>

    @if(session('success'))
        <div class="flex items-center p-4 mb-6 text-green-800 rounded-lg bg-green-100 border border-green-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 me-3" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 11-9.5 9.5A9.51 9.51 0 0110 .5zm-.707 6.793a1 1 0 011.414 0L12 8.586l1.293-1.293a1 1 0 111.414 1.414L13.414 10l1.293 1.293a1 1 0 01-1.414 1.414L12 11.414l-1.293 1.293a1 1 0 01-1.414-1.414L10.586 10 9.293 8.707a1 1 0 010-1.414z"/>
            </svg>
            <span class="text-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Nama Aplikasi --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Nama Aplikasi</label>
            <input type="text" name="app_name"
                   value="{{ old('app_name', $setting->app_name ?? '') }}"
                   placeholder="Contoh: Stockify"
                   required
                   class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Logo --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Logo (untuk halaman login)</label>
            <input type="file" name="logo"
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
            @if(isset($setting->logo))
                <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="h-16 mt-3 rounded-lg border border-gray-200 shadow-sm">
            @endif
        </div>

        {{-- Warna Background Kiri --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Warna Background Kiri</label>
            <div class="flex items-center gap-3">
                <input type="color" name="bg_color" 
                       value="{{ old('bg_color', $setting->bg_color ?? '#1e40af') }}"
                       class="h-10 w-20 border border-gray-300 rounded cursor-pointer">
                <span class="text-xs text-gray-500">Pilih warna untuk bagian kiri login</span>
            </div>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="3"
                      placeholder="Kelola stok & gudang Anda lebih mudah, cepat, dan efisien."
                      class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $setting->description ?? '') }}</textarea>
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex justify-end">
            <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
