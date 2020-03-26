@section('title', 'Choose Date')

@push('styles')
    <link href="/css/reservation.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Choose Reservation Dates')

@section('content')
    <div>
        <form action="/reservation/choose-date/{{$reservationID}}" method="post" onsubmit="return validateForm()">
            @csrf
            <label for="reservation_out_date">Pick Up Date</label>
            <input type="date" id="reservation_out_date" name="reservation_out_date">
            <label for="reservation_in_date">Return Date</label>
            <input type="date" id="reservation_in_date" name="reservation_in_date">
            <button onclick="Reserved()" class="btn btn-success btn-sm" type="submit">Reserve</button>
        </form>
    </div>

    <script>
        function Reserved() {
            alert("Your reservation has been made.");
        }
        function validateForm() {
            const outDate = document.getElementById('reservation_out_date').value;
            const inDate = document.getElementById('reservation_in_date').value;
            const today = getTodaysDate();

            if(outDate < today) {
                alert('Pickup date cannot be in the past');
                return false;
            }
            if(inDate < outDate) {
                alert('Return date must come after pick up date');
                return false;
            }

            return true;
        }

        function getTodaysDate() {
            let today = new Date(),
                month = '' + (today.getMonth() + 1),
                day = '' + today.getDate(),
                year = '' + today.getFullYear();

            if(month.length < 2) {
                month = '0' + month;
            }
            if(day.length < 2) {
                day = '0' + day;
            }

            return [year, month, day].join('-')
        }
    </script>

@endsection
