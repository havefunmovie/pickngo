<?php


namespace App\Http\Livewire\Admin\Agent\Envelop;


use App\Http\Livewire\Home\Panel\Orders\GetTracking;
use App\Models\OrderEnvelop;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class EnvelopDatatable extends LivewireDatatable
{
    public $model = OrderEnvelop::class;

    public function columns()
    {
        return [
            Column::callback(['created_at'],function($created_at)
            {
                return substr($created_at,0,10)." &nbsp &nbsp ".substr($created_at,10,);
            })->label('Date'),
            
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            Column::name('user.name')->label('Customer Name')->searchable(),
            Column::name('user.mobile')->label('Phone')->searchable(),
            Column::callback(['line_1_to','city_to','province_to','country_to','postal_code_to'],function($line_1,$city,$province,$country,$postal_code)
            {
                return $line_1.', '.$city.', '.$province.', '.$country.', '.$postal_code;
            })->label('Destination'),
            Column::callback(['transactions.price', 'transactions.percentage'], function ($price, $percentage) {
                return '$'.abs(round(($price*$percentage)/100 ,2));
            })->label('Price'),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status'),
            Column::callback(['id', 'tracking_code'], function ($id, $name) {
                return view('livewire.admin.agent.envelop.table-actions', ['id' => $id, 'name' => $name]);
            })
        ];
    }

    public function builder()
    {
        return OrderEnvelop::where('order_envelop.agent_id', auth()->user()->id);
    }

    public function reship($id) {
        session()->flash('reship', $id);
        return redirect()->route('agent.envelop.create');
    }

    public function showByMe($id) {
        $envelop = OrderEnvelop::where('id', $id)->with('transactions')->with('user')->get()->toArray();
        $envelop = array_shift($envelop);
        $this->dispatchBrowserEvent('envelop-detail', $envelop);
    }

    public function followUp($id) {
        $envelop = OrderEnvelop::where('id', $id)->where('user_id', auth()->user()->id)->get()->first()->toArray();
        try {
            $tracking = new GetTracking();
            $this->dispatchBrowserEvent('activity-detail', $tracking->getActivity($envelop['tracking_code'])->Package->Activity);
        } catch (\Exception $e) {
            $this->emit('set_error', $e->getMessage());
            $this->emit('alert_remove');
        }
    }
}