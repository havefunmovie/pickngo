<div>
    <x-slot name="title">
        Delivery
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
                            <li class="breadcrumb-item active" aria-current="page">delivery</li>
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
                                        <span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg text-primary  bg-white m-2 border py-2 px-5 rounded">
                                            <i class="mdi mdi-truck fs-3"></i> 
                                            Pickup
                                        </span>
                                    </a>
                                    <a href="delivery"> 
                                        <span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg bg-white m-2 border py-2 px-5 rounded">
                                            <i class="mdi mdi-checkbox-marked-circle"></i> 
                                            Delivery
                                        </span>
                                    </a>
                                </div>
                                <h4 class="page-title">Delivery</h4> 
                            </div>
                            @if ($notification)
                                <div class="col-sm-6">
                                    <h4 class="alert alert-danger" style="font-weight: 500; font-size:20px"><i class="mdi mdi-alert-circle mr-3"></i> {{ $notification }}</h4>   
                                </div>    
                            @endif
                        </div>
                        <div class="card mt-5">
                            <div class="card-header">
                                <h4 class="text-success">
                                    Please select the barcodes
                                </h4>
                                <p class="mt-2 text-info">Available pickup :  {{ $availablePickup->count() }}</p>
                            </div>
                            <div class="card-body">
                                <div class="row mt-4">
                                    @if ($availablePickup->count() > 0)
                                        <div class="col-8">
                                            <label class="text-success">Select Agent</label>
                                            <select wire:model="selectedAgent" class="form-control" name="" id="">
                                                <option>Please select the agent</option>
                                                @forelse ($agents as $agent)
                                                    <option value={{ $agent->id }}>{{$agent->name . ' - ' . $agent->address }}</option>
                                                @empty
                                                    <div class="alert alert-info">There is no Agent added</div>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <button wire:click="saveContent" class="btn btn-outline-info float-right mr-4 mt-4"><i class="mdi mdi-content-save"></i> Save</button>
                                            <button data-toggle="modal" data-target="#printModal" class="btn btn-outline-secondary float-right mr-4 mt-4"><i class="mdi mdi-printer mt-1"></i> {{ __('Print') }} </button>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="text-success">Customer</th>
                                                    <th class="text-success">Phone</th>
                                                    <th class="text-success">Tracking number</th>
                                                    <th class="text-success">Send by</th>
                                                    <th class="text-success">Status</th>
                                                    <th class="text-success"><input type="checkbox" class="form-control" wire:click="selectAll"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($availablePickup as $pickup)
                                                        <tr>
                                                            <td>{{ $pickup->name }}</td>
                                                            <td>{{ $pickup->phone }}</td>
                                                            <td>{{ $pickup->tracking_number}}</td>
                                                            <td>{{ $pickup->company }}</td>
                                                            <td>{{ $pickup->status }}</td>
                                                            <td><input type="checkbox" class="form-control" wire:click="selectRow('{{ $pickup->id }}')" {{ $selectAll ? 'checked' : '' }}></td>
                                                        </tr>
                                                    @empty
                                                        <div class="alert alert-info">There is no pickup available</div>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                    <div class="alert alert-info w-100" style="font-size: 18px;"><i class="mdi mdi-information"></i> There is no pickup available</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
            <h5 class="modal-title text-white" id="printModalLabel">{{ __('Print Traking Numbers') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    {{-- <label class="text-success">Select Agent</label>
                     <select wire:model="printAgent" class="form-control">
                        <option>Please select the agent</option>
                        @forelse ($agents as $agent)
                            <option value={{ $agent->id }}>{{$agent->name . ' - ' . $agent->address }}</option>
                        @empty
                            <div class="alert alert-info">There is no Agent added</div>
                        @endforelse
                    </select> --}}
                    @foreach ($availablePickup as $item)
                        <span style="font-size: 14px;" class="mt-3 p-1 fs-3 badge badge-secondary"> &nbsp; {{ $item['tracking_number'] }}</span>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
            <button wire:click="PrintTrackingNumber" type="button" class="btn btn-primary ml-4">{{ __('Print') }} <i class="mdi mdi-printer mt-1"></i></button>
            </div>
        </div>
        </div>
    </div>
</div>