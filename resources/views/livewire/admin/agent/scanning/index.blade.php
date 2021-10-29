<div>
    <x-slot name="title">
        scanning
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Scanning Orders</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Scanning Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Contact Popup Model -->
    <div id="scanning-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h3 class="modal-title" id="myModalLabel">Scanning Information</h3>
                    <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- order information --}}
                    <div class="card">
                        <div class="card-header">
                            <i class="mdi mdi-package"></i>
                          Order Informations
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Tracking Code") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="track_code"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Email") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="email"></label>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Paper Count") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="paper_count"></label>
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Status") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="order-status"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Reject Reason") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2 text-danger" id="reject_reason"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Transaction information --}}
                            <div class="card">
                                <div class="card-header">
                                    <i class="mdi mdi-credit-card"></i>
                                Transaction Informations
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Price") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            $<label class="mt-2" id="price"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Status Of Payment") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-2" id="status"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Payment Date") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-2" id="date"></label>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                            <label class="mt-2" id="user_email"></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Phone") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-2" id="phone"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Add Contact Popup Model -->

    <!-- check as done Model -->
    <div id="CheckASDone" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white" id="myModalLabel">Is it done ?</h4>
                    <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body text-center">
                    <button class="btn btn-success m-1 mx-md-5" wire:click="OrderReady({{ $ScanningId }})"">
                        <i class="mdi mdi-check"></i>
                        Done
                    </button>
                    <button class="mx-md-5 close">
                        cancel
                    </button>
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
                                <h4 class="page-title">Scanning List</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                            <div class="col-sm-6">
                                <a href="{{ route('agent.scanning.selectUser') }}" class="btn btn-outline-info float-right"><i class="mdi mdi-plus"></i> Add New Scanning</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.scanning.scanning-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            window.addEventListener('scanning-detail', event => {
                // console.log(event.detail.tracking_code);
                $('#track_code').text(event.detail.tracking_code);
                $('#email').text(event.detail.email);
                $('#paper_count').text(event.detail.paper_count);
                if(event.detail.agent_accept_status === 'Reject')
                    $('#order-status').text(event.detail.agent_accept_status).addClass('text-danger');
                else if(event.detail.agent_accept_status === 'Accept')
                    $('#order-status').text(event.detail.agent_accept_status).addClass('text-success');
                else
                    $('#order-status').text(event.detail.agent_accept_status).addClass('text-warning');
                $('#reject_reason').text(event.detail.reject_reason_message);
                if(!event.detail.user.name)
                    $('#name').text('Not Set');
                else
                    $('#name').text(event.detail.user.name  + " " + event.detail.user.family);
                $('#user_email').text(event.detail.user.email);
                if(event.detail.user.mobile)
                    $('#phone').text(event.detail.user.mobile);
                else
                    $('#phone').text('Not Set');
                $('#payed_by').text(event.detail.transactions.payed_by);
                if(event.detail.transactions.percentage == '')
                    $('#price').text(Math.abs(event.detail.transactions.price.toFixed(2)));
                else
                    $('#price').text(Math.abs(((event.detail.transactions.price * event.detail.transactions.percentage)/100).toFixed(2)));
                if(event.detail.transactions.status === 'unsuccessful')
                    $('#status').text(event.detail.transactions.status).addClass('text-danger');
                else if(event.detail.transactions.status === 'successful')
                    $('#status').text(event.detail.transactions.status).addClass('text-success');
                else
                    $('#status').text(event.detail.transactions.status).addClass('text-warning');
                $('#date').text(event.detail.transactions.created_at.substring(0, 10));
                $("#scanning-info").modal("show");
            });

            window.addEventListener('CheckASDone', event => {
                
                $("#CheckASDone").modal("show");
            });

            $(document).ready(function() {
                $('.close').click(function () {
                    $("#CheckASDone").modal("hide");
                });
            });
        </script>
    </x-slot>
</div>