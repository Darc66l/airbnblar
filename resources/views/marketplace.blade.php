@extends('layouts.app')

@section('title', 'Layouts List')

@section('main')
    <div class="max-w mx-auto p-6 bg-gray-900 shadow-md">
        <h2 class="text-2xl text-zinc-200 font-semibold mb-4 ">Список макетов</h2>
        
        <ul class="flex flex-wrap justify-center -mx-2 ">
            @foreach ($images as $image)
                <li class="mb-4 p-4  rounded-md w-full md:w-1/2 lg:w-1/4 md:mx-2 border border-slate-500 transition duration-200 hover:border-2 hover:shadow-md hover:scale-105">
                    <a href="{{ route('ads.show', ['id' => $image->id]) }}" class="text-blue-500 block">
                        <img src="{{ asset($image->Path) }}" alt="{{ $image->Name }}" class="w-72 h-48 object-cover mb-4 rounded-md">
                        <p class="mb-2 font-semibold">{{ $image->Name }}</p>
                        <p class="text-zinc-400">{{ $image->Description }}</p>
                        <p class="text-zinc-400	">Price: {{ $image->Price }}$</p>
                        <p class="text-zinc-400	">Address: {{ $image->Adress }}</p>                        
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
