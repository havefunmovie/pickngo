<?php

namespace App\Http\Livewire\Admin\drivers;

use App\Events\NewUserEvent;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public $validated, $name, $family, $email, $mobile, $address, $postal, $city, $province, $status, $password, $password_confirmation;
    protected  $rules = [

        "name"      => 'required|string',
        "family"    => 'required|string',
        "email"     => 'required|unique:users,email|email',
        "mobile"    => 'required|nullable|string',
        "address"   => 'required|nullable|string',
        "postal"    => 'required|nullable|min:6',
        "city"      => 'required|nullable',
        "province"  => 'required|nullable',
        "status"    => 'required|string',
        "password"  => 'required|min:8',
        "password_confirmation" => 'required|min:8|same:password',
    ];

    public function create() {
       $validated =  $this->validate();
       $validated['level'] = 'driver';
       $validated['password'] = bcrypt($validated["password"]);
        $driver = User::create($validated);
        Event(new NewUserEvent($driver));
        return redirect()->route('admin.drivers.index');
    }

    public function render()
    {
        return view('livewire.admin.drivers.create')->layout('livewire.admin.master');
    }
}
