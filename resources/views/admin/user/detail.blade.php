@extends('admin.layout.layout')
@section('content')
    <!-- <style type="text/css">
                                            .card {
                                            margin-bottom: 24px;
                                            box-shadow: 0 0.75rem 1.5rem rgb(18 38 63 / 3%)!important;
                                            background-color: inherit;
                                        }
                                        </style> -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                                    <!-- <li class="breadcrumb-item">{{ $title }}</li> -->
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-xl-6">
                                        <div class="mt-4 mt-xl-3">
                                            <a href="javascript: void(0);" class="text-primary"></a>
                                            <h4 class="mt-1 mb-3"><img
                                                    src="{{ url(isset($user->profile) ? $user->profile : 'public/noimage.png') }}"
                                                    alt="logo" height="50" width="50"
                                                    class="rounded-circle" />&nbsp;&nbsp;{{ $user->name }}</h4>




                                        </div>
                                    </div>
                                </div>



                                <div class="mt-5">
                                    <!-- <h5 class="mb-3">Specifications :</h5> -->

                                    <div class="table-responsive">
                                        <table class="table mb-0 table-bordered">
                                            <tbody>


                                                <tr>
                                                    <th scope="row">Email Address</th>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Phone Number</th>
                                                    <td>{{ isset($user['get_country']->phonecode) ? $user['get_country']->phonecode : '' }}
                                                        {{ isset($user->mobile) ? $user->mobile : 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">MPESA</th>
                                                    <td>{{ isset($user->mpesa) ? $user->mpesa : 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address</th>
                                                    <td>{{ isset($user->address) ? $user->address : 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Country</th>
                                                    <td>{{ isset($user['get_country']->name) ? $user['get_country']->name : 'N/A' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Id Card</th>
                                                    <td><img class="header-profile-user1"
                                                            src="{{ isset($user->id_card) ? url($user->id_card) : url('public/noimage.png') }}"
                                                            alt="Header Avatar"></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Profile Image</th>
                                                    <td><img class="header-profile-user1"
                                                            src="{{ isset($user->profile) ? url($user->profile) : url('public/noimage.png') }}"
                                                            alt="Header Avatar"></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end Specifications -->

                                <div class="mt-5">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Loan</th>
                                                    <th scope="row">Amount</th>
                                                    <th scope="row">Intrest Rate</th>
                                                    <th scope="row">Intrest Amount</th>
                                                    <th scope="row">Status</th>
                                                    <th scope="row">Detail</th>
                                                </tr>
                                                @forelse ($apply_loan as $key => $list)
                                                    <tr>
                                                        <td scope="row">{{ $list['get_loan']->name }}</td>
                                                        <td scope="row">
                                                            ${{ isset($list->loan_amount) ? $list->loan_amount : 'N/A' }}
                                                        </td>
                                                        <td scope="row">
                                                            {{ isset($list->intrest) ? $list->intrest : 'N/A' }}%</td>
                                                        <td scope="row">
                                                            ${{ isset($list->intrest_amount) ? $list->intrest_amount : 'N/A' }}
                                                        </td>
                                                        <td scope="row">
                                                            @if ($list->status == 1)
                                                                Pending
                                                            @elseif($list->status == 2)
                                                                Approved
                                                            @elseif($list->status == 3)
                                                                Cancelled
                                                            @else
                                                                Closed
                                                            @endif
                                                        </td>
                                                        @php
                                                            $encrypted_id = get_encrypted_value($list->id, true);
                                                        @endphp
                                                        <td scope="row"><a
                                                                href="{{ url('/admin/apply_loan/detail/' . $encrypted_id) }}"><i
                                                                    class="mdi mdi-eye text-info" data-original-title="View"
                                                                    data-toggle="tooltip" data-placement="bottom"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td style="width:100%;">No records found</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- Total Booking -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('.table_data').DataTable({
                "bFilter": false,
            });

        });
    </script>
@endsection
