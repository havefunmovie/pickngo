<?php

namespace App\Http\Livewire\Admin\Agent\Payment;

use App\Models\Country;
use App\Models\PaymentInfo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $validated, $payment;

    protected array $rules = [
        'payment.address1'    => 'required',
        'payment.card-name'   => 'required',
        'payment.country'     => 'required',
        'payment.postal'      => 'required',
        'payment.city'        => 'required',
        'payment.province'    => 'required',
        'payment.exp-month'   => 'required|numeric',
        'payment.exp-year'    => 'required|numeric',
        'payment.cvd'         => 'required|numeric',
        'payment.credit-card' => 'required',
        'payment.default'     => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function add() {
        $this->validate();

        if($this->payment['default'] == '1') {
            DB::table('payment_info')
                ->where('default', '1')
                ->update(['default' => '0']);
        }

        PaymentInfo::create([
            'address1' => $this->payment['address1'],
            'name_of_card' => $this->payment['card-name'],
            'address2' => $this->payment['address2'] ?? '',
            'credit_card' => $this->payment['credit-card'],
            'country' => $this->payment['country'],
            'ex_month' => $this->payment['exp-month'],
            'ex_year' => $this->payment['exp-year'],
            'postal' => $this->payment['postal'],
            'cvd_code' => $this->payment['cvd'],
            'city' => $this->payment['city'],
            'province' => $this->payment['province'],
            'default' => $this->payment['default'],
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('agent.payment.index');
    }
    
    public function render()
    {
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.admin.agent.payment.create', compact('validated', 'countries'))->layout('livewire.admin.master');
    }
}
