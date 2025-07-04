@extends('layout.index')

@section('main')
    <h2 class="text-4xl font-bold mb-10">Статистика переходов по ссылке</h2>

    <div class="bg-white bg-opacity-10 backdrop-blur-sm p-6 rounded-lg shadow-md w-full max-w-3xl">
        <div class="mb-6">
            <p class="text-lg">
                <span class="font-semibold">Короткая ссылка:</span>
                <a href="{{ $link->short_link }}" target="_blank" class="underline text-blue-200 hover:text-white">
                    {{ $link->short_link }}
                </a>
            </p>
            <p class="text-lg">
                <span class="font-semibold">Оригинальная ссылка:</span>
                <a href="{{ $link->original_link }}" target="_blank" class="underline text-blue-200 hover:text-white">
                    {{ $link->original_link }}
                </a>
            </p>
            <p class="text-lg mt-2">
                <span class="font-semibold">Всего переходов:</span>
                <span class="text-white">{{ $link->clicks }}</span>
            </p>
        </div>

        <hr class="border-gray-400 my-6">

        <h3 class="text-2xl font-semibold mb-4">История переходов</h3>

        @if($link->clicks < 1)
        <p class="text-gray-300 italic">Переходов ещё не было.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm">
                    <thead>
                    <tr class="bg-white bg-opacity-20 text-white uppercase tracking-wide text-xs">
                        <th class="py-2 px-4">#</th>
                        <th class="py-2 px-4">IP-адрес</th>
                        <th class="py-2 px-4">Дата и время</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-white divide-opacity-10">
                    @foreach($link->clicksRelation as $index => $click)
                        <tr class="hover:bg-white hover:bg-opacity-10 transition">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $click->user_ip }}</td>
                            <td class="py-2 px-4">
                                {{ \Illuminate\Support\Carbon::parse($click->created_at)->format('d.m.Y H:i:s') }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
