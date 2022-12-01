<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

           <li>
                <a class="" href="{{route('AdminDashboard')}}" aria-expanded="false">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-home" aria-hidden="true" style="color: #ff6600 !important;     margin-left: 3px;"></i>
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

            {{-- <li>
                <a href="{{route('AdminManageMerchants')}}" style="">
                    <i class="fa fa-id-card-o" aria-hidden="true" style="color: #ff6600;"></i>
                    <span class="nav-text">Manage Merchants</span>
                </a>
            </li> --}}

            {{-- <li>
                <a href="{{route('AdminCoupons')}}" style="margin-left: 5px;">
                    <i class="fa fa-gift" aria-hidden="true" style="color: #ff6600;" ></i>

                    <span class="nav-text">Coupons</span>
                </a>
            </li> --}}

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="margin-left: 3px;">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-list-alt" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Categories</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('AdminAllCategories')}}">List Categories</a></li>
                    <li><a href="{{route('AdminCategoryAdd')}}">Add Category</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="margin-left: 3px;">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-list-alt" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Tags</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('AdminAllTags')}}">List Tags</a></li>
                    <li><a href="{{route('AdminTagAdd')}}">Add Tag</a></li>
                </ul>
            </li>


            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="margin-left: 3px;">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-users" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Manage Customers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('AdminAllUsers')}}">Users List</a></li>
                    {{-- <li><a href="{{route('AdminManageReviews')}}">Latest Reviews</a></li>
                    <li><a href="{{route('AdminAllReviews')}}">All Reviews</a></li> --}}
                    {{-- <li><a href="{{route('AdminHomePageManagement')}}">Home Page Management</a></li> --}}
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="margin-left: 3px;">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-id-card-o" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Reviews Management</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('AdminManageReviewRequests')}}"> Manage Reviews (<span id="ReviewRequests"></span>)</a></li>
                    <li><a href="{{route('AdminManageReviews')}}">Latest Reviews</a></li>
                    <li><a href="{{route('AdminAllReviews')}}">All Reviews</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="margin-left: 3px;">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-id-card-o" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Website Management</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('AdminHomePageManagement')}}">Home Page Management</a></li>
                    <li><a href="{{route('AdminHomeCrouselManagement')}}">Crousel Management</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="margin-left: 3px;">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-id-card-o" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Manage Merchants</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('ActiveMerchants')}}">Active Merchants</a></li>
                    <li><a href="{{route('AdminManageMerchants')}}">Manage Merchants</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="margin-left: 3px;">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-id-card-o" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Manage Deals</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('AdminCoupons')}}">Active Deals</a></li>
                    <li><a href="{{route('DealsStoppedByAdmin')}}">Stopped Deals</a></li>
                    <li><a href="{{route('AdminOfferRequests')}}">Offer Requests (<span id="OfferRequests"></span>)</a></li>
                    <li><a href="{{route('AdminOfferActivationReactivationRequest')}}">Inactivation/Reactivation Requests (<span id="ActiveRequests"></span>)</a></li>
                    {{-- <li><a href="{{route('AdminDiscountRequests')}}">Additional Discount Requests</a></li> --}}
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false" style="margin-left: 3px;">
                    {{-- <i class="flaticon-381-networking"></i> --}}
                    <i class="fa fa-id-card-o" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Manage Payments</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{url('AdminTransactions')}}">Transactions</a></li>
                    <li><a href="{{url('AdminPaymentRequests')}}">Payment Requests</a></li>
                    <li><a href="{{url('AdminMerchantAmounts')}}">Total Amounts</a></li>
                    <li><a href="{{url('AdminServiceChargesRecord')}}">Service Charges</a></li>
                   
                    {{-- <li><a href="{{route('AdminDiscountRequests')}}">Additional Discount Requests</a></li> --}}
                </ul>
            </li>

            {{-- <input type="hidden" value="{{session('Authenticated_user_data')['token']}}" id="SomeLine"> --}}

            <script>

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        "Authorization": localStorage.getItem('token')
                    }
                });

                // $.ajax({
                // url: "http://localhost:8080/login",
                // type: 'GET',
                // // Fetch the stored token from localStorage and set in the header
                // headers: {"Authorization": localStorage.getItem('token')}
                // });

                $.ajax({
                    type: 'GET',
                    url: `{{ url('getSideBarCount') }}`,
                    data: {
                      "_token": "{{ csrf_token() }}",
                      },
                    success: function(data) {

                        // console.log(data.data.activeInactiveRequestCount);
                        // jQuery('#city').html(data);
                        // console.log(data['manageDealCount']);

                        // alert(data.manageDealCount);

                        $('#ReviewRequests').html(data.data.pendingReviewCount)
                        $('#OfferRequests').html(data.data.manageDealCount)
                        $('#ActiveRequests').html(data.data.activeInactiveRequestCount)

                    },
                    error: function (data) {
                      console.log('Error:', data);
                      }
                  });

    
              </script>



            {{-- <li>
                <a href="{{route('AdminAllUsers')}}" style="margin-left: 3px;">
                    <i class="fa fa-users" aria-hidden="true" style="color: #ff6600;"></i>

                    <span class="nav-text">Manage Customers</span>
                </a>
            </li>

            <li>
                <a href="{{route('AdminReview')}}">
                    <i class="fas fa-envelope" style="color: #ff6600;"></i>
                    <span class="nav-text">Manage Reviews</span>
                </a>
            </li> --}}

            {{-- <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Manage Requests</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('AdminBranchRequests')}}">Branch Requests</a></li>
                    <li><a href="{{route('AdminOfferRequests')}}">Offer Requests</a></li>
                </ul>
            </li> --}}

        </ul>
        {{-- <div class="add-menu-sidebar">
            <img src="{{asset('assets/images/calendar.png')}}" alt="" class="mr-3">
            <p class="	font-w500 mb-0">Create a New Merchant</p>
        </div> --}}
        <div class="copyright">
            <p><strong>SiBuy365 Admin Dashboard</strong> © 2022 All Rights Reserved</p>
            <a href="{{route('home')}}"><strong>Main Website</strong></a>
            {{-- <p>Made with <span class="heart"></span> by DexignZone</p> --}}
        </div>
    </div>
</div>

