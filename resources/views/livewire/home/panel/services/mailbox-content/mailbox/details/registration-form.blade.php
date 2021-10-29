<div>
    <form wire:submit.prevent="next" class="needs-validation">
        <div class="accordion-body px-0 row">
            <div class="col-md-6 mb-3">
                <label for="customer_1" class="form-label required fw-light fs-7 mb-1">{{__('Full Name')}}</label>
                <input type="text" wire:model.lazy="reg_form.customer_1" class="form-control {{ $errors->has('reg_form.customer_1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('reg_form.customer_1',$validated) ? 'is-valid' : '' }}   fw-lighter fs-8" id="customer_1" placeholder="{{__('Full Name')}}">
                @error('reg_form.customer_1') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="customer_2" class="form-label fw-light fs-7 mb-1">{{__('Additional Full Name')}}</label>
                <input type="text" wire:model.lazy="reg_form.customer_2" class="form-control {{ $errors->has('reg_form.customer_2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('reg_form.customer_2',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="customer_2" placeholder="{{__('Additional Full Name')}}">
                @error('reg_form.customer_2') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="customer_3" class="form-label fw-light fs-7 mb-1">{{__('Additional Full Name')}}</label>
                <input type="text" wire:model.lazy="reg_form.customer_3" class="form-control {{ $errors->has('reg_form.customer_3') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('reg_form.customer_3',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="customer_3" placeholder="{{__('Additional Full Name')}}">
                @error('reg_form.customer_3') <span class="error">{{ $message }}</span> @enderror
            </div>
{{--            <div class="col-md-6 mb-3">--}}
{{--                <label for="renewal_date" class="form-label required fw-light fs-7 mb-1">{{__('Renewal Date')}}</label>--}}
{{--                <input type="date" wire:model.lazy="reg_form.renewal_date" class="form-control {{ $errors->has('reg_form.renewal_date') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('reg_form.renewal_date',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="renewal_date" placeholder="{{__('Renewal Date')}}">--}}
{{--                @error('reg_form.renewal_date') <span class="error">{{ $message }}</span> @enderror--}}
{{--            </div>--}}
            <div class="col-md-6 mb-3">
                <label class="form-label required fw-light mb-0 mt-1 fs-7">{{ __('Usage Type') }}</label>
                <select wire:model.lazy="reg_form.mailbox_type" class="form-control fw-lighter fs-8 {{ $errors->has('reg_form.mailbox_type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('reg_form.mailbox_type',$validated) ? 'is-valid' : '' }}" id="mailbox_type" aria-label="Default select example"  >
                    <option value="" selected>{{ __('Select User Box Type') }}</option>
                    <option value="personal">Personal</option>
                    <option value="personal_plus">Personal Plus</option>
                    <option value="business">Business</option>
                    <option value="corporation">Corporation</option>
                </select>
                @error('reg_form.mailbox_type') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label required fw-light mb-0 mt-1 fs-7">{{ __('Agent') }}</label>
                <select wire:model.lazy="reg_form.agent" class="form-control fw-lighter fs-8 {{ $errors->has('reg_form.agent') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('reg_form.agent',$validated) ? 'is-valid' : '' }}" id="agent" aria-label="Default select example"  >
                    <option value="" selected>{{ __('Select Agent') }}</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}">{{ $agent->name . ' - ' . $agent->postal . ' - ' . $agent->city }}</option>
                    @endforeach
                </select>
                @error('reg_form.agent') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label required fw-light mb-0 mt-1 fs-7">{{ __('Mail Box Type & Contract Terms') }}</label>
                <select wire:model.lazy="reg_form.mailbox_type_id" class="form-control fw-lighter fs-8 {{ $errors->has('reg_form.mailbox_type_id') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('reg_form.mailbox_type_id',$validated) ? 'is-valid' : '' }}" id="mailbox_type_id" aria-label="Default select example"  >
                    <option value="" selected>{{ __('Select Mailbox Type') }}</option>
                    @if ($box_types)
                        @foreach($box_types as $type)
                            <option value="{{ $type->id }}">{{ ucwords($type->box_type . ' - ' . $type->expired_time . ' - ' . $type->expired_type) }}</option>
                        @endforeach
                    @endif
                </select>
                @error('reg_form.mailbox_type_id') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label required fw-light mb-0 mt-1 fs-7">{{ __('Upload ID 1') }}</label>
                <input type="file" wire:model="reg_form.photo1" class="form-control fw-lighter fs-8">
                @error('reg_form.photo1') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label  class="form-label required fw-light mb-0 mt-1 fs-7">{{ __('Upload ID 2') }}</label>
                <input type="file" wire:model="reg_form.photo2" class="form-control fw-lighter fs-8">
                @error('reg_form.photo2') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <input wire:model="key" class="form-check-input checkbox" id="key-status" type="checkbox" value="1" checked aria-label="...">
                <label for="key-status">{{ __('I want a Key') }}</label>
            </div>
        </div>
        <button class="btn btn-pink w-100">{{ __('Next') }}</button>
    </form>
</div>
