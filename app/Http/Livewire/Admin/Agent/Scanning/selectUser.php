<?php

namespace App\Http\Livewire\Admin\Agent\Scanning;

use Livewire\Component;

class selectUser extends Component
{
    public function createScanningForNewUser()
    {
        return redirect()->to('/agent/scanning/create');
    }
    public function render()
    {
        return view('livewire.admin.agent.scanning.selectUser')->layout('livewire.admin.master');
    }
}
