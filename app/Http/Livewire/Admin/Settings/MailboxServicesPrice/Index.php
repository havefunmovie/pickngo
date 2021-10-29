<?php

namespace App\Http\Livewire\Admin\Settings\MailboxServicesPrice;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function mount()
    {
        $this->services = Services::where('service_type', 'mailbox')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.admin.settings.mailbox-services-price.index');
    }
}
