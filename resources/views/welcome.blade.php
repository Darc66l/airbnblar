@extends('layouts.app')

@section('title')
  Главная
@endsection

@section('main')
 <!-- News Section -->
 <div class="dark:bg-gray-900">
         
  <h2 class="text-xl font-semibold mb-2 text-zinc-200 ml-2 text-center">Поиск объявлений</h2>

  <!-- Search form -->
  <form action="{{ route('ads.search') }}" method="GET" class="mb-4 ml-2 text-center">
    @csrf
    <input type="text" name="query" placeholder="Введите название объявления" class="bg-gray-50 border p-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Поиск</button>
  </form>

  <div class="dark:bg-gray-900 lg:pl-40 md:pl-10 w-screen grid grid-cols-1 md:grid-cols-2  lg:grid-cols-3 gap-6 ">
    <a href="{{ route('ads.show.category', ['category' => 'Загородные дома']) }}" class="inline-block transition-transform ease hover:scale-110 w-full md:w-48 lg:w-56">
      <div class="w-full md:w-60 lg:w-64 h-64 bg-gradient-to-r from-blue-500 to-pink-500 text-white p-6 rounded-lg flex flex-col justify-evenly items-center">
        <h1 class="text-center text-sm">Загородные дома</h1>
        <img class="mt-2" src="{{ asset('images/village_icon.jpg') }}" alt="">
      </div>
    </a>
  
    <a href="{{ route('ads.show.category', ['category' => 'Популярное']) }}" class="inline-block transition-transform ease hover:scale-110 w-full md:w-48 lg:w-56">
      <div class="w-full md:w-60 lg:w-64 h-64 bg-gradient-to-r from-red-500 to-yellow-500 text-white p-6 rounded-lg flex flex-col justify-evenly items-center">
        <h1 class="text-center text-sm">Популярное</h1>
        <img class="mt-2" src="{{ asset('images/popular.jpg') }}" alt="">
      </div>
    </a>
  
    <a href="{{ route('ads.show.category', ['category' => 'Вау!']) }}" class="inline-block transition-transform ease hover:scale-110 w-full md:w-48 lg:w-56">
      <div class="w-full md:w-60 lg:w-64 h-64 bg-gradient-to-r from-purple-700 to-red-700 text-white p-6 rounded-lg flex flex-col justify-evenly items-center">
        <h1 class="text-center text-sm">Вау!</h1>
        <img class="mt-2" src="{{ asset('images/Wow.jpg') }}" alt="">
      </div>
    </a>
  
    <a href="{{ route('ads.show.category', ['category' => 'Микро Дома']) }}" class="inline-block transition-transform ease hover:scale-110 w-full md:w-48 lg:w-56">
      <div class="w-full md:w-60 lg:w-64 h-64 bg-gradient-to-r from-green-500 to-yellow-500 text-white p-6 rounded-lg flex flex-col justify-evenly items-center">
        <h1 class="text-center text-sm">Микродома</h1>
        <img class="mt-2" src="{{ asset('images/micro.jpg') }}" alt="">
      </div>
    </a>
  
    <a href="{{ route('ads.show.category', ['category' => 'Остров']) }}" class="inline-block transition-transform ease hover:scale-110 w-full md:w-48 lg:w-56">
      <div class="w-full md:w-60 lg:w-64 h-64 bg-gradient-to-r from-orange-500 to-yellow-500 text-white p-6 rounded-lg flex flex-col justify-evenly items-center">
        <h1 class="text-center text-sm">Остров</h1>
        <img class="mt-2" src="{{ asset('images/island.jpg') }}" alt="">
      </div>
    </a>
  
    <a href="{{ route('ads.show.category', ['category' => 'Сёрфинг']) }}" class="inline-block transition-transform ease hover:scale-110 w-full md:w-48 lg:w-56">
      <div class="w-full md:w-60 lg:w-64 h-64 bg-gradient-to-r from-indigo-500 to-blue-500 text-white p-6 rounded-lg flex flex-col justify-evenly items-center">
        <h1 class="text-center text-sm">Сёрфинг</h1>
        <img class="mt-2" src="{{ asset('images/surfing.jpg') }}" alt="">
      </div>
    </a>
  </div>
@endsection
