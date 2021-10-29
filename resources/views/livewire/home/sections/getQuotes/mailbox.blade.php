<div>
    @if(isset($recommends))
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row d-flex flex-column">
                            <div class="col-md-12 d-flex text-danger fw-bold">
                                <div class="col-md-3">{{__('SERVICE')}}</div>
                                <div class="col-md-3">{{__('PRICE')}}</div>
                            </div>
                            @foreach($recommends as $key => $recommend)
                                <div class="col-md-12 d-flex mt-2">
                                    <div class="col-md-3 fw-light">{{ $recommend['service'] }}</div>
                                    <div class="col-md-3"> <b>${{ $recommend['price'] }}</b></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <button class="btn btn-outline-primary" wire:click="backMailbox">{{__('Re-Quote')}}</button>
                        {{-- @if(auth()->check())
                            <a wire:click="continueMailbox" href="{{ route('home.services.faxing') }}" class="btn btn-pink mt-2">{{__('Continue')}}</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-pink mt-2">{{__('Login / Register')}}</a>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    @else
        <form class="row needs-validation" wire:submit.prevent="mailboxQuote">
            <div class="col-md-3 mb-1 mt-5 order-md-0 order-0">
                <select class="form-select form-control w-100 {{ $errors->has('mailbox.agent') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('mailbox.agent',$validated) ? 'is-valid' : '' }}" wire:model.lazy="mailbox.agent" aria-label="Default select example"  >
                    <option value="">{{ __('Select Agent') }}</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-1 d-flex align-items-end order-md-1 order-1">
                <select wire:model.lazy="mailbox.mailbox_type_id" class="form-select form-control w-100 {{ $errors->has('reg_form.mailbox_type_id') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('reg_form.mailbox_type_id',$validated) ? 'is-valid' : '' }}" id="mailbox_type_id" aria-label="Default select example"  >
                    <option value="" selected>{{ __('Select Mailbox Type') }}</option>
                    @if ($box_types)
                        @foreach($box_types as $type)
                            <option value="{{ $type->id }}">{{ ucwords($type->box_type . ' - ' . $type->expired_time . ' - ' . $type->expired_type) }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-3 mb-1 d-flex align-items-end order-md-3 order-3">
                <select class="form-select form-control w-100 {{ $errors->has('mailbox.usage_type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('mailbox.usage_type',$validated) ? 'is-valid' : '' }}" wire:model.lazy="mailbox.usage_type" aria-label="Default select example"  >
                    <option value="">{{ __('Select Usage Type') }}</option>
                    <option value="personal_mode">{{ __('Personal') }}</option>
                    <option value="personal_plus_mode">{{ __('Personal Plus') }}</option>
                    <option value="business_mode">{{ __('Business') }}</option>
                    <option value="corporation_mode">{{ __('Corporation') }}</option>
                </select>
            </div>
            <div class="col-md-3 mb-1 d-flex order-md-9 order-9 align-items-end mt-3 text-center">
                <button wire:loading.remove wire:target="mailboxQuote" class="btn btn-primary w-100" type="submit">{{ __('Get Quote') }}</button>
                <div wire:loading wire:target="mailboxQuote">
                    <div class="btn btn-primary w-100">
                        <span>{{ __('Loading...') }}</span>
                        <span class="spinner-grow spinner-grow-sm ms-1" role="status" aria-hidden="true"></span>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
