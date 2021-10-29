<div>
    <x-slot name="title">
        withdraws
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <!-- Add Contact Popup Model -->
    <div id="bank-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                                <label for="example-text-input" class="col-4 col-form-label">Bank Name</label>
                                <div class="col-8">
                                    <label class="form-control" id="bank_name"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Transaction Number</label>
                                <div class="col-8">
                                    <label class="form-control" id="trans_num"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Branch Code</label>
                                <div class="col-8">
                                    <label class="form-control" id="branch_code"></label>
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

    <!-- Add Contact Popup Model -->
    <div id="pay-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Parcel Information</h4>
                    <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="with-id">
                    <h2>Your Payment is: </h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success waves-effect" id="successful">Successful</button>
                    <button type="button" class="btn btn-danger waves-effect" id="unsuccessful">Unsuccessful</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Add Contact Popup Model -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Withdraws</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Withdraws</li>
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
                        <h4 class="page-title">Withdraws</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive mt-3">
                            <livewire:admin.withdraws.withdraw-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            window.addEventListener('bank-detail', event => {
                $('#bank_name').text(event.detail.back_name);
                $('#trans_num').text(event.detail.transaction_number);
                $('#branch_code').text(event.detail.branch_code);
                $("#bank-info").modal("show");
            });

            window.addEventListener('pay-detail', event => {
                $('#with-id').val(event.detail);
                $("#pay-info").modal("show");
            });

            $(document).ready(function () {
                $('#successful').click(function () {
                    Livewire.emit('successful', $('#with-id').val());
                });
                $('#unsuccessful').click(function () {
                    Livewire.emit('unsuccessful', $('#with-id').val());
                });
            });
        </script>
    </x-slot>
</div>
