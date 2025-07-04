@extends('layout.index')

@section('main')
    <form action="{{ route('register.post') }}" method="POST" class="w-full max-w-md bg-white bg-opacity-10 p-8 rounded-lg shadow-lg backdrop-blur-md">
        @csrf

        <h2 class="text-2xl font-bold text-white mb-6 text-center">Регистрация</h2>

        <div class="mb-4">
            <label for="name" class="block text-white text-sm mb-2">Имя</label>
            <input type="text" name="name" id="name" placeholder="Введите ваше имя"
                   class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-20 text-white placeholder-white border border-white focus:outline-none focus:ring-2 focus:ring-indigo-300">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-white text-sm mb-2">Email</label>
            <input type="email" name="email" id="email" placeholder="Введите ваш email"
                   class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-20 text-white placeholder-white border border-white focus:outline-none focus:ring-2 focus:ring-indigo-300">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-white text-sm mb-2">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Введите ваш пароль"
                   class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-20 text-white placeholder-white border border-white focus:outline-none focus:ring-2 focus:ring-indigo-300">
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-white text-sm mb-2">Повторите пароль</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Повторите ваш пароль"
                   class="w-full px-4 py-2 rounded-lg bg-white bg-opacity-20 text-white placeholder-white border border-white focus:outline-none focus:ring-2 focus:ring-indigo-300">
        </div>

        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition">
            Зарегистрироваться
        </button>
    </form>
@endsection
