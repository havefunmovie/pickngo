<?php


namespace App\Http\Livewire\Admin\Orders\Faxing;


use App\Models\OrderFaxing;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class FaxingDatatable extends LivewireDatatable
{
    public $model = OrderFaxing::class;

    public function builder()
    {
        return OrderFaxing::where('level', null);
    } 

    public function columns()
    {
        return [
            Column::callback(['created_at'],function($created_at)
            {
                return substr($created_at,0,10)." &nbsp &nbsp ".substr($created_at,10,);
            })->label('Date'),
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            Column::name('paper_count')->label('Paper Count')->searchable(),
            Column::name('user.name')->label('User')->searchable(),
            Column::callback(['agent_accept_status'], function ($agent_accept_status) {
                return $agent_accept_status === 'Accept'
                    ? '<span class="text-green-500">Accepted</span>'
                    : ($agent_accept_status === 'Reject' ? '<span class="text-red-500">Rejected</span>' : '<span class="text-yellow-500">Pending</span>');
            })->label('Status')->searchable(),
            Column::callback(['transactions.price'], function ($price) {
                return '$'.abs($price);
            })->label('Price')->searchable(),
            Column::callback(['id', 'tracking_code'], function ($id, $name) {
                return view('livewire.admin.orders.faxing.table-actions', ['id' => $id, 'name' => $name]);
            })
        ];
    }

    public function showByMe($id) {
        $Faxing = OrderFaxing::where('id', $id)->with('transactions')->with('user')->with('agent')->get()->toArray();
        if(!$Faxing[0]['agent_accept_status'])
            $Faxing[0]['agent_accept_status'] = 'Pending';
        $Faxing = array_shift($Faxing);
        $this->dispatchBrowserEvent('faxing-detail', $Faxing);
    }
}