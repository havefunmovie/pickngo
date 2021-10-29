<div>
    @if($errorLabel)
        <div class="alert alert-danger mt-2">{{ $errorLabel }}</div>
    @endif
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-0 px-3 py-2 mt-3 {{ $show == 1 ? 'shadow-none' : 'shadow' }}">
            <div class="accordion-header d-flex align-items-center py-2">
                <div wire:click="openFrom" class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $show == 1 || $open_from ? 'show' : 'collapsed' }}" >
                    <span class="me-2">{{ __('From') }}</span>
                    <svg width="17" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 9.89998V17H9V9.89998C6.71776 9.43671 5 7.41896 5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5C15 7.41896 13.2822 9.43671 11 9.89998ZM7 12.1573V14.1844C4.06718 14.5505 2 15.3867 2 16C2 16.807 5.57914 18 10 18C14.4209 18 18 16.807 18 16C18 15.3867 15.9328 14.5505 13 14.1844V12.1573C17.0559 12.6017 20 13.9678 20 16C20 18.5068 15.5203 20 10 20C4.47973 20 0 18.5068 0 16C0 13.9678 2.94412 12.6017 7 12.1573ZM13 5C13 6.65685 11.6569 8 10 8C8.34315 8 7 6.65685 7 5C7 3.34315 8.34315 2 10 2C11.6569 2 13 3.34315 13 5Z" fill="white"/>
                    </svg>
                </div>
                <span class="ms-3">
                    <input wire:model="fromTrasnMode" class="form-check-input me-1 checkbox" id="residential" type="radio" name="" value="residential" checked aria-label="...">
                    <label for="residential">{{ __('Residential') }}</label>
                </span>
                <span class="ms-3">
                    <input wire:model="fromTrasnMode" class="form-check-input me-1 checkbox" id="business" type="radio" name="" value="business" aria-label="...">
                    <label for="business">{{ __('Business') }}</label>
                </span>
                <div class="col-md-4 ms-3" wire:ignore>
                    <div class="form-group">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-input id="from_line_1" type="hidden" class="form-control fw-lighter fs-8" wire:model.lazy="line_1"/>
                            <div>
                                <select data-livewire="@this" id="line_1" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-full">
                                    <option selected value="">--{{__('Select an Address')}}--</option>
                                    @foreach($address as $account)
                                        @if ($account['type'] === 'from')
                                            <option value="{{$account->id}}">{{$account->line_1}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-collapse {{ $show == 1 || $open_from ? 'show' : 'collapse' }}" >
                <livewire:home.panel.services.parcel-content.parcel.details.from />
            </div>
        </div>
        <div class="accordion-item border-0 px-3 py-2 mt-3  {{ $show == 2 ? 'shadow-none' : 'shadow' }}" >
            <div class="accordion-header d-flex align-items-center py-2" id="flush-headingTwo" >
                <div wire:click="openTo" class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $show == 2 || $open_to ? 'show' : 'collapsed' }}">
                    <span class="me-2">{{ __('To') }}</span>
                    <svg width="17" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 9.89998V17H9V9.89998C6.71776 9.43671 5 7.41896 5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5C15 7.41896 13.2822 9.43671 11 9.89998ZM7 12.1573V14.1844C4.06718 14.5505 2 15.3867 2 16C2 16.807 5.57914 18 10 18C14.4209 18 18 16.807 18 16C18 15.3867 15.9328 14.5505 13 14.1844V12.1573C17.0559 12.6017 20 13.9678 20 16C20 18.5068 15.5203 20 10 20C4.47973 20 0 18.5068 0 16C0 13.9678 2.94412 12.6017 7 12.1573ZM13 5C13 6.65685 11.6569 8 10 8C8.34315 8 7 6.65685 7 5C7 3.34315 8.34315 2 10 2C11.6569 2 13 3.34315 13 5Z" fill="white"/>
                    </svg>
                </div>
                <span class="ms-3">
                    <input wire:model="toTrasnMode" class="form-check-input me-1 checkbox" id="residential2" type="radio" name="" value="residential" aria-label="...">
                    <label for="residential2">{{ __('Residential') }}</label>
                </span>
                <span class="ms-3">
                    <input wire:model="toTrasnMode" class="form-check-input me-1 checkbox" id="business2" type="radio" name="" value="business" aria-label="...">
                    <label for="business2">{{ __('Business') }}</label>
                </span>
                <div class="col-md-4 ms-3" wire:ignore>
                    <div class="form-group">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-input id="from_line_2" type="hidden" class="form-control fw-lighter fs-8" wire:model.lazy="line_2"/>
                            <div>
                                <select data-livewire="@this" id="line_2" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-full">
                                    <option selected value="">--{{__('Select an Address')}}--</option>
                                    @foreach($address as $account)
                                        @if ($account['type'] === 'to')
                                            <option value="{{$account->id}}">{{$account->line_1}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="flush-collapseTwo" class="accordion-collapse  {{ $show == 2 || $open_to ? 'show' : 'collapse' }}">
                <div class="accordion-body">
                    <livewire:home.panel.services.parcel-content.parcel.details.to />
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 px-3 py-2 mt-3  {{ $show == 3 ? 'shadow-none' : 'shadow' }}">
            <div class="accordion-header d-flex align-items-center py-2" id="flush-headingThree" >
                <div class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $show == 3 ? 'show' : 'collapsed' }}">
                    <span class="me-2">{{ __('Package Details') }}</span>
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.89 1.45003L20.89 5.45003C21.5697 5.78776 21.9996 6.48108 22 7.24003V16.77C21.9996 17.529 21.5697 18.2223 20.89 18.56L12.89 22.56C12.3267 22.8419 11.6634 22.8419 11.1 22.56L3.10005 18.56C2.42104 18.2179 1.99476 17.5203 2.00005 16.76V7.24003C2.00045 6.48108 2.43039 5.78776 3.11005 5.45003L11.11 1.45003C11.6707 1.17144 12.3294 1.17144 12.89 1.45003Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.31982 6.16003L11.9998 11L21.6798 6.16003" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 22.76V11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 3.5L17 8.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div id="flush-collapseThree" class="accordion-collapse {{ $show == 3 ? 'show' : 'collapse' }}">
                <livewire:home.panel.services.parcel-content.parcel.details.package />
            </div>
        </div>
        <div class="accordion-collapse mt-3 {{ $show == 4 ? 'show' : 'collapse' }}">
            <button wire:click="alaco" class="btn btn-pink w-100">{{ __('Get a Quote') }}</button>
        </div>
    </div>
    <x-slot name="select2_script">
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
