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

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('message.{user_id}', function ($user, $user_id){
    return (int) $user->id === (int) $user_id;
});

Broadcast::channel('userEvent.{user_id}', function ($user, $user_id){
    return auth()->check();
});

Broadcast::channel('postEvent.{user_id}', function ($user, $user_id){
    return auth()->check();
});

Broadcast::channel('friendRequest.{user_id}', function ($user, $user_id){
    return (int) $user->id === (int) $user_id;
});