<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.settings.index')->layout('livewire.admin.master');
    }
}
