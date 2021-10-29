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
                                <div class="col-md-12 d-flex text-danger fw-bold">
                                    <div class="col-md-3">{{__('SERVICE')}}</div>
{{--                                    <div class="col-md-3">{{__('TIME TO DO')}}</div>--}}
                                    <div class="col-md-3">{{__('PRICE')}}</div>
                                </div>
                                @foreach($recommends as $key => $recommend)
                                    <div class="col-md-12 d-flex mt-2">
                                        <div class="col-md-3 fw-light">{{ $recommend['service'] }}</div>
{{--                                        <div class="col-md-3 fw-light">{{ $recommend['time'] }}</div>--}}
                                        <div class="col-md-3"><b> ${{ $recommend['price'] }} </b></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column">
                            <button class="btn btn-outline-primary" wire:click="BackFaxing">{{__('Re-Quote')}}</button>
                            {{-- @if(auth()->check())
                                <a wire:click="continueFaxing" href="{{ route('home.services.faxing') }}" class="btn btn-pink mt-2">{{__('Continue')}}</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-pink mt-2">{{__('Login / Register')}}</a>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <form class="row" wire:submit.prevent="faxingQuote">
                <div class="col-md-3 mb-1 mt-5 order-1 order-3">
                    <select class="form-select form-control w-100 {{ $errors->has('faxing.agent') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('faxing.agent',$validated) ? 'is-valid' : '' }}" wire:model.lazy="faxing.agent" aria-label="Default select example"  >
                        <option value="">{{ __('Select Agent') }}</option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-1 d-flex align-items-end order-3">
                    <input type="text" class="form-control {{ $errors->has('faxing.count') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('faxing.count',$validated) ? 'is-valid' : '' }}" wire:model.lazy="faxing.count"  placeholder="{{ __('Paper Count') }}">
                </div>
                <div class="col-md-3 mb-1 d-flex align-items-end order-3">
                    <input type="text" class="form-control {{ $errors->has('faxing.number') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('faxing.number',$validated) ? 'is-valid' : '' }}" wire:model.lazy="faxing.number"  placeholder="{{ __('Phone Number') }}">
                </div>
                <div class="col-md-3 mb-1 order-8 d-flex align-items-end">
                    <button wire:loading.remove wire:target="faxingQuote" class="btn btn-primary w-100" type="submit">{{ __('Get Quote') }}</button>
                    <div wire:loading wire:target="faxingQuote">
                        <div class="btn btn-primary w-100">
                            <span>{{ __('Loading...') }}</span>
                            <span class="spinner-grow spinner-grow-sm ms-1" role="status" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
