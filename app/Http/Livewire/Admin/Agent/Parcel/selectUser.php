<?php

namespace App\Http\Livewire\Admin\Agent\Parcel;

use Livewire\Component;

class selectUser extends Component
{
    public function createParcelForNewUser()
    {
        return redirect()->to('/agent/parcel/create');
    }
    public function render()
    {
        return view('livewire.admin.agent.parcel.selectUser')->layout('livewire.admin.master');
    }
}
