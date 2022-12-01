@extends('Merchant.layouts.master')

@section('title', 'Manage Transactions')
@section('header', 'Transactions')

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
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"></script>

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
                        <h4 class="card-title">Transactions List</h4>
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

                            <style>
                                th {
                                    padding: 20px !important;
                                }
                            </style>


                            {{-- <div class="card-body">
                                <div id="gauge-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
                            </div> --}}


                            <div>
                                {{-- <h4 style="display: table-cell;">Age Filter:</h4>
                                <form action="{{url('AdminAgeFilterUsers')}}" method="GET" style="display: table-cell;">
                                    <span style="    margin-left: 14px;">Min:</span> <input name="min" type="text">
                                    <span>Max:</span> <input type="text" name="max">
                                    <input type="hidden" name="gender" value="{{$gender}}">
                                    <input type="hidden" name="fromDate" value="{{$fromDate}}">
                                    <input type="hidden" name="toDate" value="{{$toDate}}">


                                    <button class="btn btn-sm btn-info" type="submit">Search</button>
                                </form> --}}
                            </div>

                            <div style="margin-top: 10px;">
                                {{-- <h4 style="display: table-cell;">Date Filter:</h4>
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
                                </form> --}}
                            </div>

                            <table id="example123" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Select
                                            <input value="0" type="checkbox" id="checkAll" name="checkAll" class=""/>

                                        </th>
                                        <th>Deal Name</th>
                                        <th>Price</th>
                                        <th>Customer</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td style="width: 10%;"><input value="1" type="checkbox" name="check1" class="selectRow"/></td>
                                        <td>ABC User</td>
                                        <td>$800</td>
                                        <td>Requested</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10%;"><input value="2" type="checkbox" name="check1" class="selectRow"/></td>
                                        <td>ABC User</td>
                                        <td>$800</td>
                                        <td>Requested</td>
                                    </tr>


                                </tbody>
                            </table>

                            {{-- <form action="">
                                <input type="text" id="Ids">
                                <input type="text" value="0" id="SelectAll">
                            </form> --}}
                            
                            

                            <script>
                                Ids_to_send = [];
                                empty = [];

                                $("#checkAll").click(function(){
                                    $('input:checkbox').not(this).prop('checked', this.checked);


                                    Ids_to_send.splice(0,Ids_to_send.length)
                                    Ids_to_send = empty;

                                    if(document.getElementById('SelectAll').value == 0){
                                        document.getElementById('SelectAll').value = 1;

                                        var els = document.getElementsByClassName("selectRow");
                                    
                                        Array.prototype.forEach.call(els, function(el) {
                                            // Do stuff here
                                            // console.log(el);
                                            // console.log(el.value());
                                            console.log(el.value);
                                            Ids_to_send.push(el.value);
                                        });


                                    }else{
                                        document.getElementById('SelectAll').value = 0;
                                    }

                                    document.getElementById('Ids').value = Ids_to_send.toString();
                                    



                                    // if(document.getElementById('SelectAll').value == 0){
                                    //     document.getElementById('SelectAll').value = 1;
                                    // }else{
                                    //     document.getElementById('SelectAll').value = 0;
                                    // }

                                    // // Ids_to_send.splice(0,Ids_to_send.length)
                                    // // Ids_to_send = empty;
                                    // // document.getElementById('Ids').value = Ids_to_send.toString();
                                    
                                });

                                $(".selectRow").click(function(e){

                                    // var index = Ids_to_send.indexOf($(this).val());
                                    // if (index > -1) { 
                                    //     Ids_to_send.splice(index, 1); 
                                    // }else{
                                    //     Ids_to_send.push($(this).val());
                                    // }

                                    if($(this).prop("checked") == true){
                                        // console.log("Checkbox is checked.");
                                        // var index = Ids_to_send.indexOf($(this).val());
                                        // if (index > -1) { 
                                        //     Ids_to_send.splice(index, 1); 
                                        // }else{
                                            Ids_to_send.push($(this).val());
                                        // }

                                    }
                                    else if($(this).prop("checked") == false){

                                        var index = Ids_to_send.indexOf($(this).val());
                                        if (index > -1) { 
                                            Ids_to_send.splice(index, 1); 
                                        }else{
                                            // Ids_to_send.push($(this).val());
                                        }
                                        // console.log("Checkbox is unchecked.");
                                    }

                                    console.log(Ids_to_send);
                                    console.log(Ids_to_send.toString());
                                    // console.log($(this).val());

                                    document.getElementById('Ids').value = Ids_to_send.toString();
                                    // $('#Ids').val() = $(this).val();

                                });
                            </script>

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