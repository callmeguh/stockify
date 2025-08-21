@extends('layouts.landing.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Daftar Produk</h1>

    <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded">+ Tambah Produk</a>

    <table class="w-full mt-4 border">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Kategori</th>
                <th class="p-2 border">Supplier</th>
                <th class="p-2 border">Harga</th>
                <th class="p-2 border">Stok</th>
                <th class="p-2 border">Atribut</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $p)
            <tr>
                <td class="p-2 border">{{ $p->name }}</td>
                <td class="p-2 border">{{ $p->category->name }}</td>
                <td class="p-2 border">{{ $p->supplier->name }}</td>
                <td class="p-2 border">Rp {{ number_format($p->price,0,',','.') }}</td>
                <td class="p-2 border">{{ $p->stock }}</td>
                <td class="p-2 border">
                    @foreach($p->attributes as $attr)
                        <span class="bg-gray-300 px-2 py-1 rounded text-sm">{{ $attr->name }}: {{ $attr->value }}</span>
                    @endforeach
                </td>
                <td class="p-2 border flex gap-2">
                    <a href="{{ route('products.edit', $p->id) }}" 
                       class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>

                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-4 text-center text-gray-500">Belum ada produk</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
