<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | HackTeam</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!--Application Styles -->
    <link href="{{ asset('assets/dashboard/css/app.css') }}" rel="stylesheet">

    <!--Application Styles -->
    <link href="{{ asset('assets/dashboard/css/custom.css') }}" rel="stylesheet">

    @yield('header-css')

</head>

<body class="{{$pageClass}}">

@yield('content')

<!-- App Js -->
<script src="{{ asset('assets/dashboard/js/unauthorized.js') }}"></script>

@yield('footer-js')

</body>

</html>