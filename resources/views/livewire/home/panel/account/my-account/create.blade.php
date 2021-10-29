<div>
    <form wire:submit.prevent="create">
        <div class="accordion-body px-0 row">
            <div class="col-md-6 mb-3">
                <label for="address1" class="form-label required fw-light fs-7 mb-1">{{__('Address Line 1')}}</label>
                <input type="text" wire:model.lazy="method.address1" class="form-control fw-lighter fs-8 {{ $errors->has('method.address1') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.address1',$validated) ? 'is-valid' : '' }}" id="address1" placeholder="{{__('Address Line 1')}}">
                @error('method.address1') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="name_of_card" class="form-label required fw-light fs-7 mb-1">{{__('Name on Card')}}</label>
                <input type="text" wire:model.lazy="method.name_of_card" class="form-control fw-lighter fs-8 {{ $errors->has('method.name_of_card') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.name_of_card',$validated) ? 'is-valid' : '' }}" id="name_of_card" placeholder="{{__('Name on Card')}}">
                @error('method.name_of_card') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address2" class="form-label fw-light fs-7 mb-1">{{__('Address Line 2')}}</label>
                <input type="text" wire:model.lazy="method.address2" class="form-control fw-lighter fs-8 {{ $errors->has('method.address2') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.address2',$validated) ? 'is-valid' : '' }}" id="address2" placeholder="{{__('Address Line 2')}}">
                @error('method.address2') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="credit_card" class="form-label required fw-light fs-7 mb-1">{{__('Credit Card #')}}</label>
                <input type="text" wire:model.lazy="method.credit_card" class="form-control fw-lighter fs-8 {{ $errors->has('method.credit_card') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.credit_card',$validated) ? 'is-valid' : '' }}" id="credit_card" placeholder="{{__('Credit Card #')}}">
                @error('method.credit_card') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="country" class="form-label required fw-light mb-0 mt-1 fs-7">{{ __('Country') }}</label>
                <select wire:model.lazy="method.country" class="form-control fw-lighter fs-8 {{ $errors->has('method.country') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.country',$validated) ? 'is-valid' : '' }}" id="country" aria-label="Default select example"  >
                    <option value="">{{ __('Select Country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->code }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('method.country') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-md-5">
                        <label for="ex_month" class="form-label required fw-light fs-7 mb-1">{{__('Expiry Month')}}</label>
                        <input type="text" wire:model.lazy="method.ex_month" class="form-control fw-lighter fs-8 {{ $errors->has('method.ex_month') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.ex_month',$validated) ? 'is-valid' : '' }}" id="ex_month" placeholder="{{__('Expiry Month')}}">
                        @error('method.Postal') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-7">
                        <label for="ex_year" class="form-label required fw-light fs-7 mb-1">Expired Year</label>
                        <input type="text" wire:model.lazy="method.ex_year" class="form-control fw-lighter fs-8 {{ $errors->has('method.ex_year') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.ex_year',$validated) ? 'is-valid' : '' }}" id="ex_year" placeholder="{{__('Expired Year')}}">
                        @error('method.ex_year') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="postal" class="form-label required fw-light fs-7 mb-1">{{__('Zip / Postal code')}}</label>
                <input type="text" wire:model.lazy="method.postal" class="form-control fw-lighter fs-8 {{ $errors->has('method.postal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.postal',$validated) ? 'is-valid' : '' }}" id="postal" placeholder="{{__('Zip / Postal code')}}">
                @error('method.postal') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="cvd_code" class="form-label required fw-light fs-7 mb-1">{{__('CVD Code')}}</label>
                <input type="text" wire:model.lazy="method.cvd_code" class="form-control fw-lighter fs-8 {{ $errors->has('method.cvd_code') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.cvd_code',$validated) ? 'is-valid' : '' }}" id="cvd_code" placeholder="{{__('CVD Code')}}">
                @error('method.cvd_code') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="city" class="form-label required fw-light fs-7 mb-1">{{__('City')}}</label>
                <input type="text" wire:model.lazy="method.city" class="form-control fw-lighter fs-8 {{ $errors->has('method.city') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.city',$validated) ? 'is-valid' : '' }}" id="city" placeholder="{{__('City')}}">
                @error('method.city') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="province" class="form-label required fw-light fs-7 mb-1">{{__('Province / State')}}</label>
                <input type="text" wire:model.lazy="method.province" class="form-control fw-lighter fs-8 {{ $errors->has('method.province') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.province',$validated) ? 'is-valid' : '' }}" id="province" placeholder="{{__('Province / State')}}">
                @error('method.province') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="country" class="form-label required fw-light mb-0 mt-1 fs-7">{{ __('Default Status') }}</label>
                <select wire:model.lazy="method.default" class="form-control fw-lighter fs-8 {{ $errors->has('method.default') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('method.default',$validated) ? 'is-valid' : '' }}" id="default" aria-label="Default select example"  >
                    <option value="">{{ __('-- Select as Default --') }}</option>
                    <option value="{{ __('1') }}">{{ __('It is Default') }}</option>
                    <option value="{{ __('0') }}">{{ __('It is not Default') }}</option>
                </select>
                @error('method.country') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="btn btn-pink w-100" id="Test">{{ __('Add New Method') }}</button>
    </form>
</div>
