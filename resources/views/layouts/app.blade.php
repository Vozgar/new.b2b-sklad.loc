<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="pink-theme">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="rotting">

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon"/>

    <!-- CSRF Token -->

    <title>{{ config('app.name', 'Geyser Portal') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    @yield('scripts')
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
	<script src="{{ asset('js/mmenu-light.js') }}"></script>	
	<script src="{{ asset('js/mmenu.js') }}"></script>

    <script src="{{ asset('js/nprogress.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet">    
	<link href="{{ asset('css/mmenu-light.css') }}" rel="stylesheet">    
	<link href="{{ asset('css/mmenu.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap-treeview.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">


</head>
    <body>
        @yield('content')
        <script src="{{ asset('js/select2.js') }}"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </body>
</html>
