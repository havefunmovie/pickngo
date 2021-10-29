<?php

namespace App\Http\Livewire\Admin\Withdraws;

use Livewire\Component;

class Edit extends Component
{
    public $status, $withid;

    public function mount($id, $status) {
        $this->status = $status;
        $this->withid = $id;
    }

    public function render()
    {
        return view('livewire.admin.withdraws.edit')->layout('livewire.admin.master');
    }
}
