<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\AdminSetPickupAndDeliveryPriceRequest;
use App\Models\Services;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminPickupAndDeliveryController extends Controller
{

    public function setPrice(AdminSetPickupAndDeliveryPriceRequest $request)
    {
        $validated = $request->validated();  
        $validated['service_type'] = 'pickup And Delivery';     
        Services::updateOrInsert(
            ['service_type'         => 'pickup And Delivery'],
            [
                'service_percentage'    => $validated['service_percentage'],
                'service_price'         => $validated['service_price'],
                'urgent_price'         => $validated['urgent_price'],
                'weight_limit'          => $validated['weight_limit'],
                'weight_minimum'        => $validated['weight_minimum'],
                'weight_extra'          => $validated['weight_extra'],
                'weight_extra_price'    => $validated['weight_extra_price'],
                'dimensions_limit'      => $validated['dimensions_limit'],
                'dimensions_minimum'    => $validated['dimensions_minimum'],
                'dimensions_extra'      => $validated['dimensions_extra'],
                'dimensions_extra_price'=> $validated['dimensions_extra_price'],
                'distance_limit'        => $validated['distance_limit'],
                'distance_minimum'      => $validated['distance_minimum'],
                'distance_extra'        => $validated['distance_extra'],
                'distance_extra_price'  => $validated['distance_extra_price'],
            ]
        );

        return response()->json(['status'=>'success','message'=>'Data seccessfully stored'],200); 
    } 
}
