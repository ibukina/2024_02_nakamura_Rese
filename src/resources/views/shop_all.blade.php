@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('header_content')
<div class="content-search">
    <div class="search-form_wrapper">
        <form class="search-form" action="/search" method="post">
            @csrf
            <div class="select-wrapper">
                <select class="search-form_item-select" name="area" id="area">
                    <option value="">All area</option>
                    <option value="東京都">東京都</option>
                    <option value="大阪府">大阪府</option>
                    <option value="福岡県">福岡県</option>
                </select>
            </div>
            <div class="select-wrapper">
                <select class="search-form_item-select" name="genre" id="genre">
                    <option value="">All genre</option>
                    <option value="寿司">寿司</option>
                    <option value="焼肉">焼肉</option>
                    <option value="ラーメン">ラーメン</option>
                    <option value="居酒屋">居酒屋</option>
                    <option value="イタリアン">イタリアン</option>
                </select>
            </div>
            <button class="search-form_item-button"></button>
            <input class="search-form_item" name="keyword" type="text" placeholder="Search ...">
        </form>
    </div>
</div>
@endsection

@section('main_content')
<div class="content-shop">
    <div class="shop-range">
        @if(!empty($shops))
        @foreach($shops as $shop)
        <div class="shop-container">
            <div class="shop-image">
                <img class="shop-image_item" src="{{ $shop->image }}" alt="画像">
            </div>
            <div class="detail-wrapper">
                <div class="shop-name">{{ $shop->name }}</div>
                <div class="shop-tag_wrapper">
                    <div class="shop-tag_area">#{{ $shop->area }}</div>
                    <div class="shop-tag_genre">#{{ $shop->genre }}</div>
                </div>
                <div class="detail-mark_wrapper">
                    <div class="detail-button_wrapper">
                        <form class="detail_form" action="/detail/{{$shop->id}}" method="get">
                            @csrf
                            <button class="detail-button">詳しくみる</button>
                        </form>
                    </div>
                    @if(Auth::check() && !empty($favorites))
                    @if(isset($favorites[$shop->id]))
                    <form class="favorite-form" action="/favorite" method="post">
                        @method('DELETE')
                        @csrf
                        @foreach($favorites as $favorite)
                        <input type="hidden" name="favorite_id" value="{{ $favorite->id }}">
                        @endforeach
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
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="search-no_message">検索に一致するものはありませんでした。</div>
        @endif
    </div>
</div>
@endsection