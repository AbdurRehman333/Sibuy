<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registration</title>

    

    <link rel="shortcut icon" href="{{asset('assets/USER/admin/assets/images/gigi-logo.png')}}">
    <!-- Favicon icon -->
    {{--
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet"> --}}

    <!-- Favicon icon -->
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}"> --}}
    
    <link rel="stylesheet" href="{{asset('asset/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">







        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>jQuery UI Datepicker - Default functionality</title>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
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

</head>


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
                    document.getElementById('address').value = address;

                    data.results[0].address_components.forEach(function(element){
                        // console.log(element.types);
                        if(element.types[0] == 'locality' && element.types[1] == 'political')
                        {
                            // console.log('City:')
                            // console.log(element.long_name);
                            city = element.long_name;
                            document.getElementById('city').value = city
            
                            // country
                            // city
                        }
                        if(element.types[0] == 'country' && element.types[1] == 'political')
                        {
                            // console.log('Country:')
                            // console.log(element.long_name);
                            country = element.long_name;
                            document.getElementById('country').value = country
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



<style>
    .form-control {
        color: black !important;
    }
</style>









<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="">
                        <div class="row n">
                            <div class="col-xl-12">



                                
                                

                                <div id="map">

                                </div>

                                <div style="    text-align: -webkit-center; margin-top:30px;">
                                    {{-- <img src="{{asset('assets/images/logo.png')}}"  alt=""> --}}

                                    <a href="{{url('home')}}">
                                        <img src="{{asset('assets/USER/admin/assets/images/gigi-logo.png')}}"  width="50px;" alt="">
                                    </a>
                                    <h2 style="margin-top:10px;" > Hello There!</h2>
                                    <p style="color: #082073;    font-size: 17px;"> Please Register to Get Amazing Discounts! </p>
                                </div>

                                
                                @if(Session::has('alert'))
                                <p class="alert alert-danger" style="    text-align-last: center;
                                ">{{ Session::get('alert') }}</p>
                                @endif
                                
                                <form method="POST" action="{{url('user_registration')}}">
                                    @csrf
                                    <input type="hidden" name="type" value="{{$type}}">

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="text" name="name"  class="form-control"  required id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Name">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="text" name="phone_no" class="form-control"  required id="exampleutEmail1"
                                            aria-describedby="emailHelp" placeholder="Contact Number">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="text" name="email" class="form-control"  required id="exampleInpail1"
                                            aria-describedby="emailHelp" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="password" class="form-control"  required id="examnputEmail1"
                                            aria-describedby="emailHelp" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="password" class="form-control"  required id="exampleInputil1"
                                            aria-describedby="emailHelp" name="password_confirmation" placeholder="Confirm Password">
                                    </div>

                                    <div class="form-group">
                                       
                                                
                                                 <input  style="    text-align-last: center;" class="form-control" required 
                                                aria-describedby="emailHelp" name="date_of_birth" placeholder="DOB: MM/DD/YYYY"
                                                type="text" id="datepicker">
                                            
                                            
                                    </div>
                              
                                    <div class="form-group" style="text-align: center;">
                                        <label for=""> Gender : </label> <br>
                                        <div style="display: inline;margin: 10px;">
                                            <input type="radio" name="gender" value="male" required> Male 
                                        </div>
                                        <div style="display: inline;margin: 10px;">
                                        <input type="radio" name="gender" value="female" required> Female
                                        </div>
                                        {{-- <div style="display: inline;margin: 10px;">
                                        <input type="radio" name="gender" value="other" required> Other
                                        </div> --}}
                                    </div>

                                    <div class="form-group" style="text-align: center;">
                                            <button id="btn" type="button"  class="btn btn-sm btn-info"> Fetch Location </button>
                                            <p color="black">This Step is Required to Proceed.</p>
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="text" name="country" class="form-control"  required id="country"
                                            aria-describedby="emailHelp" placeholder="Country...">
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="text" name="city" class="form-control"  required id="city"
                                            aria-describedby="emailHelp" placeholder="City...">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="hidden" name="address" class="form-control"  required id="address"
                                            aria-describedby="emailHelp" placeholder="Latitude">
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="hidden" name="lat" class="form-control"  required id="lat"
                                            aria-describedby="emailHelp" placeholder="Latitude">
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="hidden" name="long" class="form-control"  required id="long"
                                            aria-describedby="emailHelp" placeholder="Longitude">
                                    </div>
                                    

                                    <div class="form-group" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary">Sign up!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
	Scripts
***********************************-->

<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0&callback=initMap">
</script>


    <!-- Required vendors -->
    <script src="{{asset('assets/USER/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/USER/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/USER/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/USER/js/deznav-init.js')}}"></script>

</body>

</html>