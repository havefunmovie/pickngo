<div>
    <x-slot name="title">
        create driver
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Create Driver</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Drivers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Driver</li>
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
                                <h4 class="">Driver Info</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form wire:submit.prevent="create" class="needs-validation bt-switch">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name :</label>
                                            <input type="text" wire:model.lazy="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('name',$validated) ? 'is-valid' : '' }}" id="name">
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="family">Family :</label>
                                            <input type="text" wire:model.lazy="family" class="form-control {{ $errors->has('family') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('family',$validated) ? 'is-valid' : '' }}" id="family">
                                            @error('family') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input type="text" wire:model.lazy="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('email',$validated) ? 'is-valid' : '' }}" id="email">
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Mobile :</label>
                                            <input type="text" wire:model.lazy="mobile" class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('mobile',$validated) ? 'is-valid' : '' }}" id="mobile">
                                            @error('mobile') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password :</label>
                                            <input type="password" wire:model.lazy="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('password',$validated) ? 'is-valid' : '' }}" id="password">
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mobile">Confirm Password :</label>
                                            <input type="password" wire:model.lazy="password_confirmation" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('password_confirmation',$validated) ? 'is-valid' : '' }}" id="password_confirmation">
                                            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address :</label>
                                            <input type="text" wire:model.lazy="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address',$validated) ? 'is-valid' : '' }}" id="address">
                                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="postal">Postal :</label>
                                            <input type="text" wire:model.lazy="postal" class="form-control {{ $errors->has('postal') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('postal',$validated) ? 'is-valid' : '' }}" id="postal">
                                            @error('postal') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city">City :</label>
                                            <input type="text" wire:model.lazy="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('city',$validated) ? 'is-valid' : '' }}" id="city">
                                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="province">Province :</label>
                                            <input type="text" wire:model.lazy="province" class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('province',$validated) ? 'is-valid' : '' }}" id="province">
                                            @error('province') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="status">Status :</label>
                                            <select wire:model.lazy="status" class="custom-select form-control {{ $errors->has('status') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('status',$validated) ? 'is-valid' : '' }}" id="status">
                                                <option value="" hidden>{{ __('') }}</option>
                                                <option value="1">{{ __('Active') }}</option>
                                                <option value="0">{{ __('Inactive') }}</option>
                                            </select>
                                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info float-right">{{ __('Create') }}</button>
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
