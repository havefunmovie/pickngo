<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderAcceptedByDriver extends Mailable
{
    use Queueable, SerializesModels;

    public $order,$driver,$user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,$driver,$user)
    {
        $this->order = $order;
        $this->driver = $driver;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.OrderAcceptedByDriver')->with(['order','driver','user']);
    }
}
