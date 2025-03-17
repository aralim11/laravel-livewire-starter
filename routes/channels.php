<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

## auth check for private channel
Broadcast::routes(['middleware' => ['auth', 'web']]);

## public channel
// Broadcast::channel('user-channel', function () {
//     return true;
// });

## private channel
Broadcast::channel('user-channel.{id}', function (User $user, $id) {
    return (int) $user->id === (int) $id;
});
