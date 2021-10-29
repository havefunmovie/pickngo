<?php

namespace App\Http\Livewire\Admin\Agent\Profile;

use Livewire\Component;
use PDF;

class Printqr extends Component
{
    public function render()
    {
        return view('livewire.admin.agent.profile.printqr')->layout('livewire.admin.master');
    }
    // public function Print()
    // {
    //     $pdf = PDF::loadView('livewire.admin.agent.profile.printqr');
    //     $pdf->setPaper('a4', 'portrait');
    //     return $pdf->download('QR.pdf');
    // }
}
