@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Añadir post</h1>

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
        <label class="block">Autor:</label>
        <input type="text" name="poster" class="w-full border px-2 py-1 rounded" required>
        @error('poster')
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

    <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded">
        Publicar post
    </button>
</form>
@endsection

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