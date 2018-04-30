<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color_skins.css') }}">
        {{--Toastr css--}}
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('css')
</head>
<body class="theme-blush">
    <div id="app">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('images/logo.svg') }}" width="48" height="48" alt="Oreo"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- Top Bar -->
        @include('layouts.partial.topbar')
        <!-- Left Sidebar -->
        @include('layouts.partial.sidebar')
        <!-- Main Content -->
       @yield('content')
    </div>
    <!-- Jquery Core Js --> 
<script src="{{ asset('bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{ asset('bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->
{{--Toastr js--}}
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if ($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}', 'Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>
@stack('script')
</body>
</html>
