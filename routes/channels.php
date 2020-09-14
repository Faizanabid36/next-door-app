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

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('review-added-on-business.{ownerId}', function ($user, $ownerId) {
    return auth()->check() && (int)$ownerId === (int)$user->id;
});

Broadcast::channel('recommendation-added-on-business.{ownerId}', function ($user, $ownerId) {
    return auth()->check() && (int)$ownerId === (int)$user->id;
});

Broadcast::channel('new-message.{to}', function ($user, $to) {
    return (int)$to === (int)$user->id;
});
