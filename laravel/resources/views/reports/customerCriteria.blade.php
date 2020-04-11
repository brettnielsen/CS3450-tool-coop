@section('title', 'Reports')

@extends('layouts.app')

@section('cardTitle', 'Reports')

@section('content')
    <form method="get" action="/reports/customers">
        <p>Leaving date fields empty will select all customers.</p>
        <label for="start">Start Date</label>
        <input type="date" id="start" name="start" >

        <label for="end">End Date</label>
        <input type="date" id="end" name="end">

        <button class="btn btn-primary">Run Report</button>

    </form>
@endsection
