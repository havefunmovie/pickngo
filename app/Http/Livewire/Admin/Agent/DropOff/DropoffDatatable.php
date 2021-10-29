<?php

namespace App\Http\Livewire\Admin\Agent\DropOff;

use App\Models\Dropoff;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class DropoffDatatable extends LivewireDatatable
{
    public $model = Dropoff::class;
    public function columns()
    {
        return [
            Column::callback(['status'],function($status)
            {
                if($status == 'Done')
                    return "<i style='font-size:24px;' class='fs-3 text-success mdi mdi-check-all'></i>";
                elseif($status == 'Pickup')
                    return "<i style='font-size:24px;' class='fs-3 text-info mdi mdi-truck'></i>";
                else
                    return "<i style='font-size:24px;' class='text-warning mdi mdi-alert'></i>";
            })->label('status'),
            Column::callback(['created_at'],function($created_at)
            {
                // return substr($created_at,0,10).' &nbsp '.substr($created_at,10);
                return substr($created_at,0,10);
            })->label('receive at'),
            Column::callback(['name'],function($name)
            {
                return strtoupper($name);
            })->label('Name')->searchable(),

            // Column::name('email')->label('Email')->searchable(),
            Column::name('phone')->label('Phone')->searchable(),
            Column::name('tracking_number')->label('Tracking Number')->searchable(),
            Column::name('company')->label('Send By'),
            Column::callback(['send_at'],function($send_at)
            {
                return substr($send_at,0,10).' &nbsp '.substr($send_at,10);
            })->label('send at'),
            Column::callback(['id'], function ($id) {
                return view('livewire.admin.agent.drop-off.table-actions', ['id' => $id]);
            })
        ];
    }

    public function builder()
    {
        return Dropoff::where('agent_id',auth()->user()->id)->orderBy('created_at', 'desc');
    }

    public function showByMe($id) {
        $dropoff = Dropoff::where('id', $id)->first();
        $dropoff['agent'] = User::where('id',$dropoff->dropoff_agent_id)->first();
        $this->dispatchBrowserEvent('dropoff-detail', $dropoff);
    }

    public function edit($id)
    {
        return redirect('/agent/drop-off/'.$id);
    }
}