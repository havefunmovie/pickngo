<?php

namespace App\Http\Livewire\Admin\Orders\Scanning;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.scanning.index')->layout('livewire.admin.master');
    }
}
