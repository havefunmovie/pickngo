<div>
    <x-slot name="title">
        mailbox
    </x-slot>

    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Mailboxes</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mailboxes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Contact Popup Model -->
    <div wire:ignore.self class="modal fade" id="box-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button wire:click="close" type="button" class="close cancel" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input wire:ignore type="hidden" id="box-id">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-12 fw-bolder">Customer Info</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <label wire:ignore class="form-control" id="name"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label class="control-label">Email</label>
                                    <label wire:ignore class="form-control" id="email"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label class="control-label">Phone</label>
                                    <label wire:ignore class="form-control" id="phone"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                        </div>
                        <div class="row mt-1">
                            <label class="col-md-12 fw-bolder">Mailbox Info</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Full Name :</label>
                                    <label wire:ignore class="form-control" id="cust-1"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label for="email">Additional Full Name :</label>
                                    <label wire:ignore class="form-control" id="cust-2"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label for="email">Additional Full Name :</label>
                                    <label wire:ignore class="form-control" id="cust-3"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Renewal Date :</label>
                                    <label wire:ignore class="form-control" id="ren-date"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-danger">
                                    <label for="email">Usage Type :</label>
                                    <label wire:ignore class="form-control" id="user-box-type"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-danger">
                                    <label for="email">Box Type :</label>
                                    <label wire:ignore class="form-control" id="box-type"></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-danger">
                                    <label for="email">Key Status :</label>
                                    <label wire:ignore class="form-control" id="key-status"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr class="text-blue-500">
                        </div>
                        <div class="row mt-1">
                            <label class="col-md-12 fw-bolder">Prices Info</label>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label for="email">Additional Full Name Price :</label>
                                    <label wire:ignore class="form-control" id="cust-price-1"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label for="email">Additional Full Name Price :</label>
                                    <label wire:ignore class="form-control" id="cust-price-2"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label for="email">Usage Type Price :</label>
                                    <label wire:ignore class="form-control" id="usage-price"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Rental Fee Price :</label>
                                    <label wire:ignore class="form-control" id="rental-fee"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label for="email">Refundable Deposit :</label>
                                    <label wire:ignore class="form-control" id="refundable-deposit"></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-danger">
                                    <label for="email">Mailbox Price :</label>
                                    <label wire:ignore class="form-control" id="box-price"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">ID 1 :</label>
                                    <label wire:ignore class="form-control">
                                        <a wire:ignore download id="id-1">
                                            Click to Download
                                        </a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label for="email">ID 2 :</label>
                                    <label wire:ignore class="form-control">
                                        <a wire:ignore download id="id-2">
                                            Click to Download
                                        </a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Confirm Status :</label>
                                    <select wire:model.lazy="confirm_status" class="custom-select form-control {{ $errors->has('confirm_status') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('confirm_status',$validated) ? 'is-valid' : '' }}" id="confirm_status">
                                        <option value="0" hidden></option>
                                        <option value="1">Confirm</option>
                                        <option value="2">Unconfirm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="submit" type="button" class="btn btn-default waves-effect">Submit</button>
                    <button wire:click="close" type="button" class="btn btn-warning waves-effect cancel" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Contact Popup Model -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Mailboxes</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                            <div class="col-sm-6">
                                <a type="button" href="{{ route('agent.mailbox.prices') }}" class="btn btn-info btn-rounded float-right">Set Default Rates</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.mailbox.mailbox-datatable />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Mailbox Range</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                            <div class="col-sm-6">
                                <a type="button" href="{{ route('agent.mailbox.create') }}" class="btn btn-info btn-rounded float-right">Add New Mailbox</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.mailbox.boxes-datatable />
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">Mailbox Types</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                            <div class="col-sm-6">
                                <a type="button" href="{{ route('agent.mailbox.mailbox-type.create') }}" class="btn btn-info btn-rounded float-right">Add New Type</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.mailbox.box-types-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script>
            window.addEventListener('box-detail', event => {
                console.log(event.detail);
                var usage_price = 0;
                var usage_type = '';
                switch (event.detail.mailbox_type) {
                    case 'personal':
                        usage_type = 'Personal';
                        usage_price = event.detail.prices.personal_mode;
                        break;
                    case 'personal_plus':
                        usage_type = 'Personal Plus';
                        usage_price = event.detail.prices.personal_plus_mode;
                        break;
                    case 'business':
                        usage_type = 'Business';
                        usage_price = event.detail.prices.business_mode;
                        break;
                    case 'corporation':
                        usage_type = 'Corporation';
                        usage_price = event.detail.prices.corporate_mode;
                        break;
                }

                $('#box-id').val(event.detail.id);
                $('#name').text(event.detail.user.name);
                $('#email').text(event.detail.user.email);
                $('#phone').text(event.detail.user.mobile);
                $('#cust-1').text(event.detail.customer_1);
                $('#cust-2').text(event.detail.customer_2);
                $('#cust-3').text(event.detail.customer_3);
                $('#ren-date').text(event.detail.renewal_date);
                $('#user-box-type').text(usage_type);
                $('#box-type').text(event.detail.boxtype.box_type + " - " + event.detail.boxtype.expired_time + " - " + event.detail.boxtype.expired_type);

                $('#cust-price-1').text('$' + event.detail.prices.customer_2);
                $('#cust-price-2').text('$' + event.detail.prices.customer_3);
                $('#usage-price').text('$' + usage_price);
                $('#rental-fee').text('$' + event.detail.prices.rental_fee);
                $('#refundable-deposit').text('$' + event.detail.prices.refundable_deposit);
                $('#box-price').text('$' + event.detail.boxtype.price);

                $('#key-status').text(event.detail.key_status === '1' ? 'Requested Key' : "Don't Request Key");
                $('#id-1').attr('href',event.detail.photo1);
                // $('#img-id-1').attr('src', event.detail.photo1);
                $('#id-2').attr('href', event.detail.photo2);
                // $('#img-id-2').attr('src', event.detail.photo2);
                $("#box-info").modal("show");
            });
            window.addEventListener('close', event => {
                $("#box-info").modal("hide");
            });

            $(document).ready(function() {
                $('#submit').click(function () {
                    Livewire.emit('confirm', $('#box-id').val());
                });
            });
        </script>
    </x-slot>
</div>
