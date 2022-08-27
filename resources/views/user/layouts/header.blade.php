

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

    .fa, .far, .fas {
    font-family: Font Awesome\ 5 Free !important;
    }

    /* .fa {
    font-family: FontAwesome !important;
    } */


</style>


{{-- {{ UserController::functionName(); }} --}}
{{-- @php echo App\Http\Controllers\UserController::functionName(1);  @endphp --}}

<header class="nav-wrap">
    <div class="edge">
        <div class="nav-inner">
            <nav data-nav class="nav">
                <div class="overlay"></div>
                <div class="nav-toggle"></div>
                <div class="nav-grow"></div>
                <a class="nav-logo" href="{{route('home')}}" title="Home">
                    <picture>
                        <img class="picture logo" src="{{asset('assets/USER/img/heading/logo2.svg')}}" alt=""
                            loading="eager" width="36" height="36">
                    </picture>
                </a>
                @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                    {{-- <div class="nav-search navSearch" style="width: 49%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;">  --}}

                    @if( session()->has('Authenticated_user_data') )
                    @php
                        // $country = session()->get('unAuthUserLocations')['country'];
                        $country = session()->get('Authenticated_user_data')['location']['city'];
                        $length = strlen($country);
                    @endphp

                    @if($length > 0 && $length <= 8 )
                        <div class="nav-search navSearch {{$length}}" style="width: 49%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                    @elseif($length > 8 && $length <= 10)
                        <div class="nav-search navSearch" style="width: 47%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                    @elseif($length > 10 && $length <= 12)
                        <div class="nav-search navSearch" style="width: 45%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                    @elseif($length > 12 && $length <= 16)
                        <div class="nav-search navSearch" style="width: 42%;border:1.5px solsid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                    @elseif($length > 16 && $length <= 20)
                        <div class="nav-search navSearch" style="width: 40%;border:1.5px solsid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                    @else
                        <div class="nav-search navSearch" style="width: 40%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                    @endif

                    @else
                        <div class="nav-search navSearch" style="width: 58%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                    @endif

                @else
                    @if( session()->has('unAuthUserLocations') )
                        @php
                            // $country = session()->get('unAuthUserLocations')['country'];
                            $country = session()->get('unAuthUserLocations')['city'];
                            $length = strlen($country);
                        @endphp

                        @if($length > 0 && $length <= 8 )
                            <div class="nav-search navSearch {{$length}}" style="width: 56%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                        @elseif($length > 8 && $length <= 10)
                            <div class="nav-search navSearch" style="width: 55%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                        @elseif($length > 10 && $length <= 12)
                            <div class="nav-search navSearch" style="width: 53%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                        @elseif($length > 12 && $length <= 16)
                            <div class="nav-search navSearch" style="width: 50%;border:1.5px solsid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                        @else
                            <div class="nav-search navSearch" style="width: 55%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                        @endif

                    @else
                        <div class="nav-search navSearch" style="width: 58%;border:1.5px solid grey;padding:8px;border-radius: 16px;margin-bottom:4.5px;"> 
                    @endif
                @endif
                    {{-- <span class="icon toggle"><img src="{{asset('assets/USER/img/icons/search.svg')}}" width="21"
                            height="21" alt="search" /></span>
                    <div class="overlay">
                        <div class="input-wrap">
                            <form action="{{url('userSearchText')}}" method="GET">
                                <input style="    margin-top: 18px; " autocomplete="off" name="query" type="search" value="" placeholder=""
                                data-placeholders="Search for the deals...;Search for the discounts...;Search for the brands..." />
                                <button type="submit" style="display:none;"></button>
                            </form>
                        </div>
                        <div class="results-wrap">
                            <div class="no-results">No search results were found.</div>
                            <div class="results"></div>
                        </div>
                    </div> --}}

                    <span class="icon toggle" style="    margin-left: 12px;">
                        <img id="search_tag" src="{{asset('assets/USER/img/icons/search.svg')}}" width="21" height="21" alt="search" />
                        <span style="margin-left: 20px;">Search Something On GiGi...</span>
                    </span>
                    <div class="overlay">
                        <div class="input-wrap">

                            @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                            <form action="{{url('userSearchText')}}" method="GET">
                                <input style="    margin-top: 5px; " autocomplete="off" name="query" type="search" value="" placeholder=""
                                data-placeholders="Search for the deals...;Search for the discounts...;Search for the brands..." />
                                <button type="submit" style="display:none;"></button>
                            </form>
                            @else
                            <form action="{{url('userSearchText')}}" method="GET">
                                <input style="    margin-top: 16px; " autocomplete="off" name="query" type="search" value="" placeholder=""
                                data-placeholders="Search for the deals...;Search for the discounts...;Search for the brands..." />
                                <button type="submit" style="display:none;"></button>
                            </form>
                            @endif


                        </div>
                    </div>
                    
                </div>

                <style>
                    @media only screen and (max-width: 767px) {
                       .navSearch{
                        border: none !important;
                       }
                       }
                </style>


                


                <div class="primary-menu">
                    <ul class="nav-menu">
                        <li class="nav-menu__item"> <a class="nav-menu__link hasDropdown browsediscounts" type="button"
                                data-title="Homey">Homey</a> </li>
                        <li class="nav-menu__item"> <a id="target_anchor_city" class="nav-menu__link hasDropdown locationmenu" type="button"
                                data-title="Discover">Discover</a> </li>
                        <li class="nav-menu__item"> <a class="nav-menu__link hasDropdown displaynone" type="button"
                                data-title="Support">Support</a> </li>

                    </ul>

                    <script>
                        
                        $(".locationmenu").click(function(event){
                            // alert('hi');
                            event.preventDefault();
                            event.preventDefault();

                        // alert("The paragraph was clicked.");
                        });
                    </script>


                    @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)

                        @if(session()->has('AuthenticatedUserSelectedCities'))
                        <input type="hidden" id="location_city" value="{{session()->get('AuthenticatedUserSelectedCities')}}">

                        @else
                        <input type="hidden" id="location_city" value="{{session()->get('Authenticated_user_data')['location']['city']}}">

                        @endif

                        {{-- <input type="hidden" id="location_city" value="{{session()->get('Authenticated_user_data')['location']['city']}}"> --}}

                        <script>
                            $(".locationmenu::after").css("background-color", "yellow");
                            element = document.getElementById('target_anchor_city');
                            // console.log(element);
        
                            const myElement = document.getElementById("target_anchor_city");
                            // myElement.style.color = "red";
                            // myElement.style.content = "red";

                            const city = document.getElementById("location_city").value;
                            // console.log(city);

                            myElement.classList.add("locationmenudmmmy");
                            str = city;
                            var style = document.createElement('style');
                            style.innerHTML = `
                            a.locationmenudmmmy:after {
                            content: "${str}" !important;
                            font-size: 16px;
                            padding: 7px 20px;
                            border: 1px solid #333;
                            border-radius: 10px;
                            }
                            `;
                            document.head.appendChild(style);
                            
                            myElement.classList.add("target");

                            // $('.locationmenu').attr('after','bar');


                            console.log(myElement);
        
                            // console.log($('#target_anchor_city').value);
                            // $('.locationmenu').hover(function(){
                            //     $(this).attr('data-content','bar');
                            //     $(this).attr('content','bar');
                            // });
                        </script>
                    @endif

                    
                    {{-- IF USER IS LOGGED IN, GET IS LOCATION AND SHOW HIM RESULTS ACCORDINGLY. --}}
                    @if( !session()->has('Authenticated_user_data') )

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"
                            integrity="sha512-4bp4fE4hv0i/1jLM7d+gXDaCAhnXXfGBKdHrBcpGBgnz7OlFMjUgVH4kwB85YdumZrZyryaTLnqGKlbmBatCpQ=="
                            crossorigin="anonymous" referrerpolicy="no-referrer">
                        </script>
                        <script>
                            let map, infoWindow;

                            function initMap() {
                            map = new google.maps.Map(document.getElementById("map"), {
                                center: { lat: -34.397, lng: 150.644 },
                                zoom: 6,
                            });}
                            infoWindow = new google.maps.InfoWindow();

                        </script>
                        

                        <div style="display:none">
                            <form action="{{url('UnAuthUserLocationFetched')}}" id="UnAuthAutoFetch" method="POST">
                                @csrf
                                <input id="form_lat" type="text" name="lat">
                                <input id="form_long" type="text" name="long">
                                <input id="form_city" type="text" name="city">
                                <input id="form_country" type="text" name="country">
                                <button type="submit">Submit</button>
                            </form>
                        </div>



                        @if( !session()->has('unAuthUserLocations') )
                            <script>
                                    // Try HTML5 geolocation.
                                    if (navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(
                                            (position) => {
                                            const pos = {
                                                lat: position.coords.latitude,
                                                lng: position.coords.longitude,
                                            };
                                            document.getElementById('form_lat').value = position.coords.latitude
                                            document.getElementById('form_long').value = position.coords.longitude
                                            var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+
                                            position.coords.longitude+"&key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0";
                                            $.get({
                                                url: locAPI,
                                                success: function(data)
                                                {
                                                    data.results[0].address_components.forEach(function(element){
                                                        if(element.types[0] == 'locality' && element.types[1] == 'political')
                                                        {
                                                            city = element.long_name;
                                                            document.getElementById('form_city').value = city
                                                            console.log(document.getElementById('form_city'));

                                                        }
                                                        if(element.types[0] == 'country' && element.types[1] == 'political')
                                                        {
                                                            country = element.long_name;
                                                            document.getElementById('form_country').value = country
                                                        }
                                                    });
                                                    document.getElementById("UnAuthAutoFetch").submit();
                                                }
                                            })
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
                                    alert('Allow Your Location For Your Location-Specific Result.');
                                    handleLocationError(false, infoWindow, map.getCenter());
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
                                console.log('upper');
                            </script>

                        @else

                            <input type="hidden" id="location_city" value="{{session()->get('unAuthUserLocations')['city']}}">
                            <input type="hidden" id="location_country" value="{{session()->get('unAuthUserLocations')['country']}}">

                            <script>
                                console.log('lower');
                                $(".locationmenu::after").css("background-color", "yellow");
                                element = document.getElementById('target_anchor_city');
                                // console.log(element);
            
                                const myElement = document.getElementById("target_anchor_city");
                                // myElement.style.color = "red";
                                // myElement.style.content = "red";

                                const city = document.getElementById("location_city").value;
                                const country = document.getElementById("location_country").value;
                                // console.log(city);

                               


                                myElement.classList.add("locationmenudmmmy");
                                // str = city;
                                // str = country;
                                str = city;

                                // str = `${city}, ${country}`;
                                var style = document.createElement('style');
                                style.innerHTML = `
                                a.locationmenudmmmy:after {
                                content: "${str}" !important;
                                font-size: 16px;
                                padding: 7px 20px;
                                border: 1px solid #333;
                                border-radius: 10px;
                                }
                                `;
                                document.head.appendChild(style);
                                
                                myElement.classList.add("target");
                                // console.log(myElement);
        
                            </script>

                        @endif


                        <script>
                            console.log('UNAUTHLOCATIONFETCH');
                        </script>
                    @elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)

                    <input type="hidden" id="location_city" value="{{session()->get('Authenticated_user_data')['location']['city']}}">
                    <input type="hidden" id="location_country" value="{{session()->get('Authenticated_user_data')['location']['country']}}">

                    <script>
                        console.log('lower');
                        $(".locationmenu::after").css("background-color", "yellow");
                        element = document.getElementById('target_anchor_city');
                        // console.log(element);
    
                        const myElementinAuth = document.getElementById("target_anchor_city");
                        // myElementinAuth.style.color = "red";
                        // myElementinAuth.style.content = "red";

                        const cityAuth = document.getElementById("location_city").value;
                        const countryAuth = document.getElementById("location_country").value;
                        // console.log(city);

                       


                        myElementinAuth.classList.add("locationmenudmmmy");
                        // str = city;
                        // str = country;
                        str = cityAuth;

                        // str = `${city}, ${country}`;
                        var style = document.createElement('style');
                        style.innerHTML = `
                        a.locationmenudmmmy:after {
                        content: "${str}" !important;
                        font-size: 16px;
                        padding: 7px 20px;
                        border: 1px solid #333;
                        border-radius: 10px;
                        }
                        `;
                        document.head.appendChild(style);
                        
                        myElementinAuth.classList.add("target");
                        console.log(myElementinAuth);

                    </script>


                    @endif

                        <div id="map"></div>


                    <style>
                        .vl {
                            border-left: 2px solid #F6F7FB;
                            height: 500px;
                        }

                        .category_name_class:hover {
                            background: #F6F7FB;
                        }

                        .navblock.has-visual {
                            /* min-width: 320px; */
                            max-width: 1000%;
                        }

                        .category_a:hover {
                            text-decoration: none;
                            color: #729FD9;
                        }

                        .category_a {
                            display: block;
                            font-size: 15px;
                            padding-left: 10px;
                            padding-top: 5px;
                        }

                        .category_shop_all:hover {
                            text-decoration: none;
                            color: black;
                        }

                        .category_shop_all {
                            margin-left: 2px;
                        }
                        
                    </style>



                    <style>
                        /* 1484 */

                        @media screen and (min-width: 700px) and (max-width: 1000px) {
                       

                        .navblocks{
                            width:750px !important;
                        }
                        .navblock{
                            width:750px !important;
                        }
                        .navblock__sub-menu{
                            width:750px !important;
                        }
                        .sub-menu__header{
                            width:750px !important;
                        }

                        .width_change_div{
                            width: 35% !important;
                        }
                        .to_hide_at_1000{
                            display:none !important;
                        }

                        }

                        @media screen and (min-width: 1001px) and (max-width: 1200px) {
          

                            .navblocks{
                                width:980px !important;
                            }
                            .navblock{
                                width:980px !important;
                            }
                            .navblock__sub-menu{
                                width:980px !important;
                            }
                            .sub-menu__header{
                                width:980px !important;
                            }


                            .to_hide_at_1000{
                                display:block !important;
                            }
                            

                            }

                        @media screen and (min-width: 1201px) and (max-width: 1300px) {
          

                        .navblocks{
                            width:1150px !important;
                        }
                        .navblock{
                            width:1150px !important;
                        }
                        .navblock__sub-menu{
                            width:1150px !important;
                        }
                        .sub-menu__header{
                            width:1150px !important;
                        }


                        .to_hide_at_1000{
                            display:block !important;
                        }

                        }

                        @media screen and (min-width: 1301px)  {
          

                        .navblocks{
                            width:1250px !important;
                        }
                        .navblock{
                            width:1250px !important;
                        }
                        .navblock__sub-menu{
                            width:1250px !important;
                        }
                        .sub-menu__header{
                            width:1250px !important;
                        }


                        .to_hide_at_1000{
                            display:block !important;
                        }

                        }


                    </style>

                    <style>
                        .width_change_div{
                            width: 35% !important;
                        }
                    </style>



                    {{-- <div class="dropdownRoot" style="">
                        <nav class="dropdownContainer" style="width:1200px">
                            <!-- PRODUCTS POPOVER -->
                            <section class="dropdownContent" data-dropdown="Homey" style="width:1200px">
                                <div class="navblocks" style="width:1200px">

                                    <div class="navblock has-visual" style="width:1200px">
                                        <div class="sub-menu navblock__sub-menu" style="width:1200px">



                                            <div class="sub-menu__header"
                                                style="width:1200px; display: flex;"> --}}
                    <div class="dropdownRoot" style="font-size:12px !important;">
                        <nav class="dropdownContainer" style="">
                            <!-- PRODUCTS POPOVER -->
                            <section class="dropdownContent" data-dropdown="Homey" style="">
                                <div class="navblocks" style="">

                                    <div class="navblock has-visual" style="">




                                        <div class="sub-menu navblock__sub-menu " style="">

                                            <div class="sub-menu__header" style="display: flex;">

                                                <div style="margin-right: 10px;width: 25%;">


                                                    @php
                                                    $i = 1;
                                                    @endphp
                                                    @foreach($categories as $key => $cat)
                                                        @if($cat['parent_id'] == 0)
                                                            {{-- <div onmouseover="mouseOver(this)" data-id="{{$key+1}}" class="category_name_class"
                                                                style="font-size: 15px;padding: 10px;">
                                                                <span style="margin-left: 0px;padding: 8px;">{{$cat['name']}}</span>
                                                                <i style="margin-top:4px;margin-right:10px;float: right;"
                                                                    class="fas fa-angle-right" aria-hidden="true"></i>
                                                            </div> --}}
                                                            <div onmouseover="mouseOver(this)" data-id="{{$i}}" class="category_name_class"
                                                                style="font-size: 15px;padding: 10px;">
                                                                <span style="margin-left: 0px;padding: 8px;">{{$cat['name']}}</span>
                                                                <i style="margin-top:4px;margin-right:10px;float: right;"
                                                                    class="fas fa-angle-right" aria-hidden="true"></i>
                                                            </div>
                                                            @php
                                                                $i++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    {{-- <div onmouseover="mouseOver(this)" data-id="9999" class="category_name_class"
                                                        style="font-size: 15px;padding: 10px;">
                                                        <span style="margin-left: 0px;padding: 8px;">Nothing</span>
                                                  
                                                        <i style="margin-top:4px;margin-right:10px;float: right;"
                                                                    class="fas fa-angle-right" aria-hidden="true"></i>
                                                    </div> --}}

                                                </div>

                                                <div class="vl"></div>

                                                <style>
                                                    
                                                    .sub_cat_div::-webkit-scrollbar {
                                                        width: 0.2em;
                                                        }
                                                        
                                                    .sub_cat_div::-webkit-scrollbar-track {
                                                        box-shadow: inset 0 0 2 px rgba(0, 0, 0, 0.3);
                                                        }
                                                        
                                                    .sub_cat_div::-webkit-scrollbar-thumb {
                                                        background-color: darkgrey;
                                                        outline: 1px solid slategrey;
                                                        }
                                                </style>

                                                <style>
                                                    .elezOnsElse{
                                                        margin-top: 44px;
                                                    }
                                                    .eee{
                                                        margin-top: 21px;
                                                    }
                                                </style>


                                                @foreach($categories as $key => $cat)
                                                    @php
                                                        $counter = 0;
                                                    @endphp
                                                    @if($cat['parent_id'] == 0)



                                                        @if($loop->first)
                                                        <div class="cat_screen_nav" style="width:100%;display:flex;display:none"> 

                                                            @php
                                                                $in = 0;
                                                                $all_shop_done = 0;
                                                                $entered_to_margin = 0;
                                                            @endphp

                                                            @foreach($categories as $key => $subCat)
                                                                
                                                                @if($counter < 3)
                                                                    @if($cat['id'] == $subCat['parent_id'])
                                                                    
                                                                    

                                                                    @if($entered_to_margin == 0)
                                                                    <div class="width_change_div thione" style="z-index: 10000">
                                                                    @else


                                                                    @if( session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1 )
                                                                    <div class="width_change_div Noion" style="z-index: 10000;margin-top:23px;">
                                                                    @else
                                                                    <div class="width_change_div Noion" style="z-index: 10000;">
                                                                    @endif

                                                                    @endif

                                                                    @php
                                                                        $entered_to_margin = 1;
                                                                    @endphp

                
                                                                        @if($all_shop_done == 0)
                                                                        <div style="margin-left:10px;">
                                                                            <h2 style="margin-top: 0;display:inline;">{{$cat['name']}}</h2>
                                                                            <span style="margin-left: 3px;color:#578DD2;"> <a
                                                                                    class="category_shop_all" href="{{url('DealsByCat/'.$cat['id'])}}">
                                                                                    <strong>All Shops</strong> </a></span>
                                                                        </div>
                                                                        @php
                                                                            $all_shop_done = 1;
                                                                        @endphp
                                                                        @else
                                                                        <div style="margin-left:10px;">
                                                                            <h2 style="margin-top: 0;display:inline;"></h2>
                                                                            <span style="margin-left: 3px;color:#578DD2;"><a
                                                                                    class="category_shop_all" href="#">
                                                                                    <strong></strong> </a></span>
                                                                        </div>
                                                                        @endif
                    
                                                                        <div class="" style="font-size: 15px;padding: 10px;">
                                                                            <span style="margin-left: 0px;margin-left:10px;"> <strong> <a href="{{url('DealsByCat/'.$subCat['id'])}}">{{$subCat['name']}}</a> </strong>
                                                                            </span>
                                                                        </div>
                                                                        
                                                                        <div class="sub_cat_div" style="max-height: 500px; overflow:auto; overflow-x:hidden">
                                                                            
                                                                            @foreach($categories as $key => $sub_subCat)
                                                                                @if($sub_subCat['parent_id'] == $subCat['id'])
                                                                                    
                                                                                <div style="margin-top:5px;     margin-left: 30px;" ><a style="display:inline; x" class="" href="{{url('DealsByCat/'.$sub_subCat['id'])}}">{{$sub_subCat['name']}}</a></div>
                                                                                
                                                                                @endif
                                                                            @endforeach
                                                                        </div>

                                                                    </div>

                                                                    @php
                                                                        $counter++;
                                                                    @endphp
                                                                    @endif

                                                                @else
                                                                    @if($in == 0)
                                                                    @if( session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1 )
                                                                        <div class="width_change_div elseoon" style="z-index: 10000;margin-top:23px;">
                                                                        @else
                                                                        <div class="width_change_div elseoon" style="z-index: 10000;">
                                                                        @endif
            
                                                                            <div style="margin-left:10px;">
                                                                                <h2 style="margin-top: 10px;display:inline;"></h2>
                                                                                <span style="margin-left: 3px;color:#578DD2;"> <a
                                                                                        class="category_shop_all" href="#">
                                                                                        <strong></strong> </a></span>
                                                                            </div>
                                                                            
                        
                                                                            <div style="margin-left:10px; margin-top:10px;font-size: 15px;">
                                                                                <strong> More </strong> 
                                                                            </div>

                                                                            <div class="sub_cat_div" style="    width: 87%;max-height: 500px; overflow:auto; overflow-x:hidden">
                                                                            @foreach($categories as $key => $sub_subCat)
                                                                                @if($sub_subCat['parent_id'] == $cat['id'])
                                                                                    
                                                                                {{-- <div style="margin-top:5px;" ><a style="display:inline; x" class="category_a" href="">{{$subCat['name']}}</a></div> --}}
                                                                                <div style="margin-top:5px; " ><a style="display:inline; x" class="" href="{{url('DealsByCat/'.$sub_subCat['id'])}}">{{$sub_subCat['name']}}</a></div>

                                                                                @endif
                                                                            @endforeach
                                                                            </div>

                                                                        </div>
                                                                        @php
                                                                        $in = 1;
                                                                        @endphp
                                                                    @endif

                                                                    @php
                                                                    $in = 1;
                                                                    @endphp

                                                                @endif
                                                            @endforeach
                                                            
                                                        </div>
                                                        @else
                                                        <div class="cat_screen_nav" style="width:100%;display:flex;display:none"> 

                                                            @php
                                                                $in = 0;
                                                                $all_shop_done = 0;
                                                                
                                                            @endphp
                                                            @foreach($categories as $key => $subCat)
                                                                
                                                                @if($counter < 3)
                                                                    @if($cat['id'] == $subCat['parent_id'])
                                                                        
                                                                    @if($counter==0)
                                                                    <div class="width_change_div elezOns {{$counter}}" style="z-index: 10000;">
                                                                    @else

                                                                    @if( session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1 )
                                                                    <div class="width_change_div elezOnsElse {{$counter}}" style="z-index: 10000;">
                                                                    @else
                                                                    <div class="width_change_div elezOnsElse {{$counter}}" style="z-index: 10000;margin-top: -4px;">
                                                                    @endif

                                                                    @endif
                                                                    
                
                                                                        

                                                                        @if($all_shop_done == 0)
                                                                        <div style="margin-left:10px;">
                                                                            <h2 style="margin-top: 0;display:inline;">{{$cat['name']}}</h2>
                                                                            <span style="margin-left: 3px;color:#578DD2;"> <a
                                                                                    class="category_shop_all" href="{{url('DealsByCat/'.$cat['id'])}}">
                                                                                    <strong>All Shops</strong> </a></span>
                                                                        </div>
                                                                        @php
                                                                            $all_shop_done = 1;
                                                                        @endphp

                                                                        @else
                                                                        <div style="margin-left:10px;">
                                                                            <h2 style="margin-top: 0;display:inline;"></h2>
                                                                            <span style="margin-left: 3px;color:#578DD2;"><a
                                                                                    class="category_shop_all" href="#">
                                                                                    <strong></strong> </a></span>
                                                                        </div>
                                                                        <div style="margin-left:10px;    margin-bottom: -21px;">
                                                                            <h2 style="margin-top: 0;display:inline;"></h2>
                                                                            <span style="margin-left: 3px;color:#578DD2;"><a
                                                                                    class="category_shop_all" href="#">
                                                                                    <strong></strong> </a></span>
                                                                        </div>

                                                                        @endif

                    
                                                                        <div class="" style="font-size: 15px;padding: 10px;">
                                                                            <span style="margin-left: 0px;margin-left:10px;"> <strong> <a href="{{url('DealsByCat/'.$subCat['id'])}}">{{$subCat['name']}}</a> </strong>
                                                                            </span>
                                                                        </div>
                                                                        
                                                                        <div class="sub_cat_div" style="max-height: 500px; overflow:auto; overflow-x:hidden">
                                                                            
                                                                            @foreach($categories as $key => $sub_subCat)
                                                                                @if($sub_subCat['parent_id'] == $subCat['id'])
                                                                                    
                                                                                <div style="margin-top:5px;     margin-left: 30px;" ><a style="display:inline; x" class="" href="{{url('DealsByCat/'.$sub_subCat['id'])}}">{{$sub_subCat['name']}}</a></div>
                                                                                
                                                                                @endif
                                                                            @endforeach
                                                                        </div>

                                                                    </div>

                                                                    @php
                                                                        $counter++;
                                                                    @endphp
                                                                    @endif

                                                                @else
                                                                    @if($in == 0)

                                                                    @if( session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1 )
                                                                        <div class="width_change_div eee" style="z-index: 10000;">
                                                                        @else
                                                                        <div class="width_change_div eee" style="z-index: 10000;margin-top:-4px;">
                                                                        @endif
                                                                        
            
                                                                            <div style="margin-left:10px;">
                                                                                <h2 style="margin-top: 10px;display:inline;"></h2>
                                                                                <span style="margin-left: 3px;color:#578DD2;"> <a
                                                                                        class="category_shop_all" href="#">
                                                                                        <strong></strong> </a></span>
                                                                            </div>
                                                                                                                                                     
                        
                                                                            <div style="margin-left:10px; margin-top:12px;font-size: 15px;">
                                                                                <strong> More </strong> 
                                                                            </div>
                        
                                                                            <div class="sub_cat_div" style="    width: 87%;max-height: 500px; overflow:auto; overflow-x:hidden">
                                                                                @foreach($categories as $key => $sub_subCat)
                                                                                    @if($sub_subCat['parent_id'] == $cat['id'])
                                                                                        
                                                                                    <div style="margin-top:5px; " ><a style="display:inline; x" class="" href="{{url('DealsByCat/'.$sub_subCat['id'])}}">{{$sub_subCat['name']}}</a></div>
                                         
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>

                                                                        </div>
                                                                        @php
                                                                        $in = 1;
                                                                        @endphp
                                                                    @endif

                                                                    @php
                                                                    $in = 1;
                                                                    @endphp

                                                                @endif
                                                            @endforeach
                                                            
                                                        </div>
                                                        @endif

                                                    @endif
                                                @endforeach

                                            </div>

                                            <script>

                                                function mouseOver(arg)
                                                {
                                                    // console.log(arg.attr('data-id'));
                                                    var This_id = arg.getAttribute('data-id');
                                                    var variable = This_id - 1;
                                                    console.log(This_id);

                                                    // console.log($(this));
                                                    $( ".cat_screen_nav" ).css( "display", "none" );


                                                    $( ".cat_screen_nav" ).eq( variable ).css( "display", "flex" );


                                                }

                                                // $(".category_name_class").hover(function(){

                                                //     // console.log(this.getAttribute('data-id'););
                                                //     // console.log($(this));

                                                //     // var data = $(this).attr("data-id");

                                                // });
                                            </script>










                                            {{-- <div class="sub-menu__list">
                                                <div class="sub-menu__item">
                                                    <a class="sub-menu-button " href="{{route('categories')}}"
                                                        target="">
                                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                                class="sub-menu-button__icon icon-eye "></span>
                                                        </span>
                                                        <div class="sub-menu-button__text">
                                                            <span class="sub-menu-button__title "> Discover GiGi
                                                            </span>
                                                            <div class="sub-menu-button__subtitle"> Browse All Discounts
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div> --}}

                                        </div>








                                    </div>
                                </div>
                            </section>

                            <style>
                                .not_to_change{
                                    width:280px;
                                }
                            </style>

                            <style>
                                .my_class_fr_cities::-webkit-scrollbar {
                                width: 0.2em;
                                }
                                
                                .my_class_fr_cities::-webkit-scrollbar-track {
                                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                                }
                                
                                .my_class_fr_cities::-webkit-scrollbar-thumb {
                                background-color: darkgrey;
                                outline: 1px solid slategrey;
                                }

                                .city_name_div:hover{
                                    background: rgb(227, 227, 227) !important;
                                }
                                .city_anchor:hover{
                                    text-decoration: none;
                                }
                            </style>

                            <!-- DEVICES AND APPS POPOVER -->
                            <section class="dropdownContent not_to_change" data-dropdown="Discover">
                                <div class="navblocks not_to_change">
                                    <div class="navblock not_to_change">
                                        <div class="sub-menu not_to_change">
                                            
                                            @if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                                                <div class="sub-menu__header not_to_change">
                                                    {{-- <h4 class="sub-menu__title">Select City</h4> --}}
                                                    <p class="sub-menu__subtitle">Select Another City.</p>
                                                </div>
                                                <div class="sub-menu__list">
                                                    <div class="sub-menu__item" >
                                                        <div class="my_class_fr_cities" style="max-height: 400px; overflow:scroll; overflow-x:hidden;">
                                                        
                                                            @foreach($cities['data'] as $key => $city)

                                                            <div class="city_name_div" style="text-align: center; margin:0;padding:5px;">
                                                                <a href="{{url('SelectingCity/'.$city.'')}}" class="city_anchor"> <p style="margin:0px;"> {{$city}} </p> </a>
                                                            </div>

                                                            @endforeach
                                                            
                                                        </div>
                                                        

                                                    </div>
                                                </div>
                                            @elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                                <div class="sub-menu__header not_to_change">
                                                    <p class="sub-menu__subtitle">Select Another City.</p>
                                                </div>
                                                <div class="sub-menu__list">
                                                    <div class="sub-menu__item" >
                                                        <div class="my_class_fr_cities" style="max-height: 400px; overflow:scroll; overflow-x:hidden;">
                                                        
                                                            @if(session()->has('AuthenticatedUserSelectedCities'))
                                                                @foreach($AuthUserCities as $key => $city)

                                                                @if(session()->get('AuthenticatedUserSelectedCities') == $city)
                                                                <div class="city_name_div" style="background:#dddbdb;;text-align: center; margin:0;padding:5px;">
                                                                    <a href="{{url('UserSelectedCity/'.$city.'')}}" class="city_anchor"> <p style="margin:0px;"> {{$city}} </p> </a>
                                                                </div>
                                                                @else
                                                                <div class="city_name_div" style="text-align: center; margin:0;padding:5px;">
                                                                    <a href="{{url('UserSelectedCity/'.$city.'')}}" class="city_anchor"> <p style="margin:0px;"> {{$city}} </p> </a>
                                                                </div>
                                                                @endif

                                                                @endforeach
                                                            @else
                                                                @foreach($AuthUserCities as $key => $city)

                                                                <div class="city_name_div" style="text-align: center; margin:0;padding:5px;">
                                                                    <a href="{{url('UserSelectedCity/'.$city.'')}}" class="city_anchor"> <p style="margin:0px;"> {{$city}} </p> </a>
                                                                </div>

                                                                @endforeach
                                                            @endif
                                                            
                                                            
                                                        </div>
                                                        

                                                    </div>
                                                </div>
                                            @endif

                                            

                                            <div class="sub-menu__header not_to_change">
                                                <h3 class="sub-menu__title">Search</h3>
                                                <p class="sub-menu__subtitle">Your nearby discounts.</p>
                                            </div>
                                            <div class="sub-menu__list">
                                                <div class="sub-menu__item">
                                                    <a class="sub-menu-button " href="{{route('categories')}}"
                                                        target="">
                                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                                class="sub-menu-button__icon icon-cart "></span>
                                                        </span>
                                                        <div class="sub-menu-button__text">
                                                            <span class="sub-menu-button__title "> Discover
                                                                Discounts </span>
                                                            <div class="sub-menu-button__subtitle"> Find deals
                                                                near your current location. </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- COMPANY POPOVER -->
                            <section class="dropdownContent" data-dropdown="Support">
                                <div class="navblocks">
                                    <div class="navblock" style="--min-height:415px;">
                                        <div class="sub-menu">
                                            <div class="sub-menu__header">
                                                <h3 class="sub-menu__title">Support</h3>
                                                <p class="sub-menu__subtitle">We’re here to help.</p>
                                            </div>
                                            <div class="sub-menu__list">
                                                <div class="sub-menu__item">
                                                    <a class="sub-menu-button " href="support.html" target="">
                                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                                class="sub-menu-button__icon icon-question "></span>
                                                        </span>
                                                        <div class="sub-menu-button__text">
                                                            <span class="sub-menu-button__title "> Getting
                                                                started </span>
                                                            <div class="sub-menu-button__subtitle"> All your
                                                                questions answered. </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="sub-menu__item">
                                                    <a class="sub-menu-button " href="https://support.homey.app"
                                                        target="_blank">
                                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                                class="sub-menu-button__icon icon-archive "></span>
                                                        </span>
                                                        <div class="sub-menu-button__text">
                                                            <span class="sub-menu-button__title "> Knowledge
                                                                Base </span>
                                                            <div class="sub-menu-button__subtitle"> Everything
                                                                you need to know. </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="sub-menu__item">
                                                    <a class="sub-menu-button " href="https://go.athom.com/youtube"
                                                        target="_blank">
                                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                                class="sub-menu-button__icon icon-play "></span>
                                                        </span>
                                                        <div class="sub-menu-button__text">
                                                            <span class="sub-menu-button__title "> Videos
                                                            </span>
                                                            <picture>
                                                                <img class="picture "
                                                                    src="img/nav/how_to_setup_homey.png" alt="Videos"
                                                                    loading="lazy" width="190" height="106">
                                                            </picture>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="navblock navblock--large">
                                        <div class="sub-menu sub-menu--blog">
                                            <div class="sub-menu__header">
                                                <h3 class="sub-menu__title">Blog</h3>
                                                <p class="sub-menu__subtitle">Read the latest news.</p>
                                            </div>
                                            <div class="sub-menu__list">
                                                <div class="sub-menu__item">
                                                    <a class="sub-menu-button sub-menu-button--blog"
                                                        href="en-us/blog/automate-your-home-with-these-smart-plug-tricks/automate-your-home-with-these-smart-plug-tricks.html">
                                                        <span class="sub-menu-button__image-wrapper"> <img
                                                                class="sub-menu-button__image"
                                                                src="https://blog.athom.com/wp-content/uploads/2021/11/external-content.duckduckgo.com_-5-150x150.jpg"
                                                                alt="" loading="lazy" width="40" height="40" />
                                                        </span>
                                                        <div class="sub-menu-button__text">
                                                            <span class="sub-menu-button__title"> Automate Your
                                                                Home with These Smart Plug Tricks </span>
                                                            <div class="sub-menu-button__subtitle"> 3 months ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="sub-menu__item">
                                                    <a class="sub-menu-button sub-menu-button--blog"
                                                        href="en-us/blog/teach-alexa-new-home-automation-skills-with-homey/teach-alexa-new-home-automation-skills-with-homey.html">
                                                        <span class="sub-menu-button__image-wrapper"> <img
                                                                class="sub-menu-button__image"
                                                                src="https://blog.athom.com/wp-content/uploads/2021/11/20200508HR-30-150x150.jpg"
                                                                alt="" loading="lazy" width="40" height="40" />
                                                        </span>
                                                        <div class="sub-menu-button__text">
                                                            <span class="sub-menu-button__title"> Teach Alexa
                                                                New Home Automation Skills with Homey </span>
                                                            <div class="sub-menu-button__subtitle"> 3 months ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="sub-menu__item">
                                                    <a class="sub-menu-button sub-menu-button--blog"
                                                        href="en-us/blog/try-these-things-at-home-with-your-motion-sensors-and-homey/try-these-things-at-home-with-your-motion-sensors-and-homey.html">
                                                        <span class="sub-menu-button__image-wrapper"> <img
                                                                class="sub-menu-button__image"
                                                                src="https://blog.athom.com/wp-content/uploads/2021/11/motion_sensor_en-pc-product2-150x150.jpg"
                                                                alt="" loading="lazy" width="40" height="40" />
                                                        </span>
                                                        <div class="sub-menu-button__text">
                                                            <span class="sub-menu-button__title"> Try These
                                                                Things at Home with Motion Sensors and Homey
                                                            </span>
                                                            <div class="sub-menu-button__subtitle"> 3 months ago
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <a href="en-us/blog/blog.html" class="sub-menu__more-button">
                                                <span>All articles</span> <span class="icon-arrow-right"></span>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </section>
                        </nav>

                        <style>
                            .buttons_to_open{
                                font-size: 20px;
                            }
                            .dropdown-item{
                                font-size: 16px;
                                margin-top: 10px;
                            }
                            .drap_downs{
                                /* margin-left: 50px; */
                                /* margin-left: 20%; */
                                max-height: 100000% !important;
                            }
                        </style>

                        <div class="dropdownMobile">
                            <style>
                                .anchors_in_nav{
                                    text-decoration: none;
                                    color: black;
                                    /* transition: 2.0s !important; */
                                }
                                .anchors_in_nav:hover{
                                    text-decoration: none;
                                    color: rgb(2, 16, 24)
                                    font-size: 16px !important;
                                    font-weight: 500;
                                }
                                

                                /* transition: 0.3s; */
                                .class_transition{
                                    /* transition: 2.0s !important; */
                                    /* overflow: hidden:
                                    height: 0;
                                    position: absolute; */
                                    /* background-color: #f9f9f9; */
                                    /* min-width: 160px;
                                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
                                    /* transition: all 1s ease-in !important; */
                                } 
                                .subCat_a{
                                    /* font-size: :14px; */
                                    font-size: 14px !important;
                                }
                            </style>


                            <style>
                                .subCat{
                                    border-bottom:1px solid #ccc;
                                    padding:10px;
                                }

                                /* .dropdownMobile{
                                    width:94%;
                                } */

                                @media screen and (min-width: 700px) and (max-width: 750px) {
                                .dropdownMobile {
                                    width: 96% !important;
                                }
                                }

                                @media screen and (min-width: 520px) and (max-width: 699px) {
                                .dropdownMobile {
                                    width: 96% !important;
                                }
                                }

                                @media screen and (min-width: 470px) and (max-width: 519px) {
                                .dropdownMobile {
                                    width: 95% !important;
                                }
                                }

                                @media screen and (min-width: 394px) and (max-width: 469px) {
                                .dropdownMobile {
                                    width: 94% !important;
                                }
                                }

                                @media screen and (min-width: 350px) and (max-width: 393px) {
                                .dropdownMobile {
                                    width: 93% !important;
                                }
                                }

                                @media screen and (min-width: 0px) and (max-width: 349px) {
                                .dropdownMobile {
                                    width: 92% !important;
                                }
                                } 

                                /* @media screen and (max-width: 700px) and (min-width: 750px) {
                                .dropdownMobile {
                                    width: 96% !important;
                                }
                                }

                                @media screen and (max-width: 470px) and (min-width: 699px) {
                                .dropdownMobile {
                                    width: 95% !important;
                                }
                                }

                                @media screen and (max-width: 394px) and (min-width: 469px) {
                                .dropdownMobile {
                                    width: 94% !important;
                                }
                                }

                                @media screen and (max-width: 350px) and (min-width: 393px) {
                                .dropdownMobile {
                                    width: 93% !important;
                                }
                                }

                                @media screen and (max-width: 0px) and (min-width: 349px) {
                                .dropdownMobile {
                                    width: 92% !important;
                                }
                                } */

                            </style>

                            {{-- this new after making it correct --}}
                            <style>
                                .dropdown.open .dropdown-menu {
                                max-height: 1000px !important;
                                opacity: 1;}

                                .categoryAnchorGoto:hover{
                                    text-decoration: none;
                                }
                            </style>

                            <section>
                                <div style="text-align: center;">
                                    {{-- <a href="{{route('categories')}}" class="categoryAnchorGoto"> <div> --}}
                                    <a href="{{route('categories')}}" class="categoryAnchorGoto"> <div>
                                        {{-- {{route('categories')}} --}}
                                        <h2 style="    margin-bottom: 16px;"> Categories </h2>
                                    </div> </a>


                                    @foreach($categories as $key => $cat)

                                    @if($cat['parent_id'] == 0)
                                    <div class="dropdown">
                                        <button style="    border: none;
                                        background: white; width: 100%;
                                        /* border-bottom: 1px solid #ccc; */
                                        border-top: 1px solid #ccc;
                                        font-size:16px; padding:12px;
                                        box-shadow: none;
                                        border-radius: 0px;
                                        
                                        " class="btn btn-default dropdown-toggle" 
                                        type="button" id="dropdownMenu1" data-toggle="dropdown">
                                        <h3>{{$cat['name']}}</h3>
                                          {{-- <span class="caret"></span> --}}
                                        </button>
                                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" style="width: 100%;
                                        position: sticky;text-align: center;
                                        margin-bottom: 0px;    
                                        /* border: none; */
                                        box-shadow: none;
                                        border-radius: 0px;
                                        border-top: 1px solid #ccc;
                                        ">

                                        <li class="subCat" role="presentation"><a role="menuitem" tabindex="-1" href="{{url('DealsByCat/'.$cat['id'])}}">All</a></li>
                                        {{-- @foreach($categories as $key => $subCat)
                                            @if($subCat['parent_id'] == $cat['id'])
                                            <li class="subCat" role="presentation"><a role="menuitem" tabindex="-1" href="{{url('DealsByCat/'.$subCat['id'])}}">{{$subCat['name']}}</a></li>
                                            @endif
                                        @endforeach --}}

                                        @foreach($categories as $Skey => $subcat)
                                            
                                        @if($cat['id'] == $subcat['parent_id'])
                                            <li style="font-size:16px;" class="subCat Main_click" id="" data-id="{{$Skey}}"  role="presentation">


                                                <a role="menuitem" tabindex="-1" href="#">
                                                {{$subcat['name']}}
                                                </a>
                                        
                                            
                                            </li>

                                            <ul class="menu_to_open display_none" style="border: none;
                                                background: white; width: 100%;
                                                /* border-bottom: 1px solid #ccc; */
                                                border-top: 1px solid #ccc;
                                                font-size:16px; padding:12px;
                                                box-shadow: none;
                                                border-radius: 0px;width: 100%;
                                                position: sticky;text-align: center;
                                                margin-bottom: 0px;    
                                                /* border: none; */
                                                box-shadow: none;
                                                border-radius: 0px;
                                                /* border-top: 1px solid #ccc; */
                                                /* border: 2px solid gray; */
                                                border-left: 2px solid grey;
                                                border-right: 2px solid grey;

                                                " id="open" data-id="{{$Skey}}" >

                                                <a class="subCat_Anchors" href="{{url('DealsByCat/'.$subcat['id'])}}"> <li style="border-bottom: 1px solid #ccc;padding:6px;"> All</li></a>
                                                        {{-- <hr> --}}
                                                @foreach($categories as $key => $S_Subcat)
                                                    @if($subcat['id'] == $S_Subcat['parent_id'])
                                                         <a class="subCat_Anchors" href="{{url('DealsByCat/'.$S_Subcat['id'])}}"> <li style="border-bottom: 1px solid #ccc;padding:6px;">  {{$S_Subcat['name']}}  </li></a>
                                                        {{-- <hr > --}}
                                                     @endif
                                                    
                                                @endforeach

                                                {{-- <hr style="margin-top: 8px;
                                                margin-bottom: -15px;"> --}}

                                            </ul>
                                        @endif


                                        @endforeach
                                       






                                        </ul>
                                    </div>
                                    @endif


                                    @if($loop->last)
                                    <hr>
                                    @endif

                                    @endforeach
                                   


                                    


                                    {{-- <hr> --}}
                                </div>
                            </section>

                            

                            <style>
                                .subCat_Anchors{
                                    color: black;
                                }
                                .dropdown-menu>li>a:focus, .dropdown-menu>li>a:hover {
                                color: #000000;
                                text-decoration: none;
                                background-color: #ffffff;
                                border: none;
                                }
                            </style>




                            <style>
                                .container .element.animation  {
                                    animation: SHW .5s;
                                    animation-fill-mode: both
                                }
                                @keyframes SHW {
                                    from {
                                        transform:scale(0.7);
                                        opacity:0
                                    }
                                    to {
                                        transform: scale(1);
                                        opacity:1
                                    }
                                }

                                

                                .menu_to_open.display_block{
                                -webkit-animation: in 700ms ease both;
                                animation: in 700ms ease both;
                                }
                                /* menu_to_openz */
                                .menu_to_open.display_none{
                                -webkit-animation: in 700ms ease both;
                                animation: in 700ms ease both;
                                /* -webkit-animation: out 700ms ease both;
                                animation: out 700ms ease both; */
                                }


                                @-webkit-keyframes in {
                                0% { -webkit-transform: scale(0) rotate(0deg); opacity: 0; visibility: hidden;  }
                                100% { -webkit-transform: scale(1) rotate(0); opacity: 1; visibility: visible; }
                                }

                                @keyframes in {
                                0% { transform: scale(0) rotate(0deg); opacity: 0; visibility: hidden;  }
                                100% { transform: scale(1) rotate(0); opacity: 1; visibility: visible; }
                                }

                                @-webkit-keyframes out {
                                0% { -webkit-transform: scale(1) rotate(0); opacity: 1; visibility: visible; }
                                100% { -webkit-transform: scale(0) rotate(-0deg); opacity: 0; visibility: hidden; }
                                }

                                @keyframes out {
                                0% { transform: scale(1) rotate(0); opacity: 1; visibility: visible; }
                                100% { transform: scale(0) rotate(-0deg); opacity: 0; visibility: hidden;  }
                                }

                            </style>

                            <style>
                                .animation_1{
                                    color: #5a5c63

                                }
                                .animation_2{
                                    color: #a5a6ad

                                }
                                .animation_3{
                                    color: #cfd1d6

                                }
                                .animation_4{
                                    color: #F6F7FB

                                }
                            </style>

                            <style>
                                .menu_to_open{
                                    list-style-type: none;
                                }
                            </style>


                            <script>
                                $(".Main_click").click(function(e){

                                    id = $(this).data("id");
                                    console.log(id);
                                    // const element = document.getElementsBy("open");
                                    var all_classes_of_menu = document.getElementsByClassName("menu_to_open");
                                    // console.log(all_classes_of_menu);

                                    for (let i = 0; i < all_classes_of_menu.length; i++) {

                                        element = all_classes_of_menu[i];

                                        if(  parseInt(all_classes_of_menu[i].getAttribute('data-id')) == parseInt(id)  )
                                        {
                                            console.log(element);

                                            if( $(element).hasClass('display_block') )
                                            {
                                                console.log('HAS BLOCK');

                                                $(element).removeClass('display_block');
                                                $(element).addClass('display_none');
                                                $(element).css("display", "none");
                                            }
                                            else
                                            {
                                                console.log('HAS NOT BLOCK');

                                                $(element).removeClass('display_none');
                                                $(element).addClass('display_block');
                                            }
                                        }
                                        else
                                        {
                                            console.log('OTHERS');
                                            $(element).removeClass('display_block');

                                            // setTimeout(function(){

                                                $(element).addClass('display_none');
                                                $(element).css("display", "none");

                                            // },700);
                                        }

                                    }












                                //     if($("#open").hasClass('display_block') )
                                //     {
                                //         console.log('Remove');
                                        
                                //         $("#open").removeClass('display_block');
                                        
                                //         // setTimeout(function(){
                                //         //     $("#open").addClass('animation_1');
                                //         // },500);
                                //         // setTimeout(function(){
                                //         //     $("#open").addClass('animation_2');
                                //         // },500);
                                //         // setTimeout(function(){
                                //         //     $("#open").addClass('animation_3');
                                //         // },500);setTimeout(function(){
                                //         //     $("#open").addClass('animation_4');
                                //         // },500);

                                //         setTimeout(function(){

                                //             $("#open").removeClass('display_none');
                                //             $("#open").css("display", "none");

                                //         },700);
                                //         // $("#open").addClass('display_none');
                                //     }
                                //     else
                                //     {
                                //         console.log('Show');
                                //         // setTimeout(function(){
                                //         //     $("#open").addClass('animation_1');
                                //         // },50);
                                //         // setTimeout(function(){
                                //         //     $("#open").addClass('animation_2');
                                //         // },50);
                                //         // setTimeout(function(){
                                //         //     $("#open").addClass('animation_3');
                                //         // },50);setTimeout(function(){
                                //         //     $("#open").addClass('animation_4');
                                //         // },50);

                                //         // setTimeout(function(){
                                //         //     $("#open").removeClass('display_block');
                                //         //     $("#open").css("display", "none");
                                //         // },100);
                                //         $("#open").removeClass('animation_1');
                                //         $("#open").removeClass('animation_2');
                                //         $("#open").removeClass('animation_3');
                                //         $("#open").removeClass('animation_4');

                                //         $("#open").removeClass('display_none');

                                //         $('#open').addClass('display_block');
                                //         // $('#open').addClass('animation');
                                //         // $('#open').addClass('element');
                                //         // $('#open').addClass('container');
                                //     }

                                // //     // $('#open').addClass('display_block');

                                // //     // if ( $(".div-box").hasClass('div-hide') ) {
                                // //     //     $(".div-box").removeClass('div-hide');
                                // //     // } else {
                                // //     //     $(".div-box").addClass('div-hide');    
                                // //     // }     
                                });
                            </script>

                                <style>
                                    .display_block{
                                        display: block !important;
                                        /* transition: opacity 1s ease-out; */
                                        /* opacity: 0; */
                                    }

                                    
                                    .display_none{
                                        display:none;
                                    }

                                    .menu_to_open{
                                        /* display: none; */
                                    }
                                </style>


                            <script>
                                $(document).on('click', '.dropdown-menu', function (e) {
                                            e.stopPropagation();
                                        });
                            </script>



                            <style>


                                    /*for prettify look*/
                                body {
                                    padding: 1em;
                                }

                                /* actual dropdown animation */
                                .dropdown .dropdown-menu {
                                    -webkit-transition: all 0.3s;
                                    -moz-transition: all 0.3s;
                                    -ms-transition: all 0.3s;
                                    -o-transition: all 0.3s;
                                    transition: all 0.3s;

                                    max-height: 0;
                                    display: block;
                                    overflow: hidden;
                                    opacity: 0;
                                }

                                .dropdown.open .dropdown-menu {
                                    max-height: 200px;
                                    opacity: 1;
                                }
                            </style>





                            {{-- <section class="navigation">
                                <div class="nav-container">
                                  <div class="brand" style="    text-align-last: center;
                                    margin-top: 17px;">
                                    <p class="" style="font-size:20px;" >Categories</p>
                                  </div>
                                  <nav>
                                    <div class="nav-mobile_1"><a class="anchors_in_nav" id="nav-toggle1" href="#!"><span></span></a></div>
                                    <ul class="nav-list_1" style="    text-align-last: center;">
          
                                        
                                      <li>
                                        <hr>

                                        <a class="anchors_in_nav" style="font-size: 16px" href="#!">Local</a>

                                        <hr>

                                        <ul class="nav-dropdown_1 class_transition" style="">
                                          <li>
                                            <a class="anchors_in_nav subCat_a"  style="" href="www.google.com">SPA</a>
                                            <hr>
                                          </li>
                                          <li>
                                            <a class="anchors_in_nav subCat_a" href="#">Fitness & Health</a>
                                            <hr>
                                          </li>
                                          <li>
                                            <a class="anchors_in_nav subCat_a" href="#">Hotels & Food</a>
                                            <hr>
                                            <hr>
                                          </li>
                                        </ul>
                                      </li>


                                      <li>
                                        

                                        <a class="anchors_in_nav" href="#!">Services</a>

                                        <hr>

                                        <ul class="nav-dropdown_1">
                                          <li>
                                            <a class="anchors_in_nav subCat_a" href="#!">Gym Coach</a>
                                            <hr>
                                          </li>
                                          <li>
                                            <a class="anchors_in_nav subCat_a" href="#!">Plumber</a>
                                            <hr>
                                          </li>
                                          <li>
                                            <a class="anchors_in_nav subCat_a" href="#!">Astronaut</a>
                                            <hr>
                                            <hr>
                                          </li>
                                        </ul>
                                      </li>


                                      <li>
                                      

                                        <a class="anchors_in_nav" href="#!">Goods</a>

                                        <hr>

                                        <ul class="nav-dropdown_1">
                                          <li>
                                            <a class="anchors_in_nav subCat_a" href="#!">Food Items</a>
                                            <hr>
                                          </li>
                                          <li>
                                            <a class="anchors_in_nav subCat_a" href="#!">Electronics</a>
                                            <hr>
                                          </li>
                                          <li>
                                            <a class="anchors_in_nav subCat_a" href="#!">Furniture</a>
                                            <hr>
                                            <hr>
                                          </li>
                                        </ul>
                                      </li>


                                    </ul>
                                  </nav>
                                </div>
                            </section> --}}

                        <style>
                                    // Navigation Variables
                                    $content-width: 1000px;
                                    $breakpoint: 799px;
                                    $nav-height: 70px;
                                    $nav-background: #262626;
                                    $nav-font-color: #ffffff;
                                    $link-hover-color: #2581DC;

                                    // Outer navigation wrapper
                                    .navigation {
                                    height: $nav-height;
                                    background: $nav-background;
                                    }

                                    // Logo and branding
                                    .brand {
                                    position: absolute;
                                    padding-left: 20px;
                                    float: left;
                                    line-height: $nav-height;
                                    text-transform: uppercase;
                                    font-size: 1.4em;
                                    a,
                                    a:visited {
                                        color: $nav-font-color;
                                        text-decoration: none;
                                    }
                                    }

                                    // Container with no padding for navbar
                                    .nav-container {
                                    max-width: $content-width;
                                    margin: 0 auto;
                                    }

                                    // Navigation 
                                    nav {
                                    float: right;
                                    ul {
                                        list-style: none;
                                        margin: 0;
                                        padding: 0;
                                        li {
                                        float: left;
                                        position: relative;
                                        a,
                                        a:visited {
                                            display: block;
                                            padding: 0 20px;
                                            line-height: $nav-height;
                                            background: $nav-background;
                                            color: $nav-font-color;
                                            text-decoration: none;
                                            &:hover {
                                            background: $link-hover-color;
                                            color: $nav-font-color;
                                            }
                                            &:not(:only-child):after {
                                            padding-left: 4px;
                                            content: ' ▾';
                                            }
                                        } // Dropdown list
                                        ul li {
                                            min-width: 190px;
                                            a {
                                            padding: 15px;
                                            line-height: 20px;
                                            }
                                        }
                                        }
                                    }
                                    }

                                    // Dropdown list binds to JS toggle event
                                    .nav-dropdown_1 {
                                    position: absolute;
                                    display: none;
                                    z-index: 1;
                                    box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
                                    }

                                    /* Mobile navigation */

                                    // Binds to JS Toggle
                                    .nav-mobile_1 {
                                    display: none;
                                    position: absolute;
                                    top: 0;
                                    right: 0;
                                    background: $nav-background;
                                    height: $nav-height;
                                    width: $nav-height;
                                    }
                                    @media only screen and (max-width: 798px) {
                                    // Hamburger nav visible on mobile only
                                    .nav-mobile_1 {
                                        display: block;
                                    }
                                    nav {
                                    width: 100%;
                                        padding: $nav-height 0 15px;
                                        ul {
                                        display: none;
                                        li {
                                            float: none;
                                            a {
                                            padding: 15px;
                                            line-height: 20px;
                                            }
                                            ul li a {
                                            padding-left: 30px;
                                            }
                                        }
                                        }
                                    }
                                    .nav-dropdown_1 {
                                        position: static;
                                    }
                                    }
                                    @media screen and (min-width: $breakpoint) {
                                    .nav-list_1 {
                                        display: block !important;
                                    }
                                    }
                                    #nav-toggle {
                                    position: absolute;
                                    left: 18px;
                                    top: 22px;
                                    cursor: pointer;
                                    padding: 10px 35px 16px 0px;
                                    span,
                                    span:before,
                                    span:after {
                                        cursor: pointer;
                                        border-radius: 1px;
                                        height: 5px;
                                        width: 35px;
                                        /* background: $nav-font-color; */
                                        position: absolute;
                                        display: block;
                                        content: '';
                                        transition: all 1000ms ease-in-out;
                                    }
                                    span:before {
                                        top: -10px;
                                    }
                                    span:after {
                                        bottom: -10px;
                                    }
                                    &.active span {
                                        background-color: transparent;
                                        &:before,
                                        &:after {
                                        top: 0;
                                        }
                                        &:before {
                                        transform: rotate(45deg);
                                        }
                                        &:after {
                                        transform: rotate(-45deg);
                                        }
                                    }
                                    }

                                    // Page content 
                                    article {
                                    max-width: $content-width;
                                    margin: 0 auto;
                                    padding: 10px;
                                    }
                        </style>

                        <script>

                            (function($) { // Begin jQuery
                            $(function() { // DOM ready
                                // If a link has a dropdown, add sub menu toggle.
                                $('nav ul li a:not(:only-child)').click(function(e) {
                                $(this).siblings('.nav-dropdown_1').toggle();
                                // Close one dropdown when selecting another
                                $('.nav-dropdown_1').not($(this).siblings()).hide();
                                e.stopPropagation();
                                });
                                // Clicking away from dropdown will remove the dropdown class
                                $('html').click(function() {
                                $('.nav-dropdown_1').hide();
                                });
                                // Toggle open and close nav styles on click
                                $('#nav-toggle').click(function() {
                                $('nav ul').slideToggle();
                                });
                                // Hamburger to X toggle
                                $('#nav-toggle').on('click', function() {
                                this.classList.toggle('active');
                                });
                            }); // end DOM ready
                            })(jQuery); // end jQuery
                        </script>






                            {{-- <div class="flex align-items-center line-bottom block-padding" 
                                style="display: revert; text-align-last: center;">


                                    <div class="dropdown" style=" ">
                                        <button class="btn btn-secondary dropdown-toggle buttons_to_open" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Local1
                                        </button>
                                        <div class="dropdown-menu drap_downs" style="    text-align: center;" aria-labelledby="dropdownMenuButton">

                                        <a style="display: block" class="dropdown-item" href="#">SPA</a>
                                        <a style="display: block" class="dropdown-item" href="#">Hotels & Food</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        <a style="display: block" class="dropdown-item" href="#">LAST</a>
                                        </div>
                                    </div>

                                    <div class="dropdown" style="display: block">
                                        <button class="btn btn-secondary dropdown-toggle buttons_to_open" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Local2
                                        </button>
                                        <div class="dropdown-menu drap_downs" style="    text-align: center;" aria-labelledby="dropdownMenuButton">

                                        <a style="display: block" class="dropdown-item" href="#">SPA</a>
                                        <a style="display: block" class="dropdown-item" href="#">Hotels & Food</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        </div>
                                    </div>

                                    <div class="dropdown" style="display: block">
                                        <button class="btn btn-secondary dropdown-toggle buttons_to_open" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Local3
                                        </button>
                                        <div class="dropdown-menu drap_downs" style="    text-align: center;" aria-labelledby="dropdownMenuButton">

                                        <a style="display: block" class="dropdown-item" href="#">SPA</a>
                                        <a style="display: block" class="dropdown-item" href="#">Hotels & Food</a>
                                        <a style="display: block" class="dropdown-item" href="#">Health & Fitness</a>
                                        </div>
                                    </div>

                       


                                   <style>

                                        .dropdown .dropdown-menu {
                                        -webkit-transition: max-height 0.3s, opacity 0.2s 0.1s, visibility 0s 0.3s;
                                        -moz-transition: max-height 0.3s, opacity 0.2s 0.1s, visibility 0s 0.3s;
                                        -ms-transition: max-height 0.3s, opacity 0.2s 0.1s, visibility 0s 0.3s;
                                        -o-transition: max-height 0.3s, opacity 0.2s 0.1s, visibility 0s 0.3s;
                                        transition: max-height 0.3s, opacity 0.2s 0.1s, visibility 0s 0.3s;
                                        max-height: 0;
                                        display: block;
                                        overflow: hidden;
                                        opacity: 0;
                                        visibility: hidden;
                                        }

                                        .dropdown.open .dropdown-menu {
                                        -webkit-transition: max-height 0.3s, opacity 0.2s, visibility 0s;
                                        -moz-transition: max-height 0.3s, opacity 0.2s, visibility 0s;
                                        -ms-transition: max-height 0.3s, opacity 0.2s, visibility 0s;
                                        -o-transition: max-height 0.3s, opacity 0.2s, visibility 0s;
                                        transition: max-height 0.3s, opacity 0.2s, visibility 0s;
                                        max-height: 120px;
                                        opacity: 1;
                                        visibility: visible;
                                        }

                                        /* @media (max-width: 767px) {
                                        .navbar-nav .dropdown-menu {
                                            position: static;
                                            float: none;
                                            width: auto;
                                            margin-top: 0;
                                            background-color: transparent;
                                            border: 0;
                                            -webkit-box-shadow: none;
                                            box-shadow: none;
                                        }
                                        .navbar-nav .dropdown-menu>li>a {
                                            padding: 5px 15px 5px 25px;
                                            color: #777;
                                        }
                                        } */
                                   </style>
                            </div> --}}


                            {{-- <a href="en-us/beta/beta.html" class="flex align-items-center line-bottom block-padding">
                                <div class="flex-shrink">
                                    <picture>
                                        <img class="picture " src="{{asset('assets/USER/img/nav/nav-homey-bridge-full.png')}}" alt="Homey"
                                            loading="lazy" width="150" height="" style="margin: 0 -30px 0 -20px">
                                    </picture>
                                </div>
                                <div class="block-margin-left block-margin-right flex-auto">
                                    <h3> Homey</h3>
                                    <span class="color-text-light"> Get started today.<br />
                                        No hardware required. </span>
                                </div>
                                <div class="flex-shrink"> <span class="icon-arrow-right color-text-light"></span> </div>
                            </a>
                            <a href="en-us/homey-pro/homey-pro.html"
                                class="flex align-items-center line-bottom block-padding">
                                <div class="flex-shrink">
                                    <picture>
                                        <img class="picture " src="{{asset('assets/USER/img/nav/nav-homey-pro.png')}}" alt="Homey Pro"
                                            loading="lazy" width="100" height="">
                                    </picture>
                                </div>
                                <div class="block-margin-left block-margin-right flex-auto">
                                    <h3> Homey Pro</h3>
                                    <span class="color-text-light"> A powerhouse for your smart home. </span>
                                </div>
                                <div class="flex-shrink"> <span class="icon-arrow-right color-text-light"></span> </div>
                            </a> --}}
                            <div class="flex flex-wrap block-padding">
                                <div class="flex-auto block-padding">
                                    <h4 class="font-weight-regular color-text-light  block-margin-bottom">
                                        Discover</h4>
                                    <a class="sub-menu-button " href="{{route('categories')}}" target="">
                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                class="sub-menu-button__icon icon-cart "></span> </span>
                                        <div class="sub-menu-button__text"> <span class="sub-menu-button__title ">
                                                Discover Devices </span> </div>
                                    </a>
                                    <a class="sub-menu-button " href="en-us/talks-with-homey/talks-with-homey.html"
                                        target="">
                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                class="sub-menu-button__icon icon-inspiration "></span> </span>
                                        <div class="sub-menu-button__text"> <span class="sub-menu-button__title ">
                                                Inspiration </span> </div>
                                    </a>
                                    <a class="sub-menu-button " href="en-us/apps/apps.html" target="">
                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                class="sub-menu-button__icon icon-grid "></span> </span>
                                        <div class="sub-menu-button__text"> <span class="sub-menu-button__title ">
                                                Browse Apps </span> </div>
                                    </a>
                                </div>
                                <div class="flex-auto block-padding">
                                    <h4 class="font-weight-regular color-text-light block-margin-bottom">Support
                                    </h4>
                                    <a class="sub-menu-button " href="support.html" target="">
                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                class="sub-menu-button__icon icon-question "></span> </span>
                                        <div class="sub-menu-button__text"> <span class="sub-menu-button__title ">
                                                Getting started </span> </div>
                                    </a>
                                    <a class="sub-menu-button " href="https://support.homey.app" target="">
                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                class="sub-menu-button__icon icon-archive "></span> </span>
                                        <div class="sub-menu-button__text"> <span class="sub-menu-button__title ">
                                                Knowledge Base </span> </div>
                                    </a>
                                    <a class="sub-menu-button " href="https://go.athom.com/youtube" target="_blank">
                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                class="sub-menu-button__icon icon-play "></span> </span>
                                        <div class="sub-menu-button__text"> <span class="sub-menu-button__title ">
                                                Videos </span> </div>
                                    </a>
                                    <a class="sub-menu-button " href="en-us/blog/blog.html" target="">
                                        <span class="sub-menu-button__icon-wrapper"> <span
                                                class="sub-menu-button__icon icon-list "></span> </span>
                                        <div class="sub-menu-button__text"> <span class="sub-menu-button__title "> Blog
                                            </span> </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="dropdownBackground"></div>
                        <div class="dropdownArrow"></div>
                    </div>
                </div>
                {{-- <div class="nav-cart" data-count="0">
                    <div class="position-relative">
                        <div class="toggle">
                            <span class="mask-cart --mask-size-medium"></span>
                            <div class="indicator"></div>
                        </div>
                        <div class="nav-cart__nipple">
                            <div class="nipple"></div>
                        </div>
                    </div>
                    <div class="nav-cart__popup">
                        <div class="cart loading">
                            <p class="title"> <span class="label">Your cart</span> </p>
                            <div class="empty text-align-center">
                                <p>Let&#39;s get shopping!</p>
                                <a href="{{route('categories')}}"
                                    class="to-store button button__xlarge button__fill button__green button__next">
                                    <span class="label">Browse discounts</span> </a>
                            </div>
                            <div class="products"> </div>
                            <div class="summary">
                                <div class="summary-line shipping">
                                    <div class="label">Shipping</div>
                                    <div class="price"></div>
                                </div>
                                <div class="summary-line total">
                                    <div class="label">Total</div>
                                    <div class="price"></div>
                                </div>
                            </div>
                            <a href="checkout.php"
                                class="checkout button button__xlarge button__bold button__green text-align-center">
                                <span>Checkout</span> <img class="right"
                                    src="{{asset('assets/USER/img/icons/arrow-right-white.svg')}}" /> </a>
                        </div>
                    </div>
                </div> --}}
                
                {{-- <div class="nav-lang">
                    <div class="position-relative">
                        <button class="nav-lang__toggle toggle" type="button" title="Choose your country" lang="en">
                            <img src="{{asset('assets/USER/img/icons/flags/us.svg')}}" width="23" height="17"
                                alt="us" />
                        </button>
                        <div class="nav-lang__nipple"> <span class="nipple"></span> </div>
                    </div>
                    <div class="nav-lang__popup">
                        <div class="nav-lang__body">
                            <div class="nav-lang__column">
                                <h3 class="nav-lang__title">Europe</h3>
                                <div class="nav-lang__list-column">
                                    <a data-language="de" data-locale="at" href="de-at/de-at.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/at.svg')}}" alt="Österreich"
                                            width="23" height="17" /> <span class="name">Österreich</span> </a>
                                    <a data-language="fr" data-locale="be" href="fr-be/fr-be.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/be.svg')}}" alt="Belgique"
                                            width="23" height="17" /> <span class="name">Belgique</span> </a>
                                    <a data-language="nl" data-locale="be" href="nl-be/nl-be.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/be.svg')}}" alt="België"
                                            width="23" height="17" />
                                        <span class="name">België</span> </a>
                                    <a data-language="de" data-locale="ch" href="de-ch/de-ch.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/ch.svg')}}" alt="Schweiz"
                                            width="23" height="17" />
                                        <span class="name">Schweiz</span> </a>
                                    <a data-language="fr" data-locale="ch" href="fr-ch/fr-ch.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/ch.svg')}}" alt="Suisse"
                                            width="23" height="17" />
                                        <span class="name">Suisse</span> </a>
                                    <a data-language="it" data-locale="ch" href="it-ch/it-ch.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/ch.svg')}}" alt="Svizzera"
                                            width="23" height="17" /> <span class="name">Svizzera</span> </a>
                                    <a data-language="de" data-locale="de" href="de-de/de-de.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/de.svg')}}" alt="Deutschland"
                                            width="23" height="17" /> <span class="name">Deutschland</span> </a>
                                    <a data-language="da" data-locale="dk" href="da-dk/da-dk.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/dk.svg')}}" alt="Danmark"
                                            width="23" height="17" />
                                        <span class="name">Danmark</span> </a>
                                    <a data-language="es" data-locale="es" href="es-es/es-es.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/es.svg')}}" alt="España"
                                            width="23" height="17" />
                                        <span class="name">España</span> </a>
                                    <a data-language="fr" data-locale="fr" href="fr-fr/fr-fr.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/fr.svg')}}" alt="France"
                                            width="23" height="17" />
                                        <span class="name">France</span> </a>
                                    <a data-language="en" data-locale="gb" href="en-gb/en-gb.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/gb.svg')}}" alt="United Kingdom"
                                            width="23" height="17" /> <span class="name">United Kingdom</span> </a>
                                    <a data-language="da" data-locale="gl" href="da-gl/da-gl.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/gl.svg')}}" alt="Grønland"
                                            width="23" height="17" /> <span class="name">Grønland</span> </a>
                                    <a data-language="en" data-locale="ie" href="en-ie/en-ie.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/ie.svg')}}" alt="Ireland"
                                            width="23" height="17" />
                                        <span class="name">Ireland</span> </a>
                                    <a data-language="it" data-locale="it" href="it-it/it-it.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/it.svg')}}" alt="Italia"
                                            width="23" height="17" />
                                        <span class="name">Italia</span> </a>
                                    <a data-language="nl" data-locale="nl" href="nl-nl/nl-nl.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/nl.svg')}}" alt="Nederland"
                                            width="23" height="17" /> <span class="name">Nederland</span> </a>
                                    <a data-language="no" data-locale="no" href="no-no/no-no.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/no.svg')}}" alt="Norge" width="23"
                                            height="17" />
                                        <span class="name">Norge</span> </a>
                                    <a data-language="pl" data-locale="pl" href="pl-pl/pl-pl.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/pl.svg')}}" alt="Polska"
                                            width="23" height="17" />
                                        <span class="name">Polska</span> </a>
                                    <a data-language="ru" data-locale="ru" href="ru-ru/ru-ru.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/ru.svg')}}" alt="Россия"
                                            width="23" height="17" />
                                        <span class="name">Россия</span> </a>
                                    <a data-language="sv" data-locale="se" href="sv-se/sv-se.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/se.svg')}}" alt="Sverige"
                                            width="23" height="17" />
                                        <span class="name">Sverige</span> </a>
                                </div>
                            </div>
                            <div class="nav-lang__column">
                                <h3 class="nav-lang__title">North America</h3>
                                <div class="nav-lang__list">
                                    <a data-language="en" data-locale="ca" href="en-ca/en-ca.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/ca.svg')}}" alt="Canada"
                                            width="23" height="17" />
                                        <span class="name">Canada</span> </a>
                                    <a data-language="es" data-locale="mx" href="es-mx/es-mx.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/mx.svg')}}" alt="México"
                                            width="23" height="17" />
                                        <span class="name">México</span> </a>
                                    <a data-language="en" data-locale="us" href="index.php" class="nav-lang__item ">
                                        <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/us.svg')}}" alt="United States"
                                            width="23" height="17" /> <span class="name">United States</span> </a>
                                </div>
                                <h3 class="nav-lang__title block-margin-top">Oceania</h3>
                                <div class="nav-lang__list">
                                    <a data-language="en" data-locale="au" href="en-au/en-au.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/au.svg')}}" alt="Australia"
                                            width="23" height="17" /> <span class="name">Australia</span> </a>
                                    <a data-language="en" data-locale="nz" href="en-nz/en-nz.html"
                                        class="nav-lang__item "> <img loading="lazy" class="flag"
                                            src="{{asset('assets/USER/img/icons/flags/nz.svg')}}" alt="New Zealand"
                                            width="23" height="17" /> <span class="name">New Zealand</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}


                


                @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)

                <div class="nav-lang">
                    <div class="position-relative">
                        <button class="nav-lang__toggle toggle" type="button" >
                            {{-- <img src="{{asset('assets/USER/img/icons/flags/us.svg')}}" width="23" height="17"
                                alt="us" /> --}}
                                <i class="fa fa-bell" id="bellIcon" aria-hidden="true" style="font-size: 20px;
                                "></i>

                        </button>
                        <div class="nav-lang__nipple"> <span class="nipple"></span> </div>
                    </div>



                    <style>
                        @media (min-width: 576px){
                        .nav-lang__list-column {
                            column-count: 1 !important;
                            column-gap: 16px;
                        }}
                        .notification{
                            margin:10px;
                            max-width: 300px;
                            padding:15px;
                            background-color: #cef6ce;
                            border-radius: 16px;
                        }

                        .this_is_note_scroll_col::-webkit-scrollbar {
                            width: 0.2em;
                        }
                        
                        .this_is_note_scroll_col::-webkit-scrollbar-track {
                            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                        }
                        
                        .this_is_note_scroll_col::-webkit-scrollbar-thumb {
                            background-color: darkgrey;
                            outline: 1px solid slategrey;
                        }
                    </style>

                    <style>
                        .note_anchors:hover{
                            text-decoration: none;
                        }
                    </style>


                    <div class="nav-lang__popup">
                        <div class="nav-lang__body this_is_note_scroll_col" style="overflow: scroll; overflow-x:hidden">
                            <div class="nav-lang__column" style="padding:5px; width:250px; max-height: 462px;">
                                <h3 class="nav-lang__title" style="    text-align: center;
                                ">Notifications</h3>
                                <div class="nav-lang__list-column ">

                                    <div class="note_starter">

                                    </div>
                                    @if(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                                    @foreach($notifications as $key => $note)

                                        @if($note['subject'] == 'Wishlist updated')
                                        <a class="note_anchors" href="{{url('wishlist')}}">
                                            <div class="notification" style="background: #fac8c8">
                                                {{$note['message']}}
                                            </div>
                                        </a>
                                        @elseif($note['subject'] == 'New Deal')
                                        <a class="note_anchors" href="{{url('discount_details/'.$note['type_id'])}}">
                                            <div class="notification" style="background: #d3d1f9">
                                                {{$note['message']}}
                                            </div>
                                        </a>
                                        @elseif($note['subject'] == 'New Deal Purchased')
                                        <a class="note_anchors" href="{{url('myprofile')}}">
                                            <div class="notification" style="background: #bce0f2">
                                                {{$note['message']}}
                                            </div>
                                        </a>
                                        @else
                                        <a class="note_anchors" href="">
                                            <div class="notification">
                                                {{$note['message']}}
                                            </div>
                                        </a>
                                        @endif

                                    @endforeach
                                    @endif

                                    {{-- <button id="buttontoprepend">buttontoprepend</button> --}}

                                        
                                </div>
                            </div>
                        </div>
                    </div>

                

                </div>
                
                @endif
                {{-- <script>
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
                        }
                        else if( data.notification.subject == 'New Deal')
                        {
                            $(` <a class="note_anchors" href="{{url('wishlist')}}">
                                    <div class="notification" style="background: #bbb8ec">
                                                ${data.notification.message}
                                            </div>
                                        </a>
                                `).insertAfter(".note_starter");
                        }
                        else if( data.notification.subject == 'New Deal Purchased')
                        {
                            $(` <a class="note_anchors" href="{{url('wishlist')}}">
                                    <div class="notification" style="background: #69a6c5">
                                                ${data.notification.message}
                                            </div>
                                        </a>
                                `).insertAfter(".note_starter");
                        }
                        else
                        {
                            $(`<div class="notification" style="background-color: #a8d2ee;">
                                ${data.notification.message}
                                 </div> `).insertAfter(".note_starter");
                        }

                     
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

                    

                </script> --}}
                
                {{-- <script>
                    $("#buttontoprepend").click(function(){
                       console.log('hi');
                           $("<span>Hello world!</span>").insertBefore(".notification");
                       });
               </script> --}}

               
               

                <a class="nav-buy" href="{{url('boost')}}" data-shop-count="0">
                    <div class="gradient-button-blue-small flatcolor">Boost</div>
                </a>
                <style>
                    #modal_button_just_space{
                        display:none;
                    }
                </style>

                @if(!session()->has('Authenticated_user_data'))
                    <style>
                        .locationMenu_for_mobile{
                                display: none;
                            }
                        .drop_DownToRight{
                            right: -13px;
                            /* right: 149px; */
                        }
                        @media only screen and (max-width: 767px) {
                            .locationMenu_for_mobile{
                                display: block;
                                /* margin-right: -335px; */
                                right: -55%;
                            }
                        }
                        
                        @media only screen and (max-width: 767px) {
                            .locationMenu_for_mobile{
                                display: block;
                            }
                        }

                        @media only screen and (max-width: 557px) {
                            .locationMenu_for_mobile{
                                display: block;
                                right: -54% !important;
                            }
                        }

                        @media (min-width:576px) and (max-width:642px) {
                            .locationMenu_for_mobile {
                                /* display:none; */
                                margin-right: -303px;
                            }
                        }

                        @media (min-width:500px) and (max-width:556px) {
                            .locationMenu_for_mobile {
                                /* display:none; */
                                /* margin-right: -303px; */
                                /* margin-right: -270px; */
                                right: -54%;
                            }
                        }

                        @media (min-width:460px) and (max-width:499px) {
                            .locationMenu_for_mobile {
                                /* display:none; */
                                /* margin-right: -303px; */
                                /* margin-right: -248px; */
                                right: -54%;
                            }
                        }

                        @media (min-width:400px) and (max-width:459px) {
                            .locationMenu_for_mobile {
                                /* display:none; */
                                /* margin-right: -303px; */
                                /* margin-right: -248px; */
                                /* margin-right: -383px; */
                                right: 35%;
                            }
                            #modal_button_just_space{
                            /* display:block !important; */
                            /* display: revert; */
                            visibility: hidden;

                            display: none !important;
                            }
                        }

                        @media (min-width:370px) and (max-width:399px) {
                            .locationMenu_for_mobile {
                                /* display:none; */
                                /* margin-right: -303px; */
                                /* margin-right: -248px; */
                                /* margin-right: -371px; */
                                right: 35%;
                            }
                            #modal_button_just_space{
                            /* display:block !important; */
                            /* display: revert; */
                            visibility: hidden;
                            display: none !important;
                            }
                        }

                        @media (min-width:320px) and (max-width:369px) {
                            .locationMenu_for_mobile {
                                /* display:none; */
                                /* margin-right: -303px; */
                                /* margin-right: -248px; */
                                /* margin-right: -338px; */
                                right: 35%;
                            }
                            #modal_button_just_space{
                            /* display:block !important; */
                            /* display: revert; */
                            visibility: hidden;
                            display: none !important;
                            }
                        }

                        @media (min-width:280px) and (max-width:319px) {
                            .locationMenu_for_mobile {
                              
                                /* margin-right: -317px; */
                                right: 35%;
                            }
                            #modal_button_just_space{
                            /* display:block !important; */
                            /* display: revert; */
                            visibility: hidden;
                            display: none !important;
                            }
                        }

                        @media (min-width:200px) and (max-width:279px) {
                            .locationMenu_for_mobile {
                                
                                /* margin-right: -290px; */
                                right: 35%;
                            }
                            #modal_button_just_space{
                            /* display:block !important; */
                            /* display: revert; */
                            visibility: hidden;
                            display: none !important;
                            }
                        }
                        /* for menu  */
                        @media (min-width:441px) and (max-width:466px) {
                            .drop_DownToRight{
                            /* right: -13px; */
                            /* right: 149px; */
                            /* right: 151px; */
                            right: 0px;
                        }
                        }


                        @media (min-width:400px) and (max-width:440px) {
                            .drop_DownToRight{
                            /* right: -13px; */
                            /* right: 149px; */
                            right: 0px;
                        }
                        }

                        @media (min-width:300px) and (max-width:399px) {
                            .drop_DownToRight{
                            /* right: -13px; */
                            /* right: 151px; */
                            right: 0px;
                        }
                        }

                        @media (min-width:300px) and (max-width:399px) {
                            .drop_DownToRight{
                            /* right: -13px; */
                            /* right: 151px; */
                            /* right: 181px; */
                            right: 0px;
                        }
                        }
                        
                    </style>
                @endif
                    {{-- <div>hello</div> --}}
                    <style>
                        /* .locationMenu_for_mobile{
                            display:none;
                        } */
                        @media (min-width:767px){
                            .locationMenu_for_mobile{
                            display: none !important;
                        }
                        
                        }

                        /* New COMPLAINT  */
                        /* @media only screen and (max-width: 452px) {
                            #modal_button_just_space{
                                display: none !important;
                            }
                            .locationMenu_for_mobile{
                                right: 35%;
                            }
                        } */

                    </style>

                    {{-- <div class="locationMenu_for_mobile" style=""> --}}
                    
                    @if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                        <div class="dropdownMOB locationMenu_for_mobile" class="">
                            <button class="dropbtn" style="    height: 39px;"> <p id="MobLocationMenu">Country</p> </button>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" id="modal_button_just_space" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                            </button>
    

                            <div class="dropdown-content drop_DownToRight" style="background: white;
                            border-radius: 17px;
                            text-align: center;max-height: 250px;
                                overflow: scroll;">
                            <br> 
                            <span>Select Another City</span>
                            @foreach($cities['data'] as $key => $city)
                            <a href="{{url('SelectingCity/'.$city.'')}}">{{$city}}</a>
                            @endforeach

                            </div>
                        </div>
                    @elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                        <div class="dropdownMOB locationMenu_for_mobile" class="">
                            <button class="dropbtn" style="    height: 39px;"> <p id="MobLocationMenu">Country</p> </button>

                            <button type="button" class="btn btn-primary" id="modal_button_just_space" data-toggle="modal" data-target="#exampleModal">
                                Launch demo modal
                            </button>


                            {{-- <div class="dropdown-content drop_DownToRight" style="background: white;
                            border-radius: 17px;
                            text-align: center;max-height: 250px;
                                overflow: scroll;">
                            <br> 
                            <span>Select Another City</span>
                            @foreach($cities['data'] as $key => $city)
                            <a href="{{url('SelectingCity/'.$city.'')}}">{{$city}}</a>
                            @endforeach

                            </div> --}}
                        </div>
                    @endif

                {{-- </div> --}}
                @if( !session()->has('Authenticated_user_data') && session()->has('unAuthUserLocations'))
                <script>
                    // alert(1);
                    // MOBILE NAV
                    // document.getElementById('MobLocationMenu').value = country;
                    // const country = document.getElementById("location_country").value;
                    const cityMobAuth = document.getElementById("location_city").value;
                    // alert(city);
                    document.getElementById('MobLocationMenu').innerHTML = cityMobAuth;
                </script>
                @elseif(session()->has('Authenticated_user_data') && session()->get('Authenticated_user_data')['type'] == 1)
                <script>
                    // alert(city);
                    // MOBILE NAV
                    // document.getElementById('MobLocationMenu').value = country;
                    const country = document.getElementById("location_country").value;
                    const cityMobAuth = document.getElementById("location_city").value;
                    document.getElementById('MobLocationMenu').innerHTML = cityMobAuth;
                </script>
                @endif



                <style>
                    /* Dropdown Button */
                    .dropbtn {
                    /* background-color: #04AA6D; */
                    color: black;
                    border: 1px solid gray !important;
                    border-radius:10px;
                    padding: 5px;
                    font-size: 16px;
                    border: none;
                    }

                    /* The container <div> - needed to position the dropdown content */
                    .dropdownMOB {
                    position: relative;
                    display: inline-block;
                    }

                    /* Dropdown Content (Hidden by Default) */
                    .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f1f1f1;
                    /* min-width: 160px; */
                    min-width: 190px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                    }

                    /* Links inside the dropdown */
                    .dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                    }

                    /* Change color of dropdown links on hover */
                    .dropdown-content a:hover {background-color: #ddd;}

                    /* Show the dropdown menu on hover */
                    .dropdownMOB:hover .dropdown-content {display: block;}

                    /* Change the background color of the dropdown button when the dropdown content is shown */
                    .dropdownMOB:hover .dropbtn {
                        /* background-color: #3e8e41; */
                        border: 2px solid gray !important;
                    }
                </style>








                @if(session()->has('Authenticated_user_data'))
                {{-- <a class="nav-buy" href="{{url('cart')}}">
                    <img src="{{asset('assets/USER/shopping-cart.svg')}}" width="40px" alt="">
                    <div class="pulse-css"></div>
                </a> --}}
                @if(session()->get('Authenticated_user_data')['type'] == 1)


                <a class="nav-buy" href="{{url('userChat')}}" data-shop-count="0">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.4605 3.84888H5.31688C4.64748 3.84961 4.00571 4.11586 3.53237 4.58919C3.05903 5.06253 2.79279 5.7043 2.79205 6.3737V18.1562C2.79279 18.8256 3.05903 19.4674 3.53237 19.9407C4.00571 20.4141 4.64748 20.6803 5.31688 20.6811C5.54005 20.6812 5.75404 20.7699 5.91184 20.9277C6.06964 21.0855 6.15836 21.2995 6.15849 21.5227V23.3168C6.15849 23.6215 6.24118 23.9204 6.39774 24.1818C6.5543 24.4431 6.77886 24.6571 7.04747 24.8009C7.31608 24.9446 7.61867 25.0128 7.92298 24.9981C8.22729 24.9834 8.52189 24.8863 8.77539 24.7173L14.6173 20.8224C14.7554 20.7299 14.918 20.6807 15.0842 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.4721 19.3664 21.6222 18.8359L24.8966 7.05011C24.9999 6.67481 25.0152 6.28074 24.9414 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.931 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4605 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0842C14.5856 18.9972 14.0981 19.1448 13.6837 19.4219L7.84171 23.3168V21.5227C7.84097 20.8533 7.57473 20.2115 7.10139 19.7382C6.62805 19.2648 5.98628 18.9986 5.31688 18.9978C5.09371 18.9977 4.87972 18.909 4.72192 18.7512C4.56412 18.5934 4.4754 18.3794 4.47527 18.1562V6.3737C4.4754 6.15054 4.56412 5.93655 4.72192 5.77874C4.87972 5.62094 5.09371 5.53223 5.31688 5.5321H22.4605C22.5905 5.53243 22.7188 5.56277 22.8353 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2642 6.09045 23.2887 6.21821C23.3132 6.34597 23.308 6.47766 23.2733 6.60304Z"
                            fill="#0B2A97" />
                        <path
                            d="M7.84173 11.4233H12.0498C12.273 11.4233 12.4871 11.3347 12.6449 11.1768C12.8027 11.019 12.8914 10.8049 12.8914 10.5817C12.8914 10.3585 12.8027 10.1444 12.6449 9.98661C12.4871 9.82878 12.273 9.74011 12.0498 9.74011H7.84173C7.61852 9.74011 7.40446 9.82878 7.24662 9.98661C7.08879 10.1444 7.00012 10.3585 7.00012 10.5817C7.00012 10.8049 7.08879 11.019 7.24662 11.1768C7.40446 11.3347 7.61852 11.4233 7.84173 11.4233Z"
                            fill="#0B2A97" />
                        <path
                            d="M15.4162 13.1066H7.84173C7.61852 13.1066 7.40446 13.1952 7.24662 13.3531C7.08879 13.5109 7.00012 13.725 7.00012 13.9482C7.00012 14.1714 7.08879 14.3855 7.24662 14.5433C7.40446 14.7011 7.61852 14.7898 7.84173 14.7898H15.4162C15.6394 14.7898 15.8535 14.7011 16.0113 14.5433C16.1692 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1692 13.5109 16.0113 13.3531C15.8535 13.1952 15.6394 13.1066 15.4162 13.1066Z"
                            fill="#0B2A97" />
                    </svg>

                </a>
                @endif

                @endif


                @if(session()->has('Authenticated_user_data'))

                {{-- <h1> {{session()->get('Authenticated_user_data')['token']}} </h1> --}}


                {{-- <a class="nav-user-login fas fa-user" href="{{route('myprofile')}}" title="Login">

                </a> --}}

                {{-- <a class="nav-buy" href="#" title="Logout">
                    <form action="{{route('user_logout')}}" method="POST">
                        @csrf
                        <button type="submit"> <img src="{{asset('assets/USER/logout1.png')}}" color="red" width="30px"
                                alt=""> </button>
                    </form>
                </a> --}}

                @else

                @guest
                <a class="nav-user-login fas fa-user" href="{{route('login')}}" title="Login"></a>
                @endguest

                @endif



                <style>
                    .nav-cart__popup .cart{
                        min-width: 250px;
                    }
                    .anchors_in_nav_purple{
                        text-decoration: none;
                    }
                    .anchors_in_nav_purple:hover{
                        text-decoration: none;
                    }
                </style>

                @if(session()->has('Authenticated_user_data'))  
                <div class="nav-cart" data-count="0">
                    <div class="position-relative">
                        <div class="toggle">

                            <img src="https://i.picsum.photos/id/962/200/200.jpg?hmac=XehF7z9JYkgC-2ZfSP05h7eyumIq9wNKUDoCLklIhr4" style="border-radius: 12px;" width="25px;" alt="">
                        </div>
                        <div class="nav-cart__nipple">
                            <div class="nipple" style="background: #010080;"></div>
                        </div>
                    </div>

                    <div class="nav-cart__popup" style="background: #010080;">
                        <div class="cart loading">
                            {{-- <p class="title"> <span class="label">Your cart</span> </p> --}}

                            <div style="margin-left: 20px;">

                                @if(session('Authenticated_user_data')['type'] == 1)

                                <a href="{{url('myprofile')}}" class="anchors_in_nav_purple"> 
                                <div style="color: white;x"> 
                                    <h4> <i class="fa fa-bars" aria-hidden="true"></i>
                                         <span style="margin-left: 10px;">My GiGi</span> </h4>
                                </div>

                                <a href="{{url('wishlist')}}" class="anchors_in_nav_purple"> 
                                <div style="color: white;x"> 
                                    <h4> <i class="fa fa-heart" aria-hidden="true"></i>
                                         <span style="margin-left: 10px;">Wishlist</span> </h4>
                                </div>
                                </a>


                                <a href="{{url('cart')}}" class="anchors_in_nav_purple"> 
                                <div style="color: white;x"> 
                                    <h4> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                         <span style="margin-left: 10px;">Cart</span> </h4>
                                </div>
                                </a>

                                <a href="{{url('userChat')}}" class="anchors_in_nav_purple chat_icon_inPurple"> 
                                    <div style="color: white;x"> 
                                        <h4 style="    margin-left: 2px;"> <i class="fa fa-envelope" aria-hidden="true"></i>
                                             <span style="margin-left: 10px;">Chat</span> </h4>
                                </div>
                            </a>

                            <style>
                                @media only screen and (min-width: 676px) {
                                    .chat_icon_inPurple {
                                        display:none;
                                }
                                }
                            </style>



                                </a>

                                @elseif(session('Authenticated_user_data')['type'] == 2)
                                <a href="{{url('MerchantDashboard')}}" class="anchors_in_nav_purple"> 
                                    <div style="color: white;x"> 
                                        <h4> <i class="fa fa-bars" aria-hidden="true"></i>
                                             <span style="margin-left: 10px;">My GiGi</span> </h4>
                                    </div>
                                    </a>
                                @elseif(session('Authenticated_user_data')['type'] == 3)
                                <a href="{{url('AdminDashboard')}}" class="anchors_in_nav_purple"> 
                                    <div style="color: white;x"> 
                                        <h4> <i class="fa fa-bars" aria-hidden="true"></i>
                                             <span style="margin-left: 10px;">My GiGi</span> </h4>
                                    </div>
                                    </a>
                                @endif




                                {{-- <a href="{{url('wishlist')}}" class="anchors_in_nav_purple"> 
                                <div style="color: white;x"> 
                                    <h4> <i class="fa fa-heart" aria-hidden="true"></i>
                                         <span style="margin-left: 10px;">Wishlist</span> </h4>
                                </div>
                                </a>


                                <a href="{{url('cart')}}" class="anchors_in_nav_purple"> 
                                <div style="color: white;x"> 
                                    <h4> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                         <span style="margin-left: 10px;">Cart</span> </h4>
                                </div>
                                </a> --}}

                                <hr>

                                @if(session('Authenticated_user_data')['type'] == 1)
                                    <div style="color: white;x"> 
                                        <form action="{{route('user_logout')}}" method="POST">
                                        @csrf
                                        <button type="submit"> Sign Out </button>
                                    </form>
                                    </div>
                                @elseif(session('Authenticated_user_data')['type'] == 2)
                                    <div style="color: white;x"> 
                                        <form action="{{route('merchant_logout')}}" method="POST">
                                        @csrf
                                        <button type="submit"> Sign Out </button>
                                    </form>
                                    </div>
                                @elseif(session('Authenticated_user_data')['type'] == 3)
                                    <div style="color: white;x"> 
                                        <form action="{{route('admin_logout')}}" method="POST">
                                        @csrf
                                        <button type="submit"> Sign Out </button>
                                    </form>
                                    </div>
                                @endif
                                

                                


                            </div>
                            {{-- <div class="empty text-align-center">
                                <p>Let&#39;s get shopping!</p>
                                <a href="{{route('categories')}}"
                                    class="to-store button button__xlarge button__fill button__green button__next">
                                    <span class="label">Browse discounts</span> </a>
                            </div> --}}
                            {{-- <div class="products"> </div>
                            <div class="summary">
                                <div class="summary-line shipping">
                                    <div class="label">Shipping</div>
                                    <div class="price"></div>
                                </div>
                                <div class="summary-line total">
                                    <div class="label">Total</div>
                                    <div class="price"></div>
                                </div>
                            </div>
                            <a href="checkout.php"
                                class="checkout button button__xlarge button__bold button__green text-align-center">
                                <span>Checkout</span> <img class="right"
                                    src="{{asset('assets/USER/img/icons/arrow-right-white.svg')}}" /> </a> --}}
                        </div>
                    </div>
                </div>
                @endif






                <div class="nav-user">
                    <div class="position-relative">
                        <div class="nav-user-avatar-wrap">
                            <div id="user-avatar" class="nav-user-avatar"></div>
                            <script>
                                document.getElementById('user-avatar').style.backgroundImage = `url(${window.localStorage.getItem('user-avatar')})`;
                            </script>
                        </div>
                        <div class="nav-user__nipple">
                            <div class="nipple"></div>
                        </div>
                    </div>
                    <div class="nav-user__popup">
                        <div class="nav-user__menu">
                            <div class="welcome"> Welcome <span class="nav-user-name"></span>! </div>
                            <div class="nav-user__separator"></div>
                            <a href="en-us/account/account.html"> <span class="nav-user__icon icon-my-account"></span>
                                <span class="nav-user__label">My account</span> </a>
                            <a href="en-us/account/orders/orders.html"> <span class="nav-user__icon icon-cart"></span>
                                <span class="nav-user__label">My
                                    orders</span> </a>
                            <a href="en-us/account/subscriptions/subscriptions.html"> <span
                                    class="nav-user__icon icon-check-circle"></span> <span class="nav-user__label">My
                                    subscriptions</span> </a>
                            <a href="en-us/account/backups/backups.html"> <span
                                    class="nav-user__icon icon-backups"></span> <span class="nav-user__label">My
                                    backups</span> </a>
                            <a href="en-us/account/devices/devices.html"> <span
                                    class="nav-user__icon icon-devices"></span> <span class="nav-user__label">My
                                    devices</span> </a>
                            <!--      <a href="https://homey.app/en-us/account/addresses/">-->
                            <!--        <span class="icon icon-addresses"></span>-->
                            <!--        <span class="nav-user__label">My addresses</span>-->
                            <!--      </a>-->
                            <div class="nav-user__separator"></div>
                            <a href="my_homey_default.html" target="_blank"> <span
                                    class="nav-user__icon icon-pc-laptop"></span> <span class="nav-user__label">Web
                                    App</span> <span class="nav-user__external icon-external-link"></span> </a>
                            <a href="get_homey_default.html" target="_blank"> <span
                                    class="nav-user__icon icon-mobile"></span> <span class="nav-user__label">Mobile
                                    App</span> <span class="nav-user__external icon-external-link"></span> </a>
                            <div class="nav-user__separator"></div>
                            <a data-logout class="logout" href="index.php#"> <span
                                    class="nav-user__icon icon-log-out"></span> <span
                                    class="nav-user__label">Logout</span> </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>




