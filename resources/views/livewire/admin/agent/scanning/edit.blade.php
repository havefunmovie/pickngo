<div>
    <x-slot name="title">
        edit scanning
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
        <style>
            /* CHECKBOX TOGGLE SWITCH */
            /* @apply rules for documentation, these do not work as inline style */
            .toggle-checkbox:checked {
                @apply: right-0 border-green-400;
                right: 0;
                border-color: #68D391;
            }
            .toggle-checkbox:checked + .toggle-label {
                @apply: bg-green-400;
                background-color: #68D391;
            }
        </style>
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">RejectScanning Orders</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Scanning</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reject Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h4 class="text-white">Reject Reason :</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="edit" class="needs-validation bt-switch">
                            <div class="form-group">
                                <label for="message">{{ __('Please write your reasons ') }}:</label>
                                <textarea wire:model.lazy="scann.message" class="form-control {{ $errors->has('scann.message') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('scann.message',$validated) ? 'is-valid' : '' }}" id="message">{{ $scanning['reject_reason_message'] }}</textarea>
                                @error('scann.message') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-danger float-right"><i class="fs-2 mdi mdi-delete"></i> {{ __('Reject') }}</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            window.addEventListener('scanning-edit', event => {
            });
        </script>
    </x-slot>
</div>
