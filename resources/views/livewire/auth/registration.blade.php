<div>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 mt-3 mb-3">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            @if($registerStatus)
                <div class="toastrMsg alert alert-danger mt-2">{{ $registerStatus }}</div>
            @endif

            <form wire:submit.prevent="register" class="needs-validation">
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="name">{{ __('Name') }}</label>
                    <input type="text" wire:model.lazy="register.name" class="form-control fw-lighter fs-8 {{ $errors->has('register.name') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.name',$validated) ? 'is-valid' : '' }}" id="name">
                    @error('register.name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="family">{{ __('Family') }}</label>
                    <input type="text" wire:model.lazy="register.family" class="form-control fw-lighter fs-8 {{ $errors->has('register.family') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.family',$validated) ? 'is-valid' : '' }}" id="family">
                    @error('register.family') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="mobile">{{ __('Phone') }}</label>
                    <input type="text" wire:model.lazy="register.mobile" class="form-control fw-lighter fs-8 {{ $errors->has('register.mobile') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.mobile',$validated) ? 'is-valid' : '' }}" id="mobile">
                    @error('register.mobile') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="email">{{ __('Email') }}</label>
                    <input type="text" wire:model.lazy="register.email" class="form-control fw-lighter fs-8 {{ $errors->has('register.email') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.email',$validated) ? 'is-valid' : '' }}" id="email">
                    @error('register.email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="password">{{ __('Password') }}</label>
                    <input type="password" wire:model.lazy="register.password" class="form-control fw-lighter fs-8 {{ $errors->has('register.password') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.password',$validated) ? 'is-valid' : '' }}" id="password">
                    @error('register.password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="password_confirmation">{{ __('Password Confirmation') }}</label>
                    <input type="password" wire:model.lazy="register.password_confirmation" class="form-control fw-lighter fs-8 {{ $errors->has('register.password_confirmation') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.password_confirmation',$validated) ? 'is-valid' : '' }}" id="password_confirmation">
                    @error('register.password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="address">{{ __('Address') }}</label>
                    <input type="text" wire:model.lazy="register.address" class="form-control fw-lighter fs-8 {{ $errors->has('register.address') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.address',$validated) ? 'is-valid' : '' }}" id="address">
                    @error('register.address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="postal">{{ __('Postal Code') }}</label>
                    <input type="text" wire:model.lazy="register.postal" class="form-control fw-lighter fs-8 {{ $errors->has('register.postal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.postal',$validated) ? 'is-valid' : '' }}" id="postal">
                    @error('register.postal') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="city">{{ __('City') }}</label>
                    <input type="text" wire:model.lazy="register.city" class="form-control fw-lighter fs-8 {{ $errors->has('register.city') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.city',$validated) ? 'is-valid' : '' }}" id="city">
                    @error('register.city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="company_name">{{ __('Company Name') }}</label>
                    <input type="text" wire:model.lazy="register.company_name" class="form-control fw-lighter fs-8 {{ $errors->has('register.company_name') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.company_name',$validated) ? 'is-valid' : '' }}" id="company_name">
                    @error('register.company_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
{{--                <div>--}}
{{--                    <label class="form-label required fw-light fs-7 mb-1" for="email">{{ __('Email') }}</label>--}}
{{--                    <input type="text" wire:model.lazy="register.email" class="form-control fw-lighter fs-8 {{ $errors->has('register.email') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('register.email',$validated) ? 'is-valid' : '' }}" id="email">--}}
{{--                    @error('register.email') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                </div>--}}
                <div class="mt-2">
                    <div class="row">
                        <div class="w-100 text-right">
                            <a href="{{ route('login') }}">{{ __('I have an account') }}</a>
                        </div>
                    </div>
                </div>
                <button class="btn btn-pink w-100 mt-4" id="Test">{{ __('Register') }}</button>
            </form>
        </div>
    </div>
</div>
