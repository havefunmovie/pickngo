<?php

namespace App\Http\Livewire\Components\PickupAndDelivery\details;

use App\Models\Branches;
use Livewire\Component;

class ShowBranches extends Component
{
    public $branch ;
    
    public function getBranchAddress($id,$name,$address1,$city,$province,$country,$postal_code)
    {
        $branch = $address1.', '.$city.', '.$province.', '.$country.', '.$postal_code;
        $this->emit('getBranchAddress',$branch);

    }

    public function render()
    {
        $branches = Branches::all();
        return view('livewire.components.pickup-and-delivery.details.show-branches',compact('branches'));
    }
}
