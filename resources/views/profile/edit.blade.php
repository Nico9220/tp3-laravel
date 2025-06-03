<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Perfil
        </h2>
    </x-slot>

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
</x-app-layout>