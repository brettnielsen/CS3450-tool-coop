@section('title', 'Choose User')

@push('styles')
    <link href="/css/user.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Choose User')

@section('content')
    <form method="get" action="/reservation/choose-date/{{$reservationID}}">
        <label>Search:</label>
        <input type="text" name="search" value="{{$search}}">
        <button type="submit" class="btn btn-primary btn-sm">Search</button>
    </form>

    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a class="btn btn-sm btn-light" href="/reservation/choose-user/{{$reservationID}}/{{$user->id}}">Select</a></td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection
