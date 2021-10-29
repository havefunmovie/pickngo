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
                        @if($error)
                            <div class="toastrMsg alert alert-danger mt-2">{{ $error }}</div>
                        @endif
                        <form wire:submit.prevent="create" class="needs-validation">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type_name">Mailbox Type :</label>
                                        <input type="text" wire:model.lazy="box_type.type_name" class="form-control {{ $errors->has('box_type.type_name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('box_type.type_name',$validated) ? 'is-valid' : '' }}" id="type_name">
                                        @error('box_type.type_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price :</label>
                                        <input type="text" wire:model.lazy="box_type.price" class="form-control {{ $errors->has('box_type.price') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('box_type.price',$validated) ? 'is-valid' : '' }}" id="price">
                                        @error('box_type.price') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expired_time">Expiring Time:</label>
                                        <input type="text" wire:model.lazy="box_type.expired_time" class="form-control {{ $errors->has('box_type.expired_time') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('box_type.expired_time',$validated) ? 'is-valid' : '' }}" id="expired_time">
                                        @error('box_type.expired_time') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expired_type">Expiring Type:</label>
                                        <select wire:model.lazy="box_type.expired_type" class="form-control custom-select {{ $errors->has('box_type.expired_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('box_type.expired_type',$validated) ? 'is-valid' : '' }}" id="expired_type">
                                            <option hidden></option>
                                            <option value="month">{{ __('Monthly') }}</option>
                                            <option value="year">{{ __('Yearly') }}</option>
                                        </select>
                                        @error('box_type.expired_type') <span class="text-danger">{{ $message }}</span> @enderror
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
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                window.livewire.on('alert_remove',()=> {
                    setTimeout(
                        function () {
                            $(".toastrMsg").fadeOut('fast');
                        }, 7000);
                    $("#cash-info").modal("hide");
                });
            });
        </script>
    </x-slot>
</div>
