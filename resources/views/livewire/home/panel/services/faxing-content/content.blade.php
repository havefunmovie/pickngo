<div>
    @if(Session::has('payment_fail'))
        <div class="alert alert-danger">{{ session('payment_fail') }}</div>
    @endif
    @if(Session::has('payment_success'))
        <div class="alert alert-success">{{ session('payment_success') }}</div>
    @endif
    <ul class="StepProgress">
        <li class="StepProgress-item current {{ $current == '' ? '' : 'is-done' }}">
            <strong class="ps-3">{{ __('Faxing Details') }}</strong>
            @if($current == '')
                <livewire:home.panel.services.faxing-content.faxing.services-details :services='$services'/>
            @endif
        </li>
        <li class="StepProgress-item current {{ $current == '2' || $current == '3' ? 'is-done' : '' }}">
            <strong class="ps-3">{{ __('Review & Payment') }}</strong>
            <div class="{{ $current == '1' ? '' : 'collapse' }}">
                <livewire:home.panel.services.faxing-content.faxing.services-review-payment />
            </div>
        </li>
        <li class="StepProgress-item current {{ $current == '3' ? 'is-done' : '' }}">
            <strong class="ps-3">{{ __('View & Print Voucher') }}</strong>
            <div class="{{ $current == '2' || $current == '3' ? '' : 'collapse' }}">
                <livewire:home.panel.services.faxing-content.faxing.services-get-label :data="$data"/>
            </div>
        </li>
    </ul>
</div>