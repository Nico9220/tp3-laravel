@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded shadow p-6">
    <h1 class="text-3xl font-bold text-red-700 mb-2">{{ $post->title }}</h1>

    <div class="text-sm text-gray-600 mb-4">
        Escrito por <strong>{{ $post->poster }}</strong> —
        Categoría: <a href="{{ url('/category/by/' . $post->category_id) }}" class="text-blue-700 hover:underline">
            {{ $post->category->name ?? 'Sin categoría' }}
        </a>
    </div>

    <div class="prose max-w-none text-gray-800">
        {{ $post->content }}
    </div>

    <div class="mt-6 flex gap-4">
        @auth
        @if(Auth::user()->name === $post->poster)
        <a href="{{ url('/category/edit/' . $post->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
            Editar
        </a>
        <form method="POST" action="{{ url('/category/delete/' . $post->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                Eliminar
            </button>
        </form>
        @endif
        @endauth
    </div>
</div>
@endsection