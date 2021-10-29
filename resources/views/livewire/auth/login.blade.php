<div>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 mt-24 mb-24">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            @if($loginStatus)
                <div class="toastrMsg alert alert-danger mt-2">{{ $loginStatus }}</div>
            @endif

            <form wire:submit.prevent="login" class="needs-validation">
                <div>
                    <label class="form-label required fw-light fs-7 mb-1" for="email">{{ __('Email') }}</label>
                    <input type="text" wire:model.lazy="login.email" class="form-control fw-lighter fs-8 {{ $errors->has('login.email') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('login.email',$validated) ? 'is-valid' : '' }}" id="email">
                    @error('login.email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <label class="form-label required fw-light fs-7 mb-1" for="password">{{ __('Password') }}</label>
                    <input type="password" wire:model.lazy="login.password" class="form-control fw-lighter fs-8 {{ $errors->has('login.password') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('login.password',$validated) ? 'is-valid' : '' }}" id="password">
                    @error('login.password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mt-2">
                    <div class="row">
                        <div class="w-50">
                            <input wire:model="remember" class="form-check-input me-1 checkbox" id="addressBook" type="checkbox" value="true">
                            <label for="addressBook">{{ __('Remember me') }}</label>
                        </div>
                        <div class="w-50 text-right">
                            <a href="{{ route('register') }}">{{ __('Forget Password') }}</a>
                        </div>
                    </div>
                </div>
                <button class="btn btn-pink w-100 mt-4" id="Test">{{ __('Login') }}</button>
            </form>
        </div>
    </div>
</div>
