<div>
    <x-slot name="title">
        pickup & delivery
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">pickup & delivery Orders</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">pickup & delivery Orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Contact Popup Model -->
    <div id="pickup-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">pickup & delivery Information</h4>
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
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Weight") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="weight"></label>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Dimension") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="dimen"></label>
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Service Name") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="service"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("From") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    Name: <label class="mt-2" id="from_name"></label><br>
                                    Email: <label class="mt-2" id="from_email"></label><br>
                                    Phone: <label class="mt-2" id="from_phone"></label><br>
                                    Address: <label class="mt-2" id="from"></label><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("To") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    Name: <label class="mt-2" id="to_name"></label><br>
                                    Email: <label class="mt-2" id="to_email"></label><br>
                                    Phone: <label class="mt-2" id="to_phone"></label><br>
                                    Address: <label class="mt-2" id="to"></label><br>
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
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Payed By") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-2" id="payed_by"></label>
                                        </div>
                                    </div>
    
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
                                            <label class="mt-2" id="email"></label>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-title">pickup & delivery List (User)</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive mt-3">
                            <livewire:admin.orders.pickup.pickup-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-title">pickup & delivery List (Agent)</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive mt-3">
                            <livewire:admin.orders.pickup.pickup-agent-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            window.addEventListener('pickup-detail', event => {
                console.log(event.detail);
                $('#track_code').text(event.detail.tracking_code);
                $('#weight').text(event.detail.weight + " " + event.detail.weight_type);
                $('#dimen').text(event.detail.length + " x " + event.detail.width + " x " + event.detail.height + " " + event.detail.dimen_type );
                $('#service').text(event.detail.service_name);
                $('#from').text(event.detail.line_1_from  + ", " + event.detail.city_from + ", " + event.detail.province_from  + ", " + event.detail.country_from);
                $('#from_name').text(event.detail.name_from);
                $('#from_email').text(event.detail.email_from);
                $('#from_phone').text(event.detail.phone_from);
                $('#to').text(event.detail.line_1_to  + ", " + event.detail.city_to + ", " + event.detail.province_to  + ", " + event.detail.country_to);
                $('#to_name').text(event.detail.name_to);
                $('#to_email').text(event.detail.email_to);
                $('#to_phone').text(event.detail.phone_to);
                $('#name').text(event.detail.user.name  + " " + event.detail.user.family);
                $('#email').text(event.detail.user.email);
                $('#phone').text(event.detail.user.mobile);
                $('#payed_by').text(event.detail.transactions.payed_by);
                if(event.detail.transactions.percentage == '')
                    $('#price').text(Math.abs(event.detail.transactions.price.toFixed(2)));
                else
                    $('#price').text(Math.abs((event.detail.transactions.price / event.detail.transactions.percentage).toFixed(2)));
                if(event.detail.transactions.status === 'unsuccessful')
                    $('#status').text(event.detail.transactions.status).addClass('text-danger');
                else if(event.detail.transactions.status === 'successful')
                    $('#status').text(event.detail.transactions.status).addClass('text-success');
                else
                    $('#status').text(event.detail.transactions.status).addClass('text-warning');
                $('#date').text(event.detail.transactions.created_at.substring(0, 10));
                $("#pickup-info").modal("show");
            });

            $(document).ready(function() {
                window.livewire.on('alert_remove',()=> {
                    setTimeout(
                        function () {
                            $("#toastrMsg").fadeOut('fast');
                        }, 5000)
                });
            });
        </script>
    </x-slot>
</div>