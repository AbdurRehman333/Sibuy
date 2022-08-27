<div class="chatbox">
    <div class="chatbox-close"></div>
    <div class="custom-tab-1">
        <ul class="nav nav-tabs">
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="chat" role="tabpanel">
                <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                    <div class="card-header chat-list-header text-center">
                        <a style="visibility: hidden;" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                        x="4" y="11" width="16" height="2" rx="1" />
                                </g>
                            </svg></a>
                        <div>
                            <h6 class="mb-1">Chat List</h6>
                            <p class="mb-0">Show All</p>
                        </div>
                        <a style="visibility: hidden;" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                </g>
                            </svg></a>
                    </div>
                    <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body">
                        <ul class="contacts " id="contacts_to_load">

                            @foreach ($conversations as $c)
                            <li class="active dz-chat-user convo_list_item" data-id="{{$c['id']}}">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont">
                                        @if($c['opposite_user']['profile_picture'] == null)
                                        <img src="{{asset('images/avatar/1.jpg')}}" class="rounded-circle user_img" alt="" />
                                        @else
                                        <img src="{{''.config('path.path.WebPath').''.config('path.path.UserPath').'/'.$c['opposite_user']['profile_picture'].''}}" class="rounded-circle user_img" alt="" />
                                        @endif
                                    </div>
                                    <div class="user_info">
                                        <span>{{$c['opposite_user']['name']}}</span>
                                        <p>{{ substr($c['last_message']['message'], 0 ,40) }}...</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div id="">
                    <div class="card chat dz-chat-history-box d-none " id="this_is_to_be_updated_on_convo_load">
                        <div class="card-header chat-list-header text-center">
                            <a href="javascript:void(0)" class="dz-chat-history-back">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <rect fill="#000000" opacity="0.3"
                                            transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) "
                                            x="14" y="7" width="2" height="10" rx="1" />
                                        <path
                                            d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) " />
                                    </g>
                                </svg>
                            </a>
                            <div id="this_content_change_on_load">
                                <h6 class="mb-1"></h6>
                                <p class="mb-0 text-success"></p>
                            </div>
                            <div class="dropdown" style="visibility: hidden;">
                                <a href="javascript:void(0)" data-toggle="dropdown"><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <circle fill="#000000" cx="5" cy="12" r="2" />
                                            <circle fill="#000000" cx="12" cy="12" r="2" />
                                            <circle fill="#000000" cx="19" cy="12" r="2" />
                                        </g>
                                    </svg></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View
                                        profile</li>
                                    <li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close
                                        friends</li>
                                    <li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group
                                    </li>
                                    <li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
                                </ul>
                            </div>
                        </div>


                        <div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3" id=""
                            style="display: flex; flex-direction: column-reverse;">

                            {{-- <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                                <div class="msg_cotainer">
                                    Hi, how are you samim?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Hi Khalid i am good tnx how about you?
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div> --}}


                        </div>


                        <div class="card-footer type_msg">
                            <div class="input-group">
                                <textarea class="form-control" id="message" placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary send_button"><i
                                            class="fa fa-location-arrow"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div>
                <input type="hidden" id="my_id_from_session" value="{{session('Authenticated_user_data')['id']}}">
    
    
                <input type="hidden" id="new_convo">
                <input type="hidden" id="new_rec">
                <input type="hidden" id="new_my_id">
            </div>


            <meta name="csrf-token" content="{{ csrf_token() }}">
            <script src="{{asset('js/app.js')}}"></script>

            <script>
                // $(".convo_list_item").click(function(e) {
                $(document).on('click', '.convo_list_item', function() {
                    id = $(this).attr("data-id");
                    // console.log(id);
                    // console.log('clicked');
    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    loading_html = `
                        <div> 
                            <span> Loading.... </span>
                            </div>
                    `;
                    $("#DZ_W_Contacts_Body3").empty();
                    $("#this_content_change_on_load").empty();
                    // $('#DZ_W_Contacts_Body3').html(loading_html);
                    $('#this_content_change_on_load').html(loading_html);

                    
                    var id = $(this).attr("data-id");
                    // console.log(id);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('loadConvo_forDashboards') }}",
                        data: {
                            convo_id: id
                        },
                        dataType: 'html',
                        success: function(data) {
                            // console.log(data);
                            $("#DZ_W_Contacts_Body3").empty();
                            $('#DZ_W_Contacts_Body3').html(data);
    
                            var convo_id_loaded = document.getElementById('convo_id').value;
                            var receiver_id_loaded = document.getElementById('rec_id').value;
                            var my_id_loaded = document.getElementById('my_id').value;

                            // console.log(convo_id_loaded);
                            // console.log(receiver_id_loaded);
                            // console.log(my_id_loaded);

                            var element = document.getElementById('new_convo');
                            element.value = convo_id_loaded;
                            var element = document.getElementById('new_rec');
                            element.value = receiver_id_loaded;
                            var element = document.getElementById('new_my_id');
                            element.value = my_id_loaded;
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('loadConvo_forDashboards_Header') }}",
                        data: {
                            convo_id: id
                        },
                        dataType: 'html',
                        success: function(data) {
                            // console.log(data);
                            $("#this_content_change_on_load").empty();
                            $('#this_content_change_on_load').html(data);
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

                    var element = document.getElementById('message');
                    message = element.value;
                    element.innerHTML = '';
                    element.value = '';

                    new_mesgs =document.getElementById("new_msgs_be_here");
                    // new_mesgs.insertAdjacentHTML("afterend",
                    // `<li class="me"><div class="entete"><h3>10:12AM, Today </span></div><div class="message"> ${message} </div></li>`);
                    new_mesgs.insertAdjacentHTML("afterend",
                    `<div class="d-flex justify-content-start mb-4">
                        <div class="img_cont_msg">
                            <img src="/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt="" />
                        </div>
                        <div class="msg_cotainer">
                        ${message}
                            <span class="msg_time">Now, Today</span>
                        </div>
                    </div>`);

                    // console.log(convo_id_loaded)
                    // console.log(receiver_id_loaded)
                    // console.log(my_id_from_session)



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

                //REFRESH CONVOLIST
                var convo_list = document.getElementById('DZ_W_Contacts_Body');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ route('AdminAndMerchantRefreshConvoList') }}",
                    dataType: 'html',
                    success: function(data) {

                        $("#DZ_W_Contacts_Body").empty();
                        $('#DZ_W_Contacts_Body').html(data);

                    }
                });

                });

            </script>


    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

        <script>
            Pusher.logToConsole = true;
    
            var pusher = new Pusher('814fe1b741785e7ace5e', {
                cluster: 'ap2',
                authEndpoint: "https://gigiapi.zanforthstaging.com/api/channelAuthorization",
                auth: {
                    headers: {
                        "Authorization": `Bearer ${bearer_token}`,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            });
    
            var channel = pusher.subscribe(`private-messages-channel.${id}`);
            channel.bind('message.created', function(data) {

                message = data.message.message;
                user_id = data.message.user_id;
                conversation_id = data.message.conversation_id;

                
                var from_listener_my_id = document.getElementById('new_my_id').value;
                var from_listener_convo_id = document.getElementById('new_convo').value;
                var from_listener_rec_id = document.getElementById('new_rec').value;


                var convo_list = document.getElementById('DZ_W_Contacts_Body');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ route('AdminAndMerchantRefreshConvoList') }}",
                    dataType: 'html',
                    success: function(data) {

                        $("#DZ_W_Contacts_Body").empty();
                        $('#DZ_W_Contacts_Body').html(data);

                    }
                });

                if( parseInt(from_listener_convo_id) == parseInt(conversation_id))
                {

                        new_mesgs =document.getElementById("new_msgs_be_here");

                            new_mesgs.insertAdjacentHTML("afterend",
                            `<div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                ${message}
                                    
                                </div>
                                <div class="img_cont_msg">
                                    <img src="/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt="" />
                                </div>
                            </div> `);
                            // <span class="msg_time_send">8:55 AM, Today</span>
                }

            });
        </script>











            <div class="tab-pane fade" id="alerts" role="tabpanel">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header chat-list-header text-center">
                        <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                </g>
                            </svg></a>
                        <div>
                            <h6 class="mb-1">Notications</h6>
                            <p class="mb-0">Show All</p>
                        </div>
                        <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg></a>
                    </div>
                    <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
                        <ul class="contacts">

                            <li class="active">
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont primary">KK</div>
                                    <div class="user_info">
                                        <span>David Nester Birthday</span>
                                        <p class="text-primary">Today</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
                                    <div class="user_info">
                                        <span>Perfection Simplified</span>
                                        <p>Jame Smith commented on your status</p>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
                                    <div class="user_info">
                                        <span>AharlieKane</span>
                                        <p>Sami is online</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex bd-highlight">
                                    <div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
                                    <div class="user_info">
                                        <span>Athan Jacoby</span>
                                        <p>Nargis left 30 mins ago</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="notes">
                <div class="card mb-sm-3 mb-md-0 note_card">
                    <div class="card-header chat-list-header text-center">
                        <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1" />
                                    <rect fill="#000000" opacity="0.3"
                                        transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) "
                                        x="4" y="11" width="16" height="2" rx="1" />
                                </g>
                            </svg></a>
                        <div>
                            <h6 class="mb-1">Notes</h6>
                            <p class="mb-0">Add New Nots</p>
                        </div>
                        <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg></a>
                    </div>
                    <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
                        <ul class="contacts">
                            <li class="active">
                                <div class="d-flex bd-highlight">
                                    <div class="user_info">
                                        <span>New order placed..</span>
                                        <p>10 Aug 2020</p>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex bd-highlight">
                                    <div class="user_info">
                                        <span>Youtube, a video-sharing website..</span>
                                        <p>10 Aug 2020</p>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex bd-highlight">
                                    <div class="user_info">
                                        <span>john just buy your product..</span>
                                        <p>10 Aug 2020</p>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex bd-highlight">
                                    <div class="user_info">
                                        <span>Athan Jacoby</span>
                                        <p>10 Aug 2020</p>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>