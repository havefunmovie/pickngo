<?php

namespace App\Http\Livewire\Admin\AgentsOwner;

use Livewire\Component;

class Index extends Component
{


    public function render()
    {
        return view('livewire.admin.agents-owner.index')->layout('livewire.admin.master');
    }
}
