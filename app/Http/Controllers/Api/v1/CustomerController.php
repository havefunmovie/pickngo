<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\PackageResourceCollection;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function inProccessOrders()
    {
        // $user_id = Auth::id();
        $user_id = 1;
        $inProccessOrders = Order::with('package')->where('user_id',$user_id)->whereHas('package', function($q){
                $q->where('delivered_at', null);
            })->get();
        return new PackageResourceCollection($inProccessOrders);
    }

    public function ordersHistory()
    {
        // $user_id = Auth::id();
        $user_id = 1;
        $orderHistory = Order::with('package')->where('user_id',$user_id)->whereHas('package', function($q){
                $q->where('delivered_at', '!=' ,null);
            })->get();
        return new PackageResourceCollection($orderHistory);
    }
}
