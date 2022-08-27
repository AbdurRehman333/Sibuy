<!doctype html>
<html lang="en-US" data-hy-language="en" data-hy-locale="us" data-hy-locale-default="us">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>GiGi</title>
    <link rel="canonical" href="index.html" />
    <link rel="alternate" hreflang="en-US" href="index.html" />
    <link rel="alternate" href="index.html" hreflang="x-default" />
    <meta property="og:image" content="{{asset('assets/USER/img/icons/128.png')}}" />
    <link rel="icon" href="{{asset('assets/USER/img/icons/128.png')}}" />
    <link href="{{asset('assets/USER/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" type="{{asset('assets/USER/image/png')}}" href="{{asset('assets/USER/img/icons/128.png')}}" />
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
    <link rel="preload" type="font/woff2" href="{{asset('assets/USER/fonts/icons.woff2')}}" as="font" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'icons';
            /* src: url("fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff2"), url("/fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff"); */
            src: url("{{asset('assets/USER/fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff2"), url("{{asset('assets/USER//fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff");
        }
    </style>
    <!--PreLoad page specific JS -->
    <link rel="preload" as="script" href="{{asset('assets/USER/js/main.js')}}">





    {{-- <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script> --}}




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.min.css" integrity="sha512-HPSfJxnyVYJb4v9afT3fXvs0mXvdg/C7eYxBl1EYS7uQHuCU/0lSGhaH9o23Tw8FofBiGQfFWzMYD9TqK8tv/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Favicon icon -->

    {{-- <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"> --}}
 









    <script src="{{asset('js/app.js')}}"></script>

</head>
<style type="text/css">
    .cui-c-featured-card-carousel {
        display: flex;
    }

    .card-ui {
        background-color: #fff;
        box-sizing: border-box;
        margin: 0 0 60px;
        padding: 0 10px;
        position: relative;
        width: 100%;
    }

    .cui-c-featured-card-carousel .cui-sub-featured-tiles {
        -ms-overflow-style: none;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        list-style-type: none;
        overflow: visible;
        padding: 0;
        position: relative;
        scrollbar-width: none;
        white-space: nowrap;
        width: 488px;
    }

    .cui-c-sub-featured-tile:first-of-type {
        margin-bottom: 24px;
    }

    .cui-c-sub-featured-tile {
        border-radius: 6px;
        box-shadow: 0 2px 8px 0 rgb(0 0 0 / 20%);
        flex-shrink: 0;
        height: 220px;
        margin-right: 24px;
        overflow: hidden;
        width: 220px;
    }

    .cui-c-sub-featured-tile .cui-sub-featured-content {
        display: flex;
        height: 100%;
        position: relative;
    }

    .cui-c-sub-featured-tile .cui-sub-featured-overlay {
        background: linear-gradient(180deg, transparent, rgba(0, 0, 0, .65));
        height: 100%;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .cui-c-sub-featured-tile .cui-sub-featured-image {
        width: 100%;
    }

    .cui-c-sub-featured-tile .cui-sub-featured-title {
        bottom: 0;
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        height: 48px;
        line-height: 24px;
        margin-bottom: 16px;
        overflow: hidden;
        padding: 0 16px;
        position: absolute;
        text-align: center;
        width: 100%;
    }

    .cui-hyphenate {
        word-wrap: break-word;
        -webkit-hyphens: auto;
        hyphens: auto;
        overflow-wrap: break-word;
        white-space: normal;
    }

    .cui-c-featured-card-carousel .cui-featured-card {
        border-radius: 6px;
        box-shadow: 0 2px 8px 0 rgb(0 0 0 / 20%);
        flex: 1;
        height: 464px;
        overflow: hidden;
    }

    .cui-c-featured-card-carousel .cui-featured-content {
        display: flex;
        flex-direction: column;
        height: 464px;
        justify-content: center;
        position: relative;
    }

    .cui-c-featured-card-carousel .cui-featured-overlay {
        background: radial-gradient(50% 50% at 50% 50%, rgba(0, 0, 0, .3) 0, transparent 100%);
        height: 100%;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .cui-c-featured-card-carousel .cui-featured-image {
        height: 100%;
        object-fit: cover;
    }

    .cui-c-featured-card-carousel .cui-featured-text {
        align-items: center;
        color: #fff;
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: center;
        padding: 16px;
        position: absolute;
        text-align: center;
        top: 0;
        width: 100%;
    }

    .cui-c-featured-card-carousel .cui-featured-title {
        font-size: 32px;
        font-weight: 800;
        line-height: 36px;
        margin-bottom: 8px;
    }

    .cui-c-featured-card-carousel .cui-featured-description {
        font-size: 16px;
        font-weight: 600;
        line-height: 24px;
        text-decoration: underline;
    }

    section#last-three-cards figure.cui-c-sub-featured-tile {
        margin-left: 24px;
        margin-right: 0;
        width: 100%;
    }

    section#last-three-cards .first-box {
        background: #3c95f9;
    }

    section#last-three-cards .second-box {
        background: #010080;
    }


    #last-three-cards .cui-c-sub-featured-tile .cui-sub-featured-title {
        bottom: 0;
        color: #fff;
        font-size: 28px;
        font-weight: 500;
        height: 150px;
        line-height: 38px;
        margin-bottom: 16px;
        overflow: hidden;
        padding: 0 150px 0 16px;
        position: absolute;
        text-align: left;
        width: 100%;
    }

    #last-three-cards .cui-featured-description {
        font-weight: 400;
        margin-top: 20px;
        font-size: 15px;
    }

    #last-three-cards .big-box .featured-text {
        align-items: center;
        color: #fff;
        height: 100%;
        padding: 320px 170px 0px 40px;
        position: absolute;
        text-align: left;
        top: 0;
        width: 100%;
    }
</style>

<body style="padding: 0em;">
    <div class="website">


       @include('user.layouts.header')

       
<style>
    .chatbox{
        height: 0vh !important;
        left: 0px !important;
    }
</style>
<script>
    // user_click_to_open_chatBox
    // contacts_in_chat
    // chat_box

    $(document).ready(function(){
        $(".user_click_to_open_chatBox").click(function(){
            console.log('user_click_to_open_chatBox')

            $(".contacts_in_chat").addClass("d-none");
            $(".chat_box").removeClass("d-none");
            $(".chat_box").addClass("chatbox_add_class");

            // alert("The paragraph was clicked.");

        });
        });

</script>



        <div>

            @include('user.layouts.chat')

        </div>

       
        {{-- @if(session()->has('Authenticated_user_data'))
        <h1> {{session()->get('Authenticated_user_data')['token']}} </h1>
        @endif --}}

        <main>
            <div class="home">
                <div id="section-intro" data-home-section class="home-intro bg-body">
                    <div class="home-intro__body edge margin-top-2 margin-md-top-10">
                        <div class="row">
                            <div class="col-md-9 col-lg-7 trim">
                                <h1 class="home-intro__title text-preset-hero-0">All Discounts & Deals<br />
                                    under one App</h1>
                                <p class="home-intro__caption text-preset-hero-3 color-text-medium">Switch to the app!
                                    Search, purchase, and redeem Coupon directly from your mobile device.</p>
                                <div class="row sliderbtn">
                                    <div class="col-md-4"> <a href=""><img src="{{asset('assets/USER/img/pages/home/appstore.png')}}" alt=""
                                                loading="lazy" width="197" height="59"></a> </div>
                                    <div class="col-md-6"> <a href=""><img src="{{asset('assets/USER/img/pages/home/playstore.png')}}" alt=""
                                                loading="lazy" width="197" height="59"></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="edge home-intro__video-wrapper">
                        <div class="home-intro__video-container">
                            <picture> <img width="960" height="600" class="image_class home-intro__video-poster"
                                    src="{{asset('assets/USER/sequence/pages/home/hero/base2.png')}}"
                                    srcset="{{asset('assets/USER/sequence/pages/home/hero/base2.png')}} 1x, {{asset('assets/USER/sequence/pages/home/hero/base2.png')}} 2x"
                                    alt="Homey Pro" /> </picture>
                        </div>
                    </div>


                    <style>

                        @media only screen and (max-width: 1474px) {
                            .wrapper_class{
                                /* position: inherit !important; */
                                position: revert !important;
                            }

                            .image_class{
                                display: none !important;
                            }
                          
                        }

                        
                            
                        
                    </style>




                    <div class="home-intro__curve-wrapper wrapper_class">
                        <div class="home-intro__curve">
                            <svg class="home-intro__curve-svg " width="2700px" height="280px" viewBox="0 0 2700 280">
                                <path
                                    d="M390,199 C977.024038,199 1391.86307,-4.26325641e-13 1731.86307,-4.26325641e-13 C2071.86307,-4.26325641e-13 2384.68099,100 2700,100 L2700,279 C2523.32192,279.112879 2393.32192,279.192899 2310,279.240062 C1231.90158,279.850297 591.663884,279.770276 390,279 L0,279 L0,199 L390,199 Z"
                                    id="Path-20" fill="#FFFFFF"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- Start Devices -->
                <section id="section-devices" data-home-section="devices" class="margin-top-5">
                    <div class="edge">
                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-1 "
                            style="color: #2bb673;">We Have Special Categories to Select Right Deals for you!</h2>
                        <!-- Start Devices: Smart Home -->
                        <section data-home-section-item="device-tiles"
                            class="row align-items-center position-relative z-index-0">
                            <div class="home-circle home-circle--devices"></div>
                            <div class="col-md-6">
                                <h3 class="text-preset-hero-2">Browse our Categories</h3>
                                <p class="text-preset-body-large">With GiGi app you can access thousand of discounts at
                                    nearby restaurants, salons, retailers, grocery stores, doctor's clinic and so much
                                    more.</p>
                            </div>
                            <div class="col-md-6 flex">
                                <div class="home-devices">

                                    <style>
                                        @media only screen and (max-width: 536px) {
                                        .imgIsThisForBoxIconTop{
                                            height: 60px;
                                        }
                                        
                                        }
                                        @media only screen and (max-width: 404px) {
                                        .imgIsThisForBoxIconTop{
                                            height: 56px;
                                            width: 61%;
                                        }
                                        }
                                        
                                        @media only screen and (max-width: 370px) {
                                        .imgIsThisForBoxIconTop{
                                            height: 40px;
                                        }
                                        }

                                        @media only screen and (max-width: 315px) {
                                        .imgIsThisForBoxIconTop{
                                            height: 31px;
                                            width: 54%;
                                        }
                                        }


                                    </style>

                                    @foreach($categorySection as $key => $box)
                                    <a href="{{url('DealsByCat/'.$box['data_id'])}}">
                                        <div class="home-devices__item">
                                            <div class="home-device-ratio">
                                                <div data-home-device-tile class="home-device home-device--large">
                                                    <div class="home-device__content">
                                                        <div class="home-device__icon"><img width="60" class="imgIsThisForBoxIconTop"
                                                                src="{{'https://gigiapi.zanforthstaging.com/'.$box['imagePath'].'/'.$box['image'].''}}" alt="Couples" />
                                                        </div>
                                                    </div>
                                                    <div class="home-device__title">{{$box['text']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                    
                                    

                                    <div class="home-devices__item alternate gradient-button-blue-small">
                                        <div class="home-device-ratio">
                                            <a href="{{url('categories')}}">
                                                <div data-home-device-tile class="home-device home-device--large">
                                                    <div class="home-device__content">
                                                        <div class="home-device__icon"><img width="40"
                                                                src="{{asset('assets/USER/img/pages/home/category/more-information.png')}}"
                                                                alt="Couples" /></div>
                                                    </div>
                                                    <div class="home-device__title">Explore More</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>


                        <style>
                            .trendingSeemoreanchor:hover{
                                text-decoration: none;
                            }
                        </style>
                        <!-- End Devices: Smart Home -->
                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
                            style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">
                            Trending Deals for You <span> <a style="font-size: 20px;" class="trendingSeemoreanchor" href="{{url('TrendingDealsSeeMore')}}"> See More </a> </span> </h2> 


                        <style>
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
                            margin-left: 7px;
                            }
                            .new-price {
                            color: #1caffc;
                            font-size: 20px;
                            font-weight: bold;
                            margin-left: 5px;}

                            .old-price {
                            color: #666;
                            font-size: 20px;
                            font-weight: bold;
                            text-decoration: line-through;}

                            .anchor_trending:hover{
                                text-decoration: none;
                            }
                        </style>
                            <style>
                                @media only screen and (max-width: 744px) {
                                        .random_text{
                                            display: none;
                                        }
                                    }
                            </style>
                        @php
                            $second_line = 0;
                        @endphp
                        <!-- Start Devices: Smart Home -->
                        <section data-home-section-item="device-tiles"
                            class="row align-items-center position-relative z-index-0">
                            <div class="home-circle home-circle--devices"></div>
                            @foreach($trendingDeals as $key => $deal)


                            

                            {{-- @foreach ($trendingDeals as $d)
                                @php
                                    $length = Str::length($d['name']);
                                    if($length > 17)
                                    {
                                        $second_line = 1;
                                    }
                                @endphp
                            @endforeach --}}

                            {{-- <div>Hilaweal <i class="fa fa-heart" aria-hidden="true"></i></div> --}}
                                @if($key==4)
                                    @php
                                        break;
                                    @endphp
                                @endif

                            <div class='col-md-3 discount-card Anchor_included_all' style='padding: 10px; cursor: pointer;text-align: center;' data-id="{{$deal['id']}}">

                                @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                    <span class="ma_heart" data-id="{{$deal['id']}}" id="{{$deal['id']}}_maHeart" onmouseover="maHeartHover(this)"
                                        style="
                                        font-size: 37px;
                                        right: 0;
                                        color : #b45b5b;
                                        position: absolute;"
                                        ><i class="fa fa-heart" aria-hidden="true"></i></span>
                                @endif

                                <a class="anchor_trending" href="{{ URL('discount_details/'.$deal['id'])}}">
                                <img style='width:100%; height:264px; object-fit: contain;' src='{{'https://gigiapi.zanforthstaging.com/'.$deal['image']['path'].'/'.$deal['image']['image'].''}}' />
                                
                                <p style="margin-bottom: 0px;"><span>{{$deal['merchant_name']}}</span></p>
                                
                                

                                {{-- @php
                                    $length = Str::length($deal['name']);
                                @endphp
                                <b style='font-size: 18px;'>{{$deal['name']}} {{$length}}</b>
                                
                                @if($length < 18)
                                    @if($second_line == 1)
                                    <b style='font-size: 18px; visibility:hidden'>{{$deal['name']}} {{$length}}</b>
                                    @endif
                                @endif --}}
                                
                                {{-- new code  --}}
                                @php
                                $length = Str::length($deal['name']);
                                @endphp

                                @if($length >= 0  && $length < 10)
                                <b style='font-size: 18px;'>{{$deal['name']}} 
                                    <span class="random_text {{$length}}" style="visibility: hidden;">11111111111111111111111111111111111111</span>
                                </b>
                                @elseif($length >= 10 && $length < 20)

                                <b style='font-size: 18px;'>{{$deal['name']}} 
                                    <span class="random_text {{$length}}" style="visibility: hidden;">34239042308402938049151</span>
                                </b>
                                @elseif($length >= 20 && $length < 30)

                                <b style='font-size: 18px;'>{{$deal['name']}} 
                                    <span class="random_text {{$length}}" style="visibility: hidden;">342390423084029</span>
                                </b>
                                
                                @else
                                <b style='font-size: 18px;'>{{$deal['name']}}</b>
                                @endif

                                {{-- new code  --}}

                                {{-- @php
                                    $length = Str::length($deal['name']);
                                @endphp
                                @if($length < 20)

                                <b style='font-size: 18px;'>{{$deal['name']}} 
                                    <span class="random_text" style="visibility: hidden;">34239042308402938049151</span>
                                </b>
                                
                                @else
                                <b style='font-size: 18px;'>{{$deal['name']}}</b>
                                @endif --}}


                                </a>

                                <br /><span class='deal_des'>
  
                                    
                                    {{ substr($deal['description'], 0, 30)}}...
                                

                                    @php
                                    $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                                    $blue_text =  $deal['price'] - $blue_text;

                                    $now = Carbon\Carbon::now();
                                    $expiry = $deal['additional_discount_date'];
                                    $result = $now->lt($expiry);
                                    @endphp

   
                                    <br>

                                    @if($deal['type'] == 'Entire Menu')
                                                
                                        <span
                                            class='new-price' style="color:#653030;">Entire Menu</span>


                                        &nbsp;
                                        @if($deal['additional_discount']  && $result)
                                            @if($deal['additional_discount'] > 0)

                                            <span class='percent-off'  style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                                OFF</span>
                                            
                                            @endif
                                        @else
                                            <span class='percent-off'>{{$deal['discount_on_price']}}% OFF</span>
                                        @endif

                                    @else

                                        @if($deal['additional_discount']  && $result)
                                            @if($deal['additional_discount'] > 0)

                                            <span class='old-price'>{{$deal['price']}}</span>
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">


                                            <span class='old-price'>{{$blue_text}}</span>
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">


                                            @php
                                                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) )
                                            @endphp
                                            
                                            <span
                                            class='new-price' style="color:#d30b0b;">{{$price_to_pay_in_double_discount}}Azn</span>

                                            @endif
                                        @else
                                            <span class='old-price'>{{$deal['price']}}</span>
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">


                                            <span
                                                class='new-price'>{{$blue_text}}</span>
                                                <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">

                                        @endif

                                        &nbsp;
                                        @if($deal['additional_discount']  && $result)
                                            @if($deal['additional_discount'] > 0)

                                            <span class='percent-off'  style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                                OFF</span>
                                            
                                            @endif
                                        @else
                                            <span class='percent-off'>{{$deal['discount_on_price']}}% OFF</span>
                                        @endif

                                    @endif


                                @if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                                <hr>
                                <div class='location'>{{$deal['nearbyBranch']}}</div>
                                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}} KMs</span></div>
                                @elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                <hr>
                                <div class='location'>{{$deal['nearbyBranch']}}</div>
                                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}} KMs</span></div>
                                @else
                                @endif
                                
                            </div>
                            {{-- <a href="{{ URL('discount_details/'.$deal['id'])}}"> --}}

                                {{-- <div class="col-md-3 discount-card" style="padding: 10px;text-align: center;">

                                    <a href="{{ URL('discount_details/'.$deal['id'])}}">
                                        <img style="width:100%; height: 200px; object-fit: contain;"
                                            src="{{asset('assets/USER/admin/uploads/taDi9vzFnoarch.png')}}">
                                            
                                        <b style="font-size: 18px;">{{$deal['name']}}</b>
                                    </a>

                                    <br>
                                    <span class="deal_des">{{ substr($deal['description'], 0, 40)}}...</span>
                                    @php
                                        $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                                        $blue_text =  $deal['price'] - $blue_text;
                                    @endphp

                                    <br>
                                    <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                        class="percent-off">{{$deal['discount_on_price']}}% OFF</span>
                                    <hr>
                                    <div class="location">875 North Dearborn Street, Chicago</div>
                                    <div class="nearkm">Near <span>10 KMs</span></div>
                                </div> --}}
                                
                            {{-- </a> --}}

                                
                            @endforeach
                        </section>


                        <style>
                            @media only screen and (max-width: 536px) {
                            .fivecardsUpper{
                                text-align: center;
                            }
                            .featrtilesUpper{
                                /* display:table-footer-group; */
                                display: contents !important;
                                justify-content: center;
                            }
                            .featurecardCrUpper{
                                display: unset;
                                text-align: -webkit-center;
                            }
                            .last_imageUpper{
                                /* height: 100%; */
                                height: 300px !important;
                            }
                            .tileAfter1Upper{
                                margin-bottom: 20px;
                            }
                            .card_to_changeUpper
                            {
                                height: 300px !important;
                                width: 80% !important;  // just test
                            }
                            .content_to_changeUpper
                            {
                                height: 300px !important;
                            }
                            }
                        </style>


                        <!-- End Devices: Smart Home -->
                        <section id="five-cards fivecardsUpper" class="margin-top-5">

                            <figure class="card-ui cui-c-featured-card-carousel featurecardCrUpper">

                                <ul class="cui-sub-featured-tiles featrtilesUpper" style="    justify-content: center;">
                                    <figure class="cui-c-sub-featured-tile">
                                        <a href="{{url('DealsByCat/'.$upperImageSection[0]['data_id'])}}">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$upperImageSection[0]['imagePath'].'/'.$upperImageSection[0]['image'].''}}"
                                                    alt="Makeup">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box1.png')}}"
                                                    alt="Makeup"> --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$upperImageSection[0]['text']}}</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile  tileAfter1Upper" >
                                        <a href="{{url('DealsByCat/'.$upperImageSection[1]['data_id'])}}">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$upperImageSection[1]['imagePath'].'/'.$upperImageSection[1]['image'].''}}"
                                                    alt="Makeup">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box1.png')}}"
                                                    alt="Makeup"> --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$upperImageSection[1]['text']}}</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile tileAfter1Upper">
                                        <a href="{{url('DealsByCat/'.$upperImageSection[2]['data_id'])}}">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$upperImageSection[2]['imagePath'].'/'.$upperImageSection[2]['image'].''}}"
                                                    alt="Makeup">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box1.png')}}"
                                                    alt="Makeup"> --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$upperImageSection[2]['text']}}</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile tileAfter1Upper">
                                        <a href="{{url('DealsByCat/'.$upperImageSection[3]['data_id'])}}">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$upperImageSection[3]['imagePath'].'/'.$upperImageSection[3]['image'].''}}"
                                                    alt="Makeup">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box1.png')}}"
                                                    alt="Makeup"> --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$upperImageSection[3]['text']}}</div>
                                            </div>
                                        </a>
                                    </figure>

                                </ul>
                                <figure class="cui-featured-card card_to_changeUpper">
                                    <a href="{{url('DealsByCat/'.$upperImageSection[4]['data_id'])}}">
                                        <div class="cui-featured-content content_to_changeUpper">
                                            <div class="cui-featured-overlay"></div>

                                            <img class="cui-sub-featured-image last_imageUpper" src="{{'https://gigiapi.zanforthstaging.com/'.$upperImageSection[4]['imagePath'].'/'.$upperImageSection[4]['image'].''}}"
                                                alt="Makeup">
                                            {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box5.png')}}"
                                                alt="Makeup"> --}}

                                            <div class="cui-featured-text" style="color:#FFFFFF">
                                                <div class="cui-featured-title">
                                                    {{$upperImageSection[4]['text']}}
                                                </div>

                                                <div class="cui-featured-description">
                                                    Shop Now
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </figure>


                                

                                {{-- <ul class="cui-sub-featured-tiles" style="    justify-content: center;">
                                    
                                    <figure class="cui-c-sub-featured-tile">
                                        <a href="#">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box1.png')}}"
                                                    alt="Makeup">

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    Makeup</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile">
                                        <a href="#">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box2.png')}}"
                                                    alt="Salons">

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    Salons</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile">
                                        <a href="#">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box3.png')}}"
                                                    alt="Spas">

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    Spas</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile">
                                        <a href="#">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box4.png')}}"
                                                    alt="Face & Skin Care">

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    Face &amp; Skin Care</div>
                                            </div>
                                        </a>
                                    </figure>
                                </ul>
                                <figure class="cui-featured-card">
                                    <a href="#">
                                        <div class="cui-featured-content">
                                            <div class="cui-featured-overlay"></div>

                                            <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/box5.png')}}"
                                                alt="Makeup">

                                            <div class="cui-featured-text" style="color:#FFFFFF">
                                                <div class="cui-featured-title">
                                                    Beauty &amp; Spa
                                                </div>

                                                <div class="cui-featured-description">
                                                    Shop Now
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </figure> --}}
                            </figure>

                        </section>


                        @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)


                        @if(session()->has('AuthenticatedUserSelectedCities'))
                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
                        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Top
                        Seller in <span style="color: #4592fc;">{{session()->get('AuthenticatedUserSelectedCities')}}</span></h2>
                        @else
                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
                        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Top
                        Seller in <span style="color: #4592fc;">{{session()->get('Authenticated_user_data')['location']['city']}}</span></h2>
                        @endif
             

                        @elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))

                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
                        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Top
                        Seller in <span style="color: #4592fc;">{{session()->get('unAuthUserLocations')['city']}}</span></h2>
                        
                        @else
                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
                            style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Deals On GiGi</span></h2>
                        @endif

                        <!-- Start Devices: Smart Home -->
                        <section data-home-section-item="device-tiles"
                            class="row align-items-center position-relative z-index-0">

                            @foreach($TopSellers as $key => $deal)

                            @if($key == 4)
                                @php
                                    break;
                                @endphp
                            @endif
                            <div class='col-md-3 discount-card Anchor_included_all' style='padding: 10px; cursor: pointer;text-align: center;' data-id="{{$deal['id']}}">

                                @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                    <span class="ma_heart" data-id="{{$deal['id']}}" id="{{$deal['id']}}_TopSellermaHeart" onmouseover="maHeartHover(this)"
                                        style="
                                        font-size: 37px;
                                        right: 0;
                                        color : #b45b5b;
                                        position: absolute;"
                                        ><i class="fa fa-heart" aria-hidden="true"></i></span>
                                @endif

                                <a class="anchor_trending" href="{{ URL('discount_details/'.$deal['id'])}}">
                                <img style='width:100%; height:264px;;object-fit: contain;' src='{{'https://gigiapi.zanforthstaging.com/'.$deal['image']['path'].'/'.$deal['image']['image'].''}}' />


                                <p style="margin-bottom: 0px;"><span>{{$deal['merchant_name']}}</span></p>
                                {{-- new code  --}}
                                @php
                                $length = Str::length($deal['name']);
                                @endphp

                                @if($length >= 0  && $length < 10)
                                <b style='font-size: 18px;'>{{$deal['name']}} 
                                    <span class="random_text {{$length}}" style="visibility: hidden;">11111111111111111111111111111111111111</span>
                                </b>
                                @elseif($length >= 10 && $length < 20)

                                <b style='font-size: 18px;'>{{$deal['name']}} 
                                    <span class="random_text {{$length}}" style="visibility: hidden;">34239042308402938049151</span>
                                </b>
                                @elseif($length >= 20 && $length < 30)

                                <b style='font-size: 18px;'>{{$deal['name']}} 
                                    <span class="random_text {{$length}}" style="visibility: hidden;">342390423084029</span>
                                </b>
                                
                                @else
                                <b style='font-size: 18px;'>{{$deal['name']}}</b>
                                @endif

                                {{-- new code  --}}
                                
                                {{-- @php
                                    $length = Str::length($deal['name']);
                                @endphp
                                @if($length < 20)

                                <b style='font-size: 18px;'>{{$deal['name']}} 
                                    <span class="random_text" style="visibility: hidden;">34239042308402938049151</span>
                                </b>
                                
                                @else
                                <b style='font-size: 18px;'>{{$deal['name']}}</b>
                                @endif --}}

                                {{-- <b style='font-size: 18px;'>{{$deal['name']}}</b> --}}
                                </a>

                                <br /><span class='deal_des'>
                                    {{-- Sed ut perspiciatis unde omnis istenatu... --}}
                                    {{-- {{$deal['description']}} --}}
                                    
                                    {{ substr($deal['description'], 0, 30)}}...
                                

                                    @php
                                    $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                                    $blue_text =  $deal['price'] - $blue_text;

                                    $now = Carbon\Carbon::now();
                                    $expiry = $deal['additional_discount_date'];
                                    $result = $now->lt($expiry);
                                    @endphp

                                    {{-- </span>
                                    <br />
                                    <span class='old-price'>${{$deal['price']}}</span>&nbsp;
                                    <span
                                    class='new-price'>${{$blue_text}}</span> --}}
                                    <br>

                                    @if($deal['type'] == 'Entire Menu')
                                                

                                    <span
                                    class='new-price' style="color:#653030;">Entire Menu</span>


                                    &nbsp;
                                    @if($deal['additional_discount']  && $result)
                                        @if($deal['additional_discount'] > 0)

                                        <span class='percent-off'  style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                            OFF</span>
                                        
                                        @endif
                                    @else
                                        <span class='percent-off'>{{$deal['discount_on_price']}}% OFF</span>
                                    @endif
                                            {{-- <div>
                                                <span class="fs-14 text-primary font-w500"
                                            style="color:rgb(210, 45, 45) !important; font-size: 15px !important;
                                            font-weight: 800;">
                                            Entire Menu </span>


                                            @if($deal['additional_discount'] && $result)
                                            <span class="badge light badge-danger"
                                            style="margin-left: 8px !important;float: right !important; background:#d30b0b;margin-top:2px;">
                                            {{$deal['additional_discount']}}% off</span>
                                            @endif
                                            

                                            <span class="badge light badge-primary"
                                                style="margin-left: 8px !important;float: right !important;margin-top:2px;">
                                                {{$deal['discount_on_price']}}% off</span>
                                            </div> --}}


                                    @else

                                        @if($deal['additional_discount']  && $result)
                                            @if($deal['additional_discount'] > 0)

                                            <span class='old-price'>{{$deal['price']}}</span>
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">


                                            <span class='old-price'>{{$blue_text}}</span>
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">


                                            @php
                                                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) )
                                            @endphp
                                            
                                            <span
                                            class='new-price' style="color:#d30b0b;">{{$price_to_pay_in_double_discount}}Azn</span>

                                            @endif
                                        @else
                                            <span class='old-price'>{{$deal['price']}}</span>
                                            <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">


                                            <span
                                                class='new-price'>{{$blue_text}}</span>
                                                <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">

                                        @endif


                                        &nbsp;
                                        @if($deal['additional_discount']  && $result)
                                            @if($deal['additional_discount'] > 0)

                                            <span class='percent-off'  style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                                OFF</span>
                                            
                                            @endif
                                        @else
                                            <span class='percent-off'>{{$deal['discount_on_price']}}% OFF</span>
                                        @endif
                                    @endif


                                    @if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                                    <hr>
                                    <div class='location'>{{$deal['nearbyBranch']}}</div>
                                    <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}} KMs</span></div>
                                    @elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                    <hr>
                                    <div class='location'>{{$deal['nearbyBranch']}}</div>
                                    <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}} KMs</span></div>
                                    @else
                                    @endif

                                    {{-- <span class='percent-off'>{{$deal['discount_on_price']}}%
                                    OFF</span> --}}
                                {{-- <hr>
                                <div class='location'>Sed ut perspiciatis unde omnis iste natu...</div>
                                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">10 KMs</span></div> --}}
                            </div>


                                {{-- <div class="col-md-3 discount-card" style="padding: 10px;">
                                    <img style="width:100%; height: 200px; object-fit: contain;"
                                        src="{{asset('assets/USER/admin/uploads/taDi9vzFnoarch.png')}}">
                                    <b style="font-size: 18px;">{{$deal['name']}}</b>
                                    <br>
                                    <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                    <br>
                                    <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                        class="percent-off">%40 OFF</span>
                                    <hr>
                                    <div class="location">875 North Dearborn Street, Chicago</div>
                                    <div class="nearkm">Near <span>10 KMs</span></div>
                                </div> --}}
                            @endforeach

                            {{-- <div class="col-md-3 discount-card" style="padding: 10px;">
                                <img style="width:100%; height: 200px; object-fit: contain;"
                                    src="{{asset('assets/USER/admin/uploads/taDi9vzFnoarch.png')}}">
                                <b style="font-size: 18px;">Second Coupon</b>
                                <br>
                                <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                <br>
                                <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                    class="percent-off">%40 OFF</span>
                                <hr>
                                <div class="location">875 North Dearborn Street, Chicago</div>
                                <div class="nearkm">Near <span>10 KMs</span></div>
                            </div> --}}
                            {{-- <div class="col-md-3 discount-card" style="padding: 10px;">
                                <img style="width:100%; height: 200px; object-fit: contain;"
                                    src="{{asset('assets/USER/admin/uploads/QY3HNDAqUXb.jpg')}}">
                                <b style="font-size: 18px;">Second Coupon</b>
                                <br>
                                <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                <br>
                                <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                    class="percent-off">%40 OFF</span>
                                <hr>
                                <div class="location">875 North Dearborn Street, Chicago</div>
                                <div class="nearkm">Near <span>10 KMs</span></div>
                            </div>
                            <div class="col-md-3 discount-card" style="padding: 10px;">
                                <img style="width:100%; height: 200px; object-fit: contain;"
                                    src="{{asset('assets/USER/admin/uploads/taDi9vzFnoarch.png')}}">
                                <b style="font-size: 18px;">Second Coupon</b>
                                <br>
                                <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                <br>
                                <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                    class="percent-off">%40 OFF</span>
                                <hr>
                                <div class="location">875 North Dearborn Street, Chicago</div>
                                <div class="nearkm">Near <span>10 KMs</span></div>
                            </div>
                            <div class="col-md-3 discount-card" style="padding: 10px;">
                                <img style="width:100%; height: 200px; object-fit: contain;"
                                    src="{{asset('assets/USER/admin/uploads/pAKwRVi3mca.jpg')}}">
                                <b style="font-size: 18px;">Second Coupon</b>
                                <br>
                                <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                <br>
                                <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                    class="percent-off">%40 OFF</span>
                                <hr>
                                <div class="location">875 North Dearborn Street, Chicago</div>
                                <div class="nearkm">Near <span>10 KMs</span></div>
                            </div> --}}
                        </section>

                        <style>
                            @media only screen and (max-width: 536px) {
                            #new-five-cards{
                                text-align: center;
                            }
                            .featrtiles{
                                /* display:table-footer-group; */
                                display: contents !important;
                                justify-content: center;
                            }
                            .featurecardCr{
                                display: unset;
                                text-align: -webkit-center;
                            }
                            .last_image{
                                /* height: 100%; */
                                height: 300px !important;
                            }
                            .tileAfter1{
                                margin-bottom: 20px;
                            }
                            .card_to_change
                            {
                                height: 300px !important;
                                width: 80% !important;  // just test
                            }
                            .content_to_change
                            {
                                height: 300px !important;
                            }
                            }
                        </style>

                        <section id="new-five-cards" class="margin-top-5">

                            <figure class="card-ui cui-c-featured-card-carousel featurecardCr">
                                <ul class="cui-sub-featured-tiles featrtiles" style="    justify-content: center;">
                                    <figure class="cui-c-sub-featured-tile">
                                        <a href="{{url('DealsByCat/'.$lowerImageSection[0]['data_id'])}}">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$lowerImageSection[0]['imagePath'].'/'.$lowerImageSection[0]['image'].''}}"
                                                    alt="Makeup">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/sec2-box1.png')}}"
                                                    alt="Makeup"> --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$lowerImageSection[0]['text']}}</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile tileAfter1">
                                        <a href="{{url('DealsByCat/'.$lowerImageSection[1]['data_id'])}}">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$lowerImageSection[1]['imagePath'].'/'.$lowerImageSection[1]['image'].''}}"
                                                    alt="Salons">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/sec2-box2.png')}}"
                                                    alt="Salons"> --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$lowerImageSection[1]['text']}}</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile tileAfter1">
                                        <a href="{{url('DealsByCat/'.$lowerImageSection[2]['data_id'])}}">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$lowerImageSection[2]['imagePath'].'/'.$lowerImageSection[2]['image'].''}}"
                                                    alt="Spas">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/sec2-box3.png')}}"
                                                    alt="Spas"> --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$lowerImageSection[2]['text']}}</div>
                                            </div>
                                        </a>
                                    </figure>
                                    <figure class="cui-c-sub-featured-tile tileAfter1">
                                        <a href="{{url('DealsByCat/'.$lowerImageSection[3]['data_id'])}}">
                                            <div class="cui-sub-featured-content">
                                                <div class="cui-sub-featured-overlay"></div>

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$lowerImageSection[3]['imagePath'].'/'.$lowerImageSection[3]['image'].''}}"
                                                    alt="Face & Skin Care">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/sec2-box4.png')}}"
                                                    alt="Face & Skin Care"> --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$lowerImageSection[3]['text']}}</div>
                                            </div>
                                        </a>
                                    </figure>
                                </ul>
                                <figure class="cui-featured-card card_to_change">
                                    <a href="{{url('DealsByCat/'.$lowerImageSection[4]['data_id'])}}">
                                        <div class="cui-featured-content content_to_change">
                                            <div class="cui-featured-overlay"></div>

                                            <img class="cui-sub-featured-image last_image" src="{{'https://gigiapi.zanforthstaging.com/'.$lowerImageSection[4]['imagePath'].'/'.$lowerImageSection[4]['image'].''}}"
                                                alt="Makeup">
                                            {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/sec2-box5.png')}}"
                                                alt="Makeup"> --}}

                                            <div class="cui-featured-text" style="color:#FFFFFF">
                                                <div class="cui-featured-title">
                                                    {{$lowerImageSection[4]['text']}}
                                                </div>

                                                <div class="cui-featured-description">
                                                    Shop Now
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </figure>
                            </figure>

                        </section>


                        @if(count($cats_in_block) > 0)
                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-5"
                            style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">
                            {{$CatBlockSection[0]['text']}} Deals</h2>
                        @endif


                        <!-- Start Devices: Smart Home -->
                        <section data-home-section-item="device-tiles"
                            class="row align-items-center position-relative z-index-0">
                            @foreach($cats_in_block as $key => $deal)
                                @if($key == 4)
                                    @php
                                        break;
                                    @endphp
                                @endif
                                <div class='col-md-3 discount-card Anchor_included_all' style='padding: 10px; cursor: pointer;text-align: center;' data-id="{{$deal['id']}}">

                                    @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                        <span class="ma_heart" data-id="{{$deal['id']}}" id="{{$deal['id']}}_SectionDealsmaHeart" onmouseover="maHeartHover(this)"
                                            style="
                                            font-size: 37px;
                                            right: 0;
                                            color : #b45b5b;
                                            position: absolute;"
                                            ><i class="fa fa-heart" aria-hidden="true"></i></span>
                                    @endif

                                    <a class="anchor_trending" href="{{ URL('discount_details/'.$deal['id'])}}">
                                    <img style='width:100%; height:264px;object-fit: contain;' src='{{'https://gigiapi.zanforthstaging.com/'.$deal['image']['path'].'/'.$deal['image']['image'].''}}' />

                                    <p style="margin-bottom: 0px;"><span> {{$deal['merchant_name']}}</span></p>

                                    {{-- new code  --}}
                                    @php
                                    $length = Str::length($deal['name']);
                                    @endphp

                                    @if($length >= 0  && $length < 10)
                                    <b style='font-size: 18px;'>{{$deal['name']}} 
                                        <span class="random_text {{$length}}" style="visibility: hidden;">11111111111111111111111111111111111111</span>
                                    </b>
                                    @elseif($length >= 10 && $length < 20)

                                    <b style='font-size: 18px;'>{{$deal['name']}} 
                                        <span class="random_text {{$length}}" style="visibility: hidden;">34239042308402938049151</span>
                                    </b>
                                    @elseif($length >= 20 && $length < 30)

                                    <b style='font-size: 18px;'>{{$deal['name']}} 
                                        <span class="random_text {{$length}}" style="visibility: hidden;">342390423084029</span>
                                    </b>
                                    
                                    @else
                                    <b style='font-size: 18px;'>{{$deal['name']}}</b>
                                    @endif

                                    {{-- new code  --}}

                                    {{-- @php
                                    $length = Str::length($deal['name']);
                                    @endphp
                                    @if($length < 20)

                                    <b style='font-size: 18px;'>{{$deal['name']}} 
                                        <span class="random_text" style="visibility: hidden;">34239042308402938049151</span>
                                    </b>
                                    
                                    @else
                                    <b style='font-size: 18px;'>{{$deal['name']}}</b>
                                    @endif --}}

                                    {{-- <b style='font-size: 18px;'>{{$deal['name']}}</b> --}}

                                    </a>

                                    <br /><span class='deal_des'>
                                        {{-- Sed ut perspiciatis unde omnis istenatu... --}}
                                        {{-- {{$deal['description']}} --}}
                                        
                                        {{ substr($deal['description'], 0, 30)}}...
                                    

                                        @php
                                        $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                                        $blue_text =  $deal['price'] - $blue_text;

                                        $now = Carbon\Carbon::now();
                                        $expiry = $deal['additional_discount_date'];
                                        $result = $now->lt($expiry);
                                        @endphp

                                        {{-- </span>
                                        <br />
                                        <span class='old-price'>${{$deal['price']}}</span>&nbsp;
                                        <span
                                        class='new-price'>${{$blue_text}}</span> --}}
                                        <br>

                                        @if($deal['type'] == 'Entire Menu')
                                                

                                            <span
                                            class='new-price' style="color:#653030;">Entire Menu</span>


                                            &nbsp;
                                            @if($deal['additional_discount']  && $result)
                                                @if($deal['additional_discount'] > 0)

                                                <span class='percent-off'  style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                                    OFF</span>
                                                
                                                @endif
                                            @else
                                                <span class='percent-off'>{{$deal['discount_on_price']}}% OFF</span>
                                            @endif

                                        @else

                                            @if($deal['additional_discount']  && $result)
                                                @if($deal['additional_discount'] > 0)

                                                <span class='old-price'>{{$deal['price']}}</span>
                                                <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">


                                                <span class='old-price'>{{$blue_text}}</span>
                                                <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">


                                                @php
                                                    $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) )
                                                @endphp
                                                
                                                <span
                                                class='new-price' style="color:#d30b0b;">{{$price_to_pay_in_double_discount}}Azn</span>

                                                @endif
                                            @else
                                                <span class='old-price'>{{$deal['price']}}</span>
                                                <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">


                                                <span
                                                    class='new-price'>{{$blue_text}}</span>
                                                    <img style="    margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIcon.webp')}}" width="20px" alt="">

                                            @endif


                                            &nbsp;
                                            @if($deal['additional_discount']  && $result)
                                                @if($deal['additional_discount'] > 0)

                                                <span class='percent-off'  style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                                    OFF</span>
                                                
                                                @endif
                                            @else
                                                <span class='percent-off'>{{$deal['discount_on_price']}}% OFF</span>
                                            @endif
                                        @endif


                                        @if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                                        <hr>
                                        <div class='location'>{{$deal['nearbyBranch']}}</div>
                                        <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}} KMs</span></div>
                                        @elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                        <hr>
                                        <div class='location'>{{$deal['nearbyBranch']}}</div>
                                        <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}} KMs</span></div>
                                        @else
                                        @endif
                                        {{-- <span class='percent-off'>{{$deal['discount_on_price']}}%
                                        OFF</span> --}}
                                    {{-- <hr>
                                    <div class='location'>Sed ut perspiciatis unde omnis iste natu...</div>
                                    <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">10 KMs</span></div> --}}
                                </div>


                                {{-- <div class="col-md-3 discount-card" style="padding: 10px;">
                                    <img style="width:100%; height: 200px; object-fit: contain;"
                                        src="{{'https://gigiapi.zanforthstaging.com/'.$deal['image']['path'].'/'.$deal['image']['image'].''}}">
                                    <b style="font-size: 18px;">Second Coupon</b>
                                    <br>
                                    <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                    <br>
                                    <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                        class="percent-off">%40 OFF</span>
                                    <hr>
                                    <div class="location">875 North Dearborn Street, Chicago</div>
                                    <div class="nearkm">Near <span>10 KMs</span></div>
                                </div> --}}
                            @endforeach
                            {{-- <div class="col-md-3 discount-card" style="padding: 10px;">
                                <img style="width:100%; height: 200px; object-fit: contain;"
                                    src="{{asset('assets/USER/admin/uploads/taDi9vzFnoarch.png')}}">
                                <b style="font-size: 18px;">Second Coupon</b>
                                <br>
                                <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                <br>
                                <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                    class="percent-off">%40 OFF</span>
                                <hr>
                                <div class="location">875 North Dearborn Street, Chicago</div>
                                <div class="nearkm">Near <span>10 KMs</span></div>
                            </div> --}}
                            {{-- <div class="col-md-3 discount-card" style="padding: 10px;">
                                <img style="width:100%; height: 200px; object-fit: contain;"
                                    src="{{asset('assets/USER/admin/uploads/QY3HNDAqUXb.jpg')}}">
                                <b style="font-size: 18px;">Second Coupon</b>
                                <br>
                                <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                <br>
                                <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                    class="percent-off">%40 OFF</span>
                                <hr>
                                <div class="location">875 North Dearborn Street, Chicago</div>
                                <div class="nearkm">Near <span>10 KMs</span></div>
                            </div>
                            <div class="col-md-3 discount-card" style="padding: 10px;">
                                <img style="width:100%; height: 200px; object-fit: contain;"
                                    src="{{asset('assets/USER/admin/uploads/taDi9vzFnoarch.png')}}">
                                <b style="font-size: 18px;">Second Coupon</b>
                                <br>
                                <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                <br>
                                <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                    class="percent-off">%40 OFF</span>
                                <hr>
                                <div class="location">875 North Dearborn Street, Chicago</div>
                                <div class="nearkm">Near <span>10 KMs</span></div>
                            </div>
                            <div class="col-md-3 discount-card" style="padding: 10px;">
                                <img style="width:100%; height: 200px; object-fit: contain;"
                                    src="{{asset('assets/USER/admin/uploads/pAKwRVi3mca.jpg')}}">
                                <b style="font-size: 18px;">Second Coupon</b>
                                <br>
                                <span class="deal_des">Sed ut perspiciatis unde omnis iste na...</span>
                                <br>
                                <span class="old-price">$210</span>&nbsp;<span class="new-price">$150</span>&nbsp;<span
                                    class="percent-off">%40 OFF</span>
                                <hr>
                                <div class="location">875 North Dearborn Street, Chicago</div>
                                <div class="nearkm">Near <span>10 KMs</span></div>
                            </div> --}}
                        </section>


                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
                            style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Meet
                            with <span style="color: #4592fc;">GiGi</span></h2>


                        <section id="last-three-cards" class="margin-top-5 margin-bottom-7">

                            
                            {{-- <div style="    text-align: center;">
                                <img class="cui-sub-featured-image" style="    width: 90%;border-radius: 26px;" src="{{'https://gigiapi.zanforthstaging.com/'.$footerImageSection[0]['imagePath'].'/'.$footerImageSection[0]['image'].''}}"
                                                alt="Makeup">

                                <div>
                                    <div class="cui-featured-title">{{$footerImageSection[0]['text']}}
                                </div>

                            </div>

                            <div class="container firstlowerimagesectinforMob">
                                <img class="cui-sub-featured-image" style="    width: 90%;border-radius: 26px;" src="{{'https://gigiapi.zanforthstaging.com/'.$footerImageSection[0]['imagePath'].'/'.$footerImageSection[0]['image'].''}}"
                                                alt="Makeup">
                                <div class="bottom-left" style="width: 48%;">{{$footerImageSection[0]['text']}}Bottom Left</div>
                                
                            </div> --}}
                              <style>
                               
                                @media only screen and (max-width: 536px) {
                                    .firstLowerimagesection{
                                        display: unset;
                                    }
                                    .this_immg{
                                        height: 100%;
                                    }
                                    .firstLowerimagesectionBOX{
                                        margin-bottom: 15px;
                                    }
                                    .thisandThat{
                                        width: 70% !important;
                                    }
                                    .text_feature{
                                        top:-37px !important;
                                    }


                                    /* for boxing it  */
                                    .text_feature{
                                        top:-173px !important;
                                    }
                                    .this_immg{
                                        height: 301px !important;
                                    }
                                    .contentDiv{
                                        height: 300px !important;
                                    }
                                    .firstLowerimagesectionBOX{
                                        height: 300px !important;
                                    }

                                    
                                    }

                                @media only screen and (max-width: 473px) {
                                .these_two_on_bototm{
                                    margin-left: -25px;
                                    }
                                }
                                @media only screen and (max-width: 446px) {
                                .these_two_on_bototm{
                                    margin-left: -37px;
                                    }
                                }
                                @media only screen and (max-width: 425px) {
                                .these_two_on_bototm{
                                    margin-left: -52px;
                                    }
                                }
                                @media only screen and (max-width: 417px) {
                                .these_two_on_bototm{
                                    margin-left: -60px;
                                    }
                                }
                                @media only screen and (max-width: 393px) {
                                .these_two_on_bototm{
                                    margin-left: -72px;
                                    }
                                }
                                @media only screen and (max-width: 382px) {
                                .these_two_on_bototm{
                                    margin-left: -84px;
                                    }
                                }
                              </style>
                              <style>

                                    .container {
                                    position: relative;
                                    text-align: center;
                                    color: white;
                                    }
                                    
                                    .bottom-left {
                                    position: absolute;
                                    bottom: 8px;
                                    left: 16px;

                                    margin-bottom: 27%;
                                    margin-left: 10%;
                                    font-size: 22px;

                                    }
                                    
                                    .top-left {
                                    position: absolute;
                                    top: 8px;
                                    left: 16px;
                                    }
                                    
                                    .top-right {
                                    position: absolute;
                                    top: 8px;
                                    right: 16px;
                                    }
                                    
                                    .bottom-right {
                                    position: absolute;
                                    bottom: 8px;
                                    right: 16px;
                                    }
                                    
                                    .centered {
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    transform: translate(-50%, -50%);
                                    }
                                </style>

                                <style>

                                    @media only screen and (max-width: 522px) {
                                    .cui-c-featured-card-carousel .cui-sub-featured-tiles {
                                        width: 125%;
                                        margin-left: -14%;
                                        justify-content: center;
                                    }
                                    }

                                    
                                </style>

                            




                            <figure class="card-ui cui-c-featured-card-carousel firstLowerimagesection">

                                <figure class="cui-featured-card big-box firstLowerimagesectionBOX">
                                    <a href="{{url('DealsByCat/'.$footerImageSection[0]['data_id'])}}">
                                        <div class="cui-featured-content contentDiv">
                                            <div class="cui-featured-overlay"></div>

                                            <img class="cui-sub-featured-image this_immg" src="{{'https://gigiapi.zanforthstaging.com/'.$footerImageSection[0]['imagePath'].'/'.$footerImageSection[0]['image'].''}}"
                                                alt="Makeup">
                                          

                                            <div class="featured-text text_feature" style="color:#FFFFFF;">
                                                <div class="cui-featured-title">{{$footerImageSection[0]['text']}}
                                                </div>

                                                <div class="cui-featured-description">
                                                    Explore Deals
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </figure>


                                <ul class="cui-sub-featured-tiles these_two_on_bototm" style="place-content: center;">
                                    <figure class="cui-c-sub-featured-tile first-box thisandThat">
                                        <a href="{{url('DealsByCat/'.$footerImageSection[1]['data_id'])}}">

                                            

                                            <div class="cui-sub-featured-content">
                                                
                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$footerImageSection[1]['imagePath'].'/'.$footerImageSection[1]['image'].''}}"
                                                alt="Makeup">  
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/Fitness-banner.png')}}"
                                                alt="Makeup">   --}}

                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$footerImageSection[1]['text']}}
                                                    <div class="cui-featured-description">
                                                        Explore Deals
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </figure>

                                    <figure class="cui-c-sub-featured-tile second-box thisandThat">

                                          

                                        <a href="{{url('DealsByCat/'.$footerImageSection[2]['data_id'])}}">

                                            <div class="cui-sub-featured-content">

                                                <img class="cui-sub-featured-image" src="{{'https://gigiapi.zanforthstaging.com/'.$footerImageSection[2]['imagePath'].'/'.$footerImageSection[2]['image'].''}}"
                                                alt="Makeup">
                                                {{-- <img class="cui-sub-featured-image" src="{{asset('assets/USER/img/pages/home/Fitness-banner.png')}}"
                                                alt="Makeup"> --}}
                                                
                                                <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                                    {{$footerImageSection[2]['text']}}
                                                    <div class="cui-featured-description">
                                                        Explore Deals
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </figure>
                                </ul>

                            </figure>

                        </section>
                    </div>
                </section>
            </div>
        </main>


        {{-- Anchor_included_all --}}
        <style>
            .ma_heart{
                display: none;
            }
        </style>
        <script>
            $(document).ready(function() {
                $(".Anchor_included_all").hover(function() {
                    // $(this).css("background-color", "green");
                    // console.log(this.getAttribute('data-id'));
                    id = this.getAttribute('data-id');
                    element = document.getElementById(`${id}_maHeart`);
                    element.style.display = "block";
                    element = document.getElementById(`${id}_TopSellermaHeart`);
                    element.style.display = "block";
                    element = document.getElementById(`${id}_SectionDealsmaHeart`);
                    element.style.display = "block";
                    // console.log(element);
                }, function() {
                    // $(this).css("background-color", "yellow");
                    id = this.getAttribute('data-id');
                    element = document.getElementById(`${id}_maHeart`);
                    element.style.display = "none";
                    element = document.getElementById(`${id}_TopSellermaHeart`);
                    element.style.display = "none";
                    element = document.getElementById(`${id}_SectionDealsmaHeart`);
                    element.style.display = "none";
                });
            });
        </script>


       <script>
        $('.ma_heart').click(function(event){
            event.preventDefault();
            this.style.color = '#e31111';

            id = this.getAttribute('data-id');
            // console.log();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: `{{ url('add_to_wishlist/${id}') }}`,
                // data: { name: "John", location: "Boston" },
                // data: { id: id },
                // dataType: 'html',
                success: function(data) {
                    // alert(data);
                    // console.log(data);
                    // $("#ul_chatList_to_refresh").empty();
                    // $('#ul_chatList_to_refresh').html(data);


                    // if(open_convo == null)
                    // {

                    // }
                    // else
                    // {
                    //     // alert('doing it');
                    //     var collection = document.getElementsByClassName("convo_list_item");
                    //     for (var i = 0; i < collection.length; i++) {
                    //         element = collection[i];

                    //         if (parseInt($(element).attr("data-id")) == parseInt(id)) {
                    //             $(element).css("background-color", "#5e616a");
                    //         } else {
                    //             // background: #3B3E49;
                    //             $(element).css("background-color", "#3B3E49");
                    //         }
                    //     }
                    // }
                    
                }
            });





        });
        // function maHeartHover(arg)
        // {
        //     arg.style.color = "#e20b3d";
        // }
        $(document).ready(function() {
                $(".ma_heart").hover(function() {
                    // $(this).css("background-color", "green");
                    // console.log(this.getAttribute('data-id'));
                    // id = this.getAttribute('data-id');
                    // element = document.getElementById(`${id}_maHeart`);
                    this.style.color = "#e20b3d";
                    // console.log(element);
                }, function() {
                    // $(this).css("background-color", "yellow");
                    // id = this.getAttribute('data-id');
                    // element = document.getElementById(`${id}_maHeart`);
                    this.style.color = "#b45b5b";
                });
        });
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
        
    </div>
    <script src="{{asset('assets/USER/js/main.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.min.js" integrity="sha512-i5xofbBta9oP3xclkdj0jO68kXE1tPeN8Jf3rwzsbwNrpFVifjhklWi8zMOOUscuMQaCPyIXl0TMWFjGwBaJxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script>
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('814fe1b741785e7ace5e', {
            cluster: 'ap2',
            authEndpoint: "https://gigiapi.zanforthstaging.com/api/channelAuthorization",
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