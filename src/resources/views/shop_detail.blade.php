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
        @can('user-only')
        @if($reviews->isNotEmpty())
        <div class="shop-review_edit-wrapper">
            @foreach($reviews as $review)
            <form class="review-edit_form" action="/review/update/{{ $review->id }}" method="post">
                @csrf
                <input type="hidden" name="review_id" value="$review->id">
                <div class="review-form_wrapper">
                    <div class="review-title">Review</div>
                    <h4 class="form-item_title">体験を評価してください</h4>
                    <label class="form-item">
                        <span class="form-item_star">☆</span>
                        <span class="form-item_star">☆</span>
                        <span class="form-item_star">☆</span>
                        <span class="form-item_star">☆</span>
                        <span class="form-item_star">☆</span>
                        <input type="hidden" id="score-value" name="score" value="{{ $review->score }}">
                    </label>
                    <h4 class="form-item_title">口コミを投稿</h4>
                    <label class="form-item">
                        <textarea class="form-item_text" name="comment" placeholder="カジュアルな夜のお出かけにおすすめのスポット">{{ $review->comment }}</textarea>
                    </label>
                    <p class="form-item_text-limit"><span class="limit-number"></span> (最大文字数)</p>
                    <h4 class="form-item_title">画像の追加</h4>
                    <label class="form-item_file">
                        <input class="form-item_input" type="file" name="img_url" placeholder="クリックして写真を追加">
                        <p class="form-item_input-summary">またはドラッグアンドドロップ</p>
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
            @endforeach
        </div>
        @else
        <a class="review-link" href="/review/{{ $detail->id }}">口コミを投稿する</a>
        @endif
        @endcan
    </div>
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