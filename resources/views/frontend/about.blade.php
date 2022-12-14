@include('layouts.frontup')

	<!--================Home Banner Area =================-->
	<section class="banner_area ">
		<div class="banner_inner overlay d-flex align-items-center">
			<div class="container">
				<div class="banner_content">
					<h2>About Us</h2>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================ Start About Area =================-->
	<section class="section_gap about-area">
		<div class="container">
			<div class="single-about row">
				<div class="col-lg-4 col-md-6 no-padding about-left">
					<div class="about-content">
						<h1>
							We Believe <br>
							that Interior beauty <br>
							Lasts Long
						</h1>
						<p>
							inappropriate behavior is often laughed off as “boys will be boys,” women face higher
							conduct standards especially in the workplace. That’s why it’s crucial that as women.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
							incididunt ut labore et dolore magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-8 col-md-6 text-center no-padding about-right">
					<div class="about-thumb">
						<img src="{{ asset('frontend/img/about-img.jpg'); }}" class="img-fluid info-img" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End About Area =================-->

	<!--================ Start CTA Area =================-->
	<div class="cta-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<h1>Get Ready for
						Real time Adventure</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
						ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.
					</p>
					<a href="#" class="primary-btn">Book a Trip</a>
				</div>
				<div class="offset-lg-1 col-lg-6">
					<img class="cta-img img-fluid" src="{{ asset('frontend/img/cta-img.png'); }}" src="" alt="">
				</div>
			</div>
		</div>
	</div>
	<!--================ End CTA Area =================-->

	<!--================Team Area =================-->
	{{-- <section class="team_area section_gap_top">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<div class="main_title">
						<p>We’re Offering these Trip Packages</p>
						<h1>Intelligent Team Members</h1>
						<span class="title-widget-bg"></span>
					</div>
				</div>
			</div>
			<div class="row team_inner">
				<div class="col-lg-3 col-md-6">
					<div class="team_item">
						<div class="team_img">
							<img class="img-fluid w-100" src="{{ asset('frontend/img/team/team-1.jpg'); }}" alt="">
							<div class="hover">
								<h4>Randy Weaver</h4>
								<p>Senior Barrister at law</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="team_item">
						<div class="team_img">
							<img class="img-fluid w-100" src="{{ asset('frontend/img/team/team-2.jpg'); }}" alt="">
							<div class="hover">
								<h4>Randy Weaver</h4>
								<p>Senior Barrister at law</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="team_item">
						<div class="team_img">
							<img class="img-fluid w-100" src="{{ asset('frontend/img/team/team-3.jpg'); }}" alt="">
							<div class="hover">
								<h4>Randy Weaver</h4>
								<p>Senior Barrister at law</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="team_item">
						<div class="team_img">
							<img class="img-fluid w-100" src="{{ asset('frontend/img/team/team-4.jpg'); }}" alt="">
							<div class="hover">
								<h4>Randy Weaver</h4>
								<p>Senior Barrister at law</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--================End Team Area =================-->

	<!--================ Start Popular Places Area =================-->
	<section class="popular-places-area section_gap_bottom">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-12">
					<div class="main_title">
						<p>We’re Offering these Trip Packages</p>
						<h1>Popular Places In Pakistan</h1>
						<span class="title-widget-bg"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="popular-places-slider owl-carousel">
			<div class="single-popular-places">
				<div class="popular-places-img">
					<img src="{{ asset('frontend/img/places/p1.jpg'); }}" alt="">
				</div>
				<div class="popular-places-text">
					<a href="single-blog.html">
					</a>
					<p>Proper Guided Tour</p>
					<h4>
						Santorini Island Dream Holiday
						and Fun package
					</h4>
				</div>
			</div>
			<div class="single-popular-places">
				<div class="popular-places-img">
					<img src="{{ asset('frontend/img/places/p2.jpg'); }}" alt="">
				</div>
				<div class="popular-places-text">
					<a href="single-blog.html">
					</a>
					<p>Proper Guided Tour</p>
					<h4>
						Santorini Island Dream Holiday
						and Fun package
					</h4>
				</div>
			</div>
			<div class="single-popular-places">
				<div class="popular-places-img">
					<img src="{{ asset('frontend/img/places/p3.jpg'); }}" alt="">
				</div>
				<div class="popular-places-text">
					<a href="single-blog.html">
					</a>
					<p>Proper Guided Tour</p>
					<h4>
						Santorini Island Dream Holiday
						and Fun package
					</h4>
				</div>
			</div>
			<div class="single-popular-places">
				<div class="popular-places-img">
					<img src="{{ asset('frontend/img/places/p4.jpg'); }}" alt="">
				</div>
				<div class="popular-places-text">
					<a href="single-blog.html">
					</a>
					<p>Proper Guided Tour</p>
					<h4>
						Santorini Island Dream Holiday
						and Fun package
					</h4>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Popular Places Area =================-->

	<!--================ Start Testimonials Area =================-->
	{{-- <section class="testimonials-area section_gap_bottom">
		<div class="container">
			<div class="testi-slider owl-carousel" data-slider-id="1">
				<div class="item">
					<div class="testi-item">
						<img src="{{ asset('frontend/img/quote.png'); }}" alt="">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear <br>
								Mother Earth. If you think about it, you travel across her faceand She is the host <br>
								to your journey.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<img src="{{ asset('frontend/img/quote.png'); }}" alt="">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear <br>
								Mother Earth. If you think about it, you travel across her faceand She is the host <br>
								to your journey.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<img src="{{ asset('frontend/img/quote.png'); }}" alt="">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi-item">
						<img src="{{ asset('frontend/img/quote.png'); }}" alt="">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear <br>
								Mother Earth. If you think about it, you travel across her faceand She is the host <br>
								to your journey.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid rounded-circle" src="{{ asset('frontend/img/testimonial/t1.jpg'); }}" alt="">
					</div>
					<div class="overlay overlay-grad "></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid rounded-circle" src="{{ asset('frontend/img/testimonial/t2.jpg'); }}" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid rounded-circle" src="{{ asset('frontend/img/testimonial/t3.jpg'); }}" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
				<div class="owl-thumb-item">
					<div>
						<img class="img-fluid rounded-circle" src="{{ asset('frontend/img/testimonial/t4.jpg'); }}" alt="">
					</div>
					<div class="overlay overlay-grad"></div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--================ End Testimonials Area =================-->

@include('layouts.frontdown')
