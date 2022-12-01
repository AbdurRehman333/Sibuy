@extends('Merchant.layouts.master')

@section('title', 'Merchant Stats')
@section('header', 'Merchant Categories Statistics')

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
                        <h4 class="card-title">Categories Statistics</h4>
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
                                        <th>Category</th>
                                        <th>Active Deals</th>
                                        <th>Inactive Deals</th>
                                        <th>Total Purchased</th>
                                        <th>Total Revenue</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($deals as $key => $deal)
                                        
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$deal['category_name']}}</td>
                                        <td>{{$deal['active_deals']}}</td>
                                        <td>{{$deal['inactive_deals']}}</td>
                                        <td> {{$deal['total_purchase']}}</td>
                                        <td> {{$deal['total_revenue']}}</td>
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