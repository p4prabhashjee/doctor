@extends('frontend.layout.layout')
@section('content')

<!-- Content Wrapper Start -->
<div class="content-wrapper">

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-f br-1">
        <div class="container">
            <div class="breadcrumb-title">
                <h2>{{$page->title}}</h2>
                <ul class="breadcrumb-menu list-style">
                    <li><a href="{{url('home')}}">Home </a></li>
                    <li>{{$page->title}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Privacy Policy Section start -->
    <section class="terms-wrap pt-100 pb-75 mb-10">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <?php echo $page->description ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Privacy Policy Section end -->

</div>
<!-- Content wrapper end -->

@endsection