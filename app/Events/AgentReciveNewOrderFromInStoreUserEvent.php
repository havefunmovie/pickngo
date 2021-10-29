<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AgentReciveNewOrderFromInStoreUserEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $order,$order_type,$transaction,$user,$agent_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order,$transaction,$order_type,$user,$agent_id)
    {
        $this->order = $order;
        $this->transaction = $transaction;
        $this->order_type = $order_type;
        $this->user = $user;
        $this->agent_id = $agent_id;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastAs()
    {
        return 'AgentReciveNewOrderFromInStoreUserEvent';
    }
}
