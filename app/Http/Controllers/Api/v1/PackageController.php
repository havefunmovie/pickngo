<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\NewOrderEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\PackageRequest;
use App\Http\Resources\v1\PackageResource;
use App\Http\Resources\v1\PackageResourceCollection;
use App\Models\AddressBook;
use App\Models\AgentService;
use App\Models\Order;
use App\Models\OrderPackage;
use App\Models\Services;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;



class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =  OrderPackage::with('order')->paginate(25);
        return new PackageResourceCollection($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest  $request)
    {
       
        $validated = $request->validated();

        // next line should be uncomment in future
        // $validated['user_id'] = Auth::id();
        $validated['user_id'] =1;
        $validated['status'] ='unpaid';
        // getQuote($validated['weight'],$validated['width'],$validated['height'],$validated['length'],$distance);
        $validated['tracking_code'] = now()->format('is').Str::random(5);

        $to = [
            'type' => 'to',
            'country' => $validated['country_to'],
            'province' => $validated['province_to'],
            'city' => $validated['city_to'],
            'name' => $validated['name_to'],
            'line_1' => $validated['line_1_to'],
            'line_2' => $validated['line_2_to'],
            'attention' => $validated['attention_to'],
            'instruction' => $validated['instruction_to'],
            'postal_code' => $validated['postal_code_to'],
            'phone' => $validated['phone_to'],
            'email' => $validated['email_to'],
            'user_id' => $validated['user_id'],
        ];

        $from = [
            'type' => 'from',
            'country' => $validated['country_from'],
            'province' => $validated['province_from'],
            'city' => $validated['city_from'],
            'name' => $validated['name_from'],
            'line_1' => $validated['line_1_from'],
            'line_2' => $validated['line_2_from'],
            'attention' => $validated['attention_from'],
            'instruction' => $validated['instruction_from'],
            'postal_code' => $validated['postal_code_from'],
            'phone' => $validated['phone_from'],
            'email' => $validated['email_from'],
            'user_id' => $validated['user_id'],
        ];
        $to = AddressBook::create($to);
        $from = AddressBook::create($from);
        $order = Order::create([
            'user_id' => $validated['user_id'],
            'from_address_id' => $from->id,
            'to_address_id' => $to->id,
        ]);
        $validated['order_id'] = $order->id;
        $order = OrderPackage::create($validated);
        Event(new NewOrderEvent(auth()->user));
        return new PackageResource($order); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        try {
            $order = OrderPackage::findOrFail($id); 
        }
        catch (ModelNotFoundException $e) {

            return response()->json(['errors'=>'order Not Found'],Response::HTTP_NOT_FOUND);
        }
        
        return new PackageResource($order);
    }

    /**
     * Display the all packages waiting for accept by driver.
     *
     * @return \App\Http\Resources\v1\PackageResourceCollection 
     */

    public function PackageWaitingList()
    {
        $orders =  Order::with('package')->where('driver_id',null)->paginate(50);
        return new PackageResourceCollection($orders);
    }

    public function getQuote(PackageRequest  $request)
    {
        $validated = $request->validated();

        $addressFrom = $validated['line_1_from'].', '.$validated['city_from'].', '.$validated['province_from'].', '.$validated['country_from'].', '.$validated['postal_code_from'];
        $addressTo   = $validated['line_1_to'].', '.$validated['city_to'].', '.$validated['province_to'].', '.$validated['country_to'].', '.$validated['postal_code_to'];
       
        // Get distance in km
        $distance = $this->calculateDistance($addressFrom, $addressTo, "K");
   
        $service= Services::where('service_type', 'pickup And Delivery')->firstOrFail();
        if($validated['weight'] <= $service->weight_minimum)
            $weight_price = null;
        else
        {
            $extra = $validated['weight'] - $service->weight_minimum;
            $weight_price = (ceil($extra / $service->weight_extra)) * $service->weight_extra_price;
        }
            
        if($validated['height'] <= $service->dimensions_minimum && $validated['width'] <= $service->dimensions_minimum && $validated['length'] <= $service->dimensions_minimum)
            $dimensions_price = null;
        else
        {
            $extra = max(0 , ($validated['height'] - $service->dimensions_minimum)) + max(0 , ($validated['width'] - $service->dimensions_minimum)) + max(0 , ($validated['length'] - $service->dimensions_minimum));
            $dimensions_price = (ceil($extra / $service->dimensions_extra)) * $service->dimensions_extra_price;
        }
        if($distance <= $service->distance_minimum)
            $distance_price = null;
        else
        {
            $extra = $distance - $service->distance_minimum;
            $distance_price = (ceil($extra / $service->distance_extra)) * $service->distance_extra_price;
        }



        $regularCost = ($weight_price + $dimensions_price + $distance_price + $service->service_price);
        $urgentCost = ($weight_price + $dimensions_price + $distance_price + $service->urgent_price);
        return response()->json(['status'=>'success' , 'data'=> ['regularCost' => $regularCost, 'urgentCost' => $urgentCost]]);

    }

    public function calculateDistance($addressFrom, $addressTo)
    {
        $apiKey = 'AIzaSyDYra2vRvL5bFa0bRNcMhjiXa7eWNA0_o0';
        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);
        // dd($formattedAddrFrom);
        // Geocoding API request with start address

        $Api = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$formattedAddrFrom.'&destinations='.$formattedAddrTo.'&mode=driving&language=en&key='.$apiKey));
        return substr($Api->rows['0']->elements['0']->distance->text,0,-3);
       
    }

    
}
