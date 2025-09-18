
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">
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

    <style>
        .wpo-event-section .wpo-event-wrap .wpo-event-item .wpo-event-text ul li a:before {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 1px;
            content: "";
            background: none !important;
        }

        /* Congratulations Section Styles */
        .wpo-congratulations-section {
            background: #f8f9fa;
        }

        .congratulations-form-wrap {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .congratulations-form .form-group {
            margin-bottom: 20px;
        }

        .congratulations-form .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .congratulations-form .form-control:focus {
            border-color: #D4B0A5;
            box-shadow: 0 0 0 0.2rem rgba(212, 176, 165, 0.25);
        }

        .congratulations-form textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .congratulations-form .btn-primary {
            background: #D4B0A5;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .congratulations-form .btn-primary:hover {
            background: #c19a8a;
            transform: translateY(-2px);
        }

        .messages-container {
            max-height: 500px;
            overflow-y: auto;
        }

        .message-item {
            background: white;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-left: 4px solid #D4B0A5;
        }

        .message-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        .message-content p {
            margin: 0;
            line-height: 1.6;
            color: #555;
        }

        @media (max-width: 768px) {
            .congratulations-form-wrap {
                padding: 20px;
            }
            
            .message-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
        }
    </style>
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
                                                        <img src="{{ $wedding->catin_image_1_url ?? url('assets/landing/assets/images/couple/P1.jpg') }}" alt="{{ $wedding->catin_1 }}" style="max-height: 400px; width: 60%; object-fit: cover; object-position: center;">
                                                    </div>

                                                    <div class="couple-text">
                                                        <h3>{{ $wedding->catin_1 }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col col-md-6 col-sm-6">
                                                <div class="couple-item wow fadeInRightSlow" data-wow-duration="1700ms">
                                                    <div class="couple-img">
                                                        <img src="{{ $wedding->catin_image_2_url ?? url('assets/landing/assets/images/couple/P2.jpg') }}" alt="{{ $wedding->catin_2 }}" style="max-height: 400px; width: 60%; object-fit: cover; object-position: center;">
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
                        <div class="col-md-6 col-6 d-lg-none dl-block d-flex justify-content-center">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#"><img src="{{ url('assets/landing/assets/images/logo-new.png') }}" alt="" style="height: 70px"></a>
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
                @forelse($wedding->banners->sortBy('sort_order') as $banner)
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ $banner->image_url }}">
                    </div> <!-- end slide-inner -->
                </div> <!-- end swiper-slide -->
                @empty
                <!-- Fallback to default images if no banners -->
                <div class="swiper-slide">
                    <div class="slide-inner slide-bg-image" data-background="{{ url('assets/landing/assets/images/slider/slide-1.JPG') }}">
                    </div> <!-- end slide-inner -->
                </div> <!-- end swiper-slide -->
                @endforelse
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
                                <img src="{{ $wedding->catin_image_1_url ?? url('assets/landing/assets/images/couple/P1.jpg') }}" alt="{{ $wedding->catin_1 }}" style="max-height: 400px; width: 60%; object-fit: cover; object-position: center;">
                            </div>
                            <div class="couple-text">
                                <h3>{{ $wedding->catin_1 }}</h3>
                                <h6>{{ $wedding->bio_catin_1 }}</h6>
                                <div class="social">
                                    <ul>
                                        <li><h5>Ayah: {{ $wedding->ayah_catin1 }}</h5></li>
                                        <li><h5>Ibu: {{ $wedding->ibu_catin1 }}</h5></li>
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
                                <img src="{{ $wedding->catin_image_2_url ?? url('assets/landing/assets/images/couple/P2.jpg') }}" alt="{{ $wedding->catin_2 }}" style="max-height: 400px; width: 60%; object-fit: cover; object-position: center;">
                            </div>
                            <div class="couple-text">
                                <h3>{{ $wedding->catin_2 }}</h3>
                                <h6>{{ $wedding->bio_catin_2 }}</h6>
                                <div class="social">
                                    <ul>
                                        <li><h5>Ayah: {{ $wedding->ayah_catin2 }}</h5></li>
                                        <li><h5>Ibu: {{ $wedding->ibu_catin2 }}</h5></li>
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
                @forelse($wedding->loveStories->sortBy('order') as $index => $story)
                <div class="wpo-story-item">
                    <div class="wpo-story-img-wrap">
                        <div class="wpo-story-img wow zoomIn" data-wow-duration="1000ms">
                            <img src="{{ $story->image_url ?? url('assets/landing/assets/images/story/S' . ($index + 1) . '.jpeg') }}" alt="{{ $story->title }}">
                        </div>
                        <div class="wpo-img-shape">
                            <img src="{{ url('assets/landing/assets/images/story/shape.png') }}" alt="">
                        </div>
                    </div>
                    <div class="wpo-story-content">
                        <div class="wpo-story-content-inner wow {{ $index % 2 == 0 ? 'fadeInRightSlow' : 'fadeInLeftSlow' }}" data-wow-duration="1700ms">
                            <h2>{{ $story->title }}</h2>
                            <span>{{ $story->date->format('d F Y') }}</span>
                            <p>{!! $story->description !!}</p>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Fallback to default love stories if none exist -->
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
                @endforelse
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
                            @forelse($wedding->galleries->sortBy('order') as $gallery)
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ $gallery->image_url }}" class="fancybox" data-fancybox-group="gall-1">
                                        <img src="{{ $gallery->image_url }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @empty
                            <!-- Fallback to default gallery images if none exist -->
                            @for($i = 1; $i <= 10; $i++)
                            <div class="grid">
                                <div class="img-holder">
                                    <a href="{{ url('assets/landing/assets/images/portfolio/' . $i . '.JPG') }}" class="fancybox" data-fancybox-group="gall-1">
                                        <img src="{{ url('assets/landing/assets/images/portfolio/' . $i . '.JPG') }}" alt class="img img-responsive">
                                        <div class="hover-content">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endfor
                            @endforelse
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
                <div class="row justify-content-center">
                    <div class="col col-lg-6 col-md-8 col-12">
                        <div class="wpo-event-item">
                            <div class="wpo-event-img">
                                <img src="{{ url('assets/landing/assets/images/reception.jpg') }}" alt="">
                                <div class="title"><h2>The Reception</h2></div>
                            </div>
                            <div class="wpo-event-text">
                                <ul>
                                    <li>{{ \Carbon\Carbon::parse($wedding->reception)->format('d F Y h:i A') }}</li>
                                    <li>{{ $wedding->reception_address }}</li>
                                    <li class="d-flex justify-content-around gap-3">
                                        @if($wedding->google_maps_url)
                                            <a href="{{ $wedding->google_maps_url }}" 
                                               target="_blank" 
                                               rel="noopener noreferrer"
                                               class="btn btn-outline-light rounded px-4 py-2 d-flex align-items-center gap-2"
                                               style="border: 2px solid #D4B0A5; color: #D4B0A5; text-decoration: none; min-width: 120px; justify-content: center;">
                                                <i class="fab fa-google"></i>
                                                <span>Maps</span>
                                            </a>
                                        @endif
                                        @if($wedding->waze_url)
                                            <a href="{{ $wedding->waze_url }}" 
                                               target="_blank" 
                                               rel="noopener noreferrer"
                                               class="btn btn-outline-light rounded px-4 py-2 d-flex align-items-center gap-2"
                                               style="border: 2px solid #D4B0A5; color: #D4B0A5; text-decoration: none; min-width: 120px; justify-content: center;">
                                                <i class="fab fa-waze"></i>
                                                <span>Waze</span>
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end wpo-event-section -->

    <!-- start wpo-gifts-section -->
    <section class="wpo-gifts-section section-padding" id="gifts">
        <div class="container">
            <div class="wpo-section-title">
                <h4>Wedding Gifts</h4>
                <h2>Send Your Love</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="wpo-gifts-wrap">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12 mb-4">
                                <div class="gifts-info text-center">
                                    <div class="bank-logo mb-3">
                                        <img src="{{ url('assets/landing/assets/images/CIMB-Logo.png') }}" alt="CIMB Bank" style="max-height: 80px;">
                                    </div>
                                    @if($wedding->account_holder)
                                        <p class="account-holder">
                                            <strong>Account Holder:</strong><br>
                                            {{ $wedding->account_holder }}
                                        </p>
                                    @endif
                                    @if($wedding->bank_account)
                                        <p class="account-number mb-2">
                                            <strong>Account Number:</strong><br>
                                            <span style="font-size: 1.2em; letter-spacing: 1px;">{{ $wedding->bank_account }}</span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="qr-code text-center">
                                    <h5 class="mb-3">Scan QR Code</h5>
                                    <div class="qr-image">
                                        <a href="{{ url('assets/landing/assets/images/cimb-qrcode.JPG') }}" class="fancybox" data-fancybox-group="qr-code">
                                            <img src="{{ url('assets/landing/assets/images/cimb-qrcode.JPG') }}" alt="CIMB Malaysia QR Code" style="max-width: 400px; width: 100%; cursor: pointer;">
                                        </a>
                                    </div>
                                    <p class="mt-2 text-muted">Scan with your banking app or click to enlarge</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <p class="gifts-message">
                                    <em>"Your presence is the greatest gift, but if you wish to honor us with a gift, we would be grateful for your contribution to our new journey together."</em>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end wpo-gifts-section -->

    <!-- start wpo-congratulations-section -->
    <section class="wpo-congratulations-section section-padding" id="congratulations">
        <div class="container">
            <div class="wpo-section-title">
                <h4>Wedding Wishes</h4>
                <h2>Send Your Congratulations</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-12">
                    <div class="congratulations-form-wrap">
                        <form id="congratulations-form" class="congratulations-form">
                            @csrf
                            <input type="hidden" name="wedding_id" value="{{ $wedding->id }}">
                            <input type="hidden" name="invited_id" value="{{ $invitation->id }}">
                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ $invitation->name }}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Write your congratulations message for the happy couple..." required></textarea>
                            </div>
                            
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    <span class="btn-text">Send Congratulations</span>
                                    <span class="btn-loader" style="display: none;">
                                        <i class="fa fa-spinner fa-spin"></i> Sending...
                                    </span>
                                </button>
                            </div>
                            
                            <div id="congratulations-success" class="alert alert-success" style="display: none;">
                                <i class="fa fa-check-circle"></i> Thank you! Your congratulations message has been sent successfully.
                            </div>
                            
                            <div id="congratulations-error" class="alert alert-danger" style="display: none;">
                                <i class="fa fa-exclamation-circle"></i> <span class="error-text"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Display existing congratulations messages -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="congratulations-messages">
                        <h3 class="text-center mb-4">Wedding Wishes from Our Loved Ones</h3>
                        <div id="messages-container" class="messages-container">
                            <!-- Messages will be loaded here via AJAX -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end wpo-congratulations-section -->

    <!-- wpo-site-footer start -->
    <div class="wpo-site-footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-image">
                        <a class="logo" href="#"><img src="{{ url('assets/landing/assets/images/logo-new.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="copyright">
                        <p>© Copyright {{ \Carbon\Carbon::now()->format('Y') }} | <a href="#">ForMyOnlySister</a> | AlfathSuliman.</p>
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

    // RSVP Form functionality
    $('#rsvp-form').on('submit', function(e) {
        e.preventDefault();
        
        // Show loader
        $('#c-loader').show();
        
        // Hide previous messages
        $('#success, #error').hide();
        
        $.ajax({
            url: '{{ url("/rsvp/submit") }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if(response.success) {
                    // Update counters
                    $('.counter-number').eq(0).text(response.present_counter);
                    $('.counter-number').eq(1).text(response.not_present_counter);
                    
                    // Show success message
                    $('#success').show();
                    
                    // Optionally disable form after successful submission
                    $('#rsvp-form input, #rsvp-form select, #rsvp-form button').prop('disabled', true);
                } else {
                    $('#error').text(response.message || 'Error occurred while sending RSVP.').show();
                }
            },
            error: function(xhr) {
                var errorMessage = 'Error occurred while sending RSVP. Please try again later.';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                $('#error').text(errorMessage).show();
            },
            complete: function() {
                // Hide loader and re-enable button
                $('#c-loader').hide();
            }
        });
    });

    // Congratulations Form functionality
    $('#congratulations-form').on('submit', function(e) {
        e.preventDefault();
        
        // Show loader
        $('.btn-text').hide();
        $('.btn-loader').show();
        $('#congratulations-form button').prop('disabled', true);
        
        // Hide previous messages
        $('#congratulations-success, #congratulations-error').hide();
        
        $.ajax({
            url: '{{ url("/congratulations/submit") }}',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if(response.success) {
                    // Show success message
                    $('#congratulations-success').show();
                    
                    // Reset form
                    $('#congratulations-form')[0].reset();
                    $('#congratulations-form input[name="name"]').val('{{ $invitation->name }}');
                    
                    // Reload messages
                    loadCongratulationsMessages();
                } else {
                    $('#congratulations-error .error-text').text(response.message || 'Error occurred while sending congratulations.');
                    $('#congratulations-error').show();
                }
            },
            error: function(xhr) {
                var errorMessage = 'Error occurred while sending congratulations. Please try again later.';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if(xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors)[0][0];
                }
                $('#congratulations-error .error-text').text(errorMessage);
                $('#congratulations-error').show();
            },
            complete: function() {
                // Hide loader and re-enable button
                $('.btn-text').show();
                $('.btn-loader').hide();
                $('#congratulations-form button').prop('disabled', false);
            }
        });
    });

    // Load congratulations messages
    function loadCongratulationsMessages() {
        $.ajax({
            url: '{{ url("/congratulations/messages/" . $wedding->id) }}',
            type: 'GET',
            success: function(response) {
                if(response.success && response.messages) {
                    var messagesHtml = '';
                    response.messages.forEach(function(message) {
                        messagesHtml += `
                            <div class="message-item">
                                <div class="message-header">
                                    <strong>${message.name}</strong>
                                    <small class="text-muted">${message.created_at}</small>
                                </div>
                                <div class="message-content">
                                    <p>${message.message}</p>
                                </div>
                            </div>
                        `;
                    });
                    $('#messages-container').html(messagesHtml);
                }
            }
        });
    }

    // Load messages on page load
    $(document).ready(function() {
        loadCongratulationsMessages();
    });
</script>
</body>

</html>
