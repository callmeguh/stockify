@extends('layouts.landing.dashboard')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Pengaturan Aplikasi</h2>

    @if(session('success'))
        <div class="p-2 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Aplikasi --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama Aplikasi</label>
            <input type="text" name="app_name" value="{{ old('app_name', $setting->app_name ?? '') }}"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        {{-- Logo --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Logo</label>
            <input type="file" name="logo"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @if(isset($setting->logo))
                <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="h-16 mt-2">
            @endif
        </div>

        {{-- Favicon --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Favicon</label>
            <input type="file" name="favicon"
                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @if(isset($setting->favicon))
                <img src="{{ asset('storage/'.$setting->favicon) }}" alt="Favicon" class="h-8 mt-2">
            @endif
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description"
                      class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $setting->description ?? '') }}</textarea>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
