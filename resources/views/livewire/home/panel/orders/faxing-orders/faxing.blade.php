<div>
    <!-- Add Contact Popup Model -->
    <div id="faxing-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Tracking Code") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2" id="faxing_scan_track_code"></label>
                                        </div>
                                    </div>
        
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Phone") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2" id="faxing_phone"></label>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Paper Count") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2" id="faxing_paper_count"></label>
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Status") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2" id="faxing_order_status"></label>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Reject Reason") }}:</label>
                                        <div class="col-md-9 col-xs-6">
                                            <label class="mt-md-2 text-danger" id="faxing_reject_reason_message"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Payed By") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="faxing_payed_by"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Price") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            $<label class="mt-md-2" id="faxing_price"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Status Of Payment") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="faxing_status"></label>
                                        </div>
                                    </div>
    
                                    <div class="form-group row mt-xs-3">
                                        <label for="example-text-input" class="col-md-4 col-xs-4 col-form-label">{{ __("Payment Date") }}:</label>
                                        <div class="col-md-8 col-xs-6">
                                            <label class="mt-md-2" id="faxing_date"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group row mt-xs-3">
                                    <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label">{{ __("Branch Name") }}:</label>
                                    <div class="col-md-10 col-xs-6">
                                        <label class="mt-md-2" id="faxing_branch_name"></label>
                                    </div>
                                </div>
    
                                <div class="form-group row mt-xs-3">
                                    <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label">{{ __("Branch Address") }}:</label>
                                    <div class="col-md-10 col-xs-6">
                                        <label class="mt-md-2" id="faxing_address"></label>
                                    </div>
                                </div>

                                <div class="form-group row mt-xs-3">
                                    <label for="example-text-input" class="col-md-2 col-xs-4 col-form-label">{{ __("Agent Phone") }}:</label>
                                    <div class="col-md-10 col-xs-6">
                                        <label class="mt-md-2" id="faxing_agent_phone"></label>
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

    <!-- Print Model -->
    <div id="faxing-print-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                            <button class="btn btn-primary m-1">
                                <i class="mdi mdi-package"></i>
                                Lable
                            </button>

                            <button class="btn btn-primary m-1">
                                <i class="mdi mdi-truck"></i>
                                Shipping
                            </button>

                            <button class="btn btn-primary m-1">
                                <i class="mdi mdi-file-document"></i>
                                invoice
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:home.panel.orders.faxing-orders.faxing-datatable />
    <x-slot name="fax">
        <script>
            window.addEventListener('faxing-detail', event => {
                console.log(event.detail);
                $('#faxing_scan_track_code').text(event.detail.tracking_code);
                $('#faxing_phone').text(event.detail.email);
                $('#faxing_paper_count').text(event.detail.paper_count);
                if(event.detail.agent_accept_status === 'Reject')
                    $('#faxing_order_status').text(event.detail.agent_accept_status).addClass('text-danger');
                else if(event.detail.agent_accept_status === 'Accept')
                    $('#faxing_order_status').text(event.detail.agent_accept_status).addClass('text-success');
                else
                    $('#faxing_order_status').text(event.detail.agent_accept_status).addClass('text-warning');

                $('#faxing_reject_reason_message').text(event.detail.reject_reason_message);
                $('#faxing_payed_by').text(event.detail.transactions.payed_by);
                if(event.detail.transactions.percentage == '')
                    $('#faxing_price').text(Math.abs(event.detail.transactions.price.toFixed(2)));
                else
                    $('#faxing_price').text(Math.abs((event.detail.transactions.price).toFixed(2)));
                if(event.detail.transactions.status === 'unsuccessful')
                    $('#faxing_status').text(event.detail.transactions.status).addClass('text-danger');
                else if(event.detail.transactions.status === 'successful')
                    $('#faxing_status').text(event.detail.transactions.status).addClass('text-success');
                else
                    $('#faxing_status').text(event.detail.transactions.status).addClass('text-warning');
                $('#faxing_date').text(event.detail.transactions.created_at.substring(0, 10));

                $('#faxing_branch_name').text(event.detail.agent.name + ' (' + event.detail.agent.company_name +')');
                $('#faxing_address').text( event.detail.agent.address +', '+event.detail.agent.city+', '+event.detail.agent.province +', '+ event.detail.agent.postal);
                $('#faxing_agent_phone').text(event.detail.agent.mobile);
                $("#faxing-info").modal("show");
            });

             // printing event
             window.addEventListener('faxing-print-info', event => {
                console.log(event.detail);
                $("#faxing-print-info").modal("show");
            });

            $(document).ready(function() {
                $('.close').click(function () {
                    $("#faxing-info, #faxing-print-info").modal("hide");
                });
            });
        </script>
    </x-slot>
</div>
