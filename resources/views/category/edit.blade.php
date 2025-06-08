@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar post: {{ $post->title }}</h1>

<form action="{{ url('/category/edit/' . $post->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block">Título:</label>
        <input type="text" name="title" value="{{ $post->title }}" class="w-full border px-2 py-1 rounded" required>
    </div>

    <div>
        <label class="block">Autor:</label>
        <input type="text" name="poster" value="{{ $post->poster }}" class="w-full border px-2 py-1 rounded" required>
    </div>

    <div>
        <label class="block">Contenido:</label>
        <textarea name="content" class="w-full border px-2 py-1 rounded" rows="5" required>{{ $post->content }}</textarea>
    </div>


    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Guardar cambios
    </button>
</form>
@endsection