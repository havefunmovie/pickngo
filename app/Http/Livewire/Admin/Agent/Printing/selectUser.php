<?php

namespace App\Http\Livewire\Admin\Agent\Printing;

use Livewire\Component;

class selectUser extends Component
{
    public function createPrintingForNewUser()
    {
        return redirect()->to('/agent/printing/create');
    }
    public function render()
    {
        return view('livewire.admin.agent.printing.selectUser')->layout('livewire.admin.master');
    }
}
