<?php

namespace App\Http\Livewire\Home\Panel\Services;

use App\Models\Services;
use App\Models\Transactions;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ServicesIndex extends Component
{
    protected $param;

    public $services;

    public $paymentToken;

    public function mount() {
        $this->services = Services::all();
        if (request()->has('token')) {
            $this->paymentToken = request()->query('token');
        }
    }

    public function render()
    {
        $param = request()->segment(count(request()->segments()));
        return view('livewire.home.panel.services.index', compact('param'));
    }

    public function redirectTohome($param)
    {
        return redirect()->route('home.services.'.$param);
    }
}
