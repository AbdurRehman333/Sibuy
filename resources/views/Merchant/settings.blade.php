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
                                        <input type="text" class="form-control" name="name" value="{{session()->get('Authenticated_user_data')['name']}}" placeholder="Merchant Name">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" name="phone_no" value="{{session()->get('Authenticated_user_data')['phone']}}" placeholder="Contact Number">
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

                                    {{-- <div class="form-group col-md-6">
                                        <label>Date of Join</label>
                                        <input type="text" id="datepicker" class="form-control" name="date_of_birth" value="{{session()->get('Authenticated_user_data')['date_of_birth']}}" placeholder="Date of Join">
                                    </div> --}}

                                    <div class="form-group col-md-6">
                                        <label>Upload Profile Picture</label>
                                        <input type="file" class="form-control" style="" name="profile_picture">
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
                                            <input type="password" class="form-control" name="old_password" placeholder="**********">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="**********">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="**********">
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