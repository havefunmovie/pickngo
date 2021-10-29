<?php

namespace App\Http\Livewire\Admin\Layouts;

use App\Models\OrderFaxing;
use App\Models\OrderPrinting;
use App\Models\OrderScanning;
use Livewire\Component;

class Sidebar extends Component
{
    public $ScanningNotification = null;
    public $PrintingNotification = null;
    public $FaxingNotification= null;

    public function mount()
    {
        $this->ScanningNotification = OrderScanning::where('agent_id', auth()->user()->id)->where('agent_accept_status', null)->count();
        $this->PrintingNotification = OrderPrinting::where('agent_id', auth()->user()->id)->where('agent_accept_status', null)->count();
        $this->FaxingNotification = OrderFaxing::where('agent_id', auth()->user()->id)->where('agent_accept_status', null)->count();
    }
    public function render()
    {
        return view('livewire.admin.layouts.sidebar');
    }
}
