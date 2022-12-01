@extends('Merchant.layouts.master')

@section('title', 'Merchant Deals')
@section('header', 'Voucher Deals')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">


            <style>
                /* @media screen and (min-width: 1200px) { */
                .class_offers {
                    display: contents;
                }

                .search_offers {
                    float: right;
                    /* background: red !important; */

                }

                /* } */
                @media screen and (max-width: 454px) {
                    .search_offers {
                        width: 100%;
                    }
                }
            </style>


            <div class="col-xl-9 col-xxl-8">
                <div>

                    <h1 class="class_offers">All Offers</h1>

                    {{-- <div class="search_offers input-group search-area d-xl-inline-flex">


                        <div class="input-group-append">
                            <span class="input-group-text"><a href="javascript:void(0)"><i
                                        class="flaticon-381-search-2"></i></a></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search here...">



                    </div> --}}


                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius!</p>


                <div>
                    
                    <a style="text-decoration: none;" href="{{ URL('ShowActiveOffers')}}">
                        <span class="btn btn-rounded btn-success">Active Deals</span>
                    </a>

                    <a style="text-decoration: none;" href="{{ URL('ShowInactiveOffers')}}">
                        <span class="btn btn-rounded btn-warning">Inactive Deals</span>
                    </a>

                </div>


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




                @foreach($offers as $offer)


                @php
                    $now = Carbon\Carbon::now();
                    $expiry = $offer['additional_discount_date'];
                    $result = $now->lt($expiry);
                @endphp
                                        
                <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list" style="margin-top: 2rem;">
                    <a href="#">

                        {{-- <div>
                            @php
                            $image =json_decode($offer['image']);
                            @endphp
        
                        </div> --}}

                        {{-- @if(array_key_exists('image' , $offer)) --}}
                            {{-- @if($image) --}}
                            <img class="rounded mr-3 mb-md-0 mb-3"
                            src="{{''.config('path.path.WebPath').''.config('path.path.DealsPath').'/'.$offer['image']['image'].''}}" alt=""
                            width="120">
                            {{-- @endif --}}
                        {{-- @endif --}}
                       
                    </a>
         


                    <div class="media-body col-lg-8 pl-0">
                        <h6 class="fs-16 font-w600"><a href="{{url('Offer/'.$offer['id'])}}" class="text-black">
                                {{$offer['name']}} </a> 

                                @if($offer['status'] == 0)
                                {{-- <span style="color: #b37b7d">( Pending ) </span>  --}}
                                <span class="badge badge-secondary" style="float:right;">Pending</span>
                                @endif
                                @if($offer['status'] == 1)
                                {{-- <span style="color: #b37b7d">( Pending ) </span>  --}}
                                <span class="badge badge-success" style="float:right;">Approved</span>
                                @endif

                            </h6>
                        <p class="fs-14">{{$offer['description']}}</p>
                        <div class="">

                            @php
                                // $percentage_to_pay = 100 - $offer['discount_on_price'];
                                $price_to_pay = $offer['price'] - ($offer['price'] * ($offer['discount_on_price'] / 100) )
                            @endphp


                            <div class="media-body">

                                @if($offer['type'] == 'Entire Menu')
                                                
                                <span class="fs-14 text-primary font-w500"
                                style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                Entire Menu </span>


                                {{-- @if($offer['additional_discount'] && $result)
                                <span class="badge light badge-danger"
                                style="margin-left: 8px !important;float: right !important;">
                                {{$offer['additional_discount']}}% off</span>
                                @endif
                                

                                <span class="badge light badge-primary"
                                    style="margin-left: 8px !important;float: right !important;">
                                    {{$offer['discount_on_price']}}% off</span> --}}


                                @else

                                            {{-- @if($offer['additional_discount'] && $result)


                                            <span class="fs-14 text-primary font-w500"
                                            style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                            <del>{{$offer['price']}}Azn</del> </span>

                                            <span class="fs-14 text-primary font-w500" style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                               <del> {{$price_to_pay}}Azn</del>
                                            </span>
                                            <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                                
                                                @php
                                                    $price_to_pay_in_double_discount = $offer['price'] - ($offer['price'] * ($offer['additional_discount'] / 100) )
                                                @endphp

                                                {{$price_to_pay_in_double_discount}}Azn

                                            </span>



                                            @else --}}

                                            <span class="fs-14 text-primary font-w500"
                                            style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">

                                            ${{$offer['price']}} </span>

                                            {{-- <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                                {{$price_to_pay}}Azn
                                            </span> --}}

                                            {{-- @endif --}}



                                            {{-- @if($offer['additional_discount'] && $result)
                                            <span class="badge light badge-danger"
                                            style="margin-left: 8px !important;float: right !important;">
                                            {{$offer['additional_discount']}}% off</span>
                                            @endif --}}

                                        {{-- <span class="fs-14 text-primary font-w500"
                                            style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                            <del>100%</del> </span> --}}
                                        {{-- <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                            {{$percentage_to_pay}}%
                                        </span> --}}
                                        {{-- <span class="badge light badge-primary"
                                            style="margin-left: 8px !important;float: right !important;">
                                            {{$offer['discount_on_price']}}% off</span> --}}
                                @endif
                            </div>
                            {{-- <ul class="d-flex flex-wrap mb-sm-0 mb-2">
                                <span class="" style=""> Baku, Azerbaijan</span>
                            </ul> --}}
                            <div>
                                <span class="" style="color:#0B2A97 !important;"> {{$offer['totalRadeem']}} Redeemed / {{$offer['totalPurchase']}} Available
                                </span>
                            </div>
                            @if($is_Inactive == 0)
                            <div style="    text-align: -webkit-center;  margin-top: 10px;">


                                {{-- @if($offer['status'] == 0) --}}
                                <a style="text-decoration: none;" href="{{ URL('MerchantEditOffer/'.$offer['id'])}}">

                                    <button class="btn btn-primary">
                                        <span style="color:#efe8e8">Edit</span>
                                    </button>
                                </a>
                                {{-- @endif --}}

                               
                                <a style="text-decoration: none;" href="{{ URL('MerchantInActiveOffer/'.$offer['id'])}}">

                                    <button class="btn btn-info">
                                        <span style="color:#efe8e8">InActive</span>
                                    </button>
                                </a>
                            </div>
                            @else
                            <div style="    text-align: -webkit-center;  margin-top: 10px;">

                                <a style="text-decoration: none;" href="{{ URL('MerchantActivateOffer/'.$offer['id'])}}">

                                    <button class="btn btn-success">
                                        <span style="color:#efe8e8">Activate</span>
                                    </button>
                                </a>

                            </div>
                            @endif
                        </div>
                    </div>
                    {{-- --}}
                </div>


                @endforeach


                <style>
                    .flex-1 {
                        display: none;
                    }

                    /* .text-sm{
                                   display: none;
                                } */
                    .w-5 {
                        width: 24px;
                    }
                </style>

                <div style="margin-bottom: 20px;    text-align: center;">{{$offers->links()}}</div>

                {{-- <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list" style="margin-top: 2rem;">
                    <a href="#"><img class="rounded mr-3 mb-md-0 mb-3" src="images/menus/5.png"
                            alt="" width="120"></a>
                    <div class="media-body col-lg-8 pl-0">
                        <h6 class="fs-16 font-w600"><a href="#" class="text-black">Papaya
                                Fruit
                                for Vitamin C</a></h6>
                        <p class="fs-14">Lorem ipsuolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip</p>
                        <div class="">
                            <div class="media-body">
                                <span class="fs-14 text-primary font-w500"
                                    style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                    <del>100%</del> </span>
                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                    80%
                                </span>
                                <span class="badge light badge-primary"
                                    style="margin-left: 8px !important;float: right !important;"> 29% off</span>
                            </div>
                            <ul class="d-flex flex-wrap mb-sm-0 mb-2">
                                <span class="" style=""> Baku, Azerbaijan</span>
                            </ul>
                            <div>
                                <span class="" style="color:#0B2A97 !important;"> 44 Redeemed / 266 Available
                                </span>
                            </div>
                            <div style="    text-align: -webkit-center;
                                                margin-top: 10px;"> <button class="btn btn-primary"> <span>Edit</span>
                                </button> </div>
                        </div>
                    </div>
                </div>

                <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list" style="margin-top: 2rem;">
                    <a href="#"><img class="rounded mr-3 mb-md-0 mb-3" src="images/menus/5.png"
                            alt="" width="120"></a>
                    <div class="media-body col-lg-8 pl-0">
                        <h6 class="fs-16 font-w600"><a href="#" class="text-black">Papaya
                                Fruit
                                for Vitamin C</a></h6>
                        <p class="fs-14">Lorem ipsuolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip</p>
                        <div class="">
                            <div class="media-body">
                                <span class="fs-14 text-primary font-w500"
                                    style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                    <del>100%</del> </span>
                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                    80%
                                </span>
                                <span class="badge light badge-primary"
                                    style="margin-left: 8px !important;float: right !important;"> 29% off</span>
                            </div>
                            <ul class="d-flex flex-wrap mb-sm-0 mb-2">
                                <span class="" style=""> Baku, Azerbaijan</span>
                            </ul>
                            <div>
                                <span class="" style="color:#0B2A97 !important;"> 44 Redeemed / 266 Available
                                </span>
                            </div>
                            <div style="    text-align: -webkit-center;
                                                margin-top: 10px;"> <button class="btn btn-primary"> <span>Edit</span>
                                </button> </div>
                        </div>
                    </div>
                </div>

                <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list" style="margin-top: 2rem;">
                    <a href="#"><img class="rounded mr-3 mb-md-0 mb-3" src="images/menus/5.png"
                            alt="" width="120"></a>
                    <div class="media-body col-lg-8 pl-0">
                        <h6 class="fs-16 font-w600"><a href="#" class="text-black">Papaya
                                Fruit
                                for Vitamin C</a></h6>
                        <p class="fs-14">Lorem ipsuolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip</p>
                        <div class="">
                            <div class="media-body">
                                <span class="fs-14 text-primary font-w500"
                                    style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                    <del>100%</del> </span>
                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                    80%
                                </span>
                                <span class="badge light badge-primary"
                                    style="margin-left: 8px !important;float: right !important;"> 29% off</span>
                            </div>
                            <ul class="d-flex flex-wrap mb-sm-0 mb-2">
                                <span class="" style=""> Baku, Azerbaijan</span>
                            </ul>
                            <div>
                                <span class="" style="color:#0B2A97 !important;"> 44 Redeemed / 266 Available
                                </span>
                            </div>
                            <div style="    text-align: -webkit-center;
                                                margin-top: 10px;"> <button class="btn btn-primary"> <span>Edit</span>
                                </button> </div>
                        </div>
                    </div>
                </div>

                <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list" style="margin-top: 2rem;">
                    <a href="#"><img class="rounded mr-3 mb-md-0 mb-3" src="images/menus/5.png"
                            alt="" width="120"></a>
                    <div class="media-body col-lg-8 pl-0">
                        <h6 class="fs-16 font-w600"><a href="#" class="text-black">Papaya
                                Fruit
                                for Vitamin C</a></h6>
                        <p class="fs-14">Lorem ipsuolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip</p>
                        <div class="">
                            <div class="media-body">
                                <span class="fs-14 text-primary font-w500"
                                    style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                    <del>100%</del> </span>
                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                    80%
                                </span>
                                <span class="badge light badge-primary"
                                    style="margin-left: 8px !important;float: right !important;"> 29% off</span>
                            </div>
                            <ul class="d-flex flex-wrap mb-sm-0 mb-2">
                                <span class="" style=""> Baku, Azerbaijan</span>
                            </ul>
                            <div>
                                <span class="" style="color:#0B2A97 !important;"> 44 Redeemed / 266 Available
                                </span>
                            </div>
                            <div style="    text-align: -webkit-center;
                                                margin-top: 10px;"> <button class="btn btn-primary"> <span>Edit</span>
                                </button> </div>
                        </div>
                    </div>
                </div> --}}

                {{--
            </div> --}}


            {{--
        </div> --}}
    </div>




    <div class="col-xl-4 col-xxl-4" >



            {{-- <div class="card text-white bg-primary" style="height: 450px;">
                <div class="card-header">
                    <h5 class="card-title text-white">Most Trending Categories</h5>
                </div>

                <div style="margin-top:1rem;" class="card-body mb-0">
                    @foreach($topCats as $key => $index)
                    <span id="">{{$key}}</span> <span style="float: right;" id="">{{$index}} Coupons</span>
                    <hr>
                    @endforeach
     
                </div>    
                
            </div> --}}



        <div>
            {{-- <div class="card text-white bg-primary">
                <div class="card-header">
                    <h5 class="card-title text-white">Most Trending Categories</h5>
                </div>

                <div style="margin-top:1rem;" class="card-body mb-0">
                    @foreach($topCats as $key => $index)
                    <span id="">{{$key}}</span> <span style="float: right;" id="">{{$index}} Coupons</span>
                    <hr>
                    @endforeach
     
                </div>    

            </div> --}}
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