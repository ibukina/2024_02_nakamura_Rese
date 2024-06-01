@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('main_content')
<div class="content-review">
    <div class="shop-detail">
        <h2 class="review-question">今回のご利用はいかがでしたか？</h2>
        <div class="shop-container">
            <div class="shop-image">
                <img class="shop-image_item" src="{{ $shop->image->image }}" alt="画像">
            </div>
            <div class="detail-wrapper">
                <div class="shop-name">{{ $shop->name }}</div>
                <div class="shop-tag_wrapper">
                    <div class="shop-tag_area">#{{ $shop->area->area }}</div>
                    <div class="shop-tag_genre">#{{ $shop->genre->genre }}</div>
                </div>
                <div class="detail-mark_wrapper">
                    <div class="detail-button_wrapper">
                        <form class="detail_form" action="/detail/{{$shop->id}}" method="get">
                            @csrf
                            <button class="detail-button">詳しくみる</button>
                        </form>
                    </div>
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
    <form class="review-form" action="/review" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user_id }}">
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        <div class="review-form_wrapper">
            <div class="review-title">Review</div>
            <h4 class="form-item_title">体験を評価してください</h4>
            <label class="form-item">
                <span class="form-item_star">☆</span>
                <span class="form-item_star">☆</span>
                <span class="form-item_star">☆</span>
                <span class="form-item_star">☆</span>
                <span class="form-item_star">☆</span>
                <input type="hidden" id="score-value" name="score" value="">
            </label>
            <h4 class="form-item_title">口コミを投稿</h4>
            <label class="form-item">
                <textarea class="form-item_text" name="comment" placeholder="カジュアルな夜のお出かけにおすすめのスポット"></textarea>
            </label>
            <p class="form-item_text-limit"><span class="limit-number"></span> (最大文字数)</p>
            <h4 class="form-item_title">画像の追加</h4>
            <label class="form-item_file">
                <div class="form-item_input-wrapper">
                    <input class="form-item_input" type="file" name="img_url">
                    <span class="form-item_input-message">クリックして写真を追加</span>
                </div>
                <p class="form-item_input-summary">またはドラッグアンドドロップ</p>
            </label>
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
        </div>
        <button class="review-button">送信</button>
    </form>
</div>
@endsection