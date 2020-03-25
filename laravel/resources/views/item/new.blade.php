@section('title', 'New Item')

@push('styles')
    <link href="/css/item.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'New Item')

@section('content')
    <div style="padding: 10px;">
        <form action="/item/store" method="post" enctype="multipart/form-data">
            @csrf
            <label for="description">Title: </label>
            <input type="text" id="description" name="description" required class="form-control">
            <br>
            <label for="quantity">Quantity: </label>
            <input type="text" id="quantity" name="quantity" required class="form-control">
            <br>
            <label for="location">Location Information: </label>
            <input type="text" id="location" name="location" value="" class="form-control">
            <br>
            <label for="image">Image: </label>
            <input type="file" id="image" name="image" class="form-control">
            <br>
            <div style="padding-top: 15px;">
                <a class="btn btn-light" href="/item/index">Cancel</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
