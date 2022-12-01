@extends('Admin.layouts.master')

@section('title', 'Manage Merchants')
@section('header', 'Manage Merchants')


@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">








            <div class="col-xl-12 col-xxl-8">

                <div class="card-header d-sm-flex d-block pb-0 border-0" style="    margin-bottom: 17px;">

                    <div class="mr-auto pr-3">
                        <h4 class="text-black font-w600 fs-20">Active Merchants</h4>
                        {{-- <p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>ss --}}
                    </div>
                    {{-- <a href="food-menu.html" class="btn btn-primary rounded d-none d-md-block">View More</a> --}}
                </div>


                <div class="row">
                    @foreach($merchants as $key => $merchant)

                    <div class="col-sm-4 ">
                        <div class="card text-center border-0"
                            style="  box-shadow: none !important;  background-color: inherit;">
                            <div class="card-body">

                                @if($merchant['profile_picture'] == null)
                                <img style="border-radius: 50% !important;"
                                    src="{{asset('assets/images/testimonial/1.jpg')}}" alt="">
                                @else
                                <img style="border-radius: 50% !important;"
                                    src="{{''.config('path.path.WebPath').''.config('path.path.UserPath').'/'.$merchant['profile_picture'].''}}" width="120px" alt="">
                                @endif


                                <h5 class="fs-16 font-w500 mb-1"><a href="{{url('AdminMerchantProfile/'.$merchant['id'])}}"
                                        class="text-black">{{$merchant['name']}}</a></h5>
                                {{-- <p class="fs-14">Body Bu23ilding Trainer</p> --}}
                                <div class="d-flex align-items-center justify-content-center">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.09569 20C4.80437 19.9988 4.51677 19.9344 4.25273 19.8113C3.98868 19.6881 3.75447 19.5091 3.56624 19.2866C3.37801 19.0641 3.24024 18.8034 3.16243 18.5225C3.08462 18.2415 3.06862 17.9471 3.11554 17.6593L3.88905 12.8902L0.569441 9.45986C0.312024 9.19466 0.132451 8.86374 0.0503661 8.50328C-0.0317185 8.14282 -0.0131526 7.76671 0.104033 7.4161C0.221219 7.06549 0.43251 6.75388 0.714792 6.51537C0.997074 6.27685 1.33947 6.12062 1.70453 6.06376L6.20048 5.37325L8.18158 1.13817C8.34755 0.796915 8.60606 0.509234 8.92762 0.307978C9.24917 0.106721 9.6208 0 10.0001 0C10.3793 0 10.751 0.106721 11.0725 0.307978C11.3941 0.509234 11.6526 0.796915 11.8186 1.13817L13.7931 5.36719L18.2955 6.06376C18.6606 6.12062 19.003 6.27685 19.2852 6.51537C19.5675 6.75388 19.7788 7.06549 19.896 7.4161C20.0132 7.76671 20.0318 8.14282 19.9497 8.50328C19.8676 8.86374 19.688 9.19466 19.4306 9.45986L16.1144 12.8765L16.885 17.66C16.9463 18.0327 16.9014 18.4152 16.7556 18.7635C16.6097 19.1119 16.3687 19.4121 16.0602 19.6297C15.7517 19.8473 15.3882 19.9735 15.0113 19.994C14.6344 20.0144 14.2593 19.9281 13.9292 19.7451L10.0026 17.5635L6.07117 19.7451C5.77302 19.9118 5.43724 19.9996 5.09569 20Z"
                                            fill="#FFAA29" />
                                    </svg>
                                    <span
                                        class="fs-14 d-block ml-2 pr-2 mr-2 border-right text-black font-w500">{{ round($merchant['averageRating'], 2) }}</span>
                                    <a href="{{url('AdminMerchantProfile/'.$merchant['id'])}}" class="btn-link fs-14">Ratings</a>
                                </div>
                                <p>Merchant ID: {{$merchant['id']}}</p>
                                {{-- <button class="btn btn-primary"><span> <img
                                            src="{{asset('assets/images/ui_icons/edit.png')}}" width="25px" alt="">
                                        Edit</span></button> --}}
                                <a style="color: white;" href="{{url('AdminMerchantProfile/'.$merchant['id'])}}">
                                    <button class="btn btn-primary"> <span> View </span> </button> </a>
                            </div>
                        </div>
                    </div>

                    @endforeach



                </div>
                <style>
                    .pagination {
                        place-content: center;
                    }
                </style>
                <div style="place-content: center;">
                    {{$merchants->links()}}
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