@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/management.css') }}">
@endsection

@section('main_content')
<div class="content-management">
    @if(session('message'))
        <div class="alert">
            {{ session('message') }}
        </div>
    @endif
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
    <div class="select-store-form">
        @csrf
        <div class="store-title">カテゴリ追加</div>
        <form class="form-item_wrapper" enctype="multipart/form-data" action="/management/image"  method="post">
            @csrf
            <input class="form-item form-item_image" type="file" name="store_image">
            <button class="store-button">追加</button>
        </form>
        <form class="form-item_wrapper" action="/management/area"  method="post">
            @csrf
            <input class="form-item" type="text" name="store_area" placeholder="Area">
            <button class="store-button">追加</button>
        </form>
        <form class="form-item_wrapper" action="/management/genre"  method="post">
            @csrf
            <input class="form-item" type="text" name="store_genre" placeholder="Genre">
            <button class="store-button">追加</button>
        </form>
</div>
    <form class="shop-store-form" action="/management/shop" method="post">
        @csrf
        <div class="store-title">新店舗追加</div>
        <div class="store-form-item_wrapper">
            <div class="form-select_wrapper">
                <select class="form-item_select" name="image_id" id="image">
                    <option value="">All Image</option>
                    @foreach($images as $image)
                    <option value="{{ $image->id }}">{{ $image->image }}</option>
                    @endforeach
                </select>
                <select class="form-item_select" name="area_id" id="area">
                    <option value="">All Area</option>
                    @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                    @endforeach
                </select>
                <select class="form-item_select" name="genre_id" id="genre">
                    <option value="">All Genre</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
            </div>
            <input class="form-item" type="text" name="name" placeholder="ShopName">
            <textarea class="form-item_text" name="summary">Summary{{ old('description') }}</textarea>
        </div>
        <button class="store-button">追加</button>
    </form>
    <div class="shop-review_wrapper">
        <div class="review-title">Reservation</div>
        @if($shops)
        @foreach($shops as $shop)
        <div class="review-wrapper">
            <table class="review-table">
                <tr class="table-row">
                    <th class="table-header">Shop Name</th>
                </tr>
                <tr class="table-row">
                    <td class="table-data">{{ $shop->name }}</td>
                </tr>
            </table>
            <table class="review-table">
                <tr class="table-row">
                    <th class="table-header">Reservation Calender</th>
                </tr>
                <tr class="table-row">
                    <td class="table-data">
                        @yield('calendar')
                    </td>
                </tr>
            </table>
        </div>
        @endforeach
        @endif
    </div>
</div>
<script src="{{ asset('js/hidden-comment.js') }}" defer></script>
@endsection