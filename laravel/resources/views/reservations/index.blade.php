@section('title', 'List Reservation')

@push('styles')
    <link href="/css/reservation.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Reservations')

@section('content')
    <div>
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pick Up Date</th>
                        <th>Return Date</th>
                        <th>Items</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{$reservation->reservation_out_date}}</td>
                            <td>{{$reservation->reservation_in_date}}</td>
                            <td>
                                @foreach($reservation->reservationItems as $reservationItem)
                                    <div style="display: grid; grid-template-columns: 25px 1fr; gap: 5px;">
                                        <div><img src="{{asset('storage/' . $reservationItem->item[0]->imagePath)}}" width="25" height="25"></div>
                                        <div>{{$reservationItem->item[0]->description}}</div>
                                    </div>
                                @endforeach
                            </td>

                            @if(!$reservation->check_out_date)
                                <td>
                                    <a class="btn btn-danger btn-sm" href="/reservation/destroy/{{$reservation->id}}">Delete</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
