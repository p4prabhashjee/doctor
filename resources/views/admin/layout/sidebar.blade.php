@php
$admin= Auth::guard('admin')->user();

@endphp
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="{{route('admin_dashboard')}}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('page')}}">
                        <i class="bx bx-file"></i>
                        <span key="t-dashboards">Pages</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('faq')}}">
                        <i class="bx bx-file"></i>
                        <span key="t-dashboards">FAQ</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('banner')}}">
                        <i class="bx bx-file"></i>
                        <span key="t-dashboards">Slider</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('gallery')}}">
                        <i class="bx bx-file"></i>
                        <span key="t-dashboards">Gallery</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('city')}}">
                        <i class="bx bx-file"></i>
                        <span key="t-dashboards">Cities</span>
                    </a>
                </li>


                <li>
                    <a href="{{route('category')}}">
                        <i class="fas fa-book"></i>
                        <span key="t-dashboards">
                            Specialities
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('sub_category')}}">
                        <i class="fas fa-book"></i>
                        <span key="t-dashboards">
                            Sub Specialities
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('doctor')}}">
                        <i class="fas fa-book"></i>
                        <span key="t-dashboards">Specialities Doctors</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('hospital')}}">
                        <i class="fas fa-book"></i>
                        <span key="t-dashboards">Hospitals</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('testimonial')}}">
                        <i class="bx bx-file"></i>
                        <span key="t-dashboards">Testimonial</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-dashboards">Enquiry and Request</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('hospital_request')}}" key="t-tui-calendar">Hospital Enquiry</a></li>
                        <li><a href="{{route('doctor_request')}}" key="t-tui-calendar">Doctors Enquery</a></li>
                        <li><a href="{{route('specialities_request')}}" key="t-tui-calendar">Specialities Enquery</a></li>
                        <li><a href="{{route('contact_request')}}" key="t-tui-calendar">Conctact Enquery</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->