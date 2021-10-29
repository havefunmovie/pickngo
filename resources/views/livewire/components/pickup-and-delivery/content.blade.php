<div>
    <div class="col-md-12 my-4">
        <input class="form-check-input me-1 checkbox" wire:click="showPichupAndDelivery" type="checkbox" >
        <label for="addressBook">{{ __('Do you need pick up service?') }}</label>
        <span class="mdi mdi-information" data-toggle="tooltip" data-placement="right" title='{{ __('if you can not drop of your order to our branch we can send our driver to pickup your order.') }}'></span>
    </div>
    @if ($show)
        @livewire('components.pickup-and-delivery.details.show-branches')
        <button class="btn btn-pink w-100" wire:click = "next" id="Test">{{ __('Next') }}</button>
        @if (($show_quote) && ($branchAddress))
            @livewire('components.pickup-and-delivery.details.show-quotes', ['from' => $customerAddress , 'to' => $branchAddress ,'packageDetail' => $data])
        @endif
    @endif
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
