<?php

namespace App\Http\Livewire\Admin\Agent\Faxing;

use Livewire\Component;

class selectUser extends Component
{
    public function createFaxingForNewUser()
    {
        return redirect()->to('/agent/faxing/create');
    }
    public function render()
    {
        return view('livewire.admin.agent.faxing.selectUser')->layout('livewire.admin.master');
    }
}
