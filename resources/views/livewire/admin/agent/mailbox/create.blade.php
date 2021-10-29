<div>
    <x-slot name="title">
        create mailbox
    </x-slot>
    <x-slot name="styles">
        <link href="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
        <link href="{{ asset('assets/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/jquery-steps/steps.css') }}" rel="stylesheet">
        <link href="{{ asset('dist/css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
        <link href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">{{ __('Create New Mailbox') }}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Mailbox</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create New Mailbox</li>
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
                                <div class="stepwizard-box setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="" type="button" class="btn btn-circle {{ $currentStep > 1 ? 'btn-default stepwizard-step-box' : 'btn-selected'}}">1</a>
                                        <p>Mailbox Range</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="" type="button" class="btn btn-circle {{ $currentStep < 2 ? 'btn-queue' : ($currentStep > 2 ? 'btn-default stepwizard-step-get-quote' : 'btn-selected') }}">2</a>
                                        <p>Empty Selection</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
                                <div class="col-12">
                                    <livewire:admin.agent.mailbox.details.type-selection />
                                </div>
                            </div>
                            <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
                                <div class="col-12">
                                    <livewire:admin.agent.mailbox.details.empty-selection />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
