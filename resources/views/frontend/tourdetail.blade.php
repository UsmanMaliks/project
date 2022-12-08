@include('layouts.frontup')
<!--================Home Banner Area =================-->
<section class="banner_area ">
    <div class="banner_inner overlay d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="blog.html">Blog</a>
                    <a href="single-blog.html">Blog Details</a>
                </div>
                <h2>Blog Details</h2>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            @foreach ($tourdata as $data)
            <div class="col-lg-12 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="top: -100px">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100 heightcustom" src="{{ asset('storage/tour/' . $data->image) }}" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100 heightcustom" src="{{ asset('storage/tour/' . $data->image) }}" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100 heightcustom" src="{{ asset('storage/tour/' . $data->image) }}" alt="Third slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <div class="post_tag">
                                <a href="#">Food,</a>
                                <a class="active" href="#">Technology,</a>
                                <a href="#">Politics,</a>
                                <a href="#">Lifestyle</a>
                            </div>
                            <ul class="blog_meta list">
                                <li><a href="#">{{ $agency_name }}<i class="lnr lnr-user"></i></a></li>
                                <li><a href="#">{{ htmlspecialchars_decode(date('D F Y', strtotime($data->trip_date))) }}<i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="#">{{ $data->season }} Season<i class="lnr lnr-eye"></i></a></li>
                                <li><a href="#">{{ $data->max_person }} Total Passengers<i class="lnr lnr-bubble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2>{{ $data->city_from_trip }} To {{ $data->city_to_trip }}</h2>
                        <p class="excert">
                            {{ $data->description }}
                        </p>
                        <ul class="blog_meta list">
                            <li><label><i class="lnr lnr-user"></i> {{ $agency_name }}</label></li>
                            <li><label>Tour Type: {{ $data->tour_type }}</label></li>
                        </ul>
                    </div>

                </div>
                <section id="pricing" class="pricing-area pricing-bg p-relative pt-85">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 col-lg-8 col-md-10">
                                <div class="section-title s-section-title text-center mb-80">
                                    <h2>Trip Packages</h2>
                                    <p>Different Packages</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="pricing-box f-pricing-box text-center mb-30">
                                    <div class="pricing-head s-pricing-head f-pricing-head">
                                        <h3>Basic</h3>
                                        <h2 class="price-count">{{ $data->package_1 }}</h2>
                                    </div>
                                    <div class="pricing-list">
                                        <ul class="m-2 ml-4 mr-4">
                                            <li>1 Lunch, 1 Dinner</li>
                                            <li>Economy Class Travel</li>
                                            <li>1 Bedroom, Single Bath</li>
                                            <li>2 Person Package</li>
                                            <li>Photography</li>
                                            <li>No Camping</li>
                                            <li>No Extra Perks</li>
                                        </ul>
                                    </div>
                                    <div class="pricing-btn">
                                        @foreach ($tourdata as $data)
                                        <a href="{{ route('payment.page',['tour_id' => $data->id,1]) }}" class="btn green-btn s-green-btn">Get Started</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="pricing-box f-pricing-box text-center active mb-30">
                                    <div class="pricing-head s-pricing-head f-pricing-head">
                                        <h3>V.I.P</h3>
                                        <h2 class="price-count">{{ $data->package_2 }}</h2>
                                    </div>
                                    <div class="pricing-list">
                                        <ul class="m-2 ml-4 mr-4">
                                            <li>1 Breakfast, 1 Lunch, 1 Dinner</li>
                                            <li>Business Class Travel</li>
                                            <li>2 Bedroom, Single Bath, Kitchen</li>
                                            <li>4 Person Package</li>
                                            <li>Photography, Videography</li>
                                            <li>Camping</li>
                                            <li>Simple Extra Perks</li>
                                        </ul>
                                    </div>
                                    <div class="pricing-btn">
                                        @foreach ($tourdata as $data)
                                        <a href="{{ route('payment.page',['tour_id' => $data->id,2]) }}" class="btn green-btn s-green-btn">Get Started</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="pricing-box f-pricing-box text-center mb-30">
                                    <div class="pricing-head s-pricing-head f-pricing-head">
                                        <h3>V.V.I.P</h3>
                                        <h2 class="price-count">{{ $data->package_3 }}</h2>
                                    </div>
                                    <div class="pricing-list">
                                        <ul class="m-2 ml-4 mr-4">
                                            <li>1 Breakfast, 1 Lunch, 1 Dinner</li>
                                            <li>Business Class Travel</li>
                                            <li>2 Bedroom, Single Bath, Kitchen</li>
                                            <li>4 Person Package</li>
                                            <li>Photography, Videography</li>
                                            <li>Camping</li>
                                            <li>Simple Extra Perks</li>
                                        </ul>
                                    </div>
                                    <div class="pricing-btn">
                                        @foreach ($tourdata as $data)
                                        <a href="{{ route('payment.page',['tour_id' => $data->id,3]) }}" class="btn green-btn s-green-btn">Get Started</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@include('layouts.frontdown')
