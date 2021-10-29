<?php

namespace App\Http\Livewire\Admin\Agent;

use App\Models\AddressBook;
use App\Models\Country;
use Livewire\Component;

class CreateAddressBook extends Component
{
    public $validated, $address;

    protected array $rules = [
        'address.company'      => 'required',
        'address.address1'     => 'required',
        'address.country'      => 'required',
        'address.postal'       => 'required',
        'address.city'         => 'required',
        'address.province'     => 'required',
        'address.attention'    => 'required',
        'address.phone'        => 'required|numeric',
        'address.email'        => 'required|email',
        'address.instruction'  => 'required',
        'address.type'         => 'required',
        'address.service_type' => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function create() {
        $this->validate();

        AddressBook::create([
            'name' => $this->address['company'],
            'user_id' => auth()->user()->id,
            'type' => $this->address['type'],
            'country' => $this->address['country'],
            'province' => $this->address['province'],
            'city' => $this->address['city'],
            'line_1' => $this->address['address1'],
            'line_2' => $this->address['address2'] ?? '',
            'attention' => $this->address['attention'],
            'instruction' => $this->address['instruction'],
            'postal_code' => $this->address['postal'],
            'phone' => $this->address['phone'],
            'email' => $this->address['email'],
            'service_type' => $this->address['service_type'],
        ]);

        return redirect()->route('agent.address-book.index');
    }

    public function render()
    {
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.admin.agent.create-address-book', compact('countries'))->layout('livewire.admin.master');
    }
}
