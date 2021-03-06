@section('title', 'New Customer')

@push('styles')
    <link href="/css/app.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Edit User')

@section('content')

    <div style="padding: 15px;">
        <form action="/user/update/{{$user->id}}" method="get">
            @csrf
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" class="form-control" required value="{{$user->name}}">
            <br>
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" required value="{{$user->email}}">
            <br>
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" required value="{{$user->address}}">
            <br>
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" class="form-control" required value="{{$user->phone}}">
            <br>
            <div class="row">
                <div class="col">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" class="form-control" required value="{{$user->city}}">
                </div>
                <div class="col">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" class="form-control" required value="{{$user->state}}">
                </div>
                <div class="col">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" class="form-control" required value="{{$user->zip}}">
                </div>
            </div><br>
            @if($isAdmin)
                <label for="isAdmin">Admin</label>
                <input type="checkbox" id="isAdmin" name="isAdmin" <?php echo $user->is_admin ? "checked": "" ?>>
                <br><br>
                <label for="is_DQ">Is the Account Deliquent?</label>
                <input type="checkbox" id="is_DQ" name="is_DQ" <?php echo $user->is_DQ ? "checked": "" ?>>
                <br><br>
            @endif
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>

@endsection
