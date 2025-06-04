<!-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-6 px-6 bg-white border border-gray-200 rounded shadow-sm">
        <p class="mb-4">Estás logueado en tu cuenta correctamente.</p>

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ url('/') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-center">Inicio del blog</a>
            <a href="{{ url('/category') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-center">Ver Categorías</a>
            <a href="{{ url('/category/create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-center">Crear Post</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</x-app-layout> -->