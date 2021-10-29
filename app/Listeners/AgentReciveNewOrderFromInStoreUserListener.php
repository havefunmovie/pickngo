<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\AgentHasNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class AgentReciveNewOrderFromInStoreUserListener
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
        $agent = User::find($event->agent_id);
        Notification::send($agent, new AgentHasNotification($event->order,$event->transaction,$event->order_type,$event->user));
    }
}
