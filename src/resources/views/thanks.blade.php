@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('main_content')
<div class="content-thanks">
    <div class="thanks-wrapper">
        <div class="thanks-message">会員登録ありがとうございます</div>
        <div class="thanks-button">
        <a class="thanks-button_link" href="/login">ログインする</a>
        </div>
    </div>
</div>
@endsection