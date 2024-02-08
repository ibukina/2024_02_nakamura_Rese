<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class ShopController extends Controller
{
    public function create(){
        $shops=Shop::all();
        if(Auth::check()){
            $favorites=Auth::user()->favorites()->with('shop')->get();
            $favorites=$favorites->keyBy('shop_id');
            return view ('shop_all', compact('shops', 'favorites'));
        }
        return view ('shop_all', compact('shops'));
    }

    public function search(Request $request){
        $shops=Shop::AreaSearch($request->area)->GenreSearch($request->genre)->KeywordSearch($request->keyword)->get();
        if(Auth::check()){
            $favorites=Auth::user()->favorites()->with('shop')->get();
            $favorites=$favorites->keyBy('shop_id');
            return view ('shop_all', compact('shops', 'favorites'));
        }
        return view('shop_all', compact('shops'));
    }

    public function detail($shop_id){
        $detail=Shop::find($shop_id);
        return view ('shop_detail', compact('detail'));
    }
}
