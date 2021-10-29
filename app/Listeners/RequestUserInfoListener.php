<?php

namespace App\Listeners;

use App\Events\RequestUserInfo;
use App\Mail\RequestUserInfoMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RequestUserInfoListener
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
     * @param  RequestUserInfo  $event
     * @return void
     */
    public function handle(RequestUserInfo $event)
    {
        Mail::to($event->user->email)->send(new RequestUserInfoMail($event->user,$event->agent));
    }
}
