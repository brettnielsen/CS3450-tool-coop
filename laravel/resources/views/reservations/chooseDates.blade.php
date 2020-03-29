@section('title', 'Choose Date')

@push('styles')
    <link href="/css/reservation.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Choose Reservation Dates')

@section('content')
    <style>
        .container {
            margin: 15px;
        }
    </style>
    <div class="container">
        <form action="/reservation/choose-date/{{$reservationID}}" method="post" onsubmit="return validateForm()" id="dateForm">
            @csrf
            <label for="reservation_out_date">Pick Up Date</label>
            <input type="date" id="reservation_out_date" name="reservation_out_date">
            <label for="reservation_in_date">Return Date</label>
            <input type="date" id="reservation_in_date" name="reservation_in_date">
            <button class="btn btn-primary btn-sm" type="button" id="checkAvail">Check Availability</button>
            <button onclick="alert('Your reservation has been made.');" class="btn btn-success btn-sm" type="submit" id="submitReservation" style="display: none">Reserve</button>
        </form>

        <div>
            <p id="note">Please check availability before confirming reservation.</p>
        </div>
    </div>

    <script>
        $(document).ready( function() {
            $('#reservation_out_date').val(getTodaysDate());
            $('#reservation_in_date').val(getTodaysDate());

            $('#checkAvail').on('click', function() {
                checkAvailability();
            })
        });

        function checkAvailability() {
            if(validateForm()) {
                document.getElementById('checkAvail').innerText = 'Loading...';
                $.ajax({
                    type: "GET",
                    url: '/reservation/check-availability/{{$reservationID}}',
                    data: {'out': document.getElementById('reservation_out_date').value, 'in': document.getElementById('reservation_in_date').value},
                    success: function(response) {
                        processResponse(response);
                    },
                });
            }
        }

        function processResponse(response) {
            if(response.error) {
                console.log(response);
                reservationConflict(response);
            }
            else {
                reservationGoodToGo();
            }
        }

        function reservationGoodToGo() {
            document.getElementById('note').innerText = 'Items are available! Click \'Reserve\' to complete the reservation';
            document.getElementById('note').style.color = 'green';
            document.getElementById('checkAvail').style.display = 'none';
            document.getElementById('submitReservation').style.display = 'inline'
        }

        function reservationConflict(response) {
            document.getElementById('checkAvail').innerText = 'Check Availability';
            document.getElementById('note').innerText = 'There is a conflicting reservation with one or more items';
            document.getElementById('note').style.color = 'red';
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
