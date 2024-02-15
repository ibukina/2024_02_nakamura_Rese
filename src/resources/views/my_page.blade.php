@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
@endsection

@section('main_content')
<div class="content-mypage">
    <div class="reservation-wrapper">
        <div class="reservation-title">予約状況</div>
        @if(session('message'))
        <div class="alert">
            {{ session('message') }}
        </div>
        @endif
        @if(!empty($reservations))
        <div class="reservation-range">
            @foreach($reservations as $reservation)
            @if(!in_array($reservation->id, $reviewedReservationIds))
            <div class="reservation-information">
                <div class="reservation-information_title">
                    @if($now->greaterThan(date('Y-m-d H:i:s', strtotime($reservation->date . $reservation->time))))
                    <div class="reservation-update">
                        <div class="update-form">
                            <button class="update-button">
                                <span class="update-button_image"></span>
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="reservation-update">
                        <form class="update-form" action="/reservation/{{ $reservation->id }}" method="get">
                            @csrf
                            <button class="update-button">
                                <span class="update-button_image"></span>
                            </button>
                        </form>
                    </div>
                    @endif
                    <div class="reservation-number">予約{{ $loop->iteration }}</div>
                    @if($now->greaterThan(date('Y-m-d H:i:s', strtotime($reservation->date . $reservation->time))))
                    <div class="reservation-review">
                        <form class="review-form" action="/review/{{ $reservation->id }}" method="get">
                            @csrf
                            <button class="review-button">
                                <span class="review-button_image"></span>
                            </button>
                        </form>
                    </div>
                    @else
                    <div class="reservation-delete">
                        <form class="delete-form" action="/reservation" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                            <button class="delete-button">
                                <span class="delete-button_image"></span>
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                <table class="reservation-table">
                    <tr class="table-row">
                        <th class="table-header">Shop</th>
                        <td class="table-data">{{ $reservation->shop->name }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Date</th>
                        <td class="table-data">{{ $reservation->date }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Time</th>
                        <td class="table-data">{{ $reservation->time }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Number</th>
                        <td class="table-data">{{ $reservation->number }}人</td>
                    </tr>
                </table>
            </div>
            @endif
            @endforeach
        </div>
        @else
        <div class="reservation-no_message">予約はありません。</div>
        @endif
    </div>
    <div class="favorite-wrapper">
        @foreach($users as $user)
        <div class="mypage-username">
            {{ $user }}さん
        </div>
        @endforeach
        <div class="favorite-title">お気に入り店舗</div>
        @if(!empty($favorites))
        <div class="shop-range">
            @foreach($favorites as $favorite)
            <div class="shop-container">
                <div class="shop-image">
                    <img class="shop-image_item" src="{{ $favorite->shop->image->image }}" alt="画像">
                </div>
                <div class="detail-wrapper">
                    <div class="shop-name">{{ $favorite->shop->name }}</div>
                    <div class="shop-tag_wrapper">
                        <div class="shop-tag_area">#{{ $favorite->shop->area->area }}</div>
                        <div class="shop-tag_genre">#{{ $favorite->shop->genre->genre }}</div>
                    </div>
                    <div class="detail-mark_wrapper">
                        <div class="detail-button_wrapper">
                            <form class="detail_form" action="/detail/{{ $favorite->shop->id }}" method="get">
                                @csrf
                                <button class="detail-button">詳しくみる</button>
                            </form>
                        </div>
                        <form class="favorite-form" action="/favorite" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="favorite_id" value="{{ $favorite->id }}">
                            <button class="favorite-button">
                                <span class="favorite-mark_image-red"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="favorite-no_message">お気に入りの店舗はありません。</div>
        @endif
    </div>
</div>
@endsection