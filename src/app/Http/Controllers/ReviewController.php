<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Reservation;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create($reservation_id){
        $review=Reservation::find($reservation_id);
        return view('review', compact('review'));
    }

    public function store(ReviewRequest $request){
        $review=[
            'user_id'=>$request->user_id,
            'shop_id'=>$request->shop_id,
            'reservation_id'=>$request->reservation_id,
            'score'=>$request->score,
            'comment'=>$request->comment,
        ];
        Review::create($review);
        return redirect('/mypage')->with('message', 'レビューが送信されました');
    }
}
