<?php

namespace App\Http\Livewire\Admin\Agent;

use Livewire\Component;
use App\Models\Withdraws;

class Invoices extends Component
{
    public $success, $error;

    protected $listeners = [
        'cash'
    ];

    public function render()
    {
        return view('livewire.admin.agent.invoices')->layout('livewire.admin.master');
    }

    public function cash($id) {
        $withds = Withdraws::where('invoice_id', $id)->get()->first();

        if ($withds) {
            $this->success = false;
            $this->error = 'Your request has been send successfully!';
        } else {
            $invs = \App\Models\Invoices::where('id', $id)->where('agent_id', auth()->user()->id)->get()->first();

            if ($invs && $invs->balance_value > 0) {
                Withdraws::create([
                    'invoice_id' => $id
                ]);

                \App\Models\Invoices::where('id', $id)
                    ->update([
                        'withdraw_status' => 1
                    ]);

                $this->error = false;
                $this->success = 'Your request sent successfully!';
            } else {
                $this->success = false;
                $this->error = 'Your request didnt send successfully!';
            }
        }
        $this->emit('alert_remove');
    }
}
