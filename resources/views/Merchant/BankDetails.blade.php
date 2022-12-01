@extends('Merchant.layouts.master')

@section('title', 'Payments')
@section('header', 'Bank Details')

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
        // dom: 'Bfrtip',
        // buttons: [
        //             'excel',
        //             'csv',
        //             'pdf',
        //         ],
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
                        <h4 class="card-title">Your Bank Details</h4>
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
                              
                            </div>

                            <div style="margin-top: 10px;">
                             
                            </div>

                            <table id="example123" class="display min-w850">
                                <thead>
                                    <tr>
                                        {{-- <th>Sr.No</th> --}}
                                        <th>Account Name</th>
                                        <th>Account Type</th>
                                        <th>Bank</th>
                                        <th>Account Number</th>
                                        <th>Account Currency</th>
                                        <th>Card Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        {{-- <td>1</td> --}}
                                        <td>Mr. ABC</td>
                                        <td>Savings</td>
                                        <td>Meezan Bank</td>
                                        <td>8446241365412534</td>
                                        <td>KHR</td>
                                        <td>8425634456326434</td>
                                        <td> <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"
                                            href="#" >Edit</a> </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                   

                        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Bank Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         

            <form>
                <div class="form-group">
                  <label for="exampleFormControlFile1">File Upload : </label>
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                  <br>
                  <label for=""> Account Number : </label>
                  <input type="text" class="form-control" placeholder="Account Number">
                  <br>
                  {{-- <input type="text" class="form-control" placeholder="Reason"> --}}
                  <label for=""> Currency : </label>
                  <select name="" class="form-control" id="">
                    <option value="">USD</option>
                    <option value="">KHR</option>
                  </select>
                    <br>
                    <label for=""> Reason : </label>
                  <input type="text" class="form-control" placeholder="Reason">

                </div>
              </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit For Approval</button>
        </div>
      </div>
    </div>
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