@extends('frontend.layout.layout')
@section('content')
            <!-- Hero Section Start -->

            <section class="hero-wrap style1">
                <div class="hero-slider-one owl-carousel">
                    @foreach($banner as $slider)
                    <div class="hero-slide-item">
                        <div class="container">
                            <div class="row align-items-center gx-5">

                                <div class="col-xl-5 col-lg-6">
                                    <div class="hero-content">
                                        <span>{{$slider->sub_title}}</span>
                                        <h1>{{$slider->title}}</h1>
                                        <p>{{$slider->description}}</p>
                                        <div class="hero-btn">
                                            <a href="{{route('about')}}" class="btn style1">Find Out More</a>
                                            <a href="{{route('web_specialities')}}" class="btn style3">Our Services</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6">
                                    <div class="hero-img-wrap">
                                        <img class="hero-img"
                                         src="{{url($slider->image)}}" alt="Image">
                                        <img src="{{url('/public/frontend/')}}/assets/img/hero/hero-shape-1.png" alt="Image" class="hero-shape-one moveHorizontal">
                                        <img src="{{url('/public/frontend/')}}/assets/img/hero/hero-shape-2.png" alt="Image" class="hero-shape-two rotate">
                                        <div class="row promo-box-wrap">
                                            <div class="col-xl-5 col-lg-7 col-md-5">
                                                <div class="promo-box">
                                                    <span><i class="flaticon-support"></i></span>
                                                    <h4>24/7 Support</h4>
                                                    <p>There are many variations of passages are valid.</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-lg-7 col-md-5">
                                                <div class="promo-box">
                                                    <span><i class="flaticon-aid-man"></i></span>
                                                    <h4>Qualified Doctors</h4>
                                                    <p>There are many variations of passages are valid.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Hero Section End -->


            <!-- Counter Section Start -->
            <div class="counter-wrap pt-100 pb-75  bg-blue">
                <div class="container">
                    <div class="counter-card-wrap style1 pb-75" data-aos="fade-up"
                     data-aos-duration="1200" data-aos-delay="200">
                        <div class="counter-card style1">
                            <span class="counter-icon">
                                <i class="flaticon-admision-form"></i>
                            </span>
                            <div class="counter-text">
                                <h2 class="counter-num">
                                    <span class="odometer" data-count="60"></span>
                                    <span class="target">+</span>
                                </h2>
                                <p>Project Completed</p>
                            </div>
                        </div>
                        <div class="counter-card style1">
                            <span class="counter-icon">
                                <i class="flaticon-doctor"></i>
                            </span>
                            <div class="counter-text">
                                <h2 class="counter-num">
                                    <span class="odometer" data-count="99"></span>
                                    <span class="target">%</span>
                                </h2>
                                <p>Patients Satisfied</p>
                            </div>
                        </div>
                        <div class="counter-card style1">
                            <span class="counter-icon">
                                <i class="flaticon-medical-operation"></i>
                            </span>
                            <div class="counter-text">
                                <h2 class="counter-num">
                                    <span class="odometer" data-count="700"></span>
                                    <span class="target">+</span>
                                </h2>
                                <p>Medical Beds</p>
                            </div>
                        </div>
                        <div class="counter-card style1">
                            <span class="counter-icon">
                                <i class="flaticon-blood-test"></i>
                            </span>
                            <div class="counter-text">
                                <h2 class="counter-num">
                                    <span class="odometer" data-count="70"></span>
                                    <span class="target">+</span>
                                </h2>
                                <p>Laboratory Experts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="promo-wrap style1">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="promo-card">
                                <div class="promo-info">
                                <span>Excellent Services</span>
                                    <h3>World class services</h3>
                                    <p>Our consultants will offer 24X7 to provide you with 
                                        the simplest direction and tending suggestions. we
                                         have got a fanatical team that consults doctors
                                          and researches on your behalf to give you the 
                                        simplest treatment packages as per your demand.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                            <div class="promo-card">
                                <div class="promo-info">
                                    <span>Qualified Doctors</span>
                                    <h3>Best doctors for your family</h3>
                                    <p>NoorMediacre has pan-India network of the simplest
                                         hospitals and doctors. we tend to facilitate you
                                          discover the foremost effective hospital-doctor 
                                          combination as per your treatment arrange. we
                                           have got tie-ups with over three hundred
                                            hospitals, and a network of over 2000 doctors 
                                            all over India.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            <div class="promo-card">
                                <div class="promo-info">
                                    <span>Emergency Departments</span>
                                    <h3>We're always ready...</h3>
                                    <p>We provide our clients with the foremost effective treatment packages
                                     custom-made as per their necessities and budget. we provide you the foremost
                                      effective and most cost-effective treatment packages in India for your 
                                      treatment. we provide treatment packages for all possible diseases.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
            <!-- Counter Section End -->

            <!-- About Section Start -->
            <section class="about-wrap style1 ptb-100">
                <div class="container">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-img-wrap">
                                <img src="{{url('/public/frontend/')}}/assets/img/1.png" alt="Image" class="about-img-one">
                                <img src="{{url('/public/frontend/')}}/assets/img/2.png" alt="Image" class="about-img-two">
                              
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="about-content">
                                <div class="content-title style1">
                                    <span>Best Care For Your Good Health</span>
                                    <h2>Welcome to NoorMedicare</h2>
                                    <p>Noor Medicare, is a worldwide platform to assist you with finding
                                         the best medicinal services places in India that can give the 
                                         highest care for your social health issues. We give all the
                                          possible data required by you to assist you with taking the 
                                          decision about your healthcare services, doctors and hospitals. 
                                          We additionally deal with your travel, remain and different 
                                          offices in your picked medicinal services goal.</p>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <ul class="content-feature-list list-style">
                                            <li><i class="ri-checkbox-circle-line"></i>
                                            Affordable & Transparent Medical Tourism Packages
                                            </li>
                                            <li><i class="ri-checkbox-circle-line"></i>
                                            Stress-Free Reservations
                                            </li>
                                            <li><i class="ri-checkbox-circle-line"></i>
                                            Easy Visa Process & Insurance Service
                                            </li>
                                        </ul>
                                    </div>
                                  
                                </div>
                                <!-- <div class="hero-btn py-5">
                                <a href="" class="btn style1">Learn More</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Section End -->

            <!-- Service Section Start -->
            <section class="service-wrap ptb-100 bg-athens">
                <div class="container">
                    <div class="section-title style1 text-center mb-40">
                        <!-- <span>Our Services</span> -->
                        <h2>Speciality and Treatment or Condition</h2>
                    </div>
                    <div class="row">
@foreach($servic1 as $home_ser)
                        <div class=" col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3 ">
                        <div class="service-card style1">
                            <div class="service-img">
                                <img src="{{isset($home_ser->image)?url($home_ser->image):''}}" alt="Image" style="width: 100%; height:235px;">
        
                            </div>
                            <div class="service-info">
                                <h3><a href="{{url('/Speciality/'.$home_ser->slug)}}">{{$home_ser->title}}</a></h3>
                                <p>{{$home_ser->short_description}}</p>
                                <a href="{{url('/Speciality/'.$home_ser->slug)}}" class="link style2">Read More</a>
                            </div>
                        </div>
                        </div>
@endforeach
                        
                    </div>
                </div>
            </section>
            <!-- Service Section End -->

                <!-- Portfolio Section Start -->
                <section class="portfolio-wrap ptb-100">
                <div class="container">
                    <div class="section-title style1 text-center mb-40">
                        <!-- <span>Our Portfolio</span> -->
                        <h2>Our Hospitals</h2>
                    </div>
                     <div class="row">
                        @foreach($hospital as $hos)
                       <div class="col-xl-3 col-md-3 col-lg-3 col-sm-12 col-12 my-3">
                       <div class="service-card style1">
                            <div class="service-img imgeffects">
                            <img src="{{url($hos->image)}}" alt="Image">
                            </div>
                            <div class="service-info textsize p-2 text-center">
                                <h3><a href="{{url('/hospital/'.$hos->slug)}}">{{$hos->title}}</a></h3>
                                <span>Delhi & NCR</span>
                            </div>
                        </div>
                       </div>
                        @endforeach
                       
                       <div class="text-center mt-10">
                        <div class="hero-btn ">
                                <a href="{{route('web_hospital')}}" class="btn style1">View More</a>
                                </div>
                    </div>
                     </div>
                </div>
            </section>
            <!-- Portfolio Section End -->


            
                <!-- Dotactor Section Start -->
                <section class="portfolio-wrap ptb-100 bg-athens">
                <div class="container">
                    <div class="section-title style1 text-center mb-40">
                        <!-- <span>Our Portfolio</span> -->
                        <h2>Meet Our Specialists</h2>
                    </div>
                     <div class="row">
                        @foreach($doctor as $doc)
                       <div class="col-xl-3 col-md-3 col-lg-3 col-sm-12 col-12 my-3">
                       <div class="service-card style1">
                            <div class="service-img imgeffectss">
                            <img src="{{url($doc->image)}}" alt="Image">
                            </div>
                            <div class="service-info textsize py-4 p-2 text-center">
                                <h3 class="pb-3"><a href="{{url('/doctor/'.$doc->slug)}}">{{$doc->title}}</a></h3>
                                <a href="{{url('/doctor/'.$doc->slug)}}" class=" profilebtn">View Profile</a>
                            </div>
                        </div>
                       </div>
                       @endforeach
                       
                     
                       <div class="text-center mt-10">
                        <div class="hero-btn ">
                                <a href="{{route('web_doctor')}}" class="btn style1">View More</a>
                                </div>
                    </div>
                     </div>
                </div>
            </section>
            <!-- Dotactor Section End -->


            <!-- Why Choose Us Section Start -->
            <!-- <section class="wh-wrap style1 bg-chathamas ptb-100">
                <div class="container">
                    <div class="row align-items-center mb-40">
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="section-title style2">
                                <span>Why Choose us</span>
                                <h2>Owr Best Services & Quite Popular Online Treatment</h2>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <p class="section-para style2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque ex maxime itaque corporis ipsam dolores non explicabo, ipsa temporibus impedit, quos architecto ad pariatur! Itaque fugit nesciunt doloremque quos! Nam?</p>
                        </div>
                    </div>
                    <div class="row align-items-center gx-5">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="wh-img-wrap">
                                <div class="wh-shape-one">
                                    <img src="{{url('/public/frontend/')}}/assets/img/why-choose-us/wh-shape-1.png" alt="Image" class=" bounce">
                                </div>
                                <img src="{{url('/public/frontend/')}}/assets/img/why-choose-us/wh-img-5.jpg" alt="Image" class="wh-img-one">
                                <img src="{{url('/public/frontend/')}}/assets/img/why-choose-us/wh-img-2.jpg" alt="Image" class="wh-img-two">
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="wh-content">
                                <div class="feature-item-wrap">
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="ri-check-line"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h3>Mental health Solutions</h3>
                                            <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque .</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="ri-check-line"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h3>Rapid Patient Improvement</h3>
                                            <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="ri-check-line"></i>
                                        </div>
                                        <div class="feature-text">
                                            <h3>World Class Treatment</h3>
                                            <p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partner-slider-one owl-carousel pt-100">
                        <div class="partner-item">
                            <img src="{{url('/public/frontend/')}}/assets/img/partner/partner-1.png" alt="Image">
                        </div>
                        <div class="partner-item">
                            <img src="{{url('/public/frontend/')}}/assets/img/partner/partner-2.png" alt="Image">
                        </div>
                        <div class="partner-item">
                            <img src="{{url('/public/frontend/')}}/assets/img/partner/partner-3.png" alt="Image">
                        </div>
                        <div class="partner-item">
                            <img src="{{url('/public/frontend/')}}/assets/img/partner/partner-4.png" alt="Image">
                        </div>
                        <div class="partner-item">
                            <img src="{{url('/public/frontend/')}}/assets/img/partner/partner-5.png" alt="Image">
                        </div>
                        <div class="partner-item">
                            <img src="{{url('/public/frontend/')}}/assets/img/partner/partner-6.png" alt="Image">
                        </div>
                        <div class="partner-item">
                            <img src="{{url('/public/frontend/')}}/assets/img/partner/partner-2.png" alt="Image">
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- Why Choose Us Section End -->

        


            <!-- Pricing Section Start -->
            <!-- <section class="pricing-wrap pt-100 pb-75">
                <div class="container">
                    <div class="section-title style1 text-center mb-40">
                        <span>Pricing Plan</span>
                        <h2>Our Simple &amp; Affordable Plan</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="pricing-card">
                                <div class="pricing-header">
                                    <div class="pricing-header-left">
                                        <h5>Basic Plan</h5>
                                        <h2>$79<span>/Month</span></h2>
                                    </div>
                                    <div class="pricing-header-right">
                                       <i class="flaticon-home"></i>
                                    </div>
                                </div>
                                <ul class="pricing-features list-style">
                                    <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                                    <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                                    <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                                    <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                                    <li class="unchecked">X-rays<i class="ri-close-fill"></i></li>
                                    <li class="unchecked">Cancer Treatment<i class="ri-close-fill"></i></li>
                                </ul>
                                <a href="login.php" class="btn style2">Get Started Now</a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
                            <div class="pricing-card">
                                <div class="pricing-header">
                                    <div class="pricing-header-left">
                                        <h5>Standard Plan</h5>
                                        <h2>$89<span>/Month</span></h2>
                                    </div>
                                    <div class="pricing-header-right">
                                       <i class="flaticon-user-2"></i>
                                    </div>
                                </div>
                                <ul class="pricing-features list-style">
                                    <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                                    <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                                    <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                                    <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                                    <li class="checked">X-rays<i class="ri-check-line"></i></li>
                                    <li class="unchecked">Cancer Treatment<i class="ri-close-fill"></i></li>
                                </ul>
                                <a href="login.php" class="btn style2">Get Started Now</a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                            <div class="pricing-card">
                                <div class="pricing-header">
                                    <div class="pricing-header-left">
                                        <h5>Premium Plan</h5>
                                        <h2>$99<span>/Month</span></h2>
                                    </div>
                                    <div class="pricing-header-right">
                                       <i class="flaticon-clipboard"></i>
                                    </div>
                                </div>
                                <ul class="pricing-features list-style">
                                    <li class="checked">New Patient Consultation <i class="ri-check-line"></i></li>
                                    <li class="checked">Regular health Checkup<i class="ri-check-line"></i></li>
                                    <li class="checked">Ocupational Therapy<i class="ri-check-line"></i></li>
                                    <li class="checked">Phusical Therapy<i class="ri-check-line"></i></li>
                                    <li class="checked">X-rays<i class="ri-check-line"></i></li>
                                    <li class="checked">Cancer Treatment<i class="ri-check-line"></i></li>
                                </ul>
                                <a href="login.php" class="btn style2">Get Started Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- Pricing Section End -->

            <!-- Blog Section Start -->
            <!-- <section class="blog-wrap ptb-100 bg-athens">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-8">
                            <div class="section-title style1 mb-40">
                                <span>Our Blog</span>
                                <h2>Our Latest &amp; Most Popular Tips &amp; Tricks For You</h2>
                            </div>
                        </div>
                    </div>
                    <div class="blog-slider-one owl-carousel">
                        <div class="blog-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="blog-img">
                                <img src="{{url('/public/frontend/')}}/assets/img/blog/blog-1.jpg" alt="Image">
                            </div>
                            <div class="blog-info">
                                <a href="posts-by-date.php" class="blog-date">22 Jun, 2022</a>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.php">Admin</a></li>
                                    <li><i class="ri-wechat-line"></i>No Comment</li>
                                </ul>
                                <h3><a href="blog-details-right-sidebar.php">How To Recover Health Faster With Online Session</a></h3>
                                <a href="blog-details-right-sidebar.php" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                            <div class="blog-img">
                                <img src="{{url('/public/frontend/')}}/assets/img/blog/blog-2.jpg" alt="Image">
                            </div>
                            <div class="blog-info">
                                <a href="posts-by-date.php" class="blog-date">15 Jun, 2022</a>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.php">Admin</a></li>
                                    <li><i class="ri-wechat-line"></i>No Comment</li>
                                </ul>
                                <h3><a href="blog-details-right-sidebar.php">Telehealth Services Are Ready To Help Your Family </a></h3>
                                <a href="blog-details-right-sidebar.php" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            <div class="blog-img">
                                <img src="{{url('/public/frontend/')}}/assets/img/blog/blog-3.jpg" alt="Image">
                            </div>
                            <div class="blog-info">
                                <a href="posts-by-date.php" class="blog-date">12 Jun, 2022</a>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.php">Admin</a></li>
                                    <li><i class="ri-wechat-line"></i>No Comment</li>
                                </ul>
                                <h3><a href="blog-details-right-sidebar.php">10 Tips To Lead A Healthy And Happy Life</a></h3>
                                <a href="blog-details-right-sidebar.php" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                            <div class="blog-img">
                                <img src="{{url('/public/frontend/')}}/assets/img/blog/blog-4.jpg" alt="Image">
                            </div>
                            <div class="blog-info">
                                <a href="posts-by-date.php" class="blog-date">25 May, 2022</a>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.php">Admin</a></li>
                                    <li><i class="ri-wechat-line"></i>No Comment</li>
                                </ul>
                                <h3><a href="blog-details-right-sidebar.php">The Day I'd Spent At Square Medical Center</a></h3>
                                <a href="blog-details-right-sidebar.php" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <div class="blog-card style1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                            <div class="blog-img">
                                <img src="{{url('/public/frontend/')}}/assets/img/blog/blog-5.jpg" alt="Image">
                            </div>
                            <div class="blog-info">
                                <a href="posts-by-date.php" class="blog-date">17 May, 2022</a>
                                <ul class="blog-metainfo  list-style">
                                    <li><i class="ri-user-unfollow-line"></i><a href="posts-by-author.php">Admin</a></li>
                                    <li><i class="ri-wechat-line"></i>No Comment</li>
                                </ul>
                                <h3><a href="blog-details-right-sidebar.php">How Does Science Help In Dental Surgery Research</a></h3>
                                <a href="blog-details-right-sidebar.php" class="link style2">Read More<i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- Blog Section End -->


            
            <!-- Testimonial Section Start -->
            <section class="testimonial-wrap style1 ptb-100 bg-athens">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-8">
                            <div class="section-title style2 mb-40">
                                <span>Testimonial</span>
                                <h2>OUR PATIENT’S STORIES </h2>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-slider-one owl-carousel">
                        <div class="testimonial-card style3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <ul class="ratings list-style">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <p class="client-quote">Thanks to the team at NoorHealth who 
                                gave me all the required support from my travel, 
                                accommodation to medical treatment., apart from various 
                                specialist doctors, which was cumbersome. With NoorHealth, I not only found help with best treatment options but all my other travel logistics were taken care of.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{url('/public/frontend/')}}/assets/img/afroz_1661792605.jpg" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>afroz Khan</h3>
                                        <span>Director, BAT</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-quote-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card style3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">
                            <ul class="ratings list-style">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <p class="client-quote">Thanks to the team at NoorHealth who
                                 gave me all the required support from my travel,
                                  accommodation to medical treatment., apart from 
                                  various specialist doctors, which was cumbersome. 
                                  With NoorHealth, I not only found help with best 
                                  treatment options but all my other travel logistics were
                                   taken care of.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{url('/public/frontend/')}}/assets//img/afroz_1661792605.jpg" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>KHAN N</h3>
                                        <span>CEO, IBAC</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-quote-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card style3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                            <ul class="ratings list-style">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{url('/public/frontend/')}}/assets/img/testimonials/client-3.jpg" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>Tom Haris</h3>
                                        <span>Engineer, Olleo</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-quote-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card style3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="500">
                            <ul class="ratings list-style">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{url('/public/frontend/')}}/assets/img/testimonials/client-4.jpg" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>Harry Jackson</h3>
                                        <span>Enterpreneur</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-quote-2"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card style3" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                            <ul class="ratings list-style">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                            </ul>
                            <p class="client-quote">Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{url('/public/frontend/')}}/assets/img/testimonials/client-5.jpg" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>Chris Haris</h3>
                                        <span>MD, ITec</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-quote-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="cta-wrap pt-100">
                        <div class="row gx-5 align-items-center">
                            <div class="col-xl-8 col-lg-7">
                                <div class="cta-content">
                                    <div class="cta-logo">
                                        <img src="{{url('/public/frontend/')}}/assets/img/cta-icon.png" alt="Image">
                                    </div>
                                    <div class="content-title">
                                        <h2>Don't Hesitate To Contact us</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto inventore voluptatem possimus quibusdam veritatis. Accusamus ipsum saepe quas.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="cta-btn">
                                    <a href="appointment.php" class="btn style1">Make Appointment</a>
                                    <a href="contact.php" class="btn style2">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </section>
            <!-- Testimonial Section End -->

            
            <!-- Appointment Section Start -->
            <section class="appointment-wrap style1  ptb-100">
                <div class="container">
                    <div class="row gx-5">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="appointment-content">
                                <div class="content-title style1">
                                    <span>Best Solutions</span>
                                    <h2>Awesome Smart Health Can Make Your Life Easier</h2>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste cupiditate sit debitis, aut, perferendis praesentium alias, asperiores similique veniam vitae veritatis.</p>
                                </div>
                                <ul class="content-feature-list list-style">
                                    <li><i class="ri-checkbox-circle-line"></i>Top Professional Team</li>
                                    <li><i class="ri-checkbox-circle-line"></i>World Class Dental Services</li>
                                    <li><i class="ri-checkbox-circle-line"></i>Discount On Treatment Fees</li>
                                    <li><i class="ri-checkbox-circle-line"></i>Multi-Functional Hospital</li>
                                    <li><i class="ri-checkbox-circle-line"></i>20+ Years Of Experience</li>
                                    <li><i class="ri-checkbox-circle-line"></i>Top Professional Specialist</li>
                                </ul>
                                <a href="contact.php" class="btn style1">Contact Us Now</a>
                            </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <div class="appointment-bg bg-f">
                                <form action="#" class="appointment-form">
                                    <h2>Book An Appointment</h2>
                                    <div class="form-group">
                                        <input type="text" placeholder="Full name">   
                                    </div>
                                    <div class="form-group">
                                        <input type="number" placeholder="Phone Number">   
                                    </div>
                                    <div class="form-group">
                                        <select name="select_doctor" id="select_doctor">
                                            <option value="0" data-display="Select Doctor">Select Doctor</option>
                                            <option value="1" >Dr. Novlel Josef</option>
                                            <option value="2" >Dr. Fredrick Henry</option>
                                            <option value="3" >Dr. Steave Mark</option>
                                        </select>   
                                    </div>
                                    <div class="form-group">
                                        <input type="date">   
                                    </div>
                                    <button type="submit" class="btn style2">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Appointment Section End -->

       @endsection