<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registration</title>
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
    {{-- gigi icon  --}}
    <link rel="icon" type="image/png" href="{{asset('assets/USER/img/icons/128.png')}}" />

    <link rel="stylesheet" href="{{asset('asset/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

        


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


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</head>



<script src="https://cdnjs.cloudflare.com/ajax/libs/geocomplete/1.7.0/jquery.geocomplete.min.js"
    integrity="sha512-4bp4fE4hv0i/1jLM7d+gXDaCAhnXXfGBKdHrBcpGBgnz7OlFMjUgVH4kwB85YdumZrZyryaTLnqGKlbmBatCpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<script>

        let map, infoWindow;

        function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 6,
        });
        infoWindow = new google.maps.InfoWindow();
        }
    // $("#fetch_branch_info").click(function(){
    //     alert("The paragraph was clicked.");
    // });

    function fetchBranchInfo()
    {
        // alert("The paragraph was clicked.");

    
        query = document.getElementById('branchAddress').value;

        if(query == '' || query == null)
        {
            alert('Write Your Branch Address, Then click on Fetch to AutoComplete Your Remaining Details.');
            return;
        }


        console.log(query);
        
        // console.log(document.getElementById('branchAddress'));
        // console.log(document.getElementById('city'));
        // console.log(document.getElementById('country'));
        // console.log(document.getElementById('lat'));
        // console.log(document.getElementById('long'));


        var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?address="+query+"&key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0";
        console.log(locAPI);

        $.get({
            url: locAPI,
            success: function(data)
            {

                if(data.status == 'ZERO_RESULTS')
                {
                    alert('Write Your Branch Address more precisely.');
                    return;
                }


                console.log(data);
                address = data.results[0].formatted_address;
                document.getElementById('branchAddress').value = address;

                // console.log(data.results[0].geomertry);

                document.getElementById('lat').value = data.results[0].geometry.location.lat
                document.getElementById('long').value = data.results[0].geometry.location.lng

                if(document.getElementById('lat').value == '' || document.getElementById('lat').value == null)
                {
                    alert('Write Your Branch Address more precisely.');
                    return;
                }
                if(document.getElementById('long').value == '' || document.getElementById('lat').value == null)
                {
                    alert('Write Your Branch Address more precisely.');
                    return;
                }


                // console.log(address);
                data.results[0].address_components.forEach(function(element){
                    // console.log(element.types);
                    if(element.types[0] == 'locality' && element.types[1] == 'political')
                    {
                        // console.log('City:')
                        // console.log(element.long_name);
                        city = element.long_name;
                        document.getElementById('city').value = city;
        
                        // country
                        // city
                    }
                    if(element.types[0] == 'country' && element.types[1] == 'political')
                    {
                        console.log('Country:')
                        console.log(element.long_name);
                        country = element.long_name;
                        document.getElementById('country').value = country;
                    }
                });
            }
        })

    }
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
                                <div style="    text-align: -webkit-center; margin-top: 31px;">
                                    {{-- <img src="{{asset('assets/images/logo.png')}}"  alt=""> --}}
                                    <a href="{{url('home')}}">
                                        <img src="{{asset('assets/USER/img/icons/128.png')}}" alt="" width="60px;">
                                    </a>
                                    <h2 style="margin-top:10px;" > Hi Business!</h2>
                                    <p style="color: #082073; margin-bottom: -2px !important;font-size: 17px;"> Please Register to Get more Customers on GiGi </p>
                                    <p style="color: #0909db !important;font-size: 17px;"> <a style="color:#0909db" href="{{url('/login')}}">Already have Account?</a> </p>

                                    
                                    @if (session('alert'))
                                    <div class="alert alert-danger">
                                        <strong>Welcome!</strong> {{ session('alert') }}
                                        {{-- Welcome! Your account has registered successfully.  --}}
                                    </div>
                                    @endif

                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        <strong>Welcome!</strong> {{ session('success') }}
                                        {{-- Welcome! Your account has registered successfully.  --}}
                                    </div>
                                    @endif


                                    <div id="map">

                                    </div>

                                </div>
                                <form method="POST" action="{{url('register_merchant')}}" enctype="multipart/form-data" id="form_target">
                                    @csrf
                                    <input type="hidden" name="type" value="{{$type}}">

                                    {{-- <div class="form-group">
                                        <h3 style="text-align: center;"> Personal Information </h3>
                                    </div> --}}

                                    <div class="form-group" style="border: 1px solid #ccc;
                                    border-radius: 16px;
                                    background: white;
                                    padding: 8px;
                                    text-align: center;" > 

                                        <label for="inputTag1" style="margin-top: 9px;">
                                            Select Profile Image
                                            <input id="inputTag1" class="imageRS" name="profile_picture" onchange="loadFile(event)" type="file"/>
                                            {{-- <br>  --}}
                                            <p id="profile_pic_name" style="margin-bottom: 0;">  </p>
                                            {{-- <img id="blah" src="#" width="50px" alt="your image" /> --}}
                                        </label>

                                        <script>
                                            inputTag1.onchange = evt => {
                                            const [file] = inputTag1.files
                                            if (file) {
                                                console.log(file.name);
                                                document.getElementById('profile_pic_name').innerHTML = file.name;
                                                // blah.src = URL.createObjectURL(file)
                                            }
                                            }
                                        </script>
                                        
                                        <script>
                                            function loadFile(e)
                                            {
                                                // alert(1);
                                                console.log(e.target);
                                                // e.target.style.border = '10px solid #ccc';
                                                $("#inputTag1").css({"background": "yellow", "font-size": "200%"});
                                                $(".imageRS").css({"background": "yellow", "font-size": "200%"});

                                                // var ok = 1;
                                                // document.getElementById('inputTag1').style.font-weight = '700';
                                                // document.getElementById('inputTag1').style.border = '2px solid #ccc';
                                            }
                                        </script>

                                        <style>
                                            #inputTag1{
                                                display: none;
                                            }
                                            label{
                                                cursor: pointer;
                                            }
                                        </style>
                                    </div>


                                    <div class="form-group">
                                        <input style="text-align-last: center;" name="name" type="text" class="form-control" id="name"
                                            aria-describedby="emailHelp" placeholder="Business Name">
                                    </div>
                                    
                                   
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" name="website" type="text" class="form-control" id="website"
                                            aria-describedby="emailHelp" placeholder="Website (Optional)">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="phone_no" type="text" class="form-control" id="contact"
                                            aria-describedby="emailHelp" placeholder="Owner / Manager Contact Number">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="email" type="text" class="form-control" id="email"
                                            aria-describedby="emailHelp" placeholder="Business E-mail">
                                    </div>

                                    <style>
                                        .select2-selection{
                                            text-align-last: center !important;
                                            
                                        }

                                        .select2-selection--multiple{
                                            padding: 11px !important;
                                            border: 1px solid #ccc !important;
                                            border-radius: 17px !important;
                                        }
                                        /* padding: 11px;
                                        border: 1px solid #ccc;
                                        border-radius: 17px; */
                                    </style>

                                    <script>
                                        $(document).ready(function() {
                                            $('.js-example-basic-multiple').select2({
                                              width: '100%',
                                              placeholder: "Select Categories",
                                              allowClear: true
                                            });
                                        });
                                    </script>

                                
                                    <div class="form-group">
                                        <select class="form-control js-example-basic-multiple" name="cats[]" multiple="multiple">
                                          {{-- <option value="">Select An Option</option> --}}
                                          @foreach ($categories as $cat)

                                          @if($cat['parent_id'] == 0)
                                          <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                                          @endif

                                          @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="password" type="password" class="form-control" id="pass"
                                            aria-describedby="emailHelp" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="password_confirmation" type="password" class="form-control" id="passC"
                                            aria-describedby="emailHelp" placeholder="Confirm Password">
                                    </div>

                                    {{-- <div class="form-group"> 
                                        <input  style="    text-align-last: center;" required class="form-control"
                                       aria-describedby="emailHelp" name="date_of_birth" placeholder="DOB: MM/DD/YYYY"
                                       type="text" id="datepicker">
                                    </div> --}}


                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="branch_name" type="text" class="form-control" id="branchname"
                                            aria-describedby="emailHelp" placeholder="Shop / Outlet / Branch">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="description" type="text" class="form-control" id="branchDescription"
                                            aria-describedby="emailHelp" placeholder="Branch Description">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="address" type="text" class="form-control" id="branchAddress"
                                            aria-describedby="emailHelp" placeholder="Branch Address ">
                                        <div style="text-align: center;
                                        margin-top: 12px;">
                                            <button class="btn btn-sm btn-warning" type="button" onclick="fetchBranchInfo()" id="fetch_branch_info">Fetch Branch Address</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="country" type="text" class="form-control" id="country"
                                            aria-describedby="emailHelp" placeholder="Country">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="city" type="text" class="form-control" id="city"
                                            aria-describedby="emailHelp" placeholder="City">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="lat" type="hidden" class="form-control" id="lat"
                                            aria-describedby="emailHelp" placeholder="lat">
                                    </div>

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" required name="long" type="hidden" class="form-control" id="long"
                                            aria-describedby="emailHelp" placeholder="long">
                                    </div>


                                    <div class="form-group" style="border: 1px solid #ccc;
                                    border-radius: 16px;
                                    background: white;
                                    padding: 8px;
                                    text-align: center;" > 

                                        <label for="inputTag" style="margin-top: 9px;">
                                            Select Branch Logo
                                            <input id="inputTag" name="logo" type="file"/>
                                            <p id="image_name" style="margin-bottom: 0;">  </p>
                                        </label>

                                        <style>
                                            #inputTag{
                                                display: none;
                                            }
                                            label{
                                                cursor: pointer;
                                            }
                                        </style>
                                    </div>

                                    
                                            <script>
                                            inputTag.onchange = evt => {
                                            const [file] = inputTag.files
                                            if (file) {
                                                console.log(file.name);
                                                document.getElementById('image_name').innerHTML = file.name;
                                                // blah.src = URL.createObjectURL(file)
                                            }
                                            }
                                        </script>


                                    <div class="form-group" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                    </div>

                                </form>


                                <script>
                                    $( "#form_target" ).submit(function( event ) {
                                        // alert( "Handler for .submit() called." );

                                        if(document.getElementById('lat').value == '' || document.getElementById('lat').value == null)
                                        {
                                            alert('Write Your Branch Address more precisely.');
                                            event.preventDefault();
                                            return;
                                        }
                                        if(document.getElementById('long').value == '' || document.getElementById('lat').value == null)
                                        {
                                            alert('Write Your Branch Address more precisely.');
                                            event.preventDefault();
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
    <!-- Required vendors -->
    {{-- <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script> --}}

    {{-- <script src="{{asset("assets/vendor/global/global.min.js")}}"></script>
    <script src="{{asset("assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js")}}"></script> --}}
    <script src="{{asset("assets/js/custom.min.js")}}"></script>
    <script src="{{asset("assets/js/deznav-init.js")}}"></script>

    <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbFOBJYJrSGajJcEs9qkLS_woaNxpY8R0&callback=initMap">
</script>


    {{-- <script src="{{asset('assets/USER/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets/USER/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/USER/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/USER/js/deznav-init.js')}}"></script> --}}

</body>

</html>