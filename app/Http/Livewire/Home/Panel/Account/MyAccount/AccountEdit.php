<?php

namespace App\Http\Livewire\Home\Panel\Account\MyAccount;

use App\Models\User;
use Livewire\Component;

class AccountEdit extends Component
{
    public $validated, $user;

//    protected array $rules = [
//        'user.name'                  => 'required',
//        'user.family'                => 'required',
//        'user.email'                 => 'required|email',
//        'user.mobile'                => 'required|numeric',
//        'user.password'              => 'required|min:8',
//        'user.password_confirmation' => 'required|min:8|same:user.password',
//        'user.address'               => 'required',
//        'user.postal'                => 'required',
//        'user.city'                  => 'required',
//        'user.province'              => 'required'
//    ];
    public function rules()
    {
        return [
            'user.name'                  => 'required',
            'user.family'                => 'required',
            'user.email'                 => 'required|email|unique:users,email,' . $this->user['id'],
            'user.mobile'                => 'required|numeric|unique:users,mobile,' . $this->user['id'],
            'user.password_confirmation' => 'required|min:8|same:user.password',
            'user.address'               => 'required',
            'user.postal'                => 'required',
            'user.city'                  => 'required',
            'user.province'              => 'required'
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function mount() {
        $this->user = User::where('id', auth()->user()->id)->get()->first()->toArray();
        unset($this->user['password']);
//        $this->user = '123456';
//        dd($this->user);
    }

    public function edit() {
        $this->validate();
        
        User::where('id', $this->user['id'])->update([
            'name' => $this->user['name'],
            'family' => $this->user['family'],
            'email' => $this->user['email'],
            'mobile' => $this->user['mobile'],
            'address' => $this->user['address'],
            'postal' => $this->user['postal'],
            'city' => $this->user['city'],
            'province' => $this->user['province'],
            'password' => bcrypt($this->user["password"])
        ]);

        return redirect()->route('home.account.my-account');
    }

    public function render()
    {
        return view('livewire.home.panel.account.my-account.account-edit');
    }
}
