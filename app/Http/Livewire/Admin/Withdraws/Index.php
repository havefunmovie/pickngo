<?php

namespace App\Http\Livewire\Admin\Withdraws;

use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'successful',
        'unsuccessful'
    ];

    public function render()
    {
        return view('livewire.admin.withdraws.index')->layout('livewire.admin.master');
    }

    public function successful($id) {
        return redirect()->route('admin.withdraws.edit', ['id' => $id, 'status' => 'successful']);
    }

    public function unsuccessful($id) {
        return redirect()->route('admin.withdraws.edit', ['id' => $id, 'status' => 'unsuccessful']);
    }
}
