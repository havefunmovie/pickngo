<div>
    <x-slot name="title">
        edit owner
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Agent Owner</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Agent Owner</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Agent Owner</li>
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
                                <h4 class="">Owner Info</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form wire:submit.prevent="create" class="needs-validation bt-switch">
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
                                            <label for="agent_id">Agent Name :</label>
                                            <select wire:model.lazy="info.agent_id" class="custom-select form-control {{ $errors->has('info.agent_id') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.agent_id',$validated) ? 'is-valid' : '' }}" id="agent_id">
                                                <option value="" hidden>{{ __('') }}</option>
                                                @foreach($agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('info.agent_id') <span class="text-danger">{{ $message }}</span> @enderror
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
{{--                                <div class="row mt-3">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="password">Password :</label>--}}
{{--                                            <input type="password" wire:model.lazy="info.password" class="form-control {{ $errors->has('info.password') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.password',$validated) ? 'is-valid' : '' }}" id="password">--}}
{{--                                            @error('info.password') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="mobile">Confirm Password :</label>--}}
{{--                                            <input type="password" wire:model.lazy="info.password_confirmation" class="form-control {{ $errors->has('info.password_confirmation') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.password_confirmation',$validated) ? 'is-valid' : '' }}" id="password_confirmation">--}}
{{--                                            @error('info.password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
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
                                            <label for="fax">Fax :</label>
                                            <input type="text" wire:model.lazy="info.fax" class="form-control {{ $errors->has('info.fax') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.fax',$validated) ? 'is-valid' : '' }}" id="fax">
                                            @error('info.fax') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="operator_name">Operator Name :</label>
                                            <input type="text" wire:model.lazy="info.operator_name" class="form-control {{ $errors->has('info.operator_name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('info.operator_name',$validated) ? 'is-valid' : '' }}" id="operator_name">
                                            @error('info.operator_name') <span class="text-danger">{{ $message }}</span> @enderror
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
                                                <option value="1">{{ __('Active') }}</option>
                                                <option value="0">{{ __('Inactive') }}</option>
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