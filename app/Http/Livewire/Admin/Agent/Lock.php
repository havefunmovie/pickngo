<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\Transactions;
use App\Models\User;
use Livewire\Component;
use App\Models\Invoices;

class Lock extends Component
{
    protected $listeners = [
        'payed'
    ];

    public function payed($trans_code, $price) {
        Transactions::create([
            'trans_code' => $trans_code,
            'price' => $price,
            'currency' => 'CAD',
            'status' => 'successful',
            'payed_by' => 'agent',
            'agent_id' => auth()->user()->id,
            'user_id' => auth()->user()->id,
            'system_check' => '1'
        ]);

        User::where('id', auth()->user()->id)->update([
            'status' => '1'
        ]);

        return redirect()->route('agent.index');
    }

    public function render()
    {
        $invs = Invoices::where('agent_id', auth()->user()->id)->get()->last();
        return view('livewire.admin.agent.lock', compact('invs'))->layout('livewire.admin.lock');
    }
}
