@extends('Merchant.layouts.master')

@section('title', 'Merchant Settings')
@section('header', 'Settings')

@section('content')


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


            <div class="col-xl-7 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Merchant Settings</h4>
                    </div>
                    @if (session('alert'))
                    <div style="    text-align: -webkit-center; margin-top:2rem;">
                        <div class="alert alert-danger" style="width:60%">
                            <strong>Message: </strong> {{ session('alert') }}
                        </div>
                    </div>
                    @endif

                    @if (session('success'))
                    <div style="    text-align: -webkit-center; margin-top:2rem;">
                        <div class="alert alert-success" style="width:60%">
                            <strong>Message: </strong> {{ session('success') }}
                        </div>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{url('MerchantProfileUpdate')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{session()->get('Authenticated_user_data')['name']}}"
                                            placeholder="Merchant Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone_no"
                                            value="{{session()->get('Authenticated_user_data')['phone']}}"
                                            placeholder="Contact Number">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Merchant Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$profile['userLocations'][0]['address']}}" placeholder="">
                                    </div>


                                    {{--
                                    <link
                                        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                                        rel="stylesheet" />
                                    <script
                                        src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
                                    </script> --}}

                                    <div class="form-group col-md-6">
                                        <label>Business Registration Number</label>
                                        <input type="text" class="form-control" name="registration_number" value="{{$profile['businessDetails'][0]['registration_number']}}" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Business Patent Number</label>
                                        <input type="text" class="form-control" name="patent_number" value="{{$profile['businessDetails'][0]['patent_number']}}" placeholder=""> 
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Business Documents</label>
                                        <input type="file" class="form-control" style="" name="documents[]" multiple>
                                    </div>

                                    <script>
                                        $( function() {
                                          $( "#datepicker" ).datepicker({
                                            // dateFormat: 'mm:dd:yyyy',
                                            changeYear:true,
                                            yearRange: "1960:2020"
                                          });  
                                        } );
                                    </script>



                                    <div class="form-group col-md-6">
                                        <label>Upload Profile Picture</label>
                                        <input type="file" class="form-control" style="" name="profile_picture">
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label>Business Operating Times : </label>
                                        <br>
                                        <br>
                                        <span>Operating Days: </span>
                                        <br>

                                        <select class="businessOperatingHours js-example-basic-multiple form-control" name="operation_days[]"
                                            required multiple="multiple" style="width: 90%;">

                                            @if(in_array("mon", $profile['businessDetails'][0]['operating_days']))
                                            <option value="mon" selected>Monday</option>
                                            @else
                                            <option value="mon">Monday</option>
                                            @endif

                                            @if(in_array("tue", $profile['businessDetails'][0]['operating_days']))
                                            <option value="tue" selected>Tuesday</option>
                                            @else
                                            <option value="tue">Tuesday</option>
                                            @endif

                                            @if(in_array("wed", $profile['businessDetails'][0]['operating_days']))
                                            <option value="wed" selected>Wednesday</option>
                                            @else
                                            <option value="wed">Wednesday</option>
                                            @endif

                                            @if(in_array("thur", $profile['businessDetails'][0]['operating_days']))
                                            <option value="thur" selected>Thursday</option>
                                            @else
                                            <option value="thur">Thursday</option>
                                            @endif

                                            @if(in_array("fri", $profile['businessDetails'][0]['operating_days']))
                                            <option value="fri" selected>Friday</option>
                                            @else
                                            <option value="fri">Friday</option>
                                            @endif

                                            @if(in_array("sat", $profile['businessDetails'][0]['operating_days']))
                                            <option value="sat" selected>Saturday</option>
                                            @else
                                            <option value="sat">Saturday</option>
                                            @endif
                                            
                                            @if(in_array("sun", $profile['businessDetails'][0]['operating_days']))
                                            <option value="sun" selected>Sunday</option>
                                            @else
                                            <option value="sun">Sunday</option>
                                            @endif

                                        </select>


                                        <script>
                                            $(document).ready(function() {
                                                $('.js-example-basic-multiple').select2({
                                                width: '100%',
                                                placeholder: "Select Business Operating Days",
                                                allowClear: true
                                                });
                                            });
                                        </script>
                                        <br>
                                        <br>

                                        <span>Operating Hours: </span>
                                        <br>

                                        <span>From : </span>
                                        <input type="time" value="{{$profile['businessDetails'][0]['opening_time']}}" id="appt" name="opening_time" style="    padding: 4px; width: 42%;">
                                        <span>To : </span>
                                        <input type="time" value="{{$profile['businessDetails'][0]['closing_time']}}" id="appt" name="closing_time" style="    padding: 4px;width: 42%;">

                                    </div>



                                </div>

                                <div style="    text-align: center;">
                                    <button type="submit" class="btn btn-primary">Apply Changes</button>
                                </div>
                            </form>

                            <div class="basic-form">
                                <form method="POST" action="{{url('UpdatePassword')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <h3>Change Password</h3>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" name="old_password"
                                                placeholder="**********">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="**********">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="**********">
                                        </div>


                                    </div>

                                    <div style="    text-align: center;">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





            </div>


        </div>
    </div>




</div>





@endsection

@section('scripts')
<script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/plugins-init/sparkline-init.js')}}"></script>




@endsection