<div class="border-1 p-3 mt-3">
    <div>
        <div class="row">
            <div class="col-md-6 mb-0">
                <img src="{{ asset('images/home/logo.png') }}" class="w-25 text-start" />
            </div>
            <div class="col-md-6 text-end">
                {{ __('Tracking Number:') }}
                <span style="font-weight: bolder;">
                    @isset($data) {{ $data['tracking_code'] }} @endisset
                </span>
            </div>
        </div>
        <table class="table table-striped mt-3 w-100">
            <thead>
            <tr>
                <th>{{ __('Box Number') }}</th>
                <th>{{ __('Box Type') }}</th>
                <th>{{ __('Renewal Date') }}</th>
            </tr>
            </thead>
            <tbody>
            @isset($data)
                <tr>
                    <td>{{ $data['number'] }}</td>
                    <td>{{ $data['type'] }}</td>
                    <td>{{ $data['ren_date'] }}</td>
                </tr>
            @endisset
            </tbody>
{{--            <tfoot>--}}
{{--            <tr>--}}
{{--                <th class="text-end" colspan="2">--}}
{{--                    {{ __('Total Price:') }}--}}
{{--                </th>--}}
{{--                <th class="">--}}
{{--                    @isset($data) {{ '$'.$data['price'] }} @endisset--}}
{{--                </th>--}}
{{--            </tr>--}}
{{--            </tfoot>--}}
        </table>
        <div class="accordion-collapse row show mt-3">
            <div class="col-md-12">
                <p class="fw-bolder">{{ __('Details & Prices') }}</p>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6>{{ __('Full Name') }}</h6>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ $data['customer_1'] }}
                            @endif
                        </p>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ '$0' }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <h6>{{ __('Additional Full Name') }}</h6>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ $data['customer_2'] }}
                            @endif
                        </p>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ $data['customer_2'] != '' ? '$'. $data['prices']['customer_2'] : '$0' }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <h6>{{ __('Additional Full Name') }}</h6>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ $data['customer_3'] }}
                            @endif
                        </p>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ $data['customer_3'] != '' ? '$'. $data['prices']['customer_3'] : '$0' }}
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
                                    {{ __('Personal') }}
                                    @break
                                    @case('personal_plus')
                                    {{ __('Personal Plus') }}
                                    @break
                                    @case('business')
                                    {{ __('Business') }}
                                    @break
                                    @case('corporate')
                                    {{ __('Corporate') }}
                                    @break
                                @endswitch
                            @endif
                        </p>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                @switch($data['mailbox_type'])
                                    @case('personal')
                                    {{ '$'.$data['prices']['personal_mode'] }}
                                    @break
                                    @case('personal_plus')
                                    {{ '$'.$data['prices']['personal_plus_mode'] }}
                                    @break
                                    @case('business')
                                    {{ '$'.$data['prices']['business_mode'] }}
                                    @break
                                    @case('corporate')
                                    {{ '$'.$data['prices']['corporate_mode'] }}
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
                                {{ !$data['key_status'] ? '' : 'Has Key' }}
                            @endif
                        </p>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ !$data['key_status'] ? '$0' : '$'.$data['prices']['rental_fee'] }}
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
                                {{ !$data['key_status'] ? '' : 'Has Key' }}
                            @endif
                        </p>
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ !$data['key_status'] ? '$0' : '$'.$data['prices']['refundable_deposit'] }}
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
                    </div>
                    <div class="col">
                        <p class="text-secondary">
                            @if($data)
                                {{ '$'.$data['prices']['price'] }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <p class="fw-bolder">{{ __('Total Price') }}</p>
                    </div>
                    <div class="col">
                    </div>
                    <div class="col">
                        <p class="text-blue-500 fw-bolder">
                            @if($data)
                                {{ '$'.$data['total_price'] }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-12">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <p class="fw-bolder">{{ __('Amount Payable') }}</p>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <p class="text-blue-500">--}}
{{--                            @if($data)--}}
{{--                                {{ '$'.$final_payable }}--}}
{{--                            @endif--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <span style="font-weight: bolder">{{ __('Agent Address:') }}</span>
            </div>
            <div class="col-md-9">
                @isset($data) <span>{{ $data['address'] }}</span> @endisset
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <span style="font-weight: bolder">{{ __('Agent Name:') }}</span>
            </div>
            <div class="col-md-3">
                @isset($data) <span>{{ $data['name'] }}</span> @endisset
            </div>
            <div class="col-md-3">
                <span style="font-weight: bolder">{{ __('Agent Phone:') }}</span>
            </div>
            <div class="col-md-3">
                @isset($data) <span>{{ $data['mobile'] }}</span> @endisset
            </div>
        </div>
    </div>
</div>
