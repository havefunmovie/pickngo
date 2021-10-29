<?php

namespace App\Http\Livewire\Admin\Agent\PrintReceipt;

use App\Models\Receipt;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ReceiptDatatable extends LivewireDatatable
{
    public $model = Receipt::class;
    public function columns()
    {
        return [
            Column::callback(['status'],function($status)
            {
                if($status == 'Done')
                    return "<i style='font-size:24px;' class='fs-3 text-success mdi mdi-check-all'></i>";
                else
                    return "<i style='font-size:24px;' class='text-warning mdi mdi-alert'></i>";
            })->label('status'),
            Column::callback(['created_at'],function($created_at)
            {
                return substr($created_at,0,10).' &nbsp '.substr($created_at,10);
            })->label('receive at'),

            Column::callback(['name'],function($name)
            {
                return strtoupper($name);
            })->label('Name'),

            Column::name('tracking_number')->label('Tracking Number')->searchable(),
            // Column::name('email')->label('Email')->searchable(),
            Column::name('phone')->label('Phone')->searchable(),
            Column::name('country')->label('Country')->searchable(),
            Column::name('province')->label('Province')->searchable(),
            Column::callback(['send_at'],function($send_at)
            {
                return substr($send_at,0,10).' &nbsp '.substr($send_at,10);
            })->label('send at'),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.agent.print-recipt.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return Receipt::where('agent_id',auth()->user()->id)->orderBy('created_at', 'desc');
    }

    public function showByMe($id) {
        $dropoff = Receipt::where('id', $id)->get();
        $dropoff['agent'] = User::where('id',$dropoff[0]->dropoff_agent_id)->get();
        $this->dispatchBrowserEvent('receipt-detail', $dropoff);
    }

    public function edit($id)
    {
        return redirect('/agent/print-receipt/'.$id);
    }
}