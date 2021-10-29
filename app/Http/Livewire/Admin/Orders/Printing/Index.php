<?php

namespace App\Http\Livewire\Admin\Orders\Printing;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.printing.index')->layout('livewire.admin.master');
    }
}
