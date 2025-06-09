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

            {{-- Campo para el nombre --}}
            <div class="mb-4"> {{-- Agregamos un margen inferior --}}
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name') <div class="text-red-500 text-xs italic mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- Campo para el email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('email') <div class="text-red-500 text-xs italic mt-1">{{ $message }}</div> @enderror
            </div>

            <hr class="my-6"> {{-- Separador para las contraseñas --}}

            <h3 class="text-lg font-semibold text-gray-800 mb-4">Cambiar Contraseña</h3>

            {{-- Campo para la nueva contraseña --}}
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Nueva Contraseña:</label>
                <input type="password" name="password" id="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password') <div class="text-red-500 text-xs italic mt-1">{{ $message }}</div> @enderror
            </div>

            {{-- Campo para confirmar la nueva contraseña --}}
            <div class="mb-6"> {{-- Agregamos un margen inferior más grande --}}
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmar Nueva Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button class="mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Guardar cambios
            </button>
        </form>

        <form method="POST" action="{{ route('profile.destroy') }}" class="mt-8"> {{-- Aumentamos el margen --}}
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar tu cuenta? Esta acción no se puede deshacer.')" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
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