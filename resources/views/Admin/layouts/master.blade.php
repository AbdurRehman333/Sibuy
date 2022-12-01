{{-- @extends('admin.layouts.html_upper') --}}

@include('Admin.layouts.html_upper')
@include('Admin.layouts.chatbox')
@include('Admin.layouts.header')
@include('Admin.layouts.sidebar')




@yield('content')


    





@include('Admin.layouts.footer')
@include('Admin.layouts.html_lower')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
<script>
    swal("Success!","{!! Session::get('success') !!}","success");
</script>
@endif

<input type="hidden" id="WebPath" value="{{config('path.path.WebPath')}}">
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <script>
        WebPath = document.getElementById('WebPath').value;
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('5c357c77e10eb34aedcb', {
            cluster: 'ap2',
            authEndpoint: `${WebPath}api/channelAuthorization`,
            auth: {
                headers: {
                    "Authorization": `Bearer ${bearer_token}`,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
        });
    
        // var channel = pusher.subscribe(`private-messages-channel.${id}`);
        var channel = pusher.subscribe(`private-notification-channel.${id}`);
        channel.bind('notification.received', function(data) {
            // console.log('---------------------------');
            // console.log(data.notification.message);

            if(data.notification.type == 'merchant')
            {
                $(`<li>
                <div class="timeline-badge success">
                </div>
                <a class="timeline-panel text-muted" href="/AdminMerchantProfile/${data.notification.type_id}">
                    <span> Just Now </span>
                    <h6 class="mb-0"> ${data.notification.message} </h6>
                </a>
                </li>`).insertAfter("#note_starter");
                toastr.success(`${data.notification.message}`);
            }
            else if(data.notification.type == 'deal')
            {
                $(`<li>
                <div class="timeline-badge success">
                </div>
                <a class="timeline-panel text-muted" href="/OfferDetails/${data.notification.type_id}">
                    <span> Just Now </span>
                    <h6 class="mb-0"> ${data.notification.message} </h6>
                </a>
                </li>`).insertAfter("#note_starter");
                toastr.info(`${data.notification.message}`);
            }

                        // $(".fa fa-bell").css("color", "yellow");
            document.getElementById('yellowIconNotificationBell').style.display = "block";
                        
        });
    
        $("#toSeeNotifications").click(function(){

        console.log(document.getElementById('yellowIconNotificationBell'));

        document.getElementById('yellowIconNotificationBell').style.display = "none";

        });

    </script>