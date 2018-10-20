<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>HackTeam</title>
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

<body class="theme-indigo">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
               data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{url('/')}}">HackTeam</a>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('assets/dashboard/images/user.png') }}" width="48" height="48" alt="User"/>
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">{{ auth()->user()->name . ' ' . auth()->user()->surname }}</div>
                <div class="email">{{auth()->user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{route('profile.edit')}}"><i class="material-icons">person</i>Profile</a></li>
                        <li role="seperator" class="divider"></li>
                        <li>
                            <a href="javascript:void(0);" id="logout" data-form-id="logout-form">
                                <i class="material-icons">input</i>
                                Sign Out
                            </a>
                            {!! Form::open(['url' => route('auth.logout'), 'id' => 'logout-form', 'method' => 'post']) !!}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <?php
                if (!isset($menuActive)) $menuActive = 'home'
                ?>

                <li class="{{$menuActive === 'home' ? 'active' : ''}}">
                    <a href="{{route('home')}}">
                        <i class="material-icons">home</i>
                        <span>Welcome</span>
                    </a>
                </li>
                <li class="{{$menuActive === 'profile' ? 'active' : ''}}">
                    <a href="{{route('profile.edit')}}">
                        <i class="material-icons">account_box</i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="{{$menuActive === 'admins' ? 'active' : ''}}">
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">group</i>
                        <span>Admins</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a href="{{route('admins')}}" class="toggled waves-effect waves-block">All admins</a></li>
                        <li><a href="{{route('admins.create')}}" class="toggled waves-effect waves-block">Create
                                new</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">

    @yield('content')

</section>

<!-- App Js -->
<script src="{{ asset('assets/dashboard/js/app.js') }}"></script>

<script>
    var ntfSuccess = '{{session()->has('ntf-success') ? session()->get('ntf-success') : ''}}';
    var ntfDanger = '{{session()->has('ntf-danger') ? session()->get('ntf-danger') : ''}}';
    var ntfInfo = '{{session()->has('ntf-info') ? session()->get('ntf-info') : ''}}';
    var ntfWarning = '{{session()->has('ntf-warning') ? session()->get('ntf-warning') : ''}}';
</script>

@yield('footer-js')

</body>

</html>