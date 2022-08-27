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
    <link rel="icon" type="image/png" href="{{asset('assets/USER/img/icons/128.png')}}" />
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
    {{--
    <!--Load global CSS and JS -->
    <link rel="preload" as="font" type="font/woff2"
        href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-regular.woff2')}}" crossorigin="anonymous" />
    <link rel="preload" as="font" type="font/woff2"
        href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-500.woff2')}}" crossorigin="anonymous" />
    <link rel="preload" as="font" type="font/woff2"
        href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-700.woff2')}}" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/core.css')}}" />
    <!--Load page specific CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/pages/home.css')}}" />
    <!-- Load icon font -->
    <link rel="preload" type="font/woff2" href="{{asset('assets/USER/fonts/icons.woff2')}}" as="font"
        crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'icons';
            src: url("fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff2"), url("/fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff");
        }
    </style>
    <!--PreLoad page specific JS -->
    <link rel="preload" as="script" href="{{asset('assets/USER/js/main.js')}}"> --}}

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
        body {
            background: #F6F7FB !important;
        }
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
                                {{-- <h1>Merchant Details</h1> --}}
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12" style="text-align: -webkit-center;
                                margin-top: 2rem;">

                                <div class="card" style="width: 28rem;">

                                    {{-- <img src="{{asset('assets/USER/admin/uploads/shop.jpg')}}" width="100%"
                                        class="card-img-top" alt="..."> --}}

                                    <div class="card-body">
                                        <h3 class="card-title">{{$merchant['name']}}</h3>
                                        <p style="  margin-top:20px;  margin-bottom: 2px;"> Contact# :
                                            {{$merchant['phone']}} </p>
                                        <p> Email : {{$merchant['email']}} </p>
                                    </div>
                                </div>

                                <hr>

                            </div>

                            <div class="col-md-12">

                                <div class="col-md-12">
                                    <h1 style="    text-align-last: center;    margin-bottom: 30px;
                                    margin-top: 30px; ">Branches of Merchant
                                        <hr style="    margin-top: 4rem;">
                                    </h1>

                                </div>


                                <style>
                                    .card-horizontal {
                                    display: flex;
                                    flex: 1 1 auto;
                                }

                                @media screen and (max-width: 480px) {
                                .card-horizontal {
                                    display: table-header-group;
                                }
                                }

                                </style>

                                <div class="container-fluid">
                                    <div class="row">
                                        
                                        @foreach($merchant['branches'] as $key => $branch)
                                        <div class="col-6 mt-3">
                                            <div class="card">
                                                <div class="card-horizontal">

                                                    <div class="img-square-wrapper">
                                                        {{-- <img class="" style="margin-right: 23px;" src="{{asset('assets/USER/admin/uploads/0c3Rcv5CGGarch.png')}}" width="150px;" alt="Card image cap"> --}}
                                                        <img class="" style="margin-right: 23px;" src="{{'https://gigiapi.zanforthstaging.com/'.config('path.path.BranchesPath').'/'.$branch['logo'].''}}" width="100px;" alt="Card image cap">
                                                    </div>

                                                    <div class="card-body">
                                                        <h3 class="card-title" style="margin-bottom: 10px;margin-top: 8px;"><strong>{{$branch['name']}}</strong></h3>
                                                        <p class="card-text" style="    margin-bottom: 8px;"> <strong>Address</strong> : {{$branch['address']}}.</p>
                                                        <p class="card-text"> <strong>Branch Description</strong> : {{$branch['description']}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                
                                {{-- @foreach($merchant['deals'] as $key => $deal) --}}

                                {{-- <a href="{{ URL('discount_details/'.$deal['id'])}}">

                                    <div class='col-md-4 discount-card' style='padding: 10px; cursor: pointer;'><img
                                            style='width:100%; object-fit: contain;' src='{{asset('assets/USER/admin/uploads/0c3Rcv5CGGarch.png')}}' />
                                        <b style='font-size: 18px;'>{{$deal['name']}}</b>

                                        <br /><span class='deal_des'>
                                            {{ substr($deal['description'], 0, 40)}}...
                                        </span>
                                        <br />
                                        <span class='old-price'>$219.8</span>&nbsp;
                                        <span class='new-price'>$157</span>
                                        &nbsp;
                                        <span class='percent-off'>${{$deal['discount']}}
                                            OFF</span>
                                        <hr>
                                       <div class='location'>Sed ut perspiciatis unde omnis iste natu...</div>
                                        
                                        <div class='nearkm'>Near <span>10 KMs</span></div>
                                    </div>
                                </a>  --}}

                                {{-- @endforeach  --}}
                                
                            </div>


                            <div class="col-md-12">

                                <div class="col-md-12">
                                    <h1 style="    text-align-last: center;    margin-bottom: 30px;
                                    margin-top: 30px; ">Deals by Vendor
                                        <hr style="    margin-top: 4rem;">
                                    </h1>

                                </div>









                                <section data-home-section-item="device-tiles"
                                class="row align-items-center position-relative z-index-0">
                                @foreach($deals as $key => $deal)
                                    {{-- @if($key == 4)
                                        @php
                                            break;
                                        @endphp
                                    @endif --}}
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
                                        <img style='width:100%; height:264px;object-fit: contain;' src='{{'https://gigiapi.zanforthstaging.com/'.$deal['image']['path'].'/'.$deal['image']['image'].''}}' />
    

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
                                            <span style="visibility: hidden;">34239042308402938049151</span>
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
                                        
                                            &nbsp;
                                            <br>
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
                                       
                                    </div>
    
    
                                @endforeach
                    
                            </section>


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
                                
                                

                            </div>

                            

                        </div>


                        <div style="text-align-last: center;">
                            {{ $deals->links() }}
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
        {{-- <footer class="footer darkmode">
            <div class="edge">
                <div class="row margin-top-2">
                    <div class="col-md">
                        <h5 class="ul-fold white">GiGi</h5>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Gigi</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">In your community</a></li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <h5 class="ul-fold white">Work with GiGi</h5>
                        <ul>
                            <li><a href="#">Meet Gigi</a></li>
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
                                <div class="col-*"> <img src="img/heading/logo-alternate.png" class="logo" alt=""
                                        width="34" height="34" loading="lazy"> </div>
                            </div>
                            <div class="col-md-6 col-lg-12 text-center text-md-left text-lg-right footer__newsletter">
                                <h5 class="white">Sign up for the GiGi newsletter</h5>
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
                                <p>Copyright © 2022 GiGi – All rights reserved
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


</body>

</html>