<div>
    <x-slot name="title">
        mailbox type
    </x-slot>
    <x-slot name="styles">
        {{--        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />--}}
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Mailbox Type</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Mailbox Type</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create a Type</li>
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
                        <h4 class="page-title">Create a Type</h4>
                        <h6 class="card-subtitle"></h6>
                        <form wire:submit.prevent="edit" class="needs-validation">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="box_type">Mailbox Type :</label>
                                        <input type="text" wire:model.lazy="box_type.box_type" class="form-control {{ $errors->has('box_type.box_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('box_type.box_type',$validated) ? 'is-valid' : '' }}" id="box_type">
                                        @error('box_type.box_type') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price :</label>
                                        <input type="text" wire:model.lazy="box_type.price" class="form-control {{ $errors->has('box_type.price') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('box_type.price',$validated) ? 'is-valid' : '' }}" id="price">
                                        @error('box_type.price') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <button class="btn btn-info w-100">{{ __('Create') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
