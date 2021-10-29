<?php

namespace App\Http\Livewire\Admin\Agent\Scanning;

use App\Events\OrderStatusUpdatedByAgentEvent;
use App\Models\OrderScanning;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class Edit extends Component
{
    public $scanning, $validated, $scann;

    protected array $rules = [
        'scann.message' => 'required'
    ];

    public function mount($id) {
        try{
            $this->scanning = OrderScanning::where('id', $id)->where('agent_id', auth()->user()->id)->with(['user', 'transactions'])->get()->toArray();
            $this->scanning = array_shift($this->scanning);
        }
        catch(ModelNotFoundException $e){
            abort(404);
        }
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();
        OrderScanning::where('id', $this->scanning['id'])->update([
            'agent_accept_status' => 'Reject',
            'reject_reason_message' => ($this->scann['message'] ?? "")
        ]);
        $order = OrderScanning::where('id', $this->scanning['id'])->first();
        Event(new OrderStatusUpdatedByAgentEvent($order,'Scanning'));
        return redirect()->route('agent.scanning.index');
    }
    
    public function render()
    {
        $validated = $this->validated;
        return view('livewire.admin.agent.scanning.edit', compact('validated'))->layout('livewire.admin.master');
    }
}
