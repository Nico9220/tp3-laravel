@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Añadir post</h1>

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
    <strong>¡Ups!</strong> Hay algunos problemas con los datos ingresados:
    <ul class="mt-2 list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
<!-- Modal -->
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h2 class="text-xl font-semibold mb-4">¡Éxito!</h2>
        <p>{{ session('success') }}</p>
        <button onclick="document.getElementById('successModal').remove()" class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Cerrar
        </button>
    </div>
</div>
@endif


<form action="{{ url('/category/create') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block">Título:</label>
        <input type="text" name="title" class="w-full border px-2 py-1 rounded" required>
        @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block">Contenido:</label>
        <textarea name="content" class="w-full border px-2 py-1 rounded" rows="5" required></textarea>
        @error('content')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-semibold mb-1">Categoría:</label>
        <select name="category_id" class="border px-2 py-1 rounded w-full" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>


    <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded">
        Publicar post
    </button>
</form>
@endsection