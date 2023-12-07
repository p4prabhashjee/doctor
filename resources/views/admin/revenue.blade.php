 @extends('admin.layout.layout')
 @section('content')
     <!-- ============================================================== -->
     <!-- Start right Content here -->
     <!-- ============================================================== -->
     <style type="text/css">
         table span {
             font-weight: bold;
         }
     </style>
     <script src="{{ url('/public/admin/') }}/assets/libs/jquery/jquery.min.js"></script>
     <link href="{{ url('/public/admin/') }}/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css"
         rel="stylesheet" type="text/css">
     <script src="{{ url('/public/admin/') }}/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     <link rel="stylesheet" href="{{ url('/public/admin/') }}/assets/libs/%40chenfengyuan/datepicker/datepicker.min.css">
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
                 @if (session()->has('success'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{ session()->get('success') }}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 @endif

                 @if ($errors->any())
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         {{ $errors->first() }}
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 @endif
                 <div class="row">
                     <div class="col-12">

                         <div class="card">
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-12">
                                         <form id="search-form" method="post">
                                             <div class="row">

                                                 <div class="col-md-3">
                                                     <label for="from_date">User Name</label>
                                                     <input type="text" name="user_name" class="form-control"
                                                         palceholder="User Name">
                                                 </div>


                                                 <div class="col-md-3">
                                                     <label for="from_date">Mobile No</label>
                                                     <input type="text" name="mob_no" id="mob_no"
                                                         class="form-control" palceholder="Mobile No">
                                                 </div>



                                                 <div class="col-md-3">
                                                     <label for="from_date">Loan Status</label>
                                                     <select class="form-control" name="status">
                                                         <option value="">All</option>
                                                         <option value="1">Pending</option>
                                                         <option value="2">Aproved</option>
                                                         <option value="3">Reject</option>
                                                         <option value="4">Closed</option>
                                                     </select>
                                                 </div>

                                                 <div class="col-md-4">
                                                     <label>Apply Loan Date</label>
                                                     <div class="input-daterange input-group" id="datepicker6"
                                                         data-date-format="dd M, yyyy" data-date-autoclose="true"
                                                         data-provide="datepicker" data-date-container='#datepicker6'>
                                                         <input type="text" class="form-control" name="start"
                                                             placeholder="Start Date" />
                                                         <input type="text" class="form-control" name="end"
                                                             placeholder="End Date" />
                                                     </div>
                                                 </div>

                                                 <div class="col-md-3 col1 mt-4">
                                                     <!-- <p for="date_to"></p><br> -->
                                                     <button id="filter" class="btn btn-primary btn-fw">Apply
                                                         Filters</button>
                                                     <button class="btn btn-primary btn-fw" id="clearBtn">Reset
                                                         Filters</button>
                                                 </div>
                                             </div>
                                         </form>
                                         <div class="d-sm-flex align-items-center justify-content-between">
                                             <h4 class="mb-sm-0 font-size-18"></h4>



                                         </div>
                                     </div>
                                 </div>
                                 <div class="table-responsive">
                                     <table class="table table-bordered nowrap w-100 table_data">
                                         <thead>
                                             <tr>
                                                 <th>#</th>
                                                 <th data-orderable="false">User</th>
                                                 <th data-orderable="false">Phone</th>
                                                 <th>Loan</th>
                                                 <th>Interest rate</th>
                                                 <th>Amount</th>
                                                 <th>Interest Amount</th>
                                                 <th>Final Amount</th>
                                                 <th>Recover Amount</th>
                                                 <th>Remaining amount</th>
                                                 <th>Status</th>
                                                 <th data-orderable="false">Action</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                         </tbody>
                                         <tfoot>
                                             <tr>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td><b>Total</b></td>
                                                 <td> <b><span id ="total_amount"></span></b> </td>
                                                 <td> <b><span id ="intrest_amount"></span></b> </td>
                                                 <td> <b><span id ="final_amount"></span></b> </td>
                                                 <td> <b><span id ="recover_amount"></span></b> </td>
                                                 <td> <b><span id ="remaining_amount"></span></b> </td>
                                                 <td> </td>
                                                 <td></td>
                                             </tr>
                                         </tfoot>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div> <!-- end col -->
                 </div>
                 <!-- end row -->
             </div>
             <!-- container-fluid -->
         </div>
         <!-- End Page-content -->
         <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
         <script src="{{ url('/public/admin/') }}/assets/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>
         <script>
             $(document).ready(function() {
                 var table = $('.table_data').DataTable({
                     "bFilter": false,

                     dom: "Bfrtip",
                     buttons: ["excel"],
                     ajax: {
                         url: "{{ url('/admin/getRevenueData') }}",
                         data: function(d) {
                             d.user_name = $('input[name="user_name"]').val();
                             d.mob_no = $('input[name="mob_no"]').val();
                             d.date_from = $('input[name="start"]').val();
                             d.date_to = $('input[name="end"]').val();

                             d.status = $('select[name="status"]').val();
                         }
                     },
                     columns: [{
                             data: 'DT_RowIndex',
                             name: 'DT_RowIndex'
                         },
                         {
                             data: 'user',
                             name: 'user'
                         },
                         {
                             data: 'mobile',
                             name: 'mobile'
                         },
                         {
                             data: 'loan',
                             name: 'loan'
                         },
                         {
                             data: 'intrest',
                             name: 'intrest'
                         },
                         {
                             data: 'loan_amount',
                             name: 'loan_amount'
                         },
                         {
                             data: 'intrest_amount',
                             name: 'intrest_amount'
                         },
                         {
                             data: 'total_amount',
                             name: 'total_amount'
                         },
                         {
                             data: 'recover_amount',
                             name: 'recover_amount'
                         },
                         {
                             data: 'remaining_amount',
                             name: 'remaining_amount'
                         },
                         {
                             data: 'status',
                             name: 'status'
                         },
                         {
                             data: 'action',
                             name: 'action'
                         },

                     ],
                     "footerCallback": function(row, data, start, end, display) {
                         var api = this.api(),
                             data;
                         var intVal = function(i) {
                             return typeof i === "string" ? i.replace(/[\$,]/g, "") * 1 : typeof i ===
                                 "number" ? i : 0;
                         };

                         total_amount = api.column(5).data().reduce(function(a, b) {
                             return intVal(a) + intVal(b);
                         }, 0);
                         intrest_amount = api.column(6).data().reduce(function(a, b) {
                             return intVal(a) + intVal(b);
                         }, 0);
                         final_amount = api.column(7).data().reduce(function(a, b) {
                             return intVal(a) + intVal(b);
                         }, 0);
                         recover_amount = api.column(8).data().reduce(function(a, b) {
                             return intVal(a) + intVal(b);
                         }, 0);
                         remaining_amount = api.column(9).data().reduce(function(a, b) {
                             return intVal(a) + intVal(b);
                         }, 0);

                         $("#total_amount").html('$' + total_amount.toFixed(2));
                         $("#intrest_amount").html('$' + intrest_amount.toFixed(2));
                         $("#final_amount").html('$' + final_amount.toFixed(2));
                         $("#recover_amount").html('$' + recover_amount.toFixed(2));
                         $("#remaining_amount").html('$' + remaining_amount.toFixed(2));
                     },
                 });

                 $('#search-form').on('submit', function(e) {
                     table.draw();
                     e.preventDefault();
                 });


                 $('#filter').click(function() {
                     table.ajax.reload();
                 });

                 $('#clearBtn').click(function() {
                     $('#search-form')[0].reset();
                     table.ajax.reload();
                 });



             });
         </script>
     @endsection
