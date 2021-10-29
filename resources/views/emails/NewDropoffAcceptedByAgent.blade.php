@component('mail::message')
# hey {{$order['name']}}

# Date : {{ date("Y-m-d h:i"); }}
# your Tracking number is #  {{$order['tracking_number']}}


@endcomponent