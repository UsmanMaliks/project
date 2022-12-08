@include('layouts.dashup')
<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Hello, {{ auth()->user()->name }} <span>Welcome</span></h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /# column -->
</div>
<section id="main-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="card p-0">
                <div class="stat-widget-three home-widget-three">
                    <div class="stat-icon bg-facebook">
                        <i class="ti-facebook"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-digit"><a href="https://www.facebook.com/Bagpacktnt" target="_blank">30</a></div>
                        <div class="stat-text">Likes</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-0">
                <div class="stat-widget-three home-widget-three">
                    <div class="stat-icon bg-youtube">
                        <i class="ti-youtube"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-digit"><a href="https://www.youtube.com/channel/UCDosJ5TDjNb2wxmrQ2pqeCA" target="_blank">300</a></div>
                        <div class="stat-text">Subscribes</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-0">
                <div class="stat-widget-three home-widget-three">
                    <div class="stat-icon bg-twitter">
                        <i class="fa fa-instagram"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-digit"><a href="https://www.instagram.com/bagpacktnt/" target="_blank">10</a></div>
                        <div class="stat-text">Followers</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card p-0">
                <div class="stat-widget-three home-widget-three">
                    <div class="stat-icon bg-danger">
                        <i class="ti-linkedin"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-digit">9,658</div>
                        <div class="stat-text">Followers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">Booked Trips</div>
                        <div class="stat-digit">{{ $bookedtrips }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">New Customer</div>
                        <div class="stat-digit">{{ $customer }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                    </div>
                    <div class="stat-content dib">
                        <div class="stat-text">New Agencies</div>
                        <div class="stat-digit">{{ $agency }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Citites</div>
                        <div class="stat-digit">{{ $cities }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@include('layouts.dashdown')
