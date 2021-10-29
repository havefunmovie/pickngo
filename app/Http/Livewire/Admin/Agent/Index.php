<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $services = Services::all();
        return view('livewire.admin.agent.index', compact('services'))->layout('livewire.admin.master');
    }
}
