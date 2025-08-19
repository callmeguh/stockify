@extends('layouts.admin.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-bold mb-4">Edit Kategori</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Nama Kategori</label>
            <input type="text" name="name" value="{{ $category->name }}" class="border rounded w-full p-2">
        </div>

        <div id="attribute-fields">
            <label class="block">Atribut</label>
            @foreach($category->attributes as $attr)
                <input type="text" name="attributes[]" value="{{ $attr->name }}" class="border rounded w-full p-2 mb-2">
            @endforeach
        </div>

        <button type="button" onclick="addAttributeField()" class="bg-gray-500 text-white px-2 py-1 rounded">
            + Tambah Atribut
        </button>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
</div>

<script>
    function addAttributeField() {
        let container = document.getElementById('attribute-fields');
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'attributes[]';
        input.className = 'border rounded w-full p-2 mb-2';
        container.appendChild(input);
    }
</script>
@endsection
