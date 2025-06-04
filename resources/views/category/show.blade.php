@extends('layout')

@section('content')
<h1 class="text-2xl font-bold">{{ $post->title }}</h1>
 
<div class="mt-4">
    {{ $post->content }}
</div>
@endsection