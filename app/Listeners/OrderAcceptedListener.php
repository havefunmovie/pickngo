<?php

namespace App\Listeners;

use App\Mail\OrderAcceptedByDriver;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class OrderAcceptedListener
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
        Mail::to($user->email)->send(new OrderAcceptedByDriver($event->order,$event->driver,$user));
    }
}
