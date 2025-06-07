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
        <label class="inline-flex items-center">
            <input type="checkbox" name="habilitated" class="mr-2">
            ¿Publicado?
        </label>
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