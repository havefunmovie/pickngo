<div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-0 px-3 py-2 mt-3 {{ $agentDetail == 1 ? 'shadow-none' : 'shadow' }}">
            <div class="accordion-header d-flex align-items-center py-2">
                <div wire:click="agentDetailToggle" class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $agentDetail == 1 ? 'show' : 'collapsed' }}">
                    <span class="me-2">{{ __('Details') }}</span>
                    <svg width="17" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 9.89998V17H9V9.89998C6.71776 9.43671 5 7.41896 5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5C15 7.41896 13.2822 9.43671 11 9.89998ZM7 12.1573V14.1844C4.06718 14.5505 2 15.3867 2 16C2 16.807 5.57914 18 10 18C14.4209 18 18 16.807 18 16C18 15.3867 15.9328 14.5505 13 14.1844V12.1573C17.0559 12.6017 20 13.9678 20 16C20 18.5068 15.5203 20 10 20C4.47973 20 0 18.5068 0 16C0 13.9678 2.94412 12.6017 7 12.1573ZM13 5C13 6.65685 11.6569 8 10 8C8.34315 8 7 6.65685 7 5C7 3.34315 8.34315 2 10 2C11.6569 2 13 3.34315 13 5Z" fill="white"/>
                    </svg>
                </div>
                <div wire:click="edit" class="d-flex btn btn-outline-pink rounded-pill px-4 fs-8 ms-2">
                    {{ __('Edit') }}
                </div>
            </div>
            <div class="accordion-collapse row {{ $agentDetail == 1 ? 'show' : 'collapse' }}">
                <div class="col-md-12">
                    <p>{{ __('Scanning Detail & Price') }}</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Email') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{ $data['scanning']['email'] }}
                                @endif
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Count') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{ $data['scanning']['count'] }}
                                @endif
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Price') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{ $data['scanning']['price'] }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <p>{{ __('Agent') }}</p>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <h6>{{ __('Agent') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{ $data['agent']['name'] }}
                                @endif
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Operator Name') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{ $data['agent']['operator_name'] }}
                                @endif
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Phone') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{ $data['agent']['phone'] }}
                                @endif
                            </p>
                        </div>
                        <div class="col">
                            <h6>{{ __('Address') }}</h6>
                            <p class="text-secondary">
                                @if($data)
                                    {{ $data['agent']['address'] }}
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
                    <span class="me-2">@if($data) {{ __('Amount Payable $').$data['scanning']['price'] }} @endif</span>
                </div>
            </div>
            <div class="accordion-collapse show" >
                <livewire:home.panel.services.scanning-content.scanning.payment />
            </div>
        </div>
    </div>
</div>