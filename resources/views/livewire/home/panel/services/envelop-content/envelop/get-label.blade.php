<div>
    <div class="text-center p-4 d-inline-block">
        @if($error)
            <div class="alert alert-danger mt-2">{{ $error }}</div>
        @endif
        @if($label)
{{--            <img src='{{ asset('images/labels').'/'.$label }}' style='height: 735px; width: 100%; object-fit: contain; margin: auto; -webkit-transform: rotate(90deg);-moz-transform: rotate(90deg);-o-transform: rotate(90deg);-ms-transform: rotate(90deg);transform: rotate(90deg);'/>--}}
            <div class="toastrMsg alert alert-info mt-2">
                <p class="fw-bolder text-left">{{ __('Payment Successful.') }}</p>
                <p class="text-left">{{ __('Please print the shipping label below and stick on your package for shipping. You may include print the shipping form as well.') }}</p>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3 mb-0">
                    <a href="{{action('App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel\PrintLabel@printPDF')}}" class="btn btn-pink w-100 mt-3" id="Test">{{ __('Print Label') }}</a>
                </div>
                <div class="col-md-6">
                    <a href="{{action('App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel\PrintShipment@printShipment')}}" class="btn btn-outline-pink w-100 mt-3" id="Test">{{ __('Print Shipment') }}</a>
                </div>
            </div>
        @endif
    </div>
</div>