<?php

namespace App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel;

use App\Models\Taxes;
use Livewire\Component;

class ServicesGetQuote extends Component
{
//    use WithPagination;

    public $data;
    public $mServiceSummary = [];

//    public $users;

    private $validateError;

    protected $listeners = [
        'get_quote' => 'getQuote'
    ];

    public function getQuote($params, $mServiceSummary) {
        $this->data = $params;
        $this->mServiceSummary = $mServiceSummary;
    }

    public function render()
    {
        $validateError = $this->validateError;
//        $paginationServiceSummary = $this->paginate($this->mServiceSummary);
        return view('livewire.home.panel.services.parcel-content.parcel.get-quote', compact('validateError'/*, 'paginationServiceSummary'*/), [
//            'paginationServiceSummary' => User::paginate(10),
        ]);
    }

    public function selectService($code) {
        $desired_object = array_filter($this->mServiceSummary, function($item) use ($code) {
            return $item['service_code'] == $code;
        });
        $desired_object = array_shift($desired_object);
        $taxes = Taxes::where('province', $this->data['from']['province'])->first();
        $this->data['package']['tax'] = $taxes['tax'] ?? 0;
        $desired_object['negotiated_charge'] = '$'.((float) ltrim($desired_object['negotiated_charge'], '$') * ($taxes['tax'] ?? 0) + ($this->data['package']['insurance'] ?? 0));
        $this->emit('m_step', '2');
        $this->emit('get_service',$this->data, $desired_object);
        $this->emit('get_payment',$this->data, $desired_object);
    }

//    public function paginate($items, $perPage = 15, $page = null, $options = [])
//    {
//        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
//        $items = $items instanceof Collection ? $items : Collection::make($items);
//        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
//    }
}
