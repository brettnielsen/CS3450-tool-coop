@section('title', 'Reports')

@extends('layouts.report')

@section('cardTitle')
    <div>Customer Report from {{$start}} to {{$end}}</div>
@endsection

@section('report')

    <table class="table table-striped">
        <thead>
        <th>Name</th>
        <th>Email</th>
        <th>state</th>
        <th>city</th>
        <th>address</th>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>
                    {{$customer->name}}
                </td>
                <td>
                    {{$customer->email}}
                </td>
                <td>
                    {{$customer->state}}
                </td>
                <td>
                    {{$customer->city}}
                </td>
                <td>
                    {{$customer->address}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
