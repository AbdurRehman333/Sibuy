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

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}


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

    <!--Load global CSS and JS -->
    {{-- <link rel="preload" as="font" type="font/woff2" href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-regular.woff2')}}"
        crossorigin="anonymous" />
    <link rel="preload" as="font" type="font/woff2" href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-500.woff2')}}"
        crossorigin="anonymous" />
    <link rel="preload" as="font" type="font/woff2" href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-700.woff2')}}"
        crossorigin="anonymous" /> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/core.css')}}" />


    {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/font-sera.css')}}" /> --}}
    <!--Load page specific CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/pages/home.css')}}" />
    <!-- Load icon font -->
    {{-- <link rel="preload" type="font/woff2" href="{{asset('assets/USER/fonts/icons.woff2')}}" as="font"
        crossorigin="anonymous"> --}}
    <style type="text/css">
        /* @font-face {
            font-family: 'icons';
            src: url("{{asset('assets/USER/fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff2"),
            url("{{asset('assets/USER//fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff");
        }    */

        /* @font-face {
            font-family:sans-serif;
            src: url('/fonts/roboto-v29-latin_cyrillic-regular.woff2');
            src: url('/fonts/ceraPrac/Cera-Black.oft');
        } */

        @font-face {
            /* font-family: carelightttf; */
            /* src: url('/{{ public_path('/fonts/ceraPrac/Cera-Light.oft') }}'); */
            /* src: url('Cera-Light.otf') format('otf'); */
            /* src: url('Cera-Bold-o2tf.otf') format("otf"); */
            
            /* src: url('/Cera-Light-OTF.otf') format('otf'); */
            /* src: url('/fonts/NexaLight.otf') format('otf'); */
            /* src: url('Cera-Light.woff2'); */

        }

        /* *{font-family: carelightttf !important;} */

    </style>

{{-- cera-pro code is in header  --}}

{{-- 
<style>
    @font-face {
        font-family: ceralight;
        src: url({{asset('assets/fonts/Cera-Light.woff2')}});
    }

    @font-face {
        font-family: ceraMedium; 
        src: url({{asset('assets/fonts/Cera-Medium.woff2')}});
    }

    @font-face {
        font-family: ceraBold;
        src: url({{asset('assets/fonts/Cera-Bold.woff2')}});
    }
    
    * {
        font-family: ceraMedium !important;
    }

    b{
        font-family: ceraBold !important;
    }

    h1{
        font-family: ceraBold !important;
    }
</style> --}}


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
        /* body::-webkit-scrollbar {
        width: 1em;
        }
        
        body::-webkit-scrollbar-track {
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
        
        body::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey;
        } */

        .scroll::-webkit-scrollbar {
        width: 0.4em;
        }
        
        .scroll::-webkit-scrollbar-track {
        box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
        
        .scroll::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey;
        }
    </style>

    <div class="website">

        @include('user.layouts.header')


        <main style="background:#F6F7FB">
            <div class="home">

              

                <div id="section-intro" data-home-section class="bg-body" style="padding-top: 15vh;">
                  

                    <div class="home-intro__body edge">
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <h1>Categories</h1>
                            </div>
                        </div> --}}
                   
                        <div class="row">
                          

                            <div class="col-md-3 scroll" style="">


                               

                                {{-- @if(Session::has('success'))
                                <p class="alert alert-success" style="    text-align-last: center;
                                ">{{ Session::get('success') }}</p>
                              
                                @endif
        
                                @if(Session::has('alert'))
                                <p class="alert alert-danger" style="    text-align-last: center;
                                ">{{ Session::get('alert') }}</p>
                                @endif --}}



                                <div class="container">



                                    <form class="form--horizontal" action="#" method="get">
                                        <div class="input-wrp">
                                            <input class="textfield" name="s" type="text" placeholder="Search">
                                        </div>

                                        <button style="border :2px solid #1CAFFC" class="custom-btn custom-btn--tiny custom-btn--style-1" type="submit" role="button">Find</button>
                                    </form>
                                    <style>
                                        .custom-btn{
                                            -webkit-text-size-adjust: 100%;
                                            -webkit-tap-highlight-color: transparent;
                                            -webkit-box-direction: normal;
                                            box-sizing: inherit;
                                            margin: 0;
                                            overflow: visible;
                                            -webkit-appearance: button;
                                            position: relative;
                                            display: inline-block;
                                            vertical-align: middle;
                                            padding-left: 28px;
                                            padding-right: 28px;
                                            line-height: 1;
                                            font-family: Raleway,sans-serif;
                                            font-weight: 700;
                                            text-align: center!important;
                                            text-decoration: none!important;
                                            text-shadow: none!important;
                                            text-transform: uppercase;
                                            letter-spacing: 0;
                                            color: #4f4a37 !important;
                                            border: 2px solid #77c0d1 !important;
                                            /* border: 2px solid #fcdb5a !important; */
                                            border-radius: 30px;
                                            user-select: none;
                                            -webkit-user-drag: none;
                                            touch-action: manipulation;
                                            transition: background-color .25s ease-in-out,border-color .25s ease-in-out,color .25s ease-in-out;
                                            min-width: 85px;
                                            min-height: 35px;
                                            padding-top: 11px;
                                            padding-bottom: 10px;
                                            font-size: 1rem;
                                            cursor: pointer;
                                            box-shadow: none;
                                            outline: 0;
                                            background-color: transparent;
                                            margin-top: 0;
                                        }
                                        .textfield{
                                            -webkit-text-size-adjust: 100%;
                                            -webkit-tap-highlight-color: transparent;
                                            -webkit-box-direction: normal;
                                            box-sizing: inherit;
                                            margin: 0;
                                            overflow: visible;
                                            display: block;
                                            float: none;
                                            width: 100%;
                                            background: padding-box none;
                                            border: none;
                                            border-bottom: 1px solid #dadada;
                                            padding: 13px 0;
                                            line-height: 1.2;
                                            font-size: 1.4rem;
                                            font-family: "Open Sans",sans-serif;
                                            font-weight: 500;
                                            color: #666;
                                            appearance: none;
                                            outline: 0;
                                            box-shadow: none;
                                            border-radius: 0;
                                            transition: background-color .3s ease-in-out,border-color .3s ease-in-out,color .3s ease-in-out;
                                            height: 44px;
                                        }
                                        .input-wrp{
                                            -webkit-text-size-adjust: 100%;
                                            -webkit-tap-highlight-color: transparent;
                                            font-size: 1.4rem;
                                            font-family: -apple-system,BlinkMacSystemFont,"Open Sans",sans-serif;
                                            font-weight: 400;
                                            color: #666;
                                            -webkit-box-direction: normal;
                                            padding: 0;
                                            margin: 0;
                                            box-sizing: inherit;
                                            position: relative;
                                            display: block;
                                            width: 100%;
                                            line-height: 1;
                                            margin-top: 0;
                                            -webkit-box-flex: 1;
                                            flex: 1;
                                            padding-right: 20px;
                                        }
                                           .form--horizontal{
                                            -webkit-text-size-adjust: 100%;
                                            -webkit-tap-highlight-color: transparent;
                                            line-height: 1.6;
                                            font-size: 1.4rem;
                                            font-family: -apple-system,BlinkMacSystemFont,"Open Sans",sans-serif;
                                            font-weight: 400;
                                            color: #666;
                                            padding: 0;
                                            margin: 0;
                                            box-sizing: inherit;
                                            position: relative;
                                            display: flex;
                                            -webkit-box-orient: horizontal;
                                            -webkit-box-direction: normal;
                                            flex-direction: row;
                                            flex-wrap: wrap;
                                            -webkit-box-align: end;
                                            align-items: flex-end;
                                           }
                                    </style>





                                    <div class="col-md-" style="    margin-bottom: 26px;">
                                        <h1>Categories</h1>
                                    </div>

                                    {{-- @foreach($categories as $key => $cat)

                            
                                        @if($cat['parent_id'] == 0)
                                        
                                        <div type="button" style="display: block;margin-bottom: 8px;" class="btn btn-info" data-toggle="collapse" data-target="#cat_{{$cat['id']}}">{{$cat['name']}}</div>

                                        <div style="margin-bottom: 4px;text-align-last: center;" id="cat_{{$cat['id']}}" class="collapse">
                                            @foreach($categories as $key => $subcat)
                                                @if($subcat['parent_id'] == $cat['id'])
                                                    <div>
                                                        <input class="form-check-input" style="float: left;" type="checkbox" checked value="" id="flexCheckDefault{{$subcat['id']}}_{{$cat['id']}}">
                                                        <label for="flexCheckDefault{{$subcat['id']}}_{{$cat['id']}}" style="margin-bottom: 4px;display: contents;">{{$subcat['name']}}</label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>


                                        @endif

                                    @endforeach --}}


                                    @foreach($categories as $key => $cat)

                            
                                        @if($cat['parent_id'] == 0)
                                        
                                        <div type="button" style="display: block;margin-bottom: 8px;color: black;background-color:#9ad5e6" class="btn btn-info btnCatDrop" data-toggle="collapse" data-target="#cat_{{$cat['id']}}">{{$cat['name']}}</div>

                                        <div id="myGroup">
                                            <div  class="collapse Target_Collapse" style="margin-bottom: 4px;text-align-last: center;" data-parent="#myGroup" id="cat_{{$cat['id']}}" onclick="TargetCollapse(this)">
                                                <div>
                                                    <a style="color: black" class="subcats" href="{{url('DealsByCat/'.$cat['id'].'')}}"> <h4> All </h4>     </a>
                                                </div>
                                                
                                                @foreach($categories as $key => $subcat)
                                                    @if($subcat['parent_id'] == $cat['id'])
                                                        <div>
                                                            <a style="color: black" class="subcats" href="{{url('DealsByCat/'.$subcat['id'].'')}}"> <h4> {{$subcat['name']}} </h4>     </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>


                                        @endif

                                    @endforeach

                                    <script>

                                        jQuery('.btnCatDrop').click( function(e) {
                                            jQuery('.collapse').collapse('hide');
                                        });


                                    </script>
                                    <script>

                                        // function TargetCollapse(arg)
                                        // {
                                        //     alert(1);
                                        //     var id = $(this).attr("id");
                                        //     console.log(id);
                                        //     const collection = document.getElementsByClassName("Target_Collapse");
                                        //     console.log(collection);
                                        // }
                                        // $(".Target_Collapse").click(function(){
                                        //     // console.log(this);
                                        //     alert(1);
                                        //     var id = $(this).attr("id");
                                        //     console.log(id);
                                        //     const collection = document.getElementsByClassName("Target_Collapse");
                                        //     console.log(collection);
                                        // // alert("The paragraph was clicked.");
                                        // });
                                    </script>
                                        <style>
                                            .subcats:hover{
                                                text-decoration: none;
                                            }
                                        </style>

                                    {{-- <input type="text" class="js-range-slider" name="my_range" value="" />
                                        <script>
                                                $(".js-range-slider").ionRangeSlider();

                                        </script> --}}



                               
                                    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>

                                    <input type="text" class="js-range-slider" name="my_range" value="" />
                                    <script>
                                            $(".js-range-slider").ionRangeSlider({
                                                type: "double",
                                                grid: true,                             
                                                min: 0,
                                                max: 100,
                                                from: 0,
                                                to: 100,
                                                prefix: "%"
                                            });

                                    </script> --}}
                             
                                </div>




                                <style>
                                    /* .irs-line{
                                        background-color: green !important;
                                    }
                                    .irs-bar{
                                        background-color: green !important;
                                    } */
                                </style>








                                {{-- <div class="col-md-">
                                    <h1>Categories</h1>
                                </div> --}}

                                @php
                                    $cat_id_and_count = 0;

                                    // new 
                                    $array = array();
                                    foreach($deals as $d)
                                    {
                                        $array[] = $d;
                                    }
                                    if(count($array) > 0)
                                    {
                                        $cat_id_and_count = $array[0]['category_id'];
                                    }
                                    // new 

                                @endphp

                                {{-- <b>Categories</b> --}}
                                {{-- <ul class="nav flex-column scroll" style="max-height: 80vh; overflow: auto;margin-bottom: 28px;">
                                    @foreach($categories as $key => $cat)

                            
                                    @if($cat['parent_id'] == 0)
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{url('DealsByCat/'.$cat['id'])}}">{{$cat['name']}}</a></li>
                                    @endif

                                    @endforeach
                                </ul> --}}

                                <style>
                                    .irs--round.irs-with-grid {
                                        margin-top: 20px;
                                    }
                                    .type_last i{
                                        background: #1CAFFC !important;
                                    }
                                    .irs-to{
                                        background: #1CAFFC !important;
                                    }
                                    .irs-from{
                                        background: #1CAFFC !important;
                                    }
                                    .irs-bar{
                                        background: #1CAFFC !important;
                                    }
                                    .irs-handle{
                                        border: 4px solid #1CAFFC !important;
                                    }
                                </style>


                                @if($what_page == 'dealsByCat' )
                                    @if($cat_id_and_count > 0)
                                    {{-- <div style="margin-bottom: 17px; margin-top:20px;">
                                        <form method="get" action="{{url('DealsByCat/'.$cat_id_and_count.'')}}">
                                            @csrf
                                            <div class="form-group" style="">
                                     
                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>

                                            <input  type="text" class="js-range-slider" name="my_range" value="" />
                                            <script>
                                                    $(".js-range-slider").ionRangeSlider({
                                                        type: "double",
                                                        grid: true,                             
                                                        min: 0,
                                                        max: 100,
                                                        from: 0,
                                                        to: 100,
                                                        prefix: "%",
                                                        skin: "round",
                                                    });

                                            </script>

                                            <input style="margin-top: 20px;" type="text" class="js-location-slider" name="my_location" value="" />
                                            <script>
                                                    $(".js-location-slider").ionRangeSlider({
                                                        type: "double",
                                                        grid: true,                             
                                                        min: 0,
                                                        max: 100,
                                                        from: 0,
                                                        to: 100,
                                                        postfix: "KM",
                                                        skin: "round",
                                                    });
                                            </script>
                                           

                                            </div>
                                            <div style="   margin-top: 21px; text-align-last: center;">
                                                <button type="submit" style="background-color: #6ab6df" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div> --}}
                                    @endif
                                @else
                                {{-- <div style="margin-bottom: 17px; margin-top:20px;">
                                    <form method="get" action="{{url('PriceFilter')}}">
                                        @csrf
                                        
                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    
                                        <input  type="text" class="js-range-slider" name="my_range" value="" />
                                        <script>
                                                $(".js-range-slider").ionRangeSlider({
                                                    type: "double",
                                                    grid: true,                             
                                                    min: 0,
                                                    max: 100,
                                                    from: 0,
                                                    to: 100,
                                                    prefix: "%",
                                                    skin: "round",
                                                });
    
                                        </script>

                                        <input  type="text" class="js-location-slider" name="my_location" value="" />
                                        <script>
                                                $(".js-location-slider").ionRangeSlider({
                                                    type: "double",
                                                    grid: true,                             
                                                    min: 0,
                                                    max: 100,
                                                    from: 0,
                                                    to: 100,
                                                    prefix: "KM",
                                                    skin: "round",
                                                });

                                        </script>
                                       

                                        <div style="    margin-top: 21px; text-align-last: center;">
                                            <button type="submit" style="background-color: #6ab6df"  class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div> --}}
                                @endif



                                {{-- <div class="widget widget--tags" style="margin-bottom: 30px;">
                                    <h4 class="h6 widget-title">Popular Tags</h4>

                                    <ul class="UlWidget_ttile">
                                        <li class="listwidgettt"><a class="classANTag" href="#">Art</a></li>
                                        <li class="listwidgettt"><a class="classANTag" href="#">design</a></li>
                                        <li class="listwidgettt"><a class="classANTag" href="#">concept</a></li>
                                        <li class="listwidgettt"><a class="classANTag" href="#">Media</a></li>
                                        <li class="listwidgettt"><a class="classANTag" href="#">Photography</a></li>
                                        <li class="listwidgettt"><a class="classANTag" href="#">UI</a></li>
                                    </ul>
                                </div> --}}

                                <style>
                                    .classANTag:hover{
                                        text-decoration: none;
                                    }
                                    .classANTag{
                                        -webkit-text-size-adjust: 100%;
                                        -webkit-tap-highlight-color: transparent;
                                        font-family: -apple-system,BlinkMacSystemFont,"Open Sans",sans-serif;
                                        -webkit-box-direction: normal;
                                        list-style: none;
                                        margin: 0;
                                        box-sizing: inherit;
                                        text-decoration: none;
                                        display: inline-block;
                                        padding: 8px 20px;
                                        background-color: #333;
                                        line-height: 1.2;
                                        font-size: 1.1rem;
                                        font-weight: 700;
                                        text-align: center;
                                        text-transform: uppercase;
                                        letter-spacing: 0;
                                        color: #fff;
                                        border-radius: 30px;
                                        box-shadow: none;
                                        outline: 0;
                                        cursor: pointer;
                                        user-select: none;
                                        -webkit-user-drag: none;
                                        touch-action: manipulation;
                                        transition: background-color .25s ease-in-out,border-color .25s ease-in-out,color .25s ease-in-out;
                                    }
                                    .listwidgettt{
                                        -webkit-text-size-adjust: 100%;
                                        -webkit-tap-highlight-color: transparent;
                                        font-family: -apple-system,BlinkMacSystemFont,"Open Sans",sans-serif;
                                        font-weight: 400;
                                        color: #666;
                                        -webkit-box-direction: normal;
                                        list-style: none;
                                        line-height: 0;
                                        font-size: 0;
                                        letter-spacing: -1px;
                                        padding: 0;
                                        box-sizing: inherit;
                                        display: inline-block;
                                        vertical-align: top;
                                        margin: 3px;
                                    }
                                    .UlWidget_ttile{
                                        -webkit-text-size-adjust: 100%;
                                        -webkit-tap-highlight-color: transparent;
                                        font-family: -apple-system,BlinkMacSystemFont,"Open Sans",sans-serif;
                                        font-weight: 400;
                                        color: #666;
                                        -webkit-box-direction: normal;
                                        padding: 0;
                                        box-sizing: inherit;
                                        list-style: none;
                                        margin: -3px;
                                        line-height: 0;
                                        font-size: 0;
                                        letter-spacing: -1px;
                                    }
                                    .widget-title{
                                        -webkit-text-size-adjust: 100%;
                                        -webkit-tap-highlight-color: transparent;
                                        -webkit-box-direction: normal;
                                        padding: 0;
                                        margin: 0;
                                        box-sizing: inherit;
                                        line-height: 1.2;
                                        font-weight: 900;
                                        font-family: Raleway,sans-serif;
                                        text-transform: uppercase;
                                        color: #333;
                                        margin-bottom: 20px;
                                        transition: color .3s ease-in-out;
                                        font-size: 1.6rem;
                                        margin-top: 0;
                                    }
                                    .widget--tags{
                                        -webkit-text-size-adjust: 100%;
                                        -webkit-tap-highlight-color: transparent;
                                        line-height: 1.6;
                                        font-size: 1.4rem;
                                        font-family: -apple-system,BlinkMacSystemFont,"Open Sans",sans-serif;
                                        font-weight: 400;
                                        color: #666;
                                        -webkit-box-direction: normal;
                                        padding: 0;
                                        margin: 0;
                                        box-sizing: inherit;
                                        position: relative;
                                        margin-top: 40px;
                                    }
                                        
                                </style>





                            </div>

                            
                            <style>
                                .dropdown_class{
                                    margin-left: -7px;
                                }
                                @media only screen and (max-width: 767px) {
                                    .dropdown_class {
                                        margin-left: 205px ;
                                        width: 44%;
                                        /* display: inline-grid; */
                                    }
                                    }

                                    @media only screen and (max-width: 767px) {
                                    .dropdown_class {
                                        margin-left: 150px;
                                        width: 44%;
                                        /* display: inline-grid; */
                                    }
                                    }

                                    

                                    @media only screen and (max-width: 570px) {
                                    .dropdown_class {
                                        margin-left: 120px;
                                        width: 60%;
                                        /* display: inline-grid; */
                                    }
                                    }

                                    @media only screen and (max-width: 500px) {
                                    .dropdown_class {
                                        margin-left: 100px;
                                        width: 60%;
                                        /* display: inline-grid; */
                                    }
                                    }

                                    @media only screen and (max-width: 488px) {
                                    .dropdown_class {
                                        margin-left: 84px;
                                        width: 60%;
                                        /* display: inline-grid; */
                                    }
                                    }

                                    @media only screen and (max-width: 430px) {
                                    .dropdown_class {
                                        margin-left: 58px;
                                        width: 60%;
                                        /* display: inline-grid; */
                                    }
                                    }

                                    @media only screen and (max-width: 350px) {
                                    .dropdown_class {
                                        margin-left: 11px;
                                        width: 97%;
                                        /* display: inline-grid; */
                                    }
                                    }
                                
                                
                                .dropdown-item:hover{
                                    background: #F6F7FB;
                                    padding: 10px;
                                    color: black;
                                    text-decoration: none;
                                }
                            </style>



                            <div class="col-md-9">

                                @if(Session::has('success'))
                                <p class="alert alert-success" style="    text-align-last: center;
                                ">{{ Session::get('success') }}</p>
                                @endif
        
                                @if(Session::has('alert'))
                                <p class="alert alert-danger" style="    text-align-last: center;
                                ">{{ Session::get('alert') }}</p>
                                @endif

                                <div class="col-md-12">

                                    <div class='col-md-9 discount-card' style='padding: 10px; cursor: pointer;'>
                                        <h1 style="    display: inline-block;">{{$title}}</h1>
                                    </div>
                                    <div class='col-md-3 discount-card' style='padding: 10px; cursor: pointer;'>

                                        <form style="">

                                            <div class="form-group">
                                              <label for="exampleFormControlSelect1">Sort By</label>

                                              <div class="dropdown" style="">
                                                <button style="border: 2px solid gray;
                                                border-radius: 4px;
                                                text-align: -webkit-center;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Dropdown button
                                                </button>
                                                @if($what_page == 'dealsByCat' )
                                                <div style="   display: inline-grid;" class="dropdown-menu dropdown_class" aria-labelledby="dropdownMenuButton">
                                                    <a style="   font-size: 14px; padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('DealsByCatSorting/'.$cat_id_and_count.'/priceAsc')}}">Low - High </a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('DealsByCatSorting/'.$cat_id_and_count.'/priceDesc')}}">High - Low</a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('DealsByCatSorting/'.$cat_id_and_count.'/dateAsc')}}">Newest First</a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('DealsByCatSorting/'.$cat_id_and_count.'/dateDesc')}}">Oldest First</a>
                                                  </div>
                                                @elseif($what_page == 'TrendingDeals' )
                                                <div style="   display: inline-grid;" class="dropdown-menu dropdown_class" aria-labelledby="dropdownMenuButton">
                                                    <a style="   font-size: 14px; padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('TrendingDealsSort/priceAsc')}}">Low - High </a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('TrendingDealsSort/priceDesc')}}">High - Low</a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('TrendingDealsSort/dateAsc')}}">Newest First</a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('TrendingDealsSort/dateDesc')}}">Oldest First</a>
                                                </div>
                                                @else
                                                <div style="   display: inline-grid;" class="dropdown-menu dropdown_class" aria-labelledby="dropdownMenuButton">
                                                    <a style="   font-size: 14px; padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('categories/priceAsc')}}">Low - High </a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('categories/priceDesc')}}">High - Low</a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('categories/dateAsc')}}">Newest First</a>
                                                    <a style="    font-size: 14px;padding: 10px;text-align-last: center;
                                                                  " class="dropdown-item" href="{{url('categories/dateDesc')}}">Oldest First</a>
                                                  </div>
                                                @endif
                                                

                                              </div>

                                           
                                            </div>
                                           
                                          </form>

                                    </div>



                               
                                </div>

                                <input type="hidden" value="{{$UserType}}" id="UserType">

                                {{-- <div>
                                    <button onclick="LoadDeals()">  LOAD DEALS </button>
                                </div> --}}

                                

                                <div id="ToChangeFromAjaxLoadDeals">
                                    
                                    @foreach($deals as $key => $deal)
                                    <div>
                                        <a href="{{ URL('discount_details/'.$deal['id'])}}" data-id="{{$deal['id']}}" class="Anchor_included_all">
                                            <div class='col-md-4 discount-card' style='padding: 10px; cursor: pointer;'>
                                                    @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                                    <span class="ma_heart" data-id="{{$deal['id']}}" id="{{$deal['id']}}_maHeart" onmouseover="maHeartHover(this)"
                                                        style="
                                                        font-size: 37px;
                                                        right: 0;
                                                        /* right :33px; */
                                                        color : #b45b5b;
                                                        position: absolute;"
                                                        ><i class="fa fa-heart" aria-hidden="true"></i></span>
                                                    @endif
                                                <img style='width:100%; height:250px;; object-fit: contain;' src='{{''.config('path.path.WebPath').''.$deal['image']['path'].'/'.$deal['image']['image'].''}}' />
                                                <p style="margin-bottom: 0px;"><span> {{$deal['merchant_name']}}</span></p>
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
                                                <br /><span class='deal_des'>
                                                    {{ substr($deal['description'], 0, 40)}}...
                                                    @php
                                                    $blue_text = ($deal['discount_on_price'] / 100) * $deal['price'];
                                                    $blue_text =  $deal['price'] - $blue_text;
        
                                                    $now = Carbon\Carbon::now();
                                                    $expiry = $deal['additional_discount_date'];
                                                    $result = $now->lt($expiry);
                                                    @endphp
                                                    </span>
                                                    <br />
                                                    {{-- @if($deal['type'] == 'Entire Menu')
                                                            <span class='old-price' style="display: none;">{{$blue_text}}</span>
                                                            <img style="margin-bottom: 7px;margin-left: -5px; visibility:hidden" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">
                                                            @php
                                                                $price_to_pay_in_double_discount = $deal['price'] - ($deal['price'] * ($deal['additional_discount'] / 100) )
                                                            @endphp

                                                            
                                                            <span
                                                            class='new-price' style="color: #d30b0b;"> <span style="visibility: hidden;">12313</span> Entire Menu</span>
                                                    @else
                                                     
            
                                                        <span style="visibility:hidden;"  class='old-price'>1231233</span>
                                                        <img   style=" visibility:hidden;   margin-bottom: 7px;margin-left: -5px;" src="{{asset('assets/mannatIconBlack.png')}}" width="20px" alt="">
            
                                                      
                                                            <span
                                                            class='new-price'>${{$blue_text}}</span>
                                                   

                                                    @endif --}}
                                                    &nbsp;
                                                    {{-- @if($deal['additional_discount'] && $result)
                                                        @if($deal['additional_discount'] > 0)
        
                                                        <span class='percent-off' style="background-color: #d30b0b;">{{$deal['additional_discount']}}%
                                                            OFF</span>
                                                        
                                                        @endif
                                                    @else
                                                    <span class='percent-off'>{{$deal['discount_on_price']}}%
                                                        OFF</span>
                                                    @endif --}}
                                                {{-- @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                                <hr>
                                                <div class='location'>{{$deal['nearbyBranch']}}</div>
                                                <div class='nearkm'>Near <span>{{$deal['nearby']}} KMs</span></div>
                                                @elseif(!session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                                                <hr>
                                                <div class='location'>{{$deal['nearbyBranch']}}</div>
                                                <div class='nearkm'>Near <span>{{$deal['nearby']}} KMs</span></div>
                                                @endif --}}
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                           
                                </div>

                                

                            </div>
                            
                        </div>

                        <div style="    text-align-last: center;">
                            {{ $deals->links() }}
                        </div>
                    

                       
                        <script>
            
                            // function LoadDeals()
                            // {
                            //     let id = 1;
                            //     // console.log(1);
                            //     $.ajaxSetup({
                            //         headers: {
                            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            //         }
                            //     });

                            //     $.ajax({
                            //         type: 'GET',
                            //         url: `{{ url('LoadDeals/${id}') }}`,
                            //         dataType: 'json',
                            //         // dataType: 'html',
                            //         success: function(data) {
                               
                            //             UserType = document.getElementById('UserType').value;
                                 
                            //             console.log(data.data);
                            //             DealsArray = data.data;
                            //             html = ``;
                            //             DealsArray.forEach(deal => {
                            //                 console.log(deal);
                            //                 html += `
                            //                 <div>
                            //                 <a href="discount_details/${deal.id}" data-id="${deal.id}" class="Anchor_included_all">
                            //                     <div class='col-md-4 discount-card' style='padding: 10px; cursor: pointer;'>
                            //                                                                             <img style='width:100%; height:250px;; object-fit: contain;' src='https://gigiapi.zanforthstaging.com/images/deals/${deal.image.image}' />
                            //                         <p style="margin-bottom: 0px;"><span> ${deal.merchant_name} </span></p>
                                                    

                            //                         `;
                                                  
                            //                         if(UserType == 'User')
                            //                         {
                            //                             html += ` 
                            //                             <span class="ma_heart" data-id="${deal.id}" id="${deal.id}_maHeart" onmouseover="maHeartHover(this)"
                            //                                 style="
                            //                                 font-size: 37px;
                            //                                 right: 0;
                            //                                 /* right :33px; */
                            //                                 top: 28px;
                            //                                 color : #b45b5b;
                            //                                 position: absolute;"
                            //                                 ><i class="fa fa-heart" aria-hidden="true"></i></span>

                            //                             `;
                            //                         }
                                                 
                            //                         length = deal.name.length;
                            //                         // console.log(length);
                            //                         if(length >= 0 && length < 10)
                            //                         {
                            //                             html += `
                            //                             <b style='font-size: 18px;'>${deal.name}
                            //                                 <span class="random_text 12" style="visibility: hidden;">11111111111111111111111111111111111111</span>
                            //                             </b> `;
                            //                         }
                            //                         else if(length >= 10 && length < 20)
                            //                         {
                            //                             html += `
                            //                             <b style='font-size: 18px;'>${deal.name}
                            //                                 <span class="random_text 12" style="visibility: hidden;">34239042308402938049151</span>
                            //                             </b> `;
                            //                         }
                            //                         else if(length >= 20 && length < 30)
                            //                         {
                            //                             html += `
                            //                             <b style='font-size: 18px;'>${deal.name}
                            //                                 <span class="random_text 12" style="visibility: hidden;">342390423084029</span>
                            //                             </b> `;
                            //                         }
                            //                         else
                            //                         {
                            //                             html += `
                            //                             <b style='font-size: 18px;'> ${deal.name}
                                                           
                            //                             </b> `;
                            //                         }
                                                    
                            //                         description = deal.description.substring(0,40);
                                                    
                            //                         html += `
                            //                             <br /><span class='deal_des'>
                            //                             ${description}...
                            //                             </span>
                            //                             <br /> `;
                            //                         html += `                                                               
                            //                                 <span class='old-price'>120</span>
                            //                                 <img style="    margin-bottom: 7px;margin-left: -5px;" src="http://127.0.0.1:8000/assets/mannatIconBlack.png" width="20px" alt="">
                
                                                            
                            //                                 <span
                            //                                     class='new-price'>108</span>
                            //                                     <img style="    margin-bottom: 7px;margin-left: -5px;" src="http://127.0.0.1:8000/assets/mannatIcon.webp" width="20px" alt="">
                
                                                            
                            //                                                                                 &nbsp;
                            //                                                                                 <span class='percent-off'>10%
                            //                                 OFF</span>
                            //                                                                                                                             <hr>
                            //                         <div class='location'>ARNR Branch : Abid Market</div>
                            //                         <div class='nearkm'>Near <span>7.51 KMs</span></div>
                            //                                                                     </div>
                            //                 </a>
                            //                 </div>
                                        
                            //             `;
                            //             });

                                        


                            //             $("#ToChangeFromAjaxLoadDeals").empty();
                            //             $('#ToChangeFromAjaxLoadDeals').html(html);






















                            //         }
                            //     });
                            // }

                        </script>


                        <script>
                            // function maHeartHover(arg)
                            // {
                            //     console.log(123);
                            // }
                            // $(document).ready(function() {


                                // $(document).on("click", ".Anchor_included_all", function(){
                                //     alert("I'm the NEW one!");
                                // });

                                // $(".Anchor_included_all").on({
                                //     mouseenter: function () {
                                //         //stuff to do on mouse enter
                                //         alert(1);
                                //     },
                                //     mouseleave: function () {
                                //         //stuff to do on mouse leave
                                //         alert(1);
                                //     }
                                // });

                                $(document).on({
                                        mouseenter: function () {
                                        //stuff to do on mouse enter
                                        console.log(this);
                                        // console.log(this.getAttribute('data-id'));
                                        id = this.getAttribute('data-id');
                                        element = document.getElementById(`${id}_maHeart`);
                                        element.style.display = "block";
                                    },
                                        mouseleave: function () {
                                        id = this.getAttribute('data-id');
                                        element = document.getElementById(`${id}_maHeart`);
                                        element.style.display = "none";
                                        }
                                }, ".Anchor_included_all"); //pass the element as an argument to .on
                                




                                $(document).on({
                                    mouseenter: function () {
                                        //stuff to do on mouse enter
                                        this.style.color = "#e20b3d";
                                    },
                                    mouseleave: function () {
                                        this.style.color = "#b45b5b";
                                    }
                                }, ".ma_heart"); //pass the element as an argument to .on

                                // I LEFT HERE

                                $(document).on('click', '.ma_heart', function(){
                                    // alert("I'm the NEW one!");
                                    // alert(1);
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
    
                                        success: function(data) {
                                            
                                            
                                        }
                                    });
                                });


                                // $('.ma_heart').click(function(event){
                                // $(".ma_heart").on("click", function() {
                                //     alert(1);
                                //     event.preventDefault();
                                //     this.style.color = '#e31111';

                                //     id = this.getAttribute('data-id');
                                //     // console.log();

                                //     $.ajaxSetup({
                                //         headers: {
                                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                //         }
                                //     });

                                //     $.ajax({
                                //         type: 'GET',
                                //         url: `{{ url('add_to_wishlist/${id}') }}`,
    
                                //         success: function(data) {
                                            
                                            
                                //         }
                                //     });

                                // });













                                // $(document).on({
                                //         mouseenter: function () {
                                //         //stuff to do on mouse enter
                                //         console.log('enter');
                                //         this.style.color = "#e20b3d";
                                //     },
                                //         mouseleave: function () {
                                //         his.style.color = "#b45b5b";
                                //         console.log('leave');
                                //         }
                                // }, ".ma_heart"); //pass the element as an argument to .on

                                // $(".ma_heart").hover(function() {
                                //         this.style.color = "#e20b3d";
                                //     }, function() {
                                //         this.style.color = "#b45b5b";
                                //     });


                                // $(document).on("hover", ".Anchor_included_all", function() {
                                //         // $( this ).append( $( "<span> ***</span>" ) );
                                //         // console.log('1');
                                //         alert(1);
                                //     }, function() {
                                //         // $( this ).find( "span" ).last().remove();
                                //         // console.log('1');
                                //         alert(1);
                                //     }
                                // );


                            // });

                            // $(".Anchor_included_all").on("click", function() {
                            //             // $( this ).append( $( "<span> ***</span>" ) );
                            //             alert(1);
                            //             console.log('1');
                            //         // }, function() {
                            //         //     // $( this ).find( "span" ).last().remove();
                            //         //     console.log('1');
                            //         }
                            // );


                        //     $(document).ready(function() {
                        //         $( ".Anchor_included_all" ).hover(
                        //             function() {
                        //                 // $( this ).append( $( "<span> ***</span>" ) );
                        //                 console.log('1');
                        //             }, function() {
                        //                 // $( this ).find( "span" ).last().remove();
                        //                 console.log('1');
                        //             }
                        //             );
                        //     });
                        // </script>





                        {{-- <div style="    text-align-last: center;">
                            {{ $deals->links() }}
                        </div> --}}

                    </div>
                    
                </div>
            </div>
        </main>


        {{-- Anchor_included_all --}}
        <style>
            .page-item{
         
            }
            .pagination{
                margin-left: 29%;
            }
        </style>
        <style>
            .ma_heart{
                display: none;
            }
        </style>
        <script>
            $(document).ready(function() {
                $(".Anchor_included_all").hover(function() {
                    // $(this).css("background-color", "green");
                    console.log('hi');
                    // console.log(this.getAttribute('data-id'));
                    id = this.getAttribute('data-id');
                    element = document.getElementById(`${id}_maHeart`);
                    element.style.display = "block";
                    // console.log(element);
                }, function() {
                    // $(this).css("background-color", "yellow");
                    id = this.getAttribute('data-id');
                    element = document.getElementById(`${id}_maHeart`);
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
                    
                    
                }
            });





        });

        $(document).ready(function() {
                $(".ma_heart").hover(function() {
                    this.style.color = "#e20b3d";
                }, function() {
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