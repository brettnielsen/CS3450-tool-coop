@section('title', 'Choose User')

@push('styles')
    <link href="/css/user.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Choose User')

@section('content')
    <div style="text-align: center; padding: 15px; display: grid; grid-template-columns: 5fr 1fr">
        <form method="get" action="/reservation/choose-date/{{$reservationID}}">
            <label>Search:</label>
            <input type="text" name="search" value="{{$search}}">
            <button type="submit" class="btn btn-primary btn-sm">Search</button>
        </form>

        <a class="btn btn-success" style="color: white">New User</a>
    </div>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a class="btn btn-sm btn-secondary" href="/reservation/choose-user/{{$reservationID}}/{{$user->id}}">Select</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

@endsection
