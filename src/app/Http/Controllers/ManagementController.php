<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Review;

class ManagementController extends Controller
{
    public function create(){
        $images=Image::all();
        $areas=Area::all();
        $genres=Genre::all();
        $reviews=Review::all();
        return view('management', compact('images', 'areas', 'genres', 'reviews'));
    }

    public function store(Request $request){
        $area=['area'=>$request->area];
        if($area){
            Area::create($area);
        }
        $genre=['genre'=>$request->genre];
        if($genre){
            Genre::create($genre);
        }
        return redirect('/management');
    }
}
