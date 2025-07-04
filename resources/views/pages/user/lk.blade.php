@extends('layout.index')

@section('title', 'Личный кабинет')

@section('main')
    <div class="w-full max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold mb-8 text-white">Личный кабинет</h2>
        <h3 class="text-3xl font-bold mb-8 text-white">Мои ссылки</h3>
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="w-full table-auto text-sm text-gray-700">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left">Оригинальная ссылка</th>
                    <th class="px-4 py-3 text-left">Короткая</th>
                    <th class="px-4 py-3 text-center">Клики</th>
                    <th class="px-4 py-3 text-center">Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse($links as $link)
                    <tr class="border-b">
                        <td class="px-4 py-3 break-all">{{ $link->original_link }}</td>
                        <td class="px-4 py-3 break-all">
                            <a href="{{ route('short.link', $link->short_link) }}" class="text-blue-600 hover:underline"
                               target="_blank">
                                {{ url($link->short_link) }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-center">{{ $link->clicks }}</td>
                        <td class="px-4 py-3 text-center space-x-2">
                            <a href="{{ route('links.stats', $link->short_link) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded">
                                Статистика
                            </a>
                            <form action="{{ route('links.destroy', $link->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Удалить ссылку?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">У вас пока нет ссылок</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
