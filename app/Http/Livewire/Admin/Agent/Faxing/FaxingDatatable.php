<?php


namespace App\Http\Livewire\Admin\Agent\Faxing;

use App\Models\OrderFaxing;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class FaxingDatatable extends LivewireDatatable
{
    public $model = OrderFaxing::class;
    public $FaxingId;
    public function columns()
    {
        return [
            Column::callback(['created_at'],function($created_at)
            {
                return substr($created_at,0,10)." &nbsp &nbsp ".substr($created_at,10,);
            })->label('Date'),
            Column::callback(['agent_accept_status'], function ($agent_accept_status) {;
                if(!$agent_accept_status)
                    return '<i class="text-2xl text-danger mdi mdi-information"></i>';
            }),
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            Column::name('paper_count')->label('Paper Count')->searchable(),
            Column::name('user.name')->label('User')->searchable(),
            Column::callback(['transactions.price', 'transactions.percentage'], function ($price, $percentage) {
                return '$'.abs(round(($price * $percentage)/100,2));
            })->label('Price'),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status')->searchable(),
            Column::callback(['id','agent_accept_status'], function ($id,$agent_accept_status) {
                return view('livewire.admin.agent.faxing.table-actions', ['id' => $id, 'status' => $agent_accept_status]);
            })
        ];
    }

    public function builder()
    {
        $agent = OrderFaxing::where('order_faxing.agent_id', auth()->user()->id)->orderBy('agent_accept_status');
        return $agent;
    }

    public function CheckASDone($id) {
        $this->FaxingId = $id;
        $this->emit('CheckASDone', $id);
        $this->dispatchBrowserEvent('CheckASDone');
    }

    public function showByMe($id) {
        $faxing = OrderFaxing::where('id', $id)->with(['user', 'transactions'])->get()->toArray();
        $faxing = array_shift($faxing);
//        dd($faxing);
        $this->dispatchBrowserEvent('faxing-detail', $faxing);
    }
}