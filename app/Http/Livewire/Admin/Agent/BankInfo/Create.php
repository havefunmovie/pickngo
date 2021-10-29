<?php

namespace App\Http\Livewire\Admin\Agent\BankInfo;

use App\Models\BankInfo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $info, $validated;

    protected array $rules = [
        'info.back_name'          => 'required',
        'info.transaction_number' => 'required',
        'info.branch_code'        => 'required',
        'info.default'            => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function create() {
        $this->validate();
        if($this->info['default'] == '1') {
            DB::table('bank_info')
                ->where('default', '1')
                ->update(['default' => '0']);
        }

        BankInfo::create([
            'back_name'          => $this->info['back_name'],
            'transaction_number' => $this->info['transaction_number'],
            'branch_code'        => $this->info['branch_code'],
            'default'            => $this->info['default'],
            'user_id'            => auth()->user()->id,
        ]);

        return redirect()->route('agent.bank-info.index');
    }

    public function render()
    {
        return view('livewire.admin.agent.bank-info.create')->layout('livewire.admin.master');
    }
}
