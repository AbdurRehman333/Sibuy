@extends('Admin.layouts.master')

@section('title', 'Admin Deals')
@section('header', 'Rejected/Stopped Deals')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12 col-xxl-12">
                <div class="row">


                    @foreach($deals as $deal)

                        @php
                        $now = Carbon\Carbon::now();
                        $expiry = $deal['additional_discount_date'];
                        $result = $now->lt($expiry);
                        @endphp

                    <div class="col-sm-6">
                        <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                            <a href="{{url('AdminMerchantProfile/'.$deal['merchant_id'])}}">
                                {{-- <img class="rounded mr-3 mb-md-0 mb-3"
                                    src="{{asset('assets/images/testimonial/1.jpg')}}" alt="" width="120"> --}}

                                <img class="rounded mr-3 mb-md-0 mb-3" src="{{''.config('path.path.WebPath').''.config('path.path.DealsPath').'/'.$deal['image']['image'].''}}" alt="" width="120">
                                
                                </a>
                            <div class="media-body col-lg-8 pl-0">
                                <h6 class="fs-16 font-w600"><a href="{{url('OfferDetails/'.$deal['id'])}}"
                                        class="text-black">{{$deal['name']}}</a></h6>

                                        
                                <p class="fs-14">{{$deal['description']}}</p>

                                @if($deal['reject_reason'])
                                <p class="fs-14"><b>Reject Reason : </b>{{$deal['reject_reason']}}</p>
                                @endif
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


                                        {{-- @if($deal['additional_discount'] && $result)
                                        <span class="badge light badge-danger"
                                        style="margin-left: 8px !important;float: right !important;">
                                        {{$deal['additional_discount']}}% off</span>
                                        @endif
                                        

                                        <span class="badge light badge-primary"
                                            style="margin-left: 8px !important;float: right !important;">
                                            {{$deal['discount_on_price']}}% off</span> --}}


                                        @else

                                            {{-- @if($deal['additional_discount'] && $result)


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



                                                @else --}}

                                                <span class="fs-14 text-primary font-w500"
                                                style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">

                                                ${{$deal['price']}} </span>

                                                {{-- <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                                    {{$price_to_pay}}Azn
                                                </span> --}}

                                                {{-- @endif --}}



                                                {{-- @if($deal['additional_discount'] && $result)
                                                <span class="badge light badge-danger"
                                                style="margin-left: 8px !important;float: right !important;">
                                                {{$deal['additional_discount']}}% off</span>
                                                @endif --}}

                                            {{-- <span class="fs-14 text-primary font-w500"
                                                style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                                <del>100%</del> </span> --}}
                                            {{-- <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                                {{$percentage_to_pay}}%
                                            </span> --}}
                                            {{-- <span class="badge light badge-primary"
                                                style="margin-left: 8px !important;float: right !important;">
                                                {{$deal['discount_on_price']}}% off</span> --}}
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
                                        <span class="" style="color:#0B2A97 !important;"> {{$deal['totalRadeem']}} Redeemed / {{$deal['totalPurchase']}} Available
                                        </span>
                                    </div>

                                    {{-- <span style="    text-align-last: center;"> <a type="button"  href="{{url('AdminAcceptDeal/'.$deal['id'])}}" class="btn btn-success">Activate Deal</a> </span> --}}

                                    <div style="    text-align: -webkit-center;
                                                margin-top: 10px;"> <a href="{{url('AdminAcceptDeal/'.$deal['id'])}}">

                                     {{-- @if($deal['status'] == 0) --}}
                                     <button class="btn btn-success"> <span>Activate</span>
                                     </button>
                                     {{-- @endif --}}
                                            

                                    </a> </div>


                                    <div style="    text-align: -webkit-center;
                                                margin-top: 10px;"> <a href="{{'AdminEditOffer/'.$deal['id']}}">

                                                    @if($deal['status'] == 0)
                                                    <button class="btn btn-primary"> <span>Edit</span>
                                                    </button>
                                                    @endif
                                            

                                        </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>



        </div>
        <style>
            .pagination {
                place-content: center;
            }
        </style>
        @if(count($deals) <= 0)
        @else
        <div>
            {{$deals->links()}}
        </div>
        @endif
        

    </div>




</div>






@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection