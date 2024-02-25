@extends('layouts.app2')
@section('styles')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>
@endsection
@section('title', 'Layout Details')

@section('main')

<div class="max-w-screen-xl mx-auto  p-6 bg-gray-900  flex flex-col md:flex-row items-center">

    <div class="md:w-1/4 md:h-auto mb-6 md:mb-0">
        <img src="{{ asset($layoutData->Path) }}" alt="{{ $layoutData->Name }}" class="w-full h-auto rounded-md shadow-md">
    </div>

    <div class="md:w-1/4 bg-gray-900 p-6 rounded-md shadow-md md:ml-6 shadow-md shadow-slate-700">
        <h2 class="text-zinc-300 text-2xl font-semibold mb-3">{{ $layoutData->Name }}</h2>
        <p class="text-zinc-300 mb-3">Цена: ${{ $layoutData->Price }}</p>

        <p class="text-zinc-300  mb-3">{{ $layoutData->Description }}</p>
        
        <p class="text-zinc-300  mb-3">Адрес: {{ $layoutData->Adress }}</p>

        @if ($layoutData->category === null || $layoutData->category === '')
        <p class="text-zinc-300">Категория: ❌</p>
        @else
        <p class="text-zinc-300">Категория: {{ $layoutData->category }}</p>
        @endif

    </div>
    
    <div class="md:w-1/2 mt-6 md:mt-0">
        <x-mapbox 
            id="map" 
            class="w-full md:mx-auto"
            style="width:500px;height:500px;margin-top:120px; margin-left:48px;"
            mapStyle="mapbox/navigation-night-v1"
            :center="['long' => $centercords[0], 'lat' => $centercords[1] ]"  
            :navigationControls="true"
            :markers="[['long' => $cords[0] , 'lat' => $cords[1] ,'description' => 'helloworld'], ['long' => 9, 'lat' => 10]]" 
        /> 
    </div>
</div> 
@endsection
