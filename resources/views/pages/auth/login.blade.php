@extends('layout.index')
@section('main')
    <form action="{{ route('login.post') }}" method="POST" class="w-full max-w-md bg-white bg-opacity-10 p-8 rounded-lg shadow-lg backdrop-blur-md">
        @csrf
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
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition">Войти
@endsection
