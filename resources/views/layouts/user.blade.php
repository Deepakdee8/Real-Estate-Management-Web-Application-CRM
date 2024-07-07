<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 11:48:17 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamstechnologies - Bootstrap Admin Template">
    <title>Samatha Group Estates and Projects</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/theme/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/theme/css/material.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/plugins/morris/morris.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/style.css')}}">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">
            <div class="header-left">
                <a href="#" class="logo">
                    <img src="{{ asset('assets/theme/images/MDBSlogo.jpg') }}" alt="Logo" width="100" height="40px">
                </a>
            </div>

            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>

            <div class="page-title-box">
                <h3>MDBS Tech</h3>
                <h3>User Dashboard</h3>
            </div>
            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa-solid fa-bars"></i></a>

            <ul class="nav user-menu">
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Notifications</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                <li class="notification-message">
                                    <a href="#">
                                        <div class="chat-block d-flex">
                                            <span class="avatar flex-shrink-0">
                                                <img src="assets/img/profiles/avatar-02.jpg" alt="User Image">
                                            </span>
                                            <div class="media-body flex-grow-1">
                                                <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                                <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>

                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>

            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a> -->
                    <a class="dropdown-item" href="{{ route ('logout') }}">Logout</a>
                </div>
            </div>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul class="sidebar-vertical ">

                        <li class="submenu my-3">
                            <a href="{{ route ('home')}}"><i class="la la-dashcube"></i> <span> Dashboard</span> </a>
                        </li>
                        <li class="submenu my-3">
                            <a href="{{ route ('user.project.index')}}"><i class="la la-rocket"></i> <span> Projects</span> </a>
                        </li>

                        <li class="submenu my-3">
                            <a href="{{ route ('user.issue.index')}}"><i class="la la-exclamation-triangle"></i> <span>Issues</span></a>
                        </li>
                        <li class="submenu my-3">
                            <a href="#"><i class="la la-history"></i> <span>Work Hour</span></a>
                        </li>
                        <li class="submenu my-3">
                            <a href="#"><i class="la la-table"></i> <span>Calender</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">

            <div class="content container-fluid pb-0">

                @yield('content')
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>

    <script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script src="{{asset('assets/theme/js/jquery-3.7.1.min.js')}}"></script>

    <script src="{{asset('assets/theme/js/bootstrap.bundle.min.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>

    <script src="{{asset('assets/theme/js/jquery.slimscroll.min.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>

    <script src="{{asset('assets/theme/plugins/morris/morris.min.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('assets/theme/plugins/raphael/raphael.min.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('assets/theme/js/chart.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('assets/theme/js/greedynav.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>

    <script src="{{asset('assets/theme/js/layout.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('assets/theme/js/theme-settings.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>

    <script src="{{asset('assets/theme/js/app.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>
    <script src="{{asset('../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="07e26efd99e9fcaeb20a7722-|49" defer></script>

    @stack('script')

</html>