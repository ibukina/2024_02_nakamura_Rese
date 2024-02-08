@extends('layouts.menu')

@section('css')
<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
<div class="header-list_logged-out_wrapper">
    <nav class="header-list_logged-out">
        <ul class="header-list_logged-out_item-wrapper">
            <li class="header-list_logged-out_item">
                <a class="header-list_logged-out_item-link" href="/">Home</a>
            </li>
            <li class="header-list_logged-out_item">
                <a class="header-list_logged-out_item-link" href="/register">Registration</a>
            </li>
            <li class="header-list_logged-out_item">
                <a class="header-list_logged-out_item-link" href="/login">Login</a>
            </li>
        </ul>
    </nav>
</div>
@endsection