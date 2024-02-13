@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/management.css') }}">
@endsection

@section('main_content')
<div class="content-management">
    <form class="store-form" action="/management" method="post">
        @csrf
        <div class="store-title">エリア等追加フォーム</div>
        <div class="form-item_wrapper">
            <input class="form-item" type="text" name="area" placeholder="Area">
            <input class="form-item" type="text" name="genre" placeholder="Genre">
            <input class="form-item" type="file" name="image" placeholder="Image">
        </div>
        <button class="store-button">追加</button>
    </form>
    <div class="list-wrapper">
        <div class="list-table_wrapper">
            <div class="list-title">種類一覧</div>
            <table class="list-table">
                <tr class="table-row">
                    <th class="table-header">Area</th>
                </tr>
                @if($areas)
                @foreach($areas as $area)
                <tr class="table-row">
                    <td class="table-data">{{ $area->area }}</td>
                </tr>
                @endforeach
                @endif
            </table>
            <table class="list-table">
                <tr class="table-row">
                    <th class="table-header">Genre</th>
                </tr>
                @if($genres)
                @foreach($genres as $genre)
                <tr class="table-row">
                    <td class="table-data">{{ $genre->genre }}</td>
                </tr>
                @endforeach
                @endif
            </table>
            <table class="list-table">
                <tr class="table-row">
                    <th class="table-header">Image</th>
                </tr>
                @if($images)
                @foreach($images as $image)
                <tr class="table-row">
                    <td class="table-data">{{ $image->image }}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>
    <div class="shop-review_wrapper">
        <div class="review-title">Review</div>
        @if($reviews)
        @foreach($reviews as $review)
        <div class="review-wrapper">
            <div class="shop-name">{{ $review->shop->name }}</div>
            <div class="score-average">{{ $review->score }}</div>
            <div class="review-opinion">{{ $review->comment }}</div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection