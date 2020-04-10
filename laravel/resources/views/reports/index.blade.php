@section('title', 'Reports')

@extends('layouts.app')

@section('cardTitle', 'Reports')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    Report Name
                </th>
                <th>
                    Report Description
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="/reports/criteria/reservations">Reservations</a>
                </td>
                <td>
                    Get reservations within a time frame
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/reports/criteria/customers">Customers</a>
                </td>
                <td>
                    Get customer information within a time frame
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/reports/criteria/items">Items</a>
                </td>
                <td>
                    Get item information within a time frame
                </td>
            </tr>
        </tbody>
    </table>
@endsection
