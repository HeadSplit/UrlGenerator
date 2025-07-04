@extends('layout.index')
@section('title')
Главная
@endsection
@section('main')
    <h2 class="text-4xl font-extrabold mb-6 drop-shadow-lg">Создавайте короткие ссылки быстро и удобно</h2>

    <p class="max-w-xl mb-10 text-lg drop-shadow-md">
        Введите вашу длинную ссылку, и мы создадим для вас короткую ссылку, которой удобно делиться.
        Регистрируйтесь, чтобы отслеживать статистику и управлять ссылками в личном кабинете.
    </p>

    <form action="{{ route('links.store') }}" method="POST" class="w-full max-w-lg bg-white bg-opacity-20 backdrop-blur-md rounded-lg p-6 shadow-lg">
        @csrf
        <div class="flex flex-col md:flex-row gap-4">
            <input
                type="url"
                name="original_url"
                required
                placeholder="Вставьте длинную ссылку здесь"
                class="flex-grow rounded-md px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
            <button
                type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-md px-6 py-3 transition"
            >
                Создать короткую ссылку
            </button>
        </div>
        @error('original_url')
        <p class="mt-2 text-red-300 text-sm">{{ $message }}</p>
        @enderror
    </form>
@endsection
