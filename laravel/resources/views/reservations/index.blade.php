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
                                        <p style="padding-bottom: 0; margin-bottom: 0; margin-top: 10px; white-space: nowrap">Checked out on:</p>
                                        <p style="padding-top: 0; margin-top: 0;">{{$reservation->check_out_date}}</p>
                                    @endif
                                </td>
                            @endif
                            <td>
                                {{$reservation->reservation_out_date}}
                            <td>
                                {{$reservation->reservation_in_date}}
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

                                @if($isAdmin)
                                    <a class="btn btn-primary btn-sm" style="color: white">Check Out</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
