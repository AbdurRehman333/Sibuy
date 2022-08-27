@extends('Merchant.layouts.master')

@section('title', 'Merchant Dashboard')
@section('header', 'Dashboard')

@section('content')


        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">


                    <div class="col-xl-6 col-xxl-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card avtivity-card">
                                    <div class="card-body">

                                        <a href="{{url('MerchantTotalSales')}}">
                                        <div class="media align-items-center">
                                            <span class="activity-icon bgl-success mr-md-4 mr-3">

                                                <i class="fa fa-university" aria-hidden="true" style="font-size:35px;margin-top:23px;"></i>


												{{-- <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g clip-path="url(#clip2)">
													<path d="M14.6406 24.384C14.4639 24.1871 14.421 23.904 14.5305 23.6633C15.9635 20.513 14.4092 18.7501 14.564 11.6323C14.5713 11.2944 14.8346 10.9721 15.2564 10.9801C15.6201 10.987 15.905 11.2962 15.8971 11.6598C15.8902 11.9762 15.8871 12.2939 15.8875 12.6123C15.888 12.9813 16.1893 13.2826 16.5583 13.2776C17.6426 13.2628 19.752 12.9057 20.5684 10.4567L20.9744 9.23876C21.7257 6.9847 20.4421 4.55115 18.1335 3.91572L13.9816 2.77294C12.3274 2.31768 10.5363 2.94145 9.52387 4.32498C4.66826 10.9599 1.44452 18.5903 0.0754914 26.6727C-0.300767 28.8937 0.754757 31.1346 2.70222 32.2488C13.6368 38.5051 26.6023 39.1113 38.35 33.6379C39.3524 33.1709 40.0002 32.1534 40.0002 31.0457V19.1321C40.0002 18.182 39.5322 17.2976 38.7484 16.7664C34.5339 13.91 29.1672 14.2521 25.5723 18.0448C25.2519 18.3828 25.3733 18.937 25.8031 19.1166C27.4271 19.7957 28.9625 20.7823 30.2439 21.9475C30.5225 22.2008 30.542 22.6396 30.2654 22.9155C30.0143 23.1658 29.6117 23.1752 29.3485 22.9376C25.9907 19.9053 21.4511 18.5257 16.935 19.9686C16.658 20.0571 16.4725 20.3193 16.477 20.61C16.496 21.8194 16.294 22.9905 15.7421 24.2172C15.5453 24.6544 14.9607 24.7409 14.6406 24.384Z" fill="#27BC48"/>
													</g>
													<defs>
													<clipPath id="clip2">
													<rect width="40" height="40" fill="white"/>
													</clipPath>
													</defs>
												</svg> --}}
											</span>
                                            <div class="media-body">
                                                <p class="fs-14 mb-2">Total Sales</p>
                                                <span class="title text-black font-w600">${{$dashboardStats['data']['totalSale']}}</span>
                                            </div>
                                        </div>
                                        </a>
                                        {{-- <div class="progress" style="height:5px;">
                                            <div class="progress-bar bg-success" style="width: 42%; height:5px;" role="progressbar">
                                                <span class="sr-only">42% Complete</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="effect bg-success"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card avtivity-card">
                                    <div class="card-body">

                                        <a href="{{url('MerchantOffers')}}">
                                        <div class="media align-items-center">
                                            <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                                                <i class="fa fa-gift" aria-hidden="true" style="font-size:35px;margin-top:23px;" ></i>
												{{-- <svg width="40" height="37" viewBox="0 0 40 37" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M1.64826 26.5285C0.547125 26.7394 -0.174308 27.8026 0.0366371 28.9038C0.222269 29.8741 1.07449 30.5491 2.02796 30.5491C2.15453 30.5491 2.28531 30.5364 2.41188 30.5112L10.7653 28.908C11.242 28.8152 11.6682 28.5578 11.9719 28.1781L15.558 23.6554L14.3599 23.0437C13.4739 22.5965 12.8579 21.7865 12.6469 20.8035L9.26338 25.0688L1.64826 26.5285Z" fill="#A02CFA"/>
													<path d="M31.3999 8.89345C33.8558 8.89345 35.8467 6.90258 35.8467 4.44673C35.8467 1.99087 33.8558 0 31.3999 0C28.9441 0 26.9532 1.99087 26.9532 4.44673C26.9532 6.90258 28.9441 8.89345 31.3999 8.89345Z" fill="#A02CFA"/>
													<path d="M21.6965 3.33297C21.2282 2.85202 20.7937 2.66217 20.3169 2.66217C20.1439 2.66217 19.971 2.68748 19.7853 2.72967L12.1534 4.53958C11.0986 4.78849 10.4489 5.84744 10.6979 6.89795C10.913 7.80079 11.7146 8.40831 12.6048 8.40831C12.7567 8.40831 12.9086 8.39144 13.0605 8.35347L19.5618 6.81357C19.9837 7.28187 22.0974 9.57273 22.4813 9.97775C19.7938 12.855 17.1064 15.7281 14.4189 18.6054C14.3767 18.6519 14.3388 18.6982 14.3008 18.7446C13.5161 19.7445 13.7566 21.3139 14.9379 21.9088L23.1774 26.1151L18.8994 33.0467C18.313 34.0002 18.6083 35.249 19.5618 35.8396C19.8951 36.0464 20.2621 36.1434 20.6249 36.1434C21.3042 36.1434 21.9707 35.8017 22.3547 35.1815L27.7886 26.3766C28.0882 25.8915 28.1683 25.305 28.0122 24.7608C27.8561 24.2123 27.4806 23.7567 26.9702 23.4993L21.3885 20.66L27.2571 14.3823L31.6869 18.1371C32.0539 18.4493 32.5054 18.6012 32.9526 18.6012C33.4335 18.6012 33.9145 18.424 34.2899 18.078L39.3737 13.3402C40.1669 12.6019 40.2133 11.3615 39.475 10.5684C39.0868 10.1549 38.5637 9.944 38.0406 9.944C37.5638 9.944 37.0829 10.117 36.7074 10.4671L32.9019 14.0068C32.8977 14.011 23.363 5.04163 21.6965 3.33297Z" fill="#A02CFA"/>
												</svg> --}}
											</span>
                                            <div class="media-body">
                                                <p class="fs-14 mb-2">Total Active Offers</p>
                                                <span class="title text-black font-w600">{{$dashboardStats['data']['totalActiveDeals']}}</span>
                                            </div>
                                        </div>
                                        </a>
                                        {{-- <div class="progress" style="height:5px;">
                                            <div class="progress-bar bg-secondary" style="width: 82%; height:5px;" role="progressbar">
                                                <span class="sr-only">42% Complete</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="effect bg-secondary"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card avtivity-card">
                                    <div class="card-body">

                                        <a href="{{url('MerchantTotalSales')}}">
                                            <div class="media align-items-center">
                                                <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                                    <i class="fa fa-usd" aria-hidden="true" style="font-size:35px;margin-top:23px;"></i>
                                                    {{-- <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
                                                        <path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
                                                        <path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
                                                        <path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
                                                    </svg> --}}
                                                </span>
                                                <div class="media-body">
                                                    {{-- <p class="fs-14 mb-2">Discount Availed</p> --}}
                                                    <p class="fs-14 mb-2">Total Deals Sale</p>
                                                    <span class="title text-black font-w600">{{$dashboardStats['data']['totalDealSale']}}</span>
                                                </div>
                                            </div>
                                        </a>
                                        {{-- <div class="progress" style="height:5px;">
                                            <div class="progress-bar bg-danger" style="width: 90%; height:5px;" role="progressbar">
                                                <span class="sr-only">42% Complete</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="effect bg-danger"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card avtivity-card">
                                    <div class="card-body">

                                        <a href="{{url('MerchantTotalSales')}}">
                                        <div class="media align-items-center">
                                            <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                                <i class="fa fa-exchange" aria-hidden="true" style="font-size:35px;margin-top:23px;"></i>

												{{-- <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M19.9996 10.0001C22.7611 10.0001 24.9997 7.76148 24.9997 5.00004C24.9997 2.23859 22.7611 0 19.9996 0C17.2382 0 14.9996 2.23859 14.9996 5.00004C14.9996 7.76148 17.2382 10.0001 19.9996 10.0001Z" fill="#FFBC11"/>
													<path d="M29.7178 36.3838L23.5603 38.6931L26.6224 39.8414C27.9402 40.3307 29.3621 39.6527 29.8413 38.3778C30.0964 37.6976 30.021 36.9851 29.7178 36.3838Z" fill="#FFBC11"/>
													<path d="M8.37771 27.6588C7.08745 27.1803 5.64452 27.8298 5.15873 29.1224C4.67411 30.4151 5.32967 31.8555 6.62228 32.3413L9.31945 33.3527L16.4402 30.6821L8.37771 27.6588Z" fill="#FFBC11"/>
													<path d="M34.8413 29.1225C34.3554 27.8297 32.9126 27.1803 31.6223 27.6589L11.6223 35.1589C10.3295 35.6448 9.67401 37.0852 10.1586 38.3779C10.6378 39.6524 12.0594 40.3309 13.3776 39.8415L33.3777 32.3414C34.6705 31.8556 35.326 30.4152 34.8413 29.1225Z" fill="#FFBC11"/>
													<path d="M37.5001 20.0001H31.5455L27.2364 11.3819C26.7886 10.4871 25.8776 9.97737 24.9388 10.0001L19.9996 10.0001L15.061 10.0001C14.1223 9.97737 13.2125 10.4872 12.7637 11.3819L8.45457 20.0001H2.49998C1.1194 20.0001 0 21.1195 0 22.5001C0 23.8807 1.1194 25.0001 2.49998 25.0001H10C10.9473 25.0001 11.8128 24.4654 12.2363 23.6183L15 18.0909V27.4724L19.9998 29.3472L25 27.4719V18.0909L27.7637 23.6183C28.1873 24.4655 29.0528 25.0001 30 25.0001H37.5C38.8806 25.0001 40 23.8807 40 22.5001C40 21.1195 38.8807 20.0001 37.5001 20.0001Z" fill="#FFBC11"/>
												</svg> --}}

											</span>
                                            <div class="media-body">
                                                <p class="fs-14 mb-2">Total Coupon Redeemed</p>
                                                <span class="title text-black font-w600">{{$dashboardStats['data']['totalDealRadeem']}}</span>
                                            </div>
                                        </div>
                                        </a>
                                        {{-- <div class="progress" style="height:5px;">
                                            <div class="progress-bar bg-warning" style="width: 42%; height:5px;" role="progressbar">
                                                <span class="sr-only">42% Complete</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="effect bg-warning"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-xxl-12">
                        <div class="card text-white bg-primary">
                            <div class="card-header">
                                <h5 class="card-title text-white">Trending Categories</h5>
                                <span> <a style="color: #ffffff !important; font-weight: 500;" href="{{url('MerchantCategoriesStat')}}">View All</a> </span>
                            </div>

                            <div style="margin-top:1rem;" class="card-body mb-0">
                                @foreach($topCats['data'] as $key => $index)
                                <span id="">{{$index['category_name']}}</span> <span style="float: right;" id="">{{$index['active_deals']}} Coupons</span>
                                <hr>
                                @endforeach
                                {{-- <span id="">Cleaning</span> <span style="float: right;" id="">2300 Coupons</span>
                                <hr>
                                <span id="">Automobile</span> <span style="float: right;" id="">1300 Coupons</span>
                                <hr>
                                <span id="">Kids</span> <span style="float: right;" id="">1500 Coupons</span> --}}
                            </div>    
                            
                        </div>
           
                    </div>

                    <div class="col-xl-4 col-xxl-8">
                        <div class="row">
                            <div class="col-xl-12">

                                <div class="card text-center border-0"
                                style="  box-shadow: none !important;  background-color: inherit;">
            
            
                                <div class="card-body">
            
                                    @if($getProfile['profile_picture'] == null)
                                    <img style="border-radius: 50% !important;" src="{{asset('assets/images/testimonial/1.jpg')}}"
                                        alt="">
                                    @else
                                    <img style="border-radius: 50% !important;" src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.UserPath').'/'.$getProfile['profile_picture'].''}}"
                                        alt="" width="400px">
                                    @endif

                                    <h5 class="fs-30 font-w500 mb-1 " style="margin-top: 8px !important;"><a href="#"
                                            class="text-black">{{$getProfile['name']}}</a></h5>
                                    {{-- <p class="fs-21" style="color: #082073 !important; font-weight:500;">Baku, Azerbaijan</p> --}}
                                    <p> {{$getProfile['phone']}} - {{$getProfile['email']}} </p>
                                    <div class="d-flex align-items-center justify-content-center" style="    margin-bottom: 15px;">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.09569 20C4.80437 19.9988 4.51677 19.9344 4.25273 19.8113C3.98868 19.6881 3.75447 19.5091 3.56624 19.2866C3.37801 19.0641 3.24024 18.8034 3.16243 18.5225C3.08462 18.2415 3.06862 17.9471 3.11554 17.6593L3.88905 12.8902L0.569441 9.45986C0.312024 9.19466 0.132451 8.86374 0.0503661 8.50328C-0.0317185 8.14282 -0.0131526 7.76671 0.104033 7.4161C0.221219 7.06549 0.43251 6.75388 0.714792 6.51537C0.997074 6.27685 1.33947 6.12062 1.70453 6.06376L6.20048 5.37325L8.18158 1.13817C8.34755 0.796915 8.60606 0.509234 8.92762 0.307978C9.24917 0.106721 9.6208 0 10.0001 0C10.3793 0 10.751 0.106721 11.0725 0.307978C11.3941 0.509234 11.6526 0.796915 11.8186 1.13817L13.7931 5.36719L18.2955 6.06376C18.6606 6.12062 19.003 6.27685 19.2852 6.51537C19.5675 6.75388 19.7788 7.06549 19.896 7.4161C20.0132 7.76671 20.0318 8.14282 19.9497 8.50328C19.8676 8.86374 19.688 9.19466 19.4306 9.45986L16.1144 12.8765L16.885 17.66C16.9463 18.0327 16.9014 18.4152 16.7556 18.7635C16.6097 19.1119 16.3687 19.4121 16.0602 19.6297C15.7517 19.8473 15.3882 19.9735 15.0113 19.994C14.6344 20.0144 14.2593 19.9281 13.9292 19.7451L10.0026 17.5635L6.07117 19.7451C5.77302 19.9118 5.43724 19.9996 5.09569 20Z"
                                                fill="#FFAA29" />
                                        </svg>
                                        <span
                                            style="color: #082073 !important; font-size:30px !important; font-weight:500 !important;"
                                            class="fs-35 d-block ml-2 pr-2 mr-2 border-right text-black font-w500">{{ round($getProfile['averageRating'], 2) }}</span>
                                        <a href="#" class="btn-link fs-14">Ratings</a>
                                    </div>
                                    {{-- <p>Merchant ID: 40042</p> --}}
                                    {{-- <button class="btn btn-primary"><span> <a style="color: white !important;"
                                                href="{{route('AdminMerchantProfile')}}">Edit</a> </span></button> --}}
            
                                </div>
            
                                <div style="display: flex;
                                align-self: center;">
            
                                    <div style="margin:10px;">
                                        <div style="color: #082073; font-size:30px; font-weight:500;">{{$getProfile['activeOffers']}}</div>
                                        <div>Active Offers</div>
                                    </div>
            
                                    <span style="font-size: 37px;">|</span>
            
                                    <div style="margin:10px;">
                                        <div style="color: #082073; font-size:30px; font-weight:500;">{{$getProfile['dealRadeems']}}</div>
                                        <div>Coupons Redeemed</div>
                                    </div>
            
                                    <span style="font-size: 37px;">|</span>
            
                                    <div style="margin:10px;">
                                        <div style="color: #082073; font-size:30px; font-weight:500;">{{$getProfile['totalCategories']}}</div>
                                        <div>Categories</div>
                                    </div>
            
                                </div>
            
                            </div>


                                {{-- <div class="card">
                                    <div class="card-header d-sm-flex d-block pb-0 border-0">
                                        <div class="mr-auto pr-3">
                                            <h4 class="text-black font-w600 fs-20">Top Trending Merchants</h4>
                                            <p class="fs-13 mb-0 text-black">Lorem ipsum dolor sit amet, consectetur</p>
                                        </div>
                                        <a href="#" class="btn btn-primary rounded d-none d-md-block">View More</a>
                                    </div>
                                    <div class="card-body pt-2">

                                        <style>
                                            .fa-chevron-left{
                                                margin-top: 20px;
                                            }
                                            .fa-chevron-right{
                                                margin-top: 20px;
                                            }
                                        </style>
                                      
                                        

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>




                    <div class="col-xl-5 col-xxl-8">

                        <div class="card featuredMenu">
                            <div class="card-header border-0">
                                <h4 class="text-black font-w600 fs-20 mb-0">Pending Deals</h4>
                            </div>
                            <div class="card-body loadmore-content height750 dz-scroll pt-0" id="FeaturedMenusContent">
                            

                                @foreach($offers['data'] as $key => $deal)
                                    
                                    @php
                                        $now = Carbon\Carbon::now();
                                        $expiry = $deal['additional_discount_date'];
                                        $result = $now->lt($expiry);
                                    @endphp
                               
                                    <div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
                                        <a href="{{ URL('MerchantEditOffer/'.$deal['id'])}}">
                                            
                                            <img class="rounded mr-3 mb-md-0 mb-3" src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.DealsPath').'/'.$deal['image']['image'].''}}
                                            "
                                                alt="" width="120">
                                            
                                            </a>
                                        <div class="media-body col-lg-8 pl-0">
                                            <h6 class="fs-16 font-w600"><a href="{{ URL('MerchantEditOffer/'.$deal['id'])}}" class="text-black">{{$deal['name']}}</a></h6>
                                            <p class="fs-14">{{$deal['description']}}</p>
                                            <div class="">
                                                <div class="media-body">
                                                    <span class="fs-14 text-primary font-w500"
                                                        style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;">
                                                        <del>{{$deal['price']}}</del> </span>

                                                        {{-- @php
                                                        $percentage_to_pay = 100 - $deal['discount_on_price'];
                                                    @endphp

                                                    <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;"> {{$percentage_to_pay}}%
                                                    </span> --}}

                                                    
                                                        @if($deal['additional_discount'] > 0 &&  $result)

                                                        @php
                                                        $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) )
                                                        @endphp

                                                        <span class="fs-14 text-danger font-w500" style="font-size:1rem !important;">
                                                        {{$price_to_pay_in_double_discount}}Azn </span>

                                                        @else

                                                            @php
                                                                $percent_to_give =  $deal['price'] - ($deal['price'] * ( $deal['discount_on_price'] / 100  ))
                                                            @endphp

                                                        <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                                            {{$percent_to_give}}Azn </span>

                                                        @endif
                                                    

                                                    @if($deal['additional_discount'] > 0 &&  $result)
                                                    {{-- <span class="badge light badge-danger"
                                                        style="margin-left: 8px !important;float: right !important;">
                                                        {{$deal['additional_discount']}}% off</span> --}}
                                                        <span class="badge light badge-danger" style="margin-left: 8px !important;">
                                                            {{$deal['additional_discount']}}% off</span>
                                                    @else
                                                    <span class="badge light badge-primary" style="margin-left: 8px !important;">
                                                        {{$deal['discount_on_price']}}% off</span>
                                                    @endif


                                                    {{-- <span class="badge light badge-primary"
                                                        style="margin-left: 8px !important;float: right !important;"> {{$deal['discount_on_price']}}% off</span> --}}
                                                </div>
                                                {{-- <ul class="d-flex flex-wrap mb-sm-0 mb-2">
                                                    <span class="" style=""> Baku, Azerbaijan</span>
                                                </ul> --}}
                                                <div>
                                                    <span class="" style="color:#0B2A97 !important;"> {{$deal['totalRadeem']}} Redeemed / {{$deal['totalPurchase']}} Available </span>
                                                </div>
                                                <div style="    text-align: -webkit-center;
                                                    margin-top: 10px;"> <button class="btn btn-primary"> <a href="{{ URL('MerchantEditOffer/'.$deal['id'])}}"><span style="    color: white;">Edit</span></a> </button> </div>
                                            </div>
                                        </div>
                                    </div>


                                    @endforeach



                            </div>

                          

                            <style>
                                .nextContent {
                                    display:none;
                                    margin: 5px 0;
                                    padding: 8px 0;
                                    background: #eee;
                                    border: 1px solid #ccc;
                                    text-align: center;
                                    }
                                    #loadMore {
                                        padding: 10px;
                                        width: 100%;
                                        display: block;
                                        text-align: center;
                                        background-color: #0B2A97;
                                        color: #fff;
                                        border-width: 0 1px 1px 0;
                                        border-style: solid;
                                        border-color: #fff;
                                        box-shadow: 0 1px 1px #ccc;
                                        transition: all 600ms ease-in-out;
                                        -webkit-transition: all 600ms ease-in-out;
                                        -moz-transition: all 600ms ease-in-out;
                                        -o-transition: all 600ms ease-in-out;
                                        margin-top: 10px;
                                        margin-bottom: 10px;
                                    }
                                    #loadMore:hover {
                                        background-color: #6c3bbb;
                                        color: #ffffff;
                                    }
                            </style>

              
                        </div>
                       
                    </div>


        
                    <div class="col-xl-3 col-xxl-4">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card featuredMenu">
                                    <div class="card-header border-0">
                                        <h4 class="text-black font-w600 fs-20 mb-0">Recent Discounts on Sales</h4>
                                    </div>


                                    <style>
                                        .RecentDeals::-webkit-scrollbar {
                                        width: 0.2em;
                                        }
                                        
                                        .RecentDeals::-webkit-scrollbar-track {
                                        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                                        }
                                        
                                        .RecentDeals::-webkit-scrollbar-thumb {
                                        background-color: darkgrey;
                                        outline: 1px solid slategrey;
                                        }
                                    </style>


                                    <div class="card-body loadmore-content height750 dz-scroll pt-0 RecentDeals" id="FeaturedMenusContent" style="max-height: 750px;
                                    overflow: scroll;
                                    font-size: 8px;
                                    overflow-x: hidden;">

                                        @foreach($recentDeals['data'] as $key => $deal)

                                        @php
                                            $now = Carbon\Carbon::now();
                                            $expiry = $deal['additional_discount_date'];
                                            $result = $now->lt($expiry);
                                        @endphp
                                        <div class="media mb-4">
                                            <img src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.DealsPath').'/'.$deal['image']['image'].''}}
                                            " width="85" alt="" class="rounded mr-3">

                                            {{-- @php
                                                $percent_to_give = 100 - $deal['discount_on_price'];
                                            @endphp --}}

                                            <div class="media-body">
                                                <h5><a href="#" class="text-black fs-14">{{$deal['name']}}</a></h5>
                                                {{-- <span class="fs-12 text-primary font-w500" style="color:rgb(210, 45, 45) !important; font-size:1rem !important;"> <del>100%</del> </span>
                                                <span class="fs-12 text-primary font-w500" style="font-size:0.7rem !important;"> {{$percent_to_give}}% </span> --}}


                                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important; text-decoration:line-through">
                                                    {{$deal['price']}}Azn </span>

                                                @if($deal['additional_discount'] > 0 && $result)

                                                @php
                                                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) )
                                                @endphp

                                                <span class="fs-14 text-danger font-w500" style="font-size:1rem !important;">
                                                {{$price_to_pay_in_double_discount}}Azn </span>

                                                @else

                                                    @php
                                                        $percent_to_give =  $deal['price'] - ($deal['price'] * ( $deal['discount_on_price'] / 100  ))
                                                    @endphp

                                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;">
                                                    {{$percent_to_give}}Azn </span>

                                                @endif



                                                @if($deal['additional_discount'] > 0 && $result)
                                                {{-- <span class="badge light badge-danger"
                                                    style="margin-left: 8px !important;float: right !important;">
                                                    {{$deal['additional_discount']}}% off</span> --}}
                                                    <span class="badge light badge-danger" style="margin-left: 8px !important;">
                                                        {{$deal['additional_discount']}}% off</span>
                                                @else
                                                <span class="badge light badge-primary" style="margin-left: 8px !important;">
                                                    {{$deal['discount_on_price']}}% off</span>
                                                @endif




                                                {{-- <span class="badge light badge-primary" style="    display: table-caption;margin-top: 4px;font-size:12px;margin-left: 8px !important;"> {{$deal['discount_on_price']}}% off</span> --}}
                                            </div>
                                            
                                        </div>
                                        <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                                            <li class="mr-3 mb-2"><span class="fs-12 text-black"  style="    font-size: 11px !important;"> {{$deal['totalRadeem']}} Coupons Redeemed </span></li>
                                            <li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">{{$deal['totalReviews']}} Reviews</span></li>
                                        </ul>
                                        @endforeach
                                        

                                        {{-- <div class="media mb-4">
                                            <img src="images/menus/1.png" width="85" alt="" class="rounded mr-3">
                                            <div class="media-body">
                                                <h5><a href="#" class="text-black fs-16">Chinese Orange Fruit With Avocado Salad</a></h5>
                                                <span class="fs-14 text-primary font-w500" style="color:rgb(210, 45, 45) !important; font-size:1.2rem !important;"> <del>100%</del> </span>
                                                <span class="fs-14 text-primary font-w500" style="font-size:1rem !important;"> 80% </span>
                                                <span class="badge light badge-primary" style="margin-left: 8px !important;"> 29% off</span>
                                                <span class="" style=""> NY, USA</span>
                                            </div>
                                            
                                        </div>
                                        <ul class="d-flex flex-wrap pb-2 border-bottom mb-3 justify-content-between">
                                            <li class="mr-3 mb-2"><span class="fs-14 text-black"  style="    font-size: 11px !important;">44 Coupons Redeemed </span></li>
                                            <li class="mb-2"><i class="fa fa-star-o mr-3 scale5 text-warning" aria-hidden="true"></i><span class="fs-14 text-black font-w500">176 Reviews</span></li>
                                        </ul> --}}



                                    </div>

                                  

                                    <style>
                                        .nextContent {
                                            display:none;
                                            margin: 5px 0;
                                            padding: 8px 0;
                                            background: #eee;
                                            border: 1px solid #ccc;
                                            text-align: center;
                                            }
                                            #loadMore {
                                                padding: 10px;
                                                width: 100%;
                                                display: block;
                                                text-align: center;
                                                background-color: #0B2A97;
                                                color: #fff;
                                                border-width: 0 1px 1px 0;
                                                border-style: solid;
                                                border-color: #fff;
                                                box-shadow: 0 1px 1px #ccc;
                                                transition: all 600ms ease-in-out;
                                                -webkit-transition: all 600ms ease-in-out;
                                                -moz-transition: all 600ms ease-in-out;
                                                -o-transition: all 600ms ease-in-out;
                                                margin-top: 10px;
                                                margin-bottom: 10px;
                                            }
                                            #loadMore:hover {
                                                background-color: #6c3bbb;
                                                color: #ffffff;
                                            }
                                    </style>

                      

                                    {{-- <a href="#" id="loadMore">Show More</a> --}}
                              
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