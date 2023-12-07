@extends('frontend.layout.layout')
@section('content')

            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-1">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Specialities at NoorHealth</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="index.php">Home </a></li>
                                <li>Specialities</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

           

                <!-- Service Section Start -->
                <section class="service-wrap ptb-100 bg-athens">
                <div class="container">
                    <div class="section-title style1 text-center mb-40">
                        <!-- <span>Our Services</span> -->
                        <h2>Speciality and Treatment or Condition</h2>
                    </div>
                    <div class="row">
                        @foreach($servic as $ser)
                        <div class=" col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3 ">
                        <div class="service-card style1">
                            <div class="service-img">
                                <img src="{{url($ser->image)}}" alt="Image">
        
                            </div>
                            <div class="service-info">
                                <h3><a href="service-details.php">{{$ser->title}}</a></h3>
                                <p>{{$ser->short_description}}</p>
                                <a href="{{url('/Speciality/'.$ser->slug)}}" class="link style2">Read More</a>
                            </div>
                        </div>
                        </div>
                        @endforeach

                        
                    </div>
                </div>
            </section>
            <!-- Service Section End -->


            </div>
            <!-- Content wrapper end -->
            @endsection