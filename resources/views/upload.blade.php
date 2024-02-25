@extends('layouts.app2')

@section('title', 'Upload')

@section('main')
@auth
    <div class="max-w-md mx-auto pt-5 bg-gray-900 rounded-md shadow-md">
        <div class="w-full bg-white rounded-lg px-4 py-2 shadow dark:border  sm:max-w-md  dark:bg-gray-800 dark:border-gray-700">
        <h2 class="text-2xl font-semibold mb-4 text-white">Загрузка нового макета</h2>

        <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="Name" class="block text-sm font-medium text-gray-300">Название:</label>
                <input type="text" name="Name" id="Name" class="mt-1 p-2 w-full bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            
            <div class="mb-4">
                <label for="Description" class="block text-sm font-medium text-gray-300">Краткое описание:</label>
                <textarea name="Description" id="Description" class="mt-1 p-2 w-full bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
            </div>
            
            <div class="mb-4">
                <label for="Address" class="block text-sm font-medium text-gray-300">Адрес:</label>
                <input type="text" name="Address" id="Address" class="mt-1 p-2 w-full bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2">Проверить на карте</button>
            </div>
            
            <div class="mb-4 flex items-center">
                <label for="Price" class="block text-sm font-medium text-gray-300">Цена:</label>
                <div class="w-3/4 flex">
                    <input type="number" name="Price" id="Price" class="mt-1 p-2 w-full bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <p class="text-gray-900 sm:text-sm ml-1">$</p>
                </div>
            </div>
                
            
            <div class="mb-4">
                <label for="Path" class="block text-sm font-medium text-gray-300">Изображение:</label>
                <input type="file" name="Path" id="img" class="mt-1 p-2 w-full bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <label for="category" class="text-gray-300">Category:</label>
            <select name="category" class="bg-gray-50 border border-gray-300 pl-2 mx-2 text-gray-900 rounded-lg">
                <option disabled selected value>Выберите Категорию</option>
                <option value="Загородные дома" >Загородные дома</option>
                <option value="Популярное">Популярное</option>
                <option value="Вау!">Вау!</option>
                <option value="Микро Дома">Микро Дома</option>
                <option value="Остров">Остров</option>
                <option value="Сёрфинг">Сёрфинг</option>
                <option value=" " >Без Категории</option>
            </select>
            
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 hover:bg-blue-800 rounded-md">Загрузить</button>
        </form>
    </div>
    </div>
    @else
    <h1 class="text-center text-2xl md:text-6xl text-gray-400">You are not logged in.😥</h1>
    @endauth
@endsection


