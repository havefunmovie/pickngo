<?php

namespace App\Http\Livewire\Admin\Withdraws;

use App\Models\BankInfo;
use App\Models\Withdraws;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class WithdrawDatatable extends LivewireDatatable
{
    public $model = Withdraws::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['invoice.balance_value'], function ($balance) {
                return $balance > 0
                    ? '<span class="text-red-500">-$' . $balance . '</span>'
                    : '<span class="text-green-500">+$' . (-1) * $balance . '</span>';
            })->label('Balance')->searchable(),
            Column::name('invoice.agent.name')->label('Agent')->searchable(),
            Column::name('transaction.trans_code')->label('Tracking Code')->searchable(),
            Column::callback(['admin_check_status'], function ($check) {
                return $check === '0'
                    ? '<span class="text-green-500">New</span>'
                    : '';
            })->label('Status'),
            Column::callback(['id', 'invoice.agent_id'], function ($id, $agent) {
                return view('livewire.admin.withdraws.table-actions', ['id' => $id, 'agent' => $agent]);
            })
        ];
    }

    public function bankInfo($agent) {
        $bank = BankInfo::where('user_id', $agent)->where('default', '1')->get()->first();
        $this->dispatchBrowserEvent('bank-detail', $bank);
    }

    public function pay($id) {
        $this->dispatchBrowserEvent('pay-detail', $id);
    }
}