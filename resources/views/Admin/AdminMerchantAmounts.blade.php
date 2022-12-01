@extends('Admin.layouts.master')

@section('title', 'Manage Payments')
@section('header', 'Manage Payments')

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

<!-- HTML 2 CANVAS CDN -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script>
<style>
    #photo{
        display: none;
    }
</style>
<div id="photo" style="text-align: center;margin-top:20px; margin-bottom:20px;max-width:500px;">
    <h2>Request Payment:</h2>
    <h3 id="gen_merchant">Merchant : Rathore</h3>
    <h3 id="gen_amount">Amount : $4398</h3>
    <h3 id="gen_acc_number">Bank Account: 3484298344623</h3>
    <h3 id="gen_bank">Bank : Meezan</h3>
    <h3 id="gen_currency">Currency : KHR</h3>
    <h3 id="gen_date">Request Date : Date</h3>
</div>



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

<div class="content-body" >
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Requests</h4>
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
                                        {{-- <th>Sr.No</th> --}}
                                        <th>Merchant</th>
                                        <th>Total Amount</th>
                                        <th>Withdraw</th>
                                        <th>Remaining</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="photo" data-id="1" id="photo_1">
                                        {{-- <td>1</td> --}}
                                        <td id="merchant_1">ARNR Merchant</td>
                                        <td id="acc_number_1">8000</td>
                                        <td id="bank_1">6500</td>
                                        <td id="bank_1">2500</td>
                                        {{-- <td id="currency_1">800</td>
                                        <td id="amount_1">KHR</td>
                                        <td>Hello Admin, I would like to receive my payment.</td>
                                        <td id="date_1">05 July 2022</td>
                                        <td>
                                        
                                             <a style="" class="this_anchor_for_modal_open" href="#" data-id="1"
                                                onclick="view_user(this)" data-toggle="modal"
                                                data-target="#basicModal"> <button class="btn btn-sm btn-danger"> Requested </button></a>  


                                        <td> <button class="btn btn-sm btn-success downloadBtnClass" data-id="1">Download</button></td> --}}
                                    </tr>

                                    

                                    <div class="modal fade" id="basicModal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Upload Slip</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>


                                                <form class="was-validated">
                                                    
                                                    <div class="custom-file" style="    width: 80%;
                                                    align-self: center;">
                                                      <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                                      <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                                      <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                    </div>
                                                  </form>


                                                <div class="modal-body modal_body_user" style="text-align: center;">

                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success light"
                                                        data-dismiss="modal">Release Payment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <style>
                                        .this_anchor_for_modal_open:hover{
                                            text-decoration: none;
                                            
                                        }
                                    </style>
                                    {{-- @foreach($users as $key => $user)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$user['name']}}</td>

                                      
                                        <td>{{str_replace("ago", "",
                                            \Carbon\Carbon::parse($user['date_of_birth'])->diffForHumans())}}</td>
                                        <td>{{$user['gender']}}</td>

                                        <td> {{Carbon\Carbon::parse($user['created_at'])->format('d F Y')}}</td>
                                   
                                        <td>{{$user['total_radeem']}}</td>
                                        <td>{{$user['total_deal_purchase']}}</td>
                                        <td>{{$user['phone']}}</td>
                                        <td> <a style="color: #0b2a97 !important;" href="#" data-id="{{$user['id']}}"
                                                onclick="view_user(this)" data-toggle="modal"
                                                data-target="#basicModal">View</a> </td>
                                        <td> <a class="btn btn-sm btn-info"
                                                href="{{url('AdminOpenUserChat/'.$user['id'])}}"
                                                data-id="{{$user['id']}}">Chat</a> </td>
                                    </tr>

                                    @endforeach --}}


                                    


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


        


        <script type="text/javascript">
   
            jQuery(document).ready(function(){
                jQuery(".downloadBtnClass").click(function(){
                    console.log($(this).attr("data-id"));
                    var data_id = $(this).attr("data-id");

                   



                    var merchant = document.getElementById(`merchant_${data_id}`).innerHTML;
                    var amount = document.getElementById(`amount_${data_id}`).innerHTML;
                    var bank = document.getElementById(`bank_${data_id}`).innerHTML;
                    var date = document.getElementById(`date_${data_id}`).innerHTML;
                    var acc_number = document.getElementById(`acc_number_${data_id}`).innerHTML;
                    var acc_currency = document.getElementById(`currency_${data_id}`).innerHTML;

                    var gen_merchant = document.getElementById(`gen_merchant`);
                    var gen_amount = document.getElementById(`gen_amount`);
                    var gen_bank = document.getElementById(`gen_bank`);
                    var gen_date = document.getElementById(`gen_date`);
                    var gen_acc_number = document.getElementById(`gen_acc_number`);
                    var gen_currency = document.getElementById(`gen_currency`);
                    
                    gen_merchant.innerHTML = 'Merchant : ' + merchant;
                    gen_amount.innerHTML = 'Amount : ' +  amount;
                    gen_acc_number.innerHTML = 'Bank Account: ' +  acc_number;
                    gen_bank.innerHTML = 'Bank: ' +  bank;
                    gen_date.innerHTML = 'Request Date : ' +  date;
                    gen_currency.innerHTML = 'Currency : ' +  acc_currency;
                    
                    // alert($(this).value);
                    // document.getElementById(`photo`).innerHTML();
                    document.getElementById(`photo`).style.display = 'block';
                    screenshot();
                    document.getElementById(`photo`).style.display = 'none';
                });
            });

            // jQuery(document).ready(function(){
            //     jQuery("#download").click(function(){
            //         alert();
            //         // screenshot();
            //     });
            // });
         
            function screenshot(){
                // alert(data_id);
                html2canvas(document.getElementById(`photo`)).then(function(canvas){
                   downloadImage(canvas.toDataURL(),"UsersInformation.jpg");
                });
                // html2canvas(document.getElementById(`photo_${data_id}`)).then(function(canvas){
                //    downloadImage(canvas.toDataURL(),"UsersInformation.jpg");
                // });
            }
         
            function downloadImage(uri, filename){
              var link = document.createElement('a');
              if(typeof link.download !== 'string'){
                 window.open(uri);
              }
              else{
                  link.href = uri;
                  link.download = filename;
                  accountForFirefox(clickLink, link);
              }
            }
         
            function clickLink(link){
                link.click();
            }
         
            function accountForFirefox(click){
                var link = arguments[1];
                document.body.appendChild(link);
                click(link);
                document.body.removeChild(link);
            }
         
         
         </script>
        




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