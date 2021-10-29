<div>
    <form wire:submit.prevent="create" class="needs-validation">
        <div class="accordion-body px-0 row">
            <div class="col-md-6 mb-3">
                <label for="company" class="form-label required fw-light fs-7 mb-1">{{__('Company / Person')}}</label>
                <input type="text" wire:model.lazy="address.company" class="form-control {{ $errors->has('address.company') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.company',$validated) ? 'is-valid' : '' }}   fw-lighter fs-8" id="company" placeholder="{{__('Company / Person')}}">
                @error('address.company') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address1" class="form-label required fw-light fs-7 mb-1">{{__('Address Line 1')}}</label>
                <input type="text" wire:model.lazy="address.address1" class="form-control {{ $errors->has('address.address1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.address1',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="address1" placeholder="{{__('Address Line 1')}}">
                @error('address.address1') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address2" class="form-label fw-light fs-7 mb-1">{{__('Address Line 2')}}</label>
                <input type="text" wire:model.lazy="address.address2" class="form-control {{ $errors->has('address.address2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.address2',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="address2" placeholder="{{__('Address Line 2')}}">
                @error('address.address2') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Country') }}</label>
                <select wire:model.lazy="address.country" class="form-control fw-lighter fs-8 {{ $errors->has('address.country') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('address.country',$validated) ? 'is-valid' : '' }}" id="country" aria-label="Default select example"  >
                    <option value="">{{ __('Select Country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->code }}" >{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('address.country') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-md-5">
                        <label for="postal" class="form-label required fw-light fs-7 mb-1">{{__('Zip / Postal Code')}}</label>
                        <input type="text" wire:model.lazy="address.postal" class="form-control {{ $errors->has('address.postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.postal',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="postal" placeholder="{{__('Postal Code')}}">
                        @error('address.postal') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-7">
                        <label for="city" class="form-label required fw-light fs-7 mb-1">{{__('City')}}</label>
                        <input type="text" wire:model.lazy="address.city" class="form-control {{ $errors->has('address.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.city',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="city" placeholder="{{__('City')}}">
                        @error('address.city') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="province" class="form-label required fw-light fs-7 mb-1">{{__('Province / State')}}</label>
                <input type="text" wire:model.lazy="address.province" class="form-control {{ $errors->has('address.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.province',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="province" placeholder="{{__('Province / State')}}">
                @error('address.province') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="attention" class="form-label required fw-light fs-7 mb-1">{{__('Attention')}}</label>
                <input type="text" wire:model.lazy="address.attention" class="form-control {{ $errors->has('address.attention') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.attention',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="attention" placeholder="{{__('Attention')}}">
                @error('address.attention') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label required fw-light fs-7 mb-1">{{__('Phone')}}</label>
                <input type="text" wire:model.lazy="address.phone" class="form-control {{ $errors->has('address.phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.phone',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="phone" placeholder="{{__('Phone')}}">
                @error('address.phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label required fw-light fs-7 mb-1">{{__('Email')}}</label>
                <input type="email" wire:model.lazy="address.email" class="form-control {{ $errors->has('address.email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.email',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="email" placeholder="{{__('Email')}}">
                @error('address.email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="instruction" class="form-label required fw-light fs-7 mb-1">{{__('Instruction')}}</label>
                <input type="text" wire:model.lazy="address.instruction" class="form-control {{ $errors->has('address.instruction') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.instruction',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="instruction" placeholder="{{__('Instruction')}}">
                @error('address.instruction') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Shipping Type') }}</label>
                <select wire:model.lazy="address.type" class="form-control fw-lighter fs-8 {{ $errors->has('address.type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('address.type',$validated) ? 'is-valid' : '' }}" id="type" aria-label="Default select example"  >
                    <option value="">{{ __('Select Shipping Type') }}</option>
                    <option value="from">{{ __('From Shipping') }}</option>
                    <option value="to">{{ __('To Shipping') }}</option>
                </select>
                @error('address.type') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Service Type') }}</label>
                <select wire:model.lazy="address.service_type" class="form-control fw-lighter fs-8 {{ $errors->has('address.service_type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('address.service_type',$validated) ? 'is-valid' : '' }}" id="service_type" aria-label="Default select example"  >
                    <option value="">{{ __('Select Shipping Service') }}</option>
                    <option value="parcel">{{ __('Parcel') }}</option>
                    <option value="envelop">{{ __('Envelop') }}</option>
                </select>
                @error('address.service_type') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="btn btn-pink w-100" id="Test">{{ __('Create New Address Book') }}</button>
    </form>

</div>
