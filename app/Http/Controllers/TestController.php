<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function Show()
    { 
        $data = Image::select('adress')->where('id',41)->get();
        foreach ($data as $image){ 
            $jsonData = file_get_contents('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$image->adress.'.json?proximity=ip&access_token=pk.eyJ1IjoiZGFya2M2NmwiLCJhIjoiY2xyeXdnc2x4MXpldTJrbXV0bjJnNHZpciJ9.g3zSV1QXymd-NDiouubpSw');
        }
      
        // Преобразование JSON в ассоциативный массив
        $dataArray = json_decode($jsonData, true);

        // Получение значений lat и long из массива
        // $lat = $dataArray['lat'];
        // $long = $dataArray['long'];
        // $cords = [];
        // $cords.array_push($lat);
        // $cords.array_push($long);
        
        $lon = $dataArray['features'][0]['geometry']['coordinates'][0];
        $lat = $dataArray['features'][0]['geometry']['coordinates'][1];
        $cords = [];
        array_push($cords,$lon);
        array_push($cords,$lat);

        $centerlon = $dataArray['features'][0]['center'][0];
        $centerlat = $dataArray['features'][0]['center'][1];
        $centercords = [];
        array_push($centercords, $centerlon);
        array_push($centercords, $centerlat);
    return view('test',compact('dataArray','cords','centercords'));
    }
}
