<div>
    <x-slot name="title">
        api key
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">API Settings</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">API Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    {{--    {{ dd($info) }}--}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form wire:submit.prevent="edit" class="needs-validation">
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="key">Access Key:</label>
                                                <input wire:model.lazy="info.access_key" type="text" class="form-control {{ $errors->has('info.access_key') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.access_key',$validated) ? 'is-valid' : '' }}" id="access_key">
                                                @error('info.access_key') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input wire:model.lazy="info.username" type="text" class="form-control {{ $errors->has('info.username') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.username',$validated) ? 'is-valid' : '' }}" id="username">
                                                @error('info.username') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input wire:model.lazy="info.password" type="text" class="form-control {{ $errors->has('info.password') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.password',$validated) ? 'is-valid' : '' }}" id="password">
                                                @error('info.password') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="account_number">Account Number</label>
                                                <input wire:model.lazy="info.account_number" type="text" class="form-control {{ $errors->has('info.account_number') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.account_number',$validated) ? 'is-valid' : '' }}" id="account_number">
                                                @error('info.account_number') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info w-100">{{ __('Submit') }}</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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

</div>
