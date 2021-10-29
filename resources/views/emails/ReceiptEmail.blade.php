@component('mail::message')
# hey {{$data['name']}}

# Date : {{ date("Y-m-d h:i"); }}
# Tracking number :  
    @foreach ($data['tracking_numbers'] as $tracking_number)
        # {{ $tracking_number }}
    @endforeach

# QTY :   {{$data['qty']}}
# Price :  ${{$data['price']}}
# Tax :   ${{$data['tax_price']}}
# Total :  ${{$data['total_price']}}

@endcomponent