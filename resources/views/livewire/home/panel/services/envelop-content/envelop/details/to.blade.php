<div>
    <form wire:submit.prevent="saveTo">
        <div class="accordion-body px-0 row">
            <div class="col-md-6 mb-3">
                <label for="company" class="form-label required fw-light fs-7 mb-1">{{__('Company')}}</label>
                <input type="text" wire:model.lazy="to.company" class="form-control {{ $errors->has('to.company') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.company',$validated) ? 'is-valid' : '' }}   fw-lighter fs-8" id="company" placeholder="{{__('Company')}}">
                @error('to.company') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="attention" class="form-label required fw-light fs-7 mb-1">{{__('Attention / Person')}}</label>
                <input type="text" wire:model.lazy="to.attention" class="form-control {{ $errors->has('to.attention') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.attention',$validated) ? 'is-valid' : '' }} fw-lighter fs-8" id="attention" placeholder="{{__('Attention / Person')}}">
                @error('to.attention') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label required fw-light fs-7 mb-1">{{__('Phone')}}</label>
                <input type="text" wire:model.lazy="to.phone" class="form-control {{ $errors->has('to.phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.phone',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="phone" placeholder="{{__('Phone')}}">
                @error('to.phone') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address1" class="form-label required fw-light fs-7 mb-1">{{__('Address Line 1')}}</label>
                <input type="text" wire:model.lazy="to.address1" class="form-control {{ $errors->has('to.address1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.address1',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="address1" placeholder="{{__('Address Line 1')}}">
                @error('to.address1') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address2" class="form-label fw-light fs-7 mb-1">{{__('Address Line 2')}}</label>
                <input type="text" wire:model.lazy="to.address2" class="form-control {{ $errors->has('to.address2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.address2',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="address2" placeholder="{{__('Address Line 2')}}">
                @error('to.address2') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label fw-light required mb-0 mt-1 fs-7">{{ __('Country') }}</label>
                <select wire:model.lazy="to.country" class="form-control fw-lighter fs-8 {{ $errors->has('to.country') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('to.country',$validated) ? 'is-valid' : '' }}" id="country" aria-label="Default select example"  >
                    <option value="" selected>{{ __('Select Country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->code }}" >{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('to.country') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-md-5">
                        <label for="postal" class="form-label required fw-light fs-7 mb-1">{{__('Zip / Postal Code')}}</label>
                        <input type="text" wire:model.lazy="to.postal" class="form-control {{ $errors->has('to.postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.Postal',$validated) ? 'is-valid' : '' }} fw-lighter fs-8" id="postal" placeholder="{{__('Postal Code')}}">
                        @error('to.postal') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-7">
                        <label for="city" class="form-label required fw-light fs-7 mb-1">{{__('City')}}</label>
                        <input type="text" wire:model.lazy="to.city" class="form-control {{ $errors->has('to.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.city',$validated) ? 'is-valid' : '' }} fw-lighter fs-8" id="city" placeholder="{{__('City')}}">
                        @error('to.city') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="province" class="form-label required fw-light fs-7 mb-1">{{__('Province / State')}}</label>
                <input type="text" wire:model.lazy="to.province" class="form-control {{ $errors->has('to.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.province',$validated) ? 'is-valid' : '' }} fw-lighter fs-8" id="province" placeholder="{{__('Province / State')}}">
                @error('to.province') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label fw-light fs-7 mb-1">{{__('Email')}}</label>
                <input type="email" wire:model.lazy="to.email" class="form-control {{ $errors->has('to.email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.email',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="email" placeholder="{{__('Email')}}">
                @error('to.email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="instruction" class="form-label fw-light fs-7 mb-1">{{__('Instruction')}}</label>
                <input type="text" wire:model.lazy="to.instruction" class="form-control {{ $errors->has('to.instruction') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.instruction',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="instruction" placeholder="{{__('Instruction')}}">
                @error('to.instruction') <span class="error">{{ $message }}</span> @enderror
            </div>
            @if (!isset($to['is-ab']))
                <div class="col-md-6 mt-2">
                    <input class="form-check-input me-1 checkbox" wire:model.lazy="to.addressBook" id="addressBook" type="checkbox" value="true">
                    <label for="addressBook">{{ __('Save to address book') }}</label>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6 mb-3 mb-0">
                <a class="btn btn-outline-pink w-100 col-md-6" wire:click="back">{{ __('Back') }}</a>
            </div>
            <div class="col-md-6">
                <button class="btn btn-pink w-100 col-md-6" id="Test">{{__('Next')}}</button>
            </div>
        </div>
    </form>

</div>
