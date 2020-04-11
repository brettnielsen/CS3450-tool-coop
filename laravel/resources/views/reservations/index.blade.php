@section('title', 'List Reservation')

@push('styles')
    <link href="/css/reservation.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle')
    <b style="font-size: 125%">Reservations</b>
    <div class="d-inline-flex float-right">
        <form method="get">
            <span class="float-right">
                <button>Filter-PickUp</button>
            </span>

                <span class="float-right">
                <label for="date">Date: </label>
                <input  name="date" id="date" type="date">
            </span>
        </form>
        <form method="get">
            <span class="float-right">
                <button>Clear Filter</button>
            </span>
        </form>
    </div>


    <script>
        $(document).ready( function() {
            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            }
            document.getElementById('date').value = formatDate(new Date());
        });
    </script>

@endsection

@section('content')
    <div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        @if($isAdmin)
                            <th>Name</th>
                        @endif
                        <th>Pick Up Date</th>
                        <th>Return Date</th>
                        <th>Items</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            @if($isAdmin)
                                <td>
                                    <b>{{$reservation->user->name}}</b>

                                    @if($reservation->check_out_date)
                                        <div style="font-size: small">
                                            <p style="padding-bottom: 0; margin-bottom: 0; margin-top: 10px; white-space: nowrap">Checked out on:</p>
                                            <p style="padding-top: 0; margin-top: 0;">{{$reservation->check_out_date}}</p>
                                        </div>
                                    @endif

                                    @if($reservation->check_in_date)
                                        <div style="font-size: small">
                                            <p style="padding-bottom: 0; margin-bottom: 0; margin-top: 10px; white-space: nowrap">Checked in on:</p>
                                            <p style="padding-top: 0; margin-top: 0;">{{$reservation->check_in_date}}</p>
                                        </div>
                                    @endif
                                </td>
                            @endif
                            <td>
                                {{$reservation->reservation_out_date}}
                            <td>
                                <div style="{{$today > $reservation->reservation_in_date ? 'color: red' : ''}}">
                                    {{$reservation->reservation_in_date}}

                                    @if($reservation->check_out_date && $today > $reservation->reservation_in_date)
                                        <br>
                                        <b>PAST DUE</b>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @foreach($reservation->reservationItems as $reservationItem)
                                    <div style="display: grid; grid-template-columns: 25px 1fr; gap: 5px;">
                                        <div><img src="{{asset('storage/' . $reservationItem->item[0]->imagePath)}}" width="25" height="25"></div>
                                        <div>{{$reservationItem->item[0]->description}}</div>
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                @if(!$reservation->check_out_date)
                                    <a class="btn btn-danger btn-sm" href="/reservation/destroy/{{$reservation->id}}">Delete</a>
                                @endif

                                @if($isAdmin && !$reservation->check_out_date)
                                    <a class="btn btn-primary btn-sm" style="color: white" href="/reservation/mark-checked-out/{{$reservation->id}}">Check Out</a>
                                @endif

                                @if($isAdmin && $reservation->check_out_date && !$reservation->check_in_date)
                                        <a class="btn btn-primary btn-sm" style="color: white" href="/reservation/mark-checked-in/{{$reservation->id}}">Check In</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
