<?php

namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use Livewire\Component;

class AddressBook extends Component
{
    public $validated, $address, $from_line, $to_line, $validateError,$AddressId;


    public $postCount;
 
    protected $listeners = ['deleteAddress','refreshProducts' => '$refresh'];
  
    public function deleteAddress($id)
    {
        $this->AddressId = $id;
    }

    public function delete($id)
    {
        \App\Models\AddressBook::where('id',$id)->delete();
        $this->redirect('/account/address-book');
    }

    protected array $rules = [
        'address.shipping-type' => 'required',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function start() {
//        $this->validate();
        if (!$this->from_line) {
            $this->validateError = 'From address line 1 is empty';

            return;
        }
        session()->flash('from-ba', $this->from_line);
        if (!$this->to_line) {
            $this->validateError = 'To address line 1 is empty';
            return;
        }
        session()->flash('to-ba', $this->to_line);

        if (!isset($this->address['shipping-type'])) {
            $this->validateError = 'Shipping Type is empty';
            return;
        }

        if ($this->address['shipping-type'] === 'parcel') {
            return redirect()->route('home.services.parcel');
        } else {
            return redirect()->route('home.services.envelop');
        }
    }

    public function render()
    {
        $validated = $this->validated;
        $from = \App\Models\AddressBook::where('user_id', auth()->user()->id)->get();
        return view('livewire.home.panel.account.my-account.address-book', compact('from', 'validated'));
    }
}
