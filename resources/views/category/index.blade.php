@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Listado de posts</h1>

<ul class="space-y-2">
    @foreach($posts as $post)
    <li class="border-b pb-2">
        <div class="flex items-center justify-between">
            <a href="{{ url('/category/show/' . $post->id) }}" class="text-blue-600 hover:underline">
                {{ $post->title }} ({{ $post->poster }})
            </a>

            <div class="flex items-center gap-x-4 ml-6">
                <a href="{{ url('/category/edit/' . $post->id) }}" class="text-sm text-gray-500 hover:text-blue-600 underline">
                    Editar
                </a>

                <form action="{{ url('/category/delete/' . $post->id) }}" method="POST"
                      onsubmit="return confirm('¿Estás seguro de que querés eliminar este post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-gray-500 hover:text-red-600 underline">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </li>
    @endforeach
</ul>
@endsection