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
                    <a href="/reports/criteria/reservations/customers">Reservations by Customer</a>
                </td>
                <td>
                    Get reservations within a time frame by a specific customer
                </td>
            </tr>
            <tr>
                <td>
                    <a href="/reports/criteria/reservations/items">Reservations by Tool</a>
                </td>
                <td>
                    Get reservations made within a time frame for a specific tool
                </td>
            </tr>
        </tbody>
    </table>
@endsection
