@php
$servic = App\Models\Category::where('status', 1)->select('id','title','slug')->orderBy('id', 'DESC')->get();
$doctoe_header = App\Models\Doctor::where('status', 1)->with('get_specialist')->orderBy('id', 'DESC')->get();

$hospital_header = App\Models\Hospital::where('status', 1)->select('id','title','slug')->orderBy('id', 'DESC')->get();
@endphp
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link of CSS files -->

    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/remixicon.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/odometer.min.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/fancybox.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/aos.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/responsive.css">
    <link rel="stylesheet" href="{{url('/public/frontend/')}}/assets/css/dark-theme.css">
    <title>@if($title != ""){{ $title }} | @endif {{$setting->sitename}}</title>
    <link rel="icon" type="image/png" href="{{url('/public/frontend/')}}/assets/img/favicon.png">
</head>

<body>

    <!--Preloader starts-->

    <div class="loader js-preloader">
        <div class="absCenter">
            <div class="loaderPill">
                <div class="loaderPill-anim">
                    <div class="loaderPill-anim-bounce">
                        <div class="loaderPill-anim-flop">
                            <div class="loaderPill-pill"></div>
                        </div>
                    </div>
                </div>
                <div class="loaderPill-floor">
                    <div class="loaderPill-floor-shadow"></div>
                </div>
            </div>
        </div>
    </div>

    <!--Preloader ends-->

    <!-- Theme Switcher Start -->
    <!-- <div class="switch-theme-mode">
            <label id="switch" class="switch">
                    <input type="checkbox" onchange="toggleTheme()" id="slider">
                    <span class="slider round"></span>
            </label>
        </div> -->

    <!-- Theme Switcher End -->

    <!-- Page Wrapper End -->
    <div class="page-wrapper">

        <!-- Header Section Start -->

        <header class="header-wrap style1">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="header-top-left">
                                <ul class="contact-info list-style">
                                    <li>
                                        <span><i class="flaticon-email-1"></i></span>
                                        <p> <a href="mailto:support@noormedicare.com" target="" rel="">{{$setting->email}}</a></p>
                                    </li>
                                    <li>
                                        <span><i class="ri-phone-fill"></i></span>
                                        <a href="tel:9555197411">{{$setting->phone}}</a>
                                    </li>
                                    <li>
                                        <span><i class="ri-map-pin-fill"></i></span>
                                        <p>{{$setting->address}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="header-top-right">
                                <ul class="social-profile list-style style1">
                                    <li>
                                        <a href="https://facebook.com/">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://pinterest.com/">
                                            <i class="ri-pinterest-line"></i>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img class="logo-light" src="{{url('/public/frontend/')}}/assets/img/2logo.png" style=" width: 100%; height: 50px; " alt="logo">
                            <img class="logo-dark" src="{{url('/public/frontend/')}}/assets/img/logo-white.png" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                            <div class="menu-close d-lg-none">
                                <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                            </div>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{route('home')}}" class="nav-link active">
                                        HOME
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('about')}}" class="nav-link">
                                        ABOUT
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        SPECIALITIES
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($servic as $ser)
                                        <li class="nav-item">
                                            <a href="{{url('/Speciality/'.$ser->slug)}}" class="nav-link">{{$ser->title}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        HOSPITALS
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($hospital_header as $hos_header)
                                        <li class="nav-item">
                                            <a href="{{url('/hospital/'.$hos_header->slug)}}" class="nav-link">{{$hos_header->title}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        OUR SPECIALISTS
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($doctoe_header as $doc_header)

                                        <li class="nav-item">
                                            <a href="{{url('/doctor/'.$doc_header->slug)}}" class="nav-link">
                                                {{$doc_header->title}}, {{$doc_header['get_specialist']->title}}
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </li>
                                <!-- <li class="nav-item">
                                        <a href="contact.php" class="nav-link">GALLERY</a>
                                    </li> -->
                                <li class="nav-item">
                                    <a href="gallery.php" class="nav-link">GALLERY</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.php" class="nav-link">CONTACT US</a>
                                </li>

                                <li class="nav-item d-lg-none">
                                    <a href="appointment.php" class="nav-link btn style1">Book Appointment</a>
                                </li>
                            </ul>
                            <div class="other-options md-none">
                                <div class="option-item">
                                    <a href="appointment.php" class="btn style1">Book Appointment</a>
                                </div>
                            </div>

                        </div>
                    </nav>
                    <div class="search-area">
                        <input type="search" placeholder="Search Here..">
                        <button type="submit"><i class="ri-search-line"></i></button>
                    </div>
                    <div class="mobile-bar-wrap">
                        <button class="searchbtn d-lg-none"><i class="ri-search-line"></i></button>
                        <div class="mobile-menu d-lg-none">
                            <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Section End -->