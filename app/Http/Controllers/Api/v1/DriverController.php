<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\NewUserEvent;
use App\Models\User;
use App\Models\Order;
use App\Models\Driver;
use App\Models\OrderPackage;
use App\Models\DriverEarning;
use App\Events\OrderAcceptedEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Http\Resources\v1\DriverResource;
use App\Http\Requests\Api\v1\DriverRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\v1\DriverResourceCollection;
use App\Http\Requests\Api\v1\DriverHandOverRequest;
use App\Http\Resources\v1\PackageResourceCollection;
use App\Http\Requests\Api\v1\DriverAcceptOrderRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers =  User::where('level','driver')->paginate(25);
        return new DriverResourceCollection($drivers);
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
            $driver = User::where('level','driver')->findOrFail($id); 
        }
        catch (ModelNotFoundException $e) {

            return response()->json(['errors'=>'Driver Not Found'],Response::HTTP_NOT_FOUND);
        }
        
        return new DriverResource($driver);
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DriverRequest  $request)
    {     
        $validated = $request->validated();
        $validated['level'] = 'driver';
        $validated['status'] = 'active';
        $validated['password'] = Hash::make($validated['password']);
        $driver = User::create($validated);
        Event(new NewUserEvent($driver));
        return new DriverResource($driver); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DriverRequest  $request, $id)
    {
        try {
            $driver = User::where('level','driver')->findOrFail($id);
            $validated = $request->validated();
            $driver->update($validated);
        }
        catch (ModelNotFoundException $e) {

            return response()->json(['errors'=>'Driver Not Found'],Response::HTTP_NOT_FOUND);
        }
        
        return new DriverResource($driver);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $driver = Driver::findOrFail($id);
            $driver->delete();
        }
        catch (ModelNotFoundException $e) {

            return response()->json(['errors'=>'Driver Not Found'],Response::HTTP_NOT_FOUND);
        }
        
        return response()->json(['message'=>'successfully deleted']);
    }

    public function acceptNewOrder(DriverAcceptOrderRequest $request)
    {
        $validated = $request->validated();
        // $driver = User::where('level','driver')->findOrFail(Auth::id());
        $driver = User::find(4);
        if(Order::where('driver_id',$driver->id)->count() <= 3)
        {
            try {  
                $order = Order::findOrFail($validated['order_id']);
                if(!$order->driver_id)
                {
                    $order->update([
                        'driver_id'     => $driver->id ,
                    ]);
                    
                    $package = OrderPackage::where('order_id',$order->id);
                    $package->update([
                        'status'     => 'accepted by driver',
                        'pickup_time'     => $validated['pickup_time'],
                        'deliver_time'     => $validated['deliver_time'],
                        'accepted_at'     => $validated['accepted_at'],
                    ]);
                    event(new OrderAcceptedEvent($order,$driver));
                    
                }
                else
                return response()->json(['errors'=>'This order is not available any more'],404);
            }
            catch (ModelNotFoundException $e) {
    
                return response()->json(['errors'=>'Order Not Found'],Response::HTTP_NOT_FOUND);
            }
            
            return response()->json(['status'=>'success','message'=>'order accepted'],200); 
        }
        else
        return response()->json(['error'=>'you accepted maximum order']);
    }

    public function handOver(DriverHandOverRequest $request)
    {
        $validated = $request->validated();
        $driver_id = Auth::id();
        try {
            $order_details = Order::with('Package')->findOrFail($driver_id);
            $this ->storeImage($order_details->package , $validated['image']);
            $order_details->package->update(['delivered_at' => now()]);;
        }
        catch(ModelNotFoundException $e) {

            return response()->json(['errors'=>'Order Not Found'],Response::HTTP_NOT_FOUND);
        }
        return response()->json(['status' => 'success','message' => 'order successfully delivered'],200);
    }

    /**
     * Display every order accepted by driver listing of the resource collection.
     *
     * @return \App\Http\Resources\v1\PackageResourceCollection
     */
    public function acceptedOrderList($id)
    {
        try {
            $driver = User::where('level','driver')->findOrFail($id);
            $orders = Order::where('driver_id',$driver->id)->get();
            return $orders;
        }
        catch (ModelNotFoundException $e) {

            return response()->json(['errors'=>'Driver Not Found'],Response::HTTP_NOT_FOUND);
        }
        return new PackageResourceCollection($orders);
    }

    /**
     * Display earning by driver list.
     *
     * @return \App\Http\Resources\v1\PackageResourceCollection
     */
    public function earningList($id)
    {
        try {
            $driver = User::where('level','driver')->findOrFail($id);
            $earningList = DriverEarning::where('driver_id',$driver->id)->get();
        }
        catch (ModelNotFoundException $e) {

            return response()->json(['errors'=>'Driver Not Found'],Response::HTTP_NOT_FOUND);
        }
        return response()->json(['earning' => $earningList]);
    }

    public function storeImage($orderDetails, $image)
    {
        $orderDetails->update([
            'delivered_image' => $image->store('images/uploads/driverHandOver' , 'public'),
        ]);
        $image = Image::make(public_path('storage/'.$orderDetails->delivered_image))->fit(400,400);
        $image->save();
    }
}
