@include('layouts.frontup')
<style>
.owl-carousel .owl-video-tn {
  background-size: cover;
  padding-bottom: 56.25%;
  /* 16:9 */
  padding-top: 25px;
}

.owl-video-frame {
  position: relative;
  padding-bottom: 56.25%;
  /* 16:9 */
  padding-top: 25px;
  height: 0;
}

.owl-video-frame iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.owl-dots {
  text-align: center;
  margin-top: 20px;
}

.owl-dot {
  display: inline-block;
}

.owl-dot span {
  width: 11px;
  height: 11px;
  background-color: #ccc;
  border-radius: 50%;
  display: block;
  margin: 5px 3px;
}

.owl-dot.active span {
  background-color: #000;
}
</style>
<section class="banner_area">
    <div class="banner_inner overlay d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h1 style="color: white">Blog</h1>
            </div>
        </div>
    </div>
</section>
<section class="package-area section_gap_top">

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="ol-lg-12">
                <div class="main_title">
                    <p>Let Us Take Care of</p>
                    <h1 style="background-image: -webkit-linear-gradient(left, #ff2f8b, #9035f9);background-image: -moz-linear-gradient(left, #ff2f8b, #9035f9);background-image: -ms-linear-gradient(left, #ff2f8b, #9035f9);background-image: -o-linear-gradient(left, #ff2f8b, #9035f9);background-image: linear-gradient(to right, #ff2f8b, #9035f9);color: transparent;-webkit-background-clip: text;background-clip: text;">Your Tours</h1>
                    <span class="title-widget-bg"></span>
                </div>
            </div>
        </div>

    <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('frontend/img/mountain1.jpg') }}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 style="font-size: 50px;color: white;">Sibi Haseb</h1>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('frontend/img/mountain2.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('frontend/img/mountain3.jpg') }}" alt="Third slide">
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
      <div class="container section_gap_top">
        <div class="row d-flex justify-content-center">
            <div class="ol-lg-12">
                <div class="main_title">
                    <p>Our Multi-Media Channels</p>
                    <h1 style="background-image: -webkit-linear-gradient(left, #ff2f8b, #9035f9);background-image: -moz-linear-gradient(left, #ff2f8b, #9035f9);background-image: -ms-linear-gradient(left, #ff2f8b, #9035f9);background-image: -o-linear-gradient(left, #ff2f8b, #9035f9);background-image: linear-gradient(to right, #ff2f8b, #9035f9);color: transparent;-webkit-background-clip: text;background-clip: text;">Youtube Shots</h1>
                    <span class="title-widget-bg"></span>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12">

              <div class="owl-carousel owl-theme">

            {{-- <div class="item-video" data-merge="1"><a class="owl-video" href="{{ asset('frontend/img/Sequence 01.mp4') }}"></a></div> --}}
            <div class="item-video" data-merge="2"><a class="owl-video" href="https://www.youtube.com/watch?v=pOWkEKBZb_k"></a></div>
            <div class="item-video" data-merge="1"><a class="owl-video" href="https://www.youtube.com/watch?v=H3jLkJrhHKQ"></a></div>
            <div class="item-video" data-merge="2"><a class="owl-video" href="https://www.youtube.com/watch?v=H3jLkJrhHKQ"></a></div>
            <div class="item-video" data-merge="3"><a class="owl-video" href="https://www.youtube.com/watch?v=g3J4VxWIM6s"></a></div>
            <div class="item-video" data-merge="1"><a class="owl-video" href="https://www.youtube.com/watch?v=0fhoIate4qI"></a></div>
            <div class="item-video" data-merge="2"><a class="owl-video" href="https://www.youtube.com/watch?v=EF_kj2ojZaE"></a></div>
        </div>

            </div>
    </div>
    </div>
</section>



@include('layouts.frontdown')
<script>
    $('.owl-carousel').owlCarousel({
    items: 1,
    loop: true,
    video: true,
    lazyLoad: true
});
</script>

