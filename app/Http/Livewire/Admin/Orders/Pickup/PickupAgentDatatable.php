<?php


namespace App\Http\Livewire\Admin\Orders\Pickup;

use App\Models\OrderPackage;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class PickupAgentDatatable extends LivewireDatatable
{
    public $model = OrderPackage::class;

    public function builder()
    {
        return OrderPackage::where('level', 'agent');
    }

    public function columns()
    {
        return [
            Column::callback(['created_at'],function($created_at)
            {
                return substr($created_at,0,10)." &nbsp &nbsp ".substr($created_at,10,);
            })->label('Date'),
            Column::name('tracking_code')->label('Tracking Code')->searchable(),
            Column::name('order.user.name')->label('Name of User')->searchable(),
            Column::callback(['transactions.status'], function ($status) {
                return $status === 'successful'
                    ? '<span class="text-green-500">Successful</span>'
                    : ($status === 'pending' ? '<span class="text-yellow-500">Pending</span>' : '<span class="text-red-500">Unsuccessful</span>');
            })->label('Status')->searchable(),
            Column::callback(['transactions.price'], function ($price) {
                return '$'.abs($price);
            })->label('Price')->searchable(),
            Column::callback(['id', 'tracking_code'], function ($id, $name) {
              return view('livewire.admin.orders.pickup-delivery.table-actions', ['id' => $id, 'name' => $name]);
          })
        ];
    }

    public function showByMe($id) {
      $pickup = OrderPackage::where('id', $id)->with('transactions')->with('user')->get()->toArray();
      $pickup[0]['transactions']['price'] = abs(round($pickup[0]['transactions']['price'] / ($pickup[0]['transactions']['percentage'] == '' ? 1 : $pickup[0]['transactions']['percentage']),2));
      $pickup = array_shift($pickup);
      $this->dispatchBrowserEvent('pickup-detail', $pickup);
  }
}