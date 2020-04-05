@section('title', 'Reports')

@extends('layouts.report')

@section('cardTitle')
    <div>
        Reservations from {{$start}} to {{$end}}
    </div>
@endsection

@section('report')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Scheduled Out</th>
                <th>Picked Up</th>
                <th>Scheduled In</th>
                <th>Returned</th>
                <th>Items</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->user->name}}</td>
                <td>{{$reservation->reservation_out_date}}</td>
                <td>{{$reservation->check_out_date}}</td>
                <td>{{$reservation->reservation_in_date}}</td>
                <td>{{$reservation->check_in_date}}</td>
                <td>
                    @foreach($reservation->items as $item)
                    <p>
                        {{$item->description}}
                    </p>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
