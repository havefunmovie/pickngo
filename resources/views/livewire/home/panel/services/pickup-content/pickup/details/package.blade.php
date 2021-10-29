<div>
    <form wire:submit.prevent="savePackage">
        <div class="accordion-body px-0 row">
            <div class="col-md-12 mb-3">
                <div class="row">
                    <label for="company" class="form-label fw-light fs-7 mb-1">{{__('Weight')}}</label>
                    <div class="col-md-9 mb-1 mb-md-0">
                        <input type="text" wire:model.lazy="package.weight" value="@if(@isset($package['package'])) {{$package['weight']}} @else {{''}} @endif" class="form-control fw-lighter fs-8 {{ $errors->has('package.weight') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('package.weight',$validated) ? 'is-valid' : '' }}" id="package" placeholder="{{__('Package Weight')}}">
                        @error('package.weight') <span class="error">{{ substr($message,12) }}</span> @enderror
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input type="text" value="LBS" class="form-control fw-lighter fs-8" wire:model.lazy="package.weight-type" id="type" disabled placeholder="{{__('LBS')}}">
                        @error('package.weight-type') <span class="error">{{ substr($message,12) }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label fw-light mb-0 mt-1 fs-7">{{ __('DIMS (LxWxH inches)') }}</label>
                <div class="row">
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input type="text" value="@isset($package['package']) {{$package['length']}} @endisset" class="form-control fw-lighter fs-8 {{ $errors->has('package.length') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.length',$validated) ? 'is-valid' : '' }}" wire:model.lazy="package.length" id="length" value="1" placeholder="{{__('Length')}}">
                        @error('package.length') <span class="error">{{ substr($message,12) }}</span> @enderror
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input type="text" value="@isset($package['package']) {{$package['width']}} @endisset" class="form-control fw-lighter fs-8 {{ $errors->has('package.width') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.width',$validated) ? 'is-valid' : '' }}" wire:model.lazy="package.width" id="width" value="1" placeholder="{{__('Width')}}">
                        @error('package.width') <span class="error">{{ substr($message,12) }}</span> @enderror
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input type="text" value="@isset($package['package']) {{$package['height']}} @endisset" class="form-control fw-lighter fs-8 {{ $errors->has('package.height') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.height',$validated) ? 'is-valid' : '' }}" wire:model.lazy="package.height" id="height" value="1" placeholder="{{__('Height')}}">
                        @error('package.height') <span class="error">{{ substr($message,12) }}</span> @enderror
                    </div>
                    <div class="col-md-3 mb-1 mb-md-0">
                        <input type="text" value="IN" class="form-control fw-lighter fs-8" wire:model.lazy="package.type" id="type" disabled placeholder="{{__('INCH')}}">
                        @error('package.type') <span class="error">{{ substr($message,12) }}</span> @enderror
                    </div>
                </div>
            </div>
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
