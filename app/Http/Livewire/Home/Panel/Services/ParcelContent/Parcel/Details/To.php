<?php

namespace App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel\Details;

use App\Models\AddressBook;
use App\Models\Country;
use Session;
use Livewire\Component;

class To extends Component
{
    public $to = [];

    public $validated;

    protected array $rules = [
        'to.company'     => 'required',
        'to.address1'    => 'required',
        'to.address2'    => 'string',
        'to.country'     => 'required',
        'to.postal'      => 'required',
        'to.city'        => 'required',
        'to.province'    => 'required',
        'to.attention'   => 'required',
        'to.phone'       => 'required|numeric',
        'to.email'       => 'email',
        'to.instruction' => 'string',
    ];

    protected $listeners = [
        'edit_to' => 'editTo',
        'set_to' => 'setTo',
        'set_address_to' => 'setAddress'
    ];

    public function editTo($to)
    {
        $this->to = $to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function setAddress($id) {
        if ($id !== '') {
            $address = AddressBook::where('id', $id)->get()->first();
            $this->to['company'] = $address['name'];
            $this->to['address1'] = $address['line_1'];
            $this->to['country'] = $address['country'];
            $this->to['postal'] = $address['postal_code'];
            $this->to['city'] = $address['city'];
            $this->to['province'] = $address['province'];
            $this->to['attention'] = $address['attention'];
            $this->to['phone'] = $address['phone'];
            $this->to['email'] = $address['email'];
            $this->to['instruction'] = $address['instruction'];
            $this->to['address2'] = $address['line_2'];
            $this->to['is-ab'] = true;
            $this->validate();
        } else {
            $this->to = false;
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function saveTo()
    {
        $this->validate();
        if (!isset($this->to['addressBook']))
            $this->to['addressBook'] = false;
        $this->emitUp('next_step','to',$this->to);
    }

    public function back()
    {
        $this->emitUp('preview_step');
    }

    public function render()
    {
        if (Session::has('toCountry')) {
            $data = Session::get('toCountry');
            $this->to['country'] = $data;
            $data = Session::get('toPostal');
            $this->to['postal'] = $data;
            $data = Session::get('toCity');
            $this->to['city'] = $data;
        }
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.home.panel.services.parcel-content.parcel.details.to',compact('validated','countries'));
    }

}
