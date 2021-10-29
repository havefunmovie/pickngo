<?php

namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use App\Models\Country;
use App\Models\PaymentInfo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $method, $validated;

    protected array $rules = [
        'method.address1'     => 'required',
        'method.name_of_card' => 'required',
        'method.credit_card'  => 'required',
        'method.country'      => 'required',
        'method.ex_month'     => 'required|numeric',
        'method.ex_year'      => 'required|numeric',
        'method.postal'       => 'required',
        'method.cvd_code'     => 'required|numeric',
        'method.city'         => 'required',
        'method.province'     => 'required',
        'method.default'      => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function create() {
        $this->validate();

        if($this->method['default'] == '1') {
            DB::table('payment_info')
                ->where('default', '1')
                ->update(['default' => '0']);
        }

        PaymentInfo::create([
            'address1' => $this->method['address1'],
            'name_of_card' => $this->method['name_of_card'],
            'address2' => $this->method['address2'] ?? '',
            'credit_card' => $this->method['credit_card'],
            'country' => $this->method['country'],
            'ex_month' => $this->method['ex_month'],
            'ex_year' => $this->method['ex_year'],
            'postal' => $this->method['postal'],
            'cvd_code' => $this->method['cvd_code'],
            'city' => $this->method['city'],
            'province' => $this->method['province'],
            'default' => $this->method['default'],
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('home.account.payment-methods.methods');
    }

    public function render()
    {
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.panel.account.my-account.create', compact('countries', 'validated'));
    }
}
