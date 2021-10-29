<?php

namespace App\Http\Livewire\Home\Panel\Services\FaxingContent\Faxing;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Models\OrderFaxing;
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
        if ($this->data) {
            Transactions::where('faxing_id', $data['id'])->update([
                'status' => 'successful'
            ]);
        }
    }

    public function getReview($params) {
//        $this->data = $params;
//        $trak_num = new GenerateTrackingNumber();
//        $this->tracking_number = $trak_num->generateBarcodeNumber('faxing');
//
//        try {
//            $order = OrderFaxing::create([
//                'tracking_code' => $this->tracking_number,
//                'phone' => $params['faxing']['number'],
//                'paper_count' => $params['faxing']['count'],
//                'agent_id' => $params['faxing']['agent'],
//                'user_id' => auth()->user()->id,
//            ]);
//
//            Transactions::create([
//                'trans_code' => $params['transaction_id'],
//                'price' => $params['faxing']['price'],
//                'status' => 'successful',
//                'payed_by' => 'paypal',
//                'faxing_id' => $order->id,
//                'user_id' => auth()->user()->id,
//                'agent_id' => $params['faxing']['agent'],
//            ]);
//        } catch (\Exception $e) {
//            dd($e);
//        }
    }

    public function render()
    {
        return view('livewire.home.panel.services.faxing-content.faxing.get-label');
    }
}
