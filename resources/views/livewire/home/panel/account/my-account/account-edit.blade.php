<div>
    <form wire:submit.prevent="edit" class="needs-validation">
        <div class="accordion-body px-0 row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label required fw-light fs-7 mb-1">{{__('Name')}}</label>
                <input type="text" wire:model.lazy="user.name" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.name',$validated) ? 'is-valid' : '' }}   fw-lighter fs-8" id="name" placeholder="{{__('Name')}}">
                @error('user.name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="family" class="form-label required fw-light fs-7 mb-1">{{__('Family')}}</label>
                <input type="text" wire:model.lazy="user.family" class="form-control {{ $errors->has('user.family') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.family',$validated) ? 'is-valid' : '' }}   fw-lighter fs-8" id="family" placeholder="{{__('Family')}}">
                @error('user.family') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label required fw-light fs-7 mb-1">{{__('Email')}}</label>
                <input type="email" wire:model.lazy="user.email" class="form-control {{ $errors->has('user.email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.email',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="email" placeholder="{{__('Email')}}">
                @error('user.email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="mobile" class="form-label required fw-light fs-7 mb-1">{{__('Phone')}}</label>
                <input type="text" wire:model.lazy="user.mobile" class="form-control {{ $errors->has('user.mobile') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.mobile',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="mobile" placeholder="{{__('Phone')}}">
                @error('user.mobile') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="address" class="form-label required fw-light fs-7 mb-1">{{__('Address')}}</label>
                <input type="text" wire:model.lazy="user.address" class="form-control {{ $errors->has('user.address') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.address',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="address" placeholder="{{__('Address')}}">
                @error('user.address') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="postal" class="form-label required fw-light fs-7 mb-1">{{__('Zip / Postal Code')}}</label>
                <input type="text" wire:model.lazy="user.postal" class="form-control {{ $errors->has('user.postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.postal',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="postal" placeholder="{{__('Postal Code')}}">
                @error('user.postal') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label required fw-light fs-7 mb-1">{{__('Password')}}</label>
                <input type="password" wire:model.lazy="user.password" class="form-control {{ $errors->has('user.password') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.password',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="password" placeholder="{{__('Password')}}">
                @error('user.password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label required fw-light fs-7 mb-1">{{__('Password Confirmation')}}</label>
                <input type="password" wire:model.lazy="user.password_confirmation" class="form-control {{ $errors->has('user.password_confirmation') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.password_confirmation',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="password_confirmation" placeholder="{{__('Password Confirmation')}}">
                @error('user.password_confirmation') <span class="error">{{ $message }}</span> @enderror
            </div>

{{--            <div class="col-md-6 mb-3">--}}
{{--                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Country') }}</label>--}}
{{--                <select wire:model.lazy="user.country" class="form-control form-control-sm fw-lighter fs-8 {{ $errors->has('user.country') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('user.country',$validated) ? 'is-valid' : '' }}" id="country" aria-label="Default select example"  >--}}
{{--                    <option value="">{{ __('Select Country') }}</option>--}}
{{--                    @foreach($countries as $country)--}}
{{--                        <option value="{{ $country->code }}" @if(@isset($from['country']) && ($from['country'] === $country->code)) selected @endif>{{ $country->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @error('user.country') <span class="error">{{ $message }}</span> @enderror--}}
{{--            </div>--}}
            <div class="col-md-6">
                <label for="city" class="form-label required fw-light fs-7 mb-1">{{__('City')}}</label>
                <input type="text" wire:model.lazy="user.city" class="form-control {{ $errors->has('user.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.city',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="city" placeholder="{{__('City')}}">
                @error('user.city') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="province" class="form-label required fw-light fs-7 mb-1">{{__('Province / State')}}</label>
                <input type="text" wire:model.lazy="user.province" class="form-control {{ $errors->has('user.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user.province',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="province" placeholder="{{__('Province / State')}}">
                @error('user.province') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <button class="btn btn-pink w-100" id="Test">{{ __('Edit') }}</button>
    </form>

</div>
