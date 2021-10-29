<?php

namespace App\Http\Livewire\Admin\Agent\Scanning;

use App\Events\OrderStatusUpdatedByAgentEvent;
use App\Models\OrderScanning;
use Livewire\Component;

class Index extends Component
{
    public $ScanningId;

    protected $listeners = ['deleteScanning','CheckASDone'];

    public function CheckASDone($id)
    {
        $this->ScanningId = $id;
    }

    public function OrderReady($id)
    {
        OrderScanning::where('id', $id)->update(['agent_accept_status'=>'Accept']);
        $order = OrderScanning::where('id', $id)->first();
        Event(new OrderStatusUpdatedByAgentEvent($order,'Scanning'));
        $this->redirect('/agent/scanning');
    }

    public function render()
    {
        return view('livewire.admin.agent.scanning.index')->layout('livewire.admin.master');
    }
}
