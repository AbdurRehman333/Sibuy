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
            /* src: url("fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff2"), url("/fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff"); */
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
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            /* top: -9999px; */
            clip: rect(0, 0, 0, 0);
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .rate>input {
            position: absolute;
            /* top:-9999px; */
            clip: rect(0, 0, 0, 0);
        }

        /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
    </style>
    <div class="website">

        <script>
            $(document).ready(function(){
              $(".nav-menu__item").click(function(){
                // alert("The paragraph was clicked.");
                location.href = "categories";
              });
            });
        </script>

        @include('user.layouts.header')

        <main>
            <div class="home">
                <div id="section-intro" data-home-section class="bg-body" style="padding-top: 15vh;">
                    <div class="home-intro__body edge">
                        <div class="row">
                            <div class="col-md-12">

                                @if(Session::has('success'))
                                <p class="alert alert-success" style="    text-align-last: center;
                                ">{{ Session::get('success') }}</p>
                                @endif

                                @if(Session::has('info'))
                                <p class="alert alert-info" style="    text-align-last: center;
                                ">{{ Session::get('info') }}</p>
                                @endif

                                @if(Session::has('alert'))
                                <p class="alert alert-danger" style="    text-align-last: center;
                                ">{{ Session::get('alert') }}</p>
                                @endif


                                <h1>{{$deal['name']}}</h1>
                            </div>
                        </div>


                        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

                        

                         








                        <div class="row">




                              



                            <div class="col-md-8">



                                <div class="container">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                                      <!-- Indicators -->
                                      {{-- <ol class="carousel-indicators" style="display: none;"> --}}
                                      <ol class="carousel-indicators" style="">
                                        {{-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li> --}}

                                        @foreach($deal['images'] as $key => $image)
                                            @if($loop->first)
                                            <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
                                            @else
                                            <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
                                            @endif
                                        @endforeach
                                        
                                      </ol>
                                  
                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner">

                                        {{-- <div class="item active">
                                            <img src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.DealsPath').'/'.$deal['images'][0]['image'].''}}" class="crs_images" alt="Los Angeles" >
                                        </div> --}}

                                        <style>
                                            .iframeVid{
                                                width: 700px;
                                                height: 500px;
                                                max-width: 100%;
                                                /* height: auto; */
                                            }

                                            @media only screen and (max-width: 600px) {
                                                .iframeVid{
                                                /* width: 700px; */
                                                height: 200px;
                                                max-width: 100%;
                                                /* height: auto; */
                                                }
                                            }

                                        </style>
                                        
                                        @foreach($deal['images'] as $key => $image)

                                        @if($loop->first)
                                        <div class="item active">
                                            <img src="{{''.config('path.path.WebPath').''.config('path.path.DealsPath').'/'.$image['image'].''}}" class="crs_images" alt="Los Angeles" >
                                        </div>

                                        @else

                                            @if($image['mime_type'] == 'video')

                                            <div class="item ">
                                                <iframe class="iframeVid" 
                                                {{-- frameborder="0" --}}
                                                 allow="autoplay"
                                                {{-- width="700"  --}}
                                                {{-- allow="autoplay"  --}}
                                                {{-- height="500"  --}}
                                                {{-- src="{{''.config('path.path.WebPath').''.config('path.path.DealsVidPath').'/'.$image['image'].''}}?autoplay=1&muted=1&mute=1"> --}}
                                                src="{{''.config('path.path.WebPath').''.config('path.path.DealsVidPath').'/'.$image['image'].''}}?&autoplay=1&mute=1">
                                                </iframe>                                        
                                            </div> 

                                            @else

                                            <div class="item ">
                                                <img src="{{''.config('path.path.WebPath').''.config('path.path.DealsPath').'/'.$image['image'].''}}" class="crs_images" alt="Los Angeles" >
                                            </div>

                                            @endif

                                        @endif
                                        
                                        @endforeach


                                      </div>
                                  
                                      <style>
                                         @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");
                                      </style>
                                      <!-- Left and right controls -->
                                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        

                                        <span class="glyphicon glyphicon-chevron-right">  </span>
                                   
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </div>
                                  </div>
                                  

                                <style>
                                    .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
                                        display: block;
                                        max-width: 100%;
                                        height: auto;
                                    }
                                    .crs_images{
                                        height: 500px !important;
                                        width: 710px;
                                    }
                                    @media only screen and (max-width: 600px) {
                                    .crs_images {
                                        height: 266px !important;
                                        /* width: 700px; */
                                    }
                                    }
                                </style>



                                {{-- <img style='width:100%; height: 50vh; object-fit: contain;'
                                    src='{{'https://gigiapi.zanforthstaging.com/'.$deal['images'][0]['path'].'/'.$deal['images'][0]['image'].''}}' /> --}}
                                
                                    {{-- <img style='width:100%; height: 50vh; object-fit: contain;'
                                    src='admin/uploads/taDi9vzFnoarch.png' /> --}}
                                {{--
                                <hr> --}}

                                {{--
                                <hr> --}}
                                <h2>Tags</h2>
                                @foreach($deal['tags'] as $key => $value)
                                <span class="btn btn-default"> {{$value['tag']}} </span>
                                @endforeach

                                {{-- <h2>Branches</h2>
                                @if(count($deal['branches']) > 0)
                                @foreach($deal['branches'] as $key => $value)
                                <span class="btn btn-default visible" title="{{$value['address']}}" > {{$value['name']}} </span>
                                @endforeach
                                @else
                                <span>No Branch Available Yet.</span>
                                @endif --}}


                                <br />
                            </div>

                                {{-- <div title="This is my tooltip"> </div>

                                    <style>
                                        .visible {
                                        /* height: 3em; */
                                        /* width: 10em; */
                                        /* background: yellow; */
                                        }
                                </style> --}}


                            <div class="col-md-4">

                                @php
                                    $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                                    $blue_text =  $deal['price'] - $blue_text;


                                    $now = Carbon\Carbon::now();
                                    $expiry = $deal['additional_discount_date'];
                                    $result = $now->lt($expiry);

                                @endphp

                                {{-- <span class='old-price'>{{$deal['price']}}</span> --}}
                                {{-- <img style="    margin-bottom: 7px;margin-left: -4px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt=""> --}}
                                {{-- <span class='new-price'>${{$blue_text}}</span>&nbsp;
                                
                                {{-- @if($deal['type'] == 'Entire Menu')


                                    <span
                                    class='new-price' style="color: #000000;">Entire Menu
                                   
                                    </span>

                                    <span class='percent-off'>{{$deal['discount_on_price']}}%
                                        OFF</span>
                                    @if($deal['additional_discount'] && $result)
                                        @if($deal['additional_discount'] > 0)

                                        <span class='percent-off' style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                            OFF</span>
                                        
                                        @endif
                                    @else
                                    
                                    @endif
                                    

                                @else
                                
                                    <span class='old-price'>{{$deal['price']}}</span>
                                    <img style="    margin-bottom: 7px;margin-left: -4px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">
                                    
                                
                                    @if($deal['additional_discount'])

                                        @if($deal['additional_discount'] > 0 && $result)

                                            <span class='old-price' style="color: #1caffc;">{{$blue_text}}
                                                
                                               
                                            </span>
                                         
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">

                                            @php
                                                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) )
                                            @endphp
                                            
                                            <span
                                            class='new-price' style="color: #d30b0b;">{{$price_to_pay_in_double_discount}}
                                           
                                            </span>
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">

                                        @else


                                            <span class='new-price' style="">{{$blue_text}}
                                               
                                            </span>
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">

                                        @endif

                                    @else
                                        
                                        <span class='new-price'>{{$blue_text}}
                                           
                                        </span>
                                        <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">


                                    @endif
                                
                                


                                    @if($deal['additional_discount'] && $result)
                                        @if($deal['additional_discount'] > 0)

                                        <span class='percent-off badge badge-danger' style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                            OFF</span>
                                        
                                        @endif
                                    @else
                                    <span class='percent-off'>{{$deal['discount_on_price']}}%
                                        OFF</span>
                                    @endif

                                @endif --}}

                                
{{-- <div title="This is my tooltip" class="visible"> Hover</div> --}}

                                    
                                @if(session()->has('Authenticated_user_data'))
                                {{-- <button type='button' class='btn btn-primary' style='width: 100%; margin-top: 10px;'>Buy
                                    Now</button> --}}

                                <a href="{{ URL('add_to_cart/'.$deal['id'])}}">
                                    <button type='button' class='btn btn-warning'
                                        style='width: 100%; margin-top: 10px;'>
                                        Add to Cart
                                    </button>
                                </a>

                                <a href="{{ URL('add_to_wishlist/'.$deal['id'])}}">
                                    <button type='button' class='btn btn-danger'
                                        style='width: 100%; margin-top: 10px;'>
                                        Add to Wishlist
                                    </button>
                                </a>

                                @else
                                <p style="margin-top:20px;"> <a href="{{urL('login')}}"> Login / Signup to Buy Vouchers </a>
                                </p>
                                @endif


                               
                                    <div style="margin-top:14px;" class='nearkm'>Voucher Deal : 
                                        {{-- <a href="{{ URL('merchant_details/'.$deal['merchant_id'])}}">  --}}
                                            <span>{{$deal['name']}}</span>
                                        {{-- </a> --}}
                                    </div>
                                 
                                    <div style="margin-top:14px;" class='nearkm'>Price : 
                                        {{-- <a --}}
                                            {{-- href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"><span>{{$deal['price']}}</span></a> --}}

                                            {{-- href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"><span>$120</span> --}}
                                        {{-- </a> --}}
                                        <span>${{$deal['price']}}</span>
                                    </div>

                                    <div style="margin-top:14px;" class='nearkm'>Discount : 
                                        {{-- <a --}}
                                            {{-- href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"><span>{{$deal['price']}}</span></a> --}}

                                            {{-- href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"><span>$120</span> --}}
                                        {{-- </a> --}}
                                        <span>${{$deal['discount']}}</span>
                                    </div>
                                  
                                    {{-- <div style="margin-top:14px;" class='nearkm'>Product Name : <a
                                        href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"><span>$120</span></a>
                                        </div>
                                    

                                        <div style="margin-top:14px;" class='nearkm'>Product Price : <a
                                            href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"><span>$120</span></a>
                                    </div> --}}
                          

                                    <br>

                                @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                    {{-- <div style="margin-top: 20px;" class='nearkm'>Near <span>{{$deal['nearby']}} KMs</span></div>
                                    <div style="margin-top: 20px;" class='nearkm'>Nearest Branch <span>{{$deal['nearbyBranch']}}</span></div>
                                    <br /> --}}
                                    <div style=";" class='nearkm'>Merchant : 
                                        {{-- <a href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"> --}}
                                            <span>{{$deal['merchant_name']}}</span>
                                        {{-- </a> --}}
                                    </div>
                                    <br />
                                @elseif(!session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                                    {{-- <div style="margin-top: 20px;" class='nearkm'>Near <span>{{$deal['nearby']}} KMs</span></div>
                                    <div style="margin-top: 20px;" class='nearkm'>Nearest Branch <span>{{$deal['nearbyBranch']}}</span></div>
                                    <br /> --}}
                                    <div style=";" class='nearkm'>Merchant :
                                         {{-- <a
                                            href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"> --}}
                                            <span>{{$deal['merchant_name']}}</span>
                                        {{-- </a> --}}
                                    </div>
                                    <br />
                                @else
                                    {{-- <br /> --}}
                                    <div style="margin-top:14px;" class='nearkm'>Merchant : 
                                        {{-- <a
                                            href="{{ URL('merchant_details/'.$deal['merchant_id'])}}"> --}}
                                            <span>{{$deal['merchant_name']}}</span>
                                        {{-- </a> --}}
                                    </div>
                                    <br />
                                @endif

                                

                                {{-- @if($deal['additional_discount'] && $result)

                                <div style="" class='nearkm'>Deal Expiry :   <span style="color: #d30b0b;"> 
                                    
                                    {{Carbon\Carbon::parse($deal['additional_discount_date'])->format('d/m/Y')}}
                               
                                </span>
                                </div>
                                <br />

                                @else --}}

                                <div style="" class='nearkm'>Deal Expiry :   <span>{{$deal['expiry']}}</span>
                                </div>
                                <br />

                                <div style="" class='nearkm'>Deal Redemption Period :   <span>{{$deal['redeem_expiry']}}</span>
                                </div>
                                <br />

                                {{-- @endif --}}

                               
                                {{-- <span class='deal_des'> --}}
                                <span class=''>
                                    {{$deal['description']}}
                                </span>


                                <style>
                                    .chat_open_anchor:hover{
                                        text-decoration: none;
                                    }
                                </style>

                                {{-- @if(session()->has('Authenticated_user_data'))
                                    @if(session()->get('Authenticated_user_data')['type'] == 1)
                                    <div style="    text-align: -webkit-center; margin-top:2rem;">
                                        <span class='button_chat'>
                                            <a class="chat_open_anchor" href="{{url('chatWithMerchant/'.$deal['merchant_id'])}}">  
                                                <button class="btn btn-info" style="padding: 15px;font-size: 16px;">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>  Open Chat </button> </a> 
                                        </span>
                                    </div>
                                    @endif
                                @endif --}}

                                {{-- <div class="col-md-8"> --}}
                                    {{--
                                    <hr>
                                    <h2>Tags</h2>
                                    @foreach($deal['tags'] as $key => $value)
                                    <span class="btn btn-default"> {{$value['tag']}} </span>
                                    @endforeach

                                    <h2>Branches</h2>
                                    @if(count($deal['branches']) > 0)
                                    @foreach($deal['branches'] as $key => $value)
                                    <span class="btn btn-default"> {{$value['name']}} </span>
                                    @endforeach
                                    @else
                                    <span>No Branch Available Yet.</span>
                                    @endif --}}


                                    <br />
                                    {{--
                                </div> --}}

                                <br />
                            </div>


                        </div>

                        <hr>

                        @if(session()->has('Authenticated_user_data') && (int)session()->get('Authenticated_user_data')['type'] == 1)

                        <div class="row">
                            <div style="width: 100%">
                                <h2>Write A Review</h2>
                                <div class="" style="border: 0.2px solid black;
                                    padding: 15px;     margin-bottom: 19px;">
                                    <form class="" action="{{url('addReviewOnDeal', [" id"=> $deal['id'],])}}"
                                        method="POST">
                                        @csrf
                                        <div class="rate">
                                            <input type="radio" id="star_edit_5" name="rating" value="5" />
                                            <label for="star_edit_5" title="text">5 stars</label>
                                            <input type="radio" id="star_edit_4" name="rating" value="4" />
                                            <label for="star_edit_4" title="text">4 stars</label>
                                            <input type="radio" id="star_edit_3" name="rating" value="3" />
                                            <label for="star_edit_3" title="text">3 stars</label>
                                            <input type="radio" id="star_edit_2" name="rating" value="2" />
                                            <label for="star_edit_2" title="text">2 stars</label>
                                            <input type="radio" id="star_edit_1" name="rating" value="1" />
                                            <label for="star_edit_1" title="text">1 star</label>
                                        </div>

                                        <input type="hidden" value="{{$deal['merchant_id']}}" name="merchant_id">

                                        <p> <textarea style="width: 100%;" name="notes" id=""></textarea> </p>

                                        <div style="       margin: -31px;
                                        text-align: center;
                                        margin-top: 11px;
                                        padding: 10px;
                                        margin-bottom: -6px;">
                                            <button style="" class="btn btn-info" type="submit">Submit </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        @else
                        <div>Login to give feeback!</div>
                        @endif




                        <style>
                            .fa-star:before {
                                content: '★' !important;
                            }

                            .checked {
                                color: #c59b08;
                            }
                        </style>

                        <div class="row">
                            <div style="width: 100%">
                                @if($reviews)
                                <h2>Reviews</h2>
                                @endif

                                @foreach ($reviews as $key => $r)
                                    
                                <div class="" style="
                                    padding: 15px;     margin-bottom: 5px;">

                                    <input type="hidden" id="{{$key}}_revRating" value="{{$r['rating']}}">

                                    <div class="rating" style="margin-bottom: 7px;">
                                    @for($i = 1; $i < 6; $i++)
                                        @if($r['rating'] >= $i)
                                        <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                        @else
                                        <span class="star_statis_class fa-lg fa fa-star "></span>
                                        @endif
                                    @endfor
                                    </div>
                                  
                                    <p style="margin-bottom: 8px;"> 
                                        <span> <strong>{{$r['user_name']}}</strong> : </span>  

                                        <span class="review_Note" id="{{$key}}_revNote"  data-id="{{$r['id']}}">{{$r['notes']}} </span>

                                        @if(session()->has('Authenticated_user_data'))
                                            @if(session()->get('Authenticated_user_data')['id'] == $r['user_id'])
                                            <span style="float:right; color:rgb(57, 122, 132);">
                                                <button data-id="{{$key}}" class="revEditBtn" data-toggle="modal" data-target="#exampleModal" type="button">Update Your Review</button>
                                            </span>
                                    
                                            @endif
                                        @endif

                                        @if($r['child'] > 0)
                                            @foreach($r['replies'] as $key => $reply)
                                                <p style="margin-top: 5px;margin-left:20px;"> <strong> - {{$reply['user_name']}} : </strong> {{$reply['notes']}} </p>
                                            @endforeach
                                        @endif

                                    </p>
                                        


                                </div>

                                @endforeach

                                <script>
                                    $(document).on("click",".revEditBtn",function() {
                                        id = $(this).data("id");
                                        review_note = document.getElementById(`${id}_revNote`).innerHTML;
                                        review_id = document.getElementById(`${id}_revNote`).getAttribute('data-id');
                                        review_rating = document.getElementById(`${id}_revRating`).value;

                            
                                        document.getElementById(`noteText`).innerHTML = review_note;

                                        document.getElementById(`rating_old`).value = review_rating;

                               
                                        if(review_rating == 1)
                                        {
                                            document.getElementById(`oldRating`).innerHTML = `
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            `;
                                        }
                                        if(review_rating == 2)
                                        {
                                            document.getElementById(`oldRating`).innerHTML = `
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            `;
                                        }
                                        if(review_rating == 3)
                                        {
                                            document.getElementById(`oldRating`).innerHTML = `
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            <span class="star_statis_class fa-lg fa fa-star "></span>
                                            `;
                                        }
                                        if(review_rating == 4)
                                        {
                                            document.getElementById(`oldRating`).innerHTML = `
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star"></span>
                                            `;
                                        }
                                        if(review_rating == 5)
                                        {
                                            document.getElementById(`oldRating`).innerHTML = `
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            <span class="star_statis_class fa-lg fa fa-star checked"></span>
                                            `;
                                        }


                                    });

                                </script>

                                <style>
                                    * {
                                        margin: 0;
                                        padding: 0;
                                    }
                            
                                    .rate_edit {
                                        float: left;
                                        height: 46px;
                                        padding: 0 10px;
                                    }
                            
                                    .rate_edit:not(:checked)>input {
                                        position: absolute;
                                        clip: rect(0, 0, 0, 0);
                                    }
                            
                                    .rate_edit:not(:checked)>label {
                                        float: right;
                                        width: 1em;
                                        overflow: hidden;
                                        white-space: nowrap;
                                        cursor: pointer;
                                        font-size: 30px;
                                        color: #ccc;
                                    }
                            
                                    .rate_edit:not(:checked)>label:before {
                                        content: '★ ';
                                    }
                            
                                    .rate_edit>input:checked~label {
                                        color: #ffc700;
                                    }
                            
                                    .rate_edit:not(:checked)>label:hover,
                                    .rate_edit:not(:checked)>label:hover~label {
                                        color: #deb217;
                                    }
                            
                                    .rate_edit>input:checked+label:hover,
                                    .rate_edit>input:checked+label:hover~label,
                                    .rate_edit>input:checked~label:hover,
                                    .rate_edit>input:checked~label:hover~label,
                                    .rate_edit>label:hover~input:checked~label {
                                        color: #c59b08;
                                    }
                            
                                    .rate_edit>input {
                                        position: absolute;
                                        clip: rect(0, 0, 0, 0);
                                    }
                            
                                </style>
                                <style>
                                    .rate_edit{
                                        display: none;
                                    }
                                </style>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Review</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        

                                        <div class="" style="
                                            padding: 15px;     margin-bottom: 19px;">
                                            <form class="" action="{{url('editReviewOnDeal', [" id"=> $deal['id'],])}}"
                                                method="POST">
                                                @csrf
                                                
                                                <input type="hidden" name="rating_old" id="rating_old">

                                                <div id="oldRating" style="    margin-bottom: 12px;">

                                                </div>


                                                <div class="rate_edit" id="rate_edit">
                                                    <input type="radio" id="star5" name="rating_new" value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rating_new" value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rating_new" value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rating_new" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rating_new" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>


                                                <p> <textarea style="width: 100%;border:1px solid gray;padding:5px;" name="notes" id="noteText"></textarea> </p>

                                                <div style="       margin: -31px;
                                                    text-align: center;
                                                    padding: 10px; 
                                                    margin-bottom: -6px;">
                                                    <button style="" class="btn btn-info" type="submit"> Submit </button>
                                                </div>
                                            </form>
                                        </div>

                                        </div>
                           
                                    </div>
                                    </div>
                                </div>


                                <script>
                                    $(document).on("click","#oldRating",function() {
                                        console.log(review_rating);
                                        console.log(review_note);
                                        console.log(review_id);

                                        document.getElementById("oldRating").style.display = "none";
                                        document.getElementById("rate_edit").style.display = "block";



                                    });
                                </script>

                               

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </main>



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
      
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}


    <script src="{{asset('assets/USER/js/main.js')}}"></script>

    
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