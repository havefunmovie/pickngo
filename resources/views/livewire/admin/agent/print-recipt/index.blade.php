<div>
    <x-slot name="title">
        print receipt
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Print Receipt </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Print-Receipt</li>
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
                                <h4 class="page-title">Print Receipt</h4>  
                            </div>
                            <div class="col-md-6">
                                @if ($notification)
                                    <div id="notification" class="alert alert-warning" role="alert">
                                        <i class="mdi mdi-bell-ring"></i> {{ $notification }}
                                        <i id="close" class="float-right mdi mdi-close"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Full name') }}</label>
                                    <input style="text-transform:uppercase" type="text" class="form-control" wire:model="name" placeholder={{ __('name') }}>
                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Price') }}</label>
                                    <input style="text-transform:uppercase" type="text" class="form-control" wire:model="price" placeholder={{ __('price') }}>
                                    @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ __('country') }}</label>
                                    <select wire:model="country" class="form-control">
                                      <option selected>Selet country</option>
                                      <option value='Canada'>Canada</option>
                                      <option value= 'united states'>united states</option>
                                    </select>
                                    @error('country') <span class="error text-danger">{{ $message }}</span> @enderror
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">{{ __('Province') }} <span class="text-warning">{{ __('(optional)') }}</span></label>
                                    <select wire:model="province" class="form-control">
                                        <option>Select province</option>
                                        @foreach ($provinces as $province)
                                            <option value= {{ $province->province }}>{{ $province->province }}</option>
                                        @endforeach
                                      </select>
                                    @error('province') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <form wire:submit.prevent="saveTrackingNumber">
                                        <label>{{ __('Please scan barcode') }} <span class="text-warning">{{ __('(optional)') }}</span> </label>
                                        <input style="text-transform:uppercase" class="form-control" type="text" wire:model="tracking_number" placeholder="scan">
                                        @error('tracking_number') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" wire:click="calculate" class="mt-3 btn btn-primary"> <i class="mdi mdi-calculator"></i> {{ __('Calculate') }}</button>
                            </div>
                            <div class="col-md-8">
                                @foreach ($tracking_numbers as $tracking_number)
                                    <span style="font-size: 12px;" class="mt-3 p-1 fs-3 badge badge-success"><i wire:click="removeTrackingNumber( '{{ $tracking_number }}' )" style="cursor: pointer" class="mdi mdi-window-close"></i> &nbsp; {{ $tracking_number }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if ($total_price )
                                    <div class="card mt-3">
                                        <div class="card-header">
                                            <div class="col-md-6">
                                                <span class="fs-3 font-weight-bold">summery</span>
                                                <p class="fs-3">price :  {{ $price }}</p>
                                                <p class="fs-3">tax :  {{ $tax_price  }}</p>
                                                <p class="fs-3">total :  {{ $total_price }}</p>
                                                <button type="submit" wire:click = "print" class="btn btn-primary mt-3"><i class="mdi mdi-printer"></i> {{ __('Print') }}</button>
                                            </div>
                                            <div class="col-md-6 mt-4">
                                                <div class="form-group">
                                                    <label>{{ __('Email') }}</label>
                                                    <input type="text" class="form-control" wire:model="userEmail">
                                                </div>
                                                <button type="submit" wire:click = "email" class="btn btn-success mt-3"><i class="mdi mdi-email"></i> {{ __('Email') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <p>Receipt List</p>
                        <a class="float-right btn btn-outline-primary" href="print-receipt/send"> Send By Driver <i class="mdi mdi-truck fs-3"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.print-receipt.receipt-datatable /> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Receipt info Model -->
    <div id="receipt-info" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                            <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Agent Phone") }}:</label>
                            <div class="col-md-9 col-xs-6">
                                <label class="mt-2" id="agentPhone"></label>
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
         window.addEventListener('receipt-detail', event => {
            $('#tracking_number').text(event.detail[0].tracking_numbers);
            $('#name').text(event.detail[0].name);
            $('#note').text(event.detail[0].note);
            if(event.detail[0].status === 'Pending')
                $('#status').text(event.detail[0].status).addClass('text-warning');
            else if(event.detail[0].status === 'Done')
                $('#status').text(event.detail[0].status).addClass('text-success');
            
            if(event.detail.agent[0])
            {
                $('#agentName').text(event.detail.agent[0].name + ' ' +event.detail.agent[0].family);
                $('#agentAddress').text(event.detail.agent[0].address );
                $('#agentPhone').text(event.detail.agent[0].mobile);
                $('#prof_photo').attr('src','../'+event.detail[0].prof_receipt);
            }
            console.log(event.detail);
            $("#receipt-info").modal("show");
        });

        document.getElementById("close").onclick = function(){
            document.getElementById("notification").style.display = 'none';
        }
    </script>
</div>
