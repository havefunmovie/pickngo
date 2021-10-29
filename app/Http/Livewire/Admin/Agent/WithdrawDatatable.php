<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\Invoices;
use App\Models\Withdraws;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class WithdrawDatatable extends LivewireDatatable
{
    public $model = Invoices::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['balance_value'], function ($balance) {
                return $balance < 0
                    ? '<span class="text-red-500">-$' . (-1) * $balance . '</span>'
                    : '<span class="text-green-500">+$' . $balance . '</span>';
            })->label('Balance'),
            Column::name('agent.name')->label('Agent')->searchable(),
            Column::name('transactions.trans_code')->label('Tracking Code')->searchable(),
            Column::callback(['withdraws.admin_check_status'], function ($check) {
                return $check === '0'
                    ? '<span class="text-red-500">Not Checked</span>'
                    : '<span class="text-green-500">Checked</span>';
            })->label('Status'),
            Column::callback(['withdraws.admin_fail_msg', 'withdraws.status'], function ($msg, $status) {
                return view('livewire.admin.agent.withdraw-table-actions', ['status' => $status, 'msg' => $msg]);
            })
        ];
    }

    public function builder()
    {
        $withs = Invoices::join('withdraws', 'invoices.id', '=', 'withdraws.invoice_id')
            ->join('transactions', 'transactions.id', '=', 'withdraws.transaction_id')
            ->where('invoices.agent_id', auth()->user()->id)/*->get(['withdraws.*', 'transactions.*', 'invoices.*'])*/;
//        dd($withs);
        return $withs;
    }
}