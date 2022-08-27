@extends('Admin.layouts.master')

@section('title', 'Admin Statistics')
@section('header', 'Statistics')

@section('content')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"></script>

<script>
    jQuery(document).ready(function($) {
      $('#example123').DataTable(
        {
        dom: 'Bfrtip',
        buttons: [
                    'excel',
                    'csv',
                    'pdf',
                ],
        }
      );
     
    } );
    </script>

    <script>
        // var minDate, maxDate;
 
        // // Custom filtering function which will search data in column four between two values
        // $.fn.dataTable.ext.search.push(
        //     function( settings, data, dataIndex ) {
        //         var min = minDate.val();
        //         var max = maxDate.val();
        //         var date = new Date( data[4] );
        
        //         if (
        //             ( min === null && max === null ) ||
        //             ( min === null && date <= max ) ||
        //             ( min <= date   && max === null ) ||
        //             ( min <= date   && date <= max )
        //         ) {
        //             return true;
        //         }
        //         return false;
        //     }
        // );
        
        // $(document).ready(function() {
        //     // Create date inputs
        //     minDate = new DateTime($('#min'), {
        //         format: 'MMMM Do YYYY'
        //     });
        //     maxDate = new DateTime($('#max'), {
        //         format: 'MMMM Do YYYY'
        //     });
        
        //     // DataTables initialisation
        //     var table = $('#example').DataTable();
        
        //     // Refilter the table
        //     $('#min, #max').on('change', function () {
        //         table.draw();
        //     });
        // });
    </script>

<style>
    .dt-button{
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

<script>
    // var className = $('#sidebar div:eq(14)'s
    var all = document.getElementsByClassName('dataTables_filter')
    for (var i = 0; i < all.length; i++) {
        // all[i].
        // $(all[i]).css("background-color","red");
        // all[i].style.background = "blue";

    }
    //  $(".dataTables_filter");
    // console.log(all);
</script>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Deals Statistics</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            {{-- <div>
                                <h3 style="display: table-cell;">Age Filter:</h3>
                                <form action="{{url('AdminAgeFilterUsers')}}" method="GET" style="display: table-cell;">
                                    <span style="    margin-left: 14px;">Min:</span> <input name="min" type="text">
                                    <span>Max:</span> <input type="text" name="max">
                                    <button class="btn btn-sm btn-info" type="submit">Search</button>
                                </form>
                            </div> --}}

                            <table id="example123" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Name</th>
                                        <th>Merchant</th>
                                        {{-- <th>Gender</th> --}}
                                        <th>Launch date</th>
                                        <th>Category </th>
                                        <th>Total Purchased </th>
                                        <th>Coupon Redeemed </th>
                                        <th>Total Reviews </th>
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($deals as $key => $deal)
                                        
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$deal['name']}}</td>
                                        <td>{{$deal['merchant_name']}}</td>
                                        {{-- <td>{{str_replace("ago", "", \Carbon\Carbon::parse($user['date_of_birth'])->diffForHumans())}}</td> --}}
                                        {{-- <td>{{$user['gender']}}</td> --}}
                                        
                                        <td> {{Carbon\Carbon::parse($deal['created_at'])->format('d F Y')}}</td>
                                        <td> {{$deal['category_name']}}</td>
                                        
                                        <td>{{$deal['totalPurchase']}}</td>
                                        <td>{{$deal['totalRadeem']}}</td>
                                        <td>{{$deal['totalReviews']}}</td>
                                        {{-- <td>{{$user['phone']}}</td> --}}
                                        {{-- <td> <a style="color: #0b2a97 !important;" href="#" data-id="{{$user['id']}}" onclick="view_user(this)" data-toggle="modal" data-target="#basicModal">View</a> </td> --}}
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
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body modal_body_user" style="text-align: center;">  
 
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </tbody>
                            </table>
                        </div>
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