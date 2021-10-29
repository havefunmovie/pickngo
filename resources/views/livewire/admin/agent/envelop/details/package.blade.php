<div>
    <form class="needs-validation">
        <div class="">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="weight">Weight :</label>
                        <input wire:model.lazy="package.weight" type="text" class="form-control {{ $errors->has('package.weight') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('package.weight',$validated) ? 'is-valid' : '' }}" id="weight">
                        @error('package.weight') <span class="text-danger">{{ substr($message,12) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="weight-type">Type :</label>
                        <select wire:model.lazy="package.weight-type" class="custom-select form-control {{ $errors->has('package.weight-type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('package.weight-type',$validated) ? 'is-valid' : '' }}" id="weight-type">
                            <option value="" hidden>{{ __('Select Type') }}</option>
                            <option value="{{ __('LBS') }}">{{ __('Pounds') }}</option>
                            <option value="{{ __('KGS') }}">{{ __('Kilograms') }}</option>
                        </select>
                        @error('package.weight-type') <span class="text-danger">{{ substr($message,12) }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mb-3">
        <div class="col-md-6">
            <button wire:click="back" class="btn btn-outline-info w-100">{{ __('Back') }}</button>
        </div>
        <div class="col-md-6">
            <button wire:click="next" class="btn btn-info w-100">{{ __('Next') }}</button>
        </div>
    </div>
</div>
