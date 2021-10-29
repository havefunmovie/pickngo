<?php

namespace App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup;

use App\Events\NewOrderEvent;
use App\Models\OrderPackage;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Storage;

class ServicesGetLabel extends Component
{
    public $data, $error, $api_key;

    public $label;

    protected $listeners = [
        'get_label' => 'getLabel'
    ];

    public function mount($data , $apiKey) {
        $this->api_key = $apiKey;
        $this->data = $data;
        if ($data) {
            $label = $this->label;
            $this->label = "<img src='{$this->label}' />";
            $image = str_replace('data:image/jpeg;base64,', '', $label);
            $image = str_replace(' ', '+', $image);
            $imageName = $data['tracking_code'] . '.png';

            Storage::disk('public_files')->put('images/labels/' . $imageName, base64_decode($image));
            $order = OrderPackage::where('id', $data['id'])->first();
            $order->update([
                'tracking_code' => $data['tracking_code'],
                'label' => $imageName,
                'status' => 'successful'
            ]);
            
            Transactions::where('puckup_delivery_id', $data['id'])->update([
                'status' => 'successful'
            ]);
            
            Session::put('image', $data['id']);
            Session::put('label-type', 'pickup');
            Session::put('invoice', $data['id']);
            Session::put('invoice-type', 'pickup');

            Event(new NewOrderEvent(Auth::user(),$order));
        }
    }

    public function render()
    {
        return view('livewire.home.panel.services.pickup-content.pickup.get-label');
    }
}
