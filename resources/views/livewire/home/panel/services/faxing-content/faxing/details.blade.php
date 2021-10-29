<div>
    <form wire:submit.prevent="save" class="mt-3">
        <div class="row">
            <div class="col-md-6 mb-0">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Phone Number') }}</label>
                <input type="text" wire:model.lazy="faxing.number" class="form-control fw-lighter fs-8 {{ $errors->has('faxing.number') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('faxing.number',$validated) ? 'is-valid' : '' }}" id="number" placeholder="{{ __('Phone Number') }}">
                @error('faxing.number') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-0">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Paper Count') }}</label>
                <input type="text" wire:model.lazy="faxing.count" class="form-control fw-lighter fs-8 {{ $errors->has('faxing.count') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('faxing.count',$validated) ? 'is-valid' : '' }}" id="count" placeholder="{{ __('Paper Count') }}" aria-label="Default select example">
                @error('faxing.count') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-0">
                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Agent') }}</label>
                <select wire:model.lazy="faxing.agent" class="form-control fw-lighter fs-8 {{ $errors->has('faxing.agent') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('faxing.agent',$validated) ? 'is-valid' : '' }}" id="agent" aria-label="Default select example"  >
                    <option value="">{{ __('Select Agent') }}</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                    @endforeach
                </select>
                @error('faxing.agent') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-pink w-100 mt-3">Next</button>
    </form>
</div>