@extends('layouts.menu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
<div class="header-list_logged-in_wrapper">
    <nav class="header-list_logged-in">
        <ul class="header-list_logged-in_item-wrapper">
            <li class="header-list_logged-in_item">
                <a class="header-list_logged-in_item-link" href="/">Home</a>
            </li>
            <li class="header-list_logged-in_item">
                <form class="header-list_logout-form" action="/logout" method="post">
                    @csrf
                    <button class="header-list_logged-in_item-button">
                        Logout
                    </button>
                </form>
            </li>
            <li class="header-list_logged-in_item">
                <a class="header-list_logged-in_item-link" href="/mypage">Mypage</a>
            </li>
        </ul>
    </nav>
</div>
@endsection