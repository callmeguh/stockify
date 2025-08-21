@extends('layouts.landing.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Tambah Supplier</h1>

    <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Nama Supplier</label>
            <input type="text" name="name" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" class="border rounded w-full p-2">
        </div>

        <div>
            <label class="block">Telepon</label>
            <input type="text" name="phone" class="border rounded w-full p-2">
        </div>

        <div>
            <label class="block">Alamat</label>
            <textarea name="address" class="border rounded w-full p-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
@endsection
