<div>
    <x-slot name="title">
        dashboard
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Dashboard</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
           <div class="col-md-6">
               <div class="card">
                   <div class="card-header">
                       <p class="font-weight-bold">Quick Qoute</p>
                   </div>
                   <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="parcel" data-toggle="tab" href="#nav-parcel" role="tab" aria-controls="nav-parcel" aria-selected="true"><i class="mdi mdi-package"></i> Parcel</a>
                            <a class="nav-item nav-link" id="envelop" data-toggle="tab" href="#nav-envelop" role="tab" aria-controls="nav-envelop" aria-selected="false"><i class="mdi mdi-email"></i> Envelop</a>
                            <a class="nav-item nav-link" id="scanning" data-toggle="tab" href="#nav-scanning" role="tab" aria-controls="nav-scanning" aria-selected="false"><i class="mdi mdi-scanner"></i> Scanning</a>
                            <a class="nav-item nav-link" id="printing" data-toggle="tab" href="#nav-printing" role="tab" aria-controls="nav-printing" aria-selected="false"><i class="mdi mdi-printer"></i> Printing</a>
                            <a class="nav-item nav-link" id="faxing" data-toggle="tab" href="#nav-faxing" role="tab" aria-controls="nav-faxing" aria-selected="false"><i class="mdi mdi-fax"></i> Faxing</a>
                            <a class="nav-item nav-link" id="mailbox" data-toggle="tab" href="#nav-mailbox" role="tab" aria-controls="nav-mailbox" aria-selected="false"><i class="mdi mdi-mailbox"></i> MailBox</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-parcel" role="tabpanel" aria-labelledby="parcel">
                                <livewire:home.get-quotes-index.parcel />
                            </div>
                            <div class="tab-pane fade" id="nav-envelop" role="tabpanel" aria-labelledby="envelop">
                                <livewire:home.get-quotes-index.envelop />
                            </div>
                            <div class="tab-pane fade" id="nav-scanning" role="tabpanel" aria-labelledby="scanning">
                                <livewire:home.get-quotes-index.scanning :services='$services'/>
                            </div>
                            <div class="tab-pane fade" id="nav-printing" role="tabpanel" aria-labelledby="printing">
                                <livewire:home.get-quotes-index.printing />
                            </div>
                            <div class="tab-pane fade" id="nav-faxing" role="tabpanel" aria-labelledby="faxing">
                                <livewire:home.get-quotes-index.faxing :services='$services'/>
                            </div>
                            <div class="tab-pane fade" id="nav-mailbox" role="tabpanel" aria-labelledby="mailbox">
                                <livewire:home.get-quotes-index.mailbox />
                            </div>
                        </div>
                   </div>
               </div>
            </div>
             <div class="col-md-6">
                 <div class="card">
                    <div class="card-header">
                        <p class="font-weight-bold">Print Receipt</p>
                    </div>
                    <div class="card-body">
                        <livewire:admin.agent.print-receipt.index />
                    </div>
                 </div>
             </div>
        </div>
    </div>
</div>