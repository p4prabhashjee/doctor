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

    <!-- Terms Section start -->
    <section class="terms-wrap ptb-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <?php echo $page->description ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Terms Section end -->

</div>
<!-- Content wrapper end -->
@endsection