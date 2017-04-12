<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
 
    <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" id="auth-css" href="{!! asset('assets/css/auth.css') !!}" type="text/css" media="all">
    <script src="{{ asset('assets/js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <link href="{!! asset('assets/css/plugins/sweetalert.css') !!}" rel="stylesheet">
    @yield('pluginsCss')
 
</head>
<body>
 
    @yield('content')
 
 <script src="{!! asset('assets/js/plugins/sweetalert/sweetalert.min.js') !!}"></script>
 @yield('sweetAlert')
 @include('notifications.sweetalert')
</body>
</html