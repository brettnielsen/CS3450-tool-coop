@section('title', 'Choose Date')

@push('styles')
    <link href="/css/reservation.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Choose Reservation Dates')

@section('content')
    <div>
        <form action="/reservation/choose-date/{{$reservationID}}" method="post">
            @csrf
            <label for="reservation_out_date">Pick Up Date</label>
            <input type="date" id="reservation_out_date" name="reservation_out_date">
            <label for="reservation_in_date">Return Date</label>
            <input type="date" id="reservation_in_date" name="reservation_in_date">
            <button class="btn btn-success btn-sm" type="submit">Reserve</button>
        </form>
    </div>

@endsection
