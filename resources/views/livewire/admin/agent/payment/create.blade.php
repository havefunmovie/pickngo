<div>
    <x-slot name="title">
        New Method
    </x-slot>
    <x-slot name="styles">
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Payment Methods</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Payment Methods</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create a Methods</li>
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
                        <h4 class="">New Method</h4>
                        <form wire:submit.prevent="add" class="needs-validation bt-switch">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tracking-">Address Line1 :</label>
                                        <input type="text" wire:model.lazy="payment.address1" class="form-control {{ $errors->has('payment.address1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.address1',$validated) ? 'is-valid' : '' }}" id="address1">
                                        @error('payment.address1') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tracking-">Name on Card :</label>
                                        <input type="text" wire:model.lazy="payment.card-name" class="form-control {{ $errors->has('payment.card-name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.card-name',$validated) ? 'is-valid' : '' }}" id="card-name">
                                        @error('payment.card-name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tracking-">Address Line 2 :</label>
                                        <input type="text" wire:model.lazy="payment.address2" class="form-control {{ $errors->has('payment.address2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.address2',$validated) ? 'is-valid' : '' }}" id="address2">
                                        @error('payment.address2') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tracking-">Credit Card # :</label>
                                        <input type="text" wire:model.lazy="payment.credit-card" class="form-control {{ $errors->has('payment.credit-card') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.credit-card',$validated) ? 'is-valid' : '' }}" id="credit-card">
                                        @error('payment.credit-card') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country :</label>
                                        <select wire:model.lazy="payment.country" class="custom-select form-control {{ $errors->has('payment.country') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.country',$validated) ? 'is-valid' : '' }}" id="country">
                                            <option value="">{{ __('') }}</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->code }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('payment.country') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tracking-">Expiry Month :</label>
                                        <input type="text" wire:model.lazy="payment.exp-month" class="form-control {{ $errors->has('payment.exp-month') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.exp-month',$validated) ? 'is-valid' : '' }}" id="exp-month">
                                        @error('payment.exp-month') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tracking-">Expired Year :</label>
                                        <input type="text" wire:model.lazy="payment.exp-year" class="form-control {{ $errors->has('payment.exp-year') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.exp-year',$validated) ? 'is-valid' : '' }}" id="exp-year">
                                        @error('payment.exp-year') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tracking-">Zip / Postal code :</label>
                                        <input type="text" wire:model.lazy="payment.postal" class="form-control {{ $errors->has('payment.postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.postal',$validated) ? 'is-valid' : '' }}" id="postal">
                                        @error('payment.postal') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tracking-">CVD Code :</label>
                                        <input type="text" wire:model.lazy="payment.cvd" class="form-control {{ $errors->has('payment.cvd') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.cvd',$validated) ? 'is-valid' : '' }}" id="cvd">
                                        @error('payment.cvd') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tracking-">City :</label>
                                        <input type="text" wire:model.lazy="payment.city" class="form-control {{ $errors->has('payment.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.city',$validated) ? 'is-valid' : '' }}" id="city">
                                        @error('payment.city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tracking-">Province / State :</label>
                                        <input type="text" wire:model.lazy="payment.province" class="form-control {{ $errors->has('payment.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.province',$validated) ? 'is-valid' : '' }}" id="province">
                                        @error('payment.province') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="default">Default :</label>
                                        <select wire:model.lazy="payment.default" class="custom-select form-control {{ $errors->has('payment.default') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('payment.default',$validated) ? 'is-valid' : '' }}" id="default">
                                            <option value="" hidden>{{ __('') }}</option>
                                            <option value="1">{{ __('Set Default') }}</option>
                                            <option value="0">{{ __('Dont set Default') }}</option>
                                        </select>
                                        @error('payment.default') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-info float-right">{{ __('Add New Method') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
