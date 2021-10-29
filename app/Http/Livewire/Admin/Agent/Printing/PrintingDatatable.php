<?php


namespace App\Http\Livewire\Admin\Agent\Printing;

use App\Models\OrderPrinting;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PrintingDatatable extends LivewireDatatable
{
    public $model = OrderPrinting::class;
    public $PrintingId;
    
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
            Column::name('paper_type')->label('Paper Type'),
            Column::name('user.name')->label('User')->searchable(),
            Column::name('user.email')->label('Email')->searchable(),
            Column::callback(['transactions.price' , 'transactions.percentage'], function ($price,$percentage) {return '$'.abs(round(($price*$percentage)/100 ,2));})->label('earning'),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status')->searchable(),
            Column::callback(['id', 'uploaded_file','agent_accept_status'], function ($id, $file,$agent_accept_status) {
                return view('livewire.admin.agent.printing.table-actions', ['id' => $id, 'file' => $file, 'status' => $agent_accept_status]);
            })
        ];
    }

    public function builder()
    {
        $agent = OrderPrinting::where('order_printing.agent_id', auth()->user()->id)->orderBy('agent_accept_status');
        return $agent;
    }

    public function CheckASDone($id) {
        $this->FaxingId = $id;
        $this->emit('CheckASDone', $id);
        $this->dispatchBrowserEvent('CheckASDone');
    }

    public function showByMe($id) {
        $printing = OrderPrinting::where('id', $id)->with(['user', 'transactions'])->get()->toArray();
        $printing = array_shift($printing);
//        dd($printing);
        $this->dispatchBrowserEvent('printing-detail', $printing);
    }
}