@extends('frontend.layout.layout')
@section('content')

            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-2">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>About Us</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="{{route('about')}}">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <!-- About Section Start -->
                <section class="about-wrap style1 ptb-100">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <!-- <div class="col-lg-6">
                                <div class="about-img-wrap">
                                    <img src="{{url('/public/frontend/')}}/assets/img/about-bg.png"
                                     alt="Image" class="about-img-one">
                                 
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <div class="about-content">
                                    <?php echo $about->description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- About Section End -->


               
            
            </div>
            <!-- Content wrapper end -->

@endsection