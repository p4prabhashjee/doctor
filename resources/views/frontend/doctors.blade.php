@extends('frontend.layout.layout')
@section('content')

            <!-- Content Wrapper Start -->
            <div class="content-wrapper">

                <!-- Breadcrumb Start -->
                <div class="breadcrumb-wrap bg-f br-2">
                    <div class="container">
                        <div class="breadcrumb-title">
                            <h2>Specialists at NoorHealth</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="index.php">Home </a></li>
                                <li>Specialists </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Breadcrumb End -->

                <section class="portfolio-wrap ptb-100">
                    <div class="container">
                    <div class='traingtabs '>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
     data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
      aria-selected="true">All Show</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
     data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" 
     aria-selected="false">Cardiology </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">G I Surgeon</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
     data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled"
      aria-selected="false" >ENT Surgeon</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactone-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactone" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Orthopaedics </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contacttwo-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contacttwo" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false"> Urology</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactthree-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactthree" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Oncologist</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactfour-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactfour" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactfive-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactfive" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon1 </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactsix-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactsix" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon2 </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactseven-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactseven" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon 3</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contacttwoly-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contacttwoly" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contacteight-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contacteight" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactnine-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactnine" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactten-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactten" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contacteleven-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contacteleven" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon </button>
  </li>
    <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contactforty-tab" data-bs-toggle="pill"
     data-bs-target="#pills-contactforty" type="button" role="tab" aria-controls="pills-contact" 
     aria-selected="false">Neuro Surgeon </button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
   aria-labelledby="pills-home-tab" tabindex="0">
    <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>
                       
                        </div> 

   </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel"
   aria-labelledby="pills-profile-tab" tabindex="0">
   <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
   </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">   <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
     
   </div>
  <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
   aria-labelledby="pills-disabled-tab" tabindex="0"> 12    
</div>
     <div class="tab-pane fade" id="pills-contactone" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0"> 10  

</div>
     <div class="tab-pane fade" id="pills-contacttwo" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0"> 9 

</div>
     <div class="tab-pane fade" id="pills-contactthree" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">  111   
</div>
     <div class="tab-pane fade" id="pills-contactfour" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">  8  
</div>

<div class="tab-pane fade" id="pills-contactfive" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">    
</div>
<div class="tab-pane fade" id="pills-contactsix" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">    
</div>
<div class="tab-pane fade" id="pills-contactseven" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">  7  
</div>
<div class="tab-pane fade" id="pills-contacttwoly" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">    
</div>
<div class="tab-pane fade" id="pills-contacteight" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">  6  
</div>
<div class="tab-pane fade" id="pills-contactnine" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">    
</div>   <div class="tab-pane fade" id="pills-contactten" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">5    
</div>
<div class="tab-pane fade" id="pills-contacteleven" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0"> 4   
</div>
<div class="tab-pane fade" id="pills-contactforty" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">   3 
</div>  
 <div class="tab-pane fade" id="pills-contactfour" role="tabpanel"
   aria-labelledby="pills-contact-tab" tabindex="0">  2  
</div>

</div>
</div> 
 </div>
</section>




                 
                <!-- Portfolio Section Start -->
                <!-- <section class="portfolio-wrap ptb-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-10 col-12 my-3">
                                <div class="portfolio-card style1">
                                    <img src="{{url('/public/frontend/')}}/assets/img/dr.-kumud-handa_1664185490.png" class="img-fluid"  alt="Image">
                                    <div class="portfolio-info sizedoct">
                                        <a href="portfolio-category.html" class="portfolio-cat">ENT Surgeon</a>
                                        <h3><a href="portfolio-details.html">Dr Kumud Handa</a></h3>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                       
                    </div>
                </section> -->
                <!-- Portfolio Section End -->

            </div>
            <!-- Content wrapper end -->
            @endsection