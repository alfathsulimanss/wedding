
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/landing/assets/images/favicon.png') }}">
    <title> {{ $wedding->slug }} - Wedding Invitation</title>
    <link href="{{ url('assets/landing/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ url('assets/landing/assets/sass/style.css') }}" rel="stylesheet">
</head>

<body>

<!-- start page-wrapper -->
<div class="page-wrapper">
    <!-- start preloader -->
    <div class="preloader">
        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <img src="{{ url('assets/landing/assets/images/preloader.svg') }}" alt="">
            </div>
        </div>
    </div>
    <!-- end preloader -->
    <!-- Start header -->

    <div class="modal top fade"
         id="coverModal"
         tabindex="-1"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true"
         data-mdb-backdrop="true"
         data-mdb-keyboard="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body">
                    <section class="wpo-wedding-date mt-5">
                        <div class="container">
                            <h2 class="wow fadeInUp" data-wow-duration="1000ms">
                                <span class="shape-1"><img src="{{ url('assets/landing/assets/images/slider/shape.png') }}" alt=""></span>
                                {!! $wedding->slug !!}
                                <span class="shape-2"><img src="{{ url('assets/landing/assets/images/slider/shape2.png') }}" alt=""> </span>
                            </h2>
                            <p class="wow fadeInUp" data-wow-duration="1200ms">Dear {{ $invitation->name }}</p>
                            <p class="wow fadeInUp" data-wow-duration="1200ms">We Are Getting Married {{ \Carbon\Carbon::parse($wedding->reception)->format('d F Y') }}</p>

                            <p class="mt-5">Kami Mengundang Anda Untuk Hadir Di Acara Pernikahan Kami.</p>
                            <section class="wpo-couple-section section-padding" id="couple">
                                <div class="container">
                                    <div class="couple-area clearfix">
                                        <div class="row align-items-center">
                                            <div class="col col-md-6 col-sm-6">
                                                <div class="couple-item wow fadeInLeftSlow" data-wow-duration="1700ms">
                                                    <div class="couple-img">
                                                        <img src="{{ url('assets/landing/assets/images/couple/P1.jpg') }}" alt="">
                                                    </div>
                                                    <div class="couple-text">
                                                        <h3>{{ $wedding->catin_1 }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-6 col-sm-6">
                                                <div class="couple-item wow fadeInRightSlow" data-wow-duration="1700ms">
                                                    <div class="couple-img">
                                                        <img src="{{ url('assets/landing/assets/images/couple/P2.jpg') }}" alt="">
                                                    </div>
                                                    <div class="couple-text">
                                                        <h3>{{ $wedding->catin_2 }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end container -->
                            </section>
                            <button id="open_invitation" type="button" class="btn btn-secondary"> <i class="ti-book"></i> Buka Undangan </button>

                        </div> <!-- end container -->
                    </section>
                </div>
            </div>
        </div>
    </div>
    <header id="header">
        <div class="wpo-site-header wpo-header-style-1" id="sticky-header">
            <nav class="navigation navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-3 col-3 d-lg-none d-block">
                            <div class="mobail-menu">
                                <button type="button" class="navbar-toggler open-btn">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar first-angle"></span>
                                    <span class="icon-bar middle-angle"></span>
                                    <span class="icon-bar last-angle"></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-6 d-lg-block d-none">

                        </div>
                        <div class="col-md-6 col-6 d-lg-none dl-block">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#"><img src="{{ url('assets/landing/assets/images/logo.png') }}" alt="" style="height: 100px"></a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-1 col-1">
                            <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                <button class="menu-close"><i class="ti-close"></i></button>
                                <ul class="nav navbar-nav mb-2 mb-lg-0">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#story">Story</a></li>
                                    <li><a href="#gallery">Gallery</a></li>
                                    <li><a href="#event">Event</a></li>
                                </ul>

                            </div><!-- end of nav-collapse -->
                        </div>
                        <div class="col-lg-2 col-md-2 col-2">

                        </div>
                    </div>
                </div><!-- end of container -->
            </nav>
        </div>
    </header>
    <!-- end of header -->
    <!-- start of hero -->
    <section class="wpo-hero-slider wpo-hero-style-3">
        <h2 class="hidden">some</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ url('assets/landing/assets/images/slider/slide-1.JPG') }}">
                    </div> <!-- end slide-inner -->
                </div> <!-- end swiper-slide -->

                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ url('assets/landing/assets/images/slider/slide-2.JPG') }}">
                    </div> <!-- end slide-inner -->
                </div> <!-- end swiper-slide -->

                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ url('assets/landing/assets/images/slider/slide-3.JPG') }}">
                    </div> <!-- end slide-inner -->
                </div> <!-- end swiper-slide -->

                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ url('assets/landing/assets/images/slider/slide-4.JPG') }}">
                    </div> <!-- end slide-inner -->
                </div> <!-- end swiper-slide -->
            </div>
            <!-- end swiper-wrapper -->

            <!-- swipper controls -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- end of hero slider -->
    <!-- start wpo-wedding-date -->
    <section class="wpo-wedding-date">
        <div class="container">
            <h2 class="wow fadeInUp" data-wow-duration="1000ms">
                <span class="shape-1"><img src="{{ url('assets/landing/assets/images/slider/shape.png') }}" alt=""></span>
                {!! $wedding->slug !!}
                <span class="shape-2"><img src="{{ url('assets/landing/assets/images/slider/shape2.png') }}" alt=""> </span>
            </h2>
            <p class="wow fadeInUp" data-wow-duration="1200ms">Dear {{ $invitation->name }}</p>
            <p class="wow fadeInUp" data-wow-duration="1200ms">We Are Getting Married {{ \Carbon\Carbon::parse($wedding->reception)->format('d F Y') }}</p>
            <div class="row wow fadeInUp" data-wow-duration="1400ms">
                <div class="col col-xs-12">
                    <div class="clock-grids">
                        <div id="clock" data-date="{{ $wedding->reception }}"></div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-wedding-date -->
    <!-- start couple-section -->
    <section class="wpo-couple-section section-padding" id="couple">
        <div class="container">
            <div class="couple-area clearfix">
                <div class="row align-items-center">
                    <div class="col col-md-5 col-12">
                        <div class="couple-item wow fadeInLeftSlow" data-wow-duration="1700ms">
                            <div class="couple-img">
                                <img src="{{ url('assets/landing/assets/images/couple/P1.jpg') }}" alt="">
                            </div>
                            <div class="couple-text">
                                <h3>{{ $wedding->catin_1 }}</h3>
                                <p>{{ $wedding->bio_catin_1 }}</p>
                                <div class="social">
                                    <ul>
                                        <li><p>Ayah: {{ $wedding->ayah_catin1 }}</p></li>
                                        <li><p>Ibu: {{ $wedding->ibu_catin1 }}</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-2 col-12">
                        <div class="middle-couple-shape wow fadeInUp" data-wow-duration="1000ms">
                            <div class="shape">
                                <img src="{{ url('assets/landing/assets/images/couple/shape.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-5 col-12">
                        <div class="couple-item wow fadeInRightSlow" data-wow-duration="1700ms">
                            <div class="couple-img">
                                <img src="{{ url('assets/landing/assets/images/couple/P2.jpg') }}" alt="">
                            </div>
                            <div class="couple-text">
                                <h3>{{ $wedding->catin_2 }}</h3>
                                <p>{{ $wedding->bio_catin_2 }}</p>
                                <div class="social">
                                    <ul>
                                        <li><p>Ayah: {{ $wedding->ayah_catin2 }}</p></li>
                                        <li><p>Ibu: {{ $wedding->ibu_catin2 }}</p></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end couple-section -->
    <!-- start wpo-story-section -->
    <section class="wpo-story-section section-padding" id="story">
        <div class="container-fluid">
            <div class="wpo-section-title">
                <h4>Our Story</h4>
                <h2>Our Sweet love story</h2>
            </div>
            <div class="wpo-story-wrap">
                <div class="wpo-story-item">
                    <div class="wpo-story-img-wrap">
                        <div class="wpo-story-img wow zoomIn" data-wow-duration="1000ms">
                            <img src="{{ url('assets/landing/assets/images/story/S1.jpeg') }}" alt="">
                        </div>
                        <div class="wpo-img-shape">
                            <img src="{{ url('assets/landing/assets/images/story/shape.png') }}" alt="">
                        </div>
                    </div>
                    <div class="wpo-story-content">
                        <div class="wpo-story-content-inner wow fadeInRightSlow" data-wow-duration="1700ms">
                            <h2>First Time We Meet</h2>
                            <span>19 Juli 2015</span>
                            <p>Pada hari ke-3 Lebaran Idul Fitri pada tahun 2015, kita bertemu dan merasa cocok satu sama lain. Kita mulai berkomunikasi dan merasa seperti sudah mengenal satu sama lain selama bertahun-tahun.</p>
                        </div>
                    </div>
                </div>
                <div class="wpo-story-item">
                    <div class="wpo-story-img-wrap">
                        <div class="wpo-story-img wow zoomIn" data-wow-duration="1000ms">
                            <img src="{{ url('assets/landing/assets/images/story/S2.jpeg') }}" alt="">
                        </div>
                        <div class="wpo-img-shape">
                            <img src="{{ url('assets/landing/assets/images/story/shape.png') }}" alt="">
                        </div>
                    </div>
                    <div class="wpo-story-content">
                        <div class="wpo-story-content-inner wow fadeInLeftSlow" data-wow-duration="1700ms">
                            <h2>Our First Date</h2>
                            <span>6 February 2018</span>
                            <p>Setelah 3 tahun saling berkomunikasi, pada tanggal 6 Februari 2018, kami bertemu dan saling memiliki rasa. Saat kami berjalan dan menikmati pemandangan di Tugu Merpati, kami saling bercanda dan tertawa bersama.</p>
                        </div>
                    </div>
                </div>
                <div class="wpo-story-item">
                    <div class="wpo-story-img-wrap">
                        <div class="wpo-story-img wow zoomIn" data-wow-duration="1000ms">
                            <img src="{{ url('assets/landing/assets/images/story/S3.jpeg') }}" alt="">
                        </div>
                        <div class="wpo-img-shape">
                            <img src="{{ url('assets/landing/assets/images/story/shape.png') }}" alt="">
                        </div>
                    </div>
                    <div class="wpo-story-content">
                        <div class="wpo-story-content-inner wow fadeInRightSlow" data-wow-duration="1700ms">
                            <h2>She Said Yes</h2>
                            <span>19 Oktober 2020</span>
                            <p>Setelah melewati banyak halangan dan drama yg sangat panjang untuk menjawab “ya”. Dari sini kami mulai LDR smpai akhirnya bertemu kembali pada 14 Oktober 2022. Semuanya terasa seperti mimpi yang menjadi kenyataan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>

    <audio id="audio-player">
        <source src="{{ asset('assets/landing/assets/audio/Audio.mp3') }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <!-- end story-section -->
    <!-- start wpo-portfolio-section -->
    <section class="wpo-portfolio-section-s2 pb-0 section-padding" id="gallery">
        <div class="container">
            <div class="wpo-section-title">
                <h4>Sweet Memories</h4>
                <h2>Our Captured Moments</h2>
            </div>
            <div class="sortable-gallery">
                <div class="gallery-filters"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portfolio-grids gallery-container clearfix">
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/1.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/1.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/2.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/2.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/3.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/3.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/4.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/4.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/5.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/5.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/6.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/6.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/7.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/7.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/8.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/8.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/9.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/9.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/10.JPG') }}" class="fancybox"
                                       data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/10.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </section>
    <!-- end wpo-portfolio-section -->

    <!-- start wpo-event-section -->
    <section class="wpo-event-section section-padding pb-0" id="event">
        <div class="container">
            <div class="wpo-section-title">
                <h4>Our Wedding</h4>
                <h2>When & Where</h2>
            </div>
            <div class="wpo-event-wrap">
                <div class="row">
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="wpo-event-item">
                            <div class="wpo-event-img">
                                <img src="{{ url('assets/landing/assets/images/event/E1.JPG') }}" alt="">
                                <div class="title"><h2>The Reception</h2></div>
                            </div>
                            <div class="wpo-event-text">
                                <ul>
                                    <li>{{ \Carbon\Carbon::parse($wedding->reception)->format('d F Y h:i A') }}</li>
                                    <li>{{ $wedding->reception_address }}</li>
                                    <li> <a class="popup-gmaps"
                                            href="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d614.314937471515!2d100.58394672875288!3d-0.17274831011888037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1681749082113!5m2!1sid!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">See
                                            Location</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="wpo-event-item">
                            <div class="wpo-event-img">
                                <img src="{{ url('assets/landing/assets/images/event/E2.JPG') }}" alt="">
                                <div class="title"><h2>The Ceremony</h2></div>
                            </div>
                            <div class="wpo-event-text">
                                <ul>
                                    <li>{{ \Carbon\Carbon::parse($wedding->ceremony)->format('d F Y h A') }}</li>
                                    <li>{{ $wedding->ceremony_address }}</li>
                                    <li> <a class="popup-gmaps"
                                            href="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d614.314937471515!2d100.58394672875288!3d-0.17274831011888037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1681749082113!5m2!1sid!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">See
                                            Location</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-4 col-md-6 col-12">
                        <div class="wpo-event-item">
                            <div class="wpo-event-img">
                                <img src="{{ url('assets/landing/assets/images/event/E3.JPG') }}" alt="">
                                <div class="title"><h2>The Party</h2></div>
                            </div>
                            <div class="wpo-event-text">
                                <ul>
                                    <li>{{ \Carbon\Carbon::parse($wedding->party)->format('d F Y h A') }}</li>
                                    <li>{{ $wedding->party_address }}</li>
                                    <li> <a class="popup-gmaps"
                                            href="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d614.314937471515!2d100.58394672875288!3d-0.17274831011888037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1681749082113!5m2!1sid!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">See
                                            Location</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end container -->
    </section>
    <!-- end wpo-event-section -->

    <!-- wpo-site-footer start -->
    <div class="wpo-site-footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-image">
                        <a class="logo" href="#"><img src="{{ url('assets/landing/assets/images/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="copyright">
                        <p>© Copyright {{ \Carbon\Carbon::now()->format('Y') }} | <a href="#">WeddingGue</a> | All right reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wpo-site-footer end -->

    <!-- color-switcher -->
    <div class="color-switcher-wrap">
        <div class="color-switcher-item">
            <div class="color-toggle-btn">
                <i class="fa fa-cog"></i>
            </div>
            <ul id="switcher">
                <li class="btn btn1" id="Button1"></li>
                <li class="btn btn2" id="Button2"></li>
                <li class="btn btn3" id="Button3"></li>
                <li class="btn btn4" id="Button4"></li>
                <li class="btn btn5" id="Button5"></li>
                <li class="btn btn6" id="Button6"></li>
                <li class="btn btn7" id="Button7"></li>
                <li class="btn btn8" id="Button8"></li>
                <li class="btn btn9" id="Button9"></li>
                <li class="btn btn10" id="Button10"></li>
                <li class="btn btn11" id="Button11"></li>
                <li class="btn btn12" id="Button12"></li>
            </ul>
        </div>
    </div>
</div>
<!-- end of page-wrapper -->

<!-- All JavaScript files
================================================== -->
<script src="{{ url('assets/landing/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/landing/assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Plugins for this template -->
<script src="{{ url('assets/landing/assets/js/modernizr.custom.js') }}"></script>
<script src="{{ url('assets/landing/assets/js/jquery.dlmenu.js') }}"></script>
<script src="{{ url('assets/landing/assets/js/jquery-plugin-collection.js') }}"></script>
<!-- Custom script for this template -->
<script src="{{ url('assets/landing/assets/js/script.js') }}"></script>

<script type="text/javascript">
    document.getElementById('open_invitation').addEventListener('click', function() {
        var audioPlayer = document.getElementById('audio-player');
        audioPlayer.play();

        $('#coverModal').modal('hide');
    });

    $(window).on('load', function () {
        $('#coverModal').modal('show');
    });
</script>
</body>

</html>
