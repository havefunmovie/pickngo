<?php


namespace App\Http\Livewire\Admin\Orders\Parcel;


use App\Models\OrderParcel;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ParcelAgentDatatable extends LivewireDatatable
{
    public $model = OrderParcel::class;

    public function builder()
    {
        return OrderParcel::where('level','agent');
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
            })->label('Agent Name')->searchable(),
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
                return view('livewire.admin.orders.parcel.table-actions', ['id' => $id, 'name' => $name]);
           })
        ];
    }

    public function showByMe($id) {
        $parcel = OrderParcel::where('id', $id)->with('transactions')->with('user')->get()->toArray();
        $parcel[0]['transactions']['price'] = abs(round($parcel[0]['transactions']['price'] / ($parcel[0]['transactions']['percentage'] == '' ? 1 : $parcel[0]['transactions']['percentage']),2));
        $parcel = array_shift($parcel);
        $this->dispatchBrowserEvent('parcel-detail', $parcel);
    }
}