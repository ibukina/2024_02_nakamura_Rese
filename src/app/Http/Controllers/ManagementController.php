<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\GenreRequest;
use App\Models\Shop;
use App\Models\Image;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;

class ManagementController extends Controller
{
    public function create(){
        $images=Image::all();
        $areas=Area::all();
        $genres=Genre::all();
        $reservations=Reservation::all();
        $shops=Shop::with('reservations')->has('reservations')->get();
        return view('management', compact('images', 'areas', 'genres', 'reservations', 'shops'));
    }

    public function imageStore(ImageRequest $request){
        $image_file=$request->file('store_image');
        $filename=$image_file->getClientOriginalName();
        $image_path=$image_file->storeAs('public/image', $filename);
        //画像を保存するパスは"public/image/xxx.jpeg"
        $read_path = str_replace('public/', 'storage/', $image_path);
        // 画像のパスをデータベースに保存
        $image=Image::create(['image'=>$read_path]);
        return redirect('/management')->with('message', '画像を追加しました');
    }

    public function areaStore(AreaRequest $request){
        $area=['area'=>$request->store_area];
        Area::create($area);
        return redirect('/management')->with('message', 'エリアを追加しました');
    }

    public function genreStore(GenreRequest $request){
        $genre=['genre'=>$request->store_genre];
        Genre::create($genre);
        return redirect('/management')->with('message', 'ジャンルを追加しました');
    }

    public function shopStore(ShopRequest $request){
        $shop=[
            'image_id'=>$request->image_id,
            'area_id'=>$request->area_id,
            'genre_id'=>$request->genre_id,
            'name'=>$request->name,
            'summary'=>$request->summary,
        ];
        Shop::create($shop);
        return redirect('/management')->with('message', '新店舗を追加しました');
    }
}
