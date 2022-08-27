@extends('Merchant.layouts.master')

@section('title', 'Merchant Statistics')
@section('header', 'Sales Statistics')

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

            responsive: true,
 
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],     // page length options
   

            dom: 'lBfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        });
     
    } );
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


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Purchase Deals Statistics</h4>
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

                            <script>
                                $( function() {
                                  $( "#datepicker" ).datepicker();
                                } );
                                $( function() {
                                  $( "#datepicker1" ).datepicker();
                                } );
                                </script>
                                    <div style="margin-top: 10px;">
                                        <h4 style="display: table-cell;">Date Filter:</h4>
                                        <form action="{{url('MerchantDateFilterTotalSales')}}" method="GET" style="display: table-cell;">
                                            <span style="    margin-left: 14px;">From:</span> 
                                            <input id="datepicker" name="min_date" type="text">
        
                                            <span>To:</span> 
                                            <input type="text" name="max_date" id="datepicker1">
                                            <button class="btn btn-sm btn-info" type="submit">Search</button>
                                        </form>
                                    </div>

                            <style>
                                .dataTables_length{
                                    display:contents;
                                }
                            </style>

                            <table id="example123" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        {{-- <th>Name</th>
                                        <th>User Email</th> --}}
                                        <th>Gender</th>
                                        <th>Deal</th>
                                   
                                        <th>Time of Redeem </th>
                                        <th>Time of Purchase </th>
                                        <th>Deal Actual Price </th>
                                        <th>Discount on Deal </th>
                                
                                        <th>User Purchase Amount </th>
                                   
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($deals as $key => $deal)
                                        
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        {{-- <td>{{$deal['user_name']}}</td>
                                        <td>{{$deal['user_email']}}</td> --}}
                                        <td>{{$deal['user_gender']}}</td>
                                        <td> <a href="{{url('Offer/'.$deal['deal_id'])}}">{{$deal['deal_name']}}</a> </td>
          
                                        @if($deal['time_of_radeem'] !== null)
                                        <td> {{Carbon\Carbon::parse($deal['time_of_radeem'])->format('d F Y')}}</td>
                                        @else
                                        <td> Not Yet </td>
                                        @endif
                                        <td> {{Carbon\Carbon::parse($deal['time_of_purchase'])->format('d F Y')}}</td>
                                        <td> {{$deal['deal_actual_price']}}Azn</td>
                                        <td> {{$deal['discount_on_deal']}}%</td>
                               
                                        <td> {{$deal['user_purchase_amount']}}Azn</td>


                                    </tr>

                                    @endforeach

                                    

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