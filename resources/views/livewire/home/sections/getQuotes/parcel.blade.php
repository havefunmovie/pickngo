<div>
    <div>
        @if(isset($upsErrors))
            <div class="alert alert-warning">{{ $upsErrors }}</div>
        @endif
        @if(isset($recommends))
            <div class="card mt-1">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row d-flex flex-column">
                                <div class="col-md-12 d-flex text-danger fw-bold">
                                    <div class="col-md-3">{{__('SERVICE')}}</div>
                                    <div class="col-md-3">{{__('TRANSIT TIME')}}</div>
                                    <div class="col-md-3">{{__('PRICE')}}</div>
                                </div>
                                @foreach($recommends as $key => $recommend)
                                    <div class="col-md-12 d-flex mt-2">
                                        <div class="col-md-3 fw-light">{{ $recommend->Service->getName() }}</div>
                                        <div class="col-md-3 fw-light">{{ is_string($recommend->ScheduledDeliveryTime) ? $recommend->ScheduledDeliveryTime : '-' }}</div>
                                        <div class="col-md-3"><b> ${{ $recommend->TotalCharges->MonetaryValue}}</b></div>                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column justify-content-center">
                            <button class="btn btn-outline-primary" wire:click="BackParcel">{{__('Re-Quote')}}</button>
                            {{-- @if(auth()->check())
                                <a wire:click="continueParcel" href="{{ route('home.services.parcel') }}" class="btn btn-danger mt-2">{{__('Continue')}}</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-danger mt-2">{{__('Login / Register')}}</a>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <form class="row" wire:submit.prevent="parcelQuote">
                <div class="col-md-4 mt-3 mb-1 mb-md-0 order-1">
                    <label  class="form-label fw-light mt-1 fs-7">{{ __('Shipping From') }}</label>
                    <select class="form-select form-control w-100 {{ $errors->has('parcel.fromCountry') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.fromCountry',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.fromCountry" aria-label="Default select example"  >
                        <option value="">{{ __('Select Country') }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 d-flex align-items-end order-2">
                    <input type="text" class="form-control {{ $errors->has('parcel.fromPostal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.fromPostal',$validated) ? 'is-valid' : '' }} " wire:model.lazy="parcel.fromPostal" placeholder="{{ __('Postal Code') }}">
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 d-flex align-items-end order-3">
                    <input type="text" class="form-control {{ $errors->has('parcel.fromCity') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.fromCity',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.fromCity"  placeholder="{{ __('From City') }}">
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 mt-3 order-4 order-md-4">
                    <label for="exampleFormControlInput1" class="form-label fw-light mt-1 fs-7">{{ __('Shipping To') }}</label>
                    <select class="form-select form-control w-100 {{ $errors->has('parcel.toCountry') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.toCountry',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.toCountry" aria-label="Default select example">
                        <option value="">{{ __('Select Country') }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 d-flex align-items-end order-5 order-md-5">
                    <input type="text" class="form-control {{ $errors->has('parcel.toPostal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.toPostal',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.toPostal" placeholder="{{ __('Postal Code') }}">
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 d-flex align-items-end order-6 order-md-6">
                    <input type="text" class="form-control {{ $errors->has('parcel.toCity') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.toCity',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.toCity"  placeholder="{{ __('To City') }}">
                </div>
                <div class="col-md-8 mt-4 mb-1 mb-md-0 order-7 order-md-7">
                    <label  class="form-label fw-light mt-1 fs-7">{{ __('DIMS (LxWxH INCHES)') }}</label>
                    <div class="row">
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('parcel.length') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.length',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.length" value="1">
                        </div>
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('parcel.width') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.width',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.width" value="1">
                        </div>
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('parcel.height') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.height',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.height" value="1">
                        </div>
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input placeholder="weight (LB)" type="text" value="1" class="form-control {{ $errors->has('parcel.weight') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.weight',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.weight">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 mb-1 order-8">
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-end mt-2 ">
                            <button wire:loading.remove wire:target="parcelQuote" class="btn btn-primary w-100 " type="submit">{{ __('Get Quote') }}</button>
                            <div wire:loading wire:target="parcelQuote">
                                <div class="btn btn-primary w-100">
                                    <span>{{ __('Loading...') }}</span>
                                    <span class="spinner-grow spinner-grow-sm ms-1" role="status" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
