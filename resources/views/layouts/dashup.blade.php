<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bag Pack</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    {{-- <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff"> --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    {{-- <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"> --}}
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ asset('assets/css/lib/calendar2/semantic.ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/calendar/fullcalendar.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/lib/chartist/chartist.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/themify-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/weather-icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/menubar/sidebar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/lib/helper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
    {{-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    {{-- <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script> --}}
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @toastr_css

</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="/">
                            <!-- <img src="assets/images/logo.png" alt="" /> --><span>Bagpack</span>
                        </a></div>
                    <li class="label">Main</li>
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="ti-home"></i> Dashboard
                        </a>
                    </li>
                    @can('User Management')
                        <li class="label">User Management</li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-server"></i> Management <span
                                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{ route('usertable') }}"><i class="ti-server"></i> User Table</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{ route('createrole') }}"><i class="ti-server"></i>Create Role</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{ route('roletable') }}"><i class="ti-server"></i> Role Table</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{ route('feedback.table') }}"><i class="ti-server"></i>FeedBack Table</a></li>
                            </ul>
                        </li>
                    @endcan
                    @can('Booked Trips')
                        <li class="label">Your Trips</li>
                        <li><a class="sidebar-sub-toggle"><i class="fa fa-plane"></i>Booked Trips<span
                                    class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{ route('your.trips') }}"><i class="fa fa-plane"></i>View Trips
                                        Schedule</a></li>
                            </ul>
                        </li>
                    @endcan
                    <li class="label">Tables <Table></Table>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-server"></i>All Tables<span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            @can('City Table')
                                <li><a href="{{ route('city.table') }}"><i class="ti-server"></i>City Table</a></li>
                            @endcan
                            @can('Tour Management')
                                <li><a href="{{ route('tour.create') }}"><i class="ti-server"></i>Create Tour</a></li>
                                @can('All Tour Table')
                                    <li><a href="{{ route('tour.table') }}"><i class="ti-server"></i>Tour Table</a></li>
                                @endcan
                                @can('Agency Tour Table')
                                    <li><a href="{{ route('agency.table') }}"><i class="ti-server"></i>Agency Table</a>
                                    </li>
                                @endcan
                            @endcan
                            @can('Package Management')
                                <li><a href="{{ route('package.table') }}"><i class="ti-server"></i>Package Table</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="label">Profile</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Profile <span
                                class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ route('profile') }}"><i class="ti-user"></i> Profile</a></li>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="ti-close"></i> {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        {{-- <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">{{ Auth::user()->name }}
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    {{-- <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div> --}}
                                    <div class="dropdown-content-body">
                                        <ul>
                                            {{-- <li>
                                                    <a href="{{ route('profile') }}">
                                                        <i class="ti-user"></i>
                                                        <span>Profile</span>
                                                    </a>
                                            </li> --}}
                                            {{-- <li>
                                                <a href="{{ route('dashboard') }}">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li> --}}

                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    <i class="ti-power-off"></i> {{ __('Logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}"
                                                    method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
