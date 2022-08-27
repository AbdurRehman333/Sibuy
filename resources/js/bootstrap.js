import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

//COMMENTING OUT OLD ONE
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true,

//     // authorizer: (channel, options) => {
//     //     return {
//     //         authorize: (socketId, callback) => {
//     //             // axios.post('/api/broadcasting/auth', {
//     //             axios.post('/broadcasting/auth', {
//     //                     socket_id: socketId,
//     //                     channel_name: channel.name
//     //                 })
//     //                 .then(response => {
//     //                     callback(false, response.data);
//     //                 })
//     //                 .catch(error => {
//     //                     callback(true, error);
//     //                 });
//     //         }
//     //     };
//     // },
// });
// alert(bearer_token); // Getting it
// alert($('meta[name="csrf-token"]').attr('content')); // Getting it

//ADDING FOR new TEST
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: '814fe1b741785e7ace5e',
//     cluster: 'ap2',
//     forceTLS: true,
//     csrfToken: $('meta[name="csrf-token"]').attr('content'),
//     // namespace: 'App.Events',                                                         // NOT WORKING
//     authEndpoint: 'https://gigiapi.zanforthstaging.com/api/channelAuthorization', // NOT WORKING, endpoint in pusherConfig

//     auth: {
//         headers: {
//             Authorization: 'Bearer ' + bearer_token
//         },
//     },

//     // authorizer: (channel, options) => {
//     //     return {
//     //         authorize: (socketId, callback) => {
//     //             // axios.post('/api/broadcasting/auth', {
//     //             axios.post('/broadcasting/auth', {
//     //                     socket_id: socketId,
//     //                     channel_name: channel.name
//     //                 })
//     //                 .then(response => {
//     //                     callback(false, response.data);
//     //                 })
//     //                 .catch(error => {
//     //                     callback(true, error);
//     //                 });
//     //         }
//     //     };
//     // },


// });

// var channel_new = Echo.channel('private-messages-channel.4');
// channel.listen('.message.created', function(data) {
//     alert(data);
// })


// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: '814fe1b741785e7ace5e',
//     cluster: 'ap2',
//     // forceTLS: true,
//     forceTLS: false,
//     authEndpoint: 'https://gigiapi.zanforthstaging.com/api/channelAuthorization', // NOT WORKING, endpoint in pusherConfig
//     csrfToken: $('meta[name="csrf-token"]').attr('content'),

//     auth: {
//         headers: {
//             Authorization: 'Bearer ' + bearer_token
//         },
//     },
// });


// var channel = window.Echo.channel('private-messages-channel.4');
// channel.listen('message.created', function(data) {
//     alert(data);
// })