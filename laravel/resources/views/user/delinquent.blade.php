@section('title', 'Delinquent Customer')

@extends('layouts.app')

@section('cardTitle', 'Delinquent Alert')

@section('content')

<div style="padding: 15px;">
    <p>This account is delinquent.</p>
    @if($isAdmin)
    <form action="/user/updateDQ/{{$user->id}}" method="get">
        @csrf
        <label for="is_DQ">Did user pay fees?</label>
        <input type="checkbox" id="is_DQ" name="is_DQ" <?php echo $user->is_DQ ? "": "checked" ?>><br>
        <button class="btn btn-primary" type="submit">Submit</button>
    @elseif(!$isAdmin)
    <p>Please contact Tool Co-op via phone or email to pay fees before making a reservation.</p>
    @endif
</div>

@endsection