<?php

namespace App\Http\Livewire\Admin\Agent\BankInfo;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.agent.bank-info.index')->layout('livewire.admin.master');
    }
}
