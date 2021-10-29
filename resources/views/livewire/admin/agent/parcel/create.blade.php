<div>
    <x-slot name="title">
        new parcel
    </x-slot>
    <x-slot name="styles">
        <link href="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
        <link href="{{ asset('assets/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/jquery-steps/steps.css') }}" rel="stylesheet">
        <link href="{{ asset('dist/css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
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
                        <div class="tab-wizard wizard-circle">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="" type="button" class="btn btn-circle {{ $currentStep > 1 ? 'btn-default stepwizard-step-shipping' : 'btn-selected'}}">1</a>
                                        <p>Shipping Detail</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="" type="button" class="btn btn-circle {{ $currentStep < 2 ? 'btn-queue' : ($currentStep > 2 ? 'btn-default stepwizard-step-get-quote' : 'btn-selected') }}">2</a>
                                        <p>Get a Quote</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="" type="button" class="btn btn-circle {{ $currentStep < 3 ? 'btn-queue' : ($currentStep > 3 ? 'btn-default' : 'btn-selected') }}">3</a>
                                        <p>Print Label</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
                                <div class="col-12">
                                    <livewire:admin.agent.parcel.details.shipping :services='$services'/>
                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
                                <div class="col-12">
                                    <livewire:admin.agent.parcel.details.get-quote />
                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
                                <div class="col-12">
                                    <livewire:admin.agent.parcel.details.get-label />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>

        <script>
            $(document).ready(function() {
            });
        </script>
    </x-slot>
</div>
