<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    {{-- <title>Gymove - Fitness Bootstrap Admin Dashboard</title> --}}

    
    <title> @yield('title') </title>


    <link href="{{asset('assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/sibuy.png')}}">
    <link rel="stylesheet" href="{{asset('asset/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link 
    href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 

    rel="stylesheet"  type='text/css'>    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Required vendors -->
 
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer=""></script>
    


    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.min.css" integrity="sha512-HPSfJxnyVYJb4v9afT3fXvs0mXvdg/C7eYxBl1EYS7uQHuCU/0lSGhaH9o23Tw8FofBiGQfFWzMYD9TqK8tv/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    {{-- tag input  --}}
    {{-- <link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /> --}}

    
</head>


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

    /* .fa, .far, .fas {
    font-family: Font Awesome\ 5 Free !important;
    } */

    .fa {
    font-family: FontAwesome !important;
    }


</style>


<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            {{-- <a href="index.html" class="brand-logo"> --}}
                {{-- <img class="logo-abbr" src="{{asset('assets/images/logo.png')}}" alt="">
                <img class="logo-compact" src="{{asset('assets/images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{asset('assets/images/logo-text.png')}}" alt=""> --}}
                <a href="{{url('MerchantDashboard')}}" class="brand-logo" >
                    {{-- <img class="logo-abbr" src="{{asset('assets/images/logo.png')}}" alt="">
                    <img class="logo-compact" src="{{asset('assets/images/logo-text.png')}}" alt="">
                    <img class="brand-title" src="{{asset('assets/images/logo-text.png')}}" alt=""> --}}
                    <img class="logo-abbr" src="{{asset('assets/images/sibuy.png')}}" width="40px" alt="">
                    {{-- <img class="logo-compact" src="{{asset('assets/images/logo-text.png')}}" alt=""> --}}
                    {{-- <img class="brand-title" src="{{asset('assets/images/logo-text.png')}}" alt=""> --}}
                </a>
            {{-- </a> --}}

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>