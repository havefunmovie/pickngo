<div>
    <x-slot name="title">
        edit payment
    </x-slot>
{{--    <x-slot name="styles">--}}
{{--        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />--}}
{{--        <style>--}}
{{--            /* CHECKBOX TOGGLE SWITCH */--}}
{{--            /* @apply rules for documentation, these do not work as inline style */--}}
{{--            .toggle-checkbox:checked {--}}
{{--                @apply: right-0 border-green-400;--}}
{{--                right: 0;--}}
{{--                border-color: #68D391;--}}
{{--            }--}}
{{--            .toggle-checkbox:checked + .toggle-label {--}}
{{--                @apply: bg-green-400;--}}
{{--                background-color: #68D391;--}}
{{--            }--}}
{{--        </style>--}}
{{--    </x-slot>--}}
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Payment Methods</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Payment Methods</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Payment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Method Info</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form wire:submit.prevent="edit" class="needs-validation bt-switch">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking-">Address Line1 :</label>
                                            <input type="text" wire:model.lazy="payment.address1" class="form-control {{ $errors->has('payment.address1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.address1',$validated) ? 'is-valid' : '' }}" id="address1">
                                            @error('payment.address1') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking-">Name on Card :</label>
                                            <input type="text" wire:model.lazy="payment.name_of_card" class="form-control {{ $errors->has('payment.name_of_card') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.name_of_card',$validated) ? 'is-valid' : '' }}" id="name_of_card">
                                            @error('payment.name_of_card') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking-">Address Line 2 :</label>
                                            <input type="text" wire:model.lazy="payment.address2" class="form-control {{ $errors->has('payment.address2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.address2',$validated) ? 'is-valid' : '' }}" id="address2">
                                            @error('payment.address2') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking-">Credit Card # :</label>
                                            <input type="text" wire:model.lazy="payment.credit_card" class="form-control {{ $errors->has('payment.credit_card') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.credit_card',$validated) ? 'is-valid' : '' }}" id="credit_card">
                                            @error('payment.credit_card') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country :</label>
                                            <select wire:model.lazy="payment.country" class="custom-select form-control {{ $errors->has('payment.country') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.country',$validated) ? 'is-valid' : '' }}" id="country">
                                                <option value="" hidden>{{ __('') }}</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('payment.country') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tracking-">Expiry Month :</label>
                                            <input type="text" wire:model.lazy="payment.ex_month" class="form-control {{ $errors->has('payment.ex_month') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.ex_month',$validated) ? 'is-valid' : '' }}" id="ex_month">
                                            @error('payment.ex_month') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tracking-">Expired Year :</label>
                                            <input type="text" wire:model.lazy="payment.ex_year" class="form-control {{ $errors->has('payment.ex_year') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.ex_year',$validated) ? 'is-valid' : '' }}" id="ex_year">
                                            @error('payment.ex_year') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking-">Zip / Postal code :</label>
                                            <input type="text" wire:model.lazy="payment.postal" class="form-control {{ $errors->has('payment.postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.postal',$validated) ? 'is-valid' : '' }}" id="postal">
                                            @error('payment.postal') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking-">CVD Code :</label>
                                            <input type="text" wire:model.lazy="payment.cvd_code" class="form-control {{ $errors->has('payment.cvd_code') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.cvd_code',$validated) ? 'is-valid' : '' }}" id="cvd_code">
                                            @error('payment.cvd_code') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking-">City :</label>
                                            <input type="text" wire:model.lazy="payment.city" class="form-control {{ $errors->has('payment.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.city',$validated) ? 'is-valid' : '' }}" id="city">
                                            @error('payment.city') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tracking-">Province / State :</label>
                                            <input type="text" wire:model.lazy="payment.province" class="form-control {{ $errors->has('payment.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.province',$validated) ? 'is-valid' : '' }}" id="province">
                                            @error('payment.province') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="country">Default :</label>
                                            <select wire:model.lazy="payment.default" class="custom-select form-control {{ $errors->has('payment.default') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.default',$validated) ? 'is-valid' : '' }}" id="default">
                                                <option value="" hidden>{{ __('') }}</option>
                                                <option value="1" {{ $payment['default'] == '1' ? 'selected' : '' }}>{{ __('It is Default') }}</option>
                                                <option value="0" {{ $payment['default'] == '0' ? 'selected' : '' }}>{{ __('It is not Default') }}</option>
                                            </select>
                                            @error('payment.default') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info float-right">{{ __('Edit Method') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
