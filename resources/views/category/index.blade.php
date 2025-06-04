@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Listado de posts</h1>

<ul class="list-disc pl-6">
    @foreach($posts as $post)
    <li>
        <a href="{{ url('/category/show/' . $post->id) }}" class="text-blue-600 hover:underline">
            <div class="flex items-center justify-between">
            {{ $post->title }} ({{ $post->poster }})
            <form action="{{ url('/category/delete/' . $post->id) }}" method="POST"
                onsubmit="return confirm('¿Estás seguro de que querés eliminar este post?');"
                >
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm text-gray-500 hover:text-red-600 underline">
                    Eliminar
                </button>
            </form>
            </div>
        </a>
    </li>
    @endforeach
</ul>
@endsection