<?php


use Illuminate\Support\Facades\Broadcast;

// For driver
Broadcast::channel('chat.driver.{id}', function ($driver, $id) {
    return auth('driver')->check() && (int) $driver->id === (int) $id;
});

// For user
Broadcast::channel('chat.user.{id}', function ($user, $id) {
    return auth('user')->check() && (int) $user->id === (int) $id;
});
