@extends('frontend.layout.layout')
@section('content')

            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-2">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Cardiology</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="{{url('/')}}">Home </a></li>
                                <li><a href="{{route('web_specialities')}}">Specialities</a></li>
                                <li>{{$file->title}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- Service Details section Start -->
                <section class="service-details-wrap ptb-100">
                    <div class="container">
                        <div class="row gx-5">
                        <div class="col-xl-4">
                                <div class="sidebar">
                                <div class="row">
                                        <div class="col-md-12">
                                            <a class="single-service-img"  data-fancybox="gallery" href="{{url($file->image)}}">
                                                <img src="{{url($file->image)}}" class="img-fluid rounded" alt="Image">
                                            </a>
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <a class="single-service-img" data-fancybox="gallery" href="assets/img/services/single-service-2.jpg">
                                                <img src="assets/img/services/single-service-2.jpg" alt="Image">
                                            </a>
                                        </div> -->
                                    </div>
                                    <!-- <div class="sidebar-widget categories">
                                        <h4>Top Services</h4>
                                        <div class="category-box">
                                            <ul class="list-style">
                                                <li>
                                                    <a href="service-one.html">
                                                      Orthopedic Solutions 
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="service-one.html">
                                                        Cardiology Solutions
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="service-one.html">
                                                        Dental Services
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="service-one.html">
                                                        Eye Care Services
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="service-one.html">
                                                        Gastrology Services
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="service-one.html">
                                                        Neurology Services
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                 
                                    <div class="sidebar-widget mt-5">
                                 
                                        <h4>Book An Apointment</h4>    
                                        <form action="#" class="contact-widget">
                                            <div class="form-group">
                                                <input type="text" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                        <input type="number" placeholder="Phone Number">   
                                    </div>
                                    <div class="form-group">
                                        <input type="date">   
                                    </div>
                                            <div class="form-group">
                                                <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Your Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn style2">Book Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="service-desc">
                                    <h2>{{$file->title}}</h2>
                                    {!!$file->description!!}
                                </div>
                            </div>
                         
                        </div>
                    </div>
                </section>
                <!-- Service Details section End -->

                <!-- Service Section Start -->
                <section class="service-wrap ptb-100 bg-athens">
                    <div class="container">
                        <div class="section-title style1 text-center mb-40">
                            <!-- <span>Our Services</span> -->
                            <h2>Recommended Specialist</h2>
                        </div>
                        <div class="service-slider-one owl-carousel">
                            @foreach($doctor as $doc)
                                <div class="portfolio-card style1">
                                    <img src="{{url($doc->image)}}" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="{{url('/Speciality/'.$file->slug)}}" class="portfolio-cat">{{$file->title}}</a>
                                        <h3><a href="{{url('/doctor/'.$doc->slug)}}">{{$doc->title}}</a></h3>
                                    </div>
                                </div>
                            @endforeach
                                
                           
                        </div>
                        <div class="text-center mt-5">
                        <div class="hero-btn mt-5 rounded ">
                                <a href="{{route('web_specialities')}}" class="btn style1">See All Specialist</a>
                                </div>
                    </div>
                    </div>
                </section>
                <!-- Service Section End -->

            </div>
            <!-- Content wrapper end -->
            @endsection