<!doctype html>
<html lang="en-US" data-hy-language="en" data-hy-locale="us" data-hy-locale-default="us">

<head>
    <!-- 361|JjIauoRLRHpWvf9pMAXEBgsJalPuki9YNkDxrurL -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>GiGi</title>
    <link rel="canonical" href="index.html" />
    <link rel="alternate" hreflang="en-US" href="index.html" />
    <link rel="alternate" href="index.html" hreflang="x-default" />
    <meta property="og:image" content="{{asset('assets/USER/img/icons/128.png')}}" />
    <link rel="icon" href="{{asset('assets/USER/img/icons/128.png')}}" />
    <link href="{{asset('assets/USER/admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" type="{{asset('assets/USER/image/png')}}" href="{{asset('assets/USER/img/icons/128.png')}}" />
    <script src="{{asset('assets/USER/vendor/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript">
        const language = 'en';
        const ATHOM_API_CLIENT_ID = '5d6e8db64b342d0c3ff3fd09';
        const ATHOM_API_CLIENT_SECRET = 'bb54c17e3d1ea206bfee8e42d038e1da9c0ad96e';
        const ATHOM_API_REDIRECT_URI = 'https://homey.app/oauth2/callback';
        const ATHOM_APPS_API_URL = 'https://apps-api.athom.com/api/v1';
        const ATHOM_STORE_API_URL = 'https://store-api.athom.com/api';
        const HOMEY_STORE_URL = 'https://homey.app/en-us/store/';
        const HOMEY_STORE_SUCCESS_URL = 'https://homey.app/en-us/store/checkout-success/';
        const HOMEY_PRODUCT_URL = 'https://homey.app/en-us/store/product/SKU/';
        const I18N = {};

        function _t(input, opts) {
            if (typeof input !== 'string') return input;
            if (I18N[input]) return (() => {
                let out = I18N[input];
                opts && Object.keys(opts).forEach(key => {
                    const value = opts[key];
                    out = out.replace(`[[${key}]]`, value);
                });
                return out;
            })();
            return undefined;
        }

        function _p(input, opts) {
            return _t(`pages.home.${input}`, opts);
        }
        /**
         * Objects translations
         * @description returns translation from given language object ( {'en': 'text','nl':'tekst'} );
         * @param input
         * @returns {string|*}
         * @private
         */
        function _i(input) {
            if (typeof input === 'string') return input;
            if (input === null) return null;
            if (typeof input === 'object' && input[language]) return input[language];
            if (typeof input === 'object' && input['en']) return input['en'];
            if (typeof input === 'object' && !input['en']) return '';
            return input;
        }
    </script>
    <!--Load global CSS and JS -->
    <link rel="preload" as="font" type="font/woff2" href="fonts/roboto-v29-latin_cyrillic-regular.woff2" crossorigin="anonymous" />
    <link rel="preload" as="font" type="font/woff2" href="fonts/roboto-v29-latin_cyrillic-500.woff2" crossorigin="anonymous" />
    <link rel="preload" as="font" type="font/woff2" href="fonts/roboto-v29-latin_cyrillic-700.woff2" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/core.css')}}" />
    <!--Load page specific CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/USER/css/pages/home.css')}}" />
    <!-- Load icon font -->
    <link rel="preload" type="font/woff2" href="{{asset('assets/USER/fonts/icons.woff2')}}" as="font" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'icons';
            /* src: url("fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff2"), url("/fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4") format("woff"); */
            src: url("{{asset('assets/USER/fonts/icons.woff2?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff2"),
            url("{{asset('assets/USER//fonts/icons.woff?a58b3a96-189b-4e91-87c0-20f2028401f4')}}") format("woff");
        }
    </style>
    <!--PreLoad page specific JS -->
    <link rel="preload" as="script" href="{{asset('assets/USER/js/main.js')}}"> 
    <script src="{{asset('js/app.js')}}"></script>{{--
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script> --}}



    <style>
@font-face {
            font-family: ceralight;
            src: url({{asset('assets/fonts/Cera-Light.woff2')
        }
    }
    );
}
@font-face {
    font-family: ceraMedium;
    src: url({{asset('assets/fonts/Cera-Medium.woff2')
}

}
);

}
@font-face {
    font-family: ceraBold;
    src: url({{asset('assets/fonts/Cera-Bold.woff2')
}

}
);

}
* {
    font-family: ceraMedium !important;
}
b {
    font-family: ceraBold !important;
}
h1 {
    font-family: ceraBold !important;
}
.fa,
.far,
.fas {
    font-family: Font Awesome\ 5 Free !important;
}
    </style>


    <!-- Favicon icon -->

    {{--
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"> --}}





    <input type="hidden" id="token" value="{{$token}}">
    <input type="hidden" id="id" value="{{$id}}">

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // token = document.getElemenById('token');
        var token = $('#token').val();
        var id = $('#id').val();
        // alert(token);

        // Enable pusher logging - don't include this in production
        //Pusher.logToConsole = true;


        var pusher = new Pusher('814fe1b741785e7ace5e', {
            cluster: 'ap2',
            channelAuthorization: {
                endpoint: "https://gigiapi.zanforthstaging.com/api/channelAuthorization",
                headers: {
                    "Authorization": 'Bearer 361|JjIauoRLRHpWvf9pMAXEBgsJalPuki9YNkDxrurL'
                }
                //   headers: { "Authorization": `Bearer ${token}`}
            },
            userAuthentication: {
                endpoint: "https://gigiapi.zanforthstaging.com/api/channelAuthorization",
                headers: {
                    "Authorization": 'Bearer 361|JjIauoRLRHpWvf9pMAXEBgsJalPuki9YNkDxrurL'
                }
                //   headers: { "Authorization": `Bearer ${token}`}
            }
        });

        var channel = pusher.subscribe('private-messages-channel.4');
        channel.bind('message.created', function(data) {
            console.log(data);
            alert(data);
            //alert(JSON.stringify(data));
        });
    </script>






</head>

<body style="padding: 0em;">
    <div class="website">


        @include('user.layouts.header') {{-- <button id="toggle" class="btn btn-info">Toggle</button> --}}

        <div id="container" style="margin-top: 20vh;margin-bottom:20vh;">



            <aside class="aside_class">
                <header>
                    {{-- <input type="text" placeholder="search"> --}}
                    <div class="div_of_button_convo_header">
                        <h2 style="color: white" class="conversation_title">Conversations</h2>
                        <button style="color: white" class="toggle_button_to_msgbox"> <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </button>
                    </div>
                </header>
                <ul class="ul_chatList" style="">


                    @foreach ($conversations as $c)

                    <li class="convo_list_item" data-id="{{$c['id']}}">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
                        <div>
                            <h2>{{$c['opposite_user']['name']}}</h2>
                            <h3>
                                {{-- <span class="status orange"></span> --}} Hey there I wa.....
                            </h3>
                        </div>
                    </li>

                    {{--
                    <div id="div_for_list">
                        Helllooo
                    </div> --}} @endforeach




                </ul>
            </aside>
            <main class="main_class" id="main_class_to_manipulate">
                <header id="header_chatbox">


                    <div style="margin:0; margin-left: -25px; margin-right: 13px;">
                        <button style="color: rgb(0, 0, 0)" class="toggle_button_to_msgbox"> 
                            <i class="fa fa-arrow-circle-left" style="font-size:24px"></i>
                         </button>
                    </div>

                    {{--
                    <div> --}}

                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" style="width:50px;" width="50px" alt=""> {{-- </div> --}}

                    <div class="intro_div">
                        <h2>Chat with Vincent Porter</h2>
                        <h3>already 1902 messages</h3>
                    </div>

                </header>

                <ul id="chat" style="display: flex;
                    flex-direction: column-reverse;">

                    <li class="me">
                        <div class="entete">
                            <h3>10:12AM, Today</h3>
                            <h2>Vincent</h2>
                            <span class="status blue"></span>
                        </div>
                        <div class="message">
                            OK
                        </div>
                    </li>
                    <li class="you">
                        <div class="entete">
                            <span class="status green"></span>
                            <h2>Vincent</h2>
                            <h3>10:12AM, Today</h3>
                        </div>
                        <div class="message">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        </div>
                    </li>

                </ul>
                <footer>
                    <form id="message_form">
                        @csrf
                        <textarea placeholder="Type your message"></textarea>
                        <div style="text-align: center;">


                            <button class="btn btn-primary" type="button">Send</button>
                        </div>
                    </form>
                </footer>
            </main>
        </div>

        <div>
            <input type="text" id="my_id_from_session" value="{{session('Authenticated_user_data')['id']}}">


            <input type="text" id="new_convo">
            <input type="text" id="new_rec">
            <input type="text" id="new_my_id">
        </div>
        {{-- background-color: #5e616a; --}} {{-- $(".aside_class").css("display", "none"); $(".main_class").css("display", "block"); --}}

        <script src="{{asset('js/app.js')}}"></script>

        <script>
            // var convo_id_loaded = 0;
            // var receiver_id_loaded = 0;
            $(".convo_list_item").click(function(e) {
                id = $(this).attr("data-id");


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var id = $(this).attr("data-id");
                // console.log(id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('loadConvo') }}",
                    data: {
                        convo_id: id
                    },
                    dataType: 'html',
                    success: function(data) {
                        // alert(data);
                        $("#main_class_to_manipulate").empty();
                        $('#main_class_to_manipulate').html(data);

                        var convo_id_loaded = document.getElementById('convo_id').value;
                        var receiver_id_loaded = document.getElementById('rec_id').value;
                        var my_id_loaded = document.getElementById('my_id').value;
                        // console.log(my_id);
                        // var message_loaded = document.getElementById('message').value;
                        // alert(message_loaded);
                        // console.log(convo_id_loaded);
                        // new_convo
                        // new_rec

                        var element = document.getElementById('new_convo');
                        element.value = convo_id_loaded;
                        var element = document.getElementById('new_rec');
                        element.value = receiver_id_loaded;

                        var element = document.getElementById('new_my_id');
                        // console.log(element);
                        element.value = my_id_loaded;

                        // var element = document.getElementById('message');
                        // element.value = receiver_id_loaded;


                        // const message_form = document.getElementById('message_form_loaded');
                        // console.log(convo_id_loaded.value);
                        // console.log(message_form);
                    }
                });
            });
        </script>

        <script>
            convo_id_loaded_for_listen = 0;
            my_id_loaded_for_listen = 0;

            var element = document.getElementById('my_id_from_session');
            my_id_from_session = element.value;
            // console.log(my_id_from_session);
            // 

            $(document).on('click', '.send_button', function() {

                var element = document.getElementById('new_convo');
                convo_id_loaded = element.value;
                var element = document.getElementById('new_rec');
                receiver_id_loaded = element.value;

                var element = document.getElementById('new_my_id');
                my_id_loaded = element.value;

                convo_id_loaded_for_listen = convo_id_loaded;
                my_id_loaded_for_listen = my_id_loaded;
                // console.log(my_id_loaded_for_list);
                // console.log(receiver_id_loaded);
                // console.log('CLICKED!!');
                var element = document.getElementById('message');
                message = element.value;


                const options = {
                    method: 'post',
                    url: '/send_message_to_convo',
                    data: {
                        convo_id: convo_id_loaded,
                        receiver_id: receiver_id_loaded,
                        sender_id: my_id_from_session,
                        message: message
                    }
                };
                try {
                    axios(options);
                } catch (error) {
                    console.error(error); // NOTE - use "error.response.data` (not "error")
                }



                // Pusher.logToConsole = true;
                // window.Laravel = {'csrfToken': '{{csrf_token()}}'}


                // Echo.private(`chat`)
                // .listen('.SendMessage', (e) => {
                //     alert(e);
                //     console.log(e);
                //     console.log(my_id_from_session);
                //     // messages.innerHTML += "<p style='margin: 0;'> <strong> " + e.sender_name + "</strong> : " + e.message + "</p> ";
                // });


                // with params
                // Echo.private(`private-chat.${my_id_from_session}`)
                // .listen('.SendMessage', (e) => {
                //     console.log(e);
                //     console.log(my_id_from_session);
                //     alert(e);
                //     // messages.innerHTML += "<p style='margin: 0;'> <strong> " + e.sender_name + "</strong> : " + e.message + "</p> ";
                // });

                // Echo.private(`private-chat.${convo_id_loaded_for_listen}`)
                // .listen('.SendMessage', (e) => {
                //     console.log(e);
                //     console.log(convo_id_loaded_for_listen);
                //     alert(e);
                //     // messages.innerHTML += "<p style='margin: 0;'> <strong> " + e.sender_name + "</strong> : " + e.message + "</p> ";
                // });


            });

            // message_form.addEventListener('submit', function(e) {
            //     alert(1);
            //     e.preventDefault();

            //     const convo_id = document.getElementById('convo_id');
            //     const receiver_id = document.getElementById('rec_id');

            //     console.log(convo_id_loaded);
            //     console.log(receiver_id_loaded);

            //     let has_errors = false;

            //     if (receiver_id.value == '') {
            //         alert('Enter receiver_id');
            //         has_errors = true;
            //     }
            //     if (sender_id.value == '') {
            //         alert('Enter sender_id');
            //         has_errors = true;
            //     }
            //     if (message_input.value == '') {
            //         alert('Enter Message');
            //         has_errors = true;
            //     }

            //     if (has_errors) {
            //         return;
            //     }
            //     // alert(2);
            //     const options = {
            //         method: 'post',
            //         url: '/send-convo-msg',
            //         data: {
            //             convo_id : convo_id.value,
            //             receiver_id: receiver_id.value,
            //             sender_id: sender_id.value,
            //             message: message_input.value
            //         }
            //     };


            //     try {
            //         axios(options);
            //     } catch (error) {
            //         console.error(error.response.data); // NOTE - use "error.response.data` (not "error")
            //     }


            // });


            // Pusher.logToConsole = true;
            // window.Laravel = {'csrfToken': '{{csrf_token()}}'}


            // with params
            // Echo.private(`private-chat.${convo_id.value}`)
            // .listen('.PrivateMessageEvent', (e) => {
            //     console.log(e);
            //     messages.innerHTML += "<p style='margin: 0;'> <strong> " + e.sender_name + "</strong> : " + e.message + "</p> ";
            // });
        </script>

        <script>
            $(".convo_list_item").click(function(e) {

                id = $(this).attr("data-id");
                var collection = document.getElementsByClassName("convo_list_item");

                for (var i = 0; i < collection.length; i++) {
                    element = collection[i];

                    if (parseInt($(element).attr("data-id")) == parseInt(id)) {
                        // console.log(element);
                        // background-color: #5e616a;
                        $(element).css("background-color", "#5e616a");
                    } else {
                        // background: #3B3E49;
                        $(element).css("background-color", "#3B3E49");
                    }

                }


            });
        </script>


        <style>
            .toggle_button_to_msgbox {
                display: none;
            }
            
            @media screen and (max-width: 767px) {
                #header_chatbox {
                    /* display: table-row-group; */
                    width: 162%;
                }
                #container {
                    width: 100% !important;
                }
                .aside_class {
                    width: 100% !important;
                    text-align: center;
                    display: block;
                }
                .main_class {
                    width: 100%;
                    display: none;
                }
                .div_of_button_convo_header {
                    display: block;
                }
                .toggle_button_to_msgbox {
                    margin-top: 7px;
                    display: block;
                    color: white;
                    display: inline;
                    float: right;
                }
                .conversation_title {
                    color: white;
                    display: inline;
                    /* display: -webkit-inline-box; */
                }
            }
            
            @media screen and (max-width: 326px) {
                #header_chatbox {
                    /* display: table-row-group; */
                    width: 162%;
                    margin-bottom: 30px;
                }
                .intro_div {
                    margin-top: 9px;
                }
                #container {
                    width: 100% !important;
                }
                .aside_class {
                    width: 100% !important;
                    text-align: center;
                    display: block;
                }
                .main_class {
                    width: 100%;
                    display: none;
                }
            }
            
            @media screen and (max-width: 414px) {
                .send_icon {
                    margin-left: 250px;
                }
                main footer {
                    height: 155px;
                    padding: 0px !important;
                }
            }
            
            @media screen and (max-width: 300px) {
                .send_icon {
                    margin-left: 200px;
                }
                /* main footer {
                height: 155px;
                padding: 0px !important;
                } */
            }
        </style>


        <script>
            value = true;
            $(".toggle_button_to_msgbox").click(function() {
                // alert("The paragraph was clicked.");
                if (value) {
                    $(".aside_class").css("display", "none");
                    $(".main_class").css("display", "block");
                    value = false;
                } else {
                    $(".main_class").css("display", "none");
                    $(".aside_class").css("display", "block");
                    value = true;
                }


            });
        </script>



        {{-- chat style --}}
        <style>
            * {
                box-sizing: border-box;
            }
            
            .website {
                /* background-color: #abd9e9; */
                font-family: Arial;
            }
            
            body {
                /* background-color: #abd9e9; */
                font-family: Arial;
            }
            
            #container {
                width: 750px;
                height: 800px;
                background: #eff3f7;
                margin: 0 auto;
                font-size: 0;
                border-radius: 5px;
                overflow: hidden;
            }
            
            aside {
                width: 260px;
                height: 800px;
                background-color: #3b3e49;
                display: inline-block;
                font-size: 15px;
                vertical-align: top;
            }
            
            main {
                width: 490px;
                /* height: 800px; */
                display: inline-block;
                font-size: 15px;
                vertical-align: top;
            }
            
            aside header {
                padding: 30px 20px;
            }
            
            aside input {
                width: 100%;
                height: 50px;
                line-height: 50px;
                padding: 0 50px 0 20px;
                background-color: #5e616a;
                border: none;
                border-radius: 3px;
                color: #fff;
                background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
                background-repeat: no-repeat;
                background-position: 170px;
                background-size: 40px;
            }
            
            aside input::placeholder {
                color: #fff;
            }
            
            aside ul {
                padding-left: 0;
                margin: 0;
                list-style-type: none;
                overflow-y: scroll;
                height: 690px;
            }
            
            aside li {
                padding: 10px 0;
            }
            
            aside li:hover {
                background-color: #5e616a;
            }
            
            h2,
            h3 {
                margin: 0;
            }
            
            aside li img {
                border-radius: 50%;
                margin-left: 20px;
                margin-right: 8px;
            }
            
            aside li div {
                display: inline-block;
                vertical-align: top;
                margin-top: 12px;
            }
            
            aside li h2 {
                font-size: 14px;
                color: #fff;
                font-weight: normal;
                margin-bottom: 5px;
            }
            
            aside li h3 {
                font-size: 12px;
                color: #7e818a;
                font-weight: normal;
            }
            
            .status {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                display: inline-block;
                margin-right: 7px;
            }
            
            .green {
                background-color: #58b666;
            }
            
            .orange {
                background-color: #ff725d;
            }
            
            .blue {
                background-color: #6fbced;
                margin-right: 0;
                margin-left: 7px;
            }
            
            main header {
                height: 110px;
                padding: 30px 20px 30px 40px;
            }
            
            main header>* {
                display: inline-block;
                vertical-align: top;
            }
            
            main header img:first-child {
                border-radius: 50%;
            }
            
            main header img:last-child {
                width: 24px;
                margin-top: 8px;
            }
            
            main header div {
                margin-left: 10px;
                margin-right: 145px;
            }
            
            main header h2 {
                font-size: 16px;
                margin-bottom: 5px;
            }
            
            main header h3 {
                font-size: 14px;
                font-weight: normal;
                color: #7e818a;
            }
            
            #chat {
                padding-left: 0;
                margin: 0;
                list-style-type: none;
                overflow-y: scroll;
                height: 535px;
                border-top: 2px solid #fff;
                border-bottom: 2px solid #fff;
            }
            
            #chat li {
                padding: 10px 30px;
            }
            
            #chat h2,
            #chat h3 {
                display: inline-block;
                font-size: 13px;
                font-weight: normal;
            }
            
            #chat h3 {
                color: #bbb;
            }
            
            #chat .entete {
                margin-bottom: 5px;
            }
            
            #chat .message {
                padding: 20px;
                color: #fff;
                line-height: 25px;
                max-width: 90%;
                display: inline-block;
                text-align: left;
                border-radius: 5px;
            }
            
            #chat .me {
                text-align: right;
            }
            
            #chat .you .message {
                background-color: #58b666;
            }
            
            #chat .me .message {
                background-color: #6fbced;
            }
            
            #chat .triangle {
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 10px 10px 10px;
            }
            
            #chat .you .triangle {
                border-color: transparent transparent #58b666 transparent;
                margin-left: 15px;
            }
            
            #chat .me .triangle {
                border-color: transparent transparent #6fbced transparent;
                margin-left: 375px;
            }
            
            main footer {
                height: 155px;
                padding: 20px 30px 10px 20px;
            }
            
            main footer textarea {
                resize: none;
                border: none;
                display: block;
                width: 100%;
                height: 80px;
                border-radius: 3px;
                padding: 20px;
                font-size: 13px;
                margin-bottom: 13px;
            }
            
            main footer textarea::placeholder {
                color: #ddd;
            }
            
            main footer img {
                height: 30px;
                cursor: pointer;
            }
            
            main footer a {
                text-decoration: none;
                text-transform: uppercase;
                font-weight: bold;
                color: #6fbced;
                vertical-align: top;
                margin-left: 333px;
                margin-top: 5px;
                display: inline-block;
            }
        </style>

        <style>
            .ul_chatList::-webkit-scrollbar {
                width: 0.2em;
            }
            
            .ul_chatList::-webkit-scrollbar-track {
                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            }
            
            .ul_chatList::-webkit-scrollbar-thumb {
                background-color: darkgrey;
                outline: 1px solid slategrey;
            }
            
            #chat::-webkit-scrollbar {
                width: 0.2em;
            }
            
            #chat::-webkit-scrollbar-track {
                box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            }
            
            #chat::-webkit-scrollbar-thumb {
                background-color: darkgrey;
                outline: 1px solid slategrey;
            }
        </style>





        <style type="text/css">
            .footer img.logo {
                height: 34px;
                margin-bottom: 0px;
                margin-right: 10px;
            }
            
            .footer h5 {
                font-size: 20px;
                margin-bottom: 10px;
            }
            
            a.homebtn {
                background: #010b80 !important;
            }
            
            .home-get-started img.picture {
                max-width: 600px;
            }
        </style>

        <footer class="footer darkmode">
            <div class="edge">
                <div class="row margin-top-2">
                    <div class="col-md">
                        <h5 class="ul-fold white">GiGi</h5>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About Gigi</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">In your community</a></li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <h5 class="ul-fold white">Work with GiGi</h5>
                        <ul>
                            <li><a href="#">Meet Gigi</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <h5 class="ul-fold white">Community</h5>
                        <ul>
                            <li><a href="#">Community</a></li>
                            <li><a href="#">Apps</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Pentest</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="row">

                            <div style="float: right;width: 100%;text-align: right;">
                                <div class="col-*"> <img src="{{asset('assets/USER/img/heading/logo-alternate.png')}}" class="logo" alt="" width="34" height="34" loading="lazy"> </div>
                            </div>
                            <div class="col-md-6 col-lg-12 text-center text-md-left text-lg-right footer__newsletter">
                                <h5 class="white">Sign up for the GiGi newsletter</h5>
                                <form>
                                    <input type="email" class="email" placeholder="Your e-mail address">
                                    <input type="submit" class="submit" value="Subscribe">
                                </form>
                            </div>
                            <div class="col-md-6 col-lg-12 text-center text-md-right footer__social">
                                <h5 class="white">Follow us on social media</h5>
                                <span class="footer__social-icons"> <span class="footer__social-icons-list"> <a href="#"
                                            target="_blank"><img alt="Facebook"
                                                src="{{asset('assets/USER/img/icons/facebook.svg')}}" width="24px"
                                                height="24px" /></a> <a href="#" target="_blank"><img alt="Instagram"
                                                src="{{asset('assets/USER/img/icons/instagram.svg')}}" width="24px"
                                                height="24px" /></a> <a href="#" target="_blank"><img alt="Youtube"
                                                src="{{asset('assets/USER/img/icons/youtube.svg')}}" width="24px"
                                                height="17px" /></a> <a href="#" target="_blank"><img alt="Twitter"
                                                src="{{asset('assets/USER/img/icons/twitter.svg')}}" width="24px"
                                                height="20px" /></a> </span> </span>
                            </div>
                            <div class="col-md-12 col-lg-12 text-center text-lg-right p-2 footer__copyright">
                                <p>Copyright © 2022 GiGi – All rights reserved
                                    <br /> <a href="#" target="_blank">Privacy and Cookie Notice</a> | <a href="#" target="_blank">Terms and Conditions</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('assets/USER/js/main.js')}}"></script>
</body>

</html>