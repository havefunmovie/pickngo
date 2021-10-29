<div>
    <x-slot name="title">
        faxing
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
                            <li class="breadcrumb-item"><a href="/agent/drop-off">Drop-Off</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Information</li>
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
                                <h4 class="page-title">Edit Drop-off</h4>
                                <h6 class="card-subtitle"></h6>    
                            </div>
                        </div>
                        <form wire:submit.prevent="update" enctype="multipart/form-data">
                            <div id="info" class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('Tracking Number') }}</label>
                                        <input type="text" class="form-control" wire:model="tracking_number" placeholder={{ __('tracking number') }}>
                                        @error('tracking_number') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('Status') }}</label>
                                        <select wire:model='status' class="form-control">
                                            <option value="Done">Done</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Pickup">Pickup</option>
                                        </select>
                                        @error('status') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Full name') }}</label>
                                        <input type="text" class="form-control" wire:model="name" placeholder={{ __('name') }}>
                                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Email address') }} <span class="text-warning">(optional)</span></label>
                                        <input type="email" class="form-control" wire:model="email" placeholder={{ __('email') }}>
                                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{ __('Phone number') }}</label>
                                        <input type="tel" class="form-control" wire:model="phone" placeholder={{ __('phone') }}>
                                        @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
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

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{ __('Agent') }}<span class="text-warning"> (optional)</span></label>
                                        <select wire:model="agent" class="form-control">
                                          <option selected>Select agent</option>
                                          @foreach ($agents as $agent)
                                            <option value={{ $agent->id }}>{{ $agent->name }} - {{ $agent->address }}</option>
                                          @endforeach
                                        </select>
                                        @error('agent') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                

                                <div class="col-md-3">
                                    <label>{{ __('Prof Photo') }}<span class="text-warning"> (optional)</span></label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" wire:model="prof_receipt" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose photo</label>
                                        </div>
                                    </div>
                                    @error('prof_receipt') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                    <button type="submit" class="ml-1 btn btn-success"><i class="mdi mdi-content-save mt-1"></i> {{ __('Save') }} </button>
                                    <p  class="ml-3 btn btn-danger" data-toggle="modal" data-target="#deleteConfermation"><i class="mdi mdi-delete mt-1"></i> {{ __('Delete') }} </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
      <!-- Modal -->
      <div class="modal fade" id="deleteConfermation" tabindex="-1" role="dialog" aria-labelledby="deleteConfermationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title text-white" id="deleteConfermationLabel">Are you sure?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4 class="text-danger">Attention !!!</h4>
              <p class="text-danger">After delete you could not access to this information anymore.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button wire:click="delete" type="button" class="btn btn-danger"><i class="mdi mdi-delete mt-1"></i> delete</button>
            </div>
          </div>
        </div>
      </div>
</div>