<div>
    <x-slot name="title">
        new parcel
    </x-slot>
    <x-slot name="styles">
        <link href="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
        <link href="{{ asset('assets/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/jquery-steps/steps.css') }}" rel="stylesheet">
        <link href="{{ asset('dist/css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Create New Parcel') }}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Parcels</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create New Parcel</li>
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
                    <div class="card-body wizard-content">
                        <div class="row">
                            <div class="col-md-9">
                                <livewire:admin.agent.finduser.index/>
                            </div>
                            <div class="col-md-3 text-center">
                                <button wire:click="createParcelForNewUser()" class="btn btn-outline-primary">Create Parcel for new user</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body wizard-content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label>Users List</label>
                                    </div>
                                    <div class="card-body">
                                        <livewire:admin.agent.parcel.users-datatable />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Info Popup Model -->
        <div id="user-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h3 class="modal-title" id="myModalLabel"><b>Envelop Information</b></h3>
                        <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        {{-- User information --}}
                        <div class="card">
                            <div class="card-header">
                                <i class="mdi mdi-account"></i>
                            User Informations
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Name") }}:</label>
                                    <div class="col-md-9 col-xs-6">
                                        <label class="mt-2" id="name"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Email") }}:</label>
                                    <div class="col-md-9 col-xs-6">
                                        <label class="mt-2" id="email"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Phone") }}:</label>
                                    <div class="col-md-9 col-xs-6">
                                        <label class="mt-2" id="phone"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Address") }}:</label>
                                    <div class="col-md-9 col-xs-6">
                                        <label class="mt-2" id="address"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            window.addEventListener('user-detail', event => {
                $('#name').text(event.detail.name + " " + event.detail.family);
                $('#email').text(event.detail.email);
                if(event.detail.mobile)
                    $('#phone').text(event.detail.mobile);
                else
                    $('#phone').text('-');
                if(event.detail.address)
                    $('#address').text(event.detail.address + ", " + event.detail.city + ", " + event.detail.ptovince + ", Canada, " + event.detail.postal);
                else
                    $('#address').text('-');
                $("#user-info").modal("show");
            });

            $(document).ready(function() {
            });
        </script>
    </x-slot>
</div>
