<div>
    @if($validateError)
        <div class="alert alert-danger">{{ $validateError }}</div>
    @endif
    <form wire:submit.prevent="next" class="needs-validation">
        <div class="">
            <div class="row mt-3">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from-company">Person / Company:</label>
                        <input type="text" wire:model.lazy="from.from-company" class="form-control {{ $errors->has('from.from-company') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-company',$validated) ? 'is-valid' : '' }}" id="from-company">
                        @error('from.from-company') <span class="text-danger">{{ substr(substr($message,14),14) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from-company">Attention <span class="text-warning">( optional )</span> :</label>
                        <input type="text" wire:model="from.from-attention" class="form-control {{ $errors->has('from.from-attention') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-attention',$validated) ? 'is-valid' : '' }}" id="from-attention">
                        @error('from.from-attention') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from-phone">Phone :</label>
                        <input type="text" wire:model.lazy="from.from-phone" class="form-control {{ $errors->has('from.from-phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-phone',$validated) ? 'is-valid' : '' }}" id="from-phone">
                        @error('from.from-phone') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from-email">Email :</label>
                        <input type="text" wire:model.lazy="from.from-email" class="form-control {{ $errors->has('from.from-email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-email',$validated) ? 'is-valid' : '' }}" id="from-email">
                        @error('from.from-email') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lastName1">Address Line 1 :</label>
                        <input type="text" wire:model.lazy="from.from-address1" class="form-control {{ $errors->has('from.from-address1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-address1',$validated) ? 'is-valid' : '' }}" id="from-address1">
                        @error('from.from-address1') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="from-address2">Address Line 2 <span class="text-warning">( optional )</span> :</label>
                        <input type="text" wire:model.lazy="from.from-address2" class="form-control {{ $errors->has('from.from-address2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-address2',$validated) ? 'is-valid' : '' }}" id="from-address2">
                        @error('from.from-address2') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="from-instruction">Instruction <span class="text-warning">( optional )</span> :</label>
                        <input type="text" wire:model.lazy="from.from-instruction" class="form-control {{ $errors->has('from.from-instruction') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-instruction',$validated) ? 'is-valid' : '' }}" id="from-instruction">
                        @error('from.from-instruction') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from-country">Country :</label>
                        <select wire:change="SelectedCountry($event.target.value)"  class="custom-select form-control {{ $errors->has('from.from-country') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-country',$validated) ? 'is-valid' : '' }}" id="from-country">
                            @if($from)
                                    <option value={{ $from['from-country'] }}> {{ $from['from-country'] }}</option>
                            @endif
                            <option value="">{{ __('select country') }}</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id .'-'. $country->code }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('from.from-country') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from-province">Province / State :</label>
                        <select wire:model="from.from-province" class="custom-select form-control {{ $errors->has('from.from-province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-province',$validated) ? 'is-valid' : '' }}" id="from-province">
                            <option value="">{{ __('select Province / State') }}</option>
                            @if ($provinces)
                                {{-- Post API's need Canada and US state as a abbreviation --}}
                                @if ($from['from-country'] == 'CA')
                                    @foreach ($Canada_states as $state => $value)
                                        <option value={{ $state }}>{{ $value}}</option>
                                    @endforeach
                                @elseif ($from['from-country'] == 'US')
                                    @foreach ($US_states as $state => $value)
                                        <option value={{ $state }}>{{ $value }}</option>
                                    @endforeach
                                @else
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->name }}">{{ $province->name}}</option>
                                    @endforeach
                                @endif  
                                @elseif($from)
                                    <option value={{ $from['from-province'] }}> {{ $from['from-province'] }}</option>
                            @endif  
                        </select>
                        @error('from.from-province') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from-city">City :</label>
                        <input type="text" wire:model.lazy="from.from-city" class="form-control {{ $errors->has('from.from-city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-city',$validated) ? 'is-valid' : '' }}" id="from-city">
                        @error('from.from-city') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="from-postal">Zip / Postal Code :</label>
                        <input type="text" wire:model.lazy="from.from-postal" class="form-control {{ $errors->has('from.from-postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('from.from-postal',$validated) ? 'is-valid' : '' }}" id="from-postal">
                        @error('from.from-postal') <span class="text-danger">{{ substr($message,14) }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                
               
                @if (!isset($from['is-ab']))
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" wire:model.lazy="from.addressBook" class="custom-control-input" value="true" id="addressBook">
                            <label class="custom-control-label" for="addressBook">Save to address book</label>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <button type="submit" id="shipping-next" class="btn btn-info w-100">{{ __('Next') }}</button>
                </div>
            </div>
        </div>
    </form>
</div>
