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
    <link rel="icon" type="{{asset('assets/USER/image/png')}}" href="i{{asset('assets/images/sibuy.png')}}" />
    {{-- <script src="vendor/jquery/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
    <link rel="preload" as="font" type="{{asset('assets/USER/font/woff2')}}" href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-regular.woff2')}}"
        crossorigin="anonymous" />
    <link rel="preload" as="font" type="{{asset('assets/USER/font/woff2')}}" href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-500.woff2')}}"
        crossorigin="anonymous" />
    <link rel="preload" as="font" type="{{asset('assets/USER/font/woff2')}}" href="{{asset('assets/USER/fonts/roboto-v29-latin_cyrillic-700.woff2')}}"
        crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/core.css')}}" />
    <!--Load page specific CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/pages/home.css')}}" />
    <!-- Load icon font -->
    <link rel="preload" type="{{asset('assets/USER/font/woff2')}}" href="{{asset('assets/USER/fonts/icons.woff2')}}" as="font" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'icons';
            src: url("{{asset('assets/USER/fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff2"), url("{{asset('assets/USER//fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff");
        }
    </style>
    <!--PreLoad page specific JS -->
    <link rel="preload" as="script" href="{{asset('assets/USER/js/main.js')}}">

    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.min.css" integrity="sha512-HPSfJxnyVYJb4v9afT3fXvs0mXvdg/C7eYxBl1EYS7uQHuCU/0lSGhaH9o23Tw8FofBiGQfFWzMYD9TqK8tv/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<style>
    .section-apps{
        margin-top: 65px !important;
    }
    @media (min-width: 768px){
    .home__section {
        margin-top: 65px !important;
        margin-bottom: 94px !important;
    }}
    .section-voice-assistants{
        margin-top: -125px !important;
    }
</style>


<body style="padding: 0em;">
    <div class="website">


        @include('user.layouts.header')


        <main>
            <div class="home">
                <div id="section-intro" data-home-section class="home-intro bg-body">
                    <div class="home-intro__body edge margin-top-2 margin-md-top-10">
                        <div class="row">
                            <div class="col-md-9 col-lg-7 trim">
                                <h1 class="home-intro__title text-preset-hero-0">All Discounts & Deals<br />under one
                                    App</h1>
                                <p class="home-intro__caption text-preset-hero-3 color-text-medium">Switch to the app!
                                    Search, purchase, and redeem Voucher Deal directly from your mobile device.</p>
                                <div class="row sliderbtn">
                                    <div class="col-md-4">
                                        <a href=""><img src="{{asset('assets/USER/img/pages/home/appstore.png')}}" alt="" loading="lazy"
                                                width="197" height="59"></a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href=""><img src="{{asset('assets/USER/img/pages/home/playstore.png')}}" alt="" loading="lazy"
                                                width="197" height="59"></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="edge home-intro__video-wrapper">
                        <div class="home-intro__video-container">
                            <picture> <img width="960" height="600" class="home-intro__video-poster"
                                    {{-- src="{{asset('assets/USER/sequence/pages/home/hero/base.png')}}"
                                    srcset="{{asset('assets/USER/sequence/pages/home/hero/base.png')}} 1x, {{asset('assets/USER/sequence/pages/home/hero/base@2x.png')}} 2x"
                                    alt="Homey Pro" />  --}}
                                    src="{{asset('assets/baseS2.png')}}"
                                    srcset="{{asset('assets/base2xS.png')}} 1x, {{asset('assets/base2xS.png')}} 2x"
                                    alt="Homey Pro" /> 
                                
                                
                                </picture>
                        </div>
                    </div>
                    <div class="home-intro__curve-wrapper">
                        <div class="home-intro__curve">
                            <svg class="home-intro__curve-svg" width="2700px" height="280px" viewBox="0 0 2700 280">
                                <path
                                    d="M390,199 C977.024038,199 1391.86307,-4.26325641e-13 1731.86307,-4.26325641e-13 C2071.86307,-4.26325641e-13 2384.68099,100 2700,100 L2700,279 C2523.32192,279.112879 2393.32192,279.192899 2310,279.240062 C1231.90158,279.850297 591.663884,279.770276 390,279 L0,279 L0,199 L390,199 Z"
                                    id="Path-20" fill="#FFFFFF"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- Start Devices -->
                <section id="section-devices" data-home-section="devices" class="margin-top-5" style="    margin-top: 10px;
                ">
                    <div class="edge">
                        <section data-home-section-item="device-tiles"
                            class="row align-items-center position-relative z-index-0">
                            <div class="home-circle home-circle--devices"></div>
                        </section>
                        <!-- End Devices: Smart Home -->
                        <!-- Start Devices: Controls -->
                        <section data-home-section-item="device-controls" data-home-control-tabs
                            class="margin-top-5 row align-items-center home-controls z-index-10 position-relative">
                            <div
                                class="col-md-12 col-lg-5 order-lg-3 trim margin-md-bottom-3 margin-lg-bottom-0 text-align-md-center text-align-lg-left">
                                <div class="home-controls__intro trim">
                                    <h3 class="text-preset-hero-2">Get Deals & Discounts via Voucher Deal</h3>
                                    <p class="text-preset-body-large">Switch to the app! Search, purchase, and redeem
                                        Voucher Deal directly from your mobile device.</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 order-md-1">
                                <div class="home-controls__tabs d-none d-md-block">
                                    <button data-home-control-tabs-target="1" type="button"
                                        class="home-controls__tab is-active"> <span
                                            class="home-controls__tab-icon home-controls__tab-icon--thermostat"></span>Browse
                                        Categories</button>
                                    <button data-home-control-tabs-target="2" type="button" class="home-controls__tab">
                                        <span
                                            class="home-controls__tab-icon home-controls__tab-icon--lights"></span>Select
                                        Deals</button>
                                    <button data-home-control-tabs-target="3" type="button" class="home-controls__tab">
                                        <span
                                            class="home-controls__tab-icon home-controls__tab-icon--sensors"></span>Get
                                        Discounts</button>
                                    <button data-home-control-tabs-target="4" type="button" class="home-controls__tab">
                                        <span class="home-controls__tab-icon home-controls__tab-icon--locks"></span>Show
                                        Voucher Deal on Outlet</button>
                                    <button data-home-control-tabs-target="5" type="button" class="home-controls__tab">
                                        <span class="home-controls__tab-icon home-controls__tab-icon--media"></span>Save
                                        Money</button>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 flex order-md-2">
                                <div class="home-controls__phone-wrapper margin-top-2 margin-md-top-0"
                                    data-home-controls-container>
                                    <div data-home-controls-dragger class="home-controls__phone-dragger">
                                        <div data-home-controls-content class="home-controls__content">
                                            <div class="home-controls__phone">
                                                <picture>
                                                    <source
                                                        srcset="img/pages/home/phone.webp 1x, img/pages/home/phone@2x.webp 2x"
                                                        type="image/webp" media="(min-width: 0px)">
                                                    <source
                                                        srcset="img/pages/home/phone.png 1x, img/pages/home/phone@2x.png 2x"
                                                        type="image/png" media="(min-width: 0px)">
                                                    <img class="picture home-controls__phone-frame"
                                                        src="img/pages/home/phone.png" alt="" loading="lazy" width="277"
                                                        height="591">
                                                </picture>
                                                <!-- Start Controls: Thermostat -->
                                                <div data-home-control-tabs-item="1"
                                                    class="home-phone-screen home-phone-screen-thermostat home-controls__phone-screen is-active">
                                                    <div class="home-controls__phone-mob">
                                                        <picture> <img class="picture home-controls__phone-frame-mob"
                                                                src="{{asset('assets/USER/img/pages/home/browse-mob.png')}}" alt=""
                                                                loading="lazy" width="277" height="591"> </picture>
                                                    </div>
                                                </div>
                                                <!-- End Controls: Thermostat -->
                                                <!-- Start Controls: Lights -->
                                                <div data-home-control-tabs-item="2"
                                                    class="home-phone-screen home-phone-screen-thermostat home-controls__phone-screen">
                                                    <div class="home-controls__phone-mob">
                                                        <picture> <img class="picture home-controls__phone-frame-mob"
                                                                src="{{asset('assets/USER/img/pages/home/tab_phone2.png')}}" alt=""
                                                                loading="lazy" width="277" height="591"> </picture>
                                                    </div>
                                                </div>
                                                <!-- End Controls: Lights -->
                                                <!-- Start Controls: Sensors -->
                                                <div data-home-control-tabs-item="3"
                                                    class="home-phone-screen home-phone-screen-thermostat home-controls__phone-screen">
                                                    <div class="home-controls__phone-mob">
                                                        <picture> <img class="picture home-controls__phone-frame-mob"
                                                                src="{{asset('assets/USER/img/pages/home/tab_phone3.png')}}" alt=""
                                                                loading="lazy" width="277" height="591"> </picture>
                                                    </div>
                                                </div>
                                                <!-- End Controls: Sensors -->
                                                <!-- Start Controls: Locks -->
                                                <div data-home-control-tabs-item="4"
                                                    class="home-phone-screen home-phone-screen-thermostat home-controls__phone-screen">
                                                    <div class="home-controls__phone-mob">
                                                        <picture> <img class="picture home-controls__phone-frame-mob"
                                                                src="{{asset('assets/USER/img/pages/home/tab_phone4.png')}}" alt=""
                                                                loading="lazy" width="277" height="591"> </picture>
                                                    </div>
                                                </div>
                                                <!-- End Controls: Locks -->
                                                <!-- Start Controls: Media -->
                                                <div data-home-control-tabs-item="5"
                                                    class="home-phone-screen home-phone-screen-thermostat home-controls__phone-screen">
                                                    <div class="home-controls__phone-mob">
                                                        <picture> <img class="picture home-controls__phone-frame-mob"
                                                                src="{{asset('assets/USER/img/pages/home/tab_phone5.png')}}" alt=""
                                                                loading="lazy" width="277" height="591"> </picture>
                                                    </div>
                                                </div>
                                                <!-- End Controls: Media -->
                                            </div>
                                        </div>
                                    </div>
                                    <ul data-home-controls-dots class="home-controls__dots d-md-none">
                                        <li class="is-active"></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <!-- End Devices: controls -->
                        <!-- Start Devices: Pair -->
                        <section class="margin-top-5 row align-items-center">
                            <div class="col-md-5">
                                <h3 class="text-preset-hero-2">Brands Onboard</h3>
                                <p class="text-preset-body-large">With Sibuy app you can access thousand of discounts at
                                    nearby restaurants, salons, retailers, grocery stores, doctor’s clinic and so many
                                    more.</p>
{{-- 
                                    <p class="" style="width:51%;"><a
                                        class="gradient-button-blue-large-full text-align-center homebtn"
                                        href="{{url('/categories')}}">Browse Our Deals!</a>
                                        <a
                                        class="gradient-button-red-large-full text-align-center homebtn"
                                        href="{{url('login')}}">Login / Signup!</a>
                                    </p> --}}

                                    <p class="" style="width:51%;display: -webkit-box;"><a
                                        class="gradient-button-blue-large-full text-align-center homebtn"
                                        href="{{url('/categories')}}">Browse Our Deals!</a>
                                        <a style="margin-left: 17px;"
                                        class="gradient-button-red-large-full text-align-center homebtn"
                                        href="{{url('login')}}">Login / Signup!</a>
                                    </p>

                                    {{-- <p class="" style="width:51%;"><a
                                        class="gradient-button-red-large-full text-align-center homebtn"
                                        href="{{url('login')}}">Login / Signup!</a></p> --}}

                            </div>
                            <div class="col-md-6 offset-md-1 flex justify-content-center justify-content-md-end">
                                <div class="home-control-radar-ratio">
                                    <div class="home-control-radar">
                                        <picture> <img class="picture home-control-radar__logo"
                                                src="{{asset('assets/images/sibuy.png')}}" alt="" loading="lazy" width="80"
                                                height="80"> </picture>
                                        <div class="home-control-radar__groups">
                                            <div class="home-control-radar__group">
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Adidas.png')}}" alt="Adidas" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img" src="{{asset('assets/USER/img/pages/home/KFC.png')}}"
                                                            alt="KFC" loading="lazy" width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Mcdonald.png')}}" alt="Mcdonald"
                                                            loading="lazy" width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Nike.png')}}" alt="Nike" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Ruban.png')}}" alt="Ruban" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                            </div>
                                            <div class="home-control-radar__group">
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Adidas.png')}}" alt="Adidas" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img" src="{{asset('assets/USER/img/pages/home/KFC.png')}}"
                                                            alt="KFC" loading="lazy" width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Mcdonald.png')}}" alt="Mcdonald"
                                                            loading="lazy" width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Nike.png')}}" alt="Nike" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Ruban.png')}}" alt="Ruban" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                            </div>
                                            <div class="home-control-radar__group">
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Adidas.png')}}" alt="Adidas" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img" src="{{asset('assets/USER/img/pages/home/KFC.png')}}"
                                                            alt="KFC" loading="lazy" width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Mcdonald.png')}}" alt="Mcdonald"
                                                            loading="lazy" width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Nike.png')}}" alt="Nike" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Ruban.png')}}" alt="Ruban" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                            </div>
                                            <div class="home-control-radar__group">
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Adidas.png')}}" alt="Adidas" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img" src="{{asset('assets/USER/img/pages/home/KFC.png')}}"
                                                            alt="KFC" loading="lazy" width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Mcdonald.png')}}" alt="Mcdonald"
                                                            loading="lazy" width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Nike.png')}}" alt="Nike" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                                <div class="home-control-radar__item">
                                                    <div class="home-control-radar__circle"> <img
                                                            class="home-control-radar__img"
                                                            src="{{asset('assets/USER/img/pages/home/Ruban.png')}}" alt="Ruban" loading="lazy"
                                                            width="80" height="80" /> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>


                        
                        <!--     End Pair and Play -->
                    </div>
                </section>
                <!-- End Control -->
                <div class="bg-body position-relative">
                    <div class="home-gradient-in"></div>
                    <div class="home-gradient-out"></div>
                </div>
                {{-- <div class="position-relative">
                    <!-- Start Apps -->
                    <section id="section-apps" data-home-section="apps" class="home__section">
                        <div class="edge trim">
                            <h2 class="text-preset-hero-1 gradient-text-orange" style="font-size: 77px;">See How can you save with Sibuy</h2>
                        </div>
                        <!-- Start Apps: Explainer -->
                        <div class="home-apps-bloom-wrapper d-none d-lg-block">
                            <div data-apps-bloom-group="1" class="home-apps-bloom-model">
                                <!-- Model Hue -->
                                <div data-apps-bloom-step="1">
                                    <div data-apps-bloom-root="line" data-apps-bloom-target="line-hue">line</div>
                                    <div data-apps-bloom-group="2">
                                        <div data-apps-bloom-step="2">
                                            <div data-apps-bloom-root="app" data-apps-bloom-target="app-hue">app</div>
                                            <div data-apps-bloom-group="3">
                                                <div data-apps-bloom-step="3">
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-hue-set-the">line</div>
                                                    <div data-apps-bloom-root="flow"
                                                        data-apps-bloom-target="flow-hue-set-the">flow</div>
                                                </div>
                                                <div data-apps-bloom-step="3">
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-hue-white-color">line</div>
                                                    <div data-apps-bloom-root="device"
                                                        data-apps-bloom-target="device-philips-hue-iris">device</div>
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-hue-blink-the">line</div>
                                                    <div data-apps-bloom-root="flow"
                                                        data-apps-bloom-target="flow-hue-blink-the">flow</div>
                                                </div>
                                                <div data-apps-bloom-step="3">
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-hue-iris">line</div>
                                                    <div data-apps-bloom-root="device"
                                                        data-apps-bloom-target="device-philips-hue-white-color">device
                                                    </div>
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-hue-set-to">line</div>
                                                    <div data-apps-bloom-root="flow"
                                                        data-apps-bloom-target="flow-hue-set-to">flow</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Model Twitter -->
                                <div data-apps-bloom-step="1">
                                    <div data-apps-bloom-root="line" data-apps-bloom-target="line-twitter">line</div>
                                    <div data-apps-bloom-group="2">
                                        <div data-apps-bloom-step="2">
                                            <div data-apps-bloom-root="app" data-apps-bloom-target="app-twitter">app
                                            </div>
                                            <div data-apps-bloom-group="3">
                                                <div data-apps-bloom-step="3">
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-twitter-tweet-status">line</div>
                                                    <div data-apps-bloom-root="flow"
                                                        data-apps-bloom-target="flow-twitter-tweet-status">flow</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Model Fibaro -->
                                <div data-apps-bloom-step="1">
                                    <div data-apps-bloom-root="line" data-apps-bloom-target="line-fibaro">line</div>
                                    <div data-apps-bloom-group="2">
                                        <div data-apps-bloom-step="2">
                                            <div data-apps-bloom-root="app" data-apps-bloom-target="app-fibaro">app
                                            </div>
                                            <div data-apps-bloom-group="3">
                                                <div data-apps-bloom-step="3">
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-fibaro-wall-plug">line</div>
                                                    <div data-apps-bloom-root="device"
                                                        data-apps-bloom-target="device-fibaro-wall-plug">device</div>
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-fibaro-the-power">line</div>
                                                    <div data-apps-bloom-root="flow"
                                                        data-apps-bloom-target="flow-fibaro-the-power">flow</div>
                                                </div>
                                                <div data-apps-bloom-step="3">
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-fibaro-motion-sensor">line</div>
                                                    <div data-apps-bloom-root="device"
                                                        data-apps-bloom-target="device-fibaro-motion-sensor">device
                                                    </div>
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-fibaro-the-luminance">line</div>
                                                    <div data-apps-bloom-root="flow"
                                                        data-apps-bloom-target="flow-fibaro-the-luminance">flow</div>
                                                </div>
                                                <div data-apps-bloom-step="3">
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-fibaro-smoke-sensor">line</div>
                                                    <div data-apps-bloom-root="device"
                                                        data-apps-bloom-target="device-fibaro-smoke-sensor">device</div>
                                                    <div data-apps-bloom-root="line"
                                                        data-apps-bloom-target="line-fibaro-the-smoke">line</div>
                                                    <div data-apps-bloom-root="flow"
                                                        data-apps-bloom-target="flow-fibaro-the-smoke">flow</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="home-apps-bloom-sticky overflow-x-md-hidden">
                                <div class="edge">
                                    <section class="flex flex-direction-column">
                                        <div data-home-section-item="apps-bloom"
                                            class="home-apps-bloom margin-bottom-9">
                                            <svg data-apps-bloom-svg width="1040px" height="434px"
                                                viewBox="0 0 1040 434" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g fill="none" fill-rule="evenodd" transform="translate(8,13)">
                                                    <g id="homey" transform="translate(365, 16)">
                                                        <path id="line-twitter" d="M144,0 L144,232" />
                                                        <path id="line-fibaro" d="M144,0 C144,86 192,129 288,129" />
                                                        <path id="line-hue"
                                                            d="M144,0 C144,86 96,129 -5.68434189e-14,129" />
                                                    </g>
                                                    <!-- Model Hue -->
                                                    <g id="hue-next" transform="translate(142, 35)">
                                                        <path id="line-hue-white-color" d="M223,110 L0,109" />
                                                        <path id="line-hue-iris"
                                                            d="M223,110 C145,110 106,157 106,253" />
                                                        <path id="line-hue-set-the"
                                                            d="M223,110 C147,110 109,73 109,0" />
                                                    </g>
                                                    <g id="hue-flow-cards" transform="translate(0, 144)">
                                                        <path id="line-hue-blink-the"
                                                            d="M142,0 C142,33 142,25 142,65 C142,125 0,80 0,141 L0,171" />
                                                        <path id="line-hue-set-to"
                                                            d="M248,144 C248,161 248,183 248,211 C248,252 157,225 157,262 L157,288" />
                                                    </g>
                                                    <!-- Model Twitter -->
                                                    <path id="line-twitter-tweet-status" d="M509,248.5 L510,359.5" />
                                                    <!-- Model Fibaro -->
                                                    <g id="fibaro-next" transform="translate(653, 0)">
                                                        <path id="line-fibaro-wall-plug"
                                                            d="M0,145 C90,145 118,54 118,0" />
                                                        <path id="line-fibaro-motion-sensor" d="M0,145 L223,145" />
                                                        <path id="line-fibaro-smoke-sensor"
                                                            d="M0,145 C73,145 110,192 112,288" />
                                                    </g>
                                                    <g id="fibaro-flow-cards" transform="translate(765, 0)">
                                                        <path id="line-fibaro-the-power" d="M6,0.5 L273,0.5" />
                                                        <path id="line-fibaro-the-luminance"
                                                            d="M111,145.5 C111,147.5 111,168 111,209.5 C111,270.5 254,235.5 254,285.5 L254,315.5" />
                                                        <path id="line-fibaro-the-smoke"
                                                            d="M0,288.5 C0,297 0,319 0,352.5 C0,402.5 97,362.5 97,402.5 L97,432.5" />
                                                    </g>
                                                </g>
                                            </svg>
                                            <picture> <img class="picture home-apps-bloom__logo"
                                                    src="{{asset('assets/images/sibuy.png')}}" alt="" loading="lazy"
                                                    width="80" height="80"> </picture>
                                            <div class="home-apps-bloom__apps">
                                                <div id="app-fibaro" class="home-apps-bloom__app">
                                                    <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Adidas.png')}}"
                                                            alt="" loading="lazy" width="80" height="80"> </picture>
                                                </div>
                                                <div id="app-twitter" class="home-apps-bloom__app">
                                                    <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/KFC.png')}}" alt=""
                                                            loading="lazy" width="80" height="80"> </picture>
                                                </div>
                                                <div id="app-hue" class="home-apps-bloom__app">
                                                    <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Nike.png')}}" alt=""
                                                            loading="lazy" width="80" height="80"> </picture>
                                                </div>
                                            </div>
                                            <div class="home-apps-bloom__devices">
                                                <div id="device-fibaro-wall-plug" class="home-apps-bloom__device">
                                                    <div id="" class="device-tile device-tile--default">
                                                        <div class="device-tile__content"> <img width="70"
                                                                src="{{asset('assets/USER/img/pages/home/category/young-man.png')}}" alt="Men" />
                                                        </div>
                                                        <div class="device-tile__title">Men's</div>
                                                    </div>
                                                </div>
                                                <div id="device-fibaro-motion-sensor" class="home-apps-bloom__device">
                                                    <div id="" class="device-tile device-tile--default">
                                                        <div class="device-tile__content"> <img width="70"
                                                                src="{{asset('assets/USER/img/pages/home/category/family.png')}}" alt="Family" />
                                                        </div>
                                                        <div class="device-tile__title">Family</div>
                                                    </div>
                                                </div>
                                                <div id="device-fibaro-smoke-sensor" class="home-apps-bloom__device">
                                                    <div id="" class="device-tile device-tile--default">
                                                        <div class="device-tile__content"> <img width="70"
                                                                src="{{asset('assets/USER/img/pages/home/category/woman.png')}}" alt="Women" />
                                                        </div>
                                                        <div class="device-tile__title">Women's</div>
                                                    </div>
                                                </div>
                                                <div id="device-philips-hue-iris" class="home-apps-bloom__device">
                                                    <div id="" class="device-tile device-tile--default">
                                                        <div class="device-tile__content"> <img width="70"
                                                                src="{{asset('assets/USER/img/pages/home/category/world.png')}}" alt="Travel" />
                                                        </div>
                                                        <div class="device-tile__title">Travel</div>
                                                    </div>
                                                </div>
                                                <div id="device-philips-hue-white-color"
                                                    class="home-apps-bloom__device">
                                                    <div id="" class="device-tile device-tile--default">
                                                        <div class="device-tile__content"> <img width="70"
                                                                src="{{asset('assets/USER/img/pages/home/category/children.png')}}"
                                                                alt="children" /> </div>
                                                        <div class="device-tile__title">Kids</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="home-apps-bloom__flows">
                                                <div id="flow-fibaro-the-power" class="home-apps-bloom__flow">
                                                    <div class="home-flow-card home-flow-card--small component">
                                                        <div class="home-flow-card__icon"> <img class="picture "
                                                                src="{{asset('assets/USER/img/pages/home/Testi2.png')}}" alt="" loading="lazy"
                                                                width="40" height="40"> </div>
                                                        <div class="home-flow-card__content">
                                                            <div class="home-flow-card__caption">John Doe</div>
                                                            <div class="home-flow-card__title"
                                                                style="color: #0194fb;font-size: 14px;">Avail <span
                                                                    style="color: #2bb673;">50%</span> Discount on Nike
                                                                Air Max</div>
                                                        </div>
                                                        <div
                                                            class="home-flow-card__check mask-check-circle color-green">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flow-fibaro-the-luminance" class="home-apps-bloom__flow">
                                                    <div class="home-flow-card home-flow-card--small component">
                                                        <div class="home-flow-card__icon"> <img class="picture "
                                                                src="{{asset('assets/USER/img/pages/home/Testi3.png')}}" alt="" loading="lazy"
                                                                width="40" height="40"> </div>
                                                        <div class="home-flow-card__content">
                                                            <div class="home-flow-card__caption">John Doe</div>
                                                            <div class="home-flow-card__title"
                                                                style="color: #0194fb;font-size: 14px;">Avail <span
                                                                    style="color: #2bb673;">50%</span> Discount on Nike
                                                                Air Max</div>
                                                        </div>
                                                        <div
                                                            class="home-flow-card__check mask-check-circle color-green">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flow-fibaro-the-smoke" class="home-apps-bloom__flow">
                                                    <div class="home-flow-card home-flow-card--small component">
                                                        <div class="home-flow-card__icon"> <img class="picture "
                                                                src="{{asset('assets/USER/img/pages/home/Testi1.png')}}" alt="" loading="lazy"
                                                                width="40" height="40"> </div>
                                                        <div class="home-flow-card__content">
                                                            <div class="home-flow-card__caption">Jane Doe</div>
                                                            <div class="home-flow-card__title"
                                                                style="color: #0194fb;font-size: 14px;">Avail <span
                                                                    style="color: #2bb673;">50%</span> Discount on Nike
                                                                Air Max</div>
                                                        </div>
                                                        <div
                                                            class="home-flow-card__check mask-check-circle color-green">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flow-twitter-tweet-status" class="home-apps-bloom__flow">
                                                    <div class="home-flow-card home-flow-card--small component">
                                                        <div class="home-flow-card__icon"> <img class="picture "
                                                                src="{{asset('assets/USER/img/pages/home/Testi3.png')}}" alt="" loading="lazy"
                                                                width="40" height="40"> </div>
                                                        <div class="home-flow-card__content">
                                                            <div class="home-flow-card__caption">John Doe</div>
                                                            <div class="home-flow-card__title"
                                                                style="color: #0194fb;font-size: 14px;">Avail <span
                                                                    style="color: #2bb673;">50%</span> Discount on Nike
                                                                Air Max</div>
                                                        </div>
                                                        <div
                                                            class="home-flow-card__check mask-check-circle color-green">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flow-hue-set-to" class="home-apps-bloom__flow">
                                                    <div class="home-flow-card home-flow-card--small component">
                                                        <div class="home-flow-card__icon"> <img class="picture "
                                                                src="{{asset('assets/USER/img/pages/home/Testi2.png')}}" alt="" loading="lazy"
                                                                width="40" height="40"> </div>
                                                        <div class="home-flow-card__content">
                                                            <div class="home-flow-card__caption">John Doe</div>
                                                            <div class="home-flow-card__title"
                                                                style="color: #0194fb;font-size: 14px;">Avail <span
                                                                    style="color: #2bb673;">50%</span> Discount on Nike
                                                                Air Max</div>
                                                        </div>
                                                        <div
                                                            class="home-flow-card__check mask-check-circle color-green">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flow-hue-blink-the" class="home-apps-bloom__flow">
                                                    <div class="home-flow-card home-flow-card--small component">
                                                        <div class="home-flow-card__icon"> <img class="picture "
                                                                src="{{asset('assets/USER/img/pages/home/Testi3.png')}}" alt="" loading="lazy"
                                                                width="40" height="40"> </div>
                                                        <div class="home-flow-card__content">
                                                            <div class="home-flow-card__caption">John Doe</div>
                                                            <div class="home-flow-card__title"
                                                                style="color: #0194fb;font-size: 14px;">Avail <span
                                                                    style="color: #2bb673;">50%</span> Discount on Nike
                                                                Air Max</div>
                                                        </div>
                                                        <div
                                                            class="home-flow-card__check mask-check-circle color-green">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="flow-hue-set-the" class="home-apps-bloom__flow">
                                                    <div class="home-flow-card home-flow-card--small component">
                                                        <div class="home-flow-card__icon"> <img class="picture "
                                                                src="{{asset('assets/USER/img/pages/home/Testi1.png')}}" alt="" loading="lazy"
                                                                width="40" height="40"> </div>
                                                        <div class="home-flow-card__content">
                                                            <div class="home-flow-card__caption">Jane Doe</div>
                                                            <div class="home-flow-card__title"
                                                                style="color: #0194fb;font-size: 14px;">Avail <span
                                                                    style="color: #2bb673;">50%</span> Discount on Nike
                                                                Air Max</div>
                                                        </div>
                                                        <div
                                                            class="home-flow-card__check mask-check-circle color-green">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- End Apps: Explainer -->
                    </section>
                    <!-- End Apps -->
                </div> --}}
                <div class="bg-body position-relative">
                    <div class="home-gradient-in"></div>
                    <!-- Start Integrations -->
                    {{-- <section id="section-voice-assistants" data-home-section
                        class="margin-top-2 margin-md-top-6 overflow-x-md-hidden" style="margin-top: -126px;">
                        <div class="edge">
                            <!-- Start Integrations: Voice Assistants -->
                            <script type="text/javascript">
                                I18N['pages.home.integrations.assistants.config.google.providerText'] = 'Hey Google,';
                                    I18N['pages.home.integrations.assistants.config.google.commandText'] = 'start movie time!';
                                    I18N['pages.home.integrations.assistants.config.alexa.providerText'] = 'Alexa,';
                                    I18N['pages.home.integrations.assistants.config.alexa.commandText'] = 'set the temperature to 21 °C.';
                                    I18N['pages.home.integrations.assistants.config.siri.providerText'] = 'Hey Siri,';
                                    I18N['pages.home.integrations.assistants.config.siri.commandText'] = 'good night!';
                            </script>
                            <section data-home-section-item="assistants-bloom"
                                class="row amrgin-md-top-6 margin-lg-top-9 position-relative">
                                <div class="col-lg-5 position-lg-absolute">
                                    <h3 class="text-preset-hero-2">User are Increasing<br>Day by Day!</h3>
                                    <p class="text-preset-body-large">Switch to the app! Search, purchase, and redeem
                                        Coupon directly from your mobile device.</p>
                                </div>
                                <div class="col-lg-8 offset-lg-4 col-lg-7 offset-lg-5 home-assistants-bloom-container">
                                    <div data-home-assistants-bloom class="home-assistants-bloom">
                                        <svg data-home-assistants-bloom-svg
                                            class="home-assistants-bloom-svg home-assistants-bloom__svg" width="610px"
                                            height="456px" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <defs>
                                                <linearGradient id="svg-gradient-assistant-bloom" x1="0%" y1="0%"
                                                    x2="0%" y2="100%" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0%" style="stop-color:#0086FF;stop-opacity:1" />
                                                    <stop offset="100%" style="stop-color:#00CAFF;stop-opacity:1" />
                                                </linearGradient>
                                            </defs>
                                            <g class="home-assistants-bloom-svg__lines" stroke-width="3" fill="none">
                                                <g class="home-assistants-bloom-svg__assistants">
                                                    <path d="M0,0 C0,47.755102 168,34.8979592 168,90"
                                                        data-mobile-d="M0,0 C0,33.9591837 112,24.8163265 112,64" />
                                                    <path d="M168.5,0 L168.5,90" data-mobile-d="M112,0 L112,64" />
                                                    <path d="M336,0 C336,47.755102 168,34.8979592 168,90"
                                                        data-mobile-d="M224,0 C224,33.9591837 112,24.8163265 112,64" />
                                                </g>
                                                <g class="home-assistants-bloom-svg__apps">
                                                    <path id="path-aqara"
                                                        d="M305,0 C305,46.6666667 362.833333,70 478.5,70"
                                                        data-mobile-d="M180,0 C180,35.6363636 237.742616,56 299,56" />
                                                    <path id="path-rituals" d="M305,0 C305,85.2197802 474,141 610,141"
                                                        data-mobile-d="M180,0 C180,106.728395 309.860724,133 360,133" />
                                                    <path id="path-tado"
                                                        d="M305,0 C305,60.5177994 349.333333,117.184466 438,170"
                                                        data-mobile-d="M180,0 C180,55 206.333333,110 259,165" />
                                                    <path id="path-samsung" d="M305,0 C305,134 394.5,250 523.5,250"
                                                        data-mobile-d="M180,0 C180,64.0378788 232.833333,143.037879 338.5,237" />
                                                    <path id="path-hue"
                                                        d="M305,0 C305,101.590062 326,195.590062 368,282"
                                                        data-mobile-d="M180,0 C180,64.0636943 196,158.063694 228,282" />
                                                    <path id="path-fibaro" d="M305,0 L305,135"
                                                        data-mobile-d="M180,0 L180,110" />
                                                    <path id="path-dyson"
                                                        d="M305,0 C305,101.590062 283.666667,195.590062 241,282"
                                                        data-mobile-d="M181,0 C181,64.0636943 165.333333,158.063694 134,282" />
                                                    <path id="path-netatmo" d="M305,0 C305,134 215,250 86,250"
                                                        data-mobile-d="M180,0 C180,64.0378788 127,143.037879 21,237" />
                                                    <path id="path-ikea"
                                                        d="M305,0 C305,60.5177994 261.666667,117.184466 175,170"
                                                        data-mobile-d="M180.25,0 C180.25,55 153.916667,110 101.25,165" />
                                                    <path id="path-innr" d="M305,0 C305,85.2197802 135,141 0,141"
                                                        data-mobile-d="M180,0 C180,96.7272727 49.8614958,133 0,133" />
                                                    <path id="path-honeywell"
                                                        d="M305,0 C305,46.6666667 246.666667,70 130,70"
                                                        data-mobile-d="M180,0 C180,35.6363636 122,56 61,56" />
                                                </g>
                                            </g>
                                            <g class="home-assistants-bloom-svg__lines-active" stroke-width="3"
                                                fill="none">
                                                <g
                                                    class="home-assistants-bloom-svg__assistants home-assistants-bloom-svg__group-1">
                                                    <path data-line="siri" d="M0,0 C0,47.755102 168,34.8979592 168,90"
                                                        data-mobile-d="M0,0 C0,33.9591837 112,24.8163265 112,64" />
                                                    <path data-line="alexa" d="M168.5,0 L168.5,90"
                                                        data-mobile-d="M112,0 L112,64" />
                                                    <path data-line="google"
                                                        d="M336,0 C336,47.755102 168,34.8979592 168,90"
                                                        data-mobile-d="M224,0 C224,33.9591837 112,24.8163265 112,64" />
                                                </g>
                                                <g class="home-assistants-bloom-svg__apps">
                                                    <path data-line="1" id="blue-path-aqara"
                                                        d="M305,0 C305,46.6666667 362.833333,70 478.5,70"
                                                        data-mobile-d="M180,0 C180,35.6363636 237.742616,56 299,56" />
                                                    <path data-line="2" id="blue-path-rituals"
                                                        d="M305,0 C305,85.2197802 474,141 610,141"
                                                        data-mobile-d="M180,0 C180,106.728395 309.860724,133 360,133" />
                                                    <path data-line="3" id="blue-path-tado"
                                                        d="M305,0 C305,60.5177994 349.333333,117.184466 438,170"
                                                        data-mobile-d="M180,0 C180,55 206.333333,110 259,165" />
                                                    <path data-line="4" id="blue-path-samsung"
                                                        d="M305,0 C305,134 394.5,250 523.5,250"
                                                        data-mobile-d="M180,0 C180,64.0378788 232.833333,143.037879 338.5,237" />
                                                    <path data-line="5" id="blue-path-hue"
                                                        d="M305,0 C305,101.590062 326,195.590062 368,282"
                                                        data-mobile-d="M180,0 C180,64.0636943 196,158.063694 228,282" />
                                                    <path data-line="6" id="blue-path-fibaro" d="M305,0 L305,135"
                                                        data-mobile-d="M180,0 L180,110" />
                                                    <path data-line="7" id="blue-path-dyson"
                                                        d="M305,0 C305,101.590062 283.666667,195.590062 241,282"
                                                        data-mobile-d="M181,0 C181,64.0636943 165.333333,158.063694 134,282" />
                                                    <path data-line="8" id="blue-path-netatmo"
                                                        d="M305,0 C305,134 215,250 86,250"
                                                        data-mobile-d="M180,0 C180,64.0378788 127,143.037879 21,237" />
                                                    <path data-line="9" id="blue-path-ikea"
                                                        d="M305,0 C305,60.5177994 261.666667,117.184466 175,170"
                                                        data-mobile-d="M180.25,0 C180.25,55 153.916667,110 101.25,165" />
                                                    <path data-line="10" id="blue-path-innr"
                                                        d="M305,0 C305,85.2197802 135,141 0,141"
                                                        data-mobile-d="M180,0 C180,96.7272727 49.8614958,133 0,133" />
                                                    <path data-line="11" id="blue-path-honeywell"
                                                        d="M305,0 C305,46.6666667 246.666667,70 130,70"
                                                        data-mobile-d="M180,0 C180,35.6363636 122,56 61,56" />
                                                </g>
                                            </g>
                                        </svg>
                                        <div class="home-assistants-bloom__balloon">
                                            <div data-home-assistants-balloon class="home-assistants-bloom-balloon">
                                                <picture>
                                                    <source
                                                        srcset="{{asset('assets/USER/img/pages/home/assistants/avatar.webp')}} 1x, {{asset('assets/USER/img/pages/home/assistants/avatar@2x.webp')}} 2x"
                                                        type="image/webp" media="(min-width: 0px)">
                                                    <source
                                                        srcset="{{asset('assets/USER/img/pages/home/assistants/avatar.png')}} 1x, {{asset('assets/USER/img/pages/home/assistants/avatar@2x.png')}} 2x"
                                                        type="image/png" media="(min-width: 0px)">
                                                    <img class="picture home-assistants-bloom-balloon__avatar"
                                                        src="{{asset('assets/USER/img/pages/home/assistants/avatar.png')}}" alt="" loading="lazy"
                                                        width="" height="" data-home-assistants-avatar>
                                                </picture>
                                                <picture>
                                                    <source
                                                        srcset="{{asset('assets/USER/img/pages/home/assistants/avatar-2.webp')}} 1x, {{asset('assets/USER/img/pages/home/assistants/avatar-2@2x.webp')}} 2x"
                                                        type="image/webp" media="(min-width: 0px)">
                                                    <source
                                                        srcset="{{asset('assets/USER/img/pages/home/assistants/avatar-2.png')}} 1x, {{asset('assets/USER/img/pages/home/assistants/avatar-2@2x.png')}} 2x"
                                                        type="image/png" media="(min-width: 0px)">
                                                    <img class="picture home-assistants-bloom-balloon__avatar"
                                                        src="{{asset('assets/USER/img/pages/home/assistants/avatar-2.png')}}" alt=""
                                                        loading="lazy" width="" height="" data-home-assistants-avatar>
                                                </picture>
                                                <picture>
                                                    <source
                                                        srcset="{{asset('assets/USER/img/pages/home/assistants/avatar-3.webp')}} 1x, {{asset('assets/USER/img/pages/home/assistants/avatar-3@2x.webp')}} 2x"
                                                        type="image/webp" media="(min-width: 0px)">
                                                    <source
                                                        srcset="{{asset('assets/USER/img/pages/home/assistants/avatar-3.png')}} 1x, {{asset('assets/USER/img/pages/home/assistants/avatar-3@2x.png')}} 2x"
                                                        type="image/png" media="(min-width: 0px)">
                                                    <img class="picture home-assistants-bloom-balloon__avatar"
                                                        src="{{asset('assets/USER/img/pages/home/assistants/avatar-3.png')}}" alt=""
                                                        loading="lazy" width="" height="" data-home-assistants-avatar>
                                                </picture>
                                                <div data-home-assistants-mic
                                                    class="home-assistants-bloom-balloon__content"> <strong
                                                        data-home-assistants-mic-provider></strong><span
                                                        data-home-assistants-mic-command></span> </div>
                                            </div>
                                        </div>
                                        <div class="home-assistants-bloom__assistants">
                                            <div data-home-assistant="google"
                                                class="home-assistants-bloom__assistant home-assistants-bloom__assistant--google">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/person1.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-home-assistant="alexa"
                                                class="home-assistants-bloom__assistant home-assistants-bloom__assistant--alexa">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/person2.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-home-assistant="siri"
                                                class="home-assistants-bloom__assistant home-assistants-bloom__assistant--siri">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/person3.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                        </div>
                                        <div data-home-assistant-logo class="home-assistants-bloom__logo">
                                            <picture> <img class="picture " src="{{asset('assets/images/sibuy.png')}}" alt=""
                                                    loading="lazy" width="80" height="80"> </picture>
                                        </div>
                                        <div class="home-assistants-bloom__apps">
                                            <div data-app="1" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/KFC.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="2" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Adidas.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="3" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Mcdonald.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="4" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Nike.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="5" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Ruban.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="6" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/KFC.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="7" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Adidas.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="8" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Mcdonald.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="9" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Nike.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="10" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/Ruban.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                            <div data-app="11" class="home-assistants-bloom__app">
                                                <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/KFC.png')}}" alt=""
                                                        loading="lazy" width="80" height="80"> </picture>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Integrations: Assistants -->
                        </div>
                    </section> --}}
                    <!-- End Platforms -->
                    <div style="margin-top:4px;"
                        class="home-get-started padding-bottom-3 padding-md-bottom-6 padding-top-3 padding-md-top-2  margin-lg-top-9 overflow-x-hidden">
                        <div class="edge">
                            <div class="row position-relative">
                                <div class="col-md-6 col-lg-6 ">
                                    <h2 class="text-preset-hero-2 text-align-center text-align-md-left">Get Listed
                                        Yourself<br>as a Merchant</h2>
                                    <p class="text-preset-body-large text-align-center text-align-md-left">Switch to the
                                        app! Search, purchase, and redeem Voucher Deal directly from your mobile device.</p>
                                    <p class="d-md-none"><a
                                            class="gradient-button-blue-large-full text-align-center homebtn"
                                            href="{{url('/register/merchant')}}">Work with Us</a></p>
                                    <p class="d-none d-md-block"><a class="gradient-button-blue-large homebtn"
                                            href="{{url('/register/merchant')}}">Work with Us</a></p>
                                </div>
                                <div class="col-md-6 col-lg-6 ">
                                    <picture> <img class="picture " src="{{asset('assets/USER/img/pages/home/laptop.png')}}" alt=""
                                            loading="lazy" width="" height=""> </picture>
                                </div>
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
                                <div class="col-*"> <img src="{{asset('assets/USER/img/heading/logo-alternate.png')}}" class="logo" alt=""
                                        width="34" height="34" loading="lazy"> </div>
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
                                            target="_blank"><img alt="Facebook" src="{{asset('assets/USER/img/icons/facebook.svg')}}"
                                                width="24px" height="24px" /></a> <a href="#" target="_blank"><img
                                                alt="Instagram" src="{{asset('assets/USER/img/icons/instagram.svg')}}" width="24px"
                                                height="24px" /></a> <a href="#" target="_blank"><img alt="Youtube"
                                                src="{{asset('assets/USER/img/icons/youtube.svg')}}" width="24px" height="17px" /></a> <a
                                            href="#" target="_blank"><img alt="Twitter" src="{{asset('assets/USER/img/icons/twitter.svg')}}"
                                                width="24px" height="20px" /></a> </span> </span>
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



</body>

</html>