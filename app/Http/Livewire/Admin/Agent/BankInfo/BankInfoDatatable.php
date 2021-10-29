<?php

namespace App\Http\Livewire\Admin\Agent\BankInfo;

use App\Models\BankInfo;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BankInfoDatatable extends LivewireDatatable
{
    public $model = BankInfo::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('back_name')->label('Bank Name')->searchable(),
            Column::name('transaction_number')->label('Trans Number')->searchable(),
            Column::name('branch_code')->label('Branch Code')->searchable(),
            Column::callback(['default'], function ($default) {
                return $default === '1'
                    ? '<span class="text-green-500 text-xl"><i class="mdi mdi-marker-check"></i></span>'
                    : '';
            })->label('Default')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.agent.bank-info.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return BankInfo::where('user_id', auth()->user()->id);
    }

    public function deleteByMe($id) {

    }
}