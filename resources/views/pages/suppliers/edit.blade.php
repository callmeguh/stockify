@extends('layouts.landing.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Edit Supplier</h1>

    <form action="{{ route('suppliers.update', $supplier) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Nama Supplier</label>
            <input type="text" name="name" value="{{ $supplier->name }}" class="border rounded w-full p-2" required>
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ $supplier->email }}" class="border rounded w-full p-2">
        </div>

        <div>
            <label class="block">Telepon</label>
            <input type="text" name="phone" value="{{ $supplier->phone }}" class="border rounded w-full p-2">
        </div>

        <div>
            <label class="block">Alamat</label>
            <textarea name="address" class="border rounded w-full p-2">{{ $supplier->address }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>
@endsection
