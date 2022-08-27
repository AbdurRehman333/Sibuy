<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registration</title>



    {{--
    <link rel="shortcut icon" href="{{asset('assets/USER/admin/assets/images/gigi-logo.png')}}"> --}}

    <script src="https://polyfill.io/v3/polyfill.js?features=default"></script>


    {{--
    <link rel="stylesheet" href="{{asset('asset/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"> --}}

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">







    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>jQuery UI Datepicker - Default functionality</title>

    {{--
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css"> --}}

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
     {{-- <script src="{{asset('js/app.js')}}"></script> --}}

</head>
{{-- <script src="/javascripts/jquery.geocomplete.min.js" type="text/javascript"></script> --}}
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

    locationButton.textContent = "Pan to Current Location";
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
            // document.getElementById('lat').value = position.coords.latitude
            // document.getElementById('lng').value = position.coords.longitude
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

            $.get({
                url: locAPI,
                success: function(data)
                {
                    data.results[0].address_components.forEach(function(element){
                        // console.log(element.types);
                        if(element.types[0] == 'locality' && element.types[1] == 'political')
                        {
                            console.log('City:')
                            console.log(element.long_name);
                        }
                        if(element.types[0] == 'country' && element.types[1] == 'political')
                        {
                            console.log('Country:')
                            console.log(element.long_name);
                        }
                    });
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


















<body class="h-100">


    <div id="map">

    </div>


    <div>

        <button id="btn"> GET CURRENT LOCATION </button>

    </div>


    <div>
        <p id="pos"> POSITION : </p>
        <p id="lat"> LAT : </p>
        <p id="lng"> LONG : </p>
        {{-- <input type="text" id="lat">
        <input type="text" id="lng"> --}}
    </div>




    <script>
        // $('#btn').click(function(){
    //     if(navigator.geolocation)
    //         navigator.geolocation.getCurrentPosition(function(position){
    //             // console.log(position);

    //             var lat = position.coords.latitude;
    //             var lng = position.coords.longitude;

    //             console.log(position)
    //             console.log(lat)
    //             console.log(lng)

    //         });
    //     else
    //         console.log("Geolocation not supported");

        // alert(navigator.geolocation.getCurrentPosition(getCoor, errorCoor, {maximumAge:60000, timeout:5000, enableHighAccuracy:true}));

        // if (navigator.geolocation) {
        //     var location_timeout = setTimeout("geolocFail()", 10000);

        //     navigator.geolocation.getCurrentPosition(function(position) {
        //         clearTimeout(location_timeout);

        //         var lat = position.coords.latitude;
        //         var lng = position.coords.longitude;

        //         geocodeLatLng(lat, lng);

        //         console.log(lat)
        //         console.log(long)
        //         // console.log()
        //     }, function(error) {
        //         clearTimeout(location_timeout);
        //         geolocFail();
        //     });
        // } else {
        //     // Fallback for no geolocation
        //     geolocFail();
        // }
    // })
    </script>



    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0&callback=initMap">
    </script>


    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    {{-- <script src="{{asset('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/js/deznav-init.js')}}"></script> --}}

    {{-- <script src="{{asset('assets/USER/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/USER/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/USER/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/USER/js/deznav-init.js')}}"></script> --}}

</body>

</html>