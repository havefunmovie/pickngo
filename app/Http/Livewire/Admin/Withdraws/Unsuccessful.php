<?php

namespace App\Http\Livewire\Admin\Withdraws;

use App\Models\Withdraws;
use Livewire\Component;

class Unsuccessful extends Component
{
    public $info, $validated, $withid;

    protected array $rules = [
        'info.message' => 'required',
    ];

    public function mount($withid) {
        $this->withid = $withid;
//        dd($withid);
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();
        Withdraws::where('id', $this->withid)->update([
            'status' => 'unsuccessful',
            'admin_fail_msg' => $this->info['message'],
            'admin_check_status' => '1'
        ]);

        return redirect()->route('admin.withdraws.index');
    }

    public function render()
    {
        return view('livewire.admin.withdraws.unsuccessful');
    }
}
