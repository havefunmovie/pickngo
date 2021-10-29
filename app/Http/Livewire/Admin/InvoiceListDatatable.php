<?php

namespace App\Http\Livewire\Admin;

use App\Models\Transactions;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class InvoiceListDatatable extends LivewireDatatable
{
    public $end, $start, $agent;

    public $model = Transactions::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            Column::callback(['price'], function ($price) {
                $price = auth()->user()->isAdmin() ? (-1) * $price : $price;
                return $price < 0
                    ? '<span class="text-red-500">-$'. (-1) * $price.'</span>'
                    : '<span class="text-green-500">+$'.$price.'</span>';
            })->label('Price')->searchable(),
            Column::callback([
                'parcel.tracking_code',
                'envelop.tracking_code',
                'faxing.tracking_code',
                'printing.tracking_code',
                'scanning.tracking_code'
            ], function ($parcel, $envelop, $fax, $print, $scan) {
                if (!is_null($parcel))
                    return 'Parcel';
                else if (!is_null($envelop))
                    return 'Envelop';
                else if (!is_null($fax))
                    return 'Faxing';
                else if (!is_null($print))
                    return 'Printing';
                else if (!is_null($scan))
                    return 'Scanning';
            })->label('Order Type')->searchable(),
            Column::name('user.name')->label('User')->searchable(),
            DateColumn::name('created_at')->label('Date')->searchable(),
        ];
    }

    public function builder()
    {
        $invs = auth()->user()->isAdmin()
            ? Transactions::whereBetween('transactions.id', [$this->start, $this->end])->where('transactions.agent_id', $this->agent)
            : Transactions::whereBetween('transactions.id', [$this->start, $this->end])->where('transactions.agent_id', auth()->user()->id);
        return $invs;
    }
}