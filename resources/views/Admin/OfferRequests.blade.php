@extends('Admin.layouts.master')

@section('title', 'Admin Manage Requests')
@section('header', 'Offer Requests')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12 col-xxl-12">
                <div class="row">

                    {{-- <div class="col-sm-4">


                        <div class="card" style=" box-shadow: none !important;  background-color: inherit;">
                            <div class="card-body" style="align-self: center">

                                <img style="border-radius: 50% !important;" width="90px"
                                    src="{{asset('assets/images/testimonial/1.jpg')}}" alt="">
                                <h5 class="fs-16 font-w500 mb-1" style="font-size: 15px !important;"><a
                                        href="app-profile.html" class="text-black">Roberto Carloz</a></h5>
                                <p class="fs-14"
                                    style="font-size: 13px !important; color:blue !important;font-weight:500;">10th
                                    Street, Baku, Azerbaijan</p>
                                <p style="margin-top: -16px;
                                                margin-bottom: 7px;">Merchant ID: 40042</p>
                                <p style="margin-top: -15px !important;color:blue !important;"> <span
                                        style="font-size:13px;">
                                        +123456789 </span> | <span style="font-size:13px;"> email@domain.com </span></p>

                            </div>
                            <div class="effect bg-success"></div>


                        </div>


                    </div> --}}
                    @foreach($deals as $deal)

                        @php
                        $now = Carbon\Carbon::now();
                        $expiry = $deal['additional_discount_date'];
                        $result = $now->lt($expiry);
                        @endphp


                        <div class="col-sm-6">
                            <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                                <a href="{{url('OfferDetails/'.$deal['id'])}}">
                                    {{-- <img class="rounded mr-3 mb-md-0 mb-3"
                                        src="images/menus/5.png" alt="" width="120"> --}}
                                        <img class="rounded mr-3 mb-md-0 mb-3" src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.DealsPath').'/'.$deal['image']['image'].''}}" alt="" width="120">
                                    
                                    </a>


                                <div class="media-body col-lg-8 pl-0">
                                    <h6 class="fs-16 font-w600"><a href="{{url('OfferDetails/'.$deal['id'])}}"
                                            class="text-black" >{{$deal['name']}}</a>
                                        
                                            @if($deal['additional_discount'] && $result)
                                            <button style="margin-left: 10px;" class="badge badge-sm badge-danger">Double Discount Request</button>
                                            {{-- <button style="margin-left: 10px;" class="badge badge-sm badge-info">Valid Till : {{$deal['additional_discount_date']}}</button> --}}

                                            @else
                                            <button style="margin-left: 10px;" class="badge badge-sm badge-primary">New Offer Request</button>
                                            @endif
                                        </h6>


                                    <p class="fs-14">{{$deal['description']}}</p>

                                    
                                    <div class="">

                                        @php
                                            // $percentage_to_pay = 100 - $deal['discount_on_price'];

                                            $price_to_pay = $deal['price'] - ($deal['price'] * ($deal['discount_on_price'] / 100) )

                                        @endphp

                                        <div class="media-body">


                                            @if($deal['type'] == 'Entire Menu')
                                                
                                                <span class="fs-14 text-primary font-w500"
                                                style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                                Entire Menu </span>


                                                @if($deal['additional_discount'] && $result)
                                                <span class="badge light badge-danger"
                                                style="margin-left: 8px !important;float: right !important;">
                                                {{$deal['additional_discount']}}% off</span>
                                                @endif
                                                

                                                <span class="badge light badge-primary"
                                                    style="margin-left: 8px !important;float: right !important;">
                                                    {{$deal['discount_on_price']}}% off</span>


                                            @else

                                                @if($deal['additional_discount'] && $result)


                                                <span class="fs-14 text-primary font-w500"
                                                style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                                <del>{{$deal['price']}}Azn</del> </span>

                                                <span class="fs-14 text-primary font-w500" style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                                <del> {{$price_to_pay}}Azn</del>
                                                </span>
                                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                                    
                                                    @php
                                                        $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) )
                                                    @endphp

                                                    {{$price_to_pay_in_double_discount}}Azn

                                                </span>



                                                @else

                                                <span class="fs-14 text-primary font-w500"
                                                style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">

                                                <del>{{$deal['price']}}Azn</del> </span>

                                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                                    {{$price_to_pay}}Azn
                                                </span>

                                                @endif


                                                @if($deal['additional_discount'] && $result)
                                                <span class="badge light badge-danger"
                                                style="margin-left: 8px !important;float: right !important;">
                                                {{$deal['additional_discount']}}% off</span>
                                                @endif
                                                

                                                <span class="badge light badge-primary"
                                                    style="margin-left: 8px !important;float: right !important;">
                                                    {{$deal['discount_on_price']}}% off</span>

                                            @endif

                                        </div>


                                        <ul class="d-flex flex-wrap mb-sm-0 mb-2">
                                            <span class="" style=""> Merchant : <a
                                                    href="{{url('AdminMerchantProfile/'.$deal['merchant_id'])}}"
                                                    style="color: #0B2A97">
                                                    <strong>
                                                        {{$deal['merchant_name']}}</strong> </a> </span>
                                        </ul>

                                        <div>
                                            {{-- <span class="" style="color:#0B2A97 !important;"> 44 Redeemed / 266 Available
                                            </span> --}}
                                        </div>


                                        <div style="    text-align-last: center; margin-top:1rem;">
                                            <a href="{{url('AdminAcceptDeal/'.$deal['id'])}}">
                                                <button style="width:30% !important;font-size:12px;" type="button"
                                                    class="btn btn-success btns_here">Approve</button>
                                            </a>
                          
                                            <a href="#">
                                                <button onclick="declineClick(this)" data-id="{{$deal['id']}}"
                                                    style="width:30% !important;font-size:12px;color: white;background-color:#d90a0afa !important;"
                                                    type="button" class="btn btn-dange btns_herer" data-toggle="modal"
                                                    data-target="#basicModal{{$deal['id']}}">Decline</button>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>


                        <style>
                            @media only screen and (max-width: 600px) {
                                .btns_here {
                                 width: 30%;
                                }
                            }
                        </style>




                        <!-- Modal -->
                        <div class="modal fade" id="basicModal{{$deal['id']}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reason To Reject</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('AdminRejectDeal',['id' => $deal['id']])}}" method="POST">
                                            @csrf
                                            <div class="form-group">

                                                <input type="hidden" class="form-control"id="{{$deal['id']}}_id_modal" value="{{$deal['id']}}">
                                                <label for=""> Reason : </label>
                                                <input type="text" class="form-control" name="reject_reason">


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>

                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        {{-- <div class="modal fade" id="InfoModal{{$deal['id']}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Deal Info</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                 
                                        <div style="margin-top: 5px;"> <strong>Name: </strong> {{$deal['name']}} </div>
                                        <div style="margin-top: 5px;"> <strong>Discount: </strong> {{$deal['discount']}}% </div>
                                        <div style="margin-top: 5px;"> <strong>Type: </strong> {{$deal['type']}} </div>
                                        <div style="margin-top: 5px;"> <strong>Price: </strong> {{$deal['price']}} </div>
                                        <div style="margin-top: 5px;"> <strong>Actual Price: </strong> {{$deal['actual_price']}} </div>
                                        <div style="margin-top: 5px;"> <strong>After Discount: </strong> {{$deal['after_discount']}} </div>
                                        <div style="margin-top: 5px;"> <strong>Category: </strong> {{$deal['category_id']}} </div>
                                        <div style="margin-top: 5px;"> <strong>Description: </strong> {{$deal['description']}} </div>



                                    </div>

                                </div>
                            </div>
                        </div> --}}

                    @endforeach

                </div>
            </div>


        </div>
    </div>

    <script>
        function declineClick(arg)
        {
            id = parseInt(arg.getAttribute('data-id'));
            document.getElementById(`${id}_id_modal`).value = id;
            document.getElementById(`${id}_id_modal`).innerHTML = id;
        }
    </script>




</div>






@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection