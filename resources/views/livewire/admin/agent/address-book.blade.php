<div>
    <x-slot name="title">
        address book
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
        <link href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">API Settings</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">API Settings</li>
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
                                <form wire:submit.prevent="start" class="needs-validation">
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="key">Shipping Type :</label>
                                                <select wire:model.lazy="address.shipping-type" class="form-control custom-select" id="shipping-type">
                                                    <option value="" hidden></option>
                                                    <option value="parcel">{{ __('Parcel') }}</option>
                                                    <option value="envelop">{{ __('Envelop') }}</option>
                                                </select>
{{--                                                @error('address.from') <span class="text-danger">{{ $message }}</span> @enderror--}}
                                            </div>
                                        </div>
                                        <div class="col-md-4" wire:ignore>
                                            <div class="form-group">
                                                <div class="col-span-6 sm:col-span-4">
                                                    <x-jet-label for="from_line_1" value="{{ __('From Address') }}"/>
                                                    <x-jet-input id="from_line_1" type="hidden" wire:model.lazy="line_1"/>
                                                    <div>
                                                        <select data-livewire="@this" id="line_1" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-full">
                                                            <option selected value="">--{{__('Select an Address')}}--</option>
                                                            @foreach($from as $account)
                                                                @if ($account['type'] === 'from')
                                                                    <option value="{{$account->id}}">{{$account->line_1}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <x-jet-input-error for="from_line_1" class="mt-2"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" wire:ignore>
                                            <div class="form-group">
                                                <div class="col-span-6 sm:col-span-4">
                                                    <x-jet-label for="from_line_2" value="{{ __('To Address') }}"/>
                                                    <x-jet-input id="from_line_2" type="hidden" wire:model.lazy="line_2"/>
                                                    <div>
                                                        <select data-livewire="@this" id="line_2" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-full">
                                                            <option selected value="">--{{__('Select an Address')}}--</option>
                                                            @foreach($from as $account)
                                                                @if ($account['type'] === 'to')
                                                                    <option value="{{$account->id}}">{{$account->line_1}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <x-jet-input-error for="from_line_2" class="mt-2"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if($validateError)
                                                <div class="alert alert-danger">{{ $validateError }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info w-100">{{ __('Submit') }}</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                                </form>
                                <div class="mt-3">
                                    <livewire:admin.agent.address-book-datatable />
                                    <a href="{{ route('agent.create-address-book.index') }}" class="btn btn-outline-info w-100 mt-3">{{ __('Create New Address') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#line_1').select2({
                    width: "100%"
                }).on('change', function (e) {
                    let livewire = $(this).data('livewire')
                    eval(livewire).set('from_line', $(this).val());
                });
                $('#line_2').select2({
                    width: "100%"
                }).on('change', function (e) {
                    let livewire = $(this).data('livewire')
                    eval(livewire).set('to_line', $(this).val());
                });
            });
        </script>
    </x-slot>
</div>
