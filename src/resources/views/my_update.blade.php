@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/my_update.css') }}">
@endsection

@section('main_content')
<div class="content-update">
    <form class="update-form" action="/reservation" method="post">
        @method('PATCH')
        @csrf
        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        <div class="update-form_wrapper">
            <div class="update-title">更新</div>
            <label class="select-date_wrapper">
                <input class="form-item_select form-item_select-date" name="date" type="date" value="{{ $reservation->date }}">
            </label>
            <label class="select-wrapper">
                <input class="form-item_select" name="time" type="time" value="{{ date('H:i', strtotime($reservation->time)) }}">
            </label>
            <label class="select-wrapper">
                <input class="form-item_select form-item_select-number" name="number" type="text" value="{{ $reservation->number }}人">
            </label>
            <div class="result-wrapper">
                <table class="result-table">
                    <tr class="table-row">
                        <th class="table-header">Date</th>
                        <td class="table-data table-data_date">{{ $reservation->date }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Time</th>
                        <td class="table-data table-data_time">{{ date('H:i', strtotime($reservation->time)) }}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-header">Number</th>
                        <td class="table-data table-data_number">{{ $reservation->number }}人</td>
                    </tr>
                </table>
            </div>
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
        <button class="update-button">更新する</button>
    </form>
</div>
<script src="{{ asset('js/form.js') }}" defer></script>
@endsection