<div>
    <x-slot name="select2_styles">
        <link href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    </x-slot>
        <h4 style="margin-right: 15px;">Details</h4>
        <div class="">
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="from-company">User Email :</label>
                        <input type="text" wire:model.lazy="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('email',$validated) ? 'is-valid' : '' }}" id="from-email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="from-company">Phone :</label>
                        <input type="text" wire:model.lazy="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('phone',$validated) ? 'is-valid' : '' }}" id="from-phone">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName1">Paper Count :</label>
                        <input type="text" wire:model.lazy="paper_count" class="form-control {{ $errors->has('paper_count') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('paper_count',$validated) ? 'is-valid' : '' }}" id="from-paper_count">
                        @error('paper_count') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mt-md-2">
                    <div class="form-group">
                        <h6>Agent name: {{ $agent[0]->name .' '. $agent[0]->family }}</h6>
                    </div>
                </div>
            </div>

            <div class="row m-3">
                <div class="col-md-12">
                    <button wire:click="getQuote" class="btn btn-info w-100">{{ __('Get Quote') }}</button>
                </div>
            </div>
        </div>
</div>
