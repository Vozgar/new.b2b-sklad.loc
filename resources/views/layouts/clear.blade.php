<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script> 
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/ekko-lightbox.js') }}"></script> 
    <script src="{{ asset('js/script.js') }}"></script> 

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ekko-lightbox.css') }}" rel="stylesheet">
</head>
<body>
    <main class="">
        @yield('content')
    </main>
</body>
</html>
