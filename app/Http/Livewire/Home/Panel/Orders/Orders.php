<?php


namespace App\Http\Livewire\Home\Panel\Orders;

use Livewire\Component;

class Orders extends Component
{
    protected $param;

    public function render()
    {
        $param = request()->segment(count(request()->segments()));
        return view('livewire.home.panel.orders.parcel-orders', compact('param'));
    }

    public function redirectTohome($param)
    {
        return redirect()->route('home.services.'.$param);
    }
}
