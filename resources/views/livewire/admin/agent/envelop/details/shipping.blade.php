<div>
    <x-slot name="select2_styles">
        <link href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    </x-slot>
    <div class="agent-left-border">
        <div class="{{ $currentStep == 1 ? 'step-counter-current' : 'step-counter-done'}}">
            <div class="row">
                <h4 class="step-indicator card-title" style="margin-right: 15px;">From</h4>
                <div class="col-4 row">
                    <div class="custom-control custom-checkbox mr-4">
                        <input type="radio" wire:model="fromTrasnMode" name="from-trans-type" value="residential" class="custom-control-input" id="from-customCheck1" checked>
                        <label class="custom-control-label" for="from-customCheck1">Residential</label>
                    </div>
                    <div class="custom-control custom-checkbox mr-2">
                        <input type="radio" wire:model="fromTrasnMode" name="from-trans-type" value="business" class="custom-control-input" id="from-customCheck2">
                        <label class="custom-control-label" for="from-customCheck2">Business</label>
                    </div>
                </div>
                @if ($address)
                    <div class="col-4 ms-3" wire:ignore>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-input id="from_line_1" type="hidden" class="form-control fw-lighter fs-8" wire:model.lazy="line_1"/>
                            <div>
                                <select data-livewire="@this" id="line_1" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-full">
                                    <option selected value="">{{__('Select an Address')}}</option>
                                    @foreach($address as $account)
                                        <option value="{{$account->id}}">{{$account->line_1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <a href="javascript:void(0)" class="float-right text-info" wire:click="openFrom"><i class="mdi mdi-18px {{ $currentStep == 1 || $open_from ? 'mdi-minus' : 'mdi-plus' }}"></i></a>
                </div>
            </div>
            <div class="{{ $currentStep == 1 || $open_from ? '' : 'collapse' }}">
                <livewire:admin.agent.parcel.details.from  :from="$from"/>
            </div>
        </div>
        <div class="{{ $currentStep < 2 ? 'step-counter-next' : ($currentStep > 2 ? 'step-counter-done' : 'step-counter-current')}} mt-3">
            <div class="row">
                <h4 class="step-indicator card-title" style="margin-right: 15px;">To</h4>
                <div class="col-4 row">
                    <div class="custom-control custom-checkbox mr-4">
                        <input type="radio" wire:model="toTrasnMode" name="to-trans-type" value="residential" class="custom-control-input" id="to-customCheck1" checked>
                        <label class="custom-control-label" for="to-customCheck1">Residential</label>
                    </div>
                    <div class="custom-control custom-checkbox mr-2">
                        <input type="radio" wire:model="toTrasnMode" name="to-trans-type" value="business" class="custom-control-input" id="to-customCheck2">
                        <label class="custom-control-label" for="to-customCheck2">Business</label>
                    </div>
                </div>
                @if ($address)
                    <div class="col-4 ms-3 m-l-20" wire:ignore>
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-input id="from_line_2" type="hidden" class="form-control fw-lighter fs-8" wire:model.lazy="line_2"/>
                            <div>
                                <select data-livewire="@this" id="line_2" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-full">
                                    <option selected value="">{{__('Select an Address')}}</option>
                                    @foreach($address as $account)
                                        <option value="{{$account->id}}">{{$account->line_1}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <a href="javascript:void(0)" class="float-right text-info" wire:click="openTo"><i class="mdi mdi-18px {{ $currentStep == 2 || $open_to ? 'mdi-minus' : 'mdi-plus' }}"></i></a>
                </div>
            </div>
            <div class="{{ $currentStep == 2 || $open_to ? '' : 'collapse' }}">
                <livewire:admin.agent.envelop.details.to />
            </div>
        </div>
        <div class="{{ $currentStep < 3 ? 'step-counter-next' : ($currentStep > 3 ? 'step-counter-done' : 'step-counter-current')}} mt-3">
            <h4 class="step-indicator card-title" style="margin-right: 30px;">Package</h4>
            <div class="{{ $currentStep == 3 ? '' : 'collapse' }}">
                <livewire:admin.agent.envelop.details.package />
            </div>
        </div>
        <div class="{{ $currentStep < 4 ? 'collapse' : '' }}">
            <button wire:click="alaco" class="btn btn-info w-100">{{ __('Get a Quote') }}</button>
        </div>
    </div>
    <x-slot name="select2_script">
        <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#line_1').select2({
                    width: "100%"
                }).on('change', function (e) {
                    Livewire.emit('set_address_from', $(this).val());
                });
                $('#line_2').select2({
                    width: "100%"
                }).on('change', function (e) {
                    Livewire.emit('set_address_to', $(this).val());
                });
            });
        </script>
    </x-slot>
</div>
