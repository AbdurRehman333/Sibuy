@extends('Merchant.layouts.master')

@section('title', 'Merchant Offers')
@section('header', 'Offers')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12 col-xxl-12">

                <div class="row">

                    <div class="col-sm-6">
                        <img src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.DealsPath').'/'.$deal['images'][0]['image'].''}}" style="border-radius: 10px;" width="100%" alt="">

                        <div style="margin-top:2rem;">
                            {{-- <span><strong>Tags : </strong></span> --}}
                            <div style="margin-top:2rem;">
                                <span><strong>Tags : </strong></span>
                                @foreach($deal['tags'] as $key => $tag)
                                <button class="btn btn-sm btn-outline-primary" >{{$tag['tag']}}</button>
                                @endforeach
                                {{-- <button class="btn btn-sm btn-outline-primary" >Mens</button>
                                <button class="btn btn-sm btn-outline-primary" >Health & Fitness</button> --}}
                            </div>
                            {{-- <button class="btn btn-sm btn-outline-primary" >Mens</button>
                            <button class="btn btn-sm btn-outline-primary" >Health & Fitness</button> --}}
                        </div>

                    </div>
                    <div class="col-sm-6">
                        
                        <p><strong> Title : </strong> {{$deal['name']}}</p>
                        {{-- <p><strong> Category : </strong> {{$deal['category_name']}}</p> --}}
                        <p><strong> Discount : </strong> {{$deal['discount']}}% OFF </p>
                        <p><strong> Type : </strong> {{$deal['type']}} </p>
                        <p><strong> Price : </strong> {{$deal['price']}} </p>
                        <p><strong> Actual Price : </strong> {{$deal['actual_price']}} </p>
                        <p><strong> After Discount : </strong> {{$deal['after_discount']}} </p>
                        <p><strong> Merchant : </strong> {{$deal['merchant_name']}} </p>
                        <p><strong> Valid Till : </strong> {{$deal['expiry']}} </p>
                        <p><strong> Description :  </strong> {{$deal['description']}} </p>


                        @if($deal['additional_discount'])
                        <button style="margin-left: 10px;" class="btn btn-sm btn-danger">Double Discount : {{$deal['additional_discount']}}% OFF</button>
                        <button style="margin-left: 10px;" class="btn btn-sm btn-danger">Valid Till : 
                            {{Carbon\Carbon::parse($deal['additional_discount_date'])->format('d/m/Y')}}
                            
                            {{-- {{$deal['additional_discount_date']}} --}}
                        </button>


                        @endif

                        {{-- <p><strong> Merchant : <a href="{{url('AdminMerchantProfile/'.$deal['merchant_id'])}}" style="color: #0B2A97">
                            <strong>
                                {{$deal['merchant_id']}}</strong> </a> </strong></p> --}}

                        

                    </div>


                </div>
                

                


                <div style="margin-top: 5rem;">
                    <h2>Branches for this Deal</h2>
                </div>
                <hr>

                <div class="row" style="margin-top: 5rem;">

                    
                    @foreach($deal['branches'] as $branch)
                    <div class="col-sm-6">
                        <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                            <a href="ecom-product-detail.html"><img class="rounded mr-3 mb-md-0 mb-3"
                                    src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.BranchesPath').'/'.$branch['logo'].''}}" alt="" width="120"></a>
                            <div class="media-body col-lg-8 pl-0">
                                <h6 class="fs-16 font-w600"><a href="#" class="text-black">{{$branch['name']}}</a></h6>
                                <p class="fs-14">{{$branch['city']}}, {{$branch['country']}}</p>

                                <p class="fs-14">{{$branch['description']}}</p>
                                <div class="">

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="col-sm-6">
                        <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                            <a href="ecom-product-detail.html"><img class="rounded mr-3 mb-md-0 mb-3"
                                    src="{{asset('assets/images/testimonial/1.jpg')}}" alt="" width="120"></a>
                            <div class="media-body col-lg-8 pl-0">
                                <h6 class="fs-16 font-w600"><a href="{{url('OfferDetails/'.$deal['id'])}}" class="text-black">Branch Name</a></h6>
                                <p class="fs-14">City, Country</p>

                                <p class="fs-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sint ipsum nulla doloribus quis voluptatum asperiores in! Consequatur, quis doloribus?</p>
                                <div class="">

                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

                @if($deal['status'] == 0)
                <div>
                    <p style="    text-align-last: center;"> <a class="btn btn-info" href="{{url('AdminEditOffer/'.$deal['id'])}}">Edit Deal</a> </p>
                </div>
                @endif
                

            </div>


        </div>
        {{-- <style>
            .pagination{
                place-content: center;
            }
        </style>
        <div>
            {{$deals->links()}}
        </div> --}}

    </div>




</div>






@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection