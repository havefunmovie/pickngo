<?php

namespace App\Http\Livewire\Admin\Agent\Faxing;

use App\Events\OrderStatusUpdatedByAgentEvent;
use App\Models\OrderFaxing;
use Livewire\Component;

class Index extends Component
{
    public $FaxingId;

    protected $listeners = ['deleteFaxing','CheckASDone'];

    public function CheckASDone($id)
    {
        $this->FaxingId = $id;
    }

    public function OrderReady($id)
    {
        OrderFaxing::where('id', $id)->update(['agent_accept_status'=>'Accept']);
        $order = OrderFaxing::where('id', $id)->first();
        Event(new OrderStatusUpdatedByAgentEvent($order,'Faxing'));
        $this->redirect('/agent/faxing');
    }
    
    public function render()
    {
        return view('livewire.admin.agent.faxing.index')->layout('livewire.admin.master');
    }
}
