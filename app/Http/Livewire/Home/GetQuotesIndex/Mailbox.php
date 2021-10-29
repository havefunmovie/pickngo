<?php

namespace App\Http\Livewire\Home\GetQuotesIndex;

use App\Models\MailboxPrices;
use App\Models\MailboxTypes;
use App\Models\User;
use Livewire\Component;

class Mailbox extends Component
{
    public $mailbox;
    public $validated;
    public $rates;
    public $service;
    public $box_types;

    protected array $rules = [
        'mailbox.agent' => 'required',
        'mailbox.mailbox_type_id' => 'required',
        'mailbox.usage_type' => 'required',
    ];

    public function mailboxQuote()
    {
        $this->validate();
        $this->rates = true;
    }

    public function continueMailbox()
    {
        session()->flash('agent', $this->mailbox['agent']);
        session()->flash('mailbox_type_id', $this->mailbox['mailbox_type_id']);
        session()->flash('usage_type', str_replace('_mode', '', $this->mailbox['usage_type']));
        return redirect()->route('home.services.mailbox');
    }

    public function getQuote()
    {
        $data = $this->mailbox;

        $prices = MailboxPrices::where('agent_id', $data['agent'])->get()->first();
        $types = MailboxTypes::where('id', $data['mailbox_type_id'])->get()->first();

        $price = $prices[$data['usage_type']];
        $price += $types['price'];

        $quotes[] = [
            'service' => 'Mailbox',
            'price' => $price
        ];

        $this->mailbox['price'] = $price;

        return $quotes;
    }

    public function backMailbox(){
        $this->rates = false;
    }

    public function render()
    {
        $recommends = null;
        if ($this->rates){
            $recommends = collect($this->getQuote());
        }

        if (isset($this->mailbox['agent'])) {
            $this->box_types = MailboxTypes::where('agent_id', $this->mailbox['agent'])->get();
        }
        $agents = User::where('level', 'agent')->where('status', '1')->get();
        return view('livewire.home.sections.getQuotes.mailbox', compact('agents', 'recommends'));
    }
}
