<div>
    <x-slot name="title">
        invoice list
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">API Settings</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Invoices</li>
                            <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <livewire:admin.invoice-list-datatable :start='$invs["start_transaction_id"]' :end='$invs["end_transaction_id"]'
                                                                       :agent='$invs["agent_id"]'/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
