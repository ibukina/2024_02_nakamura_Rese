<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;
use App\Models\Shop;
use App\Models\Review;

class ReviewController extends Controller
{
    public function reviewAll($detail_id){
        $shop=Shop::find($detail_id);
        $reviews=Review::where('shop_id', $detail_id)->get();
        return view('review_all', compact('shop', 'reviews'));
    }

    public function create($detail_id){
        $shop=Shop::find($detail_id);
        $user_id=Auth::id();
        $review=Review::where('shop_id', $detail_id)->where('user_id', $user_id)->first();
        return view('review', compact('shop', 'review', 'user_id'));
    }

    public function updateOrCreate(ReviewRequest $request){
        if(!is_null($request->img_url)){
            $image_file=$request->file('img_url');
            $filename=$image_file->getClientOriginalName();
            $image_path=$image_file->storeAs('public/image', $filename);
            //画像を保存するパスは"public/image/xxx.jpeg"
            $read_path = str_replace('public/', 'storage/', $image_path);
            $review=[
                'user_id'=>$request->user_id,
                'shop_id'=>$request->shop_id,
                'score'=>$request->score,
                'comment'=>$request->comment,
                'img_url'=>$read_path,
            ];
        }else{
            $review=[
                'user_id'=>$request->user_id,
                'shop_id'=>$request->shop_id,
                'score'=>$request->score,
                'comment'=>$request->comment,
            ];
        };
        Review::updateOrCreate(['id'=>$request->review_id], $review);
        return redirect('/');
    }

    public function destroy($review_id){
        Review::find($review_id)->delete();
        return redirect()->back();
    }
}
