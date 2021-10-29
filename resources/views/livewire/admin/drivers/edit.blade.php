<div>
    <x-slot name="title">
        edit driver
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">info Methods</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">driver</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit driver</li>
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
                                <h4 class="">driver Info</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form wire:submit.prevent="edit" class="needs-validation bt-switch">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name :</label>
                                            <input type="text" wire:model.lazy="info.name" class="form-control {{ $errors->has('info.name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.name',$validated) ? 'is-valid' : '' }}" id="name">
                                            @error('info.name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="family">Family :</label>
                                            <input type="text" wire:model.lazy="info.family" class="form-control {{ $errors->has('info.family') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.family',$validated) ? 'is-valid' : '' }}" id="family">
                                            @error('info.family') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input type="text" wire:model.lazy="info.email" class="form-control {{ $errors->has('info.email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.email',$validated) ? 'is-valid' : '' }}" id="email">
                                            @error('info.email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Mobile :</label>
                                            <input type="text" wire:model.lazy="info.mobile" class="form-control {{ $errors->has('info.mobile') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.mobile',$validated) ? 'is-valid' : '' }}" id="mobile">
                                            @error('info.mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address :</label>
                                            <input type="text" wire:model.lazy="info.address" class="form-control {{ $errors->has('info.address') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.address',$validated) ? 'is-valid' : '' }}" id="address">
                                            @error('info.address') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="postal">Postal :</label>
                                            <input type="text" wire:model.lazy="info.postal" class="form-control {{ $errors->has('info.postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.postal',$validated) ? 'is-valid' : '' }}" id="postal">
                                            @error('info.postal') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city">City :</label>
                                            <input type="text" wire:model.lazy="info.city" class="form-control {{ $errors->has('info.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.city',$validated) ? 'is-valid' : '' }}" id="city">
                                            @error('info.city') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="province">Province :</label>
                                            <input type="text" wire:model.lazy="info.province" class="form-control {{ $errors->has('info.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.province',$validated) ? 'is-valid' : '' }}" id="province">
                                            @error('info.province') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="status">Status :</label>
                                            <select wire:model.lazy="info.status" class="custom-select form-control {{ $errors->has('info.status') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.status',$validated) ? 'is-valid' : '' }}" id="status">
                                                <option value="" hidden>{{ __('') }}</option>
                                                <option value="1" {{ $info['status'] == '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                                <option value="0" {{ $info['status'] == '0' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                            </select>
                                            @error('info.status') <span class="text-danger">{{ $message }}</span> @enderror
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
