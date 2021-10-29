<?php

namespace App\Http\Livewire\Admin;

use App\Models\Invoices;
use Livewire\Component;

class InvoicesList extends Component
{
    public $invs;

    public function mount($id) {
        $this->invs = Invoices::where('id', $id)->get()->first();
    }

    public function render()
    {
        return view('livewire.admin.invoices-list')->layout('livewire.admin.master');
    }
}
