@include('layouts.frontup')

<!--================Home Banner Area =================-->
<section class="banner_area ">
    <div class="banner_inner overlay d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h1>All Tours</h1>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<section class="package-area section_gap_top">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="ol-lg-12">
                <div class="main_title">
                    <p>We’re Offering these Tours</p>
                    <h1>Famous Tours</h1>
                    <span class="title-widget-bg"></span>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('agency.trip') }}">
            @csrf
            <div class="row d-flex justify-content-center mb-30">
                <h3 class="mb-30 title_color">Agencies</h3>
                <div class="default-select" id="default-select">
                    <select name="agency">
                        <option disabled selected>Select Agency</option>
                        @foreach ($agency as $agencies)
                            <option value="{{ $agencies->id }}">{{ $agencies->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="genric-btn success">Search</button>
            </div>
        </form>
        @if (!count($tourdata))
        <div class="section-top-border">
            <h3 class="mb-30 title_color">Query Result</h3>
            <div class="row">
                <div class="col-lg-12">
                    <blockquote class="generic-blockquote">
                        “No Trips Found corresponding to specific agency”
                    </blockquote>
                    <a href="{{ route('all.trips') }}" >All trips</a>
                </div>
            </div>
        </div>
        @endif
        <div class="row d-flex justify-content-center mb-30">
            {{-- <ul class="filter__controls">
                <li class="active" data-filter="*">All</li>
                <li data-filter=".stiched">Stiched</li>
                <li data-filter=".casual">Casuals</li>
                <li data-filter=".rent">Rent</li>
                <li data-filter=".masks">Masks</li>
                <li data-filter=".scrunchies">Scrunchies</li>
            </ul> --}}
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
        </div>
        <div class="row">
            @foreach ($tourdata as $tour)
                <div class="col-lg-4 col-md-6">
                    <div class="single-package searching">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('storage/tour/' . $tour->image) }}" alt="">
                        </div>
                        <p class="date">
                            <span>{{ htmlspecialchars_decode(date('D', strtotime($tour->trip_date))) }}</span>
                            <br> {{ htmlspecialchars_decode(date('F Y', strtotime($tour->trip_date))) }}
                        </p>
                        <div class="meta-top d-flex">
                            <p><span class="fa fa-location-arrow"></span>{{ $tour->cityname }}</p>
                            <p class="ml-20"><span class="fa fa-calendar"></span> {{ $tour->day }}
                                days</p>
                        </div>
                        <h4>{{ $tour->name }}</h4>
                        <p>
                            {{ $tour->description }}
                        </p>
                        <a href="tourdetail/{{ $tour->id }}" class="primary-btn">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--================ End Trip Package Area =================-->
@include('layouts.frontdown')
