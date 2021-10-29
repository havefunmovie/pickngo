<?php

namespace App\Http\Livewire\Home\Panel\Services\MailboxContent\Mailbox\Details;

use Livewire\Component;

class Signature extends Component
{
    public $sign = 'agree';

    public function next() {
        $this->emit('next_step');
    }

    public function render()
    {
        return view('livewire.home.panel.services.mailbox-content.mailbox.details.signature');
    }
}
