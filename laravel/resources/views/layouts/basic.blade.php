<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')

    <style>
        @media print {
            .noprint {
                visibility: hidden;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="noprint">
            @include('layouts.navbar')
        </div>

        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
</body>
</html>
