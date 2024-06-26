@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('main_content')
<div class="content-review">
    <div class="shop-detail_wrapper">
        <div class="shop-detail">
            <h2 class="review-question">今回のご利用はいかがでしたか？</h2>
            <div class="shop-container">
                <div class="shop-image">
                    <img class="shop-image_item" src="{{ asset($shop->image->image) }}" alt="画像">
                </div>
                <div class="detail-wrapper">
                    <div class="shop-name">{{ $shop->name }}</div>
                    <div class="shop-tag_wrapper">
                        <div class="shop-tag_area">#{{ $shop->area->area }}</div>
                        <div class="shop-tag_genre">#{{ $shop->genre->genre }}</div>
                    </div>
                    <div class="detail-mark_wrapper">
                        <form class="detail_form" action="/detail/{{$shop->id}}" method="get">
                            @csrf
                            <button class="detail-button">詳しくみる</button>
                        </form>
                        @can('user-only')
                        @if(Auth::check() && !empty($favorites))
                        @if(isset($favorites[$shop->id]))
                        <form class="favorite-form" action="/favorite" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="favorite_id" value="{{ $favorites[$shop->id]->id }}">
                            <button class="favorite-button">
                                <span class="favorite-mark_image-red"></span>
                            </button>
                        </form>
                        @else
                        <form class="favorite-form" action="/favorite" method="post">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                            <button class="favorite-button">
                                <span class="favorite-mark_image-gray"></span>
                            </button>
                        </form>
                        @endif
                        @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form class="review-form" action="/review" method="post" enctype="multipart/form-data">
        @csrf
        @if(!is_null($review))
        <input type="hidden" name="review_id" value="{{ $review->id }}">
        @endif
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        @if (count($errors) > 0)
        <div class="error-wrapper">
        <div class="error-has">
            入力内容に問題があります
        </div>
        <div class="error-message_wrapper">
            @foreach ($errors->all() as $error)
            <li class="error-message">{{$error}}</li>
            @endforeach
        </div>
        </div>
        @endif
        <h4 class="form-item_title">体験を評価してください</h4>
        <label class="score">
            <span class="star" data-value="1">★</span>
            <span class="star" data-value="2">★</span>
            <span class="star" data-value="3">★</span>
            <span class="star" data-value="4">★</span>
            <span class="star" data-value="5">★</span>
            @if(is_null($review))
            <input type="hidden" id="score-value" name="score" value="">
            @else
            <input type="hidden" id="score-value" name="score" value="{{ $review->score }}">
            @endif
        </label>
        <h4 class="form-item_title">口コミを投稿</h4>
        <label class="form-item">
            @if(is_null($review))
            <textarea class="form-item_text" name="comment" id="text-count" placeholder="カジュアルな夜のお出かけにおすすめのスポット"></textarea>
            @else
            <textarea class="form-item_text" name="comment" id="text-count" placeholder="カジュアルな夜のお出かけにおすすめのスポット">{{ $review->comment }}</textarea>
            @endif
            <p class="form-item_text-limit"><span class="limit-number">0</span>/400 (最大文字数)</p>
        </label>
        <h4 class="form-item_title">画像の追加</h4>
        <label class="form-item_file">
            <div class="form-item_input-wrapper">
                <input class="form-item_input" type="file" name="img_url">
                <div class="form-item_input-texts">
                    <p class="form-item_input-message">クリックして写真を追加</p>
                    <p class="form-item_input-summary">またはドラッグアンドドロップ</p>
                </div>
            </div>
        </label>
        <button class="review-button">口コミを投稿</button>
    </form>
</div>
@vite('resources/js/app.js')
@endsection