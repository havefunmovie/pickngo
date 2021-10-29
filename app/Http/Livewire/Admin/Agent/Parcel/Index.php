<?php

namespace App\Http\Livewire\Admin\Agent\Parcel;

use Livewire\Component;

class Index extends Component
{
    public $error;

    protected $listeners = [
        'set_error' => 'setError'
    ];

    public function setError($error) {
        $this->error = $error;
    }

    public function render()
    {
        return view('livewire.admin.agent.parcel.index')->layout('livewire.admin.master');
    }
}
