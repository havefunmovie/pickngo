<?php

namespace App\Http\Livewire\Home\Panel\Services\EnvelopContent\Envelop\Details;

use App\Models\AddressBook;
use App\Models\Country;
use Session;
use Livewire\Component;
use Ups\Entity\Address;
use Ups\SimpleAddressValidation;

class From extends Component
{
    public $from = [];

    private $validateError;

    public $validated;

    protected $listeners = [
        'edit_from' => 'editFrom',
        'set_from' => 'setFrom',
        'set_address_from' => 'setAddress'
    ];

    protected array $rules = [
        'from.company'     => 'required',
        'from.address1'    => 'required',
        'from.address2'    => 'string',
        'from.country'     => 'required',
        'from.postal'      => 'required',
        'from.city'        => 'required',
        'from.province'    => 'required',
        'from.attention'   => 'required',
        'from.phone'       => 'required|numeric',
        'from.email'       => 'email',
        'from.instruction' => 'string',
    ];

    public function setAddress($id) {
        if ($id !== '') {
            $address = AddressBook::where('id', $id)->get()->first();
            $this->from['company'] = $address['name'];
            $this->from['address1'] = $address['line_1'];
            $this->from['country'] = $address['country'];
            $this->from['postal'] = $address['postal_code'];
            $this->from['city'] = $address['city'];
            $this->from['province'] = $address['province'];
            $this->from['attention'] = $address['attention'];
            $this->from['phone'] = $address['phone'];
            $this->from['email'] = $address['email'];
            $this->from['instruction'] = $address['instruction'];
            $this->from['address2'] = $address['line_2'];
            $this->from['is-ab'] = true;
            $this->validate();
        } else {
            $this->from = false;
        }
    }

    public function editFrom($from)
    {
        $this->from = $from;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function saveFrom()
    {
        $this->validate();
        if (! $this->addressValidate())
            return true;
        if (!isset($this->from['addressBook']))
            $this->from['addressBook'] = false;
        $this->emitUp('next_step','from',$this->from);
    }

//    public function mount() {
//        if (Session::has('envelop')) {
//            $data = Session::get('envelop');
//            $from['country'] = $data['fromCountry'];
//            $from['postal'] = $data['fromPostal'];
//            $from['city'] = $data['fromCity'];
//        }
//    }

    public function render()
    {
        if (Session::has('fromCountry')) {
            $data = Session::get('fromCountry');
            $this->from['country'] = $data;
            $data = Session::get('fromPostal');
            $this->from['postal'] = $data;
            $data = Session::get('fromCity');
            $this->from['city'] = $data;
        }
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        $validateError = $this->validateError;
        return view('livewire.home.panel.services.envelop-content.envelop.details.from',compact('validated','countries','validateError'));
    }

    private function addressValidate()
    {
        $address = new Address();
//        $address->setStateProvinceCode('NY');
//        $address->setCity($this->from['city']);
//        $address->setCountryCode($this->from['country']);
//        $address->setPostalCode($this->from['Postal']);

        $address->setCity('New York');
        $address->setCountryCode('US');
        $address->setPostalCode('10000');

        $av = new SimpleAddressValidation('CD97722D88D5ECD5', 'TUPSS370', 'H7v2v2845');
        try {
            $response = $av->validate($address);
            return $response;
        } catch (\Exception $e) {
            $this->validateError = $e->getMessage();
            return false;
        }
    }
}
