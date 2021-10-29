<div>
    <form wire:submit.prevent="edit" class="needs-validation">
        <div class="">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="trans_code">Transaction Code :</label>
                        <textarea wire:model.lazy="info.trans_code" class="form-control {{ $errors->has('info.trans_code') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.trans_code',$validated) ? 'is-valid' : '' }}" id="trans_code"></textarea>
                        @error('info.trans_code') <span class="text-danger">{{ $trans_code }}</span> @enderror
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
