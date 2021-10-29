<div>
    <x-slot name="title">
        withdraws
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

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

    <!-- Add Contact Popup Model -->
    <div id="cash-info" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form-horizontal form-material">
                    <input type="hidden" id="inv-id">
                    <div class="modal-body">
                        <h3>Are you sure you want to withdraw?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="submit" class="btn btn-default waves-effect">Yes</button>
                        <button type="button" id='cancel_mat_res' class="btn btn-warning waves-effect" data-dismiss="modal">No</button>
                    </div>
                </form>
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
                        <h4 class="page-title">Withdraws</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.withdraw-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            window.addEventListener('cash-detail', event => {
                console.log(event.detail);
                $('#inv-id').val(event.detail);
                $("#cash-info").modal("show");
            });

            $(document).ready(function() {
            });
        </script>
    </x-slot>
</div>
