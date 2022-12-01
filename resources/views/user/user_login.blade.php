<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login | SiBuy365</title>
    <meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
<meta content="Themesbrand" name="author"/>
<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('assets/images/sibuy.png')}}">
    <!-- preloader css -->
<link rel="stylesheet" href="{{asset('assets/USER/admin/assets/css/preloader.min.css')}}" type="text/css" />

<!-- Bootstrap Css -->
<link href="{{asset('assets/USER/admin/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{asset('assets/USER/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{asset('assets/USER/admin/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<!--All Vertical Pages-->
 <body>

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
    
    </style>
    
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-4 col-lg-4 col-md-4"></div>
            <div class="col-xxl-4 col-lg-4 col-md-4">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="{{url('home')}}" class="d-block auth-logo">
                                    <img src="assets/images/sibuy.png" alt="" height="28"> <span class="logo-txt">SiBuy365</span>
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Welcome Back !</h5>
                                    <p class="text-muted mt-2">Sign in to continue to SiBuy365.</p>
                                    <p class="text-muted mt-2">Don't have Account? <a href="{{route('register')}}">Register Now</a> </p>
                                </div>

                                @if (session('alert'))
                                <div class="alert alert-danger alert-dismissible alert-alt fade show">
                                    <strong>Message: </strong> {{ session('alert') }}
                                </div>
                                @endif

                                @if(Session::has('success'))
                                <p class="alert alert-success" style="    text-align-last: center;
                                ">{{ Session::get('success') }}</p>
                                @endif


                                <form class="custom-form mt-4 pt-2" action="{{route('user_login')}}" method="post">
                                    @csrf
                                    <div class="mb-3 ">
                                        <label class="form-label" for="Email">Login Credentials:</label>
                                        <input type="text" class="form-control" id="cell_no" placeholder="Phone Number..." name="cell_no">
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="mb-3 ">
                                        <div class="d-flex align-items-start">
                                           
                                        </div>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Enter password" name="password" aria-label="Password" aria-describedby="password-addon">
                                            <button class="btn btn-light ms-0" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="row mb-4">
                                        

                                    </div>
                                    <div class="mb-3">
                                        
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                    <div>
                                        <p style="text-align: center;">Forgot Your Password? 
                                            <a href="{{url('forgotPasswordRequest')}}">Click Here</a> </p>
                                    </div>
                                    <div>
                                        <p style="text-align: center;"> Merchant :
                                            <a href="{{url('/register/merchant')}}"> Login / Signup </a> </p>
                                    </div>
                                </form>

                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">Copyright © <script>
                                    document.write(new Date().getFullYear() + " Sibuy")
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-4 col-lg-4 col-md-4"></div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->

<!-- JAVASCRIPT -->
<script src="{{asset('assets/USER/admin/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/USER/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/USER/admin/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/USER/admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/USER/admin/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/USER/admin/assets/libs/feather-icons/feather.min.js')}}"></script>
<!-- pace js -->
<script src="{{asset('assets/USER/admin/assets/libs/pace-js/pace.min.js')}}"></script><!-- password addon init -->
<script src="{{asset('assets/USER/admin/assets/js/pages/pass-addon.init.js')}}"></script>

</body>

</html>