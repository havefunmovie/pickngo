<?php

namespace App\Http\Livewire\Admin\Withdraws;

use App\Models\Invoices;
use App\Models\Transactions;
use App\Models\Withdraws;
use Livewire\Component;

class Successful extends Component
{
    public $info, $validated, $withid, $price, $agent;

    protected array $rules = [
        'info.trans_code' => 'required',
    ];

    public function mount($withid) {
        $this->withid = $withid;

        $result = Withdraws::where('id', $withid)->get()->first();
        $invoice = Invoices::where('id', $result['invoice_id'])->get()->first();
        $this->price = $invoice['balance_value'];
        $this->agent = $invoice['agent_id'];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();

        $trans = Transactions::create([
            'trans_code' => $this->info['trans_code'],
            'price' => (-1) * $this->price,
            'currency' => 'CAD',
            'status' => 'successful',
            'payed_by' => 'admin',
            'system_check' => '1',
            'agent_id' => $this->agent,
            'user_id' => auth()->user()->id,
        ]);

        Withdraws::where('id', $this->withid)->update([
            'status' => 'successful',
            'transaction_id' => $trans->id,
            'admin_check_status' => '1'
        ]);

        return redirect()->route('admin.withdraws.index');
    }

    public function render()
    {
        return view('livewire.admin.withdraws.successful');
    }
}
