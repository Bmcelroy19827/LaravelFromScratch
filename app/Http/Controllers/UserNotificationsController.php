<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    //
    public function show()
    {

        return view('notifications.show', [
            'notifications' => tap(auth()->user()->unreadNotifications)->markAsRead()
        ]);

        // $notifications = auth()->user()->unreadNotifications;

        // $notifications->markAsRead();  // When this page is visited we mark every notification that wasn't already viewed as read

        // return view('notifications.show', [
        //     'notifications' => $notifications //auth()->user()->notifications
        //]);
    }
}
