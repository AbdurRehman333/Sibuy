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
    <link rel="icon" type="{{asset('assets/USER/image/png')}}" href="{{asset('assets/images/sibuy.png')}}" />






    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>







    <script src="{{asset('assets/USER/vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    {{--
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" /> --}}
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





    {{--
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script> --}}




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.min.css"
        integrity="sha512-HPSfJxnyVYJb4v9afT3fXvs0mXvdg/C7eYxBl1EYS7uQHuCU/0lSGhaH9o23Tw8FofBiGQfFWzMYD9TqK8tv/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Favicon icon -->

    {{--
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"> --}}






    <!-- other head stuff... -->
    {{-- flickity  --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.css"
        integrity="sha512-TZTUnuHs1njGko8PJqZlHzqZTZd880A+BvhR1jy1v4mWB4VFKVLG/eK9LYdDjxqNLmttSC1ygmqg6rkYjnEgaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.js"
        integrity="sha512-IugMlI4mO8p/jg/cnoe/Duv6i6nkTHmiu8O4/Faqvt413HbCyacKTOBZZCutsGQStTUgd2vPbM3K3oiKSlSD9Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

        <!-- CSS -->
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <!-- JavaScript -->
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>



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
            .chatbox {
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
                                    <div class="col-md-4"> <a href=""><img
                                                src="{{asset('assets/USER/img/pages/home/appstore.png')}}" alt=""
                                                loading="lazy" width="197" height="59"></a> </div>
                                    <div class="col-md-6"> <a href=""><img
                                                src="{{asset('assets/USER/img/pages/home/playstore.png')}}" alt=""
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
                            .wrapper_class {
                                /* position: inherit !important; */
                                position: revert !important;
                            }

                            .image_class {
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











                {{-- //   --}}
                <style>
                    /* external css: flickity.css */

                    * {
                        box-sizing: border-box;
                    }

                    body {
                        font-family: sans-serif;
                    }

                    .carousel {
                        background: black;
                    }

                    .carousel-cell {
                        width: 70%;
                        height: 200px;
                        /* flex-box, center image in cell */
                        display: -webkit-box;
                        display: -webkit-flex;
                        display: flex;
                        -webkit-box-pack: center;
                        -webkit-justify-content: center;
                        justify-content: center;
                        -webkit-align-items: center;
                        align-items: center;
                    }

                    .carousel-cell img {
                        display: block;
                        max-width: 100%;
                        max-height: 100%;
                        /* dim unselected */
                        opacity: 0.7;
                        -webkit-transform: scale(0.85);
                        transform: scale(0.85);
                        -webkit-filter: blur(5px);
                        filter: blur(5px);
                        -webkit-transition: opacity 0.3s, -webkit-transform 0.3s, transform 0.3s, -webkit-filter 0.3s, filter 0.3s;
                        transition: opacity 0.3s, transform 0.3s, filter 0.3s;
                    }

                    /* brighten selected image */
                    .carousel-cell.is-selected img {
                        opacity: 1;
                        -webkit-transform: scale(1);
                        transform: scale(1);
                        -webkit-filter: none;
                        filter: none;
                    }

                    @media screen and (min-width: 768px) {
                        .carousel-cell {
                            height: 400px;
                        }
                    }

                    @media screen and (min-width: 960px) {
                        .carousel-cell {
                            width: 60%;
                        }
                    }

                    /* buttons, no circle */
                    .flickity-prev-next-button {
                        width: 60px;
                        height: 60px;
                        background: transparent;
                        opacity: 0.6;
                    }

                    .flickity-prev-next-button:hover {
                        background: transparent;
                        opacity: 1;
                    }

                    /* arrow color */
                    .flickity-prev-next-button .arrow {
                        fill: white;
                    }

                    .flickity-prev-next-button.no-svg {
                        color: white;
                    }

                    /* closer to edge */
                    .flickity-prev-next-button.previous {
                        left: 0;
                    }

                    .flickity-prev-next-button.next {
                        right: 0;
                    }

                    /* hide disabled button */
                    .flickity-prev-next-button:disabled {
                        display: none;
                    }
                </style>


                <!-- Flickity HTML init -->
                @if(count($crousel) !== 0 )
                <div class="container">
                    <div class="carousel js-flickity">
                        <!-- images from unsplash.com -->
    
                        @foreach($crousel as $key => $banner)
                                
                        <div class="carousel-cell">
                            <img src="{{''.config('path.path.WebPath').''.$banner['imagePath'].'/'.$banner['image'].''}}"
                                alt="orange tree" />
                        </div>
    
                        @endforeach
    
                    </div>
                </div>
                @endif

                <script>
                    $('.main-gallery').flickity({
                        // options
                        cellAlign: 'left',
                        contain: true
                        });
                </script>


                {{-- //  --}}


                {{-- <style>
                    /* external css: flickity.css */

                    * {
                    -webkit-box-sizing: border-box;
                    box-sizing: border-box;
                    }

                    body { font-family: sans-serif; }

                    .gallery {
                    background: #EEE;
                    }

                    .gallery-cell {
                    width: 66%;
                    height: 200px;
                    margin-right: 10px;
                    background: #8C8;
                    counter-increment: gallery-cell;
                    }

                    /* cell number */
                    .gallery-cell:before {
                    display: block;
                    text-align: center;
                    content: counter(gallery-cell);
                    line-height: 200px;
                    font-size: 80px;
                    color: white;
                    }
                </style> --}}




                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

                <style>
                    @import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");

                    .carousel-control {
                        display: block !important;
                    }

                    .carousel-control:hover {
                        display: block !important;
                    }

                    .carousel-control:active {
                        display: block !important;
                    }

                    .carousel-control:focus {
                        display: block !important;
                    }

                    @media only screen and (max-width: 767px) {
                        #advertisement_crousel {
                            width: 92% !important;
                            margin-left: 17px;
                        }
                    }
                </style>

                <style>
                    .carousel-inner>.item>a>img,
                    .carousel-inner>.item>img,
                    .img-responsive,
                    .thumbnail a>img,
                    .thumbnail>img {
                        display: block;
                        max-width: 100%;
                        height: auto;
                    }
                </style>


                {{-- @if(count($crousel) !== 0 )
                <div class="container">


                    <div id="advertisement_crousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">

                            @foreach($crousel as $key => $banner)
                            @if($loop->first)
                            <li data-target="#advertisement_crousel" data-slide-to="{{$key-1}}" class="active"></li>
                            @else
                            <li data-target="#advertisement_crousel" data-slide-to="{{$key-1}}"></li>
                            @endif
                            @endforeach

                        

                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">



                            @foreach($crousel as $key => $banner)
                            @if($loop->first)
                            <div class="item active">
                                <a href="{{$banner['link']}}">
                                    <img src="{{''.config('path.path.WebPath').''.$banner['imagePath'].'/'.$banner['image'].''}}"
                                        alt="Los Angeles" style="width:100%;height:550px;">
                                </a>
                                <div class="carousel-caption">
                                    <h3 href="www.google.com">{{$banner['head_text']}}</h3>
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <a href="{{$banner['link']}}">
                                    <img src="{{''.config('path.path.WebPath').''.$banner['imagePath'].'/'.$banner['image'].''}}"
                                        alt="Chicago" style="width:100%;height:550px;">
                                </a>
                                <div class="carousel-caption">
                                    <h3>{{$banner['head_text']}}</h3>
                                </div>
                            </div>
                            @endif
                            @endforeach

                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#advertisement_crousel" data-slide="prev"
                            style="left: 0px">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#advertisement_crousel" data-slide="next"
                            style="right: 0px">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                @endif --}}

                {{-- <style>
                    .carousel-inner>.item>a>img,
                    .carousel-inner>.item>img,
                    .img-responsive,
                    .thumbnail a>img,
                    .thumbnail>img {
                        display: block;
                        max-width: 100%;
                        height: auto;
                    }

                    .crs_images {
                        height: 500px !important;
                        width: 710px;
                    }

                    @media only screen and (max-width: 600px) {
                        .crs_images {
                            height: 266px !important;
                            /* width: 700px; */
                        }
                    }
                </style> --}}


                {{-- <script>
                    $(".right").click(function(){
                        // alert('right');
                        document.getElementById('section-devices').click();
                        document.getElementById('section-devices').click();
                        document.getElementById('section-devices').click();
                        document.getElementById('section-devices').click();
                        document.getElementById('SomeSpecial').click();
                        $('#SomeSpecial').click();
                        $( "#SomeSpecial" ).trigger( "click" );
                    });
                </script> --}}














                <style>
                    .SpecialCategories {
                        font-size: 50px !important;
                        text-align: center !important;
                    }
                </style>

                <!-- Start Devices -->
                <section id="section-devices" data-home-section="devices" class="margin-top-5">
                    <div class="edge">
                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-1 SpecialCategories"
                            id="SomeSpecial" style="color: #2bb673;">We Have All The Categories to Cater To Your Needs!
                            Get The Right Deals For Yourself at The Right Time!
                        </h2>
                        <!-- Start Devices: Smart Home -->
                        <section data-home-section-item="device-tiles"
                            class="row align-items-center position-relative z-index-0">
                            <div class="home-circle home-circle--devices"></div>
                            <div class="col-md-6">
                                <h3 class="text-preset-hero-2">Browse our Categories</h3>
                                <p class="text-preset-body-large">With Sibuy app you can access thousand of discounts at
                                    nearby restaurants, salons, retailers, grocery stores, doctor's clinic and so much
                                    more.</p>
                            </div>
                            <div class="col-md-6 flex">
                                <div class="home-devices">

                                    <style>
                                        @media only screen and (max-width: 536px) {
                                            .imgIsThisForBoxIconTop {
                                                height: 60px;
                                            }

                                        }

                                        @media only screen and (max-width: 404px) {
                                            .imgIsThisForBoxIconTop {
                                                height: 56px;
                                                width: 61%;
                                            }
                                        }

                                        @media only screen and (max-width: 370px) {
                                            .imgIsThisForBoxIconTop {
                                                height: 40px;
                                            }
                                        }

                                        @media only screen and (max-width: 315px) {
                                            .imgIsThisForBoxIconTop {
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
                                                        <div class="home-device__icon"><img width="60"
                                                                class="imgIsThisForBoxIconTop"
                                                                src="{{''.config('path.path.WebPath').''.$box['imagePath'].'/'.$box['image'].''}}"
                                                                alt="Couples" />
                                                        </div>
                                                    </div>
                                                    <div class="home-device__title">{{$box['text']}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach


                                    <style>
                                        .home-devices__item {
                                            opacity: 100 !important;
                                        }
                                    </style>
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
                            .trendingSeemoreanchor:hover {
                                text-decoration: none;
                            }
                        </style>




                        <!-- End Devices: Smart Home -->
                        <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
                            style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">
                            Sponsored Deals
                            {{-- <span> <a style="font-size: 20px;" class="trendingSeemoreanchor"
                                    href="{{url('TrendingDealsSeeMore')}}"> See More </a> </span> --}}
                        </h2>


                        {{-- /// --}}
                        <div class="container">
                            <div class="row">
                                <div class="well">
                                    <!-- Carousel
                                        ================================================== -->
                                    <div id="SponsoredDeals" class="carousel slide">
                                        <div class="carousel-inner">

                                            <style>
                                                .ThisToHide {
                                                    visibility: hidden !important;
                                                }
                                            </style>

                                            @php
                                            $count = count($sponsoredDeals['data']);
                                            @endphp

                                            @if($count > 0)
                                            <div class="item active">
                                                <div class="row">

                                                    @for($i = 0; $i < 4; $i++)
                                                        @if(array_key_exists($i,$sponsoredDeals['data'])) <div
                                                        class="col-md-3  Anchor_included_all"
                                                        style="padding: 10px; cursor: pointer;text-align: center;"
                                                        data-id="{{$sponsoredDeals['data'][$i]['id']}}">
                                                        <span class="ma_heart"
                                                            data-id="{{$sponsoredDeals['data'][$i]['id']}}"
                                                            id="{{$sponsoredDeals['data'][$i]['id']}}_maHeart"
                                                            onmouseover="maHeartHover(this)"
                                                            style="font-size: 37px; right: 20px; color: rgb(180, 91, 91); position: absolute; display: none;"><i
                                                                class="fa fa-heart" aria-hidden="true"></i></span>
                                                        <a class="anchor_trending"
                                                            href="{{url('discount_details/'.$sponsoredDeals['data'][$i]['id'])}}">
                                                            <img style="width:100%; height:264px; object-fit: contain;"
                                                                src="{{''.config('path.path.WebPath').''.$sponsoredDeals['data'][$i]['image']['path'].'/'.$sponsoredDeals['data'][$i]['image']['image'].''}}">
                                                            <p style="margin-bottom: 0px;">
                                                                <span>{{$sponsoredDeals['data'][$i]['merchant_name']}}</span>
                                                            </p>
                                                            <p style="font-size: 18px;margin-bottom: -30px;">
                                                                {{$sponsoredDeals['data'][$i]['name']}}
                                                                <span class="random_text 16"
                                                                    style="visibility: hidden;">34239042308402938049151</span>
                                                            </p>
                                                        </a>
                                                        <br>
                                                        <p style="    margin-bottom: -15px;" class="deal_des">
                                                            {{ substr($sponsoredDeals['data'][$i]['description'], 0,
                                                            40)}}...
                                                        </p>
                                                        <br>
                                                </div>




                                                @else

                                                <div class="col-md-3  Anchor_included_all ThisToHide"
                                                    style="padding: 10px; cursor: pointer;text-align: center;"
                                                    data-id="3">
                                                    <a class="anchor_trending" href="{{url('discount_details/3')}}">
                                                        <img style="width:100%; height:264px; object-fit: contain;"
                                                            src="{{asset('assets/images/13847715.jpg')}}">
                                                        <p style="margin-bottom: 0px;"><span>Merchant</span></p>
                                                        <p style="font-size: 18px;margin-bottom: -30px;">
                                                            This deal is dummy
                                                            <span class="random_text 16"
                                                                style="visibility: hidden;">34239042308402938049151</span>
                                                        </p>
                                                    </a>
                                                    <br>
                                                    <p style="    margin-bottom: -15px;" class="deal_des">
                                                        On DessertsOn Desserts...On Desserts......
                                                    </p>
                                                    <br>
                                                </div>


                                                @endif
                                                @endfor







                                                {{-- <div class="col-md-3  Anchor_included_all"
                                                    style="padding: 10px; cursor: pointer;text-align: center;"
                                                    data-id="3">
                                                    <span class="ma_heart" data-id="3" id="3_maHeart"
                                                        onmouseover="maHeartHover(this)"
                                                        style="font-size: 37px; right: 0px; color: rgb(180, 91, 91); position: absolute; display: none;"><i
                                                            class="fa fa-heart" aria-hidden="true"></i></span>
                                                    <a class="anchor_trending" href="{{url('discount_details/3')}}">
                                                        <img style="width:100%; height:264px; object-fit: contain;"
                                                            src="{{asset('assets/images/13847715.jpg')}}">
                                                        <p style="margin-bottom: 0px;"><span>Merchant</span></p>
                                                        <p style="font-size: 18px;margin-bottom: -30px;">Desserts
                                                            40% OFF
                                                            <span class="random_text 16"
                                                                style="visibility: hidden;">34239042308402938049151</span>
                                                        </p>
                                                    </a>
                                                    <br>
                                                    <p style="    margin-bottom: -15px;" class="deal_des">
                                                        On DessertsOn Desserts...On Desserts......
                                                    </p>
                                                    <br>
                                                </div> --}}



                                            </div>
                                        </div>
                                        @endif

                                        @if($count > 4)
                                        <div class="item">
                                            <div class="row">
                                                @for($i = 4; $i < 8; $i++)
                                                    @if(array_key_exists($i,$sponsoredDeals['data'])) <div
                                                    class="col-md-3  Anchor_included_all"
                                                    style="padding: 10px; cursor: pointer;text-align: center;"
                                                    data-id="{{$sponsoredDeals['data'][$i]['id']}}">
                                                    <span class="ma_heart"
                                                        data-id="{{$sponsoredDeals['data'][$i]['id']}}"
                                                        id="{{$sponsoredDeals['data'][$i]['id']}}_maHeart"
                                                        onmouseover="maHeartHover(this)"
                                                        style="font-size: 37px; right: 20px; color: rgb(180, 91, 91); position: absolute; display: none;"><i
                                                            class="fa fa-heart" aria-hidden="true"></i></span>
                                                    <a class="anchor_trending"
                                                        href="{{url('discount_details/'.$sponsoredDeals['data'][$i]['id'])}}">
                                                        <img style="width:100%; height:264px; object-fit: contain;"
                                                            src="{{''.config('path.path.WebPath').''.$sponsoredDeals['data'][$i]['image']['path'].'/'.$sponsoredDeals['data'][$i]['image']['image'].''}}">
                                                        <p style="margin-bottom: 0px;">
                                                            <span>{{$sponsoredDeals['data'][$i]['merchant_name']}}</span>
                                                        </p>
                                                        <p style="font-size: 18px;margin-bottom: -30px;">
                                                            {{$sponsoredDeals['data'][$i]['name']}}
                                                            <span class="random_text 16"
                                                                style="visibility: hidden;">34239042308402938049151</span>
                                                        </p>
                                                    </a>
                                                    <br>
                                                    <p style="    margin-bottom: -15px;" class="deal_des">
                                                        {{ substr($sponsoredDeals['data'][$i]['description'], 0,
                                                        40)}}...
                                                    </p>
                                                    <br>
                                            </div>




                                            @else

                                            <div class="col-md-3  Anchor_included_all ThisToHide"
                                                style="padding: 10px; cursor: pointer;text-align: center;" data-id="3">
                                                <a class="anchor_trending" href="{{url('discount_details/3')}}">
                                                    <img style="width:100%; height:264px; object-fit: contain;"
                                                        src="{{asset('assets/images/13847715.jpg')}}">
                                                    <p style="margin-bottom: 0px;"><span>Merchant</span></p>
                                                    <p style="font-size: 18px;margin-bottom: -30px;">
                                                        This deal is dummy
                                                        <span class="random_text 16"
                                                            style="visibility: hidden;">34239042308402938049151</span>
                                                    </p>
                                                </a>
                                                <br>
                                                <p style="    margin-bottom: -15px;" class="deal_des">
                                                    On DessertsOn Desserts...On Desserts......
                                                </p>
                                                <br>
                                            </div>


                                            @endif
                                            @endfor
                                        </div>
                                    </div>
                                    @endif

                                    @if($count > 8)
                                    <div class="item">
                                        <div class="row">
                                            @for($i = 8; $i < 12; $i++)
                                                @if(array_key_exists($i,$sponsoredDeals['data'])) <div
                                                class="col-md-3  Anchor_included_all"
                                                style="padding: 10px; cursor: pointer;text-align: center;"
                                                data-id="{{$sponsoredDeals['data'][$i]['id']}}">
                                                <span class="ma_heart" data-id="{{$sponsoredDeals['data'][$i]['id']}}"
                                                    id="{{$sponsoredDeals['data'][$i]['id']}}_maHeart"
                                                    onmouseover="maHeartHover(this)"
                                                    style="font-size: 37px; right: 20px; color: rgb(180, 91, 91); position: absolute; display: none;"><i
                                                        class="fa fa-heart" aria-hidden="true"></i></span>
                                                <a class="anchor_trending"
                                                    href="{{url('discount_details/'.$sponsoredDeals['data'][$i]['id'])}}">
                                                    <img style="width:100%; height:264px; object-fit: contain;"
                                                        src="{{''.config('path.path.WebPath').''.$sponsoredDeals['data'][$i]['image']['path'].'/'.$sponsoredDeals['data'][$i]['image']['image'].''}}">
                                                    <p style="margin-bottom: 0px;">
                                                        <span>{{$sponsoredDeals['data'][$i]['merchant_name']}}</span>
                                                    </p>
                                                    <p style="font-size: 18px;margin-bottom: -30px;">
                                                        {{$sponsoredDeals['data'][$i]['name']}}
                                                        <span class="random_text 16"
                                                            style="visibility: hidden;">34239042308402938049151</span>
                                                    </p>
                                                </a>
                                                <br>
                                                <p style="    margin-bottom: -15px;" class="deal_des">
                                                    {{ substr($sponsoredDeals['data'][$i]['description'], 0, 40)}}...
                                                </p>
                                                <br>
                                        </div>

                                        @else

                                        <div class="col-md-3  Anchor_included_all ThisToHide"
                                            style="padding: 10px; cursor: pointer;text-align: center;" data-id="3">
                                            <a class="anchor_trending" href="{{url('discount_details/3')}}">
                                                <img style="width:100%; height:264px; object-fit: contain;"
                                                    src="{{asset('assets/images/13847715.jpg')}}">
                                                <p style="margin-bottom: 0px;"><span>Merchant</span></p>
                                                <p style="font-size: 18px;margin-bottom: -30px;">
                                                    This deal is dummy
                                                    <span class="random_text 16"
                                                        style="visibility: hidden;">34239042308402938049151</span>
                                                </p>
                                            </a>
                                            <br>
                                            <p style="    margin-bottom: -15px;" class="deal_des">
                                                On DessertsOn Desserts...On Desserts......
                                            </p>
                                            <br>
                                        </div>


                                        @endif
                                        @endfor

                                    </div>
                                </div>
                                @endif


                            </div>

                            <style>
                                /* .carousel-control:focus{
                                                    background: red;
                                                    color: red;
                                                } */
                                /* .carousel-control:hover{
                                                    background: red;
                                                    color: red;
                                                } */
                            </style>
                            <a class="left carousel-control" href="#SponsoredDeals" data-slide="prev"><i
                                    class="fa fa-chevron-left fa-2x"></i></a>
                            <a class="right carousel-control" href="#SponsoredDeals" data-slide="next"><i
                                    class="fa fa-chevron-right fa-2x"></i></a>

                            <ol class="carousel-indicators">
                                @if($count > 0)
                                <li data-target="#SponsoredDeals" data-slide-to="0" class="active"></li>
                                @endif

                                @if($count > 4)
                                <li data-target="#SponsoredDeals" data-slide-to="1"></li>
                                @endif

                                @if($count > 8)
                                <li data-target="#SponsoredDeals" data-slide-to="2"></li>
                                @endif

                            </ol>
                        </div><!-- End Carousel -->
                    </div><!-- End Well -->
            </div>
    </div>

    <script>
        $('#SponsoredDeals').carousel({
                                    interval:   4000
                                });
    </script>

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
            margin-left: 5px;
        }

        .old-price {
            color: #666;
            font-size: 20px;
            font-weight: bold;
            text-decoration: line-through;
        }

        .anchor_trending:hover {
            text-decoration: none;
        }
    </style>

    {{-- /// --}}



    <!-- End Devices: Smart Home -->
    <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">
        Trending Deals for You <span> <a style="font-size: 20px;" class="trendingSeemoreanchor"
                href="{{url('TrendingDealsSeeMore')}}"> See More </a> </span> </h2>

    <style>
        .home-circle--devices {
            display: none !important;
        }
    </style>
    <style>
        /* .carousel-indicators{
                                    display: none;
                                } */
        .well {
            background: white !important;
            border: none;
        }
    </style>
    <style>
        body {
            padding-top: 50px;
        }

        /*#####################
                                Additional Styles (required)
                                ######################*/
        #myCarousel .thumbnail {
            margin-bottom: 0;
        }

        .carousel-control.left,
        .carousel-control.right {
            background-image: none !important;
        }

        .carousel-control {
            color: #fff;
            top: 40%;
            color: #428BCA;
            bottom: auto;
            padding-top: 4px;
            width: 30px;
            height: 30px;
            text-shadow: none;
            opacity: 1;
        }

        .carousel-control:hover {
            color: #d9534f;
        }

        .carousel-control.left,
        .carousel-control.right {
            background-image: none !important;
        }

        .carousel-control.right {
            left: auto;
            right: -32px;
        }

        .carousel-control.left {
            right: auto;
            left: -32px;
        }

        .carousel-indicators {
            bottom: -30px;
        }

        .carousel-indicators li {
            border-radius: 0;
            width: 10px;
            height: 10px;
            background: #ccc;
            border: 1px solid #ccc;
        }

        .carousel-indicators .active {
            width: 12px;
            height: 12px;
            background: #3276b1;
            border-color: #3276b1;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="well">
                <!-- Carousel
                                        ================================================== -->
                <div id="myCarousel" class="carousel slide">
                    <div class="carousel-inner">

                        <style>
                            .ThisToHide {
                                visibility: hidden !important;
                            }
                        </style>

                        @php
                        $count = count($trendingDeals['data']);
                        @endphp

                        @if($count > 0)
                        <div class="item active">
                            <div class="row">

                                @for($i = 0; $i < 4; $i++) @if(array_key_exists($i,$trendingDeals['data'])) <div
                                    class="col-md-3  Anchor_included_all"
                                    style="padding: 10px; cursor: pointer;text-align: center;"
                                    data-id="{{$trendingDeals['data'][$i]['id']}}">
                                    <span class="ma_heart" data-id="{{$trendingDeals['data'][$i]['id']}}"
                                        id="{{$trendingDeals['data'][$i]['id']}}_maHeart"
                                        onmouseover="maHeartHover(this)"
                                        style="font-size: 37px; right: 20px; color: rgb(180, 91, 91); position: absolute; display: none;"><i
                                            class="fa fa-heart" aria-hidden="true"></i></span>
                                    <a class="anchor_trending"
                                        href="{{url('discount_details/'.$trendingDeals['data'][$i]['id'])}}">
                                        <img style="width:100%; height:264px; object-fit: contain;"
                                            src="{{''.config('path.path.WebPath').''.$trendingDeals['data'][$i]['image']['path'].'/'.$trendingDeals['data'][$i]['image']['image'].''}}">
                                        <p style="margin-bottom: 0px;">
                                            <span>{{$trendingDeals['data'][$i]['merchant_name']}}</span>
                                        </p>
                                        <p style="font-size: 18px;margin-bottom: -30px;">
                                            {{$trendingDeals['data'][$i]['name']}}
                                            <span class="random_text 16"
                                                style="visibility: hidden;">34239042308402938049151</span>
                                        </p>
                                    </a>
                                    <br>
                                    <p style="    margin-bottom: -15px;" class="deal_des">
                                        {{ substr($trendingDeals['data'][$i]['description'], 0, 40)}}...
                                    </p>
                                    <br>
                            </div>




                            @else

                            <div class="col-md-3  Anchor_included_all ThisToHide"
                                style="padding: 10px; cursor: pointer;text-align: center;" data-id="3">
                                <a class="anchor_trending" href="{{url('discount_details/3')}}">
                                    <img style="width:100%; height:264px; object-fit: contain;"
                                        src="{{asset('assets/images/13847715.jpg')}}">
                                    <p style="margin-bottom: 0px;"><span>Merchant</span></p>
                                    <p style="font-size: 18px;margin-bottom: -30px;">
                                        This deal is dummy
                                        <span class="random_text 16"
                                            style="visibility: hidden;">34239042308402938049151</span>
                                    </p>
                                </a>
                                <br>
                                <p style="    margin-bottom: -15px;" class="deal_des">
                                    On DessertsOn Desserts...On Desserts......
                                </p>
                                <br>
                            </div>


                            @endif
                            @endfor







                            {{-- <div class="col-md-3  Anchor_included_all"
                                style="padding: 10px; cursor: pointer;text-align: center;" data-id="3">
                                <span class="ma_heart" data-id="3" id="3_maHeart" onmouseover="maHeartHover(this)"
                                    style="font-size: 37px; right: 0px; color: rgb(180, 91, 91); position: absolute; display: none;"><i
                                        class="fa fa-heart" aria-hidden="true"></i></span>
                                <a class="anchor_trending" href="{{url('discount_details/3')}}">
                                    <img style="width:100%; height:264px; object-fit: contain;"
                                        src="{{asset('assets/images/13847715.jpg')}}">
                                    <p style="margin-bottom: 0px;"><span>Merchant</span></p>
                                    <p style="font-size: 18px;margin-bottom: -30px;">Desserts
                                        40% OFF
                                        <span class="random_text 16"
                                            style="visibility: hidden;">34239042308402938049151</span>
                                    </p>
                                </a>
                                <br>
                                <p style="    margin-bottom: -15px;" class="deal_des">
                                    On DessertsOn Desserts...On Desserts......
                                </p>
                                <br>
                            </div> --}}



                        </div>
                    </div>
                    @endif

                    @if($count > 4)
                    <div class="item">
                        <div class="row">
                            @for($i = 4; $i < 8; $i++) @if(array_key_exists($i,$trendingDeals['data'])) <div
                                class="col-md-3  Anchor_included_all"
                                style="padding: 10px; cursor: pointer;text-align: center;"
                                data-id="{{$trendingDeals['data'][$i]['id']}}">
                                <span class="ma_heart" data-id="{{$trendingDeals['data'][$i]['id']}}"
                                    id="{{$trendingDeals['data'][$i]['id']}}_maHeart" onmouseover="maHeartHover(this)"
                                    style="font-size: 37px; right: 20px; color: rgb(180, 91, 91); position: absolute; display: none;"><i
                                        class="fa fa-heart" aria-hidden="true"></i></span>
                                <a class="anchor_trending"
                                    href="{{url('discount_details/'.$trendingDeals['data'][$i]['id'])}}">
                                    <img style="width:100%; height:264px; object-fit: contain;"
                                        src="{{''.config('path.path.WebPath').''.$trendingDeals['data'][$i]['image']['path'].'/'.$trendingDeals['data'][$i]['image']['image'].''}}">
                                    <p style="margin-bottom: 0px;">
                                        <span>{{$trendingDeals['data'][$i]['merchant_name']}}</span>
                                    </p>
                                    <p style="font-size: 18px;margin-bottom: -30px;">
                                        {{$trendingDeals['data'][$i]['name']}}
                                        <span class="random_text 16"
                                            style="visibility: hidden;">34239042308402938049151</span>
                                    </p>
                                </a>
                                <br>
                                <p style="    margin-bottom: -15px;" class="deal_des">
                                    {{ substr($trendingDeals['data'][$i]['description'], 0, 40)}}...
                                </p>
                                <br>
                        </div>




                        @else

                        <div class="col-md-3  Anchor_included_all ThisToHide"
                            style="padding: 10px; cursor: pointer;text-align: center;" data-id="3">
                            <a class="anchor_trending" href="{{url('discount_details/3')}}">
                                <img style="width:100%; height:264px; object-fit: contain;"
                                    src="{{asset('assets/images/13847715.jpg')}}">
                                <p style="margin-bottom: 0px;"><span>Merchant</span></p>
                                <p style="font-size: 18px;margin-bottom: -30px;">
                                    This deal is dummy
                                    <span class="random_text 16"
                                        style="visibility: hidden;">34239042308402938049151</span>
                                </p>
                            </a>
                            <br>
                            <p style="    margin-bottom: -15px;" class="deal_des">
                                On DessertsOn Desserts...On Desserts......
                            </p>
                            <br>
                        </div>


                        @endif
                        @endfor
                    </div>
                </div>
                @endif

                @if($count > 8)
                <div class="item">
                    <div class="row">
                        @for($i = 8; $i < 12; $i++) @if(array_key_exists($i,$trendingDeals['data'])) <div
                            class="col-md-3  Anchor_included_all"
                            style="padding: 10px; cursor: pointer;text-align: center;"
                            data-id="{{$trendingDeals['data'][$i]['id']}}">
                            <span class="ma_heart" data-id="{{$trendingDeals['data'][$i]['id']}}"
                                id="{{$trendingDeals['data'][$i]['id']}}_maHeart" onmouseover="maHeartHover(this)"
                                style="font-size: 37px; right: 20px; color: rgb(180, 91, 91); position: absolute; display: none;"><i
                                    class="fa fa-heart" aria-hidden="true"></i></span>
                            <a class="anchor_trending"
                                href="{{url('discount_details/'.$trendingDeals['data'][$i]['id'])}}">
                                <img style="width:100%; height:264px; object-fit: contain;"
                                    src="{{''.config('path.path.WebPath').''.$trendingDeals['data'][$i]['image']['path'].'/'.$trendingDeals['data'][$i]['image']['image'].''}}">
                                <p style="margin-bottom: 0px;">
                                    <span>{{$trendingDeals['data'][$i]['merchant_name']}}</span>
                                </p>
                                <p style="font-size: 18px;margin-bottom: -30px;">
                                    {{$trendingDeals['data'][$i]['name']}}
                                    <span class="random_text 16"
                                        style="visibility: hidden;">34239042308402938049151</span>
                                </p>
                            </a>
                            <br>
                            <p style="    margin-bottom: -15px;" class="deal_des">
                                {{ substr($trendingDeals['data'][$i]['description'], 0, 40)}}...
                            </p>
                            <br>
                    </div>

                    @else

                    <div class="col-md-3  Anchor_included_all ThisToHide"
                        style="padding: 10px; cursor: pointer;text-align: center;" data-id="3">
                        <a class="anchor_trending" href="{{url('discount_details/3')}}">
                            <img style="width:100%; height:264px; object-fit: contain;"
                                src="{{asset('assets/images/13847715.jpg')}}">
                            <p style="margin-bottom: 0px;"><span>Merchant</span></p>
                            <p style="font-size: 18px;margin-bottom: -30px;">
                                This deal is dummy
                                <span class="random_text 16" style="visibility: hidden;">34239042308402938049151</span>
                            </p>
                        </a>
                        <br>
                        <p style="    margin-bottom: -15px;" class="deal_des">
                            On DessertsOn Desserts...On Desserts......
                        </p>
                        <br>
                    </div>


                    @endif
                    @endfor

                </div>
            </div>
            @endif


        </div>

        <style>
            /* .carousel-control:focus{
                                                    background: red;
                                                    color: red;
                                                } */
            /* .carousel-control:hover{
                                                    background: red;
                                                    color: red;
                                                } */
        </style>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i
                class="fa fa-chevron-left fa-2x"></i></a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next"><i
                class="fa fa-chevron-right fa-2x"></i></a>

        <ol class="carousel-indicators">
            @if($count > 0)
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            @endif

            @if($count > 4)
            <li data-target="#myCarousel" data-slide-to="1"></li>
            @endif

            @if($count > 8)
            <li data-target="#myCarousel" data-slide-to="2"></li>
            @endif

        </ol>
    </div><!-- End Carousel -->
    </div><!-- End Well -->
    </div>
    </div>
    <script>
        $('#myCarousel').carousel({
                                    interval:   4000
                                });
    </script>

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
            margin-left: 5px;
        }

        .old-price {
            color: #666;
            font-size: 20px;
            font-weight: bold;
            text-decoration: line-through;
        }

        .anchor_trending:hover {
            text-decoration: none;
        }
    </style>










































    <style>
        @media only screen and (max-width: 744px) {
            .random_text {
                display: none;
            }
        }
    </style>
    @php
    $second_line = 0;
    @endphp
    <!-- Start Devices: Smart Home -->
    {{-- <section data-home-section-item="device-tiles" class="row align-items-center position-relative z-index-0">
        <div class="home-circle home-circle--devices"></div>
        @foreach($trendingDeals as $key => $deal)



        @if($key==4)
        @php
        break;
        @endphp
        @endif

        <div class='col-md-3 discount-card Anchor_included_all'
            style='padding: 10px; cursor: pointer;text-align: center;' data-id="{{$deal['id']}}">

            @if(session()->has('Authenticated_user_data') &&
            session()->get('Authenticated_user_data')['type'] == 1)
            <span class="ma_heart" data-id="{{$deal['id']}}" id="{{$deal['id']}}_maHeart"
                onmouseover="maHeartHover(this)" style="
                                        font-size: 37px;
                                        right: 0;
                                        color : #b45b5b;
                                        position: absolute;"><i class="fa fa-heart" aria-hidden="true"></i></span>
            @endif

            <a class="anchor_trending" href="{{ URL('discount_details/'.$deal['id'])}}">
                <img style='width:100%; height:264px; object-fit: contain;' src='{{''.config('
                    path.path.WebPath').''.$deal['image']['path'].'/'.$deal['image']['image'].''}}' />

                <p style="margin-bottom: 0px;"><span>{{$deal['merchant_name']}}</span></p>


                @php
                $length = Str::length($deal['name']);
                @endphp

                @if($length >= 0 && $length < 10) <b style='font-size: 18px;'>{{$deal['name']}}
                    <span class="random_text {{$length}}"
                        style="visibility: hidden;">11111111111111111111111111111111111111</span>
                    </b>
                    @elseif($length >= 10 && $length < 20) <b style='font-size: 18px;'>
                        {{$deal['name']}}
                        <span class="random_text {{$length}}" style="visibility: hidden;">34239042308402938049151</span>
                        </b>
                        @elseif($length >= 20 && $length < 30) <b style='font-size: 18px;'>
                            {{$deal['name']}}
                            <span class="random_text {{$length}}" style="visibility: hidden;">342390423084029</span>
                            </b>

                            @else
                            <b style='font-size: 18px;'>{{$deal['name']}}</b>
                            @endif


            </a>

            <br /><span class='deal_des'>


                {{ substr($deal['description'], 0, 30)}}...


                @php
                $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                $blue_text = $deal['price'] - $blue_text;

                $now = Carbon\Carbon::now();
                $expiry = $deal['additional_discount_date'];
                $result = $now->lt($expiry);
                @endphp


                <br>

                @if($deal['type'] == 'Entire Menu')
                <span class='old-price' style="display: none;">{{$blue_text}}</span>
                <img style="margin-bottom: 7px;margin-left: -5px; visibility:hidden"
                    src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">
                @php
                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] *
                ($deal['additional_discount'] / 100) )
                @endphp


                <span class='new-price' style="color: #d30b0b;"> Entire Menu</span>
                @else


                <img style=" visibility:hidden;   margin-bottom: 7px;margin-left: -5px;"
                    src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">



                <span class='new-price'>${{$blue_text}}</span>


                @endif



                @if( !session()->has('Authenticated_user_data') &&
                session()->has('unAuthUserLocations'))
                <hr>
                <div class='location'>{{$deal['nearbyBranch']}}</div>
                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}}
                        KMs</span></div>
                @elseif(session()->has('Authenticated_user_data') &&
                session()->get('Authenticated_user_data')['type'] == 1)
                <hr>
                <div class='location'>{{$deal['nearbyBranch']}}</div>
                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}}
                        KMs</span></div>
                @else
                @endif

        </div>



        @endforeach
    </section> --}}


    <style>
        @media only screen and (max-width: 536px) {
            .fivecardsUpper {
                text-align: center;
            }

            .featrtilesUpper {
                /* display:table-footer-group; */
                display: contents !important;
                justify-content: center;
            }

            .featurecardCrUpper {
                display: unset;
                text-align: -webkit-center;
            }

            .last_imageUpper {
                /* height: 100%; */
                height: 300px !important;
            }

            .tileAfter1Upper {
                margin-bottom: 20px;
            }

            .card_to_changeUpper {
                height: 300px !important;
                width: 80% !important; // just test
            }

            .content_to_changeUpper {
                height: 300px !important;
            }
        }
    </style>


    <!-- End Devices: Smart Home -->
    {{-- <section id="five-cards fivecardsUpper" class="margin-top-5">

        <figure class="card-ui cui-c-featured-card-carousel featurecardCrUpper">

            <ul class="cui-sub-featured-tiles featrtilesUpper" style="    justify-content: center;">
                <figure class="cui-c-sub-featured-tile">
                    <a href="{{url('DealsByCat/'.$upperImageSection[0]['data_id'])}}">
                        <div class="cui-sub-featured-content">
                            <div class="cui-sub-featured-overlay"></div>

                            <img class="cui-sub-featured-image"
                                src="{{''.config('path.path.WebPath').''.$upperImageSection[0]['imagePath'].'/'.$upperImageSection[0]['image'].''}}"
                                alt="Makeup">


                            <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                {{$upperImageSection[0]['text']}}</div>
                        </div>
                    </a>
                </figure>
                <figure class="cui-c-sub-featured-tile  tileAfter1Upper">
                    <a href="{{url('DealsByCat/'.$upperImageSection[1]['data_id'])}}">
                        <div class="cui-sub-featured-content">
                            <div class="cui-sub-featured-overlay"></div>

                            <img class="cui-sub-featured-image"
                                src="{{''.config('path.path.WebPath').''.$upperImageSection[1]['imagePath'].'/'.$upperImageSection[1]['image'].''}}"
                                alt="Makeup">


                            <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                {{$upperImageSection[1]['text']}}</div>
                        </div>
                    </a>
                </figure>
                <figure class="cui-c-sub-featured-tile tileAfter1Upper">
                    <a href="{{url('DealsByCat/'.$upperImageSection[2]['data_id'])}}">
                        <div class="cui-sub-featured-content">
                            <div class="cui-sub-featured-overlay"></div>

                            <img class="cui-sub-featured-image"
                                src="{{''.config('path.path.WebPath').''.$upperImageSection[2]['imagePath'].'/'.$upperImageSection[2]['image'].''}}"
                                alt="Makeup">


                            <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                {{$upperImageSection[2]['text']}}</div>
                        </div>
                    </a>
                </figure>
                <figure class="cui-c-sub-featured-tile tileAfter1Upper">
                    <a href="{{url('DealsByCat/'.$upperImageSection[3]['data_id'])}}">
                        <div class="cui-sub-featured-content">
                            <div class="cui-sub-featured-overlay"></div>

                            <img class="cui-sub-featured-image"
                                src="{{''.config('path.path.WebPath').''.$upperImageSection[3]['imagePath'].'/'.$upperImageSection[3]['image'].''}}"
                                alt="Makeup">


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

                        <img class="cui-sub-featured-image last_imageUpper"
                            src="{{''.config('path.path.WebPath').''.$upperImageSection[4]['imagePath'].'/'.$upperImageSection[4]['image'].''}}"
                            alt="Makeup">


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



        </figure>

    </section> --}}


    {{-- @if(session()->has('Authenticated_user_data') &&
    session()->get('Authenticated_user_data')['type'] == 1)


    @if(session()->has('AuthenticatedUserSelectedCities'))
    <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Top
        Seller in <span style="color: #4592fc;">{{session()->get('AuthenticatedUserSelectedCities')}}</span>
    </h2>
    @else
    <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Top
        Seller in <span style="color: #4592fc;">{{session()->get('Authenticated_user_data')['location']['city']}}</span>
    </h2>
    @endif


    @elseif( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))

    <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Top
        Seller in <span style="color: #4592fc;">{{session()->get('unAuthUserLocations')['city']}}</span></h2>

    @else
    <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-9"
        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">Deals
        On Sibuy</span></h2>
    @endif --}}



    <style>
        body {
            padding-top: 50px;
        }

        /*#####################
                            Additional Styles (required)
                            ######################*/
        #myCarouselTopSeller .thumbnail {
            margin-bottom: 0;
        }

        .carousel-control.left,
        .carousel-control.right {
            background-image: none !important;
        }

        .carousel-control {
            color: #fff;
            top: 40%;
            color: #428BCA;
            bottom: auto;
            padding-top: 4px;
            width: 30px;
            height: 30px;
            text-shadow: none;
            opacity: 1;
        }

        .carousel-control:hover {
            color: #d9534f;
        }

        .carousel-control.left,
        .carousel-control.right {
            background-image: none !important;
        }

        .carousel-control.right {
            left: auto;
            right: -32px;
        }

        .carousel-control.left {
            right: auto;
            left: -32px;
        }

        .carousel-indicators {
            bottom: -30px;
        }

        .carousel-indicators li {
            border-radius: 0;
            width: 10px;
            height: 10px;
            background: #ccc;
            border: 1px solid #ccc;
        }

        .carousel-indicators .active {
            width: 12px;
            height: 12px;
            background: #3276b1;
            border-color: #3276b1;
        }
    </style>

    <script>
        $('#myCarouselTopSeller').carousel({
                                interval:   4000
                            });
    </script>





    {{-- /// --}}
    <!-- Start Devices: Smart Home -->
    {{-- <section data-home-section-item="device-tiles" class="row align-items-center position-relative z-index-0">

        @foreach($TopSellers as $key => $deal)

        @if($key == 4)
        @php
        break;
        @endphp
        @endif
        <div class='col-md-3 discount-card Anchor_included_all'
            style='padding: 10px; cursor: pointer;text-align: center;' data-id="{{$deal['id']}}">

            @if(session()->has('Authenticated_user_data') &&
            session()->get('Authenticated_user_data')['type'] == 1)
            <span class="ma_heart" data-id="{{$deal['id']}}" id="{{$deal['id']}}_TopSellermaHeart"
                onmouseover="maHeartHover(this)" style="
                                        font-size: 37px;
                                        right: 0;
                                        color : #b45b5b;
                                        position: absolute;"><i class="fa fa-heart" aria-hidden="true"></i></span>
            @endif

            <a class="anchor_trending" href="{{ URL('discount_details/'.$deal['id'])}}">
                <img style='width:100%; height:264px;;object-fit: contain;' src='{{''.config('
                    path.path.WebPath').''.$deal['image']['path'].'/'.$deal['image']['image'].''}}' />


                <p style="margin-bottom: 0px;"><span>{{$deal['merchant_name']}}</span></p>

                @php
                $length = Str::length($deal['name']);
                @endphp

                @if($length >= 0 && $length < 10) <b style='font-size: 18px;'>{{$deal['name']}}
                    <span class="random_text {{$length}}"
                        style="visibility: hidden;">11111111111111111111111111111111111111</span>
                    </b>
                    @elseif($length >= 10 && $length < 20) <b style='font-size: 18px;'>
                        {{$deal['name']}}
                        <span class="random_text {{$length}}" style="visibility: hidden;">34239042308402938049151</span>
                        </b>
                        @elseif($length >= 20 && $length < 30) <b style='font-size: 18px;'>
                            {{$deal['name']}}
                            <span class="random_text {{$length}}" style="visibility: hidden;">342390423084029</span>
                            </b>

                            @else
                            <b style='font-size: 18px;'>{{$deal['name']}}</b>
                            @endif


            </a>

            <br /><span class='deal_des'>


                {{ substr($deal['description'], 0, 30)}}...


                @php
                $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                $blue_text = $deal['price'] - $blue_text;

                $now = Carbon\Carbon::now();
                $expiry = $deal['additional_discount_date'];
                $result = $now->lt($expiry);
                @endphp


                <br>


                @if($deal['type'] == 'Entire Menu')
                <span class='old-price' style="display: none;">{{$blue_text}}</span>
                <img style="margin-bottom: 7px;margin-left: -5px; visibility:hidden"
                    src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">
                @php
                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] *
                ($deal['additional_discount'] / 100) )
                @endphp


                <span class='new-price' style="color: #d30b0b;">
                    Entire Menu</span>
                @else


                <img style=" visibility:hidden;   margin-bottom: 7px;margin-left: -5px;"
                    src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">



                <span class='new-price'>${{$blue_text}}</span>


                @endif




                @if( !session()->has('Authenticated_user_data') &&
                session()->has('unAuthUserLocations'))
                <hr>
                <div class='location'>{{$deal['nearbyBranch']}}</div>
                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}}
                        KMs</span></div>
                @elseif(session()->has('Authenticated_user_data') &&
                session()->get('Authenticated_user_data')['type'] == 1)
                <hr>
                <div class='location'>{{$deal['nearbyBranch']}}</div>
                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}}
                        KMs</span></div>
                @else
                @endif


        </div>


        @endforeach

    </section> --}}

    {{-- /// --}}

    <style>
        @media only screen and (max-width: 536px) {
            #new-five-cards {
                text-align: center;
            }

            .featrtiles {
                /* display:table-footer-group; */
                display: contents !important;
                justify-content: center;
            }

            .featurecardCr {
                display: unset;
                text-align: -webkit-center;
            }

            .last_image {
                /* height: 100%; */
                height: 300px !important;
            }

            .tileAfter1 {
                margin-bottom: 20px;
            }

            .card_to_change {
                height: 300px !important;
                width: 80% !important; // just test
            }

            .content_to_change {
                height: 300px !important;
            }
        }
    </style>

    {{-- <section id="new-five-cards" class="margin-top-5">

        <figure class="card-ui cui-c-featured-card-carousel featurecardCr">
            <ul class="cui-sub-featured-tiles featrtiles" style="    justify-content: center;">
                <figure class="cui-c-sub-featured-tile">
                    <a href="{{url('DealsByCat/'.$lowerImageSection[0]['data_id'])}}">
                        <div class="cui-sub-featured-content">
                            <div class="cui-sub-featured-overlay"></div>

                            <img class="cui-sub-featured-image"
                                src="{{''.config('path.path.WebPath').''.$lowerImageSection[0]['imagePath'].'/'.$lowerImageSection[0]['image'].''}}"
                                alt="Makeup">


                            <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                {{$lowerImageSection[0]['text']}}</div>
                        </div>
                    </a>
                </figure>
                <figure class="cui-c-sub-featured-tile tileAfter1">
                    <a href="{{url('DealsByCat/'.$lowerImageSection[1]['data_id'])}}">
                        <div class="cui-sub-featured-content">
                            <div class="cui-sub-featured-overlay"></div>

                            <img class="cui-sub-featured-image"
                                src="{{''.config('path.path.WebPath').''.$lowerImageSection[1]['imagePath'].'/'.$lowerImageSection[1]['image'].''}}"
                                alt="Salons">


                            <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                {{$lowerImageSection[1]['text']}}</div>
                        </div>
                    </a>
                </figure>
                <figure class="cui-c-sub-featured-tile tileAfter1">
                    <a href="{{url('DealsByCat/'.$lowerImageSection[2]['data_id'])}}">
                        <div class="cui-sub-featured-content">
                            <div class="cui-sub-featured-overlay"></div>

                            <img class="cui-sub-featured-image"
                                src="{{''.config('path.path.WebPath').''.$lowerImageSection[2]['imagePath'].'/'.$lowerImageSection[2]['image'].''}}"
                                alt="Spas">


                            <div class="cui-sub-featured-title cui-hyphenate" style="color:#FFFFFF">
                                {{$lowerImageSection[2]['text']}}</div>
                        </div>
                    </a>
                </figure>
                <figure class="cui-c-sub-featured-tile tileAfter1">
                    <a href="{{url('DealsByCat/'.$lowerImageSection[3]['data_id'])}}">
                        <div class="cui-sub-featured-content">
                            <div class="cui-sub-featured-overlay"></div>

                            <img class="cui-sub-featured-image"
                                src="{{''.config('path.path.WebPath').''.$lowerImageSection[3]['imagePath'].'/'.$lowerImageSection[3]['image'].''}}"
                                alt="Face & Skin Care">


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

                        <img class="cui-sub-featured-image last_image"
                            src="{{''.config('path.path.WebPath').''.$lowerImageSection[4]['imagePath'].'/'.$lowerImageSection[4]['image'].''}}"
                            alt="Makeup">

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

    </section> --}}


    {{-- @if(count($cats_in_block) > 0)
    <h2 class="home__title-2 margin-bottom-5 margin-md-bottom-9 text-preset-hero-2 margin-top-5"
        style="color: #3b3632;z-index: 1 !important;position: relative;margin-bottom: 100px;">
        {{$CatBlockSection[0]['text']}} Deals</h2>
    @endif --}}


    <!-- Start Devices: Smart Home -->
    {{-- <section data-home-section-item="device-tiles" class="row align-items-center position-relative z-index-0">
        @foreach($cats_in_block as $key => $deal)
        @if($key == 4)
        @php
        break;
        @endphp
        @endif
        <div class='col-md-3 discount-card Anchor_included_all'
            style='padding: 10px; cursor: pointer;text-align: center;' data-id="{{$deal['id']}}">

            @if(session()->has('Authenticated_user_data') &&
            session()->get('Authenticated_user_data')['type'] == 1)
            <span class="ma_heart" data-id="{{$deal['id']}}" id="{{$deal['id']}}_SectionDealsmaHeart"
                onmouseover="maHeartHover(this)" style="
                                            font-size: 37px;
                                            right: 0;
                                            color : #b45b5b;
                                            position: absolute;"><i class="fa fa-heart" aria-hidden="true"></i></span>
            @endif

            <a class="anchor_trending" href="{{ URL('discount_details/'.$deal['id'])}}">
                <img style='width:100%; height:264px;object-fit: contain;' src='{{''.config('
                    path.path.WebPath').''.$deal['image']['path'].'/'.$deal['image']['image'].''}}' />

                <p style="margin-bottom: 0px;"><span> {{$deal['merchant_name']}}</span></p>


                @php
                $length = Str::length($deal['name']);
                @endphp

                @if($length >= 0 && $length < 10) <b style='font-size: 18px;'>{{$deal['name']}}
                    <span class="random_text {{$length}}"
                        style="visibility: hidden;">11111111111111111111111111111111111111</span>
                    </b>
                    @elseif($length >= 10 && $length < 20) <b style='font-size: 18px;'>
                        {{$deal['name']}}
                        <span class="random_text {{$length}}" style="visibility: hidden;">34239042308402938049151</span>
                        </b>
                        @elseif($length >= 20 && $length < 30) <b style='font-size: 18px;'>
                            {{$deal['name']}}
                            <span class="random_text {{$length}}" style="visibility: hidden;">342390423084029</span>
                            </b>

                            @else
                            <b style='font-size: 18px;'>{{$deal['name']}}</b>
                            @endif

            </a>

            <br /><span class='deal_des'>

                {{ substr($deal['description'], 0, 30)}}...


                @php
                $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                $blue_text = $deal['price'] - $blue_text;

                $now = Carbon\Carbon::now();
                $expiry = $deal['additional_discount_date'];
                $result = $now->lt($expiry);
                @endphp


                @if($deal['type'] == 'Entire Menu')
                <span class='old-price' style="display: none;">{{$blue_text}}</span>
                <img style="margin-bottom: 7px;margin-left: -5px; visibility:hidden"
                    src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">
                @php
                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] *
                ($deal['additional_discount'] / 100) )
                @endphp


                <span class='new-price' style="color: #d30b0b;"> Entire Menu</span>
                @else



                <img style=" visibility:hidden;   margin-bottom: 7px;margin-left: -5px;"
                    src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">



                <span class='new-price'>${{$blue_text}}</span>


                @endif


                @if( !session()->has('Authenticated_user_data') &&
                session()->has('unAuthUserLocations'))
                <hr>
                <div class='location'>{{$deal['nearbyBranch']}}</div>
                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}}
                        KMs</span></div>
                @elseif(session()->has('Authenticated_user_data') &&
                session()->get('Authenticated_user_data')['type'] == 1)
                <hr>
                <div class='location'>{{$deal['nearbyBranch']}}</div>
                <div class='nearkm'>Near <span style="color: rgb(34, 34, 191);font-weight: bold;">{{$deal['nearby']}}
                        KMs</span></div>
                @else
                @endif
        </div>

        @endforeach

    </section> --}}


    </div>
    </section>
    </div>
    </main>


    <style>
        .ma_heart {
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

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.js"
        integrity="sha512-IugMlI4mO8p/jg/cnoe/Duv6i6nkTHmiu8O4/Faqvt413HbCyacKTOBZZCutsGQStTUgd2vPbM3K3oiKSlSD9Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.min.js"
        integrity="sha512-i5xofbBta9oP3xclkdj0jO68kXE1tPeN8Jf3rwzsbwNrpFVifjhklWi8zMOOUscuMQaCPyIXl0TMWFjGwBaJxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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