<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Blog Personal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css">
</head>



<body class="bg-gray-100 text-gray-900">
    <nav class="bg-red-700 px-6 py-4 text-white flex justify-between items-center">
        <div class="flex gap-4 items-center">
            <a href="/" class="hover:underline font-semibold">Inicio</a>
            <a href="/category" class="hover:underline">Categorías</a>
            <a href="/category/create" class="hover:underline">Crear Post</a>
        </div>

        <div class="flex items-center gap-4">
            @guest
            <a href="{{ route('login') }}" class="hover:underline">Login</a>
            @endguest

            @auth
            <span class="text-sm">Bienvenido, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-transparent hover:underline text-white">
                    Logout
                </button>
            </form>
            @endauth
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>


</body>

</html>