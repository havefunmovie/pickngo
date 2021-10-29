<?php

namespace App\Listeners;

use App\Mail\NewDropoffAcceptedByAgentMail;
use App\Mail\OrderAcceptedByDriver;
use App\Models\Dropoff;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NewDropoffAcceptedByAgentListener
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
        Mail::to($event->order['email'])->send(new NewDropoffAcceptedByAgentMail($event->order));
    }
}