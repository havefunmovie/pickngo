<?php

namespace App\Http\Livewire\Admin\Invoices;

use App\Models\Invoices;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class InvoiceDatatable extends LivewireDatatable
{
    public $model = Invoices::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::name('invoice_number')->label('Number')->searchable(),
            Column::name('agent.name')->label('Agent')->searchable(),
            Column::callback(['balance_value'], function ($balance) {
                return $balance > 0
                    ? '<span class="text-red-500">-$' . $balance . '</span>'
                    : '<span class="text-green-500">+$' . (-1) * $balance . '</span>';
            })->label('Balance')->searchable(),
            DateColumn::name('created_at')->label('Date')->searchable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.invoices.table-actions', ['id' => $id]);
            })
        ];
    }

    public function print($id) {
        return redirect()->route('admin.invoice-list', $id);
    }
}