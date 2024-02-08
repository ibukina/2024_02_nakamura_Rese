<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request){
        $user_id=Auth::id();
        $number=(int)$request->number; // int型に変更
        $reservation=[
            'user_id'=>$user_id,
            'shop_id'=>$request->shop_id,
            'date'=>$request->date,
            'time'=>$request->time,
            'number'=>$number,
        ];
        Reservation::create($reservation);
        return redirect('/done');
    }

    public function done(){
        return view ('done');
    }

    public function create($reservation_id){
        $reservation=Reservation::find($reservation_id);
        return view('my_update', compact('reservation'));
    }

    public function update(UpdateRequest $request){
        $number=(int)$request->number;
        $reservation=[
            'date'=>$request->date,
            'time'=>$request->time,
            'number'=>$number,
        ];
        Reservation::find($request->reservation_id)->update($reservation);
        return redirect('/mypage')->with('message', '予約情報を更新しました');
    }

    public function destroy(Request $request){
        Reservation::find($request->reservation_id)->delete();
        return redirect('/mypage')->with('message', '予約情報を削除しました');
    }
}
