<div>
    <x-slot name="title">
        edit bank info
    </x-slot>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Bank Info</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Bank Info</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Bank Info</li>
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
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Bank Info</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form wire:submit.prevent="edit" class="needs-validation bt-switch">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="back_name">Bank Name :</label>
                                            <input type="text" wire:model.lazy="info.back_name" class="form-control {{ $errors->has('info.back_name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.back_name',$validated) ? 'is-valid' : '' }}" id="back_name">
                                            @error('info.back_name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transaction_number">Transaction Number :</label>
                                            <input type="text" wire:model.lazy="info.transaction_number" class="form-control {{ $errors->has('info.transaction_number') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.transaction_number',$validated) ? 'is-valid' : '' }}" id="transaction_number">
                                            @error('info.transaction_number') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Branch Code :</label>
                                            <input type="text" wire:model.lazy="info.branch_code" class="form-control {{ $errors->has('info.branch_code') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.branch_code',$validated) ? 'is-valid' : '' }}" id="branch_code">
                                            @error('info.branch_code') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="default">Default Status :</label>
                                            <select wire:model.lazy="info.default" class="custom-select form-control {{ $errors->has('info.default') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.default',$validated) ? 'is-valid' : '' }}" id="default">
                                                <option value="" hidden>{{ __('') }}</option>
                                                <option value="1" {{ $info['default'] == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                                <option value="0" {{ $info['default'] == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
                                            </select>
                                            @error('info.default') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info float-right">{{ __('Edit') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
