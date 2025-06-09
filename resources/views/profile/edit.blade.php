@extends('layout')


@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Perfil
    </h2>


    <div class="py-6 px-6">
        @if (session('status'))
        <div class="text-green-600 mb-4">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div>
                <label>Nombre:</label>
                <input type="text" name="name" value="{{ $user->name }}" class="border p-2 w-full">
                @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>

            <button class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
                Guardar cambios
            </button>
        </form>

        <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('¿Seguro que querés eliminar tu cuenta?')" class="bg-red-600 text-white px-4 py-2 rounded">
                Eliminar cuenta
            </button>
        </form>
    </div>

    <hr class="my-8">

    <h3 class="text-lg font-semibold text-gray-800 mb-4">Mis Posts</h3>

    @if ($posts->isEmpty())
        <p class="text-gray-600">Todavía no publicaste ningún post.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="bg-white p-4 rounded shadow border hover:shadow-md transition">
                    <h4 class="text-xl font-bold text-gray-800 mb-1">{{ $post->title }}</h4>
                    <p class="text-sm text-gray-500 mb-2">Publicado el {{ $post->created_at->format('d/m/Y') }}</p>
                    <p class="text-sm text-gray-700 line-clamp-3">{{ Str::limit($post->content, 100) }}</p>

                    <a href="{{ url('/category/show/' . $post->id) }}" class="text-red-700 hover:underline text-sm mt-2 inline-block">
                        Ver más →
                    </a>
                </div>
            @endforeach
        </div>
    @endif


@endsection