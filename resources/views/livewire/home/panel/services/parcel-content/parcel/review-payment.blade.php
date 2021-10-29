<div>
    @if($error)
        <div class="alert alert-danger mt-2">{{ $error }}</div>
    @endif
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-0 px-3 py-2 mt-3 {{ $shipDetail == 1 ? 'shadow-none' : 'shadow' }}">
            <div class="accordion-header d-flex align-items-center py-2">
                <div wire:click="shipDetailToggle" class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $shipDetail == 1 ? 'show' : 'collapsed' }}">
                    <span class="me-2">{{ __('Shipping Details') }}</span>
                    <svg width="17" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 9.89998V17H9V9.89998C6.71776 9.43671 5 7.41896 5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5C15 7.41896 13.2822 9.43671 11 9.89998ZM7 12.1573V14.1844C4.06718 14.5505 2 15.3867 2 16C2 16.807 5.57914 18 10 18C14.4209 18 18 16.807 18 16C18 15.3867 15.9328 14.5505 13 14.1844V12.1573C17.0559 12.6017 20 13.9678 20 16C20 18.5068 15.5203 20 10 20C4.47973 20 0 18.5068 0 16C0 13.9678 2.94412 12.6017 7 12.1573ZM13 5C13 6.65685 11.6569 8 10 8C8.34315 8 7 6.65685 7 5C7 3.34315 8.34315 2 10 2C11.6569 2 13 3.34315 13 5Z" fill="white"/>
                    </svg>
                </div>
                <div wire:click="edit('')" class="d-flex btn btn-outline-pink rounded-pill px-4 fs-8 ms-2">
                    {{ __('Edit') }}
                    <br>
                </div>
            </div>
            <div class="accordion-collapse row {{ $shipDetail == 1 ? 'show' : 'collapse' }}">
                <div class="col-md-6">
                    <p>{{ __('Shipping From') }}</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Contact Detail') }}</h6>
                            <p class="text-secondary">
                                @isset($data)
                                    {{ $from['company'] }} <br>
                                    {{ $from['email'] ?? '' }} <br>
                                    {{ $from['phone'] }}
                                @endisset
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Address') }}</h6>
                            <p class="text-secondary">
                                @isset($data)
                                    {{ $from['address1'] }}
                                @endisset
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p>{{ __('Shipping To') }}</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Contact Detail') }}</h6>
                            <p class="text-secondary">
                                @isset($data)
                                    {{ $to['company'] }} <br>
                                    {{ $to['email'] ?? '' }} <br>
                                    {{ $to['phone'] }}
                                @endisset
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Address') }}</h6>
                            <p class="text-secondary">
                                @isset($data)
                                    {{ $to['address1'] }}
                                @endisset
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <div wire:click="edit({{ '1' }})" class="d-flex btn btn-outline-pink rounded-pill px-4 fs-8 ms-2">
                    {{ __('Edit') }}
                </div>
            </div>
            <div id="flush-collapseTwo" class="accordion-collapse {{ $packDetail == 1 ? 'show' : 'collapse' }}">
                <div class="accordion-body">
                    <div class="mt-3">
                        <table class="table table-striped" width="100%">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Business Days</th>
{{--                                <th>Real Price</th>--}}
                                <th></th>
                                <th>Taxes</th>
                                <th>Total Price</th>
                            </tr>

                            @if(count($mServiceSummary))
                                    <tr>
                                        <td>{{ 1 }}</td>
                                        <td>{{$mServiceSummary['service_name']}}</td>
                                        <td>{{$mServiceSummary['days']}}</td>
                                        <td>{{$mServiceSummary['currency']}}</td>
                                        <td>{{'% '.substr_replace(substr($package['tax'],2), '.', 2, 0)}}</td> 
                                        <td class="fw-bolder text-primary">{{$final_payable = '$'.round(ltrim($this->mServiceSummary['negotiated_charge'], '$'),2)}}</td>
                                    </tr>
                            @endif
                        </table>
                    </div>
                    <div>
                        <table class="table table-striped mt-3" width="100%">
                            <tr>
                                <th>No.</th>
                                <th>Dimensions L x W X H</th>
                                <th>Weight</th>
                                <th>Insurance Val</th>
                                <th>Description</th>
                            </tr>
                            <tr>
                                @isset($data)
                                    <td class="text-secondary">1</td>
                                    <td class="text-secondary">{{ $package['length'] . 'x' . $package['width'] . 'x' . $package['height'] . ' (' . $package['type'] . ')' }}</td>
                                    <td class="text-secondary">{{ $package['weight'] . ' (' . $package['weight-type'] . ')' }}</td>
                                    <td class="text-secondary">{{ '$'.($package['insurance'] ?? __('0 ($)')) }}</td>
                                    <td class="text-secondary">{{ $package['desc_of_content'] }}</td>
                                @endisset
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 px-3 py-2 mt-3 shadow-none">
            <div class="accordion-header d-flex align-items-center py-2">
                <div class="d-flex btn btn-pink rounded-pill px-4 fs-8 show" >
                    <span class="me-2">{{ __('Amount Payable').' '.$final_payable }}</span>
                </div>
{{--                <span class="ms-3">--}}
{{--                    <input class="form-check-input me-1 checkbox" id="residential" type="checkbox" value="" aria-label="...">--}}
{{--                    <label for="residential">{{ __('Residential') }}</label>--}}
{{--                </span>--}}
            </div>
            @if(count($mServiceSummary))
                @livewire('components.pickup-and-delivery.content', ['userAddress' => $from , 'service' => $mServiceSummary ,'data' => $package])
            @endif
            <div class="accordion-collapse show" >
                <livewire:home.panel.services.parcel-content.parcel.payment />
            </div>
        </div>
    </div>
</div>