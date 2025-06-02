@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Listado de posts</h1>

<ul class="list-disc pl-6">
    @foreach($posts as $post)
    <li>
        <a href="{{ url('/category/show/' . $post->id) }}" class="text-blue-600 hover:underline">
            {{ $post->title }} ({{ $post->poster }})
        </a>
    </li>
    @endforeach
</ul>
@endsection