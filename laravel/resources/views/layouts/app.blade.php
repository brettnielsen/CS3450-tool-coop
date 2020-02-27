<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
    @include('layouts.navbar')

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-6">
                        <div class="card">
                            <div class="card-header">@yield('cardTitle')</div>

                            @yield('content')

                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="col-sm col-md">
                            @yield('rightContent')
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('layouts.footer')
    </div>
</body>
</html>
