<?php

namespace App\Http\Livewire\Admin\Drivers;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.drivers.index')->layout('livewire.admin.master');
    }
}