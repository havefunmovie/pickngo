<?php

namespace App\Http\Livewire\Home\Panel\Services\PrintingContent\Printing;

use App\Http\Livewire\Admin\Agent\GenerateTrackingNumber;
use App\Models\OrderPrinting;
use App\Models\Temp;
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
            Transactions::where('printing_id', $data['id'])->update([
                'status' => 'successful'
            ]);
        }
    }

    public function getReview($params) {
//        $this->data = $params;
//        $this->emit('m_step', '3');
//
//        $trak_num = new GenerateTrackingNumber();
//        $this->tracking_number = $trak_num->generateBarcodeNumber('printing');
//        try {
//            $order = OrderPrinting::create([
//                'tracking_code' => $this->tracking_number,
//                'paper_type' => $params['paper']['paper_type'],
//                'color_type' => $params['paper']['paper_color'],
//                'uploaded_file' => $params['paper']['photo'],
//                'paper_count' => $params['paper']['paper_num'],
//                'agent_id' => $params['agent']['id'],
//                'user_id' => auth()->user()->id,
//            ]);
//
//            Temp::where('temp_file', $params['paper']['photo'])->where('user_id', auth()->user()->id)->delete();
//
//            Transactions::create([
//                'trans_code' => $params['transaction_id'],
//                'price' => $params['paper']['price'],
//                'status' => 'successful',
//                'payed_by' => 'paypal',
//                'printing_id' => $order->id,
//                'user_id' => auth()->user()->id,
//                'agent_id' => $params['agent']['id'],
//            ]);
//        } catch (\Exception $e) {
//            dd($e);
//        }
    }

    public function render()
    {
        return view('livewire.home.panel.services.printing-content.printing.get-label');
    }
}
