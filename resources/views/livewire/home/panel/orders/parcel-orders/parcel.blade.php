<div>
    @if($error)
        <div id="toastrMsg" class="alert alert-danger mt-2">{{ $error }}</div>
    @endif

    <!-- parcel Info Popup Model -->
    <div id="parcel-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Parcel Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- order information --}}
                    <div class="card">
                        <div class="card-header">
                            <i class="mdi mdi-package"></i>
                          Order Informations
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Tracking Code") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2" id="track_code"></label>
                                        </div>
                                    </div>
        
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Weight") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2" id="weight"></label>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Dimension") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2" id="dimen"></label>
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Service Name") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2" id="service"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Payed By") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="parcel_payed_by"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Price") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            $<label class="mt-md-2" id="price"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Status Of Payment") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="status"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Payment Date") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="date"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group row mt-3">
                                    <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label">{{ __("From") }}:</label>
                                    <div class="col-md-10 col-xs-6">
                                        Name: <label class="mt-md-2" id="from_name"></label><br>
                                        Email: <label class="mt-md-2" id="from_email"></label><br>
                                        Phone: <label class="mt-md-2" id="from_phone"></label><br>
                                        Address: <label class="mt-md-2" id="from"></label><br>
                                    </div>
                                </div>
    
                                <div class="form-group row mt-3">
                                    <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label">{{ __("To") }}:</label>
                                    <div class="col-md-10 col-xs-6">
                                        Name: <label class="mt-md-2" id="to_name"></label><br>
                                        Email: <label class="mt-md-2" id="to_email"></label><br>
                                        Phone: <label class="mt-md-2" id="to_phone"></label><br>
                                        Address: <label class="mt-md-2" id="to"></label><br>
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

    <!-- Add Contact Popup Model -->
    <div id="activity-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Activity Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group" id="activity-container">
                    </div>
                    <div class="modal-footer mt-3">
                        <button type="button" class="close btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Print Model -->
    <div id="print-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Print Parcel Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <i class="mdi mdi-package"></i>
                          Print labels
                        </div>
                        <div class="card-body text-center">
                            <button wire:click="printLabel()" class="btn btn-primary m-1">
                                <i class="mdi mdi-package"></i>
                                Lable
                            </button>

                            <button wire:click="printShipment()" class="btn btn-primary m-1">
                                <i class="mdi mdi-truck"></i>
                                Shipping
                            </button>

                            <button wire:click="printInvoice()" class="btn btn-primary m-1">
                                <i class="mdi mdi-file-document"></i>
                                invoice
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <livewire:home.panel.orders.parcel-orders.parcel-datatable />
    <x-slot name="parcel">
        <script>
            // information event
            window.addEventListener('parcel-detail', event => {
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
                $('#parcel_payed_by').text(event.detail.transactions.payed_by);
                if(event.detail.transactions.percentage == '')
                    $('#price').text(Math.abs(event.detail.transactions.price.toFixed(2)));
                else
                    $('#price').text(Math.abs((event.detail.transactions.price).toFixed(2)));
                if(event.detail.transactions.status === 'unsuccessful')
                    $('#status').text(event.detail.transactions.status).addClass('text-danger');
                else if(event.detail.transactions.status === 'successful')
                    $('#status').text(event.detail.transactions.status).addClass('text-success');
                else
                    $('#status').text(event.detail.transactions.status).addClass('text-warning');
                $('#date').text(event.detail.transactions.created_at.substring(0, 10));
                $("#parcel-info").modal("show");
            });

            // printing event
            window.addEventListener('print-detail', event => {
                console.log(event.detail);
                $("#print-info").modal("show");
            });

            window.addEventListener('parcel-activity-detail', event => {
                // console.log(event.detail);
                var hr = '';
                $.each(event.detail, function(i, $val) {
                    hr = '';
                    if (i != event.detail.length - 1) {
                        hr = '</div>'+ '<div class="form-group row mt-2">'+ '<div class="col-12">'+ '<hr>'+ '</div>'+ '</div>';
                    }

                    $('#activity-container').append('<div class="form-group row mt-2">'+
                        '<strong for="example-text-input" class="col-12 form-label mb-1">Activity ' + parseInt(event.detail.length - i) + ' :</strong>'+
                        '<label for="example-text-input" class="col-2 form-label fw-light fs-7 mb-1 mt-4">Date :</label>'+
                        '<div class="col-4 mt-4 border-bottom">'+
                        '<strong>' + ((typeof $val.GMTDate === "undefined") ? '' : $val.GMTDate) + '</strong>'+
                        '</div>'+
                        '<label for="example-text-input" class="col-2 form-label fw-light fs-7 mb-1 mt-4">Time :</label>'+
                        '<div class="col-4 mt-4 border-bottom">'+
                        '<strong>' + ((typeof $val.GMTTime === "undefined") ? '' : $val.GMTTime) + '</strong>'+
                        '</div>'+

                        '<label for="example-text-input" class="col-2 form-label fw-light fs-7 mb-1 mt-4">Status :</label>'+
                        '<div class="col-10 mt-4 border-bottom">'+
                        '<strong>' + ((typeof $val.Status.StatusType.Description === "undefined") ? '' : $val.Status.StatusType.Description) + '</strong>'+
                        '</div>'+

                        '<label for="example-text-input" class="col-2 form-label fw-light fs-7 mb-1 mt-4">City :</label>'+
                        '<div class="col-2 mt-4 border-bottom">'+
                        '<strong>' + ((typeof $val.ActivityLocation.Address.City === "undefined") ? '' : $val.ActivityLocation.Address.City) + '</strong>'+
                        '</div>'+
                        '<label for="example-text-input" class="col-2 form-label fw-light fs-7 mb-1 mt-4">Province Code :</label>'+
                        '<div class="col-2 mt-4 border-bottom">'+
                        '<strong>' + ((typeof $val.ActivityLocation.Address.StateProvinceCode === "undefined") ? '' : $val.ActivityLocation.Address.StateProvinceCode) + '</strong>'+
                        '</div>'+
                        '<label for="example-text-input" class="col-2 form-label fw-light fs-7 mb-1 mt-4">Postal Code :</label>'+
                        '<div class="col-2 mt-4 border-bottom">'+
                        '<strong>' + ((typeof $val.ActivityLocation.Address.PostalCode === "undefined") ? '' : $val.ActivityLocation.Address.PostalCode) + '</strong>'+
                        '</div>'+

                        '<label for="example-text-input" class="col-2 form-label fw-light fs-7 mb-1 mt-4">Country Code :</label>'+
                        '<div class="col-4 mt-4 border-bottom">'+
                        '<strong>' + ((typeof $val.ActivityLocation.Address.CountryCode === "undefined") ? '' : $val.ActivityLocation.Address.CountryCode) + '</strong>'+
                        '</div>'+
                        '<label for="example-text-input" class="col-2 form-label fw-light fs-7 mb-1 mt-4">Receiver :</label>'+
                        '<div class="col-4 mt-4 border-bottom">'+
                        '<strong>' + ((typeof $val.ActivityLocation.SignedForByName === "undefined") ? '' : $val.ActivityLocation.SignedForByName) + '</strong>'+
                        '</div>'+
                        hr
                    );

                    $("#activity-info").modal("show");
                });
            });

            $(document).ready(function() {
                $('.close').click(function () {
                    $("#activity-info, #parcel-info, #print-info").modal("hide");
                });

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
