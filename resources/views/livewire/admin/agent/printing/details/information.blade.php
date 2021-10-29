<div>
    <x-slot name="select2_styles">
        <link href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    </x-slot>
        <h4 style="margin-right: 15px;">Details</h4>
        <div class="">
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastName1">User Email :</label>
                        <input type="text" wire:model.lazy="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('email',$validated) ? 'is-valid' : '' }}" id="from-email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                        <label for="from-company">Size :</label>
                        <select wire:model.lazy="paper_type" class="form-select form-control {{ $errors->has('paper_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('paper_type',$validated) ? 'is-valid' : '' }}" aria-label="Default select example">
                            <option>Paper size</option>
                            <option value="A4">A4</option>
                            <option value="A5">A5</option>
                          </select>
                        @error('paper_type') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastName1">Color :</label>
                        <select wire:model.lazy="color_type" class="form-select form-control {{ $errors->has('color_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('color_type',$validated) ? 'is-valid' : '' }}" aria-label="Default select example">
                            <option>Color type</option>
                            <option value="colorful">colorful</option>
                            <option value="grey">black & white</option>
                          </select>
                        @error('color_type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastName1">Paper Count :</label>
                        <input type="text" wire:model.lazy="paper_count" class="form-control {{ $errors->has('paper_count') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('paper_count',$validated) ? 'is-valid' : '' }}" id="from-paper_count">
                        @error('paper_count') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-md-2">
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
