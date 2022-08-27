<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
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

    <meta property="og:image" content="{{asset('assets/USER/img/icons/128.png')}}" />
    <link rel="icon" href="{{asset('assets/USER/img/icons/128.png')}}" />

    <link rel="stylesheet" href="{{asset('asset/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>


<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="">
                        <div class="row n">
                            <div class="col-xl-12">
                                <div style="    text-align: -webkit-center;">
                                    {{-- <img src="{{asset('assets/images/logo.png')}}" alt=""> --}}
                                    <img src="{{asset('assets/USER/img/icons/128.png')}}" alt="" width="60px;">


                                    @if($type == 2)
                                    <h2 style="margin-top:10px;"> Hi Business!</h2>
                                    @elseif($type == 1)
                                    <h2 style="margin-top:10px;"> Hi User!</h2>
                                    @endif
                                    <p style="color: #082073;    font-size: 17px; margin-bottom:-2px;"> Please Enter
                                        Your Credentials </p>
                                    <p style="color: #082073;  font-size: 17px;"> <a style="color: #0909db;"
                                            href="{{url('/register/merchant')}}">No Account? Register a new Account</a>
                                    </p>
                                    <h1>{{session('key')}}</h1>

                                </div>

                                @if (session('alert'))
                                <div class="alert alert-danger" style="    text-align: center;
                                ">
                                    <strong>Account not verified!</strong> {{ session('alert') }}
                                    {{-- Welcome! Your account has registered successfully. --}}
                                </div>
                                @endif

                                @if (session('success'))
                                <div class="alert alert-success" style="    text-align: center;
                                ">
                                    <strong>Welcome!</strong> {{ session('success') }}
                                    {{-- Welcome! Your account has registered successfully. --}}
                                </div>
                                @endif


                                <form method="POST" action="{{url('MobileChatLoginConfirm')}}">
                                    @csrf
                                    <input type="hidden" name="type" value="{{$type}}">

                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="text" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                            placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input style="    text-align-last: center;" type="password" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" name="password"
                                            placeholder="Password" required>
                                    </div>


                                    <div class="form-group" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary">Proceed</button>
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
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/deznav-init.js"></script>

</body>

</html>