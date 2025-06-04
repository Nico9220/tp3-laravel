@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-gray-800">Bienvenido a <span class="text-red-700">MyBlog</span></h1>
        <p class="mt-4 text-gray-600 text-lg">Tu espacio personal para escribir, editar y compartir contenido sobre Laravel.</p>

        @auth
        <p class="mt-2 text-green-700 font-medium">Hola {{ Auth::user()->name }}, ¡nos alegra verte!</p>

        <div class="flex flex-wrap gap-4 justify-center mt-6">
            <a href="/category/create" class="bg-red-700 hover:bg-red-800 text-white px-5 py-2 rounded">
                Crear nuevo post
            </a>

            <a href="/category" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded border border-gray-400">
                Ver categorías
            </a>
        </div>
        @endauth
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
        <div class="bg-white shadow-md rounded-lg p-5 border border-gray-200 hover:shadow-lg transition">
            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h2>
            <p class="text-sm text-gray-500 mb-1">Escrito por <span class="font-semibold">{{ $post->poster }}</span></p>
            <p class="text-gray-700 text-sm line-clamp-3">{{ Str::limit($post->content, 100) }}</p>

            <a href="/category/show/{{ $post->id }}" class="inline-block mt-4 text-red-700 hover:underline text-sm">
                Ver más →
            </a>
        </div>
        @empty
        <p class="col-span-3 text-center text-gray-600">No hay publicaciones aún.</p>
        @endforelse
    </div>
</div>
@endsection