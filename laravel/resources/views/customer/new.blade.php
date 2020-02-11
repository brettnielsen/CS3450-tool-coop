@section('title', 'New Customer')

@push('styles')
    <link href="/css/customer.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('content')

    <style>
        .container {
            text-align: center;
        }

        .formDiv {
            display: inline-block;
            text-align: left;
        }

        .form label {
            font-weight: 700;
        }

    </style>
    <h1>New Customer</h1>

    <div class="container">
        <div class="formDiv">
            <form method="post" action="store" id="formToSubmit" class="form">
                @csrf
                <label for="first_name">First Name: </label>
                <input type="text" id="first_name" name="first_name">

                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name">
                <br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address">
                <br>
                <label for="city">City:</label>
                <input type="text" id="city" name="city">

                <label for="state">State:</label>
                <input type="text" id="state" name="state">

                <label for="zip">Zip:</label>
                <input type="number" id="zip" name="zip">
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <br>
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone">
                <br>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

@endsection
