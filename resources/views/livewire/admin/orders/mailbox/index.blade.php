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
                <h4 class="page-title">Mailbox Orders</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mailbox Orders</li>
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
                        <h4 class="page-title">Mailbox List (User)</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive mt-3">
                            <livewire:admin.orders.mailbox.mailbox-datatable />
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
                        <h4 class="page-title">Mailbox List (Agent)</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="table-responsive mt-3">
                            <livewire:admin.orders.mailbox.mailbox-agent-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>