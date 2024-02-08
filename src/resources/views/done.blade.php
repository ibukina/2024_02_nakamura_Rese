@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('main_content')
<div class="content-done">
    <div class="done-wrapper">
        <div class="done-message">ご予約ありがとうございます</div>
        <div class="done-button">
            <a class="done-button_link" href="/">戻る</a>
        </div>
    </div>
</div>
@endsection