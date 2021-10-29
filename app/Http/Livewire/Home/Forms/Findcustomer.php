<?php
namespace App\Http\Livewire\Home\Forms;

use App\Models\Country;
use App\Models\User;
use Livewire\Component;

class Findcustomer extends Component
{
    public $existingUser, $user_info, $user, $notification, $selectedUser, $disabled = 'disabled';
    public function render()
    {
        return view('livewire.home.forms.find-customer');
    }

    public function newUser()
    {
        $this->emit('setStep', 3);
    }
    public function existingUser()
    {
        $this->existingUser = true;
    }

    public function search_user()
    {   
        $this->notification = null;
        if($this->user_info)
        {
            $user = User::Where('mobile',$this->user_info)->orWhere('email',$this->user_info)->first();
            if($user)
                $this->user = $user;
            else
            {
                $this->notification = 'Oops! We can not find this user';
                $this->user = null;
            }
        }
    }

    public function selectedUser()
    {
        if($this->disabled == 'disabled')
        {
            $this->selectedUser = $this->user;
            $this->disabled = '';
        }
        else
            $this->disabled = 'disabled';
    }

    public function sendDataToNextLevel()
    {
        
        $customer = [
            'customer_id' => $this->selectedUser->id,
            'customer_name' => $this->selectedUser->name,
            'customer_family' => $this->selectedUser->family,
            'customer_company' => $this->selectedUser->company,
            'customer_phone' => $this->selectedUser->mobile,
            'customer_email' => $this->selectedUser->email,
            'customer_attention' => $this->selectedUser->attention,
            'customer_address' => $this->selectedUser->address,
            'customer_city' => $this->selectedUser->city,
            'customer_province' => $this->selectedUser->province,
            'customer_country' => $this->selectedUser->country,
            'customer_postalcode' => $this->selectedUser->postal,
            'customer_country' => 'Ca',
            'new_customer' => false,
        ];
        $this->emit('setCustomerInfo', $customer);
        $this->emit('setStep', 4);
    }
}