<div>
    <x-slot name="title">
        new address
    </x-slot>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">New Address Book</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">New Address</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create New Address</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="">New Address</h4>
                        <form wire:submit.prevent="create" class="needs-validation">
                            <div class="">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="from-company">Company / Person  :</label>
                                            <input type="text" wire:model.lazy="address.company" class="form-control {{ $errors->has('address.company') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.company',$validated) ? 'is-valid' : '' }}" id="company">
                                            @error('address.company') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastName1">Address Line 1 :</label>
                                            <input type="text" wire:model.lazy="address.address1" class="form-control {{ $errors->has('address.address1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.address1',$validated) ? 'is-valid' : '' }}" id="address1">
                                            @error('address.address1') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address2">Address Line 2 :</label>
                                            <input type="text" wire:model.lazy="address.address2" class="form-control {{ $errors->has('address.address2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.address2',$validated) ? 'is-valid' : '' }}" id="address2">
                                            @error('address.address2') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country :</label>
                                            <select wire:model.lazy="address.country" class="custom-select form-control {{ $errors->has('address.country') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.country',$validated) ? 'is-valid' : '' }}" id="country">
                                                <option value="">{{ __('') }}</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="postal">Zip / Postal Code :</label>
                                            <input type="text" wire:model.lazy="address.postal" class="form-control {{ $errors->has('address.postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.postal',$validated) ? 'is-valid' : '' }}" id="postal">
                                            @error('address.postal') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city">City :</label>
                                            <input type="text" wire:model.lazy="address.city" class="form-control {{ $errors->has('address.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.city',$validated) ? 'is-valid' : '' }}" id="city">
                                            @error('address.city') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="province">Province / State :</label>
                                            <input type="text" wire:model.lazy="address.province" class="form-control {{ $errors->has('address.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.province',$validated) ? 'is-valid' : '' }}" id="province">
                                            @error('address.province') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="attention">Attention :</label>
                                            <input type="text" wire:model.lazy="address.attention" class="form-control {{ $errors->has('address.attention') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.attention',$validated) ? 'is-valid' : '' }}" id="attention">
                                            @error('address.attention') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone :</label>
                                            <input type="text" wire:model.lazy="address.phone" class="form-control {{ $errors->has('address.phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.phone',$validated) ? 'is-valid' : '' }}" id="phone">
                                            @error('address.phone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input type="text" wire:model.lazy="address.email" class="form-control {{ $errors->has('address.email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.email',$validated) ? 'is-valid' : '' }}" id="email">
                                            @error('address.email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instruction">Instruction :</label>
                                            <input type="text" wire:model.lazy="address.instruction" class="form-control {{ $errors->has('address.instruction') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.instruction',$validated) ? 'is-valid' : '' }}" id="instruction">
                                            @error('address.instruction') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Shipping Type :</label>
                                            <select wire:model.lazy="address.type" class="custom-select form-control {{ $errors->has('address.type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.type',$validated) ? 'is-valid' : '' }}" id="country">
                                                <option value="">{{ __('') }}</option>
                                                <option value="from">{{ __('From Shipping') }}</option>
                                                <option value="to">{{ __('To Shipping') }}</option>
                                            </select>
                                            @error('address.type') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="service_type">Service Type :</label>
                                            <select wire:model.lazy="address.service_type" class="custom-select form-control {{ $errors->has('address.service_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.service_type',$validated) ? 'is-valid' : '' }}" id="country">
                                                <option value="">{{ __('') }}</option>
                                                <option value="parcel">{{ __('Parcel') }}</option>
                                                <option value="envelop">{{ __('Envelop') }}</option>
                                            </select>
                                            @error('address.service_type') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <button type="submit" id="shipping-next" class="btn btn-info w-100">{{ __('Next') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
