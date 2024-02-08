<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Favorite;

class UserInformationController extends Controller
{
    public function create(){
        $users=[Auth::user()->username];
        $reservations=Auth::user()->reservations()->with('shop')->get();
        $favorites=Auth::user()->favorites()->with('shop')->get();
        // $reviews=Auth::user()->reviews()->with('reservation')->get();
        if(!empty($reservations)){
            $now=Carbon::now();
            return view ('my_page', compact('users', 'reservations', 'favorites', 'now'));
        }
        return view ('my_page', compact('users', 'reservations', 'favorites'));
    }

    public function store(Request $request){
        $user_id=Auth::id();
        $favorite=[
            'user_id'=>$user_id,
            'shop_id'=>$request->shop_id
        ];
        Favorite::create($favorite);
        return redirect('/');
    }

    public function destroy(Request $request){
        Favorite::find($request->favorite_id)->delete();
        return redirect('/mypage');
    }
}
