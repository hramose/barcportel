<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Oreo Bootstrap4 Admin ::</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/authentication.css">
    <link rel="stylesheet" href="/css/color_skins.css">
    {{--Toastr css--}}
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body class="theme-blush authentication sidebar-collapse">
<!-- Navbar -->
@include('layouts.auth.partial.header')
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(/images/login.jpg)"></div>
    @yield('content')
    @include('layouts.auth.partial.footer')
</div>

<!-- Jquery Core Js -->
<script src="/bundles/libscripts.bundle.js"></script>
<script src="/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

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
<script>
    $(".navbar-toggler").on('click',function() {
        $("html").toggleClass("nav-open");
    });
    //=============================================================================
    $('.form-control').on("focus", function() {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });
</script>
</body>
</html>