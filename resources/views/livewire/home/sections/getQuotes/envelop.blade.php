<div>
    <div>
        @if(isset($upsErrors))
            <div class="alert alert-warning">{{ $upsErrors }}</div>
        @endif
        @if(isset($recommends))
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row d-flex flex-column">
                                <div class="col-md-12 d-flex text-danget fw-bold">
                                    <div class="col-md-3r">{{__('SERVICE')}}</div>
                                    <div class="col-md-3r">{{__('TRANSIT TIME')}}</div>
                                    <div class="col-md-3r">{{__('PRICE')}}</div>
                                </div>
                                @foreach($recommends as $key => $recommend)
                                    <div class="col-md-12 d-flex mt-2">
                                        <div class="col-md-3r fw-light">{{ $recommend->Service->getName() }}</div>
                                        <div class="col-md-3r fw-light">{{ is_string($recommend->ScheduledDeliveryTime) ? $recommend->ScheduledDeliveryTime : 'Unknown' }}</div>
                                        <div class="col-md-3r"><b> ${{ $recommend->TotalCharges->MonetaryValue * ((100 - $percentage['service_percentage']) / 100) }}</b></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column">
                            <button class="btn btn-outline-primary" wire:click="Backenvelop">{{__('Re-Quote')}}</button>
                            {{-- @if(auth()->check())
                                <a wire:click="continueEnvelop" href="{{ route('home.services.envelop') }}" class="btn btn-pink mt-2">{{__('Continue')}}</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-pink mt-2">{{__('Login / Register')}}</a>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <form class="row" wire:submit.prevent="envelopQuote">
                <div class="col-md-4 mt-3 mb-1 mb-md-0 order-1">
                    <label  class="form-label fw-light mt-1 fs-7">{{ __('Shipping From') }}</label>
                    <select class="form-select form-control w-100 {{ $errors->has('envelop.fromCountry') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.fromCountry',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.fromCountry" aria-label="Default select example"  >
                        <option value="">{{ __('Select Country') }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 d-flex align-items-end order-2">
                    <input type="text" class="form-control {{ $errors->has('envelop.fromPostal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.fromPostal',$validated) ? 'is-valid' : '' }} " wire:model.lazy="envelop.fromPostal" placeholder="{{ __('Postal Code') }}">
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 d-flex align-items-end order-3">
                    <input type="text" class="form-control {{ $errors->has('envelop.fromCity') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.fromCity',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.fromCity"  placeholder="{{ __('From City') }}">
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 mt-3 order-4 order-md-4">
                    <label for="exampleFormControlInput1" class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Shipping To') }}</label>
                    <select class="form-select form-control w-100 {{ $errors->has('envelop.toCountry') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.toCountry',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.toCountry" aria-label="Default select example">
                        <option value="">{{ __('Select Country') }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 d-flex align-items-end order-5 order-md-5">
                    <input type="text" class="form-control {{ $errors->has('envelop.toPostal') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.toPostal',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.toPostal" placeholder="{{ __('Postal Code') }}">
                </div>
                <div class="col-md-4 mt-3 mb-1 mb-md-0 d-flex align-items-end order-6 order-md-6">
                    <input type="text" class="form-control {{ $errors->has('envelop.toCity') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.toCity',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.toCity"  placeholder="{{ __('To City') }}">
                </div>
                <div class="col-md-8 mt-4 mb-1 mb-md-0 order-7 order-md-7">
                    <label  class="form-label fw-light mt-1 fs-7">{{ __('DIMS (LxWxH INCHES)') }}</label>
                    <div class="row">
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('envelop.length') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.length',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.length" value="1">
                        </div>
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('envelop.width') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.width',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.width" value="1">
                        </div>
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input type="text" class="form-control {{ $errors->has('envelop.height') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.height',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.height" value="1">
                        </div>
                        <div class="col-md-3 mb-1 mb-md-0">
                            <input type="text" placeholder="weight (LB)" value="1" class="form-control {{ $errors->has('envelop.weight') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('envelop.weight',$validated) ? 'is-valid' : '' }}" wire:model.lazy="envelop.weight">
                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-4 mt-5 mb-1 order-8">
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-end mt-2 ">
                            <button wire:loading.remove wire:target="envelopQuote" class="btn btn-primary w-100" type="submit">{{ __('Get Quote') }}</button>
                            <div wire:loading wire:target="envelopQuote">
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
