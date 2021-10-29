<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox\Types;

use App\Models\MailboxTypes;
use Livewire\Component;

class Create extends Component
{
    public $validated, $box_type;
    public $error;

    protected array $rules = [
        'box_type.type_name'    => 'required',
        'box_type.price'        => 'required|numeric',
        'box_type.expired_time' => 'required|numeric',
        'box_type.expired_type' => 'required',
    ];

    protected $messages = [
        'unique' => 'These box type and expired type has already been taken.'
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
        $this->error = false;
    }

    public function create() {
        $this->validate();

        if (MailboxTypes::where('box_type', $this->box_type['type_name'])->where('expired_type', $this->box_type['expired_type'])->exists()) {
            $this->error = 'These box type and expired type has already been taken.';
            $this->emit('alert_remove');
            return;
        }

        MailboxTypes::create([
            'box_type'     => $this->box_type['type_name'],
            'price'        => $this->box_type['price'],
            'expired_time' => $this->box_type['expired_time'],
            'expired_type' => $this->box_type['expired_type'],
            'agent_id'     => auth()->user()->id
        ]);
        return redirect()->route('agent.mailbox.index');
    }

    public function render()
    {
        return view('livewire.admin.agent.mailbox.types.create')->layout('livewire.admin.master');
    }
}
