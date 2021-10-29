<div>
    <div>
        @if(isset($upsErrors))
            <div class="alert alert-warning">{{ $upsErrors }}</div>
        @endif
        @if(isset($recommends))
            <div class="card mt-1">
                <dic class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row d-flex flex-column">
                                <div class="col-md-12 d-flex text-pink fw-bold">
                                    <div class="col-md-4 text-center">{{__('SERVICE')}}</div>
                                    <div class="col-md-4 text-center">{{__('TRANSIT TIME')}}</div>
                                    <div class="col-md-4 text-center">{{__('PRICE')}}</div>
                                    {{--                                    <div class="col-md-3 text-center">{{__('SAVINGS')}}</div>--}}
                                </div>
                                @foreach($recommends as $key => $recommend)
                                    <div class="col-md-12 d-flex mt-2">
                                        <div class="col-md-4 text-center fw-light">{{ $recommend->Service->getName() }}</div>
                                        <div class="col-md-4 text-center fw-light">{{ is_string($recommend->ScheduledDeliveryTime) ? $recommend->ScheduledDeliveryTime : 'Unknown' }}</div>
                                        <div class="col-md-4 text-center fw-bold">${{ $recommend->TotalCharges->MonetaryValue * ((100 - $percentage['service_percentage']) / 100) }}</div>
                                        {{--                                        <div class="col-md-3 text-center fw-bold">{{ $recommend->Service->getCode()  }}</div>--}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 d-flex flex-column justify-content-center">
                            <div class="row">
                                <button class="btn btn-outline-pink mt-2 w-100" wire:click="BackParcel">{{__('Re-Quote')}}</button>
                                @if(auth()->check())
                                    <a wire:click="continueParcel" {{--href="{{ route('home.services.parcel') }}"--}} class="btn btn-pink mt-2 w-100">{{__('Continue')}}</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-pink mt-2 w-100">{{__('Login / Register')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </dic>
            </div>
        @else
            <form class="row" wire:submit.prevent="parcelQuote">
                <div class="col-md-4 mb-1 mb-md-0 order-1">
                    <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Shipping From') }}</label>
                    <select class="form-select w-100 {{ $errors->has('parcel.fromCountry') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.fromCountry',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.fromCountry" aria-label="Default select example"  >
                        <option value="">{{ __('Select Country') }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-1 mb-md-0 d-flex align-items-end order-2">
                    <input type="text" class="form-control {{ $errors->has('parcel.fromPostal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.fromPostal',$validated) ? 'is-valid' : '' }} " wire:model.lazy="parcel.fromPostal" placeholder="{{ __('Postal Code') }}">
                </div>
                <div class="col-md-4 mb-1 mb-md-0 d-flex align-items-end order-3">
                    <input type="text" class="form-control {{ $errors->has('parcel.fromCity') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.fromCity',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.fromCity"  placeholder="{{ __('From City') }}">
                </div>
                <div class="col-md-4 mb-1 mb-md-0 order-4 order-md-5 mt-3">
                    <label for="exampleFormControlInput1" class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Shipping To') }}</label>
                    <select class="form-select w-100 {{ $errors->has('parcel.toCountry') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.toCountry',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.toCountry" aria-label="Default select example">
                        <option value="">{{ __('Select Country') }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-1 mb-md-0 d-flex align-items-end order-5 order-md-6 mt-3">
                    <input type="text" class="form-control {{ $errors->has('parcel.toPostal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.toPostal',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.toPostal" placeholder="{{ __('Postal Code') }}">
                </div>
                <div class="col-md-4 mb-1 mb-md-0 d-flex align-items-end order-6 order-md-7 mt-3">
                    <input type="text" class="form-control {{ $errors->has('parcel.toCity') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.toCity',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.toCity"  placeholder="{{ __('To City') }}">
                </div>
                <div class="col-md-8 mb-1 mb-md-0 order-7 order-md-8 mt-3">
                    <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('DIMS (LxWxH INCHES)') }}</label>
                    <div class="row">
                        <div class="col-md-4 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('parcel.length') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.length',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.length" placeholder="{{ __('Length') }}">
                        </div>
                        <div class="col-md-4 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('parcel.width') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.width',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.width" placeholder="{{ __('Width') }}">
                        </div>
                        <div class="col-md-4 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('parcel.height') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.height',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.height" placeholder="{{ __('Height') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-1 mb-md-0 order-7 order-md-8 mt-3">
                    <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Weight') }}</label>
                    <div class="row">
                        <div class="col-md-12 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('parcel.weight') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('parcel.weight',$validated) ? 'is-valid' : '' }}" wire:model.lazy="parcel.weight" placeholder="{{ __('Weight') }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-1 mb-md-0 order-8 mt-3">
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-end mt-3 mb-3 mb-md-0 mt-md-0">
                            <button wire:loading.remove wire:target="parcelQuote" class="btn btn-pink btn-block w-100" type="submit">{{ __('Get Quote') }}</button>
                            <div wire:loading wire:target="parcelQuote" class="w-100">
                                <div class="btn btn-pink btn-block w-100">
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
