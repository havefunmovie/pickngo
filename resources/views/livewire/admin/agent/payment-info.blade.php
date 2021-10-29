<div>
    <x-slot name="title">
        payment
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Payment Methods</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payment Methods</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Contact Popup Model -->
    <div id="parcel-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Parcel Information</h4>
                    <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Tracking Code</label>
                                <div class="col-8">
                                    <label class="form-control" id="track_code"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Weight</label>
                                <div class="col-8">
                                    <label class="form-control" id="weight"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Dimension</label>
                                <div class="col-8">
                                    <label class="form-control" id="dimen"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Service Name</label>
                                <div class="col-8">
                                    <label class="form-control" id="service"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">From</label>
                                <div class="col-8">
                                    <label class="form-control" id="from"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">To</label>
                                <div class="col-8">
                                    <label class="form-control" id="to"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id='cancel_mat_res' class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Add Contact Popup Model -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Method List</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                            <div class="col-sm-6">
                                <a type="button" href="{{ route('agent.payment.create') }}" class="btn btn-info btn-rounded float-right">Add New Method</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.payment.payment-info-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
