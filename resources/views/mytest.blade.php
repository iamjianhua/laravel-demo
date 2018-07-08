<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        wewe
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                1 of 3
            </div>
            <div class="col-6">
                2 of 3 (wider)
            </div>
            <div class="col">
                3 of 3
            </div>
        </div>
        <div class="row">
            <div class="col">
                1 of 3
            </div>
            <div class="col-5">
                2 of 3 (wider)
            </div>
            <div class="col">
                3 of 3
            </div>
        </div>
    </div>
    <div class="alert alert-primary" role="alert">
        This is a primary alert—check it out!
    </div>
    <div class="alert alert-secondary" role="alert">
        This is a secondary alert—check it out!
    </div>
    <div class="alert alert-success" role="alert">
        This is a success alert—check it out!
    </div>
    <div class="alert alert-danger" role="alert">
        This is a danger alert—check it out!
    </div>
    <div class="alert alert-warning" role="alert">
        This is a warning alert—check it out!
    </div>
    <div class="alert alert-info" role="alert">
        This is a info alert—check it out!
    </div>
    <div class="alert alert-light" role="alert">
        This is a light alert—check it out!
    </div>
    <div class="alert alert-dark" role="alert">
        This is a dark alert—check it out!
    </div>
</div>
</body>
</html>
