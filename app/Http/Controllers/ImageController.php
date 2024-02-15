<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('marketplace', compact('images'));
    }


    public function indexwelcome()
    {
        $images = Image::all();
        return view('welcome', compact('images'));
    }


    public function show($id)
    {
        $layoutData = Image::find($id);

        
        $data = Image::select('adress')->where('id',$id)->get();
        try {
        foreach ($data as $image){ 
            $jsonData = file_get_contents('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$image->adress.'.json?proximity=ip&access_token=pk.eyJ1IjoiZGFya2M2NmwiLCJhIjoiY2xyeXdnc2x4MXpldTJrbXV0bjJnNHZpciJ9.g3zSV1QXymd-NDiouubpSw');
            }   
        } catch (Exception $e) {
            $error = $e->getMessage();
            $errors = [];
            array_push($errors, $error);
            return view('errors', $errors);
        }
        
        $dataArray = json_decode($jsonData, true);
        
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
        return view('show', compact('dataArray','centercords','cords','layoutData'));
    }
   
    
    public function showByCategory($category)
{

    $sortedimages = DB::table('images')->where('category', '=', $category)->get();
    if($sortedimages->isEmpty()){
        return redirect()->route('error.page');
    }
    else{
        return view('show_by_categories', compact('sortedimages'));
    }

}

public function errorPage()
{
    return view('errors');
}

public function search(Request $request)
    { 
        $query = $request->input('query');

        // Perform a search in the database based on the title
        $results = Image::where('Name', 'like', '%' . $query . '%')->get();
    
        return view('search_results', compact('results'));
    }

    public function create()
    {
        return view('upload');
    }



    public function store(Request $request)
    {
       $destination = "images";
        try {
            $request->validate([
                'Path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
                'Name' => 'required',
                'Description' => 'required',
                'Address' => 'required',
                'Price' => 'required',
            ]);
            $image = new Image();
            $image->Path = $request->file('Path')->move($destination);
            $image->Name = $request['Name'];
            $image->Description = $request['Description'];
            $image->Adress = $request['Address'];
            $image->Price = $request['Price'];  
            $image->category = $request['category']; 

            $image->save();
            
            return redirect()->route('ads.show', ['id' => $image->id]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        
        
    }

    public function checkmap(Request $request)
    {
        $adress = $request->input('address');

        $jsonData = file_get_contents('https://api.mapbox.com/geocoding/v5/mapbox.places/'.$adress.'.json?proximity=ip&access_token=pk.eyJ1IjoiZGFya2M2NmwiLCJhIjoiY2xyeXdnc2x4MXpldTJrbXV0bjJnNHZpciJ9.g3zSV1QXymd-NDiouubpSw');
      
        $dataArray = json_decode($jsonData, true);
        
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
        return view('upload', compact('centercords','cords'));
    }


}
