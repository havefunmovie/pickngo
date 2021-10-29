<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox\Details;

use App\Models\Mailboxes;
use App\Models\MailboxTypes;
use Livewire\Component;

class TypeSelection extends Component
{
    public $validated, $selection, $box_types, $error;

    protected array $rules = [
        'selection.start_range'  => 'required|numeric',
        'selection.end_range'    => 'required|numeric',
        'selection.mailbox_type' => 'required',
    ];

    public function mount() {
        $this->box_types = MailboxTypes::where('agent_id', auth()->user()->id)->get();

        Mailboxes::where('is_temp', 1)->delete();
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
        $this->error = false;
    }

    public function create() {
        $this->validate();

        $type = '';
        foreach ($this->box_types as $box) {
            if ($box['id'] == $this->selection['mailbox_type']) {
                $type = $box['box_type'];
                break;
            }
        }

        $range = Mailboxes::whereBetween('number', [$this->selection['start_range'], $this->selection['end_range'] - 1])->exists();
        if (!$range) {
            $data = [];
            for ($i = $this->selection['start_range']; $i < $this->selection['end_range']; $i++) {
                array_push(
                    $data,
                    [
                        'number' => $i,
                        'agent_id' => auth()->user()->id,
                        'type' => $type,
                        'is_temp' => 1,
                        'is_empty' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                );
            }
            Mailboxes::insert($data);

            $this->emit('next_step', $this->selection['mailbox_type']);
        } else {
            $this->error = 'This range has selected already';
            $this->emit('alert_remove');
        }
    }

    public function render()
    {
        return view('livewire.admin.agent.mailbox.details.type-selection');
    }
}
