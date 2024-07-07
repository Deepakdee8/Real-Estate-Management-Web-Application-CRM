<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<!-- Mirrored from smarthr.dreamstechnologies.com/html/template/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 11:48:17 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamstechnologies - Bootstrap Admin Template">
    <title>Executive Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/theme/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/theme/css/material.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/plugins/morris/morris.css')}}">

    <link rel="stylesheet" href="{{asset('assets/theme/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{asset('assets2/css/styles.css')}}">

</head>

<body>
    <div class="main-wrapper">
        <header class="header">
            <div class="header__container">
                <a href=" {{route('home')}}"> <img src="{{ asset('assets/theme/images/Samatha-Group-logo.png') }}" alt="Logo" width="100" height="40px"></a>
                <a href=" {{route('home')}}" class="header__logo">Samatha Group Estates and Projects</a>
                <a class="btn btn-info mx-2 py-2 text-white" href="{{route('notifyuser')}}"> Refresh Notifications</a>



                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>










        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div class="row d-flex justify-content-between">

                    <div class="nav__list">
                        <div class="nav__items">


                            <a href="{{ route('home') }}" class="nav__link active">
                                <i class='bx bx-home nav__icon'></i>
                                <span class="nav__name">Dashboard</span>
                            </a>


                            <a href="{{ route('user.customer.index') }}" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Customer Details</span>

                            </a>

                            <a href="{{ route('user.visits.index') }}" class="nav__link">
                                <i class='bx bx-bell nav__icon'></i>
                                <span class="nav__name">Customer Visits</span>

                            </a>

                            <a href="{{ route('user.schedule.index') }}" class="nav__link">
                                <i class='bx bx-compass nav__icon'></i>
                                <span class="nav__name">Schedule</span>
                            </a>

                            <a href="{{ route('user.property.index') }}" class="nav__link">
                                <i class='bx bx-bookmark nav__icon'></i>
                                <span class="nav__name">Property</span>
                            </a>
                        </div>
                    </div>
                    <div class="row d-flex flex-column-reverse  justify-content-end">
                        <div class="username">
                            <i class='bx bx-user nav__icon'></i>
                            <span class="nav__name">{{ Auth::user()->name }}</span>
                        </div>
                        <div class="out">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn nav__link nav__logout">
                                    <i class='bx bx-log-out nav__icon'></i>
                                    <span class="nav__name">Log Out</span>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </nav>
        </div>

        <div class="page-wrapper">

            <div class="content container-fluid pb-0">

                @yield('content')
            </div>
        </div>

    </div>
    </div>
    <script src="{{asset('assets2/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>

    <script data-cfasync="false" src="{{asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script src="{{asset('assets/theme/js/jquery-3.7.1.min.js')}}" type="07e26efd99e9fcaeb20a7722-text/javascript"></script>

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