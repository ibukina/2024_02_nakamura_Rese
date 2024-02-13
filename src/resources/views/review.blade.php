@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}">
@endsection

@section('main_content')
<div class="content-review">
    <form class="review-form" action="/review" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ $review->user_id }}">
        <input type="hidden" name="shop_id" value="{{ $review->shop_id }}">
        <input type="hidden" name="reservation_id" value="{{ $review->id }}">
        <div class="review-form_wrapper">
            <div class="review-title">Review</div>
            <label class="form-item">
                <select class="form-item_select" name="score" id="score">
                    <option value="">5段階で評価してください</option>
                    <option value="5">星5</option>
                    <option value="4">星4</option>
                    <option value="3">星3</option>
                    <option value="2">星2</option>
                    <option value="1">星1</option>
                </select>
            </label>
            <label class="form-item">
                <textarea class="form-item_text" name="comment"></textarea>
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