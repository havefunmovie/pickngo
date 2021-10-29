<?php

namespace App\Http\Livewire\Home;

use App\Models\Services;
use App\Models\UserMailboxes;
use Livewire\Component;

class HomeComponent extends Component
{
    public $alert_status;

    public function mount() {
        if (auth()->check()) {
            $this->alert_status = UserMailboxes::where('user_id', auth()->user()->id)
                ->where('renewal_alert_status', 1)
                ->where('prevent_display_alert_status', 1)
                ->where('mailbox_status', null)
                ->exists();
        }
    }

    public function close() {
        $this->alert_status = false;
    }

    public function render()
    {
        $services = Services::all();
        return view('livewire.home.index', compact('services'));
    }

}
