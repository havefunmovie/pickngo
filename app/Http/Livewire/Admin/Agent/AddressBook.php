<?php

namespace App\Http\Livewire\Admin\Agent;

use Livewire\Component;

class AddressBook extends Component
{
    public $validated, $address, $from_line, $to_line, $validateError;

    protected array $rules = [
        'address.shipping-type' => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function start() {
//        $this->validate();
        if (!$this->from_line) {
            $this->validateError = 'From address line 1 is empty';

            return;
        }
        session()->flash('from-ba', $this->from_line);
        if (!$this->to_line) {
            $this->validateError = 'To address line 1 is empty';
            return;
        }
        session()->flash('to-ba', $this->to_line);

        if (!isset($this->address['shipping-type'])) {
            $this->validateError = 'Shipping Type is empty';
            return;
        }

        if ($this->address['shipping-type'] === 'parcel') {
            return redirect()->route('agent.parcel.create');
        } else {
            return redirect()->route('agent.envelop.create');
        }
    }

    public function render()
    {
        $validated = $this->validated;
        $from = \App\Models\AddressBook::where('user_id', auth()->user()->id)->get();
        return view('livewire.admin.agent.address-book', compact('from', 'validated'))->layout('livewire.admin.master');
    }
}
