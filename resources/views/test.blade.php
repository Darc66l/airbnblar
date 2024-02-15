<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>
</head>
<body>
    <x-mapbox 
    id="map" 
    class="hellomap" 
    style="height: 500px; width: 500px;" 
    mapStyle="mapbox/navigation-night-v1"
    :center="['long' => $centercords[0], 'lat' => $centercords[1] ]"  
    :navigationControls="true"
    :interactive="false"
    :markers="[['long' => $cords[0] , 'lat' => $cords[1] ,'description' => 'helloworld'], ['long' => 9, 'lat' => 10]]" 
    />
</body>
</html>