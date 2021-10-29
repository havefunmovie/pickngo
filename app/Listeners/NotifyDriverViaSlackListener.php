<?php

namespace App\Listeners;

use App\Mail\NotifyNewOrderToDriverMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NotifyDriverViaSlackListener
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
        // Notification::send($event, new NotifyDriverSlackNotification());
        // Mail::to($event->order->email_from)->send(new NotifyNewOrderToDriverMail($event->order));
    }
}
