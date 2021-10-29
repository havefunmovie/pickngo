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
                <h4 class="page-title">Receipt </h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/agent">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/agent/print-receipt">Print Receipt</a></li>
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
                                        <label for="exampleInputEmail1">{{ __('Full name') }}</label>
                                        <input type="text" class="form-control" wire:model="name" placeholder={{ __('name') }}>
                                    </div>
                                </div>
                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Email address') }} <span class="text-warning">(optional)</span></label>
                                        <input type="email" class="form-control" wire:model="email" placeholder={{ __('email') }}>
                                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('Price') }} <span class="text-warning">(optional)</span></label>
                                        <input type="tel" class="form-control" wire:model="price" placeholder={{ __('price') }}>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('Country') }}<span class="text-warning"> (optional)</span></label>
                                        <select wire:model="contry" class="form-control">
                                            <option selected>{{ $country }}</option>
                                            <option value='Canada'>Canada</option>
                                            <option value='United states'>United states</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ __('Province') }} <span class="text-warning">(optional)</span></label>
                                        <input type="text" class="form-control" wire:model="province" placeholder={{ __('province') }}>
                                    </div>
                                </div>

                                <div class="col-md-4">
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
                                
                                <div class="col-md-4">
                                    <label>{{ __('Prof Photo') }}<span class="text-warning"> (optional)</span></label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" wire:model="prof_receipt" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose photo</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>{{ __('Note') }}<span class="text-warning"> (optional)</span></label>
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" wire:model="note" cols="30" rows="6"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Tracking Number') }}</label>
                                        <p>{{ $tracking_numbers }}</p>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save mt-1"></i> {{ __('Save') }} </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>