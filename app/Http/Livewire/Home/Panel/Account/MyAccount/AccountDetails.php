<?php

namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use App\Models\User;
use Livewire\Component;

class AccountDetails extends Component
{
    public function render()
    {
        $user = User::where('id', auth()->user()->id)->get()->first();
        return view('livewire.home.panel.account.my-account.account-details', compact('user'));
    }
}
