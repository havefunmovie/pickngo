@component('mail::message')
#congratulation :) <br>
Dear {{$user->name}} <br>
your order successfully placed. <br>
you can see order details in your panel. <br>
{{$order->service_type}}

@endcomponent
