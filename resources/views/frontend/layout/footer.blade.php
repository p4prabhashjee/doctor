     @php
$servic = App\Models\Category::where('status', 1)->select('id','title','slug')->orderBy('id', 'DESC')->get();
$doctoe_header = App\Models\Doctor::where('status', 1)->with('get_specialist')->orderBy('id', 'DESC')->get();

$hospital_header = App\Models\Hospital::where('status', 1)->select('id','title','slug')->orderBy('id', 'DESC')->get();
@endphp
     <!-- Footer Section Start -->
     <footer class="footer-wrap">
                <div class="container">
                    <div class="row pt-100 pb-75">
                      
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Our Specialities</h3>
                                <ul class="footer-menu list-style">
                                    @foreach($servic as $ser)
                                    <li>
                                        <a href="{{url('/Speciality/'.$ser->slug)}}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            {{$ser->title}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Hospitals</h3>
                                <ul class="footer-menu list-style">
                                    @foreach($hospital_header as $hos_header)
                                    <li>
                                        <a href="{{url('/hospital/'.$hos_header->slug)}}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            {{$hos_header->title}}
                                        </a>
                                    </li>
                                    @endforeach
                             
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 pe-xl-4">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Quick Link</h3>
                                <ul class="footer-menu list-style">
                                    <li>
                                        <a href="{{route('about')}}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            About Us
                                        </a>
                                    </li>
                                       <li>
                                        <a href="blog.php">
                                            <i class="ri-arrow-right-s-line"></i>
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('web_doctor')}}">
                                            <i class="ri-arrow-right-s-line"></i>
                                          Doctors
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gallery.php">
                                            <i class="ri-arrow-right-s-line"></i>
                                         Gallery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('privacy_policy')}}">
                                            <i class="ri-arrow-right-s-line"></i>
                                           Privacy & Policy
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('terms_condition')}}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            Terms-Conditions
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{route('contact')}}">
                                            <i class="ri-arrow-right-s-line"></i>
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget">
                                <h3 class="footer-widget-title">Contact Us</h3>
                                <ul class="contact-info list-style">
                                    <li>
                                        <i class="flaticon-map"></i>
                                        <h6>Location</h6>
                                        <p>{{$setting->address}}</p>
                                    </li>
                                    <li>
                                        <i class="flaticon-email-1"></i>
                                        <h6>Email</h6>
                                        <a href="#">
                                            <span class="__cf_email__" data-cfemail="f79f929b9b98b783929b9ed994989a">
                                            {{$setting->email}}</span></a>
                                    </li>
                                    <li>
                                        <i class="flaticon-phone-call-1"></i>
                                        <h6>Phone</h6>
                                        <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
                                    </li>
                                </ul>
                                <ul class="social-profile pt-4 style1 list-style">
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
                                        <a href="https://instagram.com/">
                                            <i class="ri-instagram-line"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="copyright-text"><i class="ri-copyright-line"></i> 
                <span>NoorMediCare</span>. Copyright ©2023 All rights reserved 
              </p>
            </footer>
            <!-- Footer Section End -->
    
        </div>
        <!-- Page Wrapper End -->
        
        <!-- Back-to-top button Start -->

         <a href="javascript:void(0)" class="back-to-top bounce">
            <i class="ri-arrow-up-s-line"></i></a>
            
        <!-- Back-to-top button End -->

        <!-- Link of JS files -->
        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/jquery.min.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/form-validator.min.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/contact-form-script.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/aos.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/owl.carousel.min.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/odometer.min.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/fancybox.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/jquery.appear.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/tweenmax.min.js"></script>
        <script src="{{url('/public/frontend/')}}/assets/js/main.js"></script>
    </body>
</html>