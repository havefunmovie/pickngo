<div>
    <div class="text-center col-12">
        @if($label)
            <div class="toastrMsg alert alert-info mt-2">
                <p class="fw-bolder text-left">{{ __('Successful.') }}</p>
                <p class="text-left">{{ __('Please print the shipping label below and stick on your package for shipping. You may include print the shipping form as well.') }}</p>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="{{action('App\Http\Livewire\Admin\Agent\Parcel\Details\PrintBill@printBill')}}" class="btn btn-info w-100 mt-3" id="">{{ __('Print Bill') }}</a>
                </div>
                <div class="col-md-3">
                    <a href="{{action('App\Http\Livewire\Admin\Agent\Parcel\Details\PrintLabel@printPDF')}}" class="btn btn-outline-info w-100 mt-3" id="">{{ __('Print Label') }}</a>
                </div>
                <div class="col-md-3">
                    <a href="{{action('App\Http\Livewire\Admin\Agent\Parcel\Details\PrintInvoice@printInvoice')}}" class="btn btn-outline-info w-100 mt-3" id="">{{ __('Print Invoice') }}</a>
                </div>
                <div class="col-md-3">
                    <a href="{{action('App\Http\Livewire\Admin\Agent\Parcel\Details\PrintShipment@printShipment')}}" class="btn btn-outline-info w-100 mt-3" id="">{{ __('Print Shimpent') }}</a>
                </div>
            </div>
        @endif
    </div>
</div>
