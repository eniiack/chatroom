<?php

use Illuminate\Support\Arr;
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

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });
// Broadcast::channel('room.added', function ($user) {
//     // return (int) $user->id === (int) $id;
//     return auth()->user();
// });

// Broadcast::channel('room.added', function ($user) {
//     // return (int) $user->id === (int) $id;
//     return auth()->user();
// });



// Broadcast::channel('room.chat.{room}', function ($user) {
//     //    return (int) $user->id === (int) $id;
//         return auth()->user();
//         // return Arr::only($user->toArray(), [
//         //     'id' , 'name'
//         // ]);
//     });


Broadcast::channel('room.added', function ($user) {
    //    return (int) $user->id === (int) $id;
        return true;
    });
    
    Broadcast::channel('room.chat.{room}', function ($user) {
    //    return (int) $user->id === (int) $id;
        return Arr::only($user->toArray() , [
            'id' , 'name'
        ]);
    });
    