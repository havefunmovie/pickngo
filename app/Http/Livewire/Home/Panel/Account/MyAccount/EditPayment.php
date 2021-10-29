<?php

namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use App\Models\PaymentInfo;
use Livewire\Component;

class EditPayment extends Component
{
    public $param;

    public function mount($id) {
        $this->param = $id;
    }

    public function render()
    {
        return view('livewire.home.panel.account.my-account.edit-payment');
    }

    public function redirectTohome($param)
    {
        return redirect()->route('home.services.'.$param);
    }
}
