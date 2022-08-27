@extends('Merchant.layouts.master')

@section('title', 'Additional Discount')
@section('header', 'Additional Discount')

@section('content')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/tempusdominus/bootstrap-4/master/build/js/tempusdominus-bootstrap-4.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> --}}

{{-- <script type="text/javascript">
    $(function() {
       $('#datetimepicker').datetimepicker();
    });
</script>   --}}


{{-- <script>
    $( function() {
            $( "#datepicker" ).datepicker({
              // dateFormat: 'mm:dd:yyyy',
              // changeYear:true,
              // yearRange: "1960:2020"
            });  
          } );
  </script> --}}

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">



           

            <style>
  
                
                /* @media screen and (min-width: 1200px) { */
                  .class_offers{
                    display: contents;
                  }
                  .search_offers{
                    float: right;
                    /* background: red !important; */
                    
                  }
                /* } */
                @media screen and (max-width: 454px) { 
                .search_offers{
                width: 100%;
                }
                }
                </style>


                <div class="col-xl-6 col-lg-12">
                    <div class="card">

                        @if (session('alert'))
                        <div style="    text-align: -webkit-center; margin-top:2rem;">
                            <div class="alert alert-danger" style="width:60%">
                                <strong>Message: </strong> {{ session('alert') }}
                            </div>
                        </div>
                        @endif

                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible alert-alt fade show" style="margin-top:2rem;">
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                        class="mdi mdi-close"></i></span>
                            </button>
                            <strong>Success!</strong> {{ session('success') }}
                        </div>
                        @endif


                        <div class="card-header">
                            <h4 class="card-title">Set Additional Discount</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{url('SetAdditionalDiscount')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label>Select Offer</label>
                      
                                            <select class="form-control" id='type' name="deal_id">
                                              <option value="{{NULL}}">Select An Option</option>

                                              @foreach($deals['data'] as $key => $deal)
                                              <option value="{{$deal['id']}}">{{$deal['name']}}</option>
                                              @endforeach

                                              {{-- <option value="Entire Menu">Entire Menu</option>
                                              <option value="Specific Product">Specific Product</option> --}}
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Double Discount</label>
                                            <input type="text" class="form-control" name="double_discount" required placeholder="Double Discount Percentage...">
                                        </div>

                                        {{-- <div class="form-group col-md-6">
                                            <label>Double Discount</label>
                                            <input type="text" class="form-control" name="double_discount_expiry_date" required placeholder="Branch Name...">
                                        </div> --}}

                                        <div class="form-group col-md-6">
                                            <label>Expiry</label>
                                            <input style="    text-align-last: center; color:#827591;" class="form-control"
                                              aria-describedby="emailHelp" name="double_discount_expiry_date" placeholder="Expiry: MM/DD/YYYY" type="datetime-local"
                                              id="datepicker">
                                        </div>

                                        
                                    </div>

                                    <div style="    text-align: center;">
                                        <button type="submit" class="btn btn-primary">Submit For Approval</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           



        
        </div>


    </div>
</div>




</div>





@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection