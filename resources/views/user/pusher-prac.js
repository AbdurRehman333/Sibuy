// alert($('meta[name="csrf-token"]').attr('content'));

Pusher.logToConsole = true;

var pusher = new Pusher('814fe1b741785e7ace5e', {
    cluster: 'ap2',
    channelAuthorization: {
        endpoint: "https://gigiapi.zanforthstaging.com/api/channelAuthorization",
        headers: {
            "Authorization": 'Bearer 360|JfUY7cW7SzcEo0V8WY9uVsxO2gggRQs0oQVEtoA7',
            // "Authorization": 'Bearer 361|JjIauoRLRHpWvf9pMAXEBgsJalPuki9YNkDxrurL',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    },
    userAuthentication: {
        endpoint: "https://gigiapi.zanforthstaging.com/api/channelAuthorization",
        headers: {
            "Authorization": 'Bearer 360|JfUY7cW7SzcEo0V8WY9uVsxO2gggRQs0oQVEtoA7',
            // "Authorization": 'Bearer 361|JjIauoRLRHpWvf9pMAXEBgsJalPuki9YNkDxrurL',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
});

// Echo.private(`messages-channel.3`)
// .listen('message.created', (e) => {
//     console.log(e);
// });

// window.Echo = new Echo({
// broadcaster: 'pusher',
// key: '814fe1b741785e7ace5e',
// cluster: 'ap2',
// encrypted: true,
// csrfToken: $('meta[name="csrf-token"]').attr('content'),
// });

// Echo.private(`messages-channel.3`)
// .listen('message.created', (e) => {
//     console.log(e);
// });

// var channel = pusher.subscribe('messages-channel.3');

var channel = pusher.subscribe(`private-messages-channel.3`);
channel.bind('message.created', function(data) {
    console.log(data);
});