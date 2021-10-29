<?php

namespace App\Http\Livewire\Admin\Agent\Faxing;

use App\Events\OrderStatusUpdatedByAgentEvent;
use App\Models\OrderFaxing;
use Livewire\Component;

class Edit extends Component
{
    public $faxing, $validated, $fax;

    protected array $rules = [
        'fax.message' => 'required'
    ];

    public function mount($id) {
        $this->faxing = OrderFaxing::where('id', $id)->where('agent_id', auth()->user()->id)->with(['user', 'transactions'])->get()->toArray();
        $this->faxing = array_shift($this->faxing);
        if ($this->faxing == null) {
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
        OrderFaxing::where('id', $this->faxing['id'])->update([
            'agent_accept_status' => 'Reject',
            'reject_reason_message' => ($this->fax['message'] ?? "")
        ]);
        $order = OrderFaxing::where('id', $this->faxing['id'])->first();
        Event(new OrderStatusUpdatedByAgentEvent($order,'Faxing'));
        return redirect()->route('agent.faxing.index');
    }

    public function render()
    {
        $validated = $this->validated;
        return view('livewire.admin.agent.faxing.edit', compact('validated'))->layout('livewire.admin.master');
    }
}
