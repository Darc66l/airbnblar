<!-- show_by_category.blade.php -->

@extends('layouts.app2')
@section('title', $sortedimages->first()->category) 
@section('main')
    <div class="max-w mx-auto p-6 bg-gray-900 shadow-md">
        <h2 class="text-2xl text-zinc-200 font-semibold mb-4 ">{{ $sortedimages->first()->category }}</h2>
        
        <ul class="flex flex-wrap justify-center -mx-2 ">
            @foreach ($sortedimages as $image)
            <li class="mb-4 p-4  rounded-md w-full md:w-1/2 lg:w-1/4 md:mx-2 border border-slate-500 transition duration-200 hover:border-2 hover:shadow-md hover:scale-105">
                <a href="{{ route('ads.show', ['id' => $image->id]) }}" class="text-zinc-200 block">
                    <img src="{{ asset($image->Path) }}" alt="{{ $image->Name }}" class="w-full h-48 object-cover mb-4 rounded-md">
                    <p class="text-zinc-200 mb-2 font-semibold text-center">{{ $image->Name }}</p>
                    <p class="text-zinc-300 text-center">{{ $image->Description }}</p>
                    <p class="text-zinc-300 text-center">Price: {{ $image->Price }}$</p>
                    <p class="text-gray-300 text-center">Adress: {{ $image->Adress }}</p>                        
                </a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
