@extends('Admin.layouts.master')

@section('title', 'Manage Customers')
@section('header', 'Manage Customers')

@section('content')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" charset="utf8"
    src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js">
</script>
{{-- <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"></script> --}}

<script>
    jQuery(document).ready(function($) {
      $('#example123').DataTable(
        {
        // dom: 'Bfrtip',
        // buttons: [
        //             'excel',
        //             'csv',
        //             'pdf',
        //         ],
        }
      );
      $('#ToExportUsers').DataTable(
        {
        dom: 'B',
        buttons: [
                    'excel',
                    'csv',
                    'pdf',
                ],
        }
      );
     
    } );
</script>


<style>
    .dt-button {
        display: inline-block;
        color: #fff;
        margin-top: 1.5em;
        margin-right: 0.5em;
        text-align: center;
        padding: 0.7em;
        border: none;
        border-radius: 4px;
        box-shadow: 2px 2px 4px rgb(0 0 0 / 40%);
        text-decoration: none !important;
        cursor: pointer;
        font-size: 1em;
        border-radius: 11px;
        padding: 6px;
        background: #a8a8cf;
    }

    dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: #fff !important;
        background: #ccc !important;
    }

    .paginate_button {
        background: #ccc !important;
    }
</style>

{{-- <script>
    // var className = $('#sidebar div:eq(14)'s
    var all = document.getElementsByClassName('dataTables_filter')
    for (var i = 0; i < all.length; i++) {
        // all[i].
        // $(all[i]).css("background-color","red");
        // all[i].style.background = "blue";

    }
    //  $(".dataTables_filter");
    // console.log(all);
</script> --}}

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users List</h4>
                    </div>


                    <script>
                        $( function() {
                          $( "#datepicker" ).datepicker();
                        } );
                        $( function() {
                          $( "#datepicker1" ).datepicker();
                        } );
                    </script>


                    <div class="card-body">
                        <div class="table-responsive">

                            {{-- <style>
                                th {
                                    padding: 20px !important;
                                }
                            </style> --}}


                            {{-- <div class="card-body">
                                <div id="gauge-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                            </div> --}}


                            <div>
                                <h4 style="display: table-cell;">Age Filter:</h4>
                                <form action="{{url('AdminAgeFilterUsers')}}" method="GET" style="display: table-cell;">
                                    <span style="    margin-left: 14px;">Min:</span> <input name="min" type="text">
                                    <span>Max:</span> <input type="text" name="max">
                                    <input type="hidden" name="gender" value="{{$gender}}">
                                    <input type="hidden" name="fromDate" value="{{$fromDate}}">
                                    <input type="hidden" name="toDate" value="{{$toDate}}">


                                    <button class="btn btn-sm btn-info" type="submit">Search</button>
                                </form>
                            </div>

                            
                            
                            <div style="margin-top: 10px;">
                                <h4 style="display: table-cell;">Date Filter:</h4>
                                <form action="{{url('AdminDateFilterUsers')}}" method="GET"
                                    style="display: table-cell;">
                                    <span style="    margin-left: 14px;">From:</span>
                                    <input id="datepicker" name="min_date" type="text">
                                    <input type="hidden" name="gender" value="{{$gender}}">

                                    <input type="hidden" name="fromAge" value="{{$fromAge}}">
                                    <input type="hidden" name="toAge" value="{{$toAge}}">
                                    <span>To:</span>
                                    <input type="text" name="max_date" id="datepicker1">
                                    <button class="btn btn-sm btn-info" type="submit">Search</button>
                                </form>
                            </div>

                            <style>
                                #ToExportUsers{
                                    display: none;
                                }
                                .dt-buttons{
                                    margin-bottom: 28px;
                                }
                            </style>
                            <table id="ToExportUsers" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Contact Number </th>
                                        <th>Age</th>
                                        <th style="width: 81.5312px;">Gender</th>
                                        <th style="width: 81.5312px;">Promo Code</th>
                                        {{-- {{-- <th>Bank Name</th> --}}
                                        {{-- <th>Bank Account#</th> --}}
                                        <th>Join Date</th>
                                        {{-- <th>Discount Availed </th> --}}
                                        <th>Coupon Redeemed </th>
                                        <th>Total Purchases </th>
                                        {{-- <th>View</th> --}}
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $key => $user)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user['name']}}</td>
                                        <td>{{$user['phone']}}</td>
                                       
                                        <td>{{str_replace("ago", "",
                                            \Carbon\Carbon::parse($user['date_of_birth'])->diffForHumans())}}</td>
                                        <td>{{$user['gender']}}</td>
                                        <td>{{$user['promo_code']}}</td>

                                        {{-- <td>Meezan Bank</td>
                                        <td>894862134562143</td> --}}

                                        {{-- <td>{{$user['created_at']}}</td> --}}
                                        <td> {{Carbon\Carbon::parse($user['created_at'])->format('d F Y')}}</td>
                                        {{-- <td>01 February 2022</td> --}}
                                        {{-- <td>$250(S)</td> --}}
                                        <td>{{$user['total_radeem']}}</td>
                                        <td>{{$user['total_deal_purchase']}}</td>
                                        
                                        {{-- <td> <a style="color: #0b2a97 !important;" href="#" data-id="{{$user['id']}}"
                                                onclick="view_user(this)" data-toggle="modal"
                                                data-target="#basicModal">View</a> </td>
                                        <td> <a class="btn btn-sm btn-info"
                                                href="{{url('AdminOpenUserChat/'.$user['id'])}}"
                                                data-id="{{$user['id']}}">Chat</a> 


                                                <a class="btn btn-sm btn-danger"
                                                href="#"
                                                >Disable</a> 
                                            
                                            
                                            </td> --}}
                                    </tr>

                                    @endforeach


                                    <script>
                                        function view_user(arg)
                                        {
                                            // console.log(arg.getAttribute('data-id'));
                                            user_id = arg.getAttribute('data-id');
                                            
                                            $.ajax({
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                    "user_id": user_id,
                                                    },
                                                url: "{{ route('load_user_for_admin') }}",
                                                type: "POST",
                                                dataType: 'html',
                                                success: function (data) {
                                                    console.log(data);

                                                    myGreeting(data);
                                                    // const myTimeout = setTimeout(myGreeting(data), 1000);
                                                },
                                                error: function (data) {
                                                    console.log('Error:', data);
                                                }
                                            });
                                            
                                        }
                                    </script>

                                    <script>
                                        function myGreeting(data) {
                                                $(".modal_body_user").html(data);
                                            }
                                    </script>

                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">User Details</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body modal_body_user" style="text-align: center;">

                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </tbody>
                            </table>



                            <table id="example123" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Contact Number </th>
                                        {{-- <th>Age</th> --}}
                                        <th style="width: 81.5312px;">Gender</th>
                                        {{-- <th>Bank Name</th>
                                        <th>Bank Account#</th> --}}
                                        <th>Join Date</th>
                                        {{-- <th>Discount Availed </th> --}}
                                        <th>Coupon Redeemed </th>
                                        <th>Total Purchases </th>
                                        <th>View</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $key => $user)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user['name']}}</td>
                                        <td>{{$user['phone']}}</td>
                                       
                                        {{-- <td>{{str_replace("ago", "",
                                            \Carbon\Carbon::parse($user['date_of_birth'])->diffForHumans())}}</td> --}}
                                        <td>{{$user['gender']}}</td>

                                        {{-- <td>Meezan Bank</td>
                                        <td>894862134562143</td> --}}

                                        {{-- <td>{{$user['created_at']}}</td> --}}
                                        <td> {{Carbon\Carbon::parse($user['created_at'])->format('d F Y')}}</td>
                                        {{-- <td>01 February 2022</td> --}}
                                        {{-- <td>$250(S)</td> --}}
                                        <td>{{$user['total_radeem']}}</td>
                                        <td>{{$user['total_deal_purchase']}}</td>
                                        
                                        <td> <a style="color: #0b2a97 !important;" href="#" data-id="{{$user['id']}}"
                                                onclick="view_user(this)" data-toggle="modal"
                                                data-target="#basicModal">View</a> </td>
                                        <td> <a class="btn btn-sm btn-info"
                                                href="{{url('AdminOpenUserChat/'.$user['id'])}}"
                                                data-id="{{$user['id']}}">Chat</a> 


                                                <a class="btn btn-sm btn-danger"
                                                href="#"
                                                >Disable</a> 
                                            
                                            
                                            </td>
                                    </tr>

                                    @endforeach


                                    <script>
                                        function view_user(arg)
                                        {
                                            // console.log(arg.getAttribute('data-id'));
                                            user_id = arg.getAttribute('data-id');
                                            
                                            $.ajax({
                                                data: {
                                                    "_token": "{{ csrf_token() }}",
                                                    "user_id": user_id,
                                                    },
                                                url: "{{ route('load_user_for_admin') }}",
                                                type: "POST",
                                                dataType: 'html',
                                                success: function (data) {
                                                    console.log(data);

                                                    myGreeting(data);
                                                    // const myTimeout = setTimeout(myGreeting(data), 1000);
                                                },
                                                error: function (data) {
                                                    console.log('Error:', data);
                                                }
                                            });
                                            
                                        }
                                    </script>

                                    <script>
                                        function myGreeting(data) {
                                                $(".modal_body_user").html(data);
                                            }
                                    </script>

                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">User Details</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body modal_body_user" style="text-align: center;">

                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </tbody>
                            </table>
                        </div>

                        {{-- <div class="card-body">
                            <div id="pie_chart_for_user_percentage" class="ct-chart ct-golden-section chartlist-chart">
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>







        {{-- <div class="row">
            <div class="col-xl-4 col-xxl-8">




            </div>

        </div> --}}

    </div>





</div>






@endsection

@section('scripts')
<script src="{{asset('assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/datatables.init.js')}}"></script>
@endsection