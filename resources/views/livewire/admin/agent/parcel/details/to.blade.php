<div>
    <form class="needs-validation">
        <div class="">
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to-company">Person / Company :</label>
                        <input type="text" wire:model.lazy="to.to-company" class="form-control {{ $errors->has('to.to-company') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-company',$validated) ? 'is-valid' : '' }}" id="to-company">
                        @error('to.to-company') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to-attention">Attention <span class="text-warning"> ( optional ) </span>:</label>
                        <input type="text" wire:model.lazy="to.to-attention" class="form-control {{ $errors->has('to.to-attention') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-attention',$validated) ? 'is-valid' : '' }}" id="to-attention">
                        @error('to.to-attention') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to-phone">Phone :</label>
                        <input type="text" wire:model.lazy="to.to-phone" class="form-control {{ $errors->has('to.to-phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-phone',$validated) ? 'is-valid' : '' }}" id="to-phone">
                        @error('to.to-phone') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to-email">Email :</label>
                        <input type="text" wire:model.lazy="to.to-email" class="form-control {{ $errors->has('to.to-email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-email',$validated) ? 'is-valid' : '' }}" id="to-email">
                        @error('to.to-email') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName1">Address Line 1 :</label>
                        <input type="text" wire:model.lazy="to.to-address1" class="form-control {{ $errors->has('to.to-address1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-address1',$validated) ? 'is-valid' : '' }}" id="to-address1">
                        @error('to.to-address1') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="to-address2">Address Line 2 <span class="text-warning">( optional )</span> :</label>
                        <input type="text" wire:model.lazy="to.to-address2" class="form-control {{ $errors->has('to.to-address2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-address2',$validated) ? 'is-valid' : '' }}" id="to-address2">
                        @error('to.to-address2') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="to-instruction">Instruction <span class="text-warning">( optional ) </span>:</label>
                        <input type="text" wire:model.lazy="to.to-instruction" class="form-control {{ $errors->has('to.to-instruction') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-instruction',$validated) ? 'is-valid' : '' }}" id="to-instruction">
                        @error('to.to-instruction') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to-country">Country :</label>
                        <select wire:change="SelectedCountry($event.target.value)" class="custom-select form-control {{ $errors->has('to.to-country') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-country',$validated) ? 'is-valid' : '' }}" id="to-country">
                            <option value="">{{ __('select country') }}</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id.'-'.$country->code }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('to.to-country') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to-province">Province / State :</label>
                        <select  wire:model.lazy="to.to-province" class="custom-select form-control {{ $errors->has('to.to-province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-province',$validated) ? 'is-valid' : '' }} {{ $validated && array_key_exists('to.to-province',$validated) ? 'is-valid' : '' }}" id="to-province">
                            <option value="">{{ __('select Province / State') }}</option>
                            @if ($provinces)
                                {{-- Post API's need Canada and US state as a abbreviation --}}
                                @if ($to['to-country'] == 'CA')
                                    @foreach ($Canada_states as $state => $value)
                                        <option value={{ $state }}>{{ $value}}</option>
                                    @endforeach
                                @elseif ($to['to-country'] == 'US')
                                    @foreach ($US_states as $state => $value)
                                        <option value={{ $state }}>{{ $value }}</option>
                                    @endforeach
                                @else
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->name }}">{{ $province->name}}</option>
                                    @endforeach
                                @endif  
                            @endif  
                        </select>
                        @error('to.to-province') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to-city">City :</label>
                        <input type="text" wire:model.lazy="to.to-city" class="form-control {{ $errors->has('to.to-city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-city',$validated) ? 'is-valid' : '' }}" id="to-city">
                        @error('to.to-city') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="to-postal">Zip / Postal Code :</label>
                        <input type="text" wire:model.lazy="to.to-postal" class="form-control {{ $errors->has('to.to-postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('to.to-postal',$validated) ? 'is-valid' : '' }}" id="to-postal">
                        @error('to.to-postal') <span class="text-danger">{{ substr($message,10) }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                @if (!isset($to['is-ab']))
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" wire:model.lazy="to.addressBook"  class="custom-control-input" value="true" id="addressBook">
                                <label class="custom-control-label" for="addressBook">Save to address book</label>
                            </div>
                        </div>
                    </div>
                @endif
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
