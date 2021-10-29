<?php

namespace App\Http\Livewire\Home\Panel\GetQuote;

use App\Models\Services;
use Livewire\Component;

class Index extends Component
{
    public $services;

    public function render()
    {
        $this->services = Services::all();
        $param = request()->segment(count(request()->segments()));
        return view('livewire.home.panel.get-quote.index', compact('param'));
    }

    public function redirectTohome($param)
    {
        return redirect()->route('home.quotes.'.$param);
    }
}
