<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico">
    <title>Taxa Adventure</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/vendors/linericon/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/vendors/nice-select/css/nice-select.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('frontend/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/plyr/3.4.8/plyr.css'>
{{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css'><link rel="stylesheet" href="./style.css"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <!-- main css -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css" >
    @toastr_css
</head>

<body>

    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="/"><img src="frontend/img/Bag pack Website logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('all.trips') }}">Tours</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('about.us') }}">About</a></li>
                            @if (Route::has('login'))
                            @auth
                            <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            @endif
                            @endauth
                            @endif
                            <li class="nav-item"><a class="nav-link" href="{{ route('contact.us') }}">Contact</a></li>

                            {{-- feedback --}}
                            @auth
                            @if (auth()->user()->id == 1)
                            <li class="nav-item"><a class="nav-link" href="{{ route('feedback.table') }}">Feed Back</a></li>
                            @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('feed.back') }}">Feed Back</a></li>
                            @endif    
                            @endauth
                            
                            {{-- <li class="nav-item"><a class="nav-link" href="{{ route('feed.back') }}">Feed Back</a></li> --}}
                            
                            
                        </ul>
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{ route('search.tour') }}" class="primary-btn">Search Tour</a>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="search nav-link">
                                    <i class="lnr lnr-magnifier" id="search"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->
