<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Notifications\Notification;

class NotificationService
{
    public function notifyUserByRole(string  $role, Notification $notification): void
    {
        //if commentator is author or admin, ,they shoud not be notified of their own comments
        if (auth()->user()->role != 'admin' && auth()->user()->role != 'author') {
            //Add more roles here if needed
            $users = User::where('role', $role)->get();

            //send notfication
            foreach ($users as $user) {
                $user->notify($notification);
            }
        } else {
            return;
        }
    }
}
