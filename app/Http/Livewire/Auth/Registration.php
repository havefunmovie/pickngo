<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Registration extends Component
{
    public $validated;
    public $register;
    public $registerStatus;
    public $remember;
    
//    protected array $rules = [
//        'register.email'    => 'required|email',
//        'register.password' => 'required|min:8',
//    ];

    public function rules()
    {
        return [
            'register.name'                  => 'required',
            'register.family'                => 'required',
            'register.email'                 => 'required|email|unique:users,email',
            'register.mobile'                => 'required|numeric|unique:users,mobile',
            'register.password'              => 'required|min:8',
            'register.password_confirmation' => 'required|min:8|same:register.password',
            'register.address'               => 'required',
            'register.postal'                => 'required',
            'register.city'                  => 'required',
            'register.company_name'          => 'required'
        ];
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
        $this->registerStatus = false;
    }
    
    public function register() {
        $this->validate();

        $user = User::create([
            'name' => $this->register['name'],
            'email' => $this->register['email'],
            'family' => $this->register['family'],
            'mobile' => $this->register['mobile'],
            'address' => $this->register['address'],
            'postal' => $this->register['postal'],
            'city' => $this->register['city'],
            'company_name' => $this->register['company_name'],
            'password' => Hash::make($this->register['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    
    public function render()
    {
        return view('livewire.auth.registration');
    }
}
