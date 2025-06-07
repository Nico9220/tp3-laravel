@extends('layout')

@section('content')
<h1 class="text-2xl font-bold mb-6">Categorías disponibles</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach($categories as $category)
    <a href="{{ url('/category/by/' . $category->id) }}" class="block bg-white border p-4 rounded shadow hover:shadow-md transition">
        <h2 class="text-lg font-semibold text-red-700">{{ $category->name }}</h2>
        <p class="text-sm text-gray-600">Ver posts relacionados</p>
    </a>
    @endforeach
</div>
@endsection