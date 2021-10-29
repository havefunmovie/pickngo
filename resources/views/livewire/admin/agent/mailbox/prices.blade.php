<div>
    <x-slot name="title">
        prices
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Mailboxes</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Mailboxes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add/Edit Prices</li>
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
                        <h4 class="page-title">Add/Edit Prices</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer_2">Customer 2 Price :</label>
                                    <input type="text" wire:model.lazy="prices.customer_2" class="form-control {{ $errors->has('prices.customer_2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('prices.customer_2',$validated) ? 'is-valid' : '' }}" id="customer_2">
                                    @error('prices.customer_2') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer_3">Customer 3 Price :</label>
                                    <input type="text" wire:model.lazy="prices.customer_3" class="form-control {{ $errors->has('prices.customer_3') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('prices.customer_3',$validated) ? 'is-valid' : '' }}" id="customer_3">
                                    @error('prices.customer_3') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="personal_mode">Personal Price :</label>
                                    <input type="personal_mode" wire:model.lazy="prices.personal_mode" class="form-control {{ $errors->has('prices.personal_mode') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('prices.personal_mode',$validated) ? 'is-valid' : '' }}" id="personal_mode">
                                    @error('prices.personal_mode') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="personal_plus_mode">Personal Plus Price :</label>
                                    <input type="text" wire:model.lazy="prices.personal_plus_mode" class="form-control {{ $errors->has('prices.personal_plus_mode') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('prices.personal_plus_mode',$validated) ? 'is-valid' : '' }}" id="password">
                                    @error('prices.personal_plus_mode') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_mode">Business Price :</label>
                                    <input type="text" wire:model.lazy="prices.business_mode" class="form-control {{ $errors->has('prices.business_mode') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('prices.business_mode',$validated) ? 'is-valid' : '' }}" id="business_mode">
                                    @error('prices.business_mode') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="corporate_mode">Corporate Price :</label>
                                    <input type="text" wire:model.lazy="prices.corporate_mode" class="form-control {{ $errors->has('prices.corporate_mode') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('prices.corporate_mode',$validated) ? 'is-valid' : '' }}" id="corporate_mode">
                                    @error('prices.corporate_mode') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rental_fee">Rental Fee :</label>
                                    <input type="text" wire:model.lazy="prices.rental_fee" class="form-control {{ $errors->has('prices.rental_fee') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('prices.rental_fee',$validated) ? 'is-valid' : '' }}" id="rental_fee">
                                    @error('prices.rental_fee') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="refundable_deposit">Refundable Deposit :</label>
                                    <input type="text" wire:model.lazy="prices.refundable_deposit" class="form-control {{ $errors->has('prices.refundable_deposit') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('prices.refundable_deposit',$validated) ? 'is-valid' : '' }}" id="refundable_deposit">
                                    @error('prices.refundable_deposit') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button wire:loading.remove wire:click="edit" type="button" class="btn btn-default waves-effect mt-3 w-100">Edit</button>
                        <button wire:loading class="btn btn-default waves-effect mt-3 w-100" type="button" disabled>
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
