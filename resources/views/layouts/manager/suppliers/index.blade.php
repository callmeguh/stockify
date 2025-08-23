@extends('layouts.manager.app') <!-- Layout utama -->

@section('title', 'Daftar Supplier')

@section('content')
<div class="container mx-auto p-6">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Supplier</h1>
    </div>

    <!-- Tabel Supplier -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Nama Supplier</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Telepon</th>
                    <th scope="col" class="px-6 py-3">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $index => $supplier)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $supplier->name }}</td>
                    <td class="px-6 py-4">{{ $supplier->email ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $supplier->phone ?? '-' }}</td>
                    <td class="px-6 py-4">{{ $supplier->address ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data supplier.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $suppliers->links() }}
    </div>
</div>
@endsection
