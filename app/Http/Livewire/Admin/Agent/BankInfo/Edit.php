<?php

namespace App\Http\Livewire\Admin\Agent\BankInfo;

use App\Models\BankInfo;
use App\Models\infoInfo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $info, $validated;

    protected array $rules = [
        'info.back_name'          => 'required',
        'info.transaction_number' => 'required',
        'info.branch_code'        => 'required',
        'info.default'            => 'required',
    ];

    public function mount($id) {
        $this->info = BankInfo::where('id', $id)->where('user_id', auth()->user()->id)->get()->first();
//        $this->info = array_shift($this->info);
        if (is_null($this->info)) {
            abort(403);
        }
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();
        if($this->info['default'] == '1') {
            DB::table('bank_info')
                ->where('default', '1')
                ->update(['default' => '0']);
        }

        BankInfo::where('id', $this->info['id'])->update([
            'back_name'          => $this->info['back_name'],
            'transaction_number' => $this->info['transaction_number'],
            'branch_code'        => $this->info['branch_code'],
            'default'            => $this->info['default'],
        ]);

        return redirect()->route('agent.bank-info.index');
    }
    
    public function render()
    {
        return view('livewire.admin.agent.bank-info.edit')->layout('livewire.admin.master');
    }
}
