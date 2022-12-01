@extends('Admin.layouts.master')

@section('title', 'Merchant Profile')
@section('header', 'Merchant Profile')


@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12">

                <div class="card text-center border-0"
                    style="  box-shadow: none !important;  background-color: inherit;">

                    @if(Session::has('success'))
                    <p class="alert alert-success" style="    text-align-last: center;
                    "> <b>Success : </b> {{ Session::get('success') }}</p>
                    @endif

                    <div class="card-body">

                        @if($merchant['profile_picture'] == null)
                        <img style="border-radius: 50% !important;" src="{{asset('assets/images/testimonial/1.jpg')}}"
                            alt="">
                        @else
                        <img style="border-radius: 50% !important;" width="400px"
                            src="{{''.config('path.path.WebPath').''.config('path.path.UserPath').'/'.$merchant['profile_picture'].''}}"
                            alt="">
                        @endif


                        <h5 class="fs-30 font-w500 mb-1 " style="margin-top: 8px !important;"><a
                                href="{{url('AdminMerchantProfile/'.$merchant['id'])}}" class="text-black">
                                {{$merchant['name']}} </a></h5>
                        {{-- <p class="fs-21" style="color: #082073 !important; font-weight:500;">Baku, Azerbaijan</p>
                        --}}
                        <p style="margin-bottom: 0px;"> {{$merchant['phone']}} - {{$merchant['email']}} </p>
                        <p style="margin-bottom: 0px;"> Lahore - Pakistan </p>
                        <p style="margin-bottom: 0px;"> Street#32, Block#O, Gulberg. </p>

                        <div class="d-flex align-items-center justify-content-center" style="    margin-bottom: 15px;">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.09569 20C4.80437 19.9988 4.51677 19.9344 4.25273 19.8113C3.98868 19.6881 3.75447 19.5091 3.56624 19.2866C3.37801 19.0641 3.24024 18.8034 3.16243 18.5225C3.08462 18.2415 3.06862 17.9471 3.11554 17.6593L3.88905 12.8902L0.569441 9.45986C0.312024 9.19466 0.132451 8.86374 0.0503661 8.50328C-0.0317185 8.14282 -0.0131526 7.76671 0.104033 7.4161C0.221219 7.06549 0.43251 6.75388 0.714792 6.51537C0.997074 6.27685 1.33947 6.12062 1.70453 6.06376L6.20048 5.37325L8.18158 1.13817C8.34755 0.796915 8.60606 0.509234 8.92762 0.307978C9.24917 0.106721 9.6208 0 10.0001 0C10.3793 0 10.751 0.106721 11.0725 0.307978C11.3941 0.509234 11.6526 0.796915 11.8186 1.13817L13.7931 5.36719L18.2955 6.06376C18.6606 6.12062 19.003 6.27685 19.2852 6.51537C19.5675 6.75388 19.7788 7.06549 19.896 7.4161C20.0132 7.76671 20.0318 8.14282 19.9497 8.50328C19.8676 8.86374 19.688 9.19466 19.4306 9.45986L16.1144 12.8765L16.885 17.66C16.9463 18.0327 16.9014 18.4152 16.7556 18.7635C16.6097 19.1119 16.3687 19.4121 16.0602 19.6297C15.7517 19.8473 15.3882 19.9735 15.0113 19.994C14.6344 20.0144 14.2593 19.9281 13.9292 19.7451L10.0026 17.5635L6.07117 19.7451C5.77302 19.9118 5.43724 19.9996 5.09569 20Z"
                                    fill="#FFAA29" />
                            </svg>
                            <span
                                style="color: #082073 !important; font-size:30px !important; font-weight:500 !important;"
                                class="fs-35 d-block ml-2 pr-2 mr-2 border-right text-black font-w500">{{
                                round($merchant['averageRating'], 2) }}</span>
                            <a href="{{url('AdminMerchantReviews/'.$merchant['id'])}}"
                                class="btn-link fs-14">Ratings</a>
                        </div>
                        <p>Merchant ID: {{$merchant['id']}}</p>

                        {{-- <button class="btn btn-primary"><span> <a style="color: white !important;"
                                    href="{{url('AdminEditMerchant/'.$merchant['id'])}}">Edit</a> </span></button> --}}

                        <div style="    text-align: -webkit-center; margin-top:2rem;">
                            {{-- <span>
                                <button class="btn btn-primary"><span> <a style="color: white !important;"
                                            href="{{url('AdminEditMerchant/'.$merchant['id'])}}">Edit</a>
                                    </span></button>
                            </span> --}}
                            <span class='button_chat'>
                                <a class="chat_open_anchor" href="{{url('AdminchatWithMerchant/'.$merchant['id'])}}">
                                    <button class="btn btn-info btn_top_open_chat" data-id="{{$merchant['id']}}"
                                        style="padding: 15px;font-size: 16px;">
                                        <i class="fa fa-envelope" aria-hidden="true"></i> Open Chat </button>
                                </a>
                            </span>


                            @if($merchant['status'] == 1)
                            <span class=''>
                                <a class="" href="{{url('InactiveMerchant/'.$merchant['id'])}}">
                                    <button class="btn btn-danger " data-id="{{$merchant['id']}}"
                                        style="padding: 15px;font-size: 16px;">
                                        Disable Merchant </button>
                                </a>
                            </span>
                            @else
                            <span class=''>
                                <a class="" href="{{url('ActiveMerchant/'.$merchant['id'])}}">
                                    <button class="btn btn-danger " data-id="{{$merchant['id']}}"
                                        style="padding: 15px;font-size: 16px;">
                                        Enable Merchant </button>
                                </a>
                            </span>
                            @endif
                            

                            <span class=''>
                                <a class="" href="#">
                                    <button class="btn btn-success " data-id="{{$merchant['id']}}"
                                        style="padding: 15px;font-size: 16px;" data-toggle="modal"
                                        data-target="#basicModal">
                                        Commission Settings </button>
                                </a>
                            </span>

                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Payment Settings</h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>

                                        {{-- <div class="modal-body">Modal body text goes here.</div> --}}
                                        <div class="modal-footer">
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <form method="POST" action="{{url('SetMerchantCommission')}}">
                                                        @csrf
                                                        <div class="form-group" style="display: flex;">
                                                            <input type="number" name="monthly_charges" class="form-control input-default"
                                                                placeholder="Monthly Subscription Charge">
                                                                <span style="    place-self: center;
                                                                font-size: 25px;
                                                                visibility:hidden;
                                                                /* position: unset; */
                                                                margin-left: 2px;">%</span>
                                                        </div>
                                                        <div class="form-group" style="display: flex;">
                                                            <input type="number" step="0.1" name="admin_after_redeem_percentage" min="0" max="100" class="form-control input-rounded"
                                                                placeholder="Admin Commission On Redeemed Sale ( % )">
                                                                <span style="    place-self: center;
                                                                font-size: 25px;
                                                                /* position: unset; */
                                                                margin-left: 2px;">%</span>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <input type="text" class="form-control input-rounded"
                                                                placeholder="Merchant Commission On Redeemed Sale ( % )">
                                                        </div> --}}
                                                        <div class="form-group" style="display: flex;">
                                                            <input type="number" step="0.1" name="admin_before_redeem_percentage" min="0" max="100" class="form-control input-rounded"
                                                                placeholder="Admin Commission On Unredeemed Sale ( % )">
                                                                <span style="    place-self: center;
                                                                font-size: 25px;
                                                                /* position: unset; */
                                                                margin-left: 2px;">%</span>
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <input type="text" class="form-control input-rounded"
                                                                placeholder="Merchant Commission On Unedeemed Sale ( % )">
                                                        </div> --}}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light"
                                                data-dismiss="modal">Close</button>

                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        </div>



                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>




                    {{-- contacts_to_load --}}

                    {{-- <ul class="contacts contacts_to_load">

                        @foreach ($conversations as $c)
                        <li class="active dz-chat-user convo_list_item" data-id="{{$c['id']}}">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img" alt="" />
                                </div>
                                <div class="user_info">
                                    <span>{{$c['opposite_user']['name']}}</span>
                                    <p>{{ substr($c['last_message']['message'], 0 ,40) }}...</p>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul> --}}

                    {{--
                    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                    {{-- <script src="{{asset('js/app.js')}}"></script> --}}

                    {{-- <script>
                        $(".btn_top_open_chat").click(function(e) {
                                // id = $(this).attr("data-id");
                                // console.log(id);
                
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                var id = $(this).attr("data-id");
                                // console.log(id);
                                $.ajax({
                                    type: 'POST',
                                    url: "{{ route('AdminchatWithMerchant') }}",
                                    data: {
                                        merchant_id: id
                                    },
                                    dataType: 'html',
                                    success: function(data) {
                                        // console.log(data);

                                        // console.log(document.getElementById('contacts_to_load'));
                                        contacts_to_load = document.getElementById('contacts_to_load');
                                        // console.log(contacts_to_load);
                                        $("#contacts_to_load").empty();
                                        $('#contacts_to_load').html(data);
                
                                        // var convo_id_loaded = document.getElementById('convo_id').value;
                                        // var receiver_id_loaded = document.getElementById('rec_id').value;
                                        // var my_id_loaded = document.getElementById('my_id').value;
            
                                        // console.log(convo_id_loaded);
                                        // console.log(receiver_id_loaded);
                                        // console.log(my_id_loaded);
            
                                        // var element = document.getElementById('new_convo');
                                        // element.value = convo_id_loaded;
                                        // var element = document.getElementById('new_rec');
                                        // element.value = receiver_id_loaded;
                                        // var element = document.getElementById('new_my_id');
                                        // element.value = my_id_loaded;
                                    }
                                });
            
                                // $.ajax({
                                //     type: 'POST',
                                //     url: "{{ route('loadConvo_forDashboards_Header') }}",
                                //     data: {
                                //         convo_id: id
                                //     },
                                //     dataType: 'html',
                                //     success: function(data) {
                                //         // console.log(data);
                                //         $("#this_content_change_on_load").empty();
                                //         $('#this_content_change_on_load').html(data);
                                //     }
                                // });
                            });
                    </script> --}}









                    <div style="display: flex;
                    align-self: center;">

                        <div style="margin:10px;">
                            <div style="color: #082073; font-size:30px; font-weight:500;">{{$merchant['activeOffers']}}
                            </div>
                            <div>Active Offers</div>
                        </div>

                        <span style="font-size: 37px;">|</span>

                        <div style="margin:10px;">
                            <div style="color: #082073; font-size:30px; font-weight:500;">{{$merchant['dealRadeems']}}
                            </div>
                            <div>Coupons Redeemed</div>
                        </div>

                        <span style="font-size: 37px;">|</span>

                        <div style="margin:10px;">
                            <div style="color: #082073; font-size:30px; font-weight:500;">
                                {{$merchant['totalCategories']}}</div>
                            <div>Categories</div>
                        </div>

                    </div>

                </div>

            </div>


            <div class="container-fluid">
                <div class="row">


                    <div class="col-xl-12 col-xxl-12">
                        <div class="row">

                            {{-- <div class="col-sm-4">


                                <div class="card" style=" box-shadow: none !important;  background-color: inherit;">
                                    <div class="card-body">

                                        <img style="border-radius: 50% !important;" width="90px"
                                            src="{{asset('assets/images/testimonial/1.jpg')}}" alt="">
                                        <h5 class="fs-16 font-w500 mb-1" style="font-size: 15px !important;"><a
                                                href="app-profile.html" class="text-black">Roberto Carloz</a></h5>
                                        <p class="fs-14"
                                            style="font-size: 13px !important; color:blue !important;font-weight:500;">
                                            10th
                                            Street, Baku, Azerbaijan</p>
                                        <p style="margin-top: -16px;
                                                        margin-bottom: 7px;">Merchant ID: 40042</p>
                                        <p style="margin-top: -15px !important;color:blue !important;"> <span
                                                style="font-size:13px;">
                                                +123456789 </span> | <span style="font-size:13px;"> email@domain.com
                                            </span></p>

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
                                    <a href="{{url('AdminMerchantProfile/'.$deal['merchant_id'])}}">
                                        <img class="rounded mr-3 mb-md-0 mb-3"
                                            src="{{''.config('path.path.WebPath').''.config('path.path.DealsPath').'/'.$deal['image']['image'].''}}"
                                            alt="" width="120">
                                        {{-- <img class="rounded mr-3 mb-md-0 mb-3"
                                            src="{{asset('assets/images/testimonial/1.jpg')}}" alt="" width="120"> --}}

                                    </a>
                                    <div class="media-body col-lg-8 pl-0">
                                        <h6 class="fs-16 font-w600"><a href="{{url('OfferDetails/'.$deal['id'])}}"
                                                class="text-black">{{$deal['name']}}</a></h6>


                                        <p class="fs-14">{{$deal['description']}}</p>
                                        <div class="">

                                            @php
                                            // $percentage_to_pay = 100 - $deal['discount_on_price'];
                                            $price_to_pay = $deal['price'] - ($deal['price'] *
                                            ($deal['discount_on_price'] / 100) )
                                            @endphp

                                            <div class="media-body">


                                                @if($deal['type'] == 'Entire Menu')

                                                <span class="fs-14 text-primary font-w500"
                                                    style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                                    Entire Menu </span>


                                                {{-- @if($deal['additional_discount'] && $result)
                                                <span class="badge light badge-danger"
                                                    style="margin-left: 8px !important;float: right !important;">
                                                    {{$deal['additional_discount']}}% off</span> --}}
                                                {{-- @endif --}}


                                                {{-- <span class="badge light badge-primary"
                                                    style="margin-left: 8px !important;float: right !important;">
                                                    {{$deal['discount_on_price']}}% off</span> --}}


                                                @else


                                                {{-- @if($deal['additional_discount'] && $result)


                                                <span class="fs-14 text-primary font-w500"
                                                    style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                                    <del>{{$deal['price']}}Azn</del> </span>

                                                <span class="fs-14 text-primary font-w500"
                                                    style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                                    <del> {{$price_to_pay}}Azn</del>
                                                </span>
                                                <span class="fs-14 text-primary font-w500"
                                                    style="font-size:1rem !important;">

                                                    @php
                                                    $price_to_pay_in_double_discount = $deal['price'] - ($deal['price']
                                                    * ($deal['additional_discount'] / 100) )
                                                    @endphp

                                                    {{$price_to_pay_in_double_discount}}Azn

                                                </span>



                                                @else --}}

                                                <span class="fs-14 text-primary font-w500"
                                                    style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">

                                                    ${{$deal['price']}} </span>

                                                {{-- <span class="fs-14 text-primary font-w500"
                                                    style="font-size:1rem !important;">
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
                                                {{-- <span class="fs-14 text-primary font-w500"
                                                    style="font-size:1rem !important;">
                                                    {{$percentage_to_pay}}%
                                                </span> --}}
                                                {{-- <span class="badge light badge-primary"
                                                    style="margin-left: 8px !important;float: right !important;">
                                                    {{$deal['discount_on_price']}}% off</span> --}}
                                                @endif

                                            </div>


                                            </ul>

                                            <div>
                                                <span class="" style="color:#0B2A97 !important;">
                                                    {{$deal['totalRadeem']}} Redeemed / {{$deal['totalPurchase']}}
                                                    Available
                                                </span>
                                            </div>
                                            @if($deal['status'] == 0)
                                            <div style="    text-align: -webkit-center;
                                                        margin-top: 10px;"> <a
                                                    href="{{'AdminEditOffer/'.$deal['id']}}">


                                                    <button class="btn btn-primary"> <span>Edit</span>
                                                    </button>



                                                </a> </div>
                                            @endif


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
                @if(count($deals) <= 0) @else <div>
                    {{$deals->links()}}
            </div>
            @endif


        </div>




    </div>


</div>

{{-- <style>
    .pagination {
        place-content: center;
    }
</style>
<div>
    {{$deals->links()}}
</div> --}}



</div>






@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection