<div>
    <form wire:submit.prevent="getLabel">
        <div class="accordion-body px-0 row">
            <div class="col-md-6 mb-3">
                <label for="address1" class="form-label required fw-light fs-7 mb-1">{{__('Address Line 1')}}</label>
                <input type="text" wire:model.lazy="payment.address1" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.address1') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.address1',$validated) ? 'is-valid' : '' }}" id="address1" placeholder="{{__('Address Line 1')}}">
                @error('payment.address1') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="name_of_card" class="form-label required fw-light fs-7 mb-1">{{__('Name on Card')}}</label>
                <input type="text" wire:model.lazy="payment.name_of_card" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.name_of_card') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.name_of_card',$validated) ? 'is-valid' : '' }}" id="name_of_card" placeholder="{{__('Name on Card')}}">
                @error('payment.name_of_card') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address2" class="form-label fw-light fs-7 mb-1">{{__('Address Line 2')}}</label>
                <input type="text" wire:model.lazy="payment.address2" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.address2') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.address2',$validated) ? 'is-valid' : '' }}" id="address2" placeholder="{{__('Address Line 2')}}">
                @error('payment.address2') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="credit_card" class="form-label required fw-light fs-7 mb-1">{{__('Credit Card #')}}</label>
                <input type="text" wire:model.lazy="payment.credit_card" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.credit_card') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.credit_card',$validated) ? 'is-valid' : '' }}" id="credit_card" placeholder="{{__('Credit Card #')}}">
                @error('payment.credit_card') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="country" class="form-label required fw-light mb-0 mt-1 fs-7">{{ __('Country') }}</label>
                <select wire:model.lazy="payment.country" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control form-control-sm fw-lighter fs-8 {{ $errors->has('payment.country') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.country',$validated) ? 'is-valid' : '' }}" id="country" aria-label="Default select example"  >
                    <option value="">{{ __('Select Country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->code }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('payment.country') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-md-5">
                        <label for="ex_month" class="form-label required fw-light fs-7 mb-1">{{__('Expiry Month')}}</label>
                        <input type="text" wire:model.lazy="payment.ex_month" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.ex_month') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.ex_month',$validated) ? 'is-valid' : '' }}" id="ex_month" placeholder="{{__('Expiry Month')}}">
                        @error('payment.ex_month') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-7">
                        <label for="ex_year" class="form-label required fw-light fs-7 mb-1">Expired Year</label>
                        <input type="text" wire:model.lazy="payment.ex_year" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.ex_year') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.ex_year',$validated) ? 'is-valid' : '' }}" id="ex_year" placeholder="{{__('Expired Year')}}">
                        @error('payment.ex_year') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="postal" class="form-label required fw-light fs-7 mb-1">{{__('Zip / Postal code')}}</label>
                <input type="text" wire:model.lazy="payment.postal" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.postal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.postal',$validated) ? 'is-valid' : '' }}" id="postal" placeholder="{{__('Zip / Postal code')}}">
                @error('payment.postal') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="cvd_code" class="form-label required fw-light fs-7 mb-1">{{__('CVD Code')}}</label>
                <input type="text" wire:model.lazy="payment.cvd_code" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.cvd_code') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.cvd_code',$validated) ? 'is-valid' : '' }}" id="cvd_code" placeholder="{{__('CVD Code')}}">
                @error('payment.cvd_code') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="city" class="form-label required fw-light fs-7 mb-1">{{__('City')}}</label>
                <input type="text" wire:model.lazy="payment.city" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.city') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.city',$validated) ? 'is-valid' : '' }}" id="city" placeholder="{{__('City')}}">
                @error('payment.city') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
            </div>
            <div class="col-md-6 mb-3">
                <label for="province" class="form-label required fw-light fs-7 mb-1">{{__('Province / State')}}</label>
                <input type="text" wire:model.lazy="payment.province" {{ $paypal === 'paypal' ? 'disabled' : '' }} class="form-control fw-lighter fs-8 {{ $errors->has('payment.province') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('payment.province',$validated) ? 'is-valid' : '' }}" id="province" placeholder="{{__('Province / State')}}">
                @error('payment.province') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <span class="ms-3">
            <input wire:model="paypal" class="form-check-input me-1 checkbox" id="credit" type="radio" name="" value="credit" checked aria-label="...">
            <label for="credit">{{ __('Credit Card') }}</label>
        </span>
            <span class="ms-3">
            <input wire:model="paypal" class="form-check-input me-1 checkbox" id="paypal" type="radio" name="" value="paypal" aria-label="...">
            <label for="paypal">{{ __('Paypal') }}</label>
        </span>
        <button class="btn btn-pink w-100 mt-3" id="Test">{{ __('Next') }}</button>
    </form>
</div>
