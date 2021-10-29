<div>
    <x-slot name="title">
        withdraws
    </x-slot>
    <x-slot name="styles">
{{--        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />--}}
    </x-slot>

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
                <h4 class="page-title">Edit Withdraws</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Withdraws</li>
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
                        <h4 class="page-title">Edit Withdraws</h4>
                        <h6 class="card-subtitle"></h6>
                        @if($status === 'successful')
                            <livewire:admin.withdraws.successful :withid='$withid'/>
                        @else
                            <livewire:admin.withdraws.unsuccessful :withid='$withid'/>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            window.addEventListener('pay-detail', event => {
                $('#with-id').val(event.detail);
                $("#pay-info").modal("show");
            });

            $(document).ready(function () {

            });
        </script>
    </x-slot>
</div>
