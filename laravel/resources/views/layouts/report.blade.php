@section('title', 'Reports')

@extends('layouts.basic')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="text-right noprint" style="margin-bottom: 15px;">
                        <button class="btn btn-primary" onclick="print()">Print</button>
                    </div>
                    <div class="card">
                        <div class="card-header">@yield('cardTitle')</div>

                        @yield('report')

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
