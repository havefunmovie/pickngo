<div>
    <x-slot name="title">
        Receipt
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Print-Receipt </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/agent">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/agent/print-receipt">Print-Receipt</a></li>
                            <li class="breadcrumb-item active" aria-current="page">send</li>
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
                            <div class="col-sm-6">
                                <h4 class="page-title">Send Packages</h4>
                                <h6 class="card-subtitle"></h6>    
                            </div>
                            <div class="col-sm-6">
                                @if ($error)
                                    <h4 class="alert alert-warning" style="font-weight: 500; font-size:20px"><i class="mdi mdi-alert-circle mr-3"></i> {{ $error }}</h4> 
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select The Driver</label>
                                    <select wire:model="driver_id" class="form-control">
                                      <option>select driver</option>
                                      @foreach ($drivers as $driver)
                                            <option value={{ $driver->id }}>{{ $driver->name .' '. $driver->family}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('Please scan barcode') }}</label>
                                    <div class="row">
                                        <div class="col-10">
                                        <form wire:submit.prevent="saveSendTrackingNumber">
                                                <input class="form-control" type="text" wire:model="send_tracking_number" placeholder="scan" >
                                            </div>
                                        </form>
                                            <div class="col-2">
                                                <button class="btn btn-outline-secondary" wire:click="saveSendTrackingNumber()">submit</button>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Note <span class="text-warning"> (optional)</span></label>
                                    <textarea class="form-control" placeholder="you can write something about driver or packages" wire:model="note" cols="30" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="my-4 col-10">
                                @foreach ($send_tracking_numbers as $send_tracking_number)
                                    <span style="font-size: 14px;" class="mt-3 p-1 fs-3 badge badge-success"><i wire:click="removeSendTrackingNumber( '{{ $send_tracking_number }}' )" style="cursor: pointer" class="mdi mdi-window-close"></i> &nbsp; {{ $send_tracking_number }}</span>
                                @endforeach
                            </div>
                            <div class=" my-4 col-2">
                                <h2 style="font-weight: bold" class="text-primary">Quantity = {{ $total_qty .' / '. $send_qty }}</h2>
                                <br>
                                <button wire:click="updateTrackingNumberStatus()" class=" btn btn-outline-success"><i class="mdi mdi-content-save-all"></i> Save All Information</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>