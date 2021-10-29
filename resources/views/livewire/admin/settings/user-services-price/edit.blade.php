<div>
    <x-slot name="title">
        edit service
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit User Percentage Service</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Percentage Services</li>
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
                        <h4 class="page-title">Edit User Percentage Services</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="mt-3">
                            <form wire:submit.prevent="edit" class="needs-validation bt-switch">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="service_percentage">Percentage :</label>
                                            <input type="text" wire:model.lazy="services.service_percentage" class="form-control {{ $errors->has('services.service_percentage') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.service_percentage',$validated) ? 'is-valid' : '' }}" id="service_percentage">
                                            @error('services.service_percentage') <span class="text-danger">{{ $message }}</span> @enderror
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
