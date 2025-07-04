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
            @auth()
            <a href="{{ route('dashboard') }}" class="text-white hover:underline mr-4">Главная</a>
            <a href="{{ route('logout') }}" class="text-white hover:underline mr-4">Выйти</a>
            <a href="{{ route('lk') }}" class="text-white hover:underline mr-4">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            @endauth
            @guest
            <a href="{{ route('login') }}" class="text-white hover:underline mr-4">Войти</a>
            <a href="{{ route('register') }}" class="text-white hover:underline">Регистрация</a>
            @endguest
        </nav>
    </div>
</header>

<main class="flex-grow container mx-auto px-4 py-12 flex flex-col items-center justify-center text-center text-white">
    @if(session('success'))
        <div class="bg-green-500 bg-opacity-80 text-white px-6 py-3 rounded mb-6 w-full max-w-xl text-center">
            {{ session('success') }}
        </div>
    @endif

        @if(session('error'))
            <div class="bg-red-500 bg-opacity-80 text-white px-6 py-3 rounded mb-6 w-full max-w-xl text-center">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-600 bg-opacity-90 text-white px-6 py-4 rounded mb-6 w-full max-w-xl text-left">
                <strong class="block mb-2">Ошибка:</strong>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    @foreach($errors->all() as $error)
                        <li>– {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @yield('main')


</main>

<footer class="bg-white bg-opacity-20 backdrop-blur-sm text-white text-center p-4">
    &copy; {{ date('Y') }} Ссылкосокращатель)
</footer>

</body>
</html>
