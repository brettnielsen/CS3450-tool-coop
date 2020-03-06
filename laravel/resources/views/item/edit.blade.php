@section('title', 'Edit Item')

@push('styles')
    <link href="/css/item.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Edit Item')

@section('content')
    <div style="padding: 10px;">
        <form action="/item/update/{{$item->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="description">Title: </label>
            <input type="text" id="description" name="description" required value="{{$item->description}}">
            <br>
            <label for="quantity">Quantity: </label>
            <input type="text" id="quantity" name="quantity" required value="{{$item->quantity}}">
            <br>
            <label for="location">Location Information: </label>
            <input type="text" id="location" name="location" value="{{$item->location}}">
            <br>
            <label for="image">New Image (to keep current, do not upload an image): </label>
            <input type="file" id="image" name="image">
            <br>
            <div style="padding-top: 15px;">
                <a class="btn btn-light" href="/item/index">Cancel</a>
                <button class="btn btn-danger" type="button" onclick="deleteItem({{$item->id}})">Delete Item</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

    <script>
        function deleteItem(itemID) {
            if(confirm('Are you sure you want to delete this item?')) {
                window.location.href = '/item/destroy/' + itemID;
            }
        }
    </script>

@endsection
