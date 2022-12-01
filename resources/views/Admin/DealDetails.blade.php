@extends('Admin.layouts.master')

@section('title', 'Admin Deals')
@section('header', 'Deal Details')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12 col-xxl-12">
                {{-- @if(Session::has('success'))
                <p class="alert alert-success" style="    text-align-last: center;
                ">{{ Session::get('success') }}</p>
                @endif --}}

                @if(Session::has('alert'))
                <p class="alert alert-danger" style="    text-align-last: center;
                ">{{ Session::get('alert') }}</p>
                @endif
                <div class="row">


                    

                    <div class="col-sm-6">
                        {{-- <img src="{{asset('assets/images/dummy_coupon.jpg')}}" style="border-radius: 10px;" width="100%" alt=""> --}}
                        <img src="{{''.config('path.path.WebPath').''.config('path.path.DealsPath').'/'.$deal['images'][0]['image'].''}}" style="border-radius: 10px;" width="100%" height="500px" alt="">

                        <div style="margin-top:2rem;">
                            <span><strong>Tags : </strong></span>
                            @foreach($deal['tags'] as $key => $tag)
                            <button class="btn btn-sm btn-outline-primary" >{{$tag['tag']}}</button>
                            @endforeach
                            {{-- <button class="btn btn-sm btn-outline-primary" >Mens</button>
                            <button class="btn btn-sm btn-outline-primary" >Health & Fitness</button> --}}
                        </div>

                    </div>
                    <div class="col-sm-6">

                        @if($deal['status'] == 2)
                        <div>
                            <p class="btn btn-sm btn-danger"> This Deal was Rejected/Stopped by Admin  </p>
                        </div>
                        @endif
                        
                        {{-- <p><strong> Title : </strong> {{$deal['name']}}</p>
                        <p><strong> Category : </strong> {{$deal['category_name']}} </p>
                        <p><strong> Discount : </strong> {{$deal['discount']}}% OFF </p>
                        <p><strong> Price : </strong> {{$deal['price']}} </p>
                        <p><strong> Actual Price : </strong> {{$deal['actual_price']}} </p>
                        <p><strong> After Discount : </strong> {{$deal['after_discount']}} </p>
                        <p><strong> Merchant : </strong> {{$deal['merchant_name']}} </p>
                        <p><strong> Valid Till : </strong> {{$deal['expiry']}} </p>
                        <p><strong> Description :  </strong> {{$deal['description']}} </p> --}}

                        <p><strong> Title : </strong> {{$deal['name']}}</p>
                        {{-- <p><strong> Category : </strong> {{$deal['category_name']}}</p> --}}
                        <p><strong> Discount : </strong> {{$deal['discount']}}% OFF </p>
                        {{-- <p><strong> Type : </strong> {{$deal['type']}} </p> --}}
                        <p><strong> Deal Price : </strong> {{$deal['price']}} </p>
                        {{-- <p><strong> Actual Price : </strong> {{$deal['actual_price']}} </p> --}}
                        {{-- <p><strong> After Discount : </strong> {{$deal['after_discount']}} </p> --}}
                        {{-- <p><strong> Merchant : </strong> {{$deal['merchant_name']}} </p> --}}
                        <p><strong> Deal Expiry Date : </strong> {{$deal['expiry']}} </p>
                        
                        {{-- //Statics  --}}
                        <p><strong> Deal Sale Till :  </strong> 22-09-2023 </p>
                        <p><strong> Deals Available :  </strong> 580 </p>

                        <p><strong> Description :  </strong> {{$deal['description']}} </p>



                        {{-- @if($deal['additional_discount'])
                        <button style="margin-left: 10px;" class="btn btn-sm btn-danger">Double Discount : {{$deal['additional_discount']}}% OFF</button>
                        <button style="margin-left: 10px;" class="btn btn-sm btn-danger">Valid Till :
                            {{Carbon\Carbon::parse($deal['additional_discount_date'])->format('d/m/Y')}}
                            
                            
                            </button>
                        @endif --}}

                        {{-- <p><strong> Merchant : <a href="{{url('AdminMerchantProfile/'.$deal['merchant_id'])}}" style="color: #0B2A97">
                            <strong>
                                {{$deal['merchant_id']}}</strong> </a> </strong></p> --}}

                        

                    </div>


                </div>
                

                


                {{-- <div style="margin-top: 5rem;">
                    <h2>Branches for this Deal</h2>
                </div>
                <hr> --}}

                {{-- <div class="row" style="margin-top: 5rem;">

                    
                    @foreach($deal['branches'] as $branch)
                    <div class="col-sm-6">
                        <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                            <a href="#">
                         
                               <img class="rounded mr-3 mb-md-0 mb-3" src="{{''.config('path.path.WebPath').''.config('path.path.BranchesPath').'/'.$branch['logo'].''}}" style="border-radius: 10px;" alt="" width="120">

                                
                                </a>
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

         
                </div> --}}

                {{-- @if($deal['status'] == 0) --}}
                <div style="    text-align: center;">
                    <span style="    text-align-last: center;"> <a class="btn btn-info" href="{{url('AdminEditOffer/'.$deal['id'])}}">Edit Deal</a> </span>


                    @if($deal['status'] == 2)
                    <span style="    text-align-last: center;"> <a type="button"  href="{{url('AdminAcceptDeal/'.$deal['id'])}}" class="btn btn-success">Activate Deal</a> </span>
                    @else
                    <span style="    text-align-last: center;"> <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#basicModal">Stop Deal</a> </span>
                    @endif

                    {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#basicModal">Stop Deal</button> --}}

                </div>
                <!-- Modal -->
                <div class="modal fade" id="basicModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">

                                <form action="{{url('AdminRejectDeal',['id' => $deal['id']])}}" method="POST">
                                    @csrf
                                    <div class="form-group">
    
                                        <input type="hidden" name="deal_id" class="form-control" id="{{$deal['id']}}_id_modal" value="{{$deal['id']}}">
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
                            {{-- <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> --}}

                           

                            
                            
                        </div>
                    </div>
                </div>

                {{-- @endif --}}
                

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