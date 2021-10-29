<div>
    <x-slot name="title">
        create agent
    </x-slot>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Agents</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Agents</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Agent</li>
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
                                <h4 class="">Agent Info</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form wire:submit.prevent="create" class="needs-validation bt-switch">
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name :</label>
                                            <input type="text" wire:model.lazy="agent.name" class="form-control {{ $errors->has('agent.name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('agent.name',$validated) ? 'is-valid' : '' }}" id="name">
                                            @error('agent.name') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Description :</label>
                                            <input type="text" wire:model.lazy="agent.description" class="form-control {{ $errors->has('agent.description') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('agent.description',$validated) ? 'is-valid' : '' }}" id="description">
                                            @error('agent.description') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info float-right">{{ __('Create') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
