<?php

namespace App\Http\Livewire\Admin\Agent\Mailbox;

use App\Models\AgentService;
use App\Models\MailboxPrices;
use Livewire\Component;

class Prices extends Component
{
    public $prices;
    public $validated;

    protected array $rules = [
        'prices.customer_2'         => 'required|numeric',
        'prices.customer_3'         => 'required|numeric',
        'prices.personal_mode'      => 'required|numeric',
        'prices.personal_plus_mode' => 'required|numeric',
        'prices.business_mode'      => 'required|numeric',
        'prices.corporate_mode'     => 'required|numeric',
        'prices.rental_fee'         => 'required|numeric',
        'prices.refundable_deposit' => 'required|numeric',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function mount() {
        $this->prices = MailboxPrices::where('agent_id', auth()->user()->id)->get()->first();
    }

    public function edit() {
        $this->validate();

        $matchThese = ['agent_id' => auth()->user()->id];
        MailboxPrices::updateOrCreate($matchThese,[
            'customer_2' => $this->prices['customer_2'],
            'customer_3' => $this->prices['customer_3'],
            'personal_mode' => $this->prices['personal_mode'],
            'personal_plus_mode' => $this->prices['personal_plus_mode'],
            'business_mode' => $this->prices['business_mode'],
            'corporate_mode' => $this->prices['corporate_mode'],
            'rental_fee' => $this->prices['rental_fee'],
            'refundable_deposit' => $this->prices['refundable_deposit']
        ]);

        return redirect()->route('agent.mailbox.index');
    }

    public function render()
    {
        return view('livewire.admin.agent.mailbox.prices')->layout('livewire.admin.master');
    }
}
