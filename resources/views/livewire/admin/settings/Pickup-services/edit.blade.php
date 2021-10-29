<div>
    <x-slot name="title">
        edit service
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Edit Pickup & Delivery Service</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pickup & Delivery</li>
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
                        <h4 class="page-title">Edit Pickup & Delivery Service Prices</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="mt-3">
                            <form wire:submit.prevent="edit" class="needs-validation bt-switch">
                                <div class="row mt-3 bg-light">
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label for="service_price">Regular service price :</label>
                                            <input type="text" wire:model.lazy="services.service_price" class="form-control {{ $errors->has('services.service_price') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.service_price',$validated) ? 'is-valid' : '' }}" id="service_price">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.service_price') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span> {{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label for="urgent_price">Urgent service price :</label>
                                            <input type="text" wire:model.lazy="services.urgent_price" class="form-control {{ $errors->has('services.urgent_price') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.urgent_price',$validated) ? 'is-valid' : '' }}" id="urgent_price">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.urgent_price') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label for="service_percentage">Agent discount :</label>
                                            <input type="text" wire:model.lazy="services.service_percentage" class="form-control {{ $errors->has('services.service_percentage') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.service_percentage',$validated) ? 'is-valid' : '' }}" id="service_percentage">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.service_percentage') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label for="driver_percentage">Driver Percentage :</label>
                                            <input type="text" wire:model.lazy="services.driver_percentage" class="form-control {{ $errors->has('services.driver_percentage') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.driver_percentage',$validated) ? 'is-valid' : '' }}" id="driver_percentage">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.driver_percentage') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3 bg-light">
                                    <div class="col-md-12 pt-2"><h5>Weight <small>( kg )</small>:</h5></div>
                                    <div class="col-md-3 p-2">
                                        <div class="form-group">
                                            <label for="weight_limit">Limited :</label>
                                            <input type="text" wire:model.lazy="services.weight_limit" class="form-control {{ $errors->has('services.weight_limit') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.weight_limit',$validated) ? 'is-valid' : '' }}" id="weight_limit">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.weight_limit') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-2">
                                        <div class="form-group">
                                            <label for="weight_minimum">Minimum :</label>
                                            <input type="text" wire:model.lazy="services.weight_minimum" class="form-control {{ $errors->has('services.weight_minimum') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.weight_minimum',$validated) ? 'is-valid' : '' }}" id="weight_minimum">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.weight_minimum') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-2">
                                        <div class="form-group">
                                            <label for="weight_extra">Extra Unit :</label>
                                            <input type="text" wire:model.lazy="services.weight_extra" class="form-control {{ $errors->has('services.weight_extra') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.weight_extra',$validated) ? 'is-valid' : '' }}" id="weight_extra">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.weight_extra') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 p-2">
                                        <div class="form-group">
                                            <label for="weight_extra_price">Extra Weight Price :</label>
                                            <input type="text" wire:model.lazy="services.weight_extra_price" class="form-control {{ $errors->has('services.weight_extra_price') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.weight_extra_price',$validated) ? 'is-valid' : '' }}" id="weight_extra_price">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.weight_extra_price') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12 pt-2"><h5>Distance <small>( km )</small> :</h5></div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="distance_limit">Limited :</label>
                                            <input type="text" wire:model.lazy="services.distance_limit" class="form-control {{ $errors->has('services.distance_limit') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.distance_limit',$validated) ? 'is-valid' : '' }}" id="distance_limit">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.distance_limit') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="distance_minimum">Minimum :</label>
                                            <input type="text" wire:model.lazy="services.distance_minimum" class="form-control {{ $errors->has('services.distance_minimum') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.distance_minimum',$validated) ? 'is-valid' : '' }}" id="distance_minimum">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.distance_minimum') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="distance_extra">Extra Unit :</label>
                                            <input type="text" wire:model.lazy="services.distance_extra" class="form-control {{ $errors->has('services.distance_extra') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.distance_extra',$validated) ? 'is-valid' : '' }}" id="distance_extra">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.distance_extra') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="distance_extra_price">Extra Distance Price :</label>
                                            <input type="text" wire:model.lazy="services.distance_extra_price" class="form-control {{ $errors->has('services.distance_extra_price') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.distance_extra_price',$validated) ? 'is-valid' : '' }}" id="distance_extra_price">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.distance_extra_price') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row mt-3 bg-light">
                                    <div class="col-md-12 pt-2"><h5>Dimensions <small>( inch )</small>:</h5></div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dimensions_limit">Limit :</label>
                                            <input type="text" wire:model.lazy="services.dimensions_limit" class="form-control {{ $errors->has('services.dimensions_limit') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.dimensions_limit',$validated) ? 'is-valid' : '' }}" id="dimensions_limit">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.dimensions_limit') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dimensions_minimum">Minimum :</label>
                                            <input type="text" wire:model.lazy="services.dimensions_minimum" class="form-control {{ $errors->has('services.dimensions_minimum') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.dimensions_minimum',$validated) ? 'is-valid' : '' }}" id="dimensions_minimum">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.dimensions_minimum') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dimensions_extra">Extra Unit :</label>
                                            <input type="text" wire:model.lazy="services.dimensions_extra" class="form-control {{ $errors->has('services.dimensions_extra') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.dimensions_extra',$validated) ? 'is-valid' : '' }}" id="dimensions_extra">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.dimensions_extra') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dimensions_extra_price">Extra Dimensions Price :</label>
                                            <input type="text" wire:model.lazy="services.dimensions_extra_price" class="form-control {{ $errors->has('services.dimensions_extra_price') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.dimensions_extra_price',$validated) ? 'is-valid' : '' }}" id="dimensions_extra_price">
                                            <span class="text-success m-2"><span class="mdi mdi-information-outline"></span> description about input</span><br>
                                            @error('services.dimensions_extra_price') <span class="text-danger m-2"><span class="mdi mdi-alert-outline"></span>{{ substr($message,13) }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-12 pt-4">
                                        <button type="submit" class="btn btn-success btn-md float-right"><span class="mdi mdi-lead-pencil"></span> {{ __('Edit') }}</button>
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
