@section('title', 'All Customers')

@push('styles')
    <link href="/css/customer.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer->first_name}}</td>
                <td>{{$customer->last_name}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->city}}</td>
                <td>{{$customer->state}}</td>
                <td>{{$customer->zip}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->phone}}</td>
            </tr>
        @endforeach
    </table>
@endsection
