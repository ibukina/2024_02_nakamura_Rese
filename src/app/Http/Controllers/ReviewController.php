<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;
use App\Models\Shop;
use App\Models\Review;

// 予約なしでもレビューできる・ユーザーは一店舗につき一個までレビュー可能に変更する

class ReviewController extends Controller
{
    public function create($detail_id){
        $shop=Shop::find($detail_id);
        $user_id=Auth::id();
        $review=Review::where('shop_id', $detail_id)->where('user_id', $user_id)->get();
        return view('review', compact('shop', 'review', 'user_id'));
    }

    public function store(ReviewRequest $request){
        if(!is_null($request->store_image)){
            $image_file=$request->file('store_image');
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
        }
        $review=[
            'user_id'=>$request->user_id,
            'shop_id'=>$request->shop_id,
            'score'=>$request->score,
            'comment'=>$request->comment,
        ];
        Review::create($review);
        return redirect()->back()->with('message', '口コミを投稿しました');
    }

    public function update(ReviewRequest $request, $review_id){
        if(!is_null($request->store_image)){
            $image_file=$request->file('store_image');
            $filename=$image_file->getClientOriginalName();
            $image_path=$image_file->storeAs('public/image', $filename);
            //画像を保存するパスは"public/image/xxx.jpeg"
            $read_path = str_replace('public/', 'storage/', $image_path);
        }
        $review=[
            'score'=>$request->score,
            'comment'=>$request->comment,
            'img_url'=>$read_path,
        ];
        Review::find($review_id)->update($review);
        return redirect()->back()->with('message', '口コミを更新しました');
    }

    public function destroy($review_id){
        Review::find($review_id)->delete();
        return redirect()->back()->with('message', '口コミを削除しました');
    }
}
