@extends('layouts.admin.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Daftar Kategori</h1>

    <a href="{{ route('categories.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
       + Tambah Kategori
    </a>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Nama Kategori</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="border p-2">{{ $category->id }}</td>
                    <td class="border p-2">{{ $category->name }}</td>
                    <td class="border p-2">
                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-600">Edit</a> |
                        <form action="{{ route('categories.destroy', $category) }}" 
                              method="POST" class="inline"
                              onsubmit="return confirm('Yakin hapus kategori ini?')">
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
