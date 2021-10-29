@component('mail::message')
# hey {{$user->name}}

# your order accepted by #  {{$driver->name}} {{$driver->family}}
# he will pickup your order at {{$order->pickup_time}}.

#Tracking number: {{$order->tracking_code}}

#Status: {{$order->status}}

@endcomponent
