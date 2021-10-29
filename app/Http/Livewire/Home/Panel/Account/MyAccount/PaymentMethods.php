<?php

namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use App\Models\PaymentInfo;
use Livewire\Component;

class PaymentMethods extends Component
{
    public $methods;
    public $cardId;

    public function delete_notification($id)
    {
        $this->cardId = $id;
        $this->dispatchBrowserEvent('delete_notification');
    }

    public function delete($id)
    {
        PaymentInfo::where('id',$id)->delete();
        $this->dispatchBrowserEvent('delete');
        return redirect()->back();
    }

    public function render()
    {
        $this->methods = PaymentInfo::where('user_id', auth()->user()->id)->get();
        return view('livewire.home.panel.account.my-account.payment-methods');
    }
}
