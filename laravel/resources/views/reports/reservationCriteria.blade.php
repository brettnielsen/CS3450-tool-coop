@section('title', 'Reports')

@extends('layouts.app')

@section('cardTitle', 'Reports')

@section('content')
    <form method="get" action="/reports/reservations">
        <label for="start">Start Date</label>
        <input type="date" id="start" name="start" required>

        <label for="end">End Date</label>
        <input type="date" id="end" name="end" required>

        <button class="btn btn-success" type="submit">Run Report</button>
    </form>
@endsection
