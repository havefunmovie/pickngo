<div>
    <x-slot name="title">
        drop-off
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
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Drop-Off</li>
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
                                    <a href="drop-off"> 
                                        <span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg  bg-white m-2 border py-2 px-5 rounded">
                                            <i class="mdi mdi-briefcase-download"></i> 
                                            Drop-off
                                        </span>
                                    </a>
                                    <a href="drop-off/pickup"> 
                                        <span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg text-primary bg-white m-2 border py-2 px-5 rounded">
                                            <i class="mdi mdi-truck fs-3"></i> 
                                            Pickup
                                        </span>
                                    </a>
                                    <a href="drop-off/delivery"> 
                                        <span style="font-weight: bold; font-size:20px;cursor: pointer;" class="shadow-lg text-primary bg-white m-2 border py-2 px-5 rounded">
                                            <i class="mdi mdi-checkbox-marked-circle"></i> 
                                            Delivery
                                        </span>
                                    </a>
                                </div>
                                <h4 class="page-title">New Drop-off</h4> 
                            </div>
                            @if ($notification)
                                <div class="col-sm-6">
                                    <h4 class="alert alert-warning" style="font-weight: 500; font-size:20px"><i class="mdi mdi-alert-circle mr-3"></i> {{ $notification }}</h4>   
                                </div>    
                            @endif
                        </div>
                        
                        <div id="info" class="row mt-4">
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Email address') }} <span class="text-warning">(optional)</span></label>
                                    <input type="email" class="form-control" wire:model="email" placeholder={{ __('email') }}>
                                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div> --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Phone number') }}</label>
                                    <input style="text-transform:uppercase" type="tel" wire:keydown="findUser" class="form-control" wire:model="phone" placeholder={{ __('phone') }}>
                                    @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Full name') }}</label>
                                    <input style="text-transform:uppercase" type="text" class="form-control" wire:model="name" placeholder={{ __('name') }}>
                                    @if ($names)
                                        <div style="width:98%;position: absolute;z-index: 1;background:white;border:1px solid">
                                            @foreach ($names as $name)
                                                <p wire:click="chooseName('{{ $name }}')" class="hover:bg-green-600 hover:text-white mx-2 p-1 pl-3" style="cursor: pointer;" class="selectName" >{{ $name }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Send By') }}</label>
                                    <select class="form-control" wire:model='company'>
                                        <option value="Ups">Ups</option>
                                        <option value="Purolator">Purolator</option>
                                        <option value="Dhl">Dhl</option>
                                        <option value="Fedex">Fedex</option>
                                    </select>
                                    @error('company') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <form wire:submit.prevent="saveTrackingNumber">
                                        <label>{{ __('Please scan barcode') }}</label>
                                        <input style="text-transform:uppercase" class="form-control" type="text" wire:model="tracking_number" placeholder="scan">
                                        @error('tracking_number') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2">
                                
                                <button style="margin-top: 29px;" wire:click="saveTrackingNumber()" class="btn btn btn-outline-success">Add <i class="mdi mdi-arrow-down"></i></button>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" wire:click="saveFrom" class="btn btn-primary"> {{ __('Save - Print') }} <i class="mdi mdi-content-save mt-1"></i></button>
                            </div>
                            <div class="col-md-8">
                                @foreach ($tracking_numbers as $tracking_number)
                                <span style="font-size: 14px;" class="mt-3 p-1 fs-3 badge badge-success"><i wire:click="removeTrackingNumber( '{{ $tracking_number }}' )" style="cursor: pointer" class="mdi mdi-window-close"></i> &nbsp; {{ $tracking_number }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <p>Drop Off List</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.drop-off.dropoff-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Drop-off info Model -->
    <div id="dropoff-info" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h3 class="modal-title" id="myModalLabel"><b>Parcel Information</b></h3>
                    <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <i class="mdi mdi-package"></i>
                      Dropoff Informations
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Status") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <label class="mt-2" id="status"></label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Tracking Code") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <label class="mt-2" id="tracking_number"></label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Name") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <label class="mt-2" id="name"></label>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Phone") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <label class="mt-2" id="phone"></label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Note") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <label class="mt-2" id="note"></label>
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Agent Name") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <label class="mt-2" id="agentName"></label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Agent Address") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <label class="mt-2" id="agentAddress"></label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Receipt") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <img style="max-width: 350px;" id="prof_photo" src="" alt="dropoff">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <script>
        window.addEventListener('dropoff-detail', event => {
            $('#tracking_number').text(event.detail.tracking_number);
            $('#name').text(event.detail.name);
            $('#phone').text(event.detail.phone);
            if(event.detail.note)
                $('#note').text(event.detail.note);
            else
                $('#note').text('Not Set').addClass('text-secondary');    
            if(event.detail.status == 'Done')
                $('#status').text(event.detail.status).addClass('text-success');       
            else if(event.detail.status == 'Pending')
                $('#status').text(event.detail.status).addClass('text-warning');
            else
            $('#status').text(event.detail.status).addClass('text-info');
            
            if(event.detail.agent){
                $('#agentName').text(event.detail.agent.name + ' ' + event.detail.agent.family);
                if(event.detail.agent.level == 'driver'){
                    $('#agentAddress').text('Driver Agent');
                }
                else{
                    $('#agentAddress').text(event.detail.agent.address );
                }

                if(event.detail.prof_receipt){
                    $('#prof_photo').attr('src','../'+event.detail.prof_receipt);
                }

            }
            else{
                $('#agentAddress').text('Not Set').addClass('text-secondary');
                $('#agentName').text('Not Set').addClass('text-secondary');
            }
            
            $("#dropoff-info").modal("show");
        });
    </script>
</div>