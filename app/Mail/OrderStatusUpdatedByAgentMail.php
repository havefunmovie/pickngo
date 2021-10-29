<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdatedByAgentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order,$user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$user)
    {
        $this->order = $order;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.OrderStatusUpdatedByAgent')->with(['order','user'])->subject('Pick & go: Your order status is changed');
    }
}
