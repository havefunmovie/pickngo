<div>
    <x-slot name="title">
        Pickup
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Drop-Off </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/agent">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="/agent/drop-off">Drop-Off</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pickup</li>
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
                                <div class="float-right">
                                    <a href="/agent/drop-off"> 
                                        <span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg text-primary bg-white m-2 border py-2 px-5 rounded">
                                            <i class="mdi mdi-briefcase-download"></i> 
                                            Drop-off
                                        </span>
                                    </a>
                                    <a href="pickup"> 
                                        <span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg bg-white m-2 border py-2 px-5 rounded">
                                            <i class="mdi mdi-truck fs-3"></i> 
                                            Pickup
                                        </span>
                                    </a>
                                    <a href="delivery"> 
                                        <span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg text-primary bg-white m-2 border py-2 px-5 rounded">
                                            <i class="mdi mdi-checkbox-marked-circle"></i> 
                                            Delivery
                                        </span>
                                    </a>
                                </div>
                                <h4 class="page-title">Pickup</h4> 
                            </div>
                            @if ($notification)
                                <div class="col-sm-6">
                                    <h4 class="alert alert-warning" style="font-weight: 500; font-size:20px"><i class="mdi mdi-alert-circle mr-3"></i> {{ $notification }}</h4>   
                                </div>    
                            @endif
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="text-success">
                                            Please choose pickup type
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="send"><span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg bg-white m-2 border py-2 px-5 rounded"><i class="mdi mdi-truck"></i> Driver</span></a>
                                        <span wire:click="pickupByAgent" style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg bg-white m-2 border py-2 px-5 rounded"><i class="mdi mdi-store"></i> agent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($pickupByAgent == 'show')
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4 class="text-success">
                                        Please scan the Barcodes
                                    </h4>
                                    <p class="mt-2 text-info">Available drop-off :  {{ $availableDropofs - $qty }}</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <form wire:submit.prevent="saveSendTrackingNumber">
                                                    <label>{{ __('Please scan barcode') }}</label>
                                                    <input class="form-control" type="text" wire:model="tracking_number" placeholder="scan">
                                                    @error('tracking_number') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </form>
                                            </div>
                                        </div> 
                                        <div class="col-md-2">
                                            <button style="margin-top: 29px;" wire:click="saveSendTrackingNumber()" class="btn btn btn-outline-secondary">submit</button>
                                        </div>
                                    </div>
                                   <div class="row">
                                        <div class="col-md-4">
                                            <button type="submit" wire:click="saveFrom" class="btn btn-primary"> {{ __('Add') }} <i class="mdi mdi-arrow-right mt-1"></i></button>
                                        </div>
                                        <div class="col-md-8">
                                            @foreach ($tracking_numbers as $tracking_number)
                                                <span style="font-size: 14px;" class="mt-3 p-1 fs-3 badge badge-success"><i wire:click="removeTrackingNumber( '{{ $tracking_number }}' )" style="cursor: pointer" class="mdi mdi-window-close"></i> &nbsp; {{ $tracking_number }}</span>
                                            @endforeach
                                        </div>
                                   </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>