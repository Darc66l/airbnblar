@extends('layouts.app')

@section('title', 'Search Results')

@section('main')
<form action="{{ route('ads.search') }}" method="GET" class="pt-4 ml-2 text-center">
    @csrf
    <input type="text" name="query" placeholder="Введите название объявления" class="bg-gray-50 border p-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Поиск</button>
</form>

@if($results->isEmpty())
    <h1 class="text-center text-2xl md:text-6xl text-gray-400">No results found.😥</h1>
@else
    <div class="max-w mx-auto p-6 bg-gray-900 shadow-md">
        <h2 class="text-2xl text-zinc-200 font-semibold mb-4 ">Search Results</h2>

        <ul class="flex flex-wrap justify-center -mx-2 ">
            @foreach ($results as $result)
            <li class="mb-4 p-4  rounded-md w-full md:w-1/2 lg:w-1/4 md:mx-2 border border-slate-500 transition duration-200 hover:border-2 hover:shadow-md hover:scale-105">
                <a href="{{ route('ads.show', ['id' => $result->id]) }}" class="text-zinc-200 block">
                    <img src="{{ asset($result->Path) }}" alt="{{ $result->Name }}" class="w-full h-48 object-cover mb-4 rounded-md">
                    <p class="text-zinc-200 mb-2 font-semibold text-center">{{ $result->Name }}</p>
                    <p class="text-zinc-300 text-center">{{ $result->Description }}</p>
                    <p class="text-zinc-300 text-center">Price: {{ $result->Price }}$</p>
                    <p class="text-gray-300 text-center">Adress: {{ $result->Adress }}</p>                        
                </a>
            </li>
            @endforeach
        </ul>

    </div>
@endif
@endsection
