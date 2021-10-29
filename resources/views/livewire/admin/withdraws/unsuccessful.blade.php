<div>
    <form wire:submit.prevent="edit" class="needs-validation">
        <div class="">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="message">Message :</label>
                        <textarea wire:model.lazy="info.message" class="form-control {{ $errors->has('info.message') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.message',$validated) ? 'is-valid' : '' }}" id="message"></textarea>
                        @error('info.message') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <button type="submit" id="shipping-next" class="btn btn-info w-100">{{ __('Submit') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
