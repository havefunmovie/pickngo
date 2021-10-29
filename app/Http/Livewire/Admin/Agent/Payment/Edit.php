<?php

namespace App\Http\Livewire\Admin\Agent\Payment;

use App\Models\Country;
use App\Models\PaymentInfo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $payment, $validated;

    protected array $rules = [
        'payment.address1'     => 'required',
        'payment.name_of_card' => 'required',
        'payment.credit_card'  => 'required',
        'payment.country'      => 'required',
        'payment.ex_month'     => 'required|numeric',
        'payment.ex_year'      => 'required|numeric',
        'payment.postal'       => 'required',
        'payment.cvd_code'     => 'required|numeric',
        'payment.city'         => 'required',
        'payment.province'     => 'required',
        'payment.default'      => 'required',
    ];

    public function mount($id) {
        $this->payment = PaymentInfo::where('id', $id)->where('user_id', auth()->user()->id)->with(['user'])->get()->toArray();
        $this->payment = array_shift($this->payment);
        if ($this->payment == null) {
            abort(403);
        }
//        unset($this->payment['default']);
//        dd($this->payment);
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function defaultCh($val) {

        dd($this);
    }

    public function edit() {
        $this->validate();
        if($this->payment['default'] == '1') {
            DB::table('payment_info')
                ->where('default', '1')
                ->update(['default' => '0']);
        }

        PaymentInfo::where('id', $this->payment['id'])->update([
            'address1' => $this->payment['address1'],
            'name_of_card' => $this->payment['name_of_card'],
            'address2' => $this->payment['address2'] ?? '',
            'credit_card' => $this->payment['credit_card'],
            'country' => $this->payment['country'],
            'ex_month' => $this->payment['ex_month'],
            'ex_year' => $this->payment['ex_year'],
            'postal' => $this->payment['postal'],
            'cvd_code' => $this->payment['cvd_code'],
            'city' => $this->payment['city'],
            'province' => $this->payment['province'],
            'default' => $this->payment['default'],
        ]);

        return redirect()->route('agent.payment.index');
    }

    public function render()
    {
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.admin.agent.payment.edit', compact('validated', 'countries'))->layout('livewire.admin.master');
    }
}
