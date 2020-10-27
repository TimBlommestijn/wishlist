<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- <navbar-component :user="{{Auth::user() ? Auth::user() : json_encode('no')}}"></navbar-component> -->
        @yield('app')
    </div>
</body>
</html>
<style>
*{
    margin: none;
    padding: none;
}
#app{
    background-color: #FFFFFF;
}
body{
    min-height: 100%;
    /* background-color: #FFFFFF; */
}
 </style>