<?php


namespace App\Http\Livewire\Home\Panel\Account\MyAccount;


use App\Models\Transactions;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TransactionDatatable extends LivewireDatatable
{
    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('trans_code')->label('Transaction Code')->searchable(),
            Column::callback(['price'], function ($price) {
                return '$'.$price;
            })->label('Price'),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status')->searchable(),
            DateColumn::name('created_at')->label('Date')->filterable()
        ];
    }

    public function builder()
    {
        return Transactions::where('user_id', auth()->user()->id);
    }
}