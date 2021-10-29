<div>
    <x-slot name="title">
        create a service
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">New Printing Service</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Printing Services</li>
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
                        <div class="col-sm-6">
                            <h4 class="page-title">New Printing Services Price</h4>
                            <h6 class="card-subtitle"></h6>
                        </div>
                        <div class="mt-3">
                            <form wire:submit.prevent="create" class="needs-validation bt-switch">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paper_type">Paper Type :</label>
                                            <input type="text" wire:model.lazy="services.paper_type" class="form-control {{ $errors->has('services.paper_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.paper_type',$validated) ? 'is-valid' : '' }}" id="paper_type">
                                            @error('services.paper_type') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="color_type">Paper Color :</label>
                                            <select wire:model.lazy="services.color_type" class="custom-select form-control {{ $errors->has('services.color_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.color_type',$validated) ? 'is-valid' : '' }}" id="color_type">
                                                <option value="" hidden>{{ __('') }}</option>
                                                <option value="colorful">{{ __('Colorful') }}</option>
                                                <option value="grey">{{ __('Grey') }}</option>
                                            </select>
                                            @error('services.color_type') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_first_page">Price of First Page :</label>
                                            <input type="text" wire:model.lazy="services.price_first_page" class="form-control {{ $errors->has('services.price_first_page') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.price_first_page',$validated) ? 'is-valid' : '' }}" id="price_first_page">
                                            @error('services.price_first_page') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price_more_page">Price of More Page :</label>
                                            <input type="text" wire:model.lazy="services.price_more_page" class="form-control {{ $errors->has('services.price_more_page') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('services.price_more_page',$validated) ? 'is-valid' : '' }}" id="price_more_page">
                                            @error('services.price_more_page') <span class="text-danger">{{ $message }}</span> @enderror
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
