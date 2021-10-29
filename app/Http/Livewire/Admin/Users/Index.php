<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Dropoff;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $phones = [];
    public function mount()
    {
        $phones = User::where('level',null)->pluck('mobile')->toArray();
        $dropoff_phones =Dropoff::where('phone','!','like','00%')->pluck('phone')->toArray();
        $this->phones = array_unique (array_merge ($phones, $dropoff_phones));
    }

    public function render()
    {
        return view('livewire.admin.users.index')->layout('livewire.admin.master');
    }
}
