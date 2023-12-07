@extends('frontend.layout.layout')
@section('content')
<div class="content-wrapper">

   <!-- Breadcrumb Start -->
   <div class="breadcrumb-wrap bg-f br-1 style1  portfolio-wrap ptb-100">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Hospitals at NoorHealth</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="index.php">Home </a></li>
                                <li>Hospitals</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->


            <section class="  style1 portfolio-wrap ptb-100">
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
                       
                       <!-- <div class="text-center mt-10">
                        <div class="hero-btn ">
                                <a href="service-one.php" class="btn style1">View More</a>
                                </div>
                    </div> -->
                     </div>
                </div>
            </section>

@endsection