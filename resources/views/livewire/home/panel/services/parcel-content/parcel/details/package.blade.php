<div>
    <form wire:submit.prevent="savePackage">
        <div class="accordion-body px-0 row">
            <div class="col-md-12 mb-3">
                <div class="row">
                    <label for="company" class="form-label fw-light fs-7 mb-1">{{__('Weight')}}</label>
                    <div class="col-md-9 mb-1 mb-md-0">
                        <input type="text" wire:model.lazy="package.weight" value="@if(@isset($package['package'])) {{$package['weight']}} @else {{''}} @endif" class="form-control fw-lighter fs-8 {{ $errors->has('package.weight') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('package.weight',$validated) ? 'is-valid' : '' }}" id="package" placeholder="{{__('Package Weight (LBS)')}}">
                        @error('package.weight') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <select wire:model.lazy="package.weight-type" class="form-control fw-lighter fs-8 {{ $errors->has('package.weight-type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('package.weight-type',$validated) ? 'is-valid' : '' }}" id="weight-type" aria-label="Default select example"  >
                            <option value="">{{ __('Select Type') }}</option>
                            <option value="{{ __('LBS') }}" @if(@isset($package['weight-type']) && ($package['weight-type'] === 'LBS')) selected @endif>{{ __('Pounds') }}</option>
                            <option value="{{ __('KGS') }}" @if(@isset($package['weight-type']) && ($package['weight-type'] === 'KGS')) selected @endif>{{ __('Kilograms') }}</option>
                        </select>
                        @error('package.weight-type') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label fw-light mb-0 mt-1 fs-7">{{ __('DIMS (LxWxH INCHES)') }}</label>
                <div class="row">
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input type="text" class="form-control fw-lighter fs-8 {{ $errors->has('package.length') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.length',$validated) ? 'is-valid' : '' }}" wire:model.lazy="package.length" id="length" value="1" placeholder="{{__('Length')}}">
                        @error('package.length') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input type="text" class="form-control fw-lighter fs-8 {{ $errors->has('package.width') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.width',$validated) ? 'is-valid' : '' }}" wire:model.lazy="package.width" id="width" value="1" placeholder="{{__('Width')}}">
                        @error('package.width') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input type="text" class="form-control fw-lighter fs-8 {{ $errors->has('package.height') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.height',$validated) ? 'is-valid' : '' }}" wire:model.lazy="package.height" id="height" value="1" placeholder="{{__('Height')}}">
                        @error('package.height') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <select wire:model.lazy="package.type" class="form-control fw-lighter fs-8 {{ $errors->has('package.type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('package.type',$validated) ? 'is-valid' : '' }}" id="type" aria-label="Default select example"  >
                            <option value="">{{ __('Select Type') }}</option>
                            <option value="{{ __('IN') }}" @if(@isset($package['type']) && ($package['type'] === 'IN')) selected @endif>{{ __('Inches') }}</option>
                            <option value="{{ __('CM') }}" @if(@isset($package['type']) && ($package['type'] === 'CM')) selected @endif>{{ __('Centimeters') }}</option>
                        </select>
                        @error('package.type') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="insurance" class="form-label fw-light fs-7 mb-1">{{__('Insurance')}}</label>
                        <input type="text" wire:model.lazy="package.insurance" class="form-control {{ $errors->has('package.insurance') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('package.insurance',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="insurance" placeholder="{{__('Insurance')}}">
                        @error('package.insurance') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="unit" class="form-label fw-light fs-7 mb-1">{{__('Unit')}}</label>
                        <input type="text" wire:model.lazy="package.unit" class="form-control {{ $errors->has('package.unit') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('package.unit',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="unit" placeholder="{{__('Unit')}}">
                        @error('package.unit') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="country" class="form-label fw-light fs-7 mb-1">{{__('Country of Origin')}}</label>
                        <input type="text" wire:model.lazy="package.country" class="form-control {{ $errors->has('package.country') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('package.country',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="country" placeholder="{{__('Country of Origin')}}">
                        @error('package.country') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="value_of_content" class="form-label fw-light fs-7 mb-1">{{__('Value of Content')}}</label>
                        <input type="text" wire:model.lazy="package.value_of_content" class="form-control {{ $errors->has('package.value_of_content') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('package.value_of_content',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="value_of_content" placeholder="{{__('Value of Content')}}">
                        @error('package.value_of_content') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <label for="desc_of_content" class="form-label required fw-light fs-7 mb-1">{{__('Description of Content')}}</label>
                        <textarea type="text" wire:model.lazy="package.desc_of_content" class="form-control {{ $errors->has('package.desc_of_content') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('package.desc_of_content',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="desc_of_content" placeholder="{{__('Description of Content')}}"></textarea>
                        @error('package.desc_of_content') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3 mb-0">
                <a class="btn btn-outline-pink w-100 col-md-6" wire:click="back">{{ __('Back') }}</a>
            </div>
            <div class="col-md-6">
                @if(!$this->loadingMode)
                    <button class="btn btn-pink w-100 col-md-6 text-white" id="Test">{{__('Next')}}</button>
                @else
                    <button class="btn btn-pink w-100 col-md-6 text-white" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                @endif
            </div>
        </div>
    </form>
</div>
