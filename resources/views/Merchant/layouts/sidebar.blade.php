<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

           <li>
                <a class="" href="{{route('MerchantDashboard')}}" aria-expanded="false">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-home" aria-hidden="true" style="color: #ff6600 !important; "></i>
                    <span class="nav-text">Home</span>
                </a>

            </li>

            <style>
                li a{
                    color: #000 !important;
                    background: white !important;
                }

                .deznav .metismenu > li > a:before {
                    background: white !important;
                }
            </style>


            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-gift" aria-hidden="true" style="color: #ff6600;" ></i>
                    <span class="nav-text">Offers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('MerchantOffers')}}">Offers</a></li>
                    <li><a href="{{route('MerchantAddOffer')}}">Add Offer</a></li>
                    <li><a href="{{route('MerchantOfferReviews')}}">Offers Reviews</a></li>
                    {{-- <li><a href="{{route('ShowRejectedOffers')}}">Rejected/Stopped Offers</a></li> --}}
                    {{-- <li><a href="{{route('MerchantAdditionalDiscount')}}">Additional Discount</a></li> --}}
                </ul>
            </li>

            {{-- <li>
                <a href="{{route('MerchantOffers')}}">
                    <i class="flaticon-381-networking"></i> 
                    <span class="nav-text">Offers</span>
                </a>
            </li>

            <li>
                <a href="{{route('MerchantAddOffer')}}">
                    <i class="flaticon-381-networking"></i> 
                    <span class="nav-text">Add Offer</span>
                </a>
            </li> --}}

            {{-- <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-compass" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Branches</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('MerchantBranches')}}">Branches</a></li>
                    <li><a href="{{route('MerchantAddBranch')}}">Add Branch</a></li>
                </ul>
            </li> --}}


            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-id-card-o" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Payments</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{url('Transactions')}}">Transactions</a></li>
                    <li><a href="{{url('RequestPayment')}}">Request Payment</a></li>
                    <li><a href="{{url('BankDetails')}}">Bank Details</a></li>
                   
                    {{-- <li><a href="{{route('AdminDiscountRequests')}}">Additional Discount Requests</a></li> --}}
                </ul>
            </li>
            {{-- <li>
                <a href="{{route('MerchantAddBranch')}}">
                    <i class="flaticon-381-networking"></i> 
                    <span class="nav-text">Add Branch</span>
                </a>
            </li> --}}

            {{-- <li>
                <a href="{{route('MerchantProfile')}}">
                    <i class="fa fa-user" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">My Profile</span>
                </a>
            </li> --}}

            <li>
                <a href="{{route('MerchantSettings')}}">
                    {{-- <i class="flaticon-381-networking"></i>  --}}
                    <i class="fa fa-cog" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Settings</span>
                </a>
            </li>

            


            {{-- <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="workout-statistic.html">Workout Statistic</a></li>
                    <li><a href="workoutplan.html">Workout Plan</a></li>
                    <li><a href="distance-map.html">Distance Map</a></li>
                    <li><a href="food-menu.html">Diet Food Menu</a></li>
                    <li><a href="personal-record.html">Personal Record</a></li>
                </ul>
            </li>

            
            </li> --}}
        </ul>
        <div class="add-menu-sidebar">
            <img src="{{asset('assets/images/calendar.png')}}" alt="" class="mr-3">
            <p class="	font-w500 mb-0" > <a style="color:white;" href="{{url('MerchantAddOffer')}}">Create a New Offer</a> </p>
        </div>
        <div class="copyright">
            <p><strong>Sibuy365 Merchant Dashboard</strong> © 2022 All Rights Reserved</p>
            {{-- <p>Made with <span class="heart"></span> by DexignZone</p> --}}
            <a href="{{route('home')}}"><strong>Main Website</strong></a>
        </div>
    </div>
</div>

