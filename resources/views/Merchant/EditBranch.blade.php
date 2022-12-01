@extends('Merchant.layouts.master')

@section('title', 'Edit Branch')
@section('header', 'Edit Branch')

@section('content')


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


    query = document.getElementById('address').value;

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


    var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?address="+query+"&key=AIzaSyC-n4y_PakeAxZrbCGvHOqwmG63JGtsiYM";
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
            document.getElementById('address').value = address;

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



<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">


            <style>
                /* @media screen and (min-width: 1200px) { */
                .class_offers {
                    display: contents;
                }

                .search_offers {
                    float: right;
                    /* background: red !important; */

                }

                /* } */
                @media screen and (max-width: 454px) {
                    .search_offers {
                        width: 100%;
                    }
                }
            </style>

            

            <div class="col-xl-6 col-lg-12">
                <div class="card">

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible alert-alt fade show">
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                    class="mdi mdi-close"></i></span>
                        </button>
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                    @endif
                    
                    <div class="card-header">
                        <h4 class="card-title">Edit Branch</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('EditBranch',['id' => $branch['id']])}}" id="form_target" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Branch Name</label>
                                        <input type="text" class="form-control" required value="{{$branch['name']}}" name="name"
                                            placeholder="Branch Name...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        {{-- <input type="text" class="form-control" required value="{{$branch['address']}}"
                                            name="address" placeholder="Branch Address... "> --}}

                                        <div style="display: -webkit-inline-box; width: 87%;">
                                            <input type="text" style="width: 90%;"  class="form-control" id="address" value="{{$branch['address']}}" name="address" required placeholder="Branch Address... ">
                                            {{-- <button type="button" style="margin-top: 7px;  margin-left:2px;  border-radius: 13px;" class="btn btn-sm btn-info" onclick="findAddress()">Fetch</button> --}}
                                            <button type="button" style="margin-top: 7px;  margin-left:2px;  border-radius: 13px;" class="btn btn-sm btn-info" onclick="fetchBranchInfo()" id="fetch_branch_info">Fetch</button>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <input type="text" class="form-control" required value="{{$branch['country']}}"
                                            name="country"  id="country" placeholder="Country...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" required value="{{$branch['city']}}" name="city" id="city"
                                            placeholder="City...">
                                    </div>

                                    <div class="form-group col-md-6">
                                            
                                        <input type="hidden" class="form-control" id="lat" value="{{$branch['lat']}}" name="lat" required placeholder="lat...">
                                    </div>

                                    <div class="form-group col-md-6">
                                        
                                        <input type="hidden" class="form-control" id="long" value="{{$branch['long']}}" name="long" required placeholder="long...">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Description</label>
                                        <input type="text" class="form-control" required value="{{$branch['description']}}"
                                            name="description" placeholder="Short Description...">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Upload Logo</label>
                                        <input type="file" name="logo" class="form-control">
                                    </div>

                                </div>

                                <div style="    text-align: center;">
                                    <button type="submit" class="btn btn-primary">Update Branch</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $( "#form_target" ).submit(function( event ) {
                    // alert( "Handler for .submit() called." );

                    if(document.getElementById('lat').value == '' || document.getElementById('lat').value == null)
                    {
                        alert('Write Your Branch Address more precisely (LAT).');
                        event.preventDefault();
                        return;
                    }
                    if(document.getElementById('long').value == '' || document.getElementById('lat').value == null)
                    {
                        alert('Write Your Branch Address more precisely (LNG).');
                        event.preventDefault();
                        return;
                    }
                });
            </script>





        </div>


    </div>
</div>




</div>





@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>

{{-- <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-n4y_PakeAxZrbCGvHOqwmG63JGtsiYM&callback=initMap">
</script> --}}

@endsection