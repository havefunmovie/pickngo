<?php


namespace App\Http\Livewire\Admin\Orders\Scanning;


use App\Models\OrderScanning;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ScanningAgentDatatable extends LivewireDatatable
{
    public $model = OrderScanning::class;

    public function builder()
    {
        return OrderScanning::where('level','agent');
    }

    public function columns()
    {
        return [
            Column::callback(['created_at'],function($created_at)
            {
                return substr($created_at,0,10)." &nbsp &nbsp ".substr($created_at,10,);
            })->label('Date'),
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            Column::callback(['user.name', 'user.family'], function ($name, $family) {
                return $name.' '.$family;
            })->label('Customer Name')->searchable(),
            Column::name('user.mobile')->label('Phone')->searchable(),
            Column::name('email')->label('Email')->searchable(),
            Column::name('paper_count')->label('Paper Count')->searchable(),
         
            
            Column::callback(['agent_accept_status'], function ($agent_accept_status) {
                return $agent_accept_status === 'Accept'
                    ? '<span class="text-green-500">Accepted</span>'
                    : ($agent_accept_status === 'Reject' ? '<span class="text-red-500">Rejected</span>' : '<span class="text-yellow-500">Pending</span>');
            })->label('Status')->searchable(),
            Column::callback(['transactions.price', 'transactions.percentage'], function ($price, $percentage) {
                return '$'.abs(round($price / ($percentage == '' ? 1 : $percentage),2));
            })->label('Price')->searchable(),
           Column::callback(['id', 'tracking_code'], function ($id, $name) {
                return view('livewire.admin.orders.scanning.table-actions', ['id' => $id, 'name' => $name]);
           })
        ];
    }

    public function showByMe($id) {
        $scanning = OrderScanning::where('id', $id)->with('transactions')->with('user')->with('agent')->get()->toArray();
        $scanning[0]['transactions']['price'] = abs(round($scanning[0]['transactions']['price'] / ($scanning[0]['transactions']['percentage'] == '' ? 1 : $scanning[0]['transactions']['percentage']),2));
        if(!$scanning[0]['agent_accept_status'])
            $scanning[0]['agent_accept_status'] = 'Pending';
        $scanning = array_shift($scanning);
        $this->dispatchBrowserEvent('scanning-detail', $scanning);
    }
}