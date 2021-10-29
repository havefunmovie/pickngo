<?php


namespace App\Http\Livewire\Admin\Orders\Envelop;


use App\Models\OrderEnvelop;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class EnvelopAgentDatatable extends LivewireDatatable
{
    public function builder()
    {
        return OrderEnvelop::where('level','agent');
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
            Column::callback(['line_1_to','city_to','province_to','country_to','postal_code_to'],function($line_1,$city,$province,$country,$postal_code)
            {
                return $line_1.', '.$city.', '.$province.', '.$country.', '.$postal_code;
            })->label('Destination')->searchable(),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status')->searchable(),
            Column::callback(['transactions.price', 'transactions.percentage'], function ($price, $percentage) {
                return '$'.abs(round($price / ($percentage == '' ? 1 : $percentage),2));
            })->label('Price')->searchable(),
           Column::callback(['id', 'tracking_code'], function ($id, $name) {
               return view('livewire.admin.orders.envelop.table-actions', ['id' => $id, 'name' => $name]);
           })
        ];
    }

    public function showByMe($id) {
        $envelop = OrderEnvelop::where('id', $id)->with('transactions')->with('user')->get()->toArray();
        $envelop[0]['transactions']['price'] = abs(round($envelop[0]['transactions']['price'] / ($envelop[0]['transactions']['percentage'] == '' ? 1 : $envelop[0]['transactions']['percentage']),2));
        $envelop = array_shift($envelop);
        $this->dispatchBrowserEvent('envelop-detail', $envelop);
    }
}