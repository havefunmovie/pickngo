<?php

namespace App\Http\Livewire\Admin\Agent;

use Livewire\Component;

class PaymentInfo extends Component
{
    public function render()
    {
        return view('livewire.admin.agent.payment-info')->layout('livewire.admin.master');
    }
}
