<?php

namespace App\Http\Livewire\Home\Forms;

use App\Models\Country;
use App\Models\User;
use Livewire\Component;
use Session;

class Customer extends Component
{
    public $customer_id;
    public $customer_name;
    public $customer_family;
    public $customer_phone;
    public $customer_email;
    public $customer_attention;
    public $customer_company,$customer_address,$customer_city,$customer_province,$customer_country,$customer_postalcode;
    public $states,$count,$new_customer = 1;

    protected function rules()

    {
        if ($this->new_customer == 1)
        {
            return [
                'customer_name' => 'required|string',
                'customer_family' => 'required|string',
                'customer_company' => 'sometimes',
                'customer_phone' => 'required',
                'customer_email' => 'required',
                'customer_phone' => 'required|numeric|unique:users,mobile',
                'customer_email' => 'required|email|unique:users,email',
                'customer_attention' => 'sometimes',
                'customer_address' => 'required',
                'customer_city' => 'required',
                'customer_province' => 'required',
                'customer_country' => 'required',
                'customer_postalcode' => 'required',
            ];
        }
        else
            return [
                'customer_name' => 'required|string',
                'customer_family' => 'required|string',
                'customer_company' => 'sometimes',
                'customer_phone' => 'required',
                'customer_email' => 'required',
                'customer_phone' => 'required|numeric',
                'customer_email' => 'required|email',
                'customer_attention' => 'sometimes',
                'customer_address' => 'required',
                'customer_city' => 'required',
                'customer_province' => 'required',
                'customer_country' => 'required',
                'customer_postalcode' => 'required',
            ];
    }

    public function render()
    {
        if (Session::has('EditCustomer')) {
            $editData = Session::get('EditCustomer');
            $this->customer_id = $editData['customer_id'];
            $this->customer_name = $editData['customer_name'];
            $this->customer_family = $editData['customer_family'];
            $this->customer_phone = $editData['customer_phone'];
            $this->customer_email = $editData['customer_email'];  
            $this->customer_attention = $editData['customer_attention'];
            $this->customer_company = $editData['customer_company'];
            $this->customer_address = $editData['customer_address'];
            $this->customer_city = $editData['customer_city'];
            $this->customer_province = $editData['customer_province'];
            $this->customer_country = $editData['customer_country'];
            $this->customer_postalcode = $editData['customer_postalcode'];
            $this->new_customer = 0;
        }
        $countries = Country::all();
        return view('livewire.home.forms.customer',compact('countries'));
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveCustomerInfo()
    {
        $validated = $this->validate();
        if(User::where('email',$this->customer_email)->count() > 0)
        {
            $validated['new_customer'] = false;
            $validated['customer_id'] = $this->customer_id;
        }
        else
            $validated['new_customer'] = true;
        $this->emit('setCustomerInfo', $validated);
        $this->emit('setStep', 4);
    }
}