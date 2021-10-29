<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox;

use App\Models\Mailboxes;
use App\Models\UserMailboxes;
use Livewire\Component;

class Index extends Component
{
    public $confirm_status;
    public $validated;
    public $email;

    protected $listeners = [
        'confirm'
    ];

    protected array $rules = [
        'confirm_status'     => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function close() {
        $this->resetValidation();
        $this->validated = false;
        $this->confirm_status = false;
    }

    public function confirm($id) {
        $this->validate();
        UserMailboxes::where('id', $id)->update([
            'confirm_status' => $this->confirm_status
        ]);
        $us = UserMailboxes::where('id', $id)->get()->first();
        if ($this->confirm_status == 2) {
            Mailboxes::where('id', $us['box_id'])->update([
                'is_empty' => 0
            ]);
        } else {
            Mailboxes::where('id', $us['box_id'])->update([
                'is_empty' => 1
            ]);
        }
        $this->dispatchBrowserEvent('close');
        $this->close();
        return redirect()->route('agent.mailbox.index');
    }

    public function render()
    {
        return view('livewire.admin.agent.mailbox.index')->layout('livewire.admin.master');
    }
}
