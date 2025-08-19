@extends('layouts.admin.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Daftar Supplier</h1>

    <a href="{{ route('suppliers.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
       + Tambah Supplier
    </a>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Telepon</th>
                <th class="border p-2">Alamat</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td class="border p-2">{{ $supplier->id }}</td>
                    <td class="border p-2">{{ $supplier->name }}</td>
                    <td class="border p-2">{{ $supplier->email }}</td>
                    <td class="border p-2">{{ $supplier->phone }}</td>
                    <td class="border p-2">{{ $supplier->address }}</td>
                    <td class="border p-2">
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="text-blue-600">Edit</a> |
                        <form action="{{ route('suppliers.destroy', $supplier) }}" 
                              method="POST" class="inline"
                              onsubmit="return confirm('Yakin hapus supplier ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
