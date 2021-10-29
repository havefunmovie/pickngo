<?php

namespace App\Http\Livewire\Home\Forms;

use App\Models\Country;
use Livewire\Component;
use Session;

class Reciver extends Component
{
    public $reciver_name,$reciver_family,$reciver_phone,$reciver_email,$reciver_attention,$reciver_company,$reciver_address,$reciver_city,$reciver_province,$reciver_country,$reciver_postalcode;

    protected $rules = [
        'reciver_name' => 'required|string',
        'reciver_family' => 'required|string',
        'reciver_company' => 'sometimes',
        'reciver_phone' => 'required',
        'reciver_email' => 'required|email',
        'reciver_attention' => 'sometimes',
        'reciver_address' => 'required',
        'reciver_city' => 'required',
        'reciver_province' => 'required',
        'reciver_country' => 'required',
        'reciver_postalcode' => 'required',
    ];
    
    public function render()
    {
        if (Session::has('EditReciver')) {
            $editData = Session::get('EditReciver');
            $this->reciver_name = $editData['reciver_name'];
            $this->reciver_family = $editData['reciver_family'];
            $this->reciver_phone = $editData['reciver_phone'];
            $this->reciver_email = $editData['reciver_email'];
            $this->reciver_attention = $editData['reciver_attention'];
            $this->reciver_company = $editData['reciver_company'];
            $this->reciver_address = $editData['reciver_address'];
            $this->reciver_city = $editData['reciver_city'];
            $this->reciver_province = $editData['reciver_province'];
            $this->reciver_country = $editData['reciver_country'];
            $this->reciver_postalcode = $editData['reciver_postalcode'];
        }
        $countries = Country::all();
        return view('livewire.home.forms.reciver', compact('countries'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveReciverInfo()
    {
        $this->emit('setReciverInfo', $this->validate());
    }
}