<?php

namespace App\Http\Livewire\Admin\Agents;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.agents.index')->layout('livewire.admin.master');
    }
}
