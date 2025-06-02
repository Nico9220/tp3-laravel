@extends('layout')

@section('content')
<h1 class="text-2xl font-bold">{{ $post->title }}</h1>
<p class="text-sm text-gray-600">Publicado por {{ $post->poster }}</p>
<div class="mt-4">
    {{ $post->content }}
</div>
@endsection