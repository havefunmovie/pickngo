<?php

namespace App\Http\Livewire\Admin\Agent\Envelop;

use Livewire\Component;

class selectUser extends Component
{
    public function createEnvelopForNewUser()
    {
        return redirect()->to('/agent/envelop/create');
    }
    public function render()
    {
        return view('livewire.admin.agent.envelop.selectUser')->layout('livewire.admin.master');
    }
}
