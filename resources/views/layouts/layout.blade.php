<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">

        <!-- Library JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('assets/js/validation-forms.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
    </head>
    <body style="background: #f3f3f3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <a href="/" class="navbar-brand">Admin panel</a>
        </nav>

        <div class="wrap" style="float: left; display: contents;">
            <div class="row">
                <div>
                    <div class="bg-light" style="min-width: 200px">
                        <div class="list-group">
                            <a href="{{ route('genres.index') }}" class="list-group-item list-group-item-action">Genres</a>
                            <a href="{{ route('movies.index') }}" class="list-group-item list-group-item-action">Movies</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="m-4">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
