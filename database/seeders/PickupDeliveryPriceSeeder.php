<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;

class PickupDeliveryPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::create([
            'service_type'              => 'pickup And Delivery',
            'service_price'             => '50',
            'urgent_price'              => '90',
            'weight_limit'              => '100',
            'weight_minimum'            => '20', 
            'weight_extra'              => '1', 
            'weight_extra_price'        => '10', 
            'dimensions_limit'          => '100', 
            'dimensions_minimum'        => '10', 
            'dimensions_extra'          => '1', 
            'dimensions_extra_price'    => '1', 
            'distance_limit'            => '1000', 
            'distance_minimum'          => '60', 
            'distance_extra'            => '1', 
            'distance_extra_price'      => '0.69', 
            'driver_percentage'         => '40',
            'service_percentage'        => '20'
            
        ]);
    }
}
