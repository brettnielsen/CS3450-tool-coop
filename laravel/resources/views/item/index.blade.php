@section('title', 'List Item')

@push('styles')
    <link href="/css/item.css" rel="stylesheet">
@endpush

@extends('layouts.app')

@section('cardTitle')
    <div>
        <span>Item Catalog</span>
        @if($isAdmin)
            <a class="btn btn-success" href="/item/new" style="float: right;">New Item</a>
        @endif
    </div>
@endsection

@section('content')


<table class="table table-striped">
    <tbody>
    @foreach($items as $item)
        <tr>
            <td style="width: 100px"><img src="{{asset('storage/' . $item->imagePath)}}" width="75" height="75"></td>
            <td style="float: left; width: 100%; height: 100%;">
                <span>{{$item->description}}</span>
                <br>
                <div style="padding-left: 10px;">
                    <i>{{$item->available_quantity}} on hand</i>
                </div>
            </td>
            <td>
                <div style="float: right; text-align: right;">
                    <button type="button" class="btn btn-primary">Add To Reservation</button>
                    <br>
                    @if($isAdmin)
                        <a class="btn btn-secondary btn-sm" style="color: white; margin-top: 5px;" href="/item/edit/{{$item->id}}">Edit</a>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection

