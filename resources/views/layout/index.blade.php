<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Shortener App')</title>
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-400 to-indigo-600 min-h-screen flex flex-col">

<header class="bg-white bg-opacity-20 backdrop-blur-sm shadow p-6">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-white text-3xl font-bold tracking-wide">Ссылкосокращетель)</h1>
        <nav>
            <a href="{{ route('login') }}" class="text-white hover:underline mr-4">Войти</a>
            <a href="{{ route('register') }}" class="text-white hover:underline">Регистрация</a>
        </nav>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-12 flex flex-col items-center justify-center text-center text-white">
    @yield('main')


</main>

<footer class="bg-white bg-opacity-20 backdrop-blur-sm text-white text-center p-4">
    &copy; {{ date('Y') }} Ссылкосокращатель)
</footer>

</body>
</html>
