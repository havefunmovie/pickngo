<div>
    <ul class="StepProgress">
        <li class="StepProgress-item current {{ $current == '' ? '' : 'is-done' }}">
            <strong class="ps-3">{{ __('Shipping Details') }}</strong>
            @if($current == '')
                <livewire:home.panel.services.pickup-content.pickup.services-details :services='$services' :apiKey='$api_key'/>
            @endif
        </li>
        <li class="StepProgress-item current {{ $current == '2' || $current == '3' || $current == '4' ? 'is-done' : '' }}">
            <strong class="ps-3">{{ __('Get a Quote') }}</strong>
            <div class="{{ $current == '1' ? '' : 'collapse' }}">
                <livewire:home.panel.services.pickup-content.pickup.services-get-quote />
            </div>
        </li>
        <li class="StepProgress-item current {{ $current == '3' || $current == '4' ? 'is-done' : '' }}">
            <strong class="ps-3">{{ __('Review & Payment') }}</strong>
            <div class="{{ $current == '2' ? '' : 'collapse' }}">
                <livewire:home.panel.services.pickup-content.pickup.services-review-payment />
            </div>
        </li>
        <li class="StepProgress-item current  {{ $current == '4' ? 'is-done' : '' }}">
            <strong class="ps-3">{{ __('View & Print Shipping Label') }}</strong>
            <div class="{{ $current == '3' || $current == '4' ? '' : 'collapse' }}">
                <livewire:home.panel.services.pickup-content.pickup.services-get-label :data="$data" :apiKey='$api_key'/>
            </div>
        </li> 
    </ul>
</div>
