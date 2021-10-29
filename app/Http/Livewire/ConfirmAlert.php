<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ConfirmAlert extends Component
{
    public function destroy($emit, $params)
    {
        $this->emit($emit, $params);
    }

    public function render()
    {
        return view('livewire.confirm-alert');
    }
}
