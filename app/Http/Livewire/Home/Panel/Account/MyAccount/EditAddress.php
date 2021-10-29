<?php

namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use App\Models\AddressBook;
use App\Models\Country;
use Livewire\Component;

class EditAddress extends Component
{
    public $validated, $address;
    public $addressId;

    protected array $rules = [
        'address.name'      => 'required',
        'address.line_1'     => 'required',
        'address.country'      => 'required',
        'address.postal_code'  => 'required',
        'address.city'         => 'required',
        'address.province'     => 'required',
        'address.attention'    => 'required',
        'address.phone'        => 'required|numeric',
        'address.email'        => 'required|email',
        'address.instruction'  => 'required',
        'address.type'         => 'required',
        'address.service_type' => 'required',
    ];

    public function mount($id) {
        $this->address = \App\Models\AddressBook::where('id', $id)->first();
        $this->addressId = $id;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function edit() {
        $this->validate();

        AddressBook::where('id', $this->addressId)->update([
            'name' => $this->address['name'],
            'user_id' => auth()->user()->id,
            'type' => $this->address['type'],
            'country' => $this->address['country'],
            'province' => $this->address['province'],
            'city' => $this->address['city'],
            'line_1' => $this->address['line_1'],
            'line_2' => $this->address['line_2'] ?? '',
            'attention' => $this->address['attention'],
            'instruction' => $this->address['instruction'],
            'postal_code' => $this->address['postal_code'],
            'phone' => $this->address['phone'],
            'email' => $this->address['email'],
            'service_type' => $this->address['service_type'],
        ]);

        return redirect()->route('home.account.address-book');
    }

    public function render()
    {
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.panel.account.my-account.edit-address', compact('countries'));
    }
}
