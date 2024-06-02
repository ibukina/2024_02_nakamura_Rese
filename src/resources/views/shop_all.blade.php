@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_all.css') }}">
@endsection

@section('header_content')
<div class="content-search">
    @can('user-only')
    <div class="sort-form_wrapper">
        <span class="sort-form_item-span">並び替え：評価高/低</span>
        <form class="sort-form" action="/sort" method="post">
            @csrf
            <select class="sort-form_item" name="sort" onchange="this.form.submit()">
                <option value="random">ランダム</option>
                <option value="good-ratings">評価が高い順</option>
                <option value="bad-ratings">評価は低い順</option>
            </select>
        </form>
    </div>
    @endcan
    <div class="search-form_wrapper">
        <form class="search-form" action="/search" method="post">
            @csrf
            <div class="select-wrapper">
                <select class="search-form_item-select" name="area" id="area">
                    <option value="">All area</option>
                    @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                    @endforeach
                </select>
            </div>
            <div class="select-wrapper">
                <select class="search-form_item-select" name="genre" id="genre">
                    <option value="">All genre</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
            </div>
            <button class="search-form_item-button"></button>
            <input class="search-form_item" name="keyword" type="text" placeholder="Search ...">
        </form>
    </div>
</div>
@endsection

@section('main_content')
@can('admin-only')
<div class="management-link_wrapper">
    <a class="management-link" href="/admin">店舗代表者追加</a>
    <a class="management-link" href="/admin/shop">店舗追加</a>
</div>
@endcan
@can('manager-only')
<div class="management-link_wrapper">
    <a class="management-link" href="/management">管理画面へ</a>
</div>
@endcan
<div class="content-shop">
    <div class="shop-range">
        @if(!empty($shops))
        @foreach($shops as $shop)
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
        @endforeach
        @else
        <div class="search-no_message">検索に一致するものはありませんでした。</div>
        @endif
    </div>
</div>
@endsection