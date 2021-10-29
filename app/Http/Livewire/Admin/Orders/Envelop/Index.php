<?php

namespace App\Http\Livewire\Admin\Orders\Envelop;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.envelop.index')->layout('livewire.admin.master');
    }
}
