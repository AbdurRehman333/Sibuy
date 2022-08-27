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



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js">
    </script>

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
            src: url("fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff2"), url("/fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff");
        }
    </style>
    <!--PreLoad page specific JS -->
    <link rel="preload" as="script" href="{{asset('assets/USER/js/main.js')}}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $( function() {
          $( "#datepicker" ).datepicker({
            // dateFormat: 'mm:dd:yyyy',
            changeYear:true,
            yearRange: "1960:2020"
          });  
        } );
    </script>
     <script src="{{asset('js/app.js')}}"></script>


     <script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"
     integrity="sha512-4bp4fE4hv0i/1jLM7d+gXDaCAhnXXfGBKdHrBcpGBgnz7OlFMjUgVH4kwB85YdumZrZyryaTLnqGKlbmBatCpQ=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script>
        // Note: This example requires that you consent to location sharing when
        // prompted by your browser. If you see the error "The Geolocation service
        // failed.", it means you probably did not give permission for the browser to
        // locate you.
        let map, infoWindow;
    
        function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 6,
        });
        infoWindow = new google.maps.InfoWindow();
    
        // const locationButton = document.createElement("button");
        const locationButton = document.getElementById("btn");
    
    
    
    
        // locationButton.textContent = "Pan to Current Location";
        locationButton.textContent = "Fetch Location";
        locationButton.classList.add("custom-map-control-button");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            // console.log('clicked');
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                
                (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
    
                // alert(position);
                // console.log(position);
                // console.log(position);
                // console.log(position.coords.latitude);
                // console.log(position.coords.longitude);
                // alert(position);
                // alert(position.coords.latitude);
                // alert(position.coords.longitude);
    
                // document.getElementById('pos').value = position
                document.getElementById('lat').value = position.coords.latitude
                document.getElementById('long').value = position.coords.longitude
                // document.getElementById('pos').innerHTML = position
                // document.getElementById('lat').innerHTML = position.coords.latitude
                // document.getElementById('lng').innerHTML = position.coords.longitude
    
                // var locAPI = "http://maps.googleapis.com/maps/geocode/json?latlng="+position.coords.latitude+","+
                // position.coords.longitude+"$sensor=true";
    
                // // THIS IS WORKING BUT COORDINATES ARE NOT COORECT
                var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+
                position.coords.longitude+"&key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0";
                console.log(locAPI);
    
                //Testing mobile loc
                // var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+31.4532618+","+
                // 74.3457784+"&key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0";
                // console.log(locAPI);
    
                //RANDOM
                // var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+34.4532618+","+
                // 72.3457784+"&key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0";
                // console.log(locAPI);
    
                // var country;
                // var city;
                // var address;
    
    
                $.get({
                    url: locAPI,
                    success: function(data)
                    {
                        // console.log(data.results[0].formatted_address);
                        address = data.results[0].formatted_address;
                        document.getElementById('addressProfile').value = address;
    
                        data.results[0].address_components.forEach(function(element){
                            // console.log(element.types);
                            if(element.types[0] == 'locality' && element.types[1] == 'political')
                            {
                                // console.log('City:')
                                // console.log(element.long_name);
                                cityProfile = element.long_name;
                                document.getElementById('cityProfile').value = cityProfile
                
                                // country
                                // city
                            }
                            if(element.types[0] == 'country' && element.types[1] == 'political')
                            {
                                // console.log('Country:')
                                // console.log(element.long_name);
                                countryProfile = element.long_name;
                                document.getElementById('countryProfile').value = countryProfile
                            }
                        });
                    }
                })
    
                // console.log(country);
                // console.log(city);
                // console.log(address);
    
    
                infoWindow.setPosition(pos);
                infoWindow.setContent("Location found.");
                infoWindow.open(map);
                map.setCenter(pos);
                },
                () => {
                handleLocationError(true, infoWindow, map.getCenter());
                }
            );
            } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
            }
        });
        }
    
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
        }
    
        window.initMap = initMap;
    
    </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.min.css" integrity="sha512-HPSfJxnyVYJb4v9afT3fXvs0mXvdg/C7eYxBl1EYS7uQHuCU/0lSGhaH9o23Tw8FofBiGQfFWzMYD9TqK8tv/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<style>
    .body {
        background: : #f5f5f5 !important;
    }

    .website {
        background: : #f5f5f5 !important;
    }

    // Active state, and its :hover to override normal :hover
    .nav-tabs .active {
        background: : #f5f5f5 !important;
    }


    .nav-tabs>li.active {
        background: : #f5f5f5 !important;
    }

    /* .nav-tabs>li.active>.nav-link {
        background-color: : red !important;
    } */

    .nav-tabs>li.active,
    .nav-tabs>li.active,
    .nav-tabs>li.active {
        color: #555;
        cursor: default;
        background-color: #F5F5F5 !important;
        /* background-color: red !important; */
        border-bottom: 2px solid #39AEFF;
        /* border-bottom-color: blue; */

    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #F5F5F5 !important;
        /* background-color: red !important; */
        border: 1px solid #ddd;
        /* border-bottom-color: blue; */

    }

    // Active state, and its :hover to override normal :hover
    .active {
        background: #8f1919 !important;
    }

    li .active {
        color: #000;
        background: red !important !important;
    }
</style>
<script>
    $(document).ready(function(){
        $(".nav-link").click(function(){

            $("#home1").addClass("fade");
            // alert("The paragraph was clicked.");

        });
        });
</script>


<script>
    $(document).ready(function(){
      $(".nav-menu__item").click(function(){
        // alert("The paragraph was clicked.");
        location.href = "categories";
      });
    });
</script>


<body class="body" style="padding: 0em;">

    <div class="website">

        @include('user.layouts.header')


        <main class="main" style="background: #f5f5f5 !important;">
            <div class="home" style="margin-top: 15vh !important; min-height:1100px; background: #f5f5f5 !important;">


                <style>
                    @media only screen and (max-width: 714px) {
                        .tabs_nav {
                            margin-left: 10vh !important;
                        }
                    }

                    @media only screen and (max-width: 480px) {
                        .tabs_nav {
                            margin-left: 4vh !important;
                        }
                    }
                </style>



                <div class="col-xl-12">
                    <div class="card" style="    margin-top: 7%;">
                        <div class="card-header">
                            <h4 class="card-title" style="
                                text-align: center;
                            font-size: 5vh; margin-bottom:10px;
                            ">My GiGi</h4>
                        </div>


                        @if (session('alert'))
                        <div style="    text-align: -webkit-center;">
                            <div class="alert alert-danger" style="width:60%">
                                <strong>Message: </strong> {{ session('alert') }}
                            </div>
                        </div>
                        @endif

                        {{-- @if (session('success'))
                        <div style="    text-align: -webkit-center;">
                            <div class="alert alert-success" style="width:60%">
                                <strong>Message: </strong> {{ session('success') }}
                            </div>
                        </div>
                        @endif --}}

                        
                        

                        <div class="card-body">

                            <!-- Nav tabs -->
                            <div class="custom-tab-1">
                                {{-- <ul class="nav nav-tabs tabs_nav"
                                    style="margin-left: 17vh; display: inline-flex;border:1px solid #0297FF;">
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" id="my_qrs" href="#home1"> My QRs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" id="profile_settings" href="#profile1"> My
                                            Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" id="preferences" href="#preferences1"> My
                                            Preferences</a>
                                    </li>
                                </ul> --}}
                                <ul class="nav nav-tabs tabs_nav" style="margin-left: 17vh; display: inline-flex;">
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" id="my_qrs" href="#home1"> My QRs</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" id="profile_settings" href="#profile1"> My
                                            Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" id="preferences" href="#preferences1"> My
                                            Preferences</a>
                                    </li>
                                </ul>

                                <style>
                                    .importantRule {
                                        display: none !important;
                                        visibility: hidden !important;
                                    }
                                </style>
                                <script>
                                    $(document).ready(function(){
                                        $("#my_qrs").click(function(){
                                            console.log('my_qrs');
                                            $("#profile1").css("display", "none !important");
                                            $("#preferences1").css("display", "none !important");
                                            //Makeing Own Classes Visible
                                            $('.my_qrs_div').removeClass('importantRule');
                                            $('#datatable_div').removeClass('importantRule');
                                            $('.table-responsive').removeClass('importantRule');
                                            $('.inner_div_in_my_qrs').removeClass('importantRule');
                                            //my_profile_removed
                                            $('#profile1').addClass('importantRule');
                                            //pref class removed
                                            $('#preferences1').addClass('importantRule');
                                        });
                                        $("#profile_settings").click(function(){
                                            console.log('profile_settings');
                                            //visible own
                                            $('#profile1').removeClass('importantRule');
                                            //others
                                            $("#my_qrs_div").attr("display", "none !important");
                                            $("#datatable_div").attr("display", "none !important");
                                            //MY_QRY CLASS REMOVED
                                            $('.my_qrs_div').addClass('importantRule');
                                            $('#datatable_div').addClass('importantRule');
                                            $('.table-responsive').addClass('importantRule');
                                            $('.inner_div_in_my_qrs').addClass('importantRule');
                                            //pref class removed
                                            $('#preferences1').addClass('importantRule');
                                        });
                                        $("#preferences").click(function(){
                                            console.log('preferences');
                                            //Visible Own Class
                                            $('#preferences1').removeClass('importantRule');
                                            //MY_QRY CLASS REMOVED
                                            $('.my_qrs_div').addClass('importantRule');
                                            $('#datatable_div').addClass('importantRule');
                                            $('.table-responsive').addClass('importantRule');
                                            $('.inner_div_in_my_qrs').addClass('importantRule');
                                            //my_profile_removed
                                            $('#profile1').addClass('importantRule');
                                            
                                        });

                                    });
                                </script>






                                <div class="tab-content">
                                    <div class="tab-pane  show active" id="home1" role="tabpanel" style="">
                                        <div class="pt-4">


                                            <style>
                                                .nav-link {
                                                    border: none !important;
                                                    .
                                                }

                                                @media only screen and (max-width: 1220px) {
                                                    .datatable_div {
                                                        display: contents;
                                                    }

                                                    .inner_div_in_my_qrs {
                                                        width: 100vw;
                                                        margin-bottom: 22px;
                                                    }
                                                }

                                                @media screen and (min-width: 770px) and (max-width:1226px) {

                                                    .data_table_card {

                                                        margin-left: 15vh;

                                                    }
                                                }

                                                @media screen and (max-width:410px) {
                                                    .tabs_nav {
                                                        margin-left: 0vh !important;
                                                        font: bold;
                                                        color: red !important;
                                                    }
                                                }

                                                .body {
                                                    background: #F5F5F5 !important;
                                                }



                                                @media screen and (min-width:1040px) {
                                                    .inner_div_in_my_qrs {
                                                        margin-top: 8vh;
                                                    }
                                                }
                                            </style>


                                            <script>
                                                $(document).ready( function () {
                                                $('#example2').DataTable();
                                            } );
                                            </script>



                                            <div class="container-fluid">


                                                <div class="row" style="margin-top:5vh;margin-bottom:5vh;">




                                                    {{-- <div class="col-2 my_qrs_div">

                                                        <div class="inner_div_in_my_qrs"
                                                            style="    text-align-last: center;">

                                                            <a href="">
                                                                <p>All (33)</p>
                                                            </a>
                                                            <a href="">
                                                                <p>Available (10)</p>
                                                            </a>
                                                            <a href="">
                                                                <p>Expired (3)</p>
                                                            </a>
                                                            <a href="">
                                                                <p>Redeemed (20)</p>
                                                            </a>


                                                        </div>



                                                    </div> --}}


                                                    <div class="col-12 datatable_div">

                                                        <div class="card data_table_card">

                                                            <style>
                                                                @media only screen and (max-width: 712px) {
                                                                    .table_main {
                                                                        width: 600px !important;
                                                                    }
                                                                }

                                                                @media only screen and (max-width: 550px) {
                                                                    .table_main {
                                                                        width: 480px !important;
                                                                    }
                                                                }

                                                                @media only screen and (max-width: 460px) {
                                                                    .table_main {
                                                                        width: 350px !important;
                                                                    }
                                                                }

                                                                @media only screen and (max-width: 320px) {
                                                                    .table_main {
                                                                        width: 250px !important;
                                                                    }
                                                                }
                                                            </style>


                                                            <div class="card-body">
                                                                <div class="table-responsive table_main" style=";
                                                                border-radius: 43px;
                                                                padding: 30px;
                                                                font-size: 17px;">
                                                                    <table id="example2" class="display" style="">
                                                                        {{-- <thead style="background:#d9d5d5"> --}}
                                                                            <thead style="background:#c5d9e7">
                                                                                <tr>
                                                                                    <th>#</th>
                                                                                    <th>Merchant</th>
                                                                                    <th> Deal </th>
                                                                                    <th>Price</th>
                                                                                    <th>Discount</th>
                                                                                    <th>Additional Discount</th>
                                                                                    <th>Additional Discount Expiry</th>
                                                                                    <th>Date of Purchased</th>
                                                                                    {{-- <th>Actual Price</th>
                                                                                    <th>After Discount</th> --}}
                                                                                    <th>Status</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                            </thead>
                                                                        <tbody>

                                                                            @foreach($purchasedDeals as $key => $deal)
                                                                            <tr id="{{$key}}_Row_ID">
                                                                                <input type="hidden" id="{{$key}}_ID" value="{{$deal['purchase_id']}}">
                                                                                <input type="hidden" id="{{$key}}_name" value="{{$deal['name']}}">
                                                                                <input type="hidden" id="{{$key}}_merchant_name" value="{{$deal['merchant_name']}}">
                                                                                <input type="hidden" id="{{$key}}_price" value="{{$deal['price']}}">
                                                                                <input type="hidden" id="{{$key}}_discount_on_price" value="{{$deal['discount_on_price']}}">

                                                                                <td>{{$key+1}}</td>
                                                                                <td>{{$deal['merchant_name']}}</td>
                                                                                <td>{{$deal['name']}}</td>

                                                                                <td>{{$deal['price']}}AZN </td>
                                                                                <td>{{$deal['discount_on_price']}}% Off Deal</td>


                                                                                @php
                                                                                    $now = Carbon\Carbon::now();
                                                                                    $expiry = $deal['additional_discount_date'];
                                                                                    $result = $now->lt($expiry);
                                                                                @endphp

                                                                                @if($deal['additional_discount'] <= 0 || !$result)
                                                                                <td> N/A </td>
                                                                                <td> N/A</td>

                                                                                <input type="hidden" id="{{$key}}_Ad_Discount" value="N/A">
                                                                                <input type="hidden" id="{{$key}}_Ad_Discount_Date" value="N/A">
                                                                                @else
                                                                                <td>{{$deal['additional_discount']}}% Off Deal</td>
                                                                                <td id="ad_dis_date">{{Carbon\Carbon::parse($deal['additional_discount_date'])->format('Y-m-d')}}</td>
                                                                                
                                                                                <input type="hidden" id="{{$key}}_Ad_Discount" value="{{$deal['additional_discount']}}%">
                                                                                <input type="hidden" id="{{$key}}_Ad_Discount_Date" value="{{Carbon\Carbon::parse($deal['additional_discount_date'])->format('Y-m-d')}}">
                                                                                <script>
                                                                                    element = document.getElementById('ad_dis_date').innerHTML;
                                                                                    console.log(element);
                                                                                </script>
                                                                                @endif

                                                                                <td>{{
                                                                                    Carbon\Carbon::parse($deal['created_at'])->format('Y-m-d')
                                                                                    }}</td>
                                                                                <td>{{$deal['availability_status']}}</td>
                                                                                {{-- <td>Available</td> --}}
                                                                                <td><a href="#"
                                                                                        class="btn btn-primary view_qr"
                                                                                        data-toggle="modal"
                                                                                        data-id="{{$key}}"
                                                                                        data-target="#exampleModal">View</a>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach

                                                                        </tbody>

                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>



                                            {{-- <input type="text" id="pick_me" value="{{$variable}}"> --}}

                                            <script>
                                                $(".view_qr").click(function(){
                                                loaded_convo_id = $(this).attr("data-id");
                                                // console.log('hi');
                                                // console.log(loaded_convo_id);


                                                pick = document.getElementById(`${loaded_convo_id}_ID`);
                                                // console.log(pick);
                                                console.log(parseInt(pick.value));

                                                // {{$var = 10;}}
                                                $.ajax({
                                                    data: {
                                                        "_token": "{{ csrf_token() }}",
                                                        "ID" : parseInt(pick.value)
                                                        },
                                                    url: "{{ route('loadBranchesBeforeQR') }}",
                                                    type: "POST",
                                                    dataType: 'json',
                                                    success: function (data) {

                                                        console.log(data);
                                                        console.log(data.branches);


                                                        html = `
                                                            <h2> Select Deal Branch </h2>
                                                            <div>
                                                                <select style="border: 2px solid gray; padding: 9px;" class="DealBranchSelection" name="DealBranchSelection" id="DealBranchSelection" data-id="${data.id}"> `;
                                                        data.branches.forEach(function(branch) {
                                                            // console.log(branch.name);
                                                            html += `  <option value="${branch.id}">${branch.name}</option>`;
                                                        });
                                                        html += `        </select>    

                                                        <br><br>
                                                            <button type="button" id="branchSelectionButton" class="btn btn-info"> Proceed </button>

                                                            </div>
                                                        `;

                                                        $(".modal_body_qr").empty();
                                                        $(".modal_body_qr").html(html);


                                                        // $('#open_window_info').html(data);
                                                        // is_any_chat_opened = 1;
                                                        // const myTimeout = setTimeout(myGreeting(data), 1000);
                                                        // name = document.getElementById(`DealId`).value;
                                                        // merchant_name = document.getElementById(`${loaded_convo_id}_merchant_name`).value;
                                                        // price = document.getElementById(`${loaded_convo_id}_price`).value;
                                                        // discount_on_price = document.getElementById(`${loaded_convo_id}_discount_on_price`).value;
                                                        // Ad_Discount = document.getElementById(`${loaded_convo_id}_Ad_Discount`).value;
                                                        // Ad_Discount_Date = document.getElementById(`${loaded_convo_id}_Ad_Discount_Date`).value;
                                                        
                                                        // const collection = new Array(name, merchant_name, price,discount_on_price,Ad_Discount,Ad_Discount_Date);
                                             
                                                        // const TimeToShow = setTimeout(showDataOnModal(collection), 1000);

                                                    },
                                                    error: function (data) {
                                                        console.log('Error:', data);
                                                    }
                                                    });
                                                });



                                                // // $.ajax({
                                                // //     data: {
                                                // //         "_token": "{{ csrf_token() }}",
                                                // //         "variable_qr": loaded_convo_id,
                                                // //         "ID" : parseInt(pick.value)
                                                // //         },
                                                // //     url: "{{ route('load_qr') }}",
                                                // //     type: "POST",
                                                // //     dataType: 'html',
                                                // //     success: function (data) {

                                                // //         // console.log(data);

                                                // //         // $('#open_window_info').html(data);
                                                // //         // is_any_chat_opened = 1;

                                                // //         const myTimeout = setTimeout(myGreeting(data), 1000);
                                                // //         name = document.getElementById(`${loaded_convo_id}_name`).value;
                                                // //         merchant_name = document.getElementById(`${loaded_convo_id}_merchant_name`).value;
                                                // //         price = document.getElementById(`${loaded_convo_id}_price`).value;
                                                // //         discount_on_price = document.getElementById(`${loaded_convo_id}_discount_on_price`).value;
                                                // //         Ad_Discount = document.getElementById(`${loaded_convo_id}_Ad_Discount`).value;
                                                // //         Ad_Discount_Date = document.getElementById(`${loaded_convo_id}_Ad_Discount_Date`).value;
                                                        
                                                // //         const collection = new Array(name, merchant_name, price,discount_on_price,Ad_Discount,Ad_Discount_Date);
                                             
                                                // //         const TimeToShow = setTimeout(showDataOnModal(collection), 1000);

                                                // //     },
                                                // //     error: function (data) {
                                                // //         console.log('Error:', data);
                                                // //     }
                                                // //     });
                                                // // });

                                                // function myGreeting(data) {
                                                //     $(".modal_body_qr").html(data);
                                                // }
                                            </script>


                                            <script>
                                                // $(document.body).on('change',"#DealBranchSelection",function (e) {
                                                //     branchID = document.getElementById(`DealBranchSelection`).value;
                                                // });
                                                $(document.body).on('click',"#branchSelectionButton",function (e) {
                                                    branchID = document.getElementById(`DealBranchSelection`).value;
                                                    console.log(branchID);

                                                    $.ajax({
                                                        data: {
                                                            "_token": "{{ csrf_token() }}",
                                                            "variable_qr": loaded_convo_id,
                                                            "ID" : parseInt(pick.value),
                                                            "branchID" : parseInt(branchID)
                                                            },
                                                        url: "{{ route('load_qr') }}",
                                                        type: "POST",
                                                        dataType: 'html',
                                                        success: function (data) {

                                                            // console.log(data);

                                                            // $('#open_window_info').html(data);
                                                            // is_any_chat_opened = 1;

                                                            const myTimeout = setTimeout(myGreeting(data), 1000);
                                                            name = document.getElementById(`${loaded_convo_id}_name`).value;
                                                            merchant_name = document.getElementById(`${loaded_convo_id}_merchant_name`).value;
                                                            price = document.getElementById(`${loaded_convo_id}_price`).value;
                                                            discount_on_price = document.getElementById(`${loaded_convo_id}_discount_on_price`).value;
                                                            Ad_Discount = document.getElementById(`${loaded_convo_id}_Ad_Discount`).value;
                                                            Ad_Discount_Date = document.getElementById(`${loaded_convo_id}_Ad_Discount_Date`).value;
                                                            const collection = new Array(name, merchant_name, price,discount_on_price,Ad_Discount,Ad_Discount_Date);
                                                            const TimeToShow = setTimeout(showDataOnModal(collection), 1000);

                                                        },
                                                        error: function (data) {
                                                            console.log('Error:', data);
                                                        }
                                                    });
                                                });

                                                    function myGreeting(data) {
                                                        $(".modal_body_qr").empty();
                                                        $(".modal_body_qr").html(data);
                                                    }

                                             

                                            </script>




                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">QR Code:</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body modal_body_qr"
                                                            style="    text-align: center;">


                                                            <div class="card-body">
                                                                {{-- {!!
                                                                QrCode::size(300)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8')
                                                                !!} --}}

                                                                {{-- {!! QrCode::size(300)->generate($variable) !!} --}}

                                                            </div>

                                                            


                                                        </div>

                                                        <div id="InsideModal" class="insidemodal">
                                                                
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            {{-- <button type="button" class="btn btn-primary">Save
                                                                changes</button> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                function showDataOnModal(data)
                                                    {

                                                        $(document).ready(function(){
                                                        // $("button").click(function(){
                                                            // $("p").slideToggle();
                                                            console.log('readyDOc');
                                                            var contents = $('#InsideModal');
                                                            console.log(contents);
                                                            
                                                            InsideModalBox = document.getElementById(`InsideModal`);
                                                            console.log(InsideModalBox);

                                                            InsideModalBox.innerHTML = ` 
                                                            <div style="text-align:center;">
                                                                <h2> <b> Deal :  </b> ${data[0]} <h2>
                                                                <h2> <b> Merchant :  </b> ${data[1]} <h2>
                                                                <h2> <b> Price : </b> ${data[2]}AZN <h2>
                                                                <h2> <b> Discount : </b> ${data[3]}% <h2>
                                                                <h2 style="color:#c71f1f;"> <b> Additional Discount : </b> ${data[4]}<h2>
                                                                <h2 style="color:#c71f1f;"> <b> Addition Discount Expiry : </b> ${data[5]} <h2>
                                                            </div>
                                                            `;

                                                        // });
                                                        });

                                                        // console.log('Called');
                                                        // console.log(data);
    
                                                        // InsideModalBox = document.getElementById(`InsideModal`);
                                                        // console.log(InsideModalBox);
    
                                                        // console.log(document.getElementById('InsideModal'));
    
                                                        // InsideModalBox.innerHTML = ` <h2> ${data[0]} <h2> `;
    
    
                                                        
    
                                                        
    
                                                    }
                                            </script>


                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="profile1" style="    margin-top: -50px;">


                                        



                                        <script>
                                            $(document).ready(function(){
                                                $("#set_1").click(function(){
                                                    console.log('setting_1');
                                                    //Visible Own Class
                                                    $('#setting_1').removeClass('importantRule');
                                                    //Hiders Others
                                                    $('#setting_2').addClass('importantRule');
                                                    $('#setting_3').addClass('importantRule');                                                    
                                                });
                                                $("#set_2").click(function(){
                                                    console.log('setting_2');
                                                    //Visible Own Class
                                                    $('#setting_2').removeClass('importantRule');
                                                    //Hiders Others
                                                    $('#setting_1').addClass('importantRule');
                                                    $('#setting_3').addClass('importantRule');
                                                });
                                                $("#set_3").click(function(){
                                                    console.log('setting_3');
                                                    //Visible Own Class
                                                    $('#setting_3').removeClass('importantRule');
                                                    //Hiders Others
                                                    $('#setting_1').addClass('importantRule');
                                                    $('#setting_2').addClass('importantRule');
                                                });
        
                                            });
                                        </script>


                                        <ul class="nav nav-tabs nav nav-pills mb-3 tabs_nav"
                                            style="margin-left: 17vh; display: inline-flex;">
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" id="set_1" href="#setting_1"> My
                                                    Account</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" id="set_2" href="#setting_2"> My
                                                    Address</a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" id="set_3" href="#setting_3">
                                                    My Locations</a>
                                            </li>
                                        </ul>

                                        {{-- <div class="tab-pane fade" id="my_qrs22" style="">
                                            Hello
                                        </div> --}}



                                        <div class="pt-4 tab-pane fade" id="setting_1" style="margin-left: 17vh;">



                                            <div class="col-lg-4">

                                                <style>
                                                    .form-control {
                                                        padding: 22px;
                                                        font-size: 15px;
                                                    }

                                                    @media only screen and (max-width: 998px) {
                                                        #setting_1 {
                                                            margin-left: 0vh !important;
                                                        }

                                                        #setting_2 {
                                                            margin-left: 0vh !important;
                                                        }

                                                        #setting_3 {
                                                            margin-left: 0vh !important;
                                                        }
                                                    }
                                                </style>

                                                <form method="POST" action="{{url('myAccountSettingApplied')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3" style="border: 1px solid #ccc;;
                                                        border-radius: 16px;
                                                        background: white;
                                                        padding: 8px;margin-top: 12px;
                                                        text-align: center;">

                                                        <label for="inputTag1" style="margin-top: 9px;">
                                                            Upload Profile Image
                                                            <input id="inputTag1" name="profile_picture" type="file" />
                                                        </label>

                                                        <style>
                                                            #inputTag1 {
                                                                display: none;
                                                            }

                                                            label {
                                                                cursor: pointer;
                                                            }
                                                        </style>
                                                    </div>

                                                    <div class="mb-3" style="margin-top: 12px;">
                                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                                        <input style="text-align-last: center;" type="text"
                                                            class="form-control" id="name" name="name"
                                                            value="{{session()->get('Authenticated_user_data')['name']}}"
                                                            placeholder="John Doe">
                                                    </div>

                                                    {{-- <div class="mb-3" style="margin-top: 12px;">
                                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                                        <input type="text" class="form-control" id="email"
                                                            placeholder="Johndoe@gmail.com">
                                                    </div> --}}


                                                    <div class="mb-3" style="margin-top: 12px;">
                                                        <label for="exampleInputEmail1" class="form-label">Date of
                                                            Birth</label>
                                                        <input
                                                            value="{{session()->get('Authenticated_user_data')['date_of_birth']}}"
                                                            style="    text-align-last: center;" class="form-control"
                                                            required aria-describedby="emailHelp" name="date_of_birth"
                                                            placeholder="DOB: MM/DD/YYYY" type="text" id="datepicker">
                                                    </div>

                                                    <div class="mb-3" style="margin-top: 12px;">
                                                        <label for="exampleInputEmail1" class="form-label">Phone
                                                            Number</label>
                                                        <input style="text-align-last: center;" name="phone_no"
                                                            value="{{session()->get('Authenticated_user_data')['phone']}}"
                                                            type="text" class="form-control" id="phone"
                                                            placeholder="+92 035818487">
                                                    </div>

                                                    <div class="mb-3" style="margin-top: 12px;">
                                                        <label for="exampleInputEmail1" class="form-label">Gender
                                                            </label>


                                                        <select name="gender" class="" id="gender" style="width: 100%;
                                                        border: 1px solid #ccc;
                                                        padding: 11px;
                                                        border-radius: 3px;
                                                        text-align-last: center;">
                                                            @if(session()->get('Authenticated_user_data')['gender'] ==
                                                            'male')
                                                            <option value="male" selected>Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                            @elseif(session()->get('Authenticated_user_data')['gender']
                                                            == 'female')
                                                            <option value="male">Male</option>
                                                            <option value="female" selected>Female</option>
                                                            <option value="other">Other</option>
                                                            @elseif(session()->get('Authenticated_user_data')['gender']
                                                            == 'other')
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other" selected>Other</option>
                                                            @endif
                                                        </select>
                                                    </div>


                                                    <div
                                                            style="    text-align-last: center; margin-top:20px; margin-bottom: 39px;">
                                                            <button type="submit" class="btn btn-primary" style="background: #3C95F9;
                                                            padding: 15px;
                                                                font-size: 15px
                                                                ">Save Settings</button>
                                                        </div>

                                                </form>

                                                <form method="POST" action="{{url('changePasswordConfirm')}}">
                                                    @csrf
                                                    <div class="" style="margin-top: 12px;">
                                                        <h1> Change Password</h1>



                                                        <div class="mb-3" style="margin-top: 12px;">
                                                            <label for="exampleInputEmail1" class="form-label">Old
                                                                Password</label>
                                                            <input type="text" class="form-control" id="name" name="old_password"
                                                                placeholder="*******">
                                                        </div>

                                                        <div class="mb-3" style="margin-top: 12px;">
                                                            <label for="exampleInputEmail1" class="form-label">New
                                                                Password</label>
                                                            <input type="text" class="form-control" id="email" name="password"
                                                                placeholder="*******">
                                                        </div>

                                                        <div class="mb-3" style="margin-top: 12px;">
                                                            <label for="exampleInputEmail1" class="form-label">Confirm
                                                                Password
                                                            </label>
                                                            <input type="text" class="form-control" id="phone" name="password_confirmation"
                                                                placeholder="*******">
                                                        </div>



                                                        <div
                                                            style="    text-align-last: center; margin-top:20px; margin-bottom: 39px;">
                                                            <button type="submit" class="btn btn-primary" style="background: #3C95F9;
                                                            padding: 15px;
                                                                font-size: 15px
                                                                ">Save Password</button>
                                                        </div>




                                                    </div>

                                                </form>
                                            </div>


                                        </div>

                                        <div class="pt-4 tab-pane fade" id="setting_2" style="margin-left:17vh;">

                                        </div>


                                        <div class="pt-4 tab-pane fade " id="setting_3" style="margin-left:17vh;">
                                            <div class="col-lg-4">
                                                <div class="pt-4">

                                                    <div class=" pref_form"
                                                        style=" margin-top:17px;">
        
                                                        <style>
                                                            .form-control {
                                                                padding: 22px;
                                                                font-size: 15px;
                                                            }
        
                                                            @media only screen and (max-width: 998px) {
                                                                .pref_form {
                                                                    margin-left: 0vh !important;
                                                                }
        
                                                            }
                                                        </style>
                                                        <div>
                                                            <h1 style="    font-size: 24px;">Location</h1>
                                                        </div>
        
                                                        {{-- @php
                                                            $Usercities = (array) null;
                                                            foreach($Usercities['perference'] as $b)
                                                            {
                                                            $Usercities[] = $b['id'];
                                                            }
                                                        @endphp --}}

                                                        {{-- <div>
                                                            <table>
                                                                <thead>
                                                                    <th>City</th>
                                                                <th>Action</th>
                                                                </thead>
                                                            </table>

                                                            @foreach($Usercities as $key => $c)
                                                            @endforeach
                                                        </div> --}}
        
                                                        <form method="POST" action="{{url('SETCITIES')}}">
                                                            @csrf
                                                            <div class="mb-3" style="margin-top: 12px;">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">My Cities</label>
                                                                    <select class="js-example-basic-multiple form-control" style="width: 100%" name="cities[]" multiple="multiple">
        
                                                                        @foreach($cities['data'] as $key => $city)
      
                                                                            @if(in_array($city, $Usercities))

                                                                                {{-- @if($city == $primary_location['city'])
                                                                                <option style="color: red" value="{{$city}}" selected> {{$city}} </option>
                                                                                @else --}}
                                                                                <option value="{{$city}}" selected> {{$city}} </option>
                                                                                {{-- @endif --}}
                                                                            
                                                                            @else
                                                                                {{-- @if($city == $primary_location['city']) --}}
                                                                                <option value="{{$city}}"> {{$city}} </option>
                                                                                {{-- @endif --}}
                                                                            @endif
        
                                                                        @endforeach
         
                                                                        
                                                                      </select>
                                                            </div>
                                                            <div
                                                                style="    text-align-last: center; margin-top:20px; margin-bottom: 39px;">
                                                                <button type="submit" class="btn btn-primary" style="background: #3C95F9;
                                                                     padding: 15px;
                                                                         font-size: 15px
                                                                         ">Save
                                                                    Settings</button>
                                                            </div>
        
                                                            <script>
                                                                $(document).ready(function() {
                                                                $('.js-example-basic-multiple').select2();
                                                                });
                                                            </script>
                                                        </form>
        
                                                        <div>
                                                            <h1 style="    font-size: 24px;">Your Current Location</h1>
                                                        </div>

                                                        <form method="POST" action="{{url('UpdateCurrentLocation')}}">
                                                            @csrf

                                                            <div id="map">

                                                            </div>

                                                            <div class="form-group" style="text-align: center;">
                                                                <button id="btn" type="button"  class="btn btn-sm btn-info"> Fetch Location </button>
                                                                {{-- <p color="black">This Step is Required to Proceed.</p> --}}
                                                            </div>

                                                            

                                                            <div class="mb-3" style="margin-top: 12px;">
                                                                {{-- <label for="exampleInputEmail1"
                                                                    class="form-label">Update Current Location</label> --}}
                                                                    <input type="hidden" name="" class="form-control" id="addressProfile">
                                                            </div>
                                                            <div class="mb-3" style="margin-top: 12px;">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">City</label>
                                                                    <input type="text"  value="{{session()->get('Authenticated_user_data')['location']['city']}}" class="form-control" name="city" id="cityProfile">
                                                                    <input type="hidden" value="{{session()->get('Authenticated_user_data')['location']['lat']}}" name="lat" id="lat">
                                                                    <input type="hidden" value="{{session()->get('Authenticated_user_data')['location']['long']}}" name="long" id="long">
                                                            </div>
                                                            <div class="mb-3" style="margin-top: 12px;">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Country</label>
                                                                    <input type="text" class="form-control" value="{{session()->get('Authenticated_user_data')['location']['country']}}" name="country" id="countryProfile">
                                                            </div>
                                                           

                                                            <div
                                                                style="    text-align-last: center; margin-top:20px; margin-bottom: 39px;">
                                                                <button type="submit" class="btn btn-primary" style="background: #3C95F9;
                                                                     padding: 15px;
                                                                         font-size: 15px
                                                                         ">Update Location</button>
                                                            </div>
        
                                                            {{-- <script>
                                                                $(document).ready(function() {
                                                                $('.js-example-basic-multiple').select2();
                                                                });
                                                            </script> --}}
                                                        </form>

                                                    </div>
        
        
                                                </div>
                                                {{-- <h4>This is Privacy Center</h4>
                                                <p>Raw denim you probably haven't heard of them jean shorts Austin.
                                                    Nesciunt
                                                    tofu stumptown aliqua, retro synth master cleanse. Mustache cliche
                                                    tempor.
                                                </p>
                                                <p>Raw denim you probably haven't heard of them jean shorts Austin.
                                                    Nesciunt
                                                    tofu stumptown aliqua, retro synth master cleanse. Mustache cliche
                                                    tempor.
                                                </p> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="preferences1">
                                        <div class="pt-4">

                                            <div class="col-lg-4 pref_form"
                                                style="margin-left: 17vh; margin-top:-50px;">

                                                <style>
                                                    .form-control {
                                                        padding: 22px;
                                                        font-size: 15px;
                                                    }

                                                    @media only screen and (max-width: 998px) {
                                                        .pref_form {
                                                            margin-left: 0vh !important;
                                                        }

                                                    }
                                                </style>
                                                <div>
                                                    <h1 style="    font-size: 24px;">My Interests</h1>
                                                </div>

                                                @php
                                                    $user_prefs = (array) null;
                                                    foreach($profile['perference'] as $b)
                                                    {
                                                    // $user_prefs[] = $b['id'];
                                                    $user_prefs[] = $b['category_id'];
                                                    }
                                                @endphp


                                                <form method="POST" action="{{url('setPreferences')}}">
                                                    @csrf
                                                    <div class="mb-3" style="margin-top: 12px;">
                                                        <label for="exampleInputEmail1"
                                                            class="form-label">Pereferences</label>
                                                            <select class="js-example-basic-multiple form-control" style="width: 100%" name="preferences[]" multiple="multiple">

                                                                @foreach($categories as $key => $cat)
                                                                    {{-- <option value="{{$cat['id']}}">{{$cat['name']}}</option> --}}

                                                                    @if(in_array($cat['id'], $user_prefs))
                                                                    <option value="{{$cat['id']}}" selected> {{$cat['name']}} </option>
                                                                    @else
                                                                    <option value="{{$cat['id']}}"> {{$cat['name']}} </option>
                                                                    @endif

                                                                @endforeach
 
                                                                
                                                              </select>
                                                    </div>
                                                    <div
                                                        style="    text-align-last: center; margin-top:20px; margin-bottom: 39px;">
                                                        <button type="submit" class="btn btn-primary" style="background: #3C95F9;
                                                             padding: 15px;
                                                                 font-size: 15px
                                                                 ">Save
                                                            Settings</button>
                                                    </div>

                                                    <script>
                                                        $(document).ready(function() {
                                                        $('.js-example-basic-multiple').select2();
                                                        });
                                                    </script>
                                                </form>

                                            </div>


                                        </div>




                                    </div>

                                </div>

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
                            <div class="col-*"> <img src="{{asset('assets/USER/img/heading/logo-alternate.png')}}"
                                    class="logo" alt="" width="34" height="34" loading="lazy"> </div>
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
    <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0&callback=initMap">
</script>
    <script src="{{asset('assets/USER/js/main.js')}}"></script>
    <script>
        function goto_discount(inp) {
                window.location.href = "./discount.php?id=" + inp;
            }
    </script>

    
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
<script>
    swal("Success!","{!! Session::get('success') !!}","success");
</script>
@endif



</body>

</html>