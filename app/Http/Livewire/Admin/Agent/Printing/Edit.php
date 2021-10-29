<?php

namespace App\Http\Livewire\Admin\Agent\Printing;

use App\Events\OrderStatusUpdatedByAgentEvent;
use App\Models\OrderPrinting;
use Livewire\Component;

class Edit extends Component
{
    public $printing, $validated, $print;

    protected array $rules = [
        'print.message' => 'required'
    ];

    public function mount($id) {
        $this->printing = OrderPrinting::where('id', $id)->where('agent_id', auth()->user()->id)->get()->toArray();
        $this->printing = array_shift($this->printing);
        if ($this->printing == null) {
            abort(403);
        }
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();
        OrderPrinting::where('id', $this->printing['id'])->update([
            'agent_accept_status' => 'Reject',
            'reject_reason_message' => $this->print['message']
        ]);
        $order = OrderPrinting::where('id', $this->printing['id'])->first();
        Event(new OrderStatusUpdatedByAgentEvent($order,'Printing'));
        return redirect()->route('agent.printing.index');
    }
    
    public function render()
    {
        $validated = $this->validated;
        return view('livewire.admin.agent.printing.edit', compact('validated'))->layout('livewire.admin.master');
    }
}
