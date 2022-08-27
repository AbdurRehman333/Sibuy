<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('messages-channel.{userId}', function ($user, $userId) {
//     return true;
// });


Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Broadcast::channel('private-chat.{rec_id}', function ($user, $receiver_id) {
Broadcast::channel('private-chat.{convo_id}', function ($user, $convo_id) {

    // $convo = Conversation::findOrNew($convo_id);

    return (int) $user->id === (int) $user->id;
    // return $user;
    // return Auth::check();
    // return true;
    // if($convo)
    // {
    //     if($user->id === $convo->first_user)
    //     {
    //         return true;
    //     }
    //     if($user->id === $convo->second_user)
    //     {
    //         return true;
    //     }
    //     // return false;
    // }
    // return false;

    // return Auth::check();
});


Broadcast::channel('chat', function ($user) {
    // return Auth()->user()->id === $user->id;
    return Auth::check();
});
