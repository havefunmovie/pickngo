<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox\Types;

use App\Models\MailboxTypes;
use Livewire\Component;

class Edit extends Component
{
    public $validated, $box_type, $error, $type_id;

    public function rules()
    {
        return [
            'box_type.box_type' => 'required|unique:mailbox_types,box_type,' . $this->box_type['id'],
            'box_type.price'    => 'required|numeric',
        ];
    }

    public function mount($id) {
        $this->box_type = MailboxTypes::where('id', $id)->first();
        $this->type_id = $id;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();
        MailboxTypes::where('id', $this->type_id)->update([
            'box_type' => $this->box_type['box_type'],
            'price' => $this->box_type['price']
        ]);

        return redirect()->route('agent.mailbox.index');
    }

    public function render()
    {
        return view('livewire.admin.agent.mailbox.types.edit')->layout('livewire.admin.master');
    }
}
