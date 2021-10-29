<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $validated;
    public $login;
    public $loginStatus;
    public $remember;

    protected array $rules = [
        'login.email'    => 'required|email',
        'login.password' => 'required|min:8',
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
        $this->loginStatus = false;
    }

    public function login() {
        $this->validate();

        $user = User::where('email', $this->login['email'])->get()->first();

        if ($user) {
            if ($user['status'] == 0) {
                $this->loginStatus = 'Your login is disabled!';
            } else {
                if (Auth::attempt(array('email' => $this->login['email'], 'password' => $this->login['password']), $this->remember)) {
                    redirect('dashboard');
                } else {
                    $this->loginStatus = 'These credentials do not match our records';
                }
            }
        } else {
            $this->loginStatus = 'These credentials do not match our records';
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
