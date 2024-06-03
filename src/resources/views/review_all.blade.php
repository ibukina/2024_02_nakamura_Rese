@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review_all.css') }}">
@endsection

@section('main_content')
<div class="content-all_review">
    <div class="shop-detail_wrapper">
        <div class="detail-title">
            <div class="back-form">
                <button class="back-form_button" type="button" onClick="history.back()"><</button>
            </div>
            <div class="shop-name">{{ $shop->name }}</div>
        </div>
        <img class="shop-image" src="{{ asset( $shop->image->image ) }}" alt="画像">
        <div class="shop-tag_wrapper">
            <div class="shop-tag_area">#{{ $shop->area->area }}</div>
            <div class="shop-tag_genre">#{{ $shop->genre->genre }}</div>
        </div>
        <div class="shop-summary">{{ $shop->summary }}</div>
    </div>
    <div class="review-wrapper">
        <h2 class="review-title">{{ $shop->name }}の口コミ一覧</h2>
        <div class="review-wrap_wrapper">
            @if($reviews)
            @foreach($reviews as $review)
            <div class="review-detail_wrapper">
                <div class="review-edit_form-wrapper">
                    @can('admin-only')
                    <a class="review-delete_link" href="/review/delete/{{ $review->id }}">口コミを削除</a>
                    @endcan
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
            </div>
            @endforeach
        @endif
        </div>
    </div>
</div>
@endsection