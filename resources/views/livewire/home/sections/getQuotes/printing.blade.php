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
                                    <div class="col-md-3 ">{{__('SERVICE')}}</div>
{{--                                    <div class="col-md-3 ">{{__('TIME TO DO')}}</div>--}}
                                    <div class="col-md-3 ">{{__('PRICE')}}</div>
                                </div>
                                @foreach($recommends as $key => $recommend)
                                    <div class="col-md-12 d-flex mt-2">
                                        <div class="col-md-3  fw-light">{{ $recommend['service'] }}</div>
{{--                                        <div class="col-md-3  fw-light">{{ $recommend['time'] }}</div>--}}
                                        <div class="col-md-3"><b> ${{ $recommend['price'] }}</b></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column">
                            <button class="btn btn-outline-primary" wire:click="BackPrinting">{{__('Re-Quote')}}</button>
                            {{-- @if(auth()->check())
                                <a wire:click="continuePrinting" class="btn btn-pink mt-2">{{__('Continue')}}</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-pink mt-2">{{__('Login / Register')}}</a>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <form class="row" wire:submit.prevent="printingQuote">
                <div class="col-md-3 mb-1 mt-5 order-1">
                    <select class="form-select form-control w-100 {{ $errors->has('printing.paper') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('printing.paper',$validated) ? 'is-valid' : '' }}" wire:model.lazy="printing.paper" aria-label="Default select example"  >
                        <option value="">{{ __('Select Paper Type') }}</option>
                        @foreach($services as $service)
                            <option value="{{ $service['paper_type'] }}">{{ $service['paper_type'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-1 d-flex align-items-end order-2">
                    <select class="form-select form-control w-100 {{ $errors->has('printing.color') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('printing.color',$validated) ? 'is-valid' : '' }}" wire:model.lazy="printing.color" aria-label="Default select example"  >
                        <option value="">{{ __('Select Color Type') }}</option>
                        <option value="colorful">{{ __('Colorful') }}</option>
                        <option value="grey">{{ __('Grey') }}</option>
                    </select>
                </div>
                <div class="col-md-3 mb-1 d-flex align-items-end order-3">
                    <input type="text" class="form-control {{ $errors->has('printing.count') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('printing.count',$validated) ? 'is-valid' : '' }}" wire:model.lazy="printing.count"  placeholder="{{ __('Paper Count') }}">
                </div>
                <div class="col-md-3 mb-1 order-8 d-flex align-items-end">
                    <button wire:loading.remove wire:target="printingQuote" class="btn btn-primary w-100" type="submit">{{ __('Get Quote') }}</button>
                    <div wire:loading wire:target="printingQuote">
                        <div class="btn btn-primary btn-block w-100 rounded-pill">
                            <span>{{ __('Loading...') }}</span>
                            <span class="spinner-grow spinner-grow-sm ms-1" role="status" aria-hidden="true"></span>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
