<?php

namespace App\Http\Livewire\Home\Panel\Services\ScanningContent\Scanning;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Models\OrderScanning;
use App\Models\Transactions;
use Livewire\Component;

class ServicesGetLabel extends Component
{
    public $data;

    public $tracking_number;

    protected $listeners = [
        'get_review' => 'getReview'
    ];

    public function mount($data) {
        $this->data = $data;
//        dd($data);
        if ($this->data) {
            Transactions::where('scanning_id', $data['id'])->update([
                'status' => 'successful'
            ]);
        }
    }

    public function getReview($params) {
//        $this->data = $params;
//
//        dd($params);
//        $trak_num = new GenerateTrackingNumber();
//        $this->tracking_number = $trak_num->generateBarcodeNumber('scanning');
//        try {
//            $order = OrderScanning::create([
//                'tracking_code' => $this->tracking_number,
//                'email' => $params['scanning']['email'],
//                'paper_count' => $params['scanning']['count'],
//                'agent_id' => $params['scanning']['agent'],
//                'user_id' => auth()->user()->id,
//            ]);
//
//            Transactions::create([
//                'trans_code' => $params['transaction_id'],
//                'price' => $params['scanning']['price'],
//                'status' => 'successful',
//                'payed_by' => 'paypal',
//                'scanning_id' => $order->id,
//                'user_id' => auth()->user()->id,
//                'agent_id' => $params['scanning']['agent'],
//            ]);
//        } catch (\Exception $e) {
//            dd($e);
//        }
    }

    public function render()
    {
        return view('livewire.home.panel.services.scanning-content.scanning.get-label');
    }
}
