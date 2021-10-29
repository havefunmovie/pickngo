<div>
    <form wire:submit.prevent="save" class="mt-3">
        <div class="row">
            <div class="col-md-6 mb-0">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Email') }}</label>
                <input type="text" wire:model.lazy="scanning.email" class="form-control fw-lighter fs-8 {{ $errors->has('scanning.email') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('scanning.email',$validated) ? 'is-valid' : '' }}" id="email" placeholder="{{ __('Email') }}">
                @error('scanning.email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-0">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Paper Count') }}</label>
                <input type="text" wire:model.lazy="scanning.count" class="form-control fw-lighter fs-8 {{ $errors->has('scanning.count') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('scanning.count',$validated) ? 'is-valid' : '' }}" id="count" placeholder="{{ __('Paper Count') }}" aria-label="Default select example">
                @error('scanning.count') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-0">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Agent') }}</label>
                <select wire:model.lazy="scanning.agent" class="form-control fw-lighter fs-8 {{ $errors->has('scanning.agent') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('scanning.agent',$validated) ? 'is-valid' : '' }}" id="agent" aria-label="Default select example"  >
                    <option value="">{{ __('Select Agent') }}</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                    @endforeach
                </select>
                @error('scanning.agent') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-pink w-100 mt-3">Next</button>
    </form>
</div>