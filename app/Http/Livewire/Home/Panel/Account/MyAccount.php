<?php

namespace App\Http\Livewire\Home\Panel\Account;

use Livewire\Component;

class MyAccount extends Component
{
    protected $param;

    public function render()
    {
        $param = request()->segment(count(request()->segments()));
        return view('livewire.home.panel.account.my-account', compact('param'));
    }

    public function redirectTohome($param)
    {
        return redirect()->route('home.services.'.$param);
    }
}
