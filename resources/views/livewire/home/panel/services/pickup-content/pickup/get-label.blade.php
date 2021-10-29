<div>
    <div class="text-center p-4 d-inline-block w-100">
        @if($error)
            <div class="alert alert-danger mt-2">{{ $error }}</div>
        @endif
        @if($label)
            <div class="toastrMsg alert alert-info mt-2">
                <p class="fw-bolder text-left">{{ __('Payment Successful.') }}</p>
                <p class="text-left">{{ __('Congratulation, your order successfully placed. you can track your order in your account also you will receive emails for any changes happen.') }}</p>
            </div>
            <div class="row">
                {{-- <div class="col-md-3 mb-3">
                    <a href="{{action('App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup\PrintPickupLabel@printPDF')}}" class="btn btn-pink w-100 mt-3" id="Test">{{ __(' Label') }}</a>
                </div> --}}
                {{-- <div class="col-md-3 mb-3">
                    <a href="{{action('App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup\PrintPickupInvoice@printInvoice')}}" class="btn btn-outline-pink w-100 mt-3" id="Test">{{ __('Print Invoice') }}</a>
                </div> --}}
                {{-- <div class="col-md-3">
                    <a href="{{action('App\Http\Livewire\Home\Panel\Services\PickupContent\Pickup\PrintPickupShipment@printShipment')}}" class="btn btn-outline-pink w-100 mt-3" id="Test">{{ __('Print Shimpent') }}</a>
                </div> --}}
            </div>
        @endif
    </div>
</div>


