<div>
    @if($validateError)
        <div class="alert alert-warning">{{ $validateError }}</div>
    @endif
    <form wire:submit.prevent="saveFrom" class="needs-validation">
        <div class="accordion-body px-0 row">
            <div class="col-md-6 mb-3">
                <label for="company" class="form-label required fw-light fs-7 mb-1">{{__('Company / Person')}}</label>
                <input type="text" wire:model.lazy="from.company" class="form-control {{ $errors->has('from.company') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.company',$validated) ? 'is-valid' : '' }}   fw-lighter fs-8" id="company" placeholder="{{__('Company / Person')}}">
                @error('from.company') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address1" class="form-label required fw-light fs-7 mb-1">{{__('Address Line 1')}}</label>
                <input type="text" wire:model.lazy="from.address1" class="form-control {{ $errors->has('from.address1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.address1',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="address1" placeholder="{{__('Address Line 1')}}">
                @error('from.address1') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address2" class="form-label fw-light fs-7 mb-1">{{__('Address Line 2')}}</label>
                <input type="text" wire:model.lazy="from.address2" class="form-control {{ $errors->has('from.address2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.address2',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="address2" placeholder="{{__('Address Line 2')}}">
                @error('from.address2') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Country') }}</label>
                <select wire:model.lazy="from.country" class="form-control form-control-sm fw-lighter fs-8 {{ $errors->has('from.country') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('from.country',$validated) ? 'is-valid' : '' }}" id="country" aria-label="Default select example"  >
                    <option value="" selected>{{ __('Select Country') }}</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->code }}" >{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('from.country') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <div class="row">
                    <div class="col-md-5">
                        <label for="postal" class="form-label required fw-light fs-7 mb-1">{{__('Zip / Postal Code')}}</label>
                        <input type="text" wire:model.lazy="from.postal" class="form-control {{ $errors->has('from.postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.Postal',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="postal" placeholder="{{__('Postal Code')}}">
                        @error('from.postal') <span class="error">{{ substr($message,9) }}</span> @enderror
                    </div>
                    <div class="col-md-7">
                        <label for="city" class="form-label required fw-light fs-7 mb-1">{{__('City')}}</label>
                        <input type="text" wire:model.lazy="from.city" class="form-control {{ $errors->has('from.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.city',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="city" placeholder="{{__('City')}}">
                        @error('from.city') <span class="error">{{ substr($message,9) }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="province" class="form-label required fw-light fs-7 mb-1">{{__('Province / State')}}</label>
                <input type="text" wire:model.lazy="from.province" class="form-control {{ $errors->has('from.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.province',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="province" placeholder="{{__('Province / State')}}">
                @error('from.province') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="attention" class="form-label required fw-light fs-7 mb-1">{{__('Attention')}}</label>
                <input type="text" wire:model.lazy="from.attention" class="form-control {{ $errors->has('from.attention') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.attention',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="attention" placeholder="{{__('Attention')}}">
                @error('from.attention') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label required fw-light fs-7 mb-1">{{__('Phone')}}</label>
                <input type="text" wire:model.lazy="from.phone" class="form-control {{ $errors->has('from.phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.phone',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="phone" placeholder="{{__('Phone')}}">
                @error('from.phone') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label required fw-light fs-7 mb-1">{{__('Email')}}</label>
                <input type="email" wire:model.lazy="from.email" class="form-control {{ $errors->has('from.email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.email',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="email" placeholder="{{__('Email')}}">
                @error('from.email') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="instruction" class="form-label required fw-light fs-7 mb-1">{{__('Instruction')}}</label>
                <input type="text" wire:model.lazy="from.instruction" class="form-control {{ $errors->has('from.instruction') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.instruction',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="instruction" placeholder="{{__('Instruction')}}">
                @error('from.instruction') <span class="error">{{ substr($message,9) }}</span> @enderror
            </div>
            @if (!isset($from['is-ab']))
            <div class="col-md-6 mt-2">
                <input class="form-check-input me-1 checkbox" wire:model.lazy="from.addressBook" id="addressBook" type="checkbox" value="true">
                <label for="addressBook">{{ __('Save to address book') }}</label>
            </div>
            @endif
        </div>
        <button class="btn btn-pink w-100" id="Test">{{ __('Next') }}</button>
    </form>

</div>
