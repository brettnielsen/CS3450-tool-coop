@section('title', 'List Item')

@push('styles')
    <link href="/css/item.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle', 'Item Catalog')

@section('content')
    <p>This is the list of items</p>

@endsection
