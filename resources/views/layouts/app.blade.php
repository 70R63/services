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

    <!-- Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

<!-- SPRUHA -->
        <!-- spruha -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <!-- Favicon -->
        <link rel="icon" href="{{ url('spruha/img/brand/favicon.ico') }}" type="image/x-icon"/>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title>{{ config('app.name', 'Laravel') }} - Plataforma de envios</title>

        <!-- Bootstrap css-->
        <link href="{{ url('spruha/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/ type="text/css">

        <!-- Icons css-->
        <link href="{{ url('spruha/plugins/web-fonts/icons.css') }}"  rel="stylesheet"/>
        <link href="{{ url('spruha/plugins/web-fonts/font-awesome/font-awesome.min.css') }}"  rel="stylesheet">
        <link href="{{ url('spruha/plugins/web-fonts/plugin.css') }}"  rel="stylesheet"/>

        <!-- Style css-->
        <link href="{{ url('spruha/css/style.css') }}"  rel="stylesheet">
        <link href="{{ url('spruha/css/skins.css') }}"  rel="stylesheet">
        <link href="{{ url('spruha/css/dark-style.css') }}"  rel="stylesheet">
        <link href="{{ url('spruha/css/colors/default.css') }}"  rel="stylesheet">

        <!-- Color css-->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ url('spruha/css/colors/color.css') }}">

        <!-- Select2 css-->
        <link href="{{ url('spruha/plugins/select2/css/select2.min.css') }}"  rel="stylesheet">

        <!-- Mutipleselect css-->
        <link rel="stylesheet" href="{{ url('spruha/plugins/multipleselect/multiple-select.css') }}">

        <!-- Sidemenu css-->
        <link href="{{ url('spruha/css/sidemenu/sidemenu.css') }}"  rel="stylesheet">
<!-- ---------- -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/login') }}">
                <!--   {{ config('app.name', 'Laravel') }}-->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                  </div>
            </div>
        </nav>
        <!--<div class="container mt-5" >
            <div class="row justify-content-center">
                <img src="{{ url('spruha/img/brand/ulalaPurpureLogo-134x49.png') }}" class="header-brand-img desktop-logo" alt="logo"> {{ config('app.env', 'Ambiente') }}
            </div>
        </div> -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
