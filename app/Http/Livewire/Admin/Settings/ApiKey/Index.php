<?php

namespace App\Http\Livewire\Admin\Settings\ApiKey;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.settings.api-key.index')->layout('livewire.admin.master');
    }
}
