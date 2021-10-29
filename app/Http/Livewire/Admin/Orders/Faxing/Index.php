<?php

namespace App\Http\Livewire\Admin\Orders\Faxing;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.faxing.index')->layout('livewire.admin.master');
    }
}
