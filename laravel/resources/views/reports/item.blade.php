@section('title', 'Reports')

@extends('layouts.report')

@section('cardTitle', 'Reports')

@section('report')

    <table class="table table-striped">
        <thead>
            <th>Quantity</th>
            <th>Description</th>
            <th>Location</th>
            <th>Created At</th>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>
                        {{$item->quantity}}
                    </td>
                    <td>
                        {{$item->description}}
                    </td>
                    <td>
                        {{$item->location}}
                    </td>
                    <td>
                        {{$item->created_at}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
