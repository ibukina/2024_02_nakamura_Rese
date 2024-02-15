<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;
use App\Models\Image;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;

class ShopController extends Controller
{
    public function create(){
        $areas=Area::all();
        $genres=Genre::all();
        $shops=Shop::all();
        if(Auth::check()){
            $favorites=Auth::user()->favorites()->with('shop')->get();
            $favorites=$favorites->keyBy('shop_id');
            return view ('shop_all', compact('areas', 'genres', 'shops', 'favorites'));
        }
        return view ('shop_all', compact('areas', 'genres', 'shops'));
    }

    public function search(Request $request){
        $areas=Area::all();
        $genres=Genre::all();
        $shops=Shop::AreaSearch($request->area)->GenreSearch($request->genre)->KeywordSearch($request->keyword)->get();
        if(Auth::check()){
            $favorites=Auth::user()->favorites()->with('shop')->get();
            $favorites=$favorites->keyBy('shop_id');
            return view ('shop_all', compact('areas', 'genres', 'shops', 'favorites'));
        }
        return view('shop_all', compact('areas', 'genres', 'shops'));
    }

    public function detail($shop_id){
        $images=Image::all();
        $areas=Area::all();
        $genres=Genre::all();
        $detail=Shop::find($shop_id);
        return view ('shop_detail', compact('images', 'areas', 'genres', 'detail'));
    }

    public function update(ShopRequest $request){
        $shops=[
            'image_id'=>$request->image_id,
            'area_id'=>$request->area_id,
            'genre_id'=>$request->genre_id,
            'name'=>$request->name,
            'summary'=>$request->summary,
        ];
        Shop::find($request->shop_id)->update($shops);
        $areas=Area::all();
        $genres=Genre::all();
        $shops=Shop::all();
        return view ('shop_all', compact('areas', 'genres', 'shops'));
    }
}
