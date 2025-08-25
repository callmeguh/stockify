@extends('layouts.landing.dashboard') 

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6">Import / Export Data</h2>

    {{-- Notifikasi sukses/gagal --}}
    @if(session('success'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Import --}}
        <div class="p-6 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-medium mb-4">Import Data</h3>
            <form action="{{ route('practice.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Pilih file CSV / Excel</label>
                    <input type="file" name="file" accept=".csv,.xlsx,.xls"
                        class="block w-full border border-gray-300 rounded-lg p-2">
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Import
                </button>
            </form>
        </div>

        {{-- Export --}}
        <div class="p-6 border border-gray-200 rounded-lg shadow-sm">
            <h3 class="text-lg font-medium mb-4">Export Data</h3>
            <a href="{{ route('practice.export') }}"
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                Export CSV / Excel
            </a>
        </div>
    </div>
</div>
@endsection
