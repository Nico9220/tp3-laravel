@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">Posts en la categoría: <span class="text-red-600">{{ $category->name }}</span></h1>

@if($category->posts->isEmpty())
<p class="text-gray-600">Todavía no hay posts en esta categoría.</p>
@else
<ul class="space-y-2">
    @foreach($category->posts as $post)
    <li class="bg-white border rounded px-4 py-3 shadow hover:shadow-md">
        <a href="{{ url('/category/show/' . $post->id) }}" class="text-blue-700 font-semibold hover:underline">
            {{ $post->title }}
        </a>
        <span class="text-sm text-gray-500"> — {{ $post->poster }}</span>
    </li>
    @endforeach
</ul>
@endif
@endsection