<?php

namespace App\Http\Livewire\Admin\Agent\Printing;

use App\Events\OrderStatusUpdatedByAgentEvent;
use App\Models\OrderPrinting;
use Livewire\Component;

class Index extends Component
{
    public $PrintingId;

    protected $listeners = ['deletePrinting','CheckASDone'];

    public function CheckASDone($id)
    {
        $this->PrintingId = $id;
    }

    public function OrderReady($id)
    {
        OrderPrinting::where('id', $id)->update(['agent_accept_status'=>'Accept']);
        $order = OrderPrinting::where('id', $id)->first();
        Event(new OrderStatusUpdatedByAgentEvent($order,'Printing'));
        $this->redirect('/agent/printing');
    }
    public function render()
    {
        return view('livewire.admin.agent.printing.index')->layout('livewire.admin.master');
    }
}
