<?php

namespace App\Http\Livewire\Components\PickupAndDelivery;

use Livewire\Component;

class Content extends Component
{
    public $branchAddress = null;
    public $customerAddress;
    public $data;
    public $service;
    public $show_branches = true;
    public $show_quote = false;
    public $show = false;
    
    protected $listeners = ['getBranchAddress'];

    public function getBranchAddress($branchAddress)
    {
        $this->branchAddress = $branchAddress;
    }

    public function showPichupAndDelivery()
    {
        $this->show = $this->show == true ? false : true;
    }

    public function mount($userAddress , $data ,$service) {
        $this->customerAddress = $userAddress['address1'].', '.$userAddress['city'].', '.$userAddress['province'].', '.$userAddress['country'].', '.$userAddress['postal'];
        $this->data = $data;
        $this->service = $service;
    }

    public function next()
    {
        $this->show_quote = true;
        $this->show_branches = false;
    }

    public function render()
    {
        return view('livewire.components.pickup-and-delivery.content');
    }
}
