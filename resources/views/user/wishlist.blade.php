<!doctype html>
<html lang="en-US" data-hy-language="en" data-hy-locale="us" data-hy-locale-default="us">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SiBuy365</title>
    <link rel="canonical" href="index.html" />
    <link rel="alternate" hreflang="en-US" href="index.html" />
    <link rel="alternate" href="index.html" hreflang="x-default" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:image" content="{{asset('assets/images/sibuy.png')}}" />
    <link rel="icon" href="{{asset('assets/images/sibuy.png')}}" />
    <link href="{{asset('assets/USER/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="{{asset('assets/images/sibuy.png')}}" />
    <script src="{{asset('assets/USER/vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript">
        const language = 'en';
        const ATHOM_API_CLIENT_ID = '5d6e8db64b342d0c3ff3fd09';
        const ATHOM_API_CLIENT_SECRET = 'bb54c17e3d1ea206bfee8e42d038e1da9c0ad96e';
        const ATHOM_API_REDIRECT_URI = 'https://homey.app/oauth2/callback';
        const ATHOM_APPS_API_URL = 'https://apps-api.athom.com/api/v1';
        const ATHOM_STORE_API_URL = 'https://store-api.athom.com/api';
        const HOMEY_STORE_URL = 'https://homey.app/en-us/store/';
        const HOMEY_STORE_SUCCESS_URL = 'https://homey.app/en-us/store/checkout-success/';
        const HOMEY_PRODUCT_URL = 'https://homey.app/en-us/store/product/SKU/';
        const I18N = {};
        
        function _t(input, opts) {
        	if(typeof input !== 'string') return input;
        	if(I18N[input]) return(() => {
        		let out = I18N[input];
        		opts && Object.keys(opts).forEach(key => {
        			const value = opts[key];
        			out = out.replace(`[[${key}]]`, value);
        		});
        		return out;
        	})();
        	return undefined;
        }
        
        function _p(input, opts) {
        	return _t(`pages.home.${input}`, opts);
        }
        /**
         * Objects translations
         * @description returns translation from given language object ( {'en': 'text','nl':'tekst'} );
         * @param input
         * @returns {string|*}
         * @private
         */
        function _i(input) {
        	if(typeof input === 'string') return input;
        	if(input === null) return null;
        	if(typeof input === 'object' && input[language]) return input[language];
        	if(typeof input === 'object' && input['en']) return input['en'];
        	if(typeof input === 'object' && !input['en']) return '';
        	return input;
        }
    </script>
    <!--Load global CSS and JS -->
    <link rel="preload" as="font" type="font/woff2" href="fonts/roboto-v29-latin_cyrillic-regular.woff2"
        crossorigin="anonymous" />
    <link rel="preload" as="font" type="font/woff2" href="fonts/roboto-v29-latin_cyrillic-500.woff2"
        crossorigin="anonymous" />
    <link rel="preload" as="font" type="font/woff2" href="fonts/roboto-v29-latin_cyrillic-700.woff2"
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/core.css')}}" />
    <!--Load page specific CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/pages/home.css')}}" />
    <!-- Load icon font -->
    <link rel="preload" type="font/woff2" href="{{asset('assets/USER/fonts/icons.woff2')}}" as="font"
        crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'icons';
            src: url("{{asset('assets/USER/fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff2"),
            url("{{asset('assets/USER//fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff");
        }
    </style>
    <!--PreLoad page specific JS -->
    <link rel="preload" as="script" href="{{asset('assets/USER/js/main.js')}}">
    <script src="{{asset('js/app.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.min.css" integrity="sha512-HPSfJxnyVYJb4v9afT3fXvs0mXvdg/C7eYxBl1EYS7uQHuCU/0lSGhaH9o23Tw8FofBiGQfFWzMYD9TqK8tv/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body style="padding: 0em;">
    <style>
        .discount-card {
            margin-bottom: 20px;
        }

        .discount-card img {
            margin-bottom: 10px;
        }

        .discount-card b {
            text-transform: capitalize;
        }

        .old-price {
            color: #666;
            font-size: 20px;
            font-weight: bold;
            text-decoration: line-through;
        }

        .new-price {
            color: #1caffc;
            font-size: 20px;
            font-weight: bold;
            margin-left: 5px;
        }

        .percent-off {
            background-color: #010080;
            border: none;
            color: #fff;
            font-weight: 700;
            border-radius: 4px;
            font-size: 12px;
            line-height: 10px;
            padding: 2px 6px;
            white-space: nowrap;
            margin-left: 7px
        }

        .deal_des {
            font-size: 13px;
            line-height: 10px !important;
        }

        .discount-card hr {
            margin: 10px 0;
        }

        .location {
            color: #666;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .nearkm {
            color: #666;
            font-size: 15px;
        }

        .nearkm span {
            color: #010080;
            font-size: 15px;
            font-weight: bold
        }

        .nav>li>a {
            position: relative;
            display: block;
            padding: 5px 15px;
            font-size: 15px;
            color: #666;
        }

        .nav>li>a.active {
            color: #1caffc;
        }

        .nav>li>a:hover {
            color: #1caffc;
        }
    </style>
    <div class="website">

        @include('user.layouts.header')


        <main style="background: #F6F7FB;">
            <div class="home">
                <div id="section-intro" data-home-section class="bg-body" style="padding-top: 15vh;">
                    <div class="home-intro__body edge" style="margin-top: 5rem;"> 
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <h1>Categories</h1>
                            </div>
                        </div> --}}

                        @if(Session::has('success'))
                        <p class="alert alert-success" style="    text-align-last: center;
                        ">{{ Session::get('success') }}</p>
                        @endif

                        @if(Session::has('alert'))
                        <p class="alert alert-danger" style="    text-align-last: center;
                        ">{{ Session::get('alert') }}</p>
                        @endif


                        <div class="row">

                            <div class="col-md-12">

                                @if($wishlistItems)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Voucher Deal</th>
                                            {{-- <th scope="col">Type</th> --}}
                                            {{-- <th scope="col">Discount</th> --}}
                                            {{-- <th scope="col">Merchant</th> --}}
                                            <th scope="col">Price</th>
                                            {{-- <th scope="col">Quantity</th> --}}
                                            {{-- <th scope="col">Total</th> --}}
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($wishlistItems as $key => $datum)
                                        <tr class="item_in_cart"> 
                                            <th scope="row">{{$key+1}}</th>
                                            <td> <a href="{{url('discount_details/'.$datum["id"].'')}}"> {{$datum['name']}} </a></td>
     
                                            {{-- <td>{{$datum['discount_on_price']}}% OFF</td> --}}

                                            <td id="{{$key}}_total" class="total_classes">${{$datum['price']}}
                                            </td>

                                            <td><a class="btn btn-danger" href="{{url('delete_from_wishlist/'.$datum['wishlist_id'])}}">Delete</a></td>

                                            <td><a class="btn btn-info" href="{{ URL('add_to_cart/'.$datum['id'])}}">Add To Cart</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div style="    font-size: 24px;
                                text-align: -webkit-center;">
                                    Wishlist is Empty!
                                </div>
                                @endif

                                {{-- <div style="font-size: 18px;    text-align: -webkit-center; margin-top:6rem;">

                                    <div class="card" style="width: 18rem;">
                                        <div class="card-header">
                                         
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item" style="background: #96cbf1;">Cart Summary</li>
                                            <li class="list-group-item"><span id="">Number Of Items : <span id="no_of_items" >0</span> </span></li>
                                            <li class="list-group-item"><span id="grand_total">Grand Total : $2200</span></li>
                                            <li class="list-group-item"> <a href="{{url('purchaseDealsFromCart')}}"><button class="btn btn-info" style="background: #40a5ed;">Confirm Purchase</button></a> </li>
                                        </ul>
                                    </div>

                                    
                                </div> --}}

                                

                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            CalculateGrandTotal();
            CalculateItems();

            
            function CalculateItems()
            {
                var total_items = document.getElementsByClassName("item_in_cart");
                var element = document.getElementById(`no_of_items`);
                element.innerHTML = `${total_items.length}`;
            }

            function CalculateGrandTotal()
            {
                // console.log('Grand');
                var total_classes = document.getElementsByClassName("total_classes");
                var sum = 0;
                for (i=0; i<total_classes.length; i++){
                    var string = total_classes[i].innerHTML;
                    var to_sum = parseInt(string.substring(1));
                    sum = sum + to_sum;
                }
               var element = document.getElementById(`grand_total`);
               element.innerHTML = `Grand Total : $${sum}`;
            }
            function DEC(arg)
            {
                console.log(arg.getAttribute('data-id'));

                data_id = arg.getAttribute('data-id');

                element = document.getElementById(`${data_id}_qty`);
                element_qty = parseInt(element.innerHTML);
                //Getting Price
                element_price = document.getElementById(`${data_id}_price`);


                // price = parseInt(element_price.innerHTML);
                price = element_price.innerHTML;
                var price = parseInt(price.substring(1));


                console.log(price);

                CalculateGrandTotal();

                //QTY MUST NOT BE LESS THAN 0
                if(element_qty > 1)
                {
                    //Setting Total
                    total_element = document.getElementById(`${data_id}_total`);
                    new_total = (element_qty-1) * price;
                    total_element.innerHTML = `$${new_total}`;

                    element.innerHTML = element_qty - 1;
            
                    //Ajax work starts here....
                    DEC_or_INC = 0;
                    $.ajax({
                    type:'POST',
                    url:"{{ route('cart_inc_or_dec') }}",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        data_id:data_id,
                        DEC_or_INC:DEC_or_INC},
                        success:function(data){
                            CalculateGrandTotal();
                    }
                    });

                }
               
            }
            function INC(arg)
            {
                console.log(arg.getAttribute('data-id'));

                data_id = arg.getAttribute('data-id');

                element = document.getElementById(`${data_id}_qty`);
                element_qty = parseInt(element.innerHTML);
                //Getting Price
                element_price = document.getElementById(`${data_id}_price`);
                // price = parseInt(element_price.innerHTML);
                price = element_price.innerHTML;
                var price = parseInt(price.substring(1));

                console.log(price);
                //Setting Total
                total_element = document.getElementById(`${data_id}_total`);
                new_total = (element_qty+1) * price;
                // total_element.innerHTML = (element_qty+1) * price;
                total_element.innerHTML = `$${new_total}`;

                element.innerHTML = element_qty + 1;

                CalculateGrandTotal()
                //Ajax work starts here....
                DEC_or_INC = 1;
                
                $.ajax({
                type:'POST',
                url:"{{ route('cart_inc_or_dec') }}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    data_id:data_id,
                    DEC_or_INC:DEC_or_INC},
                    success:function(data){
                        CalculateGrandTotal();
                }
                });
                
            }
            
        </script>



        <style type="text/css">
            .footer img.logo {
                height: 34px;
                margin-bottom: 0px;
                margin-right: 10px;
            }

            .footer h5 {
                font-size: 20px;
                margin-bottom: 10px;
            }

            a.homebtn {
                background: #010b80 !important;
            }

            .home-get-started img.picture {
                max-width: 600px;
            }
        </style>
        @include('user.layouts.footer')
        {{-- <footer class="footer darkmode">
            <div class="edge">
                <div class="row margin-top-2">
                    <div class="col-md">
                        <h5 class="ul-fold white">Sibuy</h5>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Sibuy</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">In your community</a></li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <h5 class="ul-fold white">Work with Sibuy</h5>
                        <ul>
                            <li><a href="#">Meet Sibuy</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <h5 class="ul-fold white">Community</h5>
                        <ul>
                            <li><a href="#">Community</a></li>
                            <li><a href="#">Apps</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Pentest</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="row">

                            <div style="float: right;width: 100%;text-align: right;">
                                <div class="col-*"> <img src="{{asset('assets/USER/img/heading/logo-alternate.png')}}"
                                        class="logo" alt="" width="34" height="34" loading="lazy"> </div>
                            </div>
                            <div class="col-md-6 col-lg-12 text-center text-md-left text-lg-right footer__newsletter">
                                <h5 class="white">Sign up for the Sibuy newsletter</h5>
                                <form>
                                    <input type="email" class="email" placeholder="Your e-mail address">
                                    <input type="submit" class="submit" value="Subscribe">
                                </form>
                            </div>
                            <div class="col-md-6 col-lg-12 text-center text-md-right footer__social">
                                <h5 class="white">Follow us on social media</h5>
                                <span class="footer__social-icons"> <span class="footer__social-icons-list"> <a href="#"
                                            target="_blank"><img alt="Facebook"
                                                src="{{asset('assets/USER/img/icons/facebook.svg')}}" width="24px"
                                                height="24px" /></a> <a href="#" target="_blank"><img alt="Instagram"
                                                src="{{asset('assets/USER/img/icons/instagram.svg')}}" width="24px"
                                                height="24px" /></a> <a href="#" target="_blank"><img alt="Youtube"
                                                src="{{asset('assets/USER/img/icons/youtube.svg')}}" width="24px"
                                                height="17px" /></a> <a href="#" target="_blank"><img alt="Twitter"
                                                src="{{asset('assets/USER/img/icons/twitter.svg')}}" width="24px"
                                                height="20px" /></a> </span> </span>
                            </div>
                            <div class="col-md-12 col-lg-12 text-center text-lg-right p-2 footer__copyright">
                                <p>Copyright © 2022 Sibuy – All rights reserved
                                    <br /> <a href="#" target="_blank">Privacy and Cookie Notice</a> | <a href="#"
                                        target="_blank">Terms and Conditions</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>
    <script src="{{asset('assets/USER/js/main.js')}}"></script>
    <script>
        function goto_discount(inp) {
                window.location.href = "./discount.php?id=" + inp;
            }
    </script>

    
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.min.js" integrity="sha512-i5xofbBta9oP3xclkdj0jO68kXE1tPeN8Jf3rwzsbwNrpFVifjhklWi8zMOOUscuMQaCPyIXl0TMWFjGwBaJxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <input type="hidden" id="WebPath" value="{{config('path.path.WebPath')}}">

<script>
    Pusher.logToConsole = true;
WebPath = document.getElementById('WebPath').value;
    var pusher = new Pusher('5c357c77e10eb34aedcb', {
        cluster: 'ap2',
        authEndpoint: `${WebPath}api/channelAuthorization`,
        auth: {
            headers: {
                "Authorization": `Bearer ${bearer_token}`,
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    });

    // var channel = pusher.subscribe(`private-messages-channel.${id}`);
    var channel = pusher.subscribe(`private-notification-channel.${id}`);
    channel.bind('notification.received', function(data) {

        // alert(data);
        console.log('---------------------------');
        console.log(data.notification.message);

        // $(`<div class="notification">
        //         ${data.notification.message}
        //          </div> `).insertBefore(".note_starter");


        if( data.notification.subject == 'Wishlist updated')
        {
            $(` <a class="note_anchors" href="{{url('wishlist')}}">
                            <div class="notification" style="background: #fac8c8">
                                ${data.notification.message}
                            </div>
                        </a>
                `).insertAfter(".note_starter");
            toastr.success(`${data.notification.message}`);
        }
        else if( data.notification.subject == 'New Deal')
        {
            $(` <a class="note_anchors" href="{{url('wishlist')}}">
                    <div class="notification" style="background: #bbb8ec">
                                ${data.notification.message}
                            </div>
                        </a>
                `).insertAfter(".note_starter");
            toastr.info(`${data.notification.message}`);
        }
        else if( data.notification.subject == 'New Deal Purchased')
        {
            $(` <a class="note_anchors" href="{{url('wishlist')}}">
                    <div class="notification" style="background: #69a6c5">
                                ${data.notification.message}
                            </div>
                        </a>
                `).insertAfter(".note_starter");
            toastr.success(`${data.notification.message}`);
        }
        else
        {
            $(`<div class="notification" style="background-color: #a8d2ee;">
                ${data.notification.message}
                 </div> `).insertAfter(".note_starter");
            toastr.success(`${data.notification.message}`);
        }

        
        // toastr.info(`${data.notification.message}`);
        // toastr.danger(`${data.notification.message}`);
     
        // $(".fa fa-bell").css("color", "yellow");
        document.getElementById('bellIcon').style.color = "#2f8fb3";
        // document.getElementById('bellIcon').style.font-size = "26px";.
        $("#bellIcon").css("font-size", "26px");
        

    });


    // $( document ).ready(function() {

            $("#bellIcon").click(function(){

            console.log(document.getElementById('bellIcon'));

            document.getElementById('bellIcon').style.color = "black";
            $("#bellIcon").css("font-size", "20px");
            });
    // });

    

</script>
@if(Session::has('success'))
<script>
    toastr.success("{!! Session::get('success') !!}");
</script>
@endif

</body>

</html>