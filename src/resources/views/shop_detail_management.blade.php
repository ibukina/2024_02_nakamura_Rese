@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('main_content')
<div class="content-detail">
    <div class="detail-wrapper">
        <div class="detail-title">
            <div class="back-form">
                <button class="back-form_button" type="button" onClick="history.back()"><</button>
            </div>
            <div class="shop-name">{{ $detail->name }}</div>
        </div>
            <img class="shop-image" src="{{ asset( $detail->image->image ) }}" alt="画像">
        <div class="shop-tag_wrapper">
            <div class="shop-tag_area">#{{ $detail->area->area }}</div>
            <div class="shop-tag_genre">#{{ $detail->genre->genre }}</div>
        </div>
        <div class="shop-summary">{{ $detail->summary }}</div>
        <a class="review-all_link" href="/review/all/{{ $detail->id }}">全ての口コミ情報</a>
    </div>
    <form class="update-form" action="/management/shop/update" method="post">
        @method('PATCH')
        @csrf
        <input type="hidden" name="shop_id" value="{{ $detail->id }}">
        <div class="update-form_wrapper">
            <div class="update-title_wrapper">
                <div class="update-title">店舗内容変更</div>
                <a class="store-link" href="/management">店舗情報の
                    追加はこちらから</a>
            </div>
            <label class="select-wrapper">
                <select class="form-item_input" name="image_id" id="image">
                    <option value="">All Image</option>
                    @foreach($images as $image)
                    <option value="{{ $image->id }}">{{ $image->image }}</option>
                    @endforeach
                </select>
            </label>
            <label class="select-wrapper">
                <select class="form-item_input" name="area_id" id="area">
                    <option value="">All Area</option>
                    @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                    @endforeach
                </select>
            </label>
            <label class="select-wrapper">
                <select class="form-item_input" name="genre_id" id="genre">
                    <option value="">All Genre</option>
                    @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>
            </label>
            <label class="select-wrapper">
                <input class="form-item_input" name="name" type="text" value="{{ $detail->name }}">
            </label>
            <label class="select-wrapper">
                <textarea class="form-item_input form-item_textarea" name="summary" cols="30" rows="10">{{ $detail->summary }}</textarea>
            </label>
            <div class="result-wrapper result-wrapper_update">
                <table class="result-table">
                    <tr class="table-row">
                        <th class="table-header">Image</th>
                        <td class="table-data table-data_image">{{ $detail->image->image }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Area</th>
                        <td class="table-data table-data_area">{{ $detail->area->area }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Genre</th>
                        <td class="table-data table-data_genre">{{ $detail->genre->genre }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Name</th>
                        <td class="table-data table-data_name">{{ $detail->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Summary</th>
                        <td class="table-data table-data_summary">{{ $detail->summary }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <button class="reservation-button">変更する</button>
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
    </form>
</div>
<script src="{{ asset('js/reservation_result.js') }}" defer></script>
<script src="{{ asset('js/update_result.js') }}" defer></script>
@endsection