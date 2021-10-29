<?php

namespace App\Http\Livewire\Admin\Orders\Parcel;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.orders.parcel.index')->layout('livewire.admin.master');
    }
}
