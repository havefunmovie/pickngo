<?php

namespace App\Http\Livewire\Admin\Agent\Notification;

use App\Http\Livewire\PaypalEnvironment;
use App\Models\OrderEnvelop;
use App\Models\OrderParcel;
use App\Models\Taxes;
use App\Models\Transactions;
use Livewire\Component;
use Session;
use Str;

class Index extends Component
{
    public $payment_method, $transaction_id, $order_id, $order_type, $order, $order_traking_number;
    public $tracking_number, $price;
    
    public function render()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('livewire.admin.agent.notification.index', compact('notifications'))->layout('livewire.admin.master');
    }

    public function markAsRead($id)
    {
        auth()->user()->unreadNotifications->where('id' , $id)->markAsRead();
        return redirect(url('agent/notification'));
    }

    public function seeNotificationDetails($id)
    {
        $notification = auth()->user()->unreadNotifications->where('id' , $id)->first();
        $this->customer_price = $notification->data['transaction']['price'];
        $this->transaction_id = $notification->data['transaction']['id'];
        $this->order_id = $notification->data['order']['id'];
        $this->order_type = $notification->data['order_type'];
        $this->dispatchBrowserEvent('notificationDetails', $notification);
    }

    public function payedBy($payment_method)
    {
        if($this->tracking_number && $this->price)
        {
            $this->payment_method = $payment_method;
            $traking_code = Str::random(15);
            if($this->payment_method == 'Paypal')
            {
                $paypal = new PaypalEnvironment();
                $result = $paypal->createNewOrder('CAD',$this->customer_price  , 'agent.drop-off.index');
                foreach ($result->links as $link) {
                    if ($link->rel === 'approve') {
                        return redirect($link->href);
                    }
                }
            }
            Transactions::where('id',$this->transaction_id)->update([
                'trans_code' => $traking_code,
                'status' => 'successful',
                'payed_by' => 'agent - '.$this->payment_method,
            ]);
            $tax = Taxes::where('province','QC')->first('tax');
            if($this->order_type == 'parcel')
            {
                OrderParcel::where('id',$this->order_id)->update([ 'tracking_code' => $this->tracking_number]);
                Transactions::where('parcel_id',$this->order_id)->update(['price' => ($this->price*$tax->tax)]);
            }
            else
            {
                OrderEnvelop::where('id',$this->order_id)->update([ 'tracking_code' => $this->tracking_number]);
                Transactions::where('envelop_id',$this->order_id)->update(['price' => ($this->price*$tax->tax)]);
            }
        }
        else
            $this->dispatchBrowserEvent('warning-price-tracking');
    }

    public function print_bill()
    {
        if($this->order_type == 'parcel')
            $order = OrderParcel::where('id',$this->order_id)->first();
        else
            $order = OrderEnvelop::where('id',$this->order_id)->first();

        if($order->tracking_code)
        {
            Session::put('image', $this->order_id);
            Session::put('label-type', $this->order_type);
            return redirect('Agent/print-bill');
        }
        else
            $this->dispatchBrowserEvent('warning');
    }

    public function print_shipment()
    {
        if($this->order_type == 'parcel')
            $order = OrderParcel::where('id',$this->order_id)->first();
        else
            $order = OrderEnvelop::where('id',$this->order_id)->first();

        if($order->tracking_code)
        {
            Session::put('invoice', $this->order_id);
            Session::put('label-type', $this->order_type);
            return redirect('Agent/print-shipment');
        }
        else
            $this->dispatchBrowserEvent('warning');
    }

    public function print_invoice()
    {
        if($this->order_type == 'parcel')
            $order = OrderParcel::where('id',$this->order_id)->first();
        else
            $order = OrderEnvelop::where('id',$this->order_id)->first();

        if(($order->tracking_code) && ($order->country_to != 'CA'))
        {
            Session::put('invoice', $this->order_id);
            Session::put('label-type', $this->order_type);
            return redirect('Agent/print-invoice');
        }
        else
            $this->dispatchBrowserEvent('warning-invoice');
    }
}
