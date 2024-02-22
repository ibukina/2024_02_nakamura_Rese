@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('main_content')
<div class="content-admin">
    <div class="register-wrapper">
        <div class="register-form_title">店舗代表者の追加</div>
        <form class="register-form" action="/register" method="post">
            @csrf
            <input type="hidden" name="role_id" value="2">
            <label class="register-form_item">
                <img class="register-form_item-icon" src="{{ asset('img/person.png') }}" alt="画像">
                <input type="text" name="username" class="register-form_item-input" placeholder="Username">
            </label>
            <label class="register-form_item">
                <img class="register-form_item-icon" src="{{ asset('img/mail.png') }}" alt="画像">
                <input type="email" name="email" class="register-form_item-input" placeholder="Email">
            </label>
            <label class="register-form_item">
                <img class="register-form_item-icon" src="{{ asset('img/key.png') }}" alt="画像">
                <input type="password" name="password" class="register-form_item-input" placeholder="Password">
            </label>
            <label class="register-form_item">
                <button class="register-form_item-button">登録</button>
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