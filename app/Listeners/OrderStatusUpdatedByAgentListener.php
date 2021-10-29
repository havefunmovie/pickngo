<?php

namespace App\Listeners;

use App\Mail\OrderStatusUpdatedByAgentMail;
use App\Models\User;
use App\Notifications\UserHadNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OrderStatusUpdatedByAgentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = User::find($event->order->user_id);
        Mail::to($user->email)->send(new OrderStatusUpdatedByAgentMail($event->order,$user));
        Notification::send($user, new UserHadNotification($event->order,$event->order_type));
    }
}
