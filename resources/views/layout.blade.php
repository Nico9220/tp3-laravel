<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>MyBlog Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tipografía -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.5s ease-out both;
        }
    </style>
</head>

<body class="relative bg-gradient-to-br from-red-50 to-red-200 text-gray-900 min-h-screen flex flex-col">



    <!-- NAVBAR -->
    <nav class="relative z-10 bg-red-700 text-white px-8 py-4 shadow-md flex justify-between items-center">
        <div class="flex gap-6 items-center text-sm sm:text-base font-semibold tracking-tight">
            <a href="/" class="hover:underline">Inicio</a>
            <a href="/category" class="hover:underline">Categorías</a>
            <a href="/category/create" class="hover:underline">Crear Post</a>
        </div>

        <div class="flex items-center gap-4 text-sm sm:text-base">
            @guest
            <a href="{{ route('login') }}" class="hover:underline">Login</a>
            @endguest

            @auth
            <a href="{{ route('profile.edit') }}" class="hidden sm:inline hover:underline">
                Bienvenido, {{ auth()->user()->name }}
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:underline text-white">
                    Logout
                </button>
            </form>
            @endauth
        </div>
    </nav>

    <!-- CONTENIDO HOME-->
    <main class="animate-fade-in relative z-10 flex-grow px-6 sm:px-10 py-10 max-w-7xl mx-auto">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="relative z-10 bg-gray-100 text-center text-gray-500 text-sm py-4 border-t mt-12">
        La paciencia es un elemento clave del éxito — {{ date('Y') }}
    </footer>

</body>

</html>