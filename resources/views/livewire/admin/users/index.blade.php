<div>
    <x-slot name="title">
        users
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Users</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Contact Popup Model -->
    <div id="user-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">User Information</h4>
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
                                <h4 class="page-title">User List</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                            <div class="col-sm-6">
                                <a type="button" href="{{ route('admin.users.create') }}" class="btn btn-outline-info float-right m-2"> <i class="mdi mdi-add"></i>Add New User</a>
                                <button class="btn btn-outline-secondary float-right m-2" data-toggle="modal" data-target="#showUserPhone"><i class="mdi mdi-eye"></i> show user phones</button>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <livewire:admin.users.user-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="showUserPhone" tabindex="-1" role="dialog" aria-labelledby="showUserPhoneLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                <h5 class="modal-title  text-white" id="showUserPhoneLabel">You can Copy all user Phone Number Here !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @foreach ($phones as $key)
                        <span>{{ $key }}, </span>
                    @endforeach
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            window.addEventListener('user-detail', event => {
                // console.log(event.detail.tracking_code);
                $('#name').text(event.detail.name + " " + event.detail.family);
                $('#email').text(event.detail.email);
                $('#mobile').text(event.detail.mobile);
                $('#address').text(event.detail.address);
                $('#postal').text(event.detail.postal);
                $('#city').text(event.detail.city);
                $('#province').text(event.detail.province);
                $("#user-info").modal("show");
            });

            $(document).ready(function() {
            });
        </script>
    </x-slot>
</div>