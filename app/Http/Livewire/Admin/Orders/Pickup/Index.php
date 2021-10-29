<?php

namespace App\Http\Livewire\Admin\Orders\Pickup;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.pickup-delivery.index')->layout('livewire.admin.master');
    }
}
