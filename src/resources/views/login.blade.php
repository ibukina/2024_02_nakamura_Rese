@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('main_content')
<div class="content-login">
    <div class="login-wrapper">
        <div class="login-form_title">Login</div>
        <form class="login-form" action="/login" method="post">
            @csrf
            <label class="login-form_item">
                <img class="login-form_item-icon" src="{{ asset('img/mail.png') }}" alt="画像">
                <input class="login-form_item-input" type="email" name="email" placeholder="Email">
            </label>
            <label class="login-form_item">
                <img class="login-form_item-icon" src="{{ asset('img/key.png') }}" alt="画像">
                <input class="login-form_item-input" type="password" name="password" placeholder="Password">
            </label>
            <label class="login-form_item">
                <button class="login-form_item-button">ログイン</button>
            </label>
        </form>
    </div>
    @if (count($errors) > 0)
    <div class="error-has">
        入力内容に問題があります
    </div>
    <div class="error-message_wrapper">
        @foreach ($errors->all() as $error)
        <li class="error-message">{{$error}}</li>
        @endforeach
    </div>
    @endif
    @if(session('message'))
    <div class="alert">
        {{ session('message') }}
    </div>
    @endif
</div>
@endsection