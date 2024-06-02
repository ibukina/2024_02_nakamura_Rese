@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('main_content')
<div class="content-detail">
    @if($reviews->isNotEmpty())
    @can('user-only')
    <div class="detail-wrapper">
        <img class="shop-image_has-review" src="{{ asset( $detail->image->image ) }}" alt="画像">
        <div class="shop-tag_wrapper">
            <div class="shop-tag_area">#{{ $detail->area->area }}</div>
            <div class="shop-tag_genre">#{{ $detail->genre->genre }}</div>
        </div>
        <div class="shop-summary">{{ $detail->summary }}</div>
        <a class="review-all_link" href="/review/all">全ての口コミ情報</a>
        <div class="shop-review_edit-wrapper">
            @foreach($reviews as $review)
            <div class="review-edit_form-wrapper">
                <a class="review-delete_link" href="/review/delete/{{ $review->id }}">口コミを削除</a>
                <a class="review-edit_link" href="/review/{{ $detail->id }}">口コミを編集</a>
            </div>
            <div class="user-review_wrapper">
                <label class="score">
                    @for($score = 1; $score <= 5; $score++)
                    @if($score <= $review->score)
                    <span class="star filled">★</span>
                    @else
                    <span class="star">★</span>
                    @endif
                    @endfor
                </label>
                <p class="user-review">{{ $review->comment }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endcan
    @else
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
        @can('user-only')
        <a class="review-link" href="/review/{{ $detail->id }}">口コミを投稿する</a>
        @endcan
    </div>
    @endif
    @can('user-only')
    <form class="reservation-form" action="/reservation" method="post">
        @csrf
        <input type="hidden" name="shop_id" value="{{ $detail->id }}">
        <div class="reservation-form_wrapper">
            <div class="reservation-title">予約</div>
            <label class="select-date_wrapper">
                <input class="form-item_select form-item_select-date" name="date" type="date" value="2021-04-01">
            </label>
            <label class="select-wrapper">
                <input class="form-item_select" name="time" type="time" value="17:00">
            </label>
            <label class="select-wrapper">
                <input class="form-item_select form-item_select-number" name="number" type="text" value="1人">
            </label>
            <div class="result-wrapper">
                <table class="result-table">
                    <tr class="table-row">
                        <th class="table-header">Shop</th>
                        <td class="table-data table-data_shop">{{ $detail->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Date</th>
                        <td class="table-data table-data_date">2021-04-01</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Time</th>
                        <td class="table-data table-data_time">17:00</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Number</th>
                        <td class="table-data table-data_number">1人</td>
                    </tr>
                </table>
            </div>
        </div>
        <button class="reservation-button">予約する</button>
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
    @endcan
    @if(Auth::guest())
    <div class="message">予約するにはログインが必要です</div>
    @endif
</div>
<script src="{{ asset('js/reservation_result.js') }}" defer></script>
<script src="{{ asset('js/update_result.js') }}" defer></script>
@endsection