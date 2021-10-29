<?php

namespace App\Listeners;

use App\Mail\NewOrderDetailMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewOrderToCustomerListener
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
        // Mail::to(Auth::mail())->send(new NewOrderDetailMail);
        Mail::to($event->user->email)->send(new NewOrderDetailMail($event->user,$event->order));
    }
}
