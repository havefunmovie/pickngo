<div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-0 px-3 py-2 mt-3 {{ $packDetail == 1 ? 'shadow-none' : 'shadow' }}" >
            <div class="accordion-header d-flex align-items-center py-2" id="flush-headingTwo" >
                <div wire:click="packageDetailToggle" class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $packDetail == 1 ? 'show' : 'collapsed' }}">
                    <span class="me-2">{{ __('Package Details') }}</span>
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.89 1.45003L20.89 5.45003C21.5697 5.78776 21.9996 6.48108 22 7.24003V16.77C21.9996 17.529 21.5697 18.2223 20.89 18.56L12.89 22.56C12.3267 22.8419 11.6634 22.8419 11.1 22.56L3.10005 18.56C2.42104 18.2179 1.99476 17.5203 2.00005 16.76V7.24003C2.00045 6.48108 2.43039 5.78776 3.11005 5.45003L11.11 1.45003C11.6707 1.17144 12.3294 1.17144 12.89 1.45003Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.31982 6.16003L11.9998 11L21.6798 6.16003" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 22.76V11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 3.5L17 8.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div wire:click="edit" class="d-flex btn btn-outline-pink rounded-pill px-4 fs-8 ms-2">
                    {{ __('Edit') }}
                </div>
            </div>
            <div class="accordion-collapse row {{ $packDetail == 1 ? 'show' : 'collapse' }} mt-3">
                <div class="col-md-12">
                    <p class="fw-bolder">{{ __('Mailbox Type & Price') }}</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Box Number') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{$box_detail['number']}}
                                @endif
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Box Type') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{$data['type']}}
                                @endif
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Price') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{'$'.$data['price']}}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="fw-bolder">{{ __('Details & Prices') }}</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Additional Full Name 1') }}</h6>
                        </div>
                        <div class="col">
                            <p class="text-secondary">
                                @if($data)
                                    {{ isset($data['customer_2']) ? '$'. $prices['customer_2'] : '$'. '0' }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Additional Full Name 2') }}</h6>
                        </div>
                        <div class="col">
                            <p class="text-secondary">
                                @if($data)
                                    {{ isset($data['customer_3']) ? '$'. $prices['customer_3'] : '$'. '0' }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Usage Type') }}</h6>
                        </div>
                        <div class="col">
                            <p class="text-secondary">
                                @if($data)
                                    @switch($data['mailbox_type'])
                                        @case('personal')
                                        {{ '$'.$prices['personal_mode'] }}
                                        @break
                                        @case('personal_plus')
                                        {{ '$'.$prices['personal_plus_mode'] }}
                                        @break
                                        @case('business')
                                        {{ '$'.$prices['business_mode'] }}
                                        @break
                                        @case('corporate')
                                        {{ '$'.$prices['corporate_mode'] }}
                                        @break
                                    @endswitch
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Rental Fee') }}</h6>
                        </div>
                        <div class="col">
                            <p class="text-secondary">
                                @if($data)
                                    {{ !$data['key'] ? '$0' : '$'.$prices['rental_fee'] }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Refundable Deposit') }}</h6>
                        </div>
                        <div class="col">
                            <p class="text-secondary">
                                @if($data)
                                    {{ !$data['key'] ? '$0' : '$'.$prices['refundable_deposit'] }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Mailbox Price') }}</h6>
                        </div>
                        <div class="col">
                            <p class="text-secondary">
                                @if($data)
                                    {{ '$'.$data['price'] }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col">
                            <p class="fw-bolder">{{ __('Amount Payable') }}</p>
                        </div>
                        <div class="col">
                            <p class="text-blue-500">
                                @if($data)
                                    {{ '$'.$final_payable }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 px-3 py-2 mt-3 shadow-none">
            <div class="accordion-header d-flex align-items-center py-2">
                <div class="d-flex btn btn-pink rounded-pill px-4 fs-8 show" >
                    <span class="me-2">{{ __('Amount Payable').' $'.$final_payable }}</span>
                </div>
            </div>
            <div class="accordion-collapse show" >
                <livewire:home.panel.services.mailbox-content.mailbox.payment />
            </div>
        </div>
    </div>
</div>
