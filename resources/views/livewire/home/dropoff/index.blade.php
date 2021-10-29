<div class="container-fluid">
    <x-slot name="styles">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </x-slot>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="jumbotron jumbotron-fluid mt-5 shadow-lg p-3 mb-5 text-white rounded bg-success">
                <div class="container text-center p-3">
                  <h1 class="display-4">Welcome to pick & go</h1>
                  <p class="lead">Please fill the form below !</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-20 mb-5"> 
        @if ($notification)
            <div class="col-sm-6">
                <h4 class="alert alert-warning" style="font-weight: 500; font-size:20px"><i class="mdi mdi-alert-circle mr-3"></i> {{ $notification }}</h4>   
            </div>    
        @endif
        <div id="info" class="row mt-4">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Full name') }}</label>
                    <input style="text-transform:uppercase" type="text" class="form-control" wire:model="name" placeholder={{ __('name') }}>
                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>{{ __('Phone number') }}</label>
                    <input style="text-transform:uppercase" type="tel" class="form-control" wire:model="phone" placeholder={{ __('phone') }}>
                    @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Email address') }}</label>
                    <input style="text-transform:uppercase" type="email" class="form-control" wire:model="email" placeholder={{ __('email') }}>
                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
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
            <div class="col-md-10 mt-5">
                <div class="form-group">
                    <form wire:submit.prevent="saveTrackingNumber">
                        @csrf
                        <label>{{ __('Please scan barcode') }}</label>
                        <input style="text-transform:uppercase" class="form-control" type="text" wire:model="tracking_number" placeholder="scan">
                        @error('tracking_number') <span class="error text-danger">{{ $message }}</span> @enderror
                    </form>
                </div>
            </div>
            <div class="col-md-2 mt-5">
                <button style="margin-top: 29px;" wire:click="saveTrackingNumber()" class="btn btn btn-outline-success">Add <span style="font-size: 14px;" class="material-icons">arrow_downward</span></button>
            </div>
            <div class="col-md-4 mt-5">
                <button type="submit" wire:click="saveFrom" class="btn btn-primary"><i style="font-size:14px;" class="material-icons">print</i> {{ __('Print') }} </button>
            </div>
            <div class="col-md-8">
                @foreach ($tracking_numbers as $tracking_number)
                    <span style="font-size: 14px; background:gray; color:whitesmoke; padding:5px; border-radius:3px;"><i wire:click="removeTrackingNumber( '{{ $tracking_number }}' )" class="material-icons" style="font-size:11px;margin-top:20px;cursor: pointer">close</i> &nbsp; {{ $tracking_number }}</span>
                @endforeach
            </div>
        </div>    
    </div>
</div>
