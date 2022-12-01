<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registration | SiBuy365</title>



    <link rel="shortcut icon" href="{{asset('assets/images/sibuy.png')}}">
    <!-- Favicon icon -->
    {{--
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet"> --}}

    <!-- Favicon icon -->
    {{--
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}"> --}}

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
            dateFormat: 'dd/mm/yy',
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
    // // Note: This example requires that you consent to location sharing when
    // // prompted by your browser. If you see the error "The Geolocation service
    // // failed.", it means you probably did not give permission for the browser to
    // // locate you.
    // let map, infoWindow;

    // function initMap() {
    // map = new google.maps.Map(document.getElementById("map"), {
    //     center: { lat: -34.397, lng: 150.644 },
    //     zoom: 6,
    // });
    // infoWindow = new google.maps.InfoWindow();

    // // const locationButton = document.createElement("button");
    // const locationButton = document.getElementById("btn");




    // // locationButton.textContent = "Pan to Current Location";
    // locationButton.textContent = "Fetch Location";
    // locationButton.classList.add("custom-map-control-button");
    // map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    // locationButton.addEventListener("click", () => {
    //     // Try HTML5 geolocation.
    //     // console.log('clicked');
    //     if (navigator.geolocation) {
    //     navigator.geolocation.getCurrentPosition(
            
    //         (position) => {
    //         const pos = {
    //             lat: position.coords.latitude,
    //             lng: position.coords.longitude,
    //         };

    //         // alert(position);
    //         // console.log(position);
    //         // console.log(position);
    //         // console.log(position.coords.latitude);
    //         // console.log(position.coords.longitude);
    //         // alert(position);
    //         // alert(position.coords.latitude);
    //         // alert(position.coords.longitude);

    //         // document.getElementById('pos').value = position
    //         document.getElementById('lat').value = position.coords.latitude
    //         document.getElementById('long').value = position.coords.longitude
    //         // document.getElementById('pos').innerHTML = position
    //         // document.getElementById('lat').innerHTML = position.coords.latitude
    //         // document.getElementById('lng').innerHTML = position.coords.longitude

    //         // var locAPI = "http://maps.googleapis.com/maps/geocode/json?latlng="+position.coords.latitude+","+
    //         // position.coords.longitude+"$sensor=true";

    //         // // THIS IS WORKING BUT COORDINATES ARE NOT COORECT
    //         var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+
    //         position.coords.longitude+"&key=AIzaSyC-n4y_PakeAxZrbCGvHOqwmG63JGtsiYM";
    //         console.log(locAPI);

    //         //Testing mobile loc
    //         // var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+31.4532618+","+
    //         // 74.3457784+"&key=AIzaSyC-n4y_PakeAxZrbCGvHOqwmG63JGtsiYM";
    //         // console.log(locAPI);

    //         //RANDOM
    //         // var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+34.4532618+","+
    //         // 72.3457784+"&key=AIzaSyC-n4y_PakeAxZrbCGvHOqwmG63JGtsiYM";
    //         // console.log(locAPI);

    //         // var country;
    //         // var city;
    //         // var address;


    //         $.get({
    //             url: locAPI,
    //             success: function(data)
    //             {
    //                 // console.log(data.results[0].formatted_address);
    //                 address = data.results[0].formatted_address;
    //                 document.getElementById('address').value = address;

    //                 data.results[0].address_components.forEach(function(element){
    //                     // console.log(element.types);
    //                     if(element.types[0] == 'locality' && element.types[1] == 'political')
    //                     {
    //                         // console.log('City:')
    //                         // console.log(element.long_name);
    //                         city = element.long_name;
    //                         document.getElementById('city').value = city
            
    //                         // country
    //                         // city
    //                     }
    //                     if(element.types[0] == 'country' && element.types[1] == 'political')
    //                     {
    //                         // console.log('Country:')
    //                         // console.log(element.long_name);
    //                         country = element.long_name;
    //                         document.getElementById('country').value = country
    //                     }
    //                 });
    //             }
    //         })

    //         // console.log(country);
    //         // console.log(city);
    //         // console.log(address);


    //         infoWindow.setPosition(pos);
    //         infoWindow.setContent("Location found.");
    //         infoWindow.open(map);
    //         map.setCenter(pos);
    //         },
    //         () => {
    //         handleLocationError(true, infoWindow, map.getCenter());
    //         }
    //     );
    //     } else {
    //     // Browser doesn't support Geolocation
    //     handleLocationError(false, infoWindow, map.getCenter());
    //     }
    // });
    // }

    // function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    // infoWindow.setPosition(pos);
    // infoWindow.setContent(
    //     browserHasGeolocation
    //     ? "Error: The Geolocation service failed."
    //     : "Error: Your browser doesn't support geolocation."
    // );
    // infoWindow.open(map);
    // }

    // window.initMap = initMap;

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
                <div class="col-md-9">
                    <div class="">
                        <div class="row n">
                            <div class="col-xl-12">






                                <div id="map">

                                </div>

                                <div style="    text-align: -webkit-center; margin-top:30px;">
                                    {{-- <img src="{{asset('assets/images/logo.png')}}" alt=""> --}}

                                    <a href="{{url('home')}}">
                                        <img src="{{asset('assets/images/sibuy.png')}}" width="50px;" alt="">
                                    </a>
                                    <h2 style="margin-top:10px;"> Hello There! </h2>
                                    <p style="color: #082073;    font-size: 17px;"> SiBuy365 Registration Form - Your
                                        Everyday Deal App</p>
                                </div>


                                @if(Session::has('alert'))
                                <p class="alert alert-danger" style="    text-align-last: center;
                                ">{{ Session::get('alert') }}</p>
                                @endif

                                <div id="error_message">
                                    This is eror
                                </div>
                                <div id="phone_message">
                                    This is eror
                                </div>
                                <style>
                                    #error_message {
                                        display: none;
                                        text-align: center;
                                        border: 2px solid #ffa6a6;
                                        color: #e93939;
                                        padding: 20px;
                                        margin-bottom: 23px;
                                    }
                                    #phone_message {
                                        display: none;
                                        text-align: center;
                                        border: 2px solid #ffa6a6;
                                        color: #e93939;
                                        padding: 20px;
                                        margin-bottom: 23px;
                                    }
                                </style>

                                <form method="POST" id="form_target" enctype="multipart/form-data"
                                    action="{{url('user_registration')}}">
                                    @csrf
                                    <input type="hidden" name="type" value="{{$type}}">

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="text" name="name"
                                            class="form-control"  id="exampleInputEmail1" required
                                            aria-describedby="emailHelp" value="{{old('name')}}" placeholder="Name">
                                    </div>

                                    <div class="form-group" style="display: flex;">

                                        <select class="form-control" id="Ccode"  name="Ccode"
                                            style="width: 25%;text-align: center;" required>
                                            <option value="0">Country Code</option>
                                            <option value="+92">+92</option>
                                            <option value="+91">+91</option>
                                            <option value="+68">+68</option>
                                        </select>


                                        <input style="  width:75%;  text-align-last: center;" type="text"
                                            name="phone_no" class="form-control"  id="phone_no"
                                            aria-describedby="emailHelp" required placeholder="Contact Number">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="email" name="email"
                                            class="form-control" id="email" aria-describedby="emailHelp"
                                            placeholder="E-mail (Optional)">
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="password" class="form-control"
                                             id="password" aria-describedby="emailHelp" name="password" required
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="password" class="form-control"
                                             id="password_confirmation" aria-describedby="emailHelp" required
                                            name="password_confirmation" placeholder="Confirm Password">
                                    </div>

                                    {{-- <div class="form-group">
                                        <input style="text-align-last: center;" class="form-control" 
                                            aria-describedby="emailHelp" id="date_of_birth" name="date_of_birth" required
                                            placeholder="DOB: DD/MM/YYYY" type="text" id="datepicker">
                                    </div> --}}

                                    <div class="form-group">
                                        <input style="text-align-last: center;" class="form-control" 
                                            aria-describedby="emailHelp" id="date_of_birth" name="date_of_birth" required
                                            placeholder="DOB: DD/MM/YYYY" type="date" id="">
                                    </div>


                                    <script>
                                        $("#datepicker").keyup(function(){
                                            var value = document.getElementById('datepicker').value;
                                            var length = document.getElementById('datepicker').value.length;
                                            if(length == 2)
                                            {
                                                document.getElementById('datepicker').value = document.getElementById('datepicker').value + "/";
                                            }
                                            if(length == 5)
                                            {
                                                document.getElementById('datepicker').value = document.getElementById('datepicker').value + "/";
                                            }
                                            if(length >= 10)
                                            {
                                                document.getElementById('datepicker').value = document.getElementById('datepicker').value.substr(0,10);
                                            }
                                        });
                                        
                                    </script>


                                    <div class="form-group" style="text-align: center;">
                                        <label for=""> Gender : </label> <br>
                                        <div style="display: inline;margin: 10px;">
                                            <input type="radio" name="gender" value="male" required> Male
                                        </div>
                                        <div style="display: inline;margin: 10px;">
                                            <input type="radio" name="gender" value="female" required> Female
                                        </div>
                                    </div>

                                    <div class="form-group" style="display: flex;">
                                        <select class="form-control" id="country"  name="country"
                                            style="width: 50%;text-align: center;" required>
                                            <option value="0">Current Country Location</option>
                                            @foreach($countries as $key => $country)
                                            {{-- @if($country['name'] == 'Cambodia')
                                            <option value="{{$country['id']}}" selected>{{$country['name']}}</option>
                                            @else --}}
                                            <option value="{{$country['id']}}">{{$country['name']}}</option>
                                            {{-- @endif --}}
                                            @endforeach
                                        </select>

                                        <select class="form-control" id="city" name="city"
                                            style="width: 50%;text-align: center;" required> 
                                            <option value="0">Your Current Location</option>
                                        </select>
                                    </div>

                                    <script>
                                        $('#country').change(function() {
                                        var country_id = $(this).val();

                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                        
                                        $.ajax({
                                            type: 'POST',
                                            url: `{{ url('getCities') }}`,
                                            data: {
                                              "_token": "{{ csrf_token() }}",
                                              country_id : country_id},
                                            success: function(data) {
                                                jQuery('#city').html(data);
                                            },
                                            error: function (data) {
                                              console.log('Error:', data);
                                              }
                                          });
                        
                                      });
                                    </script>

                                    <div class="form-group">
                                        <select class="form-control" name="language" id="lang"
                                            style="text-align: center;" required>
                                            <option value="0">Language </option>
                                            @foreach($languages as $key => $lang)
                                            <option value="{{$lang['id']}}">{{$lang['name']}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="text" name="reference_code"
                                            class="form-control" id="exampleInpail1" aria-describedby="emailHelp"
                                            placeholder="Referral Code (Optional)">
                                    </div>

                                    <div class="form-group" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary">Sign up!</button>
                                    </div>
                                </form>


                                <script>

                                    // $("#phone_no").keyup(function(){
                                    //     console.log('tap');
                                    //         var phone_no = document.getElementById("phone_no").value;
                                    //         $.ajaxSetup({
                                    //             headers: {
                                    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    //             }
                                    //         });
                                    //         $.ajax({
                                    //             type: 'POST',
                                    //             url: `{{ url('ContactNumberAlreadyTaken') }}`,
                                    //             data: {
                                    //             "_token": "{{ csrf_token() }}",
                                    //             phone_no : phone_no},
                                    //             success: function(data) {
                                    //                 if(data.message == true || data.message == 'true'){
                                    //                     document.body.scrollTop = document.documentElement.scrollTop = 0;
                                    //                     document.getElementById('phone_message').innerHTML = 'Contact Number Already Exist. ';
                                    //                     document.getElementById('phone_message').style.display = 'block';

                                    //                     phone_used = true;

                                    //                     event.preventDefault();  // to stop
                                    //                     return;
                                    //                 }else{
                                    //                     document.getElementById('phone_message').style.display = 'none';
                                    //                 }

                                    //             },
                                    //             error: function (data) {
                                    //             console.log('Error:', data);
                                    //             }
                                    //         });
                                    // });

                                    $( "#form_target" ).submit(function( event ) {

                                        /*
                                            CHECK IF REFERAL CODE IS CORRECT
                                        */

                                        /*
                                            VALIDATION REQUIRD TO CHECK IF CELL NUMBER ALREADY USED
                                        */
                                            // var phone_no = document.getElementById("phone_no").value;
                                            // $.ajaxSetup({
                                            //     headers: {
                                            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            //     }
                                            // });
                                            // $.ajax({
                                            //     type: 'POST',
                                            //     url: `{{ url('ContactNumberAlreadyTaken') }}`,
                                            //     data: {
                                            //     "_token": "{{ csrf_token() }}",
                                            //     phone_no : phone_no},
                                            //     success: function(data) {
                                            //         if(data.message == true || data.message == 'true'){
                                            //             document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            //             document.getElementById('error_message').innerHTML = 'Contact Number Already Exist. ';
                                            //             document.getElementById('error_message').style.display = 'block';
                                            //             event.preventDefault();  // to stop
                                            //             return;
                                            //         }else{
                                            //             // document.getElementById('error_message').style.display = 'none';
                                            //         }

                                            //     },
                                            //     error: function (data) {
                                            //     console.log('Error:', data);
                                            //     }
                                            // });


                                            // function wait(ms){
                                            // var start = new Date().getTime();
                                            // var end = start;
                                            // while(end < start + ms) {
                                            //     end = new Date().getTime();
                                            // }
                                            // }

                                            // console.log('before');
                                            // wait(7000);  //7 seconds in milliseconds
                                            // console.log('after');

                                            // event.preventDefault();  // to stop
                                            // return;
                                            // console.log(document.getElementById("password").value );

                                        // if(phone_used == true)
                                        // {
                                        //     document.body.scrollTop = document.documentElement.scrollTop = 0;
                                        //     // document.getElementById('error_message').innerHTML = 'Password and Confirmation Password Does not match. ';
                                        //     // document.getElementById('error_message').style.display = 'block';
                                        //     event.preventDefault();  // to stop
                                        //     return;
                                        // }

                                        
                                        // console.log(document.getElementById("phone_no").value.length < 6);
                                        // event.preventDefault();  // to stop
                                        //     return;

                                        
                                        var newPassword = document.getElementById('password').value;
                                        var minNumberofChars = 6;
                                        var maxNumberofChars = 16;
                                        var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
                                        // alert(newPassword); 
                                        if(newPassword.length < minNumberofChars || newPassword.length > maxNumberofChars){
                                            // return false;
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'At least 6 alphanumeric characters and contain at least one letter, number, special character';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }
                                        if(!regularExpression.test(newPassword)) {
                                            // alert("Password should be mininum 6 characters and maximum 16 characters. With Mix Characters");

                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            // document.getElementById('error_message').innerHTML = 'Password must contain mix characters : !@#$%^&';
                                            document.getElementById('error_message').innerHTML = 'At least 6 alphanumeric characters and contain at least one letter, number, special characters';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;

                                            // return false;
                                        }

                                        // event.preventDefault();  // to stop
                                        //     return;
                                   
                                        const email = $('#email').val();
                                        var length = email.length;
                                        if(email[length-1] == 'm' && email[length-2] == 'o' && email[length-3] == 'c' && email[length-4] == '.'){
                                            
                                        }else{
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'Email Invalid. ';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }


                                        if(document.getElementById("password").value.length < 6)
                                        {
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'At least 6 alphanumeric characters and contain at least one letter, number, special character';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }

                                        if(document.getElementById("date_of_birth").value.length < 10)
                                        {
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'Invalid Date length';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }

                                        // if(document.getElementById("date_of_birth").value[2] !== '/' || document.getElementById("date_of_birth").value[5] !== '/')
                                        // {
                                        //     document.body.scrollTop = document.documentElement.scrollTop = 0;
                                        //     document.getElementById('error_message').innerHTML = 'Invalid Date "/" not present';
                                        //     document.getElementById('error_message').style.display = 'block';
                                        //     event.preventDefault();  // to stop
                                        //     return;
                                        // }

                                        // console.log(email);
                                        // event.preventDefault();  // to stop
                                        //         return;
                                                

                                        if(document.getElementById("phone_no").value.length < 6)
                                        {
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'Contact Number can not be less than 6 digit. ';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }

                                        if( document.getElementById("password").value !== document.getElementById("password_confirmation").value){
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'Password and Confirmation Password Does not match. ';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }
                                        // password
                                        // password_confirmation

                                        const $select = document.querySelector('#country');
                                        country = $select.value;
                                        if(country == 0 || country == '0')
                                        {
                                            console.log('Country');
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'Select a Country ';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }

                                        const $lang = document.querySelector('#lang');
                                        language = $lang.value;
                                        if(language == 0 || language == '0')
                                        {
                                            console.log('Language');
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'Select a Language ';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }

                                        const $Ccode = document.querySelector('#Ccode');
                                        CCodeVal = $Ccode.value;
                                        if(CCodeVal == 0 || CCodeVal == '0')
                                        {
                                            console.log('Country');
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'Select a Country Code ';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }

                                        const $city = document.querySelector('#city');
                                        city = $city.value;
                                        if(city == 0 || city == '0')
                                        {
                                            console.log('City');
                                            document.body.scrollTop = document.documentElement.scrollTop = 0;
                                            document.getElementById('error_message').innerHTML = 'Select a City ';
                                            document.getElementById('error_message').style.display = 'block';
                                            event.preventDefault();  // to stop
                                            return;
                                        }
                                        
                                    });
                                </script>


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

    {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-n4y_PakeAxZrbCGvHOqwmG63JGtsiYM&callback=initMap">
    </script> --}}


    <!-- Required vendors -->
    <script src="{{asset('assets/USER/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/USER/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/USER/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/USER/js/deznav-init.js')}}"></script>

</body>

</html>