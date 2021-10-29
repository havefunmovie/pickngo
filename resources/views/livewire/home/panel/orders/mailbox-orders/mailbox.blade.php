<div>
    {{-- Mailbox information modal --}}
    <div id="mailbox-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Faxing Information</h4>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Tracking Code") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="mailbox_scan_track_code"></label>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Mailbox Type") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="mailbox_mailbox_type"></label>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Mailbox Number") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="mailbox_box_number"></label>
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Customer") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="mailbox_customer"></label>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Expiry") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="mailbox_box_expiry"></label>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Renewal Date") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2 fw-bold text-info" id="mailbox_renewal_date"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Payed By") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="mailbox_payed_by"></label>
                                        </div>
                                    </div>    
                                    
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Price") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            $<label class="mt-md-2" id="mailbox_price"></label>
                                        </div>
                                    </div> 

                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Status Of Payment") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="mailbox_status"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Payment Date") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="mailbox_date"></label>
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
    <livewire:home.panel.orders.mailbox-orders.mailbox-datatable />
    
    <script>
        window.addEventListener('mailbox-detail', event => {
            $('#mailbox_scan_track_code').text(event.detail.tracking_code);
            $('#mailbox_renewal_date').text(event.detail.renewal_date);
            $('#mailbox_mailbox_type').text(event.detail.mailbox_type +'-'+ event.detail.boxtype.box_type);
            $('#mailbox_customer').text(event.detail.customer_1);
            $('#mailbox_box_number').text(event.detail.box.number);
            $('#mailbox_box_expiry').text('Every '+event.detail.boxtype.expired_time + ' ' + event.detail.boxtype.expired_type);
           
            if(event.detail.transactions.status === 'unsuccessful')
                $('#mailbox_status').text(event.detail.transactions.status).addClass('text-danger');
            else if(event.detail.transactions.status === 'successful')
                $('#mailbox_status').text(event.detail.transactions.status).addClass('text-success');
            else
                $('#mailbox_status').text(event.detail.transactions.status).addClass('text-warning');

            $('#mailbox_payed_by').text(event.detail.transactions.payed_by);
            if(event.detail.transactions.percentage == '')
                    $('#price').text(Math.abs(event.detail.transactions.price.toFixed(2)));
                else
                    $('#price').text(Math.abs((event.detail.transactions.price / event.detail.transactions.percentage).toFixed(2)));
            $('#mailbox_date').text(event.detail.transactions.created_at.substring(0, 10));

            $("#mailbox-info").modal("show");
        });

        $(document).ready(function() {
            $('.close').click(function () {
                $("#mailbox-info").modal("hide");
            });
        });
    </script>

</div>
