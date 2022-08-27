@extends('Admin.layouts.master')

@section('title', 'Manage Merchants')
@section('header', 'Manage Merchants')


@section('content')


        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">


                    @foreach($merchants as $merchant)


                    <div class="col-sm-6">
                        <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                            <a href="{{url('AdminMerchantProfile/'.$merchant['id'])}}">
                                
                                {{-- <img class="rounded mr-3 mb-md-0 mb-3"
                                    src="images/menus/5.png" alt="" width="120"></a> --}}

                                @if($merchant['profile_picture'] == null)
                                <img 
                                    src="{{asset('assets/images/testimonial/1.jpg')}}" alt="">
                                @else
                                <img 
                                    src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.UserPath').'/'.$merchant['profile_picture'].''}}" width="130px" alt="">
                                @endif

                            <div class="media-body col-lg-8 pl-0" style="    margin-left: 12px;
                            ">
                                <h6 class="fs-16 font-w600"><a href="{{url('AdminMerchantProfile/'.$merchant['id'])}}"
                                        class="text-black" >{{$merchant['name']}}</a></h6>
                                {{-- <p class="fs-14">{{$merchant['description']}}</p> --}}
                                <div class="">

                                    {{-- <div class="media-body">
                                        <span class="fs-14 text-primary font-w500"
                                            style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                            <del>100%</del> </span>
                                        <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                            80%
                                        </span>
                                        <span class="badge light badge-primary"
                                            style="margin-left: 8px !important;float: right !important;">
                                            {{$merchant['discount']}}% off</span>

                                    </div> --}}


                                    {{-- <ul class="d-flex flex-wrap mb-sm-0 mb-2">
                                        <span class="" style=""> Merchant : <a
                                                href="#"
                                                style="color: #0B2A97">
                                                <strong>
                                                    xx</strong> </a> </span>
                                    </ul> --}}

                                    <style>
                                        .aprove_decline{
                                            width: 30% !important;
                                        }

                                        @media only screen and (max-width: 850px) {
                                        .infomerchant {
                                            font-size: 10px;
                                        }
                                        .aprove_decline{
                                            width: 32% !important;
                                        }
                                        }
                                    </style>

                                    <div style="" class="infomerchant">
                                        <span class="" style="color:#0B2A97 !important;"> {{$merchant['phone']}} / {{$merchant['email']}}
                                        </span>
                                    </div>

                                    {{-- <div style="    text-align: -webkit-center;
                                                margin-top: 10px;"> <button class="btn btn-primary"> <span>Edit</span>
                                        </button> </div> --}}

                                    {{-- <div style="    text-align-last: center; margin-top:1rem;">
                                        <a href="{{url('AdminAcceptDeal2/'.$merchant['id'])}}">
                                            <button style="width:30% !important;font-size:12px;" type="button"
                                                class="btn btn-success">Approve</button>
                                        </a>
                       
                                        <a href="#">
                                            <button style="width:30% !important;font-size:12px;background-color:#d90a0afa !important;"
                                                type="button" class="btn btn-danger" >Decline</button>
                                        </a>
                                    </div> --}}

                                </div>

                                <div style="text-align-last: center; margin-top:1rem;">
                                    <a href="{{url('changeStatusOfMerchantAccept/'.$merchant['id'])}}">
                                        <button style="font-size:12px;" type="button"
                                            class="btn btn-success aprove_decline">Approve</button>
                                    </a>
                   
                                    <a href="{{url('changeStatusOfMerchantDecline/'.$merchant['id'])}}">
                                        <button style="font-size:12px;background-color:#d90a0afa !important;"
                                            type="button" class="btn btn-danger aprove_decline" >Decline</button>
                                    </a>
                                </div>

                            </div>

                            

                        </div>

                    </div>

                    <!-- Modal -->
                    {{-- <div class="modal fade" id="basicModal{{$merchant['id']}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Reason To Reject</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('AdminRejectDeal',['id' => $merchant['id']])}}" method="POST">
                                        @csrf
                                        <div class="form-group">

                                            <input type="hidden" class="form-control"id="{{$merchant['id']}}_id_modal" value="{{$merchant['id']}}">
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
                    </div> --}}

                    <!-- Modal -->
                    {{-- <div class="modal fade" id="InfoModal{{$merchant['id']}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Deal Info</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                             
                                    <div style="margin-top: 5px;"> <strong>Name: </strong> {{$merchant['name']}} </div>
                                    <div style="margin-top: 5px;"> <strong>Discount: </strong> {{$merchant['discount']}}% </div>
                                    <div style="margin-top: 5px;"> <strong>Type: </strong> {{$merchant['type']}} </div>
                                    <div style="margin-top: 5px;"> <strong>Price: </strong> {{$merchant['price']}} </div>
                                    <div style="margin-top: 5px;"> <strong>Actual Price: </strong> {{$merchant['actual_price']}} </div>
                                    <div style="margin-top: 5px;"> <strong>After Discount: </strong> {{$merchant['after_discount']}} </div>
                                    <div style="margin-top: 5px;"> <strong>Category: </strong> {{$merchant['category_id']}} </div>
                                    <div style="margin-top: 5px;"> <strong>Description: </strong> {{$merchant['description']}} </div>



                                </div>

                            </div>
                        </div>
                    </div> --}}

                @endforeach



                </div>

                <div>
                    <style>
                        .pagination{
                            place-content: center;
                        }
                    </style>
                    {{$merchants->links()}}
                </div>

            </div>





        </div>






@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>
@endsection