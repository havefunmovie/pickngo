<div>
    <x-slot name="title">
        owners
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Agents Owner</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agents Owner</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Contact Popup Model -->
    <div id="agent-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Agent Information</h4>
                    <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <label class="form-control" id="name"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Agent Name</label>
                                <div class="col-8">
                                    <label class="form-control" id="agent"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <label class="form-control" id="email"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Mobile</label>
                                <div class="col-8">
                                    <label class="form-control" id="mobile"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Address</label>
                                <div class="col-8">
                                    <label class="form-control" id="address"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Postal</label>
                                <div class="col-8">
                                    <label class="form-control" id="postal"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">fax</label>
                                <div class="col-8">
                                    <label class="form-control" id="fax"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Operator Name</label>
                                <div class="col-8">
                                    <label class="form-control" id="operator_name"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">City</label>
                                <div class="col-8">
                                    <label class="form-control" id="city"></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Province</label>
                                <div class="col-8">
                                    <label class="form-control" id="province"></label>
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
                                <h4 class="page-title">Agents Owner List</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                            <div class="col-sm-6">
                                <a type="button" href="{{ route('admin.owner.create') }}" class="btn btn-info btn-rounded float-right">Add New Owner</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <livewire:admin.agents-owner.agents-owner-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            window.addEventListener('agent-detail', event => {
                console.log(event.detail);
                $('#name').text(event.detail.name);
                $('#agent').text(event.detail.agent.name);
                $('#email').text(event.detail.email);
                $('#mobile').text(event.detail.mobile);
                $('#address').text(event.detail.address);
                $('#postal').text(event.detail.postal);
                $('#city').text(event.detail.city);
                $('#province').text(event.detail.province);
                $('#fax').text(event.detail.fax);
                $('#operator_name').text(event.detail.operator_name);
                $("#agent-info").modal("show");
            });

            $(document).ready(function() {
            });
        </script>
    </x-slot>
</div>
