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
            <img class="shop-image" src="{{ asset( $detail->image ) }}" alt="画像">
        <div class="shop-tag_wrapper">
            <div class="shop-tag_area">#{{ $detail->area }}</div>
            <div class="shop-tag_genre">#{{ $detail->genre }}</div>
        </div>
        <div class="shop-summary">{{ $detail->summary }}</div>
    </div>
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
</div>
<script src="{{ asset('js/form.js') }}" defer></script>
@endsection