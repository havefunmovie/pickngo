<div>
    <x-slot name="title">
        owners
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Service Price and Percentage</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
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
                                <h4 class="page-title">Printing Services Price</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                            <div class="col-sm-6">
                                <a type="button" href="{{ route('admin.settings.printing.create') }}" class="btn btn-info btn-rounded float-right">Add New Service</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <livewire:admin.settings.printing-services-price.index />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Scanning Services Price</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <livewire:admin.settings.scanning-services-price.index />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Faxing Services Price</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <livewire:admin.settings.faxing-services-price.index />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Agent Services Percentage</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <livewire:admin.settings.agent-services-price.index />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">User Services Percentage</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <livewire:admin.settings.user-services-price.index />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Mailbox Percentage</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="mt-3">
                            <livewire:admin.settings.mailbox-services-price.index />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Pickup & Delivery Services</h4>
                            </div>
                            <div class="col-sm-6">
                                <a type="button" href="{{ route('admin.settings.pickupAndDelivery.create') }}" class="float-right btn btn-success rounded-3 ">Add Service Price</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <livewire:admin.settings.pickup-services.index />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
