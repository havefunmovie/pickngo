<?php

namespace App\Http\Livewire\Components\PickupAndDelivery\details;

use App\Models\Services;
use Livewire\Component;

class ShowQuotes extends Component
{
    public $from;
    public $to;
    public $pack;
    public $quotes;
    public function mount($from , $to , $packageDetail) {
        $this->from = $from;
        $this->to = $to;
        $this->pack = $packageDetail;

        // Get distance in km
        $distance = $this->calculateDistance($from, $to);
        $service= Services::where('service_type', 'pickup And Delivery')->firstOrFail();
         if($this->pack['weight'] <= $service->weight_minimum)
         {
             $weight_price = null;
             $extra_weight = null;
         }
         else
         {
             $extra_weight = $this->pack['weight'] - $service->weight_minimum;
             $weight_price = (ceil($extra_weight / $service->weight_extra)) * $service->weight_extra_price;
         }
             
         if($this->pack['height'] <= $service->dimensions_minimum && $this->pack['width'] <= $service->dimensions_minimum && $this->pack['length'] <= $service->dimensions_minimum)
             $dimensions_price = null;
         else
         {
             $extra = max(0 , ($this->pack['height'] - $service->dimensions_minimum)) + max(0 , ($this->pack['width'] - $service->dimensions_minimum)) + max(0 , ($this->pack['length'] - $service->dimensions_minimum));
             $dimensions_price = (ceil($extra / $service->dimensions_extra)) * $service->dimensions_extra_price;
         }
         if($distance <= $service->distance_minimum)
         {
             $distance_price = null;
             $extra_distance = null;
         }
         else
         {
             $extra_distance = $distance - $service->distance_minimum;
             $distance_price = (ceil($extra_distance / $service->distance_extra)) * $service->distance_extra_price;
         }
 
         $regularCost = ($weight_price + $dimensions_price + $distance_price + $service->service_price);
         $urgentCost = ($weight_price + $dimensions_price + $distance_price + $service->urgent_price);
 
         $this->quotes = [
         // return $this->mServiceSummary = [
             [
                 'name' => 'Regular',
                 'cost' => $regularCost,
                 'service_details' =>[
                     'weight' => $service->weight_minimum,
                     'distance' => $service->distance_minimum,
                 ],
                 'order_extras' => [
                     'weight' => $extra_weight,
                     'distance' => $extra_distance,
                 ],
             ],
             [
                 'name' => 'Express',
                 'cost' => $urgentCost,
                 'service_details' =>[
                     'weight' => $service->weight_minimum,
                     'distance' => $service->distance_minimum,
                 ],
                 'order_extras' => [
                     'weight' => $extra_weight,
                     'distance' => $extra_distance,
                 ],
             ],
         ];
    }

    public function render()
    {
        return view('livewire.components.pickup-and-delivery.details.show-quotes');
    }


    // calculate distance between two addresses
    public function calculateDistance($from, $to)
    {
        $apiKey = 'AIzaSyDYra2vRvL5bFa0bRNcMhjiXa7eWNA0_o0';
        $formattedAddrFrom    = str_replace(' ', '+', $to);
        $formattedAddrTo     = str_replace(' ', '+', $from);
        // Geocoding API request with start address

        $Api = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$formattedAddrFrom.'&destinations='.$formattedAddrTo.'&mode=driving&language=en&key='.$apiKey));
        return substr($Api->rows['0']->elements['0']->distance->text,0,-3);
    
    }
}
